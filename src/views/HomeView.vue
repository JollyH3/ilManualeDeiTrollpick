<script setup>
import { ref, onMounted } from 'vue'
import { storeToRefs } from 'pinia'
import { useAppStore } from '@/stores/app'

const appStore = useAppStore()

const appVersion = ref(import.meta.env.VITE_APP_VERSION)
const { currentVersion: lolVersion } = storeToRefs(appStore)
const { loadVersion } = appStore

const isLoading = ref(true)
const error = ref(null)

onMounted(async () => {
  try {
    isLoading.value = true
    error.value = null

    await loadVersion()
  } catch (err) {
    console.error('Error loading version:', err)
    error.value = 'Errore nel caricamento'
  } finally {
    isLoading.value = false
  }
})
</script>

<template>
  <main class="mx-2 px-2 py-4">
    <div class="grid grid-cols-2">
      <div class="text-center">
        <h1>Il Manuale dei Trollpick</h1>
        <p>Questo e' il manuale dei trollpick la version moderna rifatta</p>

        <div v-if="isLoading">
          <p>Versione Corrente: {{ appVersion }}</p>
          <p>Ultimo Aggiornamento giugno 2025</p>
          <p>Versione di Legue of Legend: <span class="loading-dots"></span></p>
        </div>

        <div v-else-if="error">
          <p>Versione Corrente: {{ appVersion }}</p>
          <p>Ultimo Aggiornamento giugno 2025</p>
          <p class="text-red-500">Versione di Legue of Legend: {{ error }}</p>
        </div>

        <div v-else>
          <p>Versione Corrente: {{ appVersion }}</p>
          <p>Ultimo Aggiornamento giugno 2025</p>
          <p>Versione di Legue of Legend: v{{ lolVersion }}</p>
        </div>
      </div>
      <div class="flex">
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt vitae a dolores officiis
          cupiditate rerum. Aut sed omnis temporibus ut, voluptate quisquam? Debitis molestias
          repellendus voluptatem similique cum quis asperiores?
        </p>
      </div>
    </div>
  </main>
</template>
