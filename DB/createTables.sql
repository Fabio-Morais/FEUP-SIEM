CREATE SCHEMA IF NOT EXISTS explicaFeup;
SET search_path to explicaFeup;

CREATE TABLE IF NOT EXISTS Cliente(
	id SERIAL PRIMARY KEY,
	nome VARCHAR(100),
    email VARCHAR(100),
    nif VARCHAR(20)
);

CREATE TABLE IF NOT EXISTS Userr(
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
    username VARCHAR(100) REFERENCES Userr(userName) PRIMARY KEY,
	notaAluno FLOAT default 0
);

CREATE TABLE IF NOT EXISTS Professor(
    username VARCHAR(100) REFERENCES Userr(userName) PRIMARY KEY,
	salario FLOAT default 0
);

CREATE TABLE IF NOT EXISTS Encomenda(
    numero SERIAL PRIMARY KEY,
    dataEntrega TIMESTAMP,
    dataDeCompra TIMESTAMP,
    preco VARCHAR(100),
    nomeProduto VARCHAR(100),
    descricao VARCHAR(100),
    idCliente SERIAL REFERENCES Cliente(id) ON DELETE CASCADE,
    idAluno VARCHAR(100) REFERENCES Aluno(username) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS Salario(
    id SERIAL PRIMARY KEY,
    salario FLOAT default 0,
    dataDeCompra TIMESTAMP
);

CREATE TABLE IF NOT EXISTS Curso(
    nome VARCHAR(50) PRIMARY KEY
);

CREATE TABLE IF NOT EXISTS Enrolled(
    idAluno VARCHAR(100) REFERENCES Aluno(username),
    nomeCurso VARCHAR(100) REFERENCES Curso(nome),
    notaCurso FLOAT default 0,
    PRIMARY KEY(idAluno, nomeCurso)
);            

CREATE TABLE IF NOT EXISTS Admin(
    userName VARCHAR(50) PRIMARY KEY
);        
