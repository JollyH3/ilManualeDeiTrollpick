CREATE TABLE IF NOT EXISTS game_versions (
    id SERIAL PRIMARY KEY,
    version VARCHAR(20) UNIQUE NOT NULL,
    is_current BOOLEAN DEFAULT false,
    fetched_at  TIMESTAMP DEFAULT NOW()
);

CREATE INDEX IF NOT EXISTS idx_game_versions_current ON game_versions(is_current) WHERE is_current = TRUE;

CREATE TABLE IF NOT EXISTS champions (
    id SERIAL PRIMARY KEY,
    champion_id VARCHAR(50) NOT NULL,
    champion_key VARCHAR(10) NOT NULL,
    version_id INTEGER REFERENCES game_versions(id) ON DELETE CASCADE,
    name VARCHAR(50) NOT NULL,
    title VARCHAR(144) NOT NULL,
    image JSONB NOT NULL,
    skins JSONB NOT NULL,
    lore TEXT DEFAULT '',
    blurb TEXT DEFAULT '',
    allytips JSONB DEFAULT '[]'::jsonb,
    enemytips JSONB DEFAULT '[]'::jsonb,
    tags JSONB NOT NULL,
    partype VARCHAR(50) DEFAULT '',
    info JSONB,
    stats JSONB,
    spells JSONB,
    passive JSONB,
    created_at TIMESTAMP DEFAULT NOW(),
    UNIQUE(champion_key, version_id)
);

CREATE INDEX IF NOT EXISTS idx_champion_id ON champions(champion_id);
CREATE INDEX IF NOT EXISTS idx_champion_key ON champions(champion_key);
CREATE INDEX IF NOT EXISTS idx_champion_version ON champions(version_id);

-- Indice composito più efficace
CREATE INDEX IF NOT EXISTS idx_champion_version_current ON champions(version_id, champion_key);

CREATE INDEX IF NOT EXISTS idx_champion_tags ON champions USING GIN(tags);
CREATE INDEX IF NOT EXISTS idx_champion_stats ON champions USING GIN(stats);
