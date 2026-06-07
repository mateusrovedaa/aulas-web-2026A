# Backend Node.js — API Times de Futebol

API REST implementada em **Node.js** com Express e PostgreSQL.
Expõe os mesmos endpoints que o `backend-php` — o frontend não precisa saber qual backend está rodando.

## Como rodar

```bash
cp .env.example .env
docker compose up --build
```

Acesse `http://localhost:8080/docs` para a documentação interativa (Swagger UI).

## Endpoints

| Método   | Rota          | Descrição                |
|----------|---------------|--------------------------|
| `GET`    | `/times`      | Lista todos os times     |
| `GET`    | `/times/{id}` | Busca um time por ID     |
| `POST`   | `/times`      | Cria um novo time        |
| `PUT`    | `/times/{id}` | Atualiza um time         |
| `DELETE` | `/times/{id}` | Remove um time           |
| `GET`    | `/docs`       | Documentação Swagger UI  |

## Formato do objeto Time

```json
{
  "id": 1,
  "nome": "Grêmio",
  "fundacao": "1903",
  "estadio": "Arena do Grêmio",
  "cor_principal": "Azul"
}
```

## Estrutura

```
backend-nodejs/
├── app.js                  # Ponto de entrada — Express + rotas
├── package.json
├── src/
│   ├── database.js         # Pool de conexões com o PostgreSQL
│   ├── model/
│   │   └── timeFutebol.js  # Entidade (Model)
│   ├── dao/
│   │   └── timeDao.js      # Acesso ao banco (DAO)
│   └── routes/
│       └── times.js        # Rotas /times e /times/:id
├── docs/
│   └── swagger.html        # Documentação Swagger UI
├── Dockerfile
├── compose.yaml
├── creates.sql             # DDL das tabelas
└── .env.example
```
