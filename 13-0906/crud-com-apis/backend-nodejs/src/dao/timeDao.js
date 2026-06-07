const pool        = require('../database');
const TimeFutebol = require('../model/timeFutebol');

const TABELA = 'times_futebol';

async function listar() {
    const { rows } = await pool.query(`SELECT * FROM ${TABELA} ORDER BY id`);
    return rows.map(r => new TimeFutebol(r.nome, r.fundacao, r.estadio, r.cor_principal, r.id));
}

async function buscarPorId(id) {
    const { rows } = await pool.query(`SELECT * FROM ${TABELA} WHERE id = $1`, [id]);
    if (!rows[0]) return null;
    const r = rows[0];
    return new TimeFutebol(r.nome, r.fundacao, r.estadio, r.cor_principal, r.id);
}

async function salvar(time) {
    await pool.query(
        `INSERT INTO ${TABELA} (nome, fundacao, estadio, cor_principal) VALUES ($1, $2, $3, $4)`,
        [time.nome, time.fundacao, time.estadio, time.corPrincipal]
    );
}

async function atualizar(time) {
    await pool.query(
        `UPDATE ${TABELA} SET nome = $1, fundacao = $2, estadio = $3, cor_principal = $4 WHERE id = $5`,
        [time.nome, time.fundacao, time.estadio, time.corPrincipal, time.id]
    );
}

async function deletar(id) {
    await pool.query(`DELETE FROM ${TABELA} WHERE id = $1`, [id]);
}

module.exports = { listar, buscarPorId, salvar, atualizar, deletar };
