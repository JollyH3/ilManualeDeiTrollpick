import express from 'express'
const router = express.Router()
import pool from '../db/connection.js'

router.get('/current', async (req, res) => {
  try {
    const result = await pool.query(
      'SELECT version FROM game_versions WHERE is_current = TRUE LIMIT 1',
    )

    if (result.rows.length === 0) {
      return res.status(404).json({ error: 'No current version found' })
    }

    res.json({
      lolVersion: result.rows[0].version,
      appVersion: '1.0.0',
    })
  } catch (error) {
    console.error('Error fetching current version:', error)
    res.status(500).json({ error: 'Internal server error' })
  }
})

export default router
