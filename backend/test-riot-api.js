// const riotApi = require('./services/riotApiService')

import ChampionService from './services/championService.js'

// let i = 1
// async function testRiotApi() {
//   try {
//     const champions = await riotApi.getAllChampion('15.13.1')

//     Object.values(champions.data).forEach(async (champion) => {
//       // console.log(champion.name);
//       let championData = await riotApi.getChampionData(champion.id, '15.13.1')
//       if (i === 1) console.log(Object.values(championData.data.Aatrox))
//       i++
//     })

//     return { champions }
//   } catch (error) {
//     console.error('Error:', error)
//   }
// }

// testRiotApi()

ChampionService.saveChampions()
