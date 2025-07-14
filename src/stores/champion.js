import { defineStore } from 'pinia'
import { ref } from 'vue'

export const useChampionsStore = defineStore('champions', () => {
  const champions = ref([])
  const championDetails = ref({})
  const loadedAt = ref(null)

  const loadChampions = async () => {
    // 30 min
    const cacheTime = 30 * 60 * 1000
    const now = Date.now()

    if (champions.value.length > 0 && loadedAt.value && now - loadedAt.value < cacheTime) {
      console.log('Champions from cache')
      return champions.value
    }

    try {
      const response = await fetch(`${import.meta.env.VITE_API_URL}/champions/list`)
      if (!response.ok) throw new Error('Failed to load champions')

      const data = await response.json()
      champions.value = data.champions || data
      loadedAt.value = now

      return champions.value
    } catch (error) {
      console.log('Error loading champions:', error)
      throw error
    }
  }

  const loadChampionDetails = async (championName) => {
    if (championDetails.value[championName]) {
      console.log(`${championName} from cache`)
      return championDetails.value
    }

    console.log(`Loading ${championName} from cache`)
    try {
      const response = await fetch(`${import.meta.env.VITE_API_URL}/champion/${championName}`)
      if (!response.ok) throw new Error('Champion not found')

      const data = await response.json()
      championDetails.value[championName] = data.champion

      return data.champion
    } catch (error) {
      console.log(`Error loading ${championName}:`, error)
      throw error
    }
  }

  return {
    champions,
    championDetails,
    loadChampions,
    loadChampionDetails,
  }
})
