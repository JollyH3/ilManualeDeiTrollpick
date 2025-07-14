// test-connection.js
const pool = require('./db/connection');

async function testConnection() {
  try {
    // Prova una query semplice
    const result = await pool.query('SELECT NOW() as current_time');
    console.log('🕐 Ora del database:', result.rows[0].current_time);
    
    // Chiudi la connessione
    await pool.end();
    console.log('✅ Test completato');
  } catch (error) {
    console.error('❌ Errore di connessione:', error.message);
  }
}

testConnection();