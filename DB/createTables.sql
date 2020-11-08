CREATE SCHEMA IF NOT EXISTS explicaFeup;
SET search_path to explicaFeup;

CREATE TABLE IF NOT EXISTS Cliente(
	id SERIAL PRIMARY KEY,
	nome VARCHAR(100),
    email VARCHAR(100),
    nif VARCHAR(20)
);

CREATE TABLE IF NOT EXISTS Encomenda(
    id SERIAL PRIMARY KEY,
	numero VARCHAR(100),
    dataEntrega TIMESTAMP,
    dataDeCompra TIMESTAMP,
    preco VARCHAR(100)
);


CREATE TABLE IF NOT EXISTS Produto(
	id SERIAL PRIMARY KEY,
	nome VARCHAR(100),
    descricao VARCHAR(100),
    preco VARCHAR(15) default 0
);

CREATE TABLE IF NOT EXISTS User(
    userName VARCHAR(100) PRIMARY KEY,
    email VARCHAR(100),
    telefone VARCHAR(100),
    nome VARCHAR(100),
    passHash VARCHAR(100),
    nif VARCHAR(100),
    imagem VARCHAR(100),
    dataNascimento DATE
);

CREATE TABLE IF NOT EXISTS Aluno(
    id SERIAL PRIMARY KEY,
	nota FLOAT default 0
);

CREATE TABLE IF NOT EXISTS Professor(
    id SERIAL PRIMARY KEY,
	salario FLOAT default 0
);

CREATE TABLE IF NOT EXISTS Salario(
    id SERIAL PRIMARY KEY,
    salario FLOAT default 0,
    dataDeCompra TIMESTAMP
);

CREATE TABLE IF NOT EXISTS Curso(
    nome VARCHAR(50) PRIMARY KEY,
);        

CREATE TABLE IF NOT EXISTS Admin(
    userName VARCHAR(50) PRIMARY KEY,
);        
