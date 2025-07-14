import { query, connect } from '../db/connection'

class VersionService {
  async checkForUpdates() {
    try {
      const response = await fetch('https://ddragon.leagueoflegends.com/api/versions.json')
      const versions = await response.json()

      const latestVersion = versions[0]

      const exisisting = await query('SELECT * FROM game_versions WHERE version = $1', [
        latestVersion,
      ])

      if (exisisting.rows.length === 0) {
        console.log(`New version find ${latestVersion}`)
        return latestVersion
      }

      console.log(`Version ${latestVersion} already present`)
      return null
    } catch (error) {
      console.error('Error check versions: ', error)
      throw error
    }
  }

  async saveNewVersion(version) {
    const client = await connect()

    try {
      await client.query('BEGIN')

      await client.query('UPDATE game_versions SET is_current = FALSE')

      const result = await client.query(
        'INSERT INTO game_versions (version, is_current) VALUES ($1, TRUE) RETURNING id',
        [version],
      )

      await client.query('COMMIT')
      console.log(`Version ${version} saved with ID: ${result.rows[0].id}`)
      return result.rows[0].id
    } catch (error) {
      await client.query('ROLLBACK')
      throw error
    } finally {
      client.release()
    }
  }
}

export default new VersionService()

// if (require.main === module) {
//   async function test() {
//     try {
//       console.log('🔍 Controllo versioni...')
//       // eslint-disable-next-line no-undef
//       const newVersion = await checkForUpdates()

//       if (newVersion) {
//         console.log('Salvo nuova versione...')
//         // eslint-disable-next-line no-undef
//         await saveNewVersion(newVersion)
//       }
//     } catch (error) {
//       console.error('Errore:', error)
//     }
//   }

//   test()
// }
