const express     = require('express');
const TimeFutebol = require('../model/timeFutebol');
const dao         = require('../dao/timeDao');

const router = express.Router();

// GET /times — lista todos
router.get('/', async (_req, res) => {
    try {
        const times = await dao.listar();
        res.json(times.map(t => t.toJSON()));
    } catch (err) {
        res.status(500).json({ erro: 'Erro interno do servidor' });
    }
});

// GET /times/:id — busca por ID
router.get('/:id', async (req, res) => {
    try {
        const time = await dao.buscarPorId(req.params.id);
        if (!time) return res.status(404).json({ erro: 'Time não encontrado' });
        res.json(time.toJSON());
    } catch (err) {
        res.status(500).json({ erro: 'Erro interno do servidor' });
    }
});

// POST /times — cria
router.post('/', async (req, res) => {
    try {
        const { nome, fundacao, estadio, cor_principal } = req.body;
        const time = new TimeFutebol(nome, fundacao, estadio, cor_principal);
        await dao.salvar(time);
        res.status(201).json({ mensagem: 'Time criado com sucesso' });
    } catch (err) {
        res.status(500).json({ erro: 'Erro interno do servidor' });
    }
});

// PUT /times/:id — atualiza
router.put('/:id', async (req, res) => {
    try {
        const { nome, fundacao, estadio, cor_principal } = req.body;
        const time = new TimeFutebol(nome, fundacao, estadio, cor_principal, req.params.id);
        await dao.atualizar(time);
        res.json({ mensagem: 'Time atualizado com sucesso' });
    } catch (err) {
        res.status(500).json({ erro: 'Erro interno do servidor' });
    }
});

// DELETE /times/:id — remove
router.delete('/:id', async (req, res) => {
    try {
        await dao.deletar(req.params.id);
        res.json({ mensagem: 'Time removido com sucesso' });
    } catch (err) {
        res.status(500).json({ erro: 'Erro interno do servidor' });
    }
});

module.exports = router;
