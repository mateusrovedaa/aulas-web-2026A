const { Pool } = require('pg');

// Pool de conexões com o PostgreSQL — reutiliza conexões para melhor desempenho
const pool = new Pool({
    host:     process.env.DB_HOST,
    port:     process.env.DB_PORT,
    database: process.env.DB_NAME,
    user:     process.env.DB_USER,
    password: process.env.DB_PASS,
});

module.exports = pool;
