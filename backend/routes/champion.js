import express from 'express'
const router = express.Router()
import pool from '../db/connection.js'

router.get('/champions/list', async (req, res) => {
  try {
    const result = await pool.query(
      `
        SELECT c.name, c.image, c.champion_id, c.id FROM champions c
        LEFT JOIN game_versions gv ON c.version_id = gv.id
        WHERE gv.is_current = TRUE
      `,
    )

    if (result.rows.length === 0) {
      return res.status(404).json({ error: 'No current version found' })
    }

    res.json({
      champions: result.rows,
    })
  } catch (error) {
    console.error('Error fetching champions:', error)
    res.status(500).json({ error: 'Internal server error' })
  }
})

router.get('/champion/:championName', async (req, res) => {
  try {
    const championName = req.params.championName

    if (!championName || championName.length < 2) {
      return res.status(400).json({ error: 'Champion Name not valid' })
    }

    const result = await pool.query(
      `
        SELECT * FROM champions WHERE LOWER(name) = LOWER($1)
      `,
      [championName],
    )

    if (result.rows.length === 0) {
      return res.status(404).json({ error: 'Champion not found' })
    }

    res.json({
      success: true,
      champion: result.rows[0],
    })
  } catch (error) {
    console.error('Error:', error)
    res.status(500).json({ error: 'Internal server error' })
  }
})

export default router
