<script setup>
import { ref, onMounted } from 'vue'
import { useRouter } from 'vue-router'
import { useAppStore } from '@/stores/app'
import { useChampionsStore } from '@/stores/champion'
import { storeToRefs } from 'pinia'
import Card from 'primevue/card'

const router = useRouter()

const appStore = useAppStore()
const championsStore = useChampionsStore()

const { currentVersion: version } = storeToRefs(appStore)
const { champions } = storeToRefs(championsStore)

const { loadVersion } = appStore
const { loadChampions } = championsStore

const isLoading = ref(true)
const error = ref(null)

const goToChampion = (champion) => {
  router.push({
    name: 'champion',
    params: { name: champion.name.toLowerCase() },
  })
}

onMounted(async () => {
  try {
    isLoading.value = true
    error.value = null

    await loadVersion()
    await loadChampions()
  } catch (err) {
    console.log('Error loading data:', err)
    error.value = 'Unable to load champions'
  } finally {
    isLoading.value = false
  }
})
</script>

<template>
  <div v-if="isLoading">Caricamento campioni...</div>
  <div v-else-if="error" class="error">{{ error }}</div>
  <div v-else class="grid grid-cols-[repeat(auto-fit,minmax(120px,1fr))] p-4 gap-4">
    <div v-for="champion in champions" :key="champion.champion_id || champion.id">
      <Card
        @click="goToChampion(champion)"
        class="cursor-pointer w-full h-full transition-transform duration-200 hover:scale-105 flex flex-col"
        :pt="{
          root: '!bg-transaprent-500 !border-0 !shadow-none',
          body: '!p-0 !m-0',
          header: 'p-1',
        }"
      >
        <template #header>
          <img
            :src="`https://ddragon.leagueoflegends.com/cdn/${version}/img/champion/${champion.image?.full}`"
            :alt="champion.name"
            class="champion-image rounded-md"
          />
        </template>
        <template #title>
          <p class="text-center text-xs sm:text-sm font-medium truncate">{{ champion.name }}</p>
        </template>
      </Card>
    </div>
  </div>
</template>
