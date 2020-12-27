CREATE SCHEMA IF NOT EXISTS explicaFeup;
SET search_path to explicaFeup;

CREATE TABLE IF NOT EXISTS Userr(
    userName VARCHAR(100) PRIMARY KEY ,
    email VARCHAR(100),
    phone VARCHAR(100),
    name VARCHAR(100),
    passHash VARCHAR(200),
    nif VARCHAR(100),
    image VARCHAR(100),
    birthDate DATE,
    role INTEGER DEFAULT 0,
    about text,
    hobbies text,
    color VARCHAR(20) DEFAULT '#1B49C2'
);

CREATE TABLE IF NOT EXISTS Student(
    userName VARCHAR(100) REFERENCES Userr(userName) ON UPDATE CASCADE ON DELETE CASCADE PRIMARY KEY ,
	grade FLOAT default 0
);

CREATE TABLE IF NOT EXISTS Teacher(
    username VARCHAR(100) REFERENCES Userr(userName) ON UPDATE CASCADE ON DELETE CASCADE  PRIMARY KEY ,
	salary FLOAT default 0
);

CREATE TABLE IF NOT EXISTS Orderr(
    number SERIAL PRIMARY KEY,
    deliveryDate VARCHAR(30) DEFAULT to_char(now(), 'DD-MM-YYYY HH:MI:SS'::text),
    purchaseDate VARCHAR(30) DEFAULT to_char(now(), 'DD-MM-YYYY HH:MI:SS'::text),
    price VARCHAR(100),
    productName VARCHAR(100),
    description VARCHAR(100),
    idStudent VARCHAR(100) REFERENCES Student(username) ON UPDATE CASCADE ON DELETE CASCADE 
);

CREATE TABLE IF NOT EXISTS Salary(
    id SERIAL PRIMARY KEY,
    userName VARCHAR(100) REFERENCES Teacher(username) ON UPDATE CASCADE ON DELETE CASCADE ,
    salary FLOAT default 0,
    salaryDate VARCHAR(100)
);

CREATE TABLE IF NOT EXISTS Course(
    courseName VARCHAR(50) PRIMARY KEY,
    price VARCHAR(30),
    teacher VARCHAR(100) REFERENCES Teacher(username) ON UPDATE CASCADE ON DELETE CASCADE ,
    image VARCHAR(30),
    type VARCHAR(30),
    details text
);

CREATE TABLE IF NOT EXISTS Enrolled(
    userName VARCHAR(100) REFERENCES Student(userName) ON UPDATE CASCADE ON DELETE CASCADE,
    courseName VARCHAR(100) REFERENCES Course(courseName) ON DELETE CASCADE,
    courseGrade FLOAT default -1,
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
