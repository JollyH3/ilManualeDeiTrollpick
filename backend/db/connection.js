import { Pool } from 'pg'

const pool = new Pool({
  user: 'postgres',
  host: 'localhost',
  database: 'trollpick',
  password: 'trollpick1234',
  port: 5432,
})

pool.on('connect', () => {
  console.log('PostgreSQL connected')
})

pool.on('error', (err) => {
  console.error('Error PosgreSQL', err)
})

export default pool

export const connect = () => pool.connect()
export const query = (text, params) => pool.query(text, params)
