# Aula 11 — CRUD completo com PHP e PostgreSQL

CRUD completo (Create, Read, Update, Delete) de times de futebol usando PHP e PostgreSQL.

---

## Estrutura de arquivos

```
11-1905/
├── view/
│   ├── lista.php             ← listagem de times com botões Editar e Deletar
│   ├── cadastra.php          ← formulário de cadastro
│   ├── edita.php             ← formulário de edição pré-preenchido
│   └── deleta.php            ← processa a exclusão (só aceita POST)
├── controller/
│   └── TimeController.php    ← coordena todas as ações (salvar, listar, atualizar, deletar)
├── dao/
│   └── TimeDao.php           ← queries no banco (INSERT, SELECT, UPDATE, DELETE)
├── model/
│   └── TimeFutebol.php       ← representa um time (só dados, sem banco)
├── Database.php              ← abre a conexão com o PostgreSQL
└── creates.sql               ← script SQL para criar a tabela
```

---

## Arquitetura em camadas

O projeto segue o padrão **MVC (Model, View, Controller)**, com uma camada extra de **DAO**.

- **Model** — representa os dados da aplicação. Um objeto `TimeFutebol` com nome, fundação, estádio e cor. Não sabe nada sobre banco de dados ou HTML.
- **View** — é o que o usuário vê. Só exibe dados, não faz cálculos nem acessa banco.
- **Controller** — é o intermediário. Recebe a ação do usuário, coordena o que precisa acontecer e decide para onde redirecionar.
- **DAO (Data Access Object)** — isola tudo que é SQL. O Controller não escreve query, ele delega ao DAO.

```
view/         → o que o usuário vê (HTML)
controller/   → o que acontece quando o usuário age (POST/GET)
dao/          → como os dados são manipulados no banco (INSERT, SELECT, UPDATE, DELETE)
model/        → como um "time" é representado no código
```

---

## Fluxo de cada operação

**Listar (Read):**
```
GET /view/lista.php
  └── TimeController::listar()
        └── TimeDao::listar()  →  SELECT * FROM times_futebol
  └── exibe tabela HTML com colunas Editar / Deletar por linha
```

**Cadastrar (Create):**
```
GET  /view/cadastra.php          →  exibe formulário vazio
POST /view/cadastra.php
  └── TimeController::salvar()
        └── TimeDao::salvar()  →  INSERT INTO times_futebol
  └── redireciona para lista.php
```

**Editar (Update):**
```
GET  /view/edita.php?id=X
  └── TimeController::buscarPorId(X)
        └── TimeDao::buscarPorId()  →  SELECT * FROM times_futebol WHERE id = ?
  └── exibe formulário pré-preenchido com os dados atuais

POST /view/edita.php
  └── TimeController::atualizar()
        └── TimeDao::atualizar()  →  UPDATE times_futebol SET ... WHERE id = ?
  └── redireciona para lista.php
```

**Deletar (Delete):**
```
POST /view/deleta.php  (disparado pelo botão na listagem, com confirm() no browser)
  └── TimeController::deletar()
        └── TimeDao::deletar()  →  DELETE FROM times_futebol WHERE id = ?
  └── redireciona para lista.php
```

> A exclusão usa sempre POST (nunca GET) para evitar que um link ou pré-carregamento do navegador apague dados acidentalmente.

---

## Banco de dados

Execute o `creates.sql` para criar a tabela:

```sql
CREATE TABLE times_futebol (
    id            SERIAL PRIMARY KEY,
    nome          VARCHAR(255),
    fundacao      VARCHAR(50),
    estadio       VARCHAR(255),
    cor_principal VARCHAR(100)
);
```
