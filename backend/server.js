import express from 'express'
import cors from 'cors'
import 'dotenv/config'

import versionRouters from './routes/versions.js'
import championRouters from './routes/champion.js'

const app = express()
const PORT = process.env.PORT || 3000

app.use(cors())
app.use(express.json())

app.use('/api/versions', versionRouters)
app.use('/api', championRouters)

app.get('/', (req, res) => {
  res.json({ message: 'Server Funzionante' })
})

app.listen(PORT, () => {
  console.log(`Server running on port ${PORT}`)
})
