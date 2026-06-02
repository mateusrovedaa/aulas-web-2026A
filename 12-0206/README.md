# Aula 12 — CRUD PHP/PostgreSQL + consumo de API

CRUD completo (Create, Read, Update, Delete) de times de futebol usando PHP e PostgreSQL, com exemplos simples de consumo de API no frontend.

---

## Estrutura de arquivos

```
12-0206/
├── view/
│   ├── lista.php             ← listagem de times com botões Editar e Deletar
│   ├── cadastra.php          ← formulário de cadastro
│   ├── edita.php             ← formulário de edição pré-preenchido
│   ├── deleta.php            ← processa a exclusão (só aceita POST)
│   └── apis.php              ← exemplos de consumo de API com JavaScript e fetch
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

## Consumo de API no frontend

A página `view/apis.php` mostra consumo direto de API no navegador usando JavaScript e `fetch()`.

APIs usadas:

- ViaCEP: consulta dados de endereço por CEP.
- Rick and Morty API: consulta dados de personagens por id.

### Como acessar

Com o Docker rodando:

```txt
http://localhost:8080/view/apis.php
```

### Exemplo com ViaCEP

```js
const resposta = await fetch('https://viacep.com.br/ws/01001000/json/');
const dados = await resposta.json();
```

O JavaScript monta a URL com o CEP informado, chama a API do ViaCEP e mostra o JSON retornado na tela.

### Exemplo com Rick and Morty

```js
const resposta = await fetch('https://rickandmortyapi.com/api/character/1');
const dados = await resposta.json();
```

O JavaScript monta a URL com o id informado, chama a API de personagens e mostra os dados retornados na tela.

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
