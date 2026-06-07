require('dotenv').config();

const express     = require('express');
const cors        = require('cors');
const fs          = require('fs');
const timesRoutes = require('./src/routes/times');

const app         = express();
const PORT        = process.env.PORT || 8080;
const swaggerHtml = fs.readFileSync(__dirname + '/docs/swagger.html', 'utf8');

app.use(cors());
app.use(express.json());

// Documentação interativa
app.get('/docs', (_req, res) => res.send(swaggerHtml));

// Rotas da API
app.use('/times', timesRoutes);

// Rota não encontrada
app.use((_req, res) => res.status(404).json({ erro: 'Rota não encontrada' }));

app.listen(PORT, () => console.log(`API rodando em http://localhost:${PORT}`));
