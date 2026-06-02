CREATE TABLE times_futebol(
	id SERIAL PRIMARY KEY,
	nome VARCHAR(255),
	fundacao VARCHAR(50),
	estadio VARCHAR(255),
	cor_principal VARCHAR(100)
);

CREATE TABLE jogadores(
	id SERIAL PRIMARY KEY,
	nome VARCHAR(255),
	posicao VARCHAR(100),
	numero INTEGER,
	nacionalidade VARCHAR(100),
	time_id INTEGER REFERENCES times_futebol(id)
);
