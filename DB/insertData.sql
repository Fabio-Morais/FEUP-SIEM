SET search_path to explicaFeup;

INSERT INTO Userr
VALUES('fabio123','fabio@hotmail.com','915487895','Fabio Andre', '$2y$10$VwAhND9H9voMR.rrlyd.8umf3B4M2YTMJ1mo7VDmUClRLIdaR.8q2', '266757014', null ,'08/12/1997',0, null, null, null),
('joao12','joao@hotmail.com','915487895','Joao Silva', '$2y$10$NnACkeR4nNWTYIrXaM5qF.udZYNNtLIb2CDLGS2QPIcMcALrvpCTa', '233487875', null ,'01/12/1998',0, null, null, null),
('rodrigo1','rodrigo@hotmail.com','915487895','Rodrigo Martins', '$2y$10$PSjSNAc.JESmfn9jOU/vP.eiGRuAO3wXY4nCaNYJU27kCdWUBwR8m', '268948550', null ,'02/23/1995',0, null, null, null),
('rodrigo123','rodrigo123@hotmail.com','915487895','Rodrigo Sousa', '$2y$10$PSjSNAc.JESmfn9jOU/vP.eiGRuAO3wXY4nCaNYJU27kCdWUBwR8m', '268948550', null ,'02/23/1995',0, null, null, null),
('rod4as','rod4as@hotmail.com','915387895','Joao Santos', '$2y$10$PSjSNAc.JESmfn9jOU/vP.eiGRuAO3wXY4nCaNYJU27kCdWUBwR8m', '268948550', null ,'05/03/1995',0, null, null, null),
('ana12','ana12@hotmail.com','915127895','Ana Silva', '$2y$10$PSjSNAc.JESmfn9jOU/vP.eiGRuAO3wXY4nCaNYJU27kCdWUBwR8m', '268948550', null ,'02/23/1985',0, null, null, null),
('rita123','rita123@hotmail.com','915487895','Rita Martins', '$2y$10$PSjSNAc.JESmfn9jOU/vP.eiGRuAO3wXY4nCaNYJU27kCdWUBwR8m', '268948550', null ,'05/22/1995',0, null, null, null),
('admin','electrusintelligentus@gmail.com','926901471','', '$2y$10$lPu1AU1qKkSmvmWTIDWHhecLZFEGdZG.rMCzm3EPHfx.fXIs0LTg.', '', null ,null,2, null, null, null),
('fabiouds','fabiouds@hotmail.com','926901937','Fabio Morais', '$2y$10$sTCYatGB7IYSLGcYK/Gz2.CZdvI31InCvHI2/HJ1KBuTJsEAoTIwi', '258975229', null ,'06/15/1997',1, null, null, null);


INSERT INTO Student
VALUES('fabio123', 12.5),
('joao12', 0),
('rodrigo1', 0),
('rodrigo123', 0),
('rod4as', 0),
('rita123', 0),
('ana12', 0);

INSERT INTO Teacher
VALUES('fabiouds', 1200);

INSERT INTO Admin
VALUES('admin');

INSERT INTO Course
VALUES('c++', '20', 'fabiouds', 'c++.png', 'soft', '<li> Programação em C e Metodologias de Desenvolvimento</li>
          <li>Programação de baixo-nível</li>
          <li>Conceitos Fundamentais de Algoritmia</li>
          <li>Estruturas de dados</li>
          <li>Programação orientada por objetos em C++</li>'),
('java', '20', 'fabiouds', 'java2.png', 'soft', '<li><b>Linguagem JAVA + Programação Orientada por Objectos:</b> sintaxe, conceitos, classes, coleções, genéricos, SWING, I/O, Concorrência.</li>
          <li><b>Linguagem de modelação UML:</b> conceitos gerais de modelação, diagramas de classes, estados e sequencia. Outros diagramas.</li>
          <li><b>Processos de Desenvolvimento de Software:</b> conceitos, metodologias, fases, práticas, ferramentas, artefactos, tecnologias emergentes.</li>'),
('python', '25', 'fabiouds', 'python.jpg', 'soft', '<li>Fundamentos da web com Python</li>
          <li>Criar scripts em Python e a usar APIs para recolher e processar dados de milhares de páginas Web ao mesmo tempo.</li>
          <li>Bibliotecas que vão lhe auxiliar nas tarefas de scraping como BeautifulSoup, LXML e Scrapy</li>
          <li>Utilizar o Selenium WebDriver</li>
          <li> criar programas para ler diversos tipos de documentos como CSV, PDF, DOCX, XLSX, JSON e ODT</li>'),
('web development', '30', null, 'web.png', 'web','<li><b>Bases de Dados:</b> modelação de dados em UML, modelo relacional, linguagem SQL.</li>
          <li><b>Linguagens e Tecnologias Web: </b>protocolo HTTP, linguagens HTML, CSS e JavaScript</li>
          <li><b>APIs: </b>Utilização de frameworks e API de acesso a dados</li>
          <li><b>PHP: </b>Principios básicos</li>
          <li><b>Wordpress: </b>Introdução ao desenvolvimento de websites através do wordpress</li>'),
('web apis', '20', null, 'apis.png', 'web', '<li>Introdução ao .NET CORE</li>
          <li>Construção de uma Web API (CRUD Completo)</li>
          <li>Publicação no Windows Azure</li>
          <li>Arquitetura MVC </li>
          <li>Criação de página de Help para Web API utilizando Swagger.</li>'),
('matematica', '15', null, 'math.jpg', 'ml','<li><b>ESTATÍSTICA DESCRITIVA:</b> Tipos de Dados e Escalas. Caracterização e Representação de Dados Categóricos, Quantitativos e Bivariados.</li>
          <li><b>PROBABILIDADES:</b> Experiências aleatórias, Espaços Amostrais e Acontecimentos. Probabilidade, Probabilidade Condicional e Acontecimentos Independentes. Teoremas da Probabilidade Total e de Bayes.</li>
          <li><b>VARIÁVEIS ALEATÓRIAS E DISTRIBUIÇÕES DE PROBABILIDADE:</b> Variáveis Aleatórias. Variáveis Aleatórias Discretas e Contínuas. Função de Probabilidade, de Densidade de Probabilidade e de Distribuição.</li><br>
          <li><b>PRINCIPAIS DISTRIBUIÇÕES DISCRETAS e CONTÍNUAS:</b> Distribuições Binomial, Binomial Negativa, Hipergeométrica e Poisson.</li>'),
('machine learning', '40', 'fabiouds', 'ml.png', 'ml','<li>Introdução à área: o que é machine learning atualmente</li>
          <li>Modelos simples de classificação e regressão (modelos lineares e de vizinho mais próximo) e a sua validação: paradigmas de aprendizagem, funções de perda, erro de viés e de variância.</li>
          <li>Métodos de inferência de modelos: Procura, Expectation-maximization, agregação.</li>
          <li>Redes neuronais, modelos deep e aprendizagem de representação</li>');

INSERT INTO Orderr(deliveryDate,purchaseDate,price,productName, description, idStudent)
VALUES ( (SELECT TO_CHAR((SELECT current_timestamp - (2 * interval '1 day') + (2 * interval '1 hour')), 'DD-MM-YYYY HH:MI:SS')), (SELECT TO_CHAR((SELECT current_timestamp - (2 * interval '1 day')), 'DD-MM-YYYY HH:MI:SS')) , '20', 'c++', '' ,  'fabio123' ),
((SELECT TO_CHAR((SELECT current_timestamp  - (1 * interval '1 day') + (1 * interval '1 hour')), 'DD-MM-YYYY HH:MI:SS')), (SELECT TO_CHAR((SELECT current_timestamp - (1 * interval '1 day')), 'DD-MM-YYYY HH:MI:SS')) , '20', 'java', '' ,  'fabio123'),
((SELECT TO_CHAR((SELECT current_timestamp - (0 * interval '1 day') + (0 * interval '1 hour')), 'DD-MM-YYYY HH:MI:SS')), (SELECT TO_CHAR((SELECT current_timestamp - (0 * interval '1 day')), 'DD-MM-YYYY HH:MI:SS')) , '20', 'c++', '' ,  'joao12' ),
((SELECT TO_CHAR((SELECT current_timestamp - (3 * interval '1 day') + (3 * interval '1 hour')), 'DD-MM-YYYY HH:MI:SS')), (SELECT TO_CHAR((SELECT current_timestamp - (3 * interval '1 day')), 'DD-MM-YYYY HH:MI:SS')) , '25', 'python', '' ,  'joao12' ),
((SELECT TO_CHAR((SELECT current_timestamp - (2 * interval '1 day') + (2 * interval '1 hour')), 'DD-MM-YYYY HH:MI:SS')), (SELECT TO_CHAR((SELECT current_timestamp - (2 * interval '1 day')), 'DD-MM-YYYY HH:MI:SS')) , '30', 'web development', '' ,  'rodrigo123' ),
((SELECT TO_CHAR((SELECT current_timestamp - (1 * interval '1 day') + (1 * interval '1 hour')), 'DD-MM-YYYY HH:MI:SS')), (SELECT TO_CHAR((SELECT current_timestamp - (1 * interval '1 day')), 'DD-MM-YYYY HH:MI:SS')) , '40', 'machine learning', '' ,  'rod4as' ),
((SELECT TO_CHAR((SELECT current_timestamp - (0 * interval '1 day') + (0 * interval '1 hour')), 'DD-MM-YYYY HH:MI:SS')), (SELECT TO_CHAR((SELECT current_timestamp - (0 * interval '1 day')), 'DD-MM-YYYY HH:MI:SS')) , '25', 'python', '' , 'rita123' ),
((SELECT TO_CHAR((SELECT current_timestamp - (0 * interval '1 day') + (0 * interval '1 hour')), 'DD-MM-YYYY HH:MI:SS')), (SELECT TO_CHAR((SELECT current_timestamp - (0 * interval '1 day')), 'DD-MM-YYYY HH:MI:SS')) , '20', 'java', '' ,  'rodrigo123' ),
( (SELECT TO_CHAR((SELECT current_timestamp - (1 * interval '1 day') + (1 * interval '1 hour')), 'DD-MM-YYYY HH:MI:SS')), (SELECT TO_CHAR((SELECT current_timestamp - (1 * interval '1 day')), 'DD-MM-YYYY HH:MI:SS')) , '15', 'matematica', '' ,  'fabio123' ),
((SELECT TO_CHAR((SELECT current_timestamp - (2 * interval '1 day') + (2 * interval '1 hour')), 'DD-MM-YYYY HH:MI:SS')), (SELECT TO_CHAR((SELECT current_timestamp - (2 * interval '1 day')), 'DD-MM-YYYY HH:MI:SS')) , '30', 'web development', '' ,  'rita123' ),
((SELECT TO_CHAR((SELECT current_timestamp - (3 * interval '1 day') + (3 * interval '1 hour')), 'DD-MM-YYYY HH:MI:SS')), (SELECT TO_CHAR((SELECT current_timestamp - (3 * interval '1 day')), 'DD-MM-YYYY HH:MI:SS')) , '20', 'web apis', '' ,  'ana12' );


INSERT INTO Enrolled
VALUES ('fabio123', 'c++', 10),
('fabio123', 'java', 15),
('joao12', 'c++', 0),
('rodrigo1', 'python', 18),
('joao12', 'machine learning', 17);

INSERT INTO Salary(username, salary, salaryDate)
VALUES ('fabiouds', 1200.50, '01-11-2020'),
('fabiouds', 1100.50, '01-10-2020'),
('fabiouds', 1220.50, '02-09-2020'),
('fabiouds', 1250.50, '01-08-2020'),
('fabiouds', 1206.50, '03-07-2020'),
('fabiouds', 1220.50, '01-06-2020'),
('fabiouds', 1300.50, '01-05-2020'),
('fabiouds', 1000.50, '02-04-2020');