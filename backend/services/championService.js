import { connect, query as _query } from '../db/connection.js'
import riotApiService from './riotApiService.js'

class ChampionService {
  // async saveChampionsForVersion(versionId) {
  //   const client = await connect()

  //   try {
  //     await client.query('BEGIN')

  //     const championsData = await getChampions()
  //     const { data } = championsData

  //     for (const [championKey, championInfo] of Object.entries(data)) {
  //       await client.query(
  //         `
  //                   INSERT INTO champions (
  //                       champion_id, champion_key, version_id, name, title,
  //                       image, skins, lore, blurb, allytips, enemytips,
  //                       tags, partype, info, stats, spells, passive
  //                   ) VALUES ($1, $2, $3, $4, $5, $6, $7, $8, $9, $10, $11, $12, $13, $14, $15, $16, $17)
  //                   ON CONFLICT (champion_key, version_id) DO NOTHING
  //                   `,
  //         [
  //           championInfo.id,
  //           championInfo.key,
  //           versionId,
  //           championInfo.name,
  //           championInfo.title,
  //           JSON.stringify(championInfo.image),
  //           JSON.stringify(championInfo.skins),
  //           championInfo.lore || '',
  //           championInfo.blurb || '',
  //           JSON.stringify(championInfo.allytips || []),
  //           JSON.stringify(championInfo.enemytips || []),
  //           JSON.stringify(championInfo.tags),
  //           championInfo.partype || '',
  //           JSON.stringify(championInfo.info),
  //           JSON.stringify(championInfo.stats),
  //           JSON.stringify(championInfo.spells),
  //           JSON.stringify(championInfo.passive),
  //         ],
  //       )
  //     }

  //     await client.query('COMMIT')
  //     console.log(`Salvati ${Object.keys(data).length} champions per versione ${versionId}`)
  //   } catch (error) {
  //     await client.query('ROLLBACK')
  //     console.log('Error saving champions:', error)
  //     throw error
  //   } finally {
  //     client.release()
  //   }
  // }

  async saveChampions() {
    const client = await connect()

    try {
      await client.query('BEGIN')

      const result = await client.query(
        'SELECT id, version FROM game_versions WHERE is_current = TRUE LIMIT 1',
      )

      if (result.rows.length === 0) {
        throw new Error('No current version found')
      }

      const version = result.rows[0].version
      const version_id = result.rows[0].id

      const champions = await riotApiService.getAllChampion(version)

      for (const champion of Object.values(champions.data)) {
        const championData = await riotApiService.getChampionData(champion.id, version)
        const data = championData.data[champion.id]

        await client.query(
          `
            INSERT INTO champions (
                champion_id, champion_key, version_id, name, title,
                image, skins, lore, blurb, allytips, enemytips,
                tags, partype, info, stats, spells, passive
            ) VALUES ($1, $2, $3, $4, $5, $6, $7, $8, $9, $10, $11, $12, $13, $14, $15, $16, $17)
            ON CONFLICT (champion_key, version_id) DO NOTHING
          `,
          [
            data.id,
            data.key,
            version_id,
            data.name,
            data.title,
            JSON.stringify(data.image),
            JSON.stringify(data.skins),
            data.lore || '',
            data.blurb || '',
            JSON.stringify(data.allytips || ''),
            JSON.stringify(data.enemytips || ''),
            JSON.stringify(data.tags),
            data.partype,
            JSON.stringify(data.info),
            JSON.stringify(data.stats),
            JSON.stringify(data.spells),
            JSON.stringify(data.passive),
          ],
        )
      }
      await client.query('COMMIT')
      console.log('Fine import')
    } catch (error) {
      await client.query('ROLLBACK')
      console.log('Error saving champions:', error)
      throw error
    } finally {
      client.release()
    }
  }

  async getChampionByKey(championKey, versionId = null) {
    let query = `
            SELECT c.*, gv.version
            FROM champions c
            JOIN game_versions gv ON c.version_id = gv.id
            WHERE c.champion_key = $1
        `
    let params = [championKey]

    if (versionId) {
      query += ' AND c.version_id = $2'
      params.push(versionId)
    } else {
      query += ' AND gv.is_current = TRUE'
    }

    const result = await _query(query, params)
    return result.rows[0]
  }

  async searchChampions(searchTerm, versionid = null) {
    let query = `
            SELECT c.champion_id, c.name, c.title, c.image, gv.version
            FROM champions c
            JOIN game_versions gv ON c.version_id = gv.id
            WHERE (c.name ILIKE $1 OR c.title ILIKE $1)
        `
    let params = [`%${searchTerm}%`]

    if (versionid) {
      query += ' AND c.version_id = $2'
      params.push(versionid)
    } else {
      query += ' AND gv.is_current = TRUE'
    }

    query += ' ORDER BY c.name'

    const result = await _query(query, params)
    return result.rows
  }
}

export default new ChampionService()
