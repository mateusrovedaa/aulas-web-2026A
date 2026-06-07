# Frontend — Times de Futebol

Interface HTML/CSS/JS que consome a API REST em `http://localhost:8080`.
Não importa se o backend é PHP ou Node.js — o frontend não sabe e não precisa saber.

## Como rodar

Suba **um** dos backends (nunca os dois ao mesmo tempo, pois ambos usam a porta 8080):

```bash
# Opção A: PHP
cd ../backend-php
cp .env.example .env
docker compose up --build

# Opção B: Node.js
cd ../backend-nodejs
cp .env.example .env
docker compose up --build
```

Em seguida, sirva o frontend com qualquer servidor HTTP local:

```bash
# Python (disponível em qualquer sistema com Python 3)
python3 -m http.server 3000

# Node.js (npx não requer instalação)
npx serve .
```

Acesse `http://localhost:3000` no navegador.

> O frontend **não pode** ser aberto como `file://` pois o navegador bloquearia
> as requisições `fetch` para `localhost:8080` por política de segurança (CORS).

## O que demonstra

- O frontend aponta fixamente para `http://localhost:8080`.
- Qualquer backend que implemente o mesmo contrato de API funciona sem nenhuma alteração neste arquivo.
- A separação entre frontend e backend é total.
