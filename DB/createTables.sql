CREATE SCHEMA IF NOT EXISTS explicaFeup;
SET search_path to explicaFeup;

CREATE TABLE IF NOT EXISTS Userr(
    userName VARCHAR(100) PRIMARY KEY ,
    email VARCHAR(100),
    phone VARCHAR(100),
    name VARCHAR(100),
    passHash VARCHAR(200),
    nif VARCHAR(100),
    image bytea,
    birthDate DATE,
    role INTEGER
);

CREATE TABLE IF NOT EXISTS Student(
    userName VARCHAR(100) REFERENCES Userr(userName) ON UPDATE CASCADE PRIMARY KEY ,
	grade FLOAT default 0
);

CREATE TABLE IF NOT EXISTS Teacher(
    username VARCHAR(100) REFERENCES Userr(userName) ON UPDATE CASCADE PRIMARY KEY ,
	salary FLOAT default 0
);

CREATE TABLE IF NOT EXISTS Orderr(
    number SERIAL PRIMARY KEY,
    deliveryDate VARCHAR(30),
    purchaseDate VARCHAR(30),
    price VARCHAR(100),
    productName VARCHAR(100),
    description VARCHAR(100),
    idStudent VARCHAR(100) REFERENCES Student(username) ON UPDATE CASCADE
);

CREATE TABLE IF NOT EXISTS Salary(
    id SERIAL PRIMARY KEY,
    userName VARCHAR(100) REFERENCES Teacher(username) ON UPDATE CASCADE,
    salary FLOAT default 0,
    salaryDate VARCHAR(100)
);

CREATE TABLE IF NOT EXISTS Course(
    courseName VARCHAR(50) PRIMARY KEY,
    price VARCHAR(30),
    teacher VARCHAR(100) REFERENCES Teacher(username) ON UPDATE CASCADE,
    image VARCHAR(30),
    type VARCHAR(30)
);

CREATE TABLE IF NOT EXISTS Enrolled(
    userName VARCHAR(100) REFERENCES Student(userName) ON UPDATE CASCADE ON DELETE CASCADE,
    courseName VARCHAR(100) REFERENCES Course(name) ON DELETE CASCADE,
    courseGrade FLOAT default 0,
    PRIMARY KEY(userName, courseName)
);            

CREATE TABLE IF NOT EXISTS Admin(
    username VARCHAR(100) REFERENCES Userr(userName) ON UPDATE CASCADE PRIMARY KEY
);        

CREATE TABLE IF NOT EXISTS Video(
    id SERIAL PRIMARY KEY,
    youtubeLink VARCHAR(100),
    courseName VARCHAR(100) REFERENCES Course(coursename) ON DELETE CASCADE
);            
