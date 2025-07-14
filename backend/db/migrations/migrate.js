const fs = require('fs');
const path = require('path');
const pool = require('../connection');

async function runMigration() {
    const migrationsDir = path.join(__dirname, '../migrations');

    try {
        const files = fs.readdirSync(migrationsDir)
            .filter(file => file.endsWith('.sql'))
            .sort();

            console.log(`Found ${files.length} migrations`);

            for (const file of files) {
                console.log(`Executing Migration: ${file}`);

                const sqlContent = fs.readFileSync(
                    path.join(migrationsDir, file),
                    'utf8'
                );

                await pool.query(sqlContent);
                console.log(`Migration ${file} completed`);
            }

            console.log('All migration completed');
    } catch (error) {
        console.error('Error: ', error);
        throw error;
    } finally {
        await pool.end();
    }
}

if (require.main === module) {
    runMigration().catch(console.error);
}

module.exports = { runMigration };