# Documentação das 6 APIs Utilizadas (BrasilAPI)

Base URL: `https://brasilapi.com.br/api`

---

## 1. CEP v2

**Endpoint:** `GET /cep/v2/{cep}`

**O que precisa ser enviado:**
- `{cep}` — 8 dígitos numéricos no path (ex: `01310100`)

**O que retorna:**
```json
{
  "cep": "01310100",
  "state": "SP",
  "city": "São Paulo",
  "neighborhood": "Bela Vista",
  "street": "Avenida Paulista",
  "service": "open-cep"
}
```

**Exemplo de uso:**
```
GET https://brasilapi.com.br/api/cep/v2/01310100
```

---

## 2. CNPJ

**Endpoint:** `GET /cnpj/v1/{cnpj}`

**O que precisa ser enviado:**
- `{cnpj}` — 14 dígitos numéricos no path (sem pontos, barras ou hífen)

**O que retorna:**
- `razao_social`, `nome_fantasia`, `cnpj`, `uf`, `municipio`
- `descricao_situacao_cadastral` (Ativa, Baixada, etc.)
- `atividade_principal` (array com código e descrição)

**Exemplo de uso:**
```
GET https://brasilapi.com.br/api/cnpj/v1/19131243000197
```

---

## 3. Feriados Nacionais

**Endpoint:** `GET /feriados/v1/{ano}`

**O que precisa ser enviado:**
- `{ano}` — ano com 4 dígitos no path (ex: `2026`)

**O que retorna:**
```json
[
  { "date": "2026-01-01", "name": "Confraternização Mundial", "type": "national" },
  ...
]
```

**Exemplo de uso:**
```
GET https://brasilapi.com.br/api/feriados/v1/2026
```

---

## 4. DDD

**Endpoint:** `GET /ddd/v1/{ddd}`

**O que precisa ser enviado:**
- `{ddd}` — 2 dígitos numéricos no path (ex: `51`)

**O que retorna:**
```json
{
  "state": "RS",
  "cities": ["Lajeado", "Porto Alegre", "Caxias do Sul", ...]
}
```

**Exemplo de uso:**
```
GET https://brasilapi.com.br/api/ddd/v1/51
```

---

## 5. Bancos

**Endpoint:** `GET /banks/v1`

**O que precisa ser enviado:**
- Nada (sem parâmetros)

**O que retorna:**
```json
[
  {
    "ispb": "00000000",
    "name": "BCO DO BRASIL S.A.",
    "code": 1,
    "fullName": "Banco do Brasil S.A."
  },
  ...
]
```

**Exemplo de uso:**
```
GET https://brasilapi.com.br/api/banks/v1
```

---

## 6. IBGE — Municípios por Estado

**Endpoint:** `GET /ibge/municipios/v1/{siglaUF}`

**O que precisa ser enviado:**
- `{siglaUF}` — sigla do estado com 2 letras (ex: `RS`, `SP`, `MG`)

**O que retorna:**
```json
[
  { "nome": "Lajeado", "codigo_ibge": "4311403" },
  { "nome": "Porto Alegre", "codigo_ibge": "4314902" },
  ...
]
```

**Exemplo de uso:**
```
GET https://brasilapi.com.br/api/ibge/municipios/v1/RS
```
