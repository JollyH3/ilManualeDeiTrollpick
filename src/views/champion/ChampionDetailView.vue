<script setup>
import { computed, ref, watch } from 'vue'
import { useRoute, useRouter } from 'vue-router'
import { useAppStore } from '@/stores/app'
import { useChampionsStore } from '@/stores/champion'
import { storeToRefs } from 'pinia'
import { Avatar, Image, Tag, Button, Card } from 'primevue'
import {
  Sword,
  Shield,
  Shell,
  Settings,
  Heart,
  Star,
  Wand,
  BrainCircuit,
  Footprints,
  Trophy,
} from 'lucide-vue-next'
import RadarStats from '@/components/RadarStats.vue'

const route = useRoute()
const router = useRouter()

const appStore = useAppStore()
const championsStore = useChampionsStore()

const { currentVersion: version } = storeToRefs(appStore)
const { championDetails: champion } = storeToRefs(championsStore)

const { loadVersion } = appStore
const { loadChampionDetails } = championsStore

const isLoading = ref(true)
const error = ref(null)
const lolApiUrl = import.meta.env.VITE_LOL_API_URL
const selectedSection = ref('stats')

const currentChampion = computed(() => {
  const championName = route.params.name
  return championName ? champion.value[championName] : null
})

const getRadarStats = (champion) => {
  if (!champion) return []

  const stats = [
    { name: 'Damage', value: calculateDamage(champion), icon: Sword, gradientId: 'damageGradient' },
    {
      name: 'Toughness',
      value: calculateToughness(champion),
      icon: Shield,
      gradientId: 'toughnessGradient',
    },
    { name: 'CC', value: calculateCC(champion), icon: Shell, gradientId: 'ccGradient' },
    {
      name: 'Mobility',
      value: calculateMobility(champion),
      icon: Footprints,
      gradientId: 'mobilityGradient',
    },
    {
      name: 'Utility',
      value: calculateUtility(champion),
      icon: Trophy,
      gradientId: 'utilityGradient',
    },
  ]
  return stats
}

const calculateDamage = (champion) => {
  if (!champion?.spells || !champion?.stats || !champion?.info) return 0

  const damageSpells = champion.spells.filter(isDamageSpell)
  const numDamageSpells = damageSpells.length

  const hasTrueDamage = champion.spells.some(
    (spell) =>
      spell.tooltip?.toLowerCase().includes('truedamage') ||
      spell.tooltip?.toLowerCase().includes('danni puri') ||
      spell.description?.toLowerCase().includes('truedamage') ||
      spell.description?.toLowerCase().includes('danni puri'),
  )

  let damage =
    (champion.info.attack / 10) * 2.2 + // Aumentato per ADC
    (champion.stats.attackdamage / 75) * 1 + // Migliorato scaling
    (numDamageSpells / 4) * 0.6 +
    (hasTrueDamage ? 0.8 : 0)

  return Math.min(Math.max(damage, 0), 3)
}

const isDamageSpell = (spell) => {
  if (!spell) return false
  const text = (spell.tooltip + spell.description).toLowerCase()

  const hasDamageInText =
    text.includes('danni') ||
    text.includes('damage') ||
    text.includes('magicdamage') ||
    text.includes('physicaldamage') ||
    text.includes('truedamage') ||
    text.includes('danni puri') ||
    text.includes('danni fisici') ||
    text.includes('danni magici')

  const hasNumericalEffect = spell.effect?.some(
    (arr) => Array.isArray(arr) && arr.some((v) => typeof v === 'number' && v > 0),
  )

  const hasScaling = spell.vars?.some((v) =>
    ['attackdamage', 'spelldamage', 'bonusattackdamage'].includes(v.link),
  )

  return hasDamageInText || hasNumericalEffect || hasScaling
}

const calculateToughness = (champion) => {
  if (!champion?.stats || !champion?.info) return 0

  const baseHp = champion.stats.hp || 0
  const baseArmor = champion.stats.armor || 0
  const baseMR = champion.stats.spellblock || 0
  const hpregen = champion.stats.hpregen || 0

  const toughness =
    (champion.info.defense / 10) * 1.8 + // Più importante defense rating
    (baseHp / 1400) * 1 +
    ((baseArmor + baseMR) / 140) * 1 +
    (hpregen > 8 ? 0.3 : 0)

  return Math.min(Math.max(toughness, 0), 3)
}

const calculateMobility = (champion) => {
  if (!champion?.spells || !champion?.stats) return 0

  const hasDash = champion.spells.some((spell) => {
    if (!spell?.description || !spell?.tooltip) return false
    const text = (spell.description + spell.tooltip).toLowerCase()
    return (
      text.includes('dash') ||
      text.includes('scatta') ||
      text.includes('balza') ||
      text.includes('salta') ||
      text.includes('blink') ||
      text.includes('jump') ||
      text.includes('leap') ||
      text.includes('teleport') ||
      text.includes('teletrasporta') || // Ezreal E
      text.includes('flash') ||
      text.includes('vault') ||
      text.includes('tumble') ||
      text.includes('scatta attraverso') || // Yasuo E
      (text.includes('scatta verso') && !text.includes('nemico') && !text.includes('bersaglio'))
    )
  })

  const movespeed = champion.stats.movespeed || 0

  let score = 0

  if (hasDash) {
    score += 2.5 // Più punti per dash veri
  }

  // Movement speed contribuisce meno
  if (movespeed >= 360) score += 0.3
  if (movespeed >= 380) score += 0.2

  return Math.min(score, 3)
}

const calculateCC = (champion) => {
  if (!champion?.spells) return 0

  const ccTypes = [
    'stun',
    'stordimento',
    'stordisce',
    'slow',
    'rallentamento',
    'rallenta',
    'knock-up',
    'knockup',
    'lanciandoli in aria',
    'lancia in aria',
    'pull',
    'attira',
    'attirandoli',
    'taunt',
    'provocazione',
    'root',
    'immobilizza',
    'immobilizzazione',
    'silence',
    'silenzia',
    'fear',
    'paura',
    'charm',
    'fascino',
    'snare',
    'lega',
  ]

  const foundCC = new Set()

  champion.spells.forEach((spell) => {
    if (!spell?.description || !spell?.tooltip) return
    const text = (spell.description + spell.tooltip).toLowerCase()

    ccTypes.forEach((ccType) => {
      if (text.includes(ccType)) {
        // Raggruppa CC simili
        if (['slow', 'rallentamento', 'rallenta'].includes(ccType)) {
          foundCC.add('slow')
        } else if (['pull', 'attira', 'attirandoli'].includes(ccType)) {
          foundCC.add('pull')
        } else if (['stun', 'stordimento', 'stordisce'].includes(ccType)) {
          foundCC.add('stun')
        } else if (
          ['knock-up', 'knockup', 'lanciandoli in aria', 'lancia in aria'].includes(ccType)
        ) {
          foundCC.add('knockup')
        } else if (['root', 'immobilizza', 'immobilizzazione'].includes(ccType)) {
          foundCC.add('root')
        } else {
          foundCC.add(ccType)
        }
      }
    })
  })

  // Migliore scaling per CC
  return Math.min(foundCC.size * 0.7, 3)
}

const calculateUtility = (champion) => {
  if (!champion?.spells) return 0

  let utilityScore = 0

  // Base score per ruoli
  if (champion.tags?.includes('Support')) utilityScore += 1.8
  if (champion.tags?.includes('Mage')) utilityScore += 0.4

  champion.spells.forEach((spell) => {
    if (!spell?.description || !spell?.tooltip) return
    const text = (spell.description + spell.tooltip).toLowerCase()

    // Shield/Heal per alleati
    if (
      (text.includes('scudi') ||
        text.includes('shield') ||
        text.includes('cura') ||
        text.includes('heal') ||
        text.includes('scudo') ||
        text.includes('guarisce')) &&
      (text.includes('alleati') ||
        text.includes('ally') ||
        text.includes('campione alleato') ||
        text.includes('campione o torre'))
    ) {
      utilityScore += 1.4
    }

    // Buff di movimento o attacco per alleati
    if (
      (text.includes('velocità di movimento') ||
        text.includes('movement speed') ||
        text.includes('attacco fisico')) &&
      (text.includes('alleato') || text.includes('ally'))
    ) {
      utilityScore += 1.0
    }

    // Visione e utility speciale
    if (
      text.includes('visione') ||
      text.includes('vision') ||
      text.includes('rivela') ||
      text.includes('stealth') ||
      text.includes('invisibilità') ||
      text.includes('blocca') || // Yasuo windwall
      text.includes('schiva') // Jax E
    ) {
      utilityScore += 0.6
    }
  })

  return Math.min(utilityScore, 3)
}

const fetchChampion = async () => {
  try {
    isLoading.value = true
    error.value = null

    const championName = route.params.name
    if (!championName) {
      error.value = 'Nome campione non valido'
      return
    }

    await loadVersion()
    await loadChampionDetails(championName)
  } catch (err) {
    console.error(err)
    console.error('Error loading champion:', err)
    error.value = 'Unable to load champion'
  } finally {
    isLoading.value = false
  }
}

watch(
  () => route.params.name,
  (newName) => {
    if (newName) {
      fetchChampion()
    }
  },
  { immediate: true },
)

const goBack = () => {
  router.push({ name: 'champions' })
}
</script>

<template>
  <div v-if="isLoading">Caricamento Campione...</div>
  <div v-else-if="error">{{ error }}</div>
  <div v-else-if="currentChampion" class="relative">
    <!-- <pre>{{ currentChampion }}</pre> -->
    <div class="relative h-[60vh] overflow-hidden">
      <Image
        :src="`${lolApiUrl}/img/champion/splash/${currentChampion.champion_id}_0.jpg`"
        :alt="currentChampion.name"
        class="w-full h-full object-cover scale-105"
        preview
      />

      <div
        class="absolute inset-0 bg-gradient-radial from-transparent via-black/20 to-black/60"
      ></div>

      <div
        class="absolute bottom-0 left-0 right-0 p-8 bg-gradient-to-t from-black/90 to-transparent"
      >
        <div class="max-w-4xl">
          <div class="flex items-end gap-6 mb-4">
            <Avatar
              :image="`${lolApiUrl}/${version}/img/champion/${currentChampion.image?.full}`"
              size="xlarge"
              shape="square"
              class="shadow-lg border-2 border-white/30"
            />

            <div class="text-white">
              <h1 class="text-5xl font-bold mb-1">{{ currentChampion.name }}</h1>
              <p class="text-xl opacity-80">{{ currentChampion.title }}</p>
            </div>
          </div>

          <div class="flex gap-3 mb-4">
            <Tag :value="`v${version}`" severity="warning" rounded />

            <template v-if="currentChampion?.tags">
              <Tag
                v-for="role in currentChampion.tags"
                :key="role"
                :value="role"
                severity="info"
                rounded
              />
            </template>

            <Tag
              v-if="currentChampion.info?.difficulty"
              :value="`Difficoltà: ${currentChampion.info.difficulty}/10`"
              severity="danger"
              rounded
            />
          </div>

          <div class="flex gap-3">
            <Button
              label="Build"
              icon="pi pi-star"
              outlined
              :class="selectedSection === 'build' ? 'p-button-success' : ''"
              @click="selectedSection = 'build'"
            />

            <Button
              label="Abilità"
              icon="pi pi-bolt"
              severity="secondary"
              outlined
              :class="selectedSection === 'abilities' ? 'p-button-success' : ''"
              @click="selectedSection = 'abilities'"
            />

            <Button
              label="Statistiche"
              icon="pi pi-chart-bar"
              severity="secondary"
              outlined
              :class="selectedSection === 'stats' ? 'p-button-success' : ''"
              @click="selectedSection = 'stats'"
            />

            <Button
              label="lore"
              icon="pi pi-book"
              severity="secondary"
              outlined
              :class="selectedSection === 'lore' ? 'p-button-success' : ''"
              @click="selectedSection = 'lore'"
            />

            <Button label="Condividi" icon="pi pi-share-alt" severity="secondary" outlined />
          </div>
        </div>
      </div>
    </div>

    <div class="p-6 space-y-6">
      <Transition name="fade-slide">
        <div v-show="selectedSection == 'stats'" class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
          <Card v-if="currentChampion.info">
            <template #title>
              <div class="flex items-center gap-2">
                <Sword :size="20" class="text-red-500" />
                Attacco
              </div>
            </template>
            <template #content>
              <div class="flex items-center gap-2">
                <ProgressBar
                  :value="currentChampion.info.attack * 10"
                  class="flex-1"
                  :show-value="false"
                />
                <span class="font-bold">{{ currentChampion.info.attack }}/10</span>
              </div>
            </template>
          </Card>

          <Card v-if="currentChampion.info">
            <template #title>
              <div class="flex items-center gap-2">
                <Shield :size="20" class="text-blue-500" />
                Difesa
              </div>
            </template>
            <template #content>
              <div class="flex items-center gap-2">
                <ProgressBar
                  :value="currentChampion.info.defense * 10"
                  class="flex-1"
                  :show-value="false"
                />
                <span class="font-bold">{{ currentChampion.info.defense }}/10</span>
              </div>
            </template>
          </Card>

          <Card v-if="currentChampion.info">
            <template #title>
              <div class="flex items-center gap-2">
                <Wand :size="20" class="text-blue-500" />
                Magia
              </div>
            </template>
            <template #content>
              <div class="flex items-center gap-2">
                <ProgressBar
                  :value="currentChampion.info.magic * 10"
                  class="flex-1"
                  :show-value="false"
                />
                <span class="font-bold">{{ currentChampion.info.magic }}/10</span>
              </div>
            </template>
          </Card>

          <Card v-if="currentChampion.info">
            <template #title>
              <div class="flex items-center gap-2">
                <BrainCircuit :size="20" class="text-blue-500" />
                Difficoltà
              </div>
            </template>
            <template #content>
              <div class="flex items-center gap-2">
                <ProgressBar
                  :value="currentChampion.info.difficulty * 10"
                  class="flex-1"
                  :show-value="false"
                />
                <span class="font-bold">{{ currentChampion.info.difficulty }}/10</span>
              </div>
            </template>
          </Card>

          <RadarStats :stats="getRadarStats(currentChampion)" />
        </div>
      </Transition>
    </div>
  </div>
  <div v-else>Nessun Campione trovato</div>
</template>
