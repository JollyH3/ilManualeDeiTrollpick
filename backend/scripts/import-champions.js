import championService from '../services/championService.js'
import pool from '../db/connection.js'
;``
async function importChampions() {
  try {
    const currentVersion = await pool.query(
      'SELECT id, version FROM game_versions WHERE is_current = TRUE',
    )

    if (currentVersion.rows.length === 0) {
      console.log('No current version, execute version.js')
      return
    }

    const { id: versionId, version } = currentVersion.rows[0]
    console.log(`Import champion for version ${version}...`)

    await championService.saveChampionsForVersion(versionId, version)
    console.log('Champion insertion successfully')
  } catch (error) {
    console.error('Error import champions', error)
  } finally {
    await pool.end()
  }
}

// eslint-disable-next-line no-undef
if (require.main === module) {
  importChampions()
}

// eslint-disable-next-line no-undef
module.exports = importChampions
