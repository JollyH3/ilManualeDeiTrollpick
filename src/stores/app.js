import { defineStore } from 'pinia'
import { ref } from 'vue'

export const useAppStore = defineStore('app', () => {
  const currentVersion = ref(null)
  const versionLoadedAt = ref(null)

  const loadVersion = async () => {
    // 1 ora
    const cacheTime = 60 * 60 * 1000
    const now = Date.now()

    if (currentVersion.value && versionLoadedAt.value && now - versionLoadedAt.value < cacheTime) {
      console.log('Version from cache')
      return currentVersion.value
    }

    console.log('Loading version from API')

    try {
      const response = await fetch(`${import.meta.env.VITE_API_URL}/versions/current`)
      if (!response.ok) throw new Error('Failed to fetch version')

      const data = await response.json()
      currentVersion.value = data.lolVersion

      return currentVersion.value
    } catch (error) {
      console.error('Error loading version:', error)

      currentVersion.value = import.meta.env.VITE_LOL_FALLBACK_VERSION
      return currentVersion.value
    }
  }

  return { currentVersion, loadVersion }
})
