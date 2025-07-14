class RiotApiService {
  constructor() {
    this.baseUrl = 'https://ddragon.leagueoflegends.com'
  }

  async getAllChampion(version, locale = 'it_IT') {
    const url = `${this.baseUrl}/cdn/${version}/data/${locale}/champion.json`
    // console.log(`Downloading from: ${url}`);

    try {
      const response = await fetch(url)
      if (!response.ok) {
        const errorText = await response.text()
        console.error(`HTTP ${response.status}: ${response.statusText}`)
        console.error(`Response: ${errorText.substring(0, 200)}...`)
        throw new Error(`Failed to fetch champions: ${response.status} - ${response.statusText}`)
      }

      const data = await response.json()
      // console.log(`Downloaded ${Object.keys(data.data || {}).length} champions`);
      return data
    } catch (error) {
      console.error(`Error fetching from ${url}:`, error.message)
      throw error
    }
  }

  async getChampionData(championName, version, locale = 'it_IT') {
    const url = `${this.baseUrl}/cdn/${version}/data/${locale}/champion/${championName}.json`
    // console.log(`Downloading from: ${url}`);

    try {
      const response = await fetch(url)
      if (!response.ok) {
        const errorText = await response.text()
        console.error(`HTTP ${response.status}: ${response.statusText}`)
        console.error(`Response: ${errorText.substring(0, 200)}...`)
        throw new Error(`Failed to fetch champion: ${response.status} - ${response.statusText}`)
      }

      const data = await response.json()
      // console.log(`Downloaded ${Object.keys(data.data || {}).length} champion`);
      return data
    } catch (error) {
      console.error(`Error fetching from ${url}:`, error.message)
      throw error
    }
  }
}

export default new RiotApiService()
