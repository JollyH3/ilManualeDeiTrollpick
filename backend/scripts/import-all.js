import importChampion from './import-champions.js'
// const importVersion = require('./import-version');

async function importAll() {
  try {
    console.log('Start import...')

    // await ImportVersion();
    // console.log('Versions Completed\n');

    await importChampion()
    console.log('Champions completed')
  } catch (error) {
    console.log('Error import:', error)
  }
}

importAll()
