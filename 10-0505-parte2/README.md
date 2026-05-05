# Aula 10 — CRUD com PHP e PostgreSQL

Cadastro e listagem de times de futebol usando PHP e PostgreSQL.

---

## Estrutura de arquivos

```
10-0505/
├── view/
│   ├── lista.php             ← listagem de times (ponto de entrada)
│   └── cadastra.php          ← formulário de cadastro (ponto de entrada)
├── controller/
│   └── TimeController.php    ← recebe o POST e coordena o salvamento
├── dao/
│   └── TimeDao.php           ← faz as queries no banco (INSERT, SELECT)
├── model/
│   └── TimeFutebol.php       ← representa um time (só dados, sem banco)
├── Database.php              ← abre a conexão com o PostgreSQL
└── creates.sql               ← script SQL para criar a tabela
```

---

## Arquitetura em camadas

O projeto segue o padrão **MVC (Model, View, Controller)**, com uma camada extra de **DAO**.

MVC é uma forma de organizar o código separando três responsabilidades:

- **Model** — representa os dados da aplicação. No nosso caso, um objeto `TimeFutebol` com nome, fundação, estádio e cor. Não sabe nada sobre banco de dados ou HTML.
- **View** — é o que o usuário vê. Só exibe dados, não faz cálculos nem acessa banco.
- **Controller** — é o intermediário. Recebe a ação do usuário (ex: clicou em "Cadastrar"), coordena o que precisa acontecer e decide para onde ir.

A camada extra **DAO (Data Access Object)** isola tudo que é SQL. O Controller não escreve query, ele delega ao DAO.

```
view/         → o que o usuário vê (HTML)
controller/   → o que acontece quando o usuário age (POST)
dao/          → como os dados são salvos/buscados no banco
model/        → como um "time" é representado no código
```

Cada camada faz uma coisa só. Isso facilita manutenção e leitura.

---

## Fluxo de uma requisição

**Acessar a listagem:**
```
Navegador acessa /view/lista.php
  └── lista.php chama TimeController::listar()
        └── TimeController chama TimeDao::listar()
              └── TimeDao consulta o banco e retorna uma lista de objetos TimeFutebol
  └── lista.php exibe os dados em uma tabela HTML
```

**Cadastrar um time:**
```
Navegador acessa /view/cadastra.php  →  exibe o formulário

Usuário preenche e clica em Cadastrar  →  POST para o próprio cadastra.php
  └── cadastra.php chama TimeController::salvar()
        └── TimeController cria um objeto TimeFutebol com os dados do $_POST
        └── TimeController chama TimeDao::salvar()
              └── TimeDao executa um INSERT no banco
  └── Redireciona para lista.php
```

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
