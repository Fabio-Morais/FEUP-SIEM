CREATE SCHEMA IF NOT EXISTS explicaFeup;
SET search_path to explicaFeup;

CREATE TABLE IF NOT EXISTS Cliente(
	id SERIAL PRIMARY KEY,
	nome VARCHAR(100),
    telefone VARCHAR(100),
    email VARCHAR(100),
    nif VARCHAR(20)
);

CREATE TABLE IF NOT EXISTS Userr(
    userName VARCHAR(100) PRIMARY KEY,
    email VARCHAR(100),
    telefone VARCHAR(100),
    nome VARCHAR(100),
    passHash VARCHAR(200),
    nif VARCHAR(100),
    imagem bytea,
    dataNascimento DATE,
    nivel INTEGER
);

CREATE TABLE IF NOT EXISTS Aluno(
    userName VARCHAR(100) REFERENCES Userr(userName) PRIMARY KEY ,
	notaAluno FLOAT default 0
);

CREATE TABLE IF NOT EXISTS Professor(
    username VARCHAR(100) REFERENCES Userr(userName) PRIMARY KEY ,
	salario FLOAT default 0
);

CREATE TABLE IF NOT EXISTS Encomenda(
    numero SERIAL PRIMARY KEY,
    dataEntrega VARCHAR(30),
    dataDeCompra VARCHAR(30),
    preco VARCHAR(100),
    nomeProduto VARCHAR(100),
    descricao VARCHAR(100),
    idCliente INTEGER REFERENCES Cliente(id) ON DELETE CASCADE,
    idAluno VARCHAR(100) REFERENCES Aluno(username) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS Salario(
    id SERIAL PRIMARY KEY,
    userName VARCHAR(100) REFERENCES Professor(username),
    salario FLOAT default 0,
    dataSalario VARCHAR(100)
);

CREATE TABLE IF NOT EXISTS Curso(
    nome VARCHAR(50) PRIMARY KEY,
    preco VARCHAR(30)
);

CREATE TABLE IF NOT EXISTS Enrolled(
    idAluno VARCHAR(100) REFERENCES Aluno(username) ON DELETE CASCADE,
    nomeCurso VARCHAR(100) REFERENCES Curso(nome) ON DELETE CASCADE,
    notaCurso FLOAT default 0,
    PRIMARY KEY(idAluno, nomeCurso)
);            

CREATE TABLE IF NOT EXISTS Admin(
    username VARCHAR(100) REFERENCES Userr(userName) PRIMARY KEY
);        
