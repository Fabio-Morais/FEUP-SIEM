SET search_path to explicaFeup2;

INSERT INTO Userr
VALUES('fabio123','fabio@hotmail.com','915487895','Fabio Andre', '$2y$10$VwAhND9H9voMR.rrlyd.8umf3B4M2YTMJ1mo7VDmUClRLIdaR.8q2', '266757014', null ,'08/12/1997',0, null, null, null, 'm'),
('joao12','joao@hotmail.com','915487895','Joao Silva', '$2y$10$NnACkeR4nNWTYIrXaM5qF.udZYNNtLIb2CDLGS2QPIcMcALrvpCTa', '233487875', null ,'01/12/1998',0, null, null, null, 'm'),
('rodrigo1','rodrigo@hotmail.com','915487895','Rodrigo Martins', '$2y$10$PSjSNAc.JESmfn9jOU/vP.eiGRuAO3wXY4nCaNYJU27kCdWUBwR8m', '268948550', null ,'02/23/1995',0, null, null, null, 'm'),
('rodrigo123','rodrigo123@hotmail.com','915487895','Rodrigo Sousa', '$2y$10$PSjSNAc.JESmfn9jOU/vP.eiGRuAO3wXY4nCaNYJU27kCdWUBwR8m', '268948550', null ,'02/23/1995',0, null, null, null, 'm'),
('rod4as','rod4as@hotmail.com','915387895','Joao Santos', '$2y$10$PSjSNAc.JESmfn9jOU/vP.eiGRuAO3wXY4nCaNYJU27kCdWUBwR8m', '268948550', null ,'05/03/1995',0, null, null, null, 'm'),
('ana12','ana12@hotmail.com','915127895','Ana Silva', '$2y$10$PSjSNAc.JESmfn9jOU/vP.eiGRuAO3wXY4nCaNYJU27kCdWUBwR8m', '268948550', null ,'02/23/1985',0, null, null, null, 'f'),
('rita123','rita123@hotmail.com','915487895','Rita Martins', '$2y$10$PSjSNAc.JESmfn9jOU/vP.eiGRuAO3wXY4nCaNYJU27kCdWUBwR8m', '268948550', null ,'05/22/1995',0, null, null, null, 'f'),
('admin','electrusintelligentus@gmail.com','926901471','', '$2y$10$lPu1AU1qKkSmvmWTIDWHhecLZFEGdZG.rMCzm3EPHfx.fXIs0LTg.', '', null ,null,2, null, null, null, 'm'),
('fabiouds','fabiouds@hotmail.com','926901937','Fabio Morais', '$2y$10$sTCYatGB7IYSLGcYK/Gz2.CZdvI31InCvHI2/HJ1KBuTJsEAoTIwi', '258975229', null ,'06/15/1997',1, null, null, null, 'm'),
('aluno','aluno@aluno.com','926901937','Aluno', '$2y$10$YLA6GUwAlAx2bV1Q.ekthOWW2nrUPZ91KgxT/fXQpQZt1f62jMpAO', '233487875', 'aa.jpg' ,'06/15/1996',0, null, null, null, 'm');

INSERT INTO Student
VALUES('fabio123'),
('joao12' ),
('rodrigo1'),
('rodrigo123'),
('rod4as'),
('rita123'),
('ana12'),
('aluno');


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
          <li>Redes neuronais, modelos deep e aprendizagem de representação</li>'),
('controlo de sistemas', '35', null, 'controlo.png', 'ml', '<li> Análise e projecto de sistemas de controlo automático.</li>
          <li>Ferramentas de análise qualitativa e quantitativa para projecto de controladores dinâmicos de sistemas SISO de dinâmica linear, ou linearizável.</li>
          <li>Aplicação no domínio do tempo contínuo e no domínio do tempo discreto.</li>'),
('swift', '55', null, 'swift.png', 'soft','<li>Introdução à programação de aplicações iOS e macOS.</li>
          <li>Estutura e sintaxe básica, boas práticas e tratamento de dados.</li>
          <li>Programação orientada a protocolos.</li>
          <li>Desenvolvimento de uma aplicação de complexidade média para iPhone, iPad e Mac.</li>'),
('visão computacional', '40', null, 'visao.jpg', 'ml','<li>Introdução à visão computacional.</li>
          <li>Fundamentos de criação de imagens, geometria multiview, estimativa e rastreamento de movimento e classificação.</li>
          <li>Desenvolvimento de métodos para aplicações que incluem identificar modelos em imagens, estabilização, calibração e reconhecimento de ações.</li>
          <li>Utilização de algoritmos de inteligência artificial na implementação dos trabalhos.</li>'),
('web design', '25', null, 'design.png', 'web','<li>Introdução ao design gráfico.</li>
          <li>Utilização de 3 ferramentas Adobe transversais ao web design: Adobe Illustrator, Photoshop e InDesign.</li>
          <li>Criação de designs gráficos responsivos, templates e filtros "Scalable Vector Graphics".</li>
          <li>Criação e aplicação de animações.</li>'),
('matlab', '20', null, 'matlab.jpg', 'soft','<li>Introdução à programação com MATLAB.</li>
          <li>Conceitos fundamentais de programação como variáveis, estruturas de controlo e funções.</li>
          <li>Utilização do apoio poderoso do MATLAB na manipulação de matrizes.</li>
          <li>Simulação e modelação em Simulink, ferramenta integrada no ambiente MATLAB.</li>'),
('digital marketing', '25', null, 'marketing.jpg', 'web','<li>Noções fundamentais de marketing digital.</li>
          <li>Consolidar competências para se promover a si e à sua empresa online.</li>
          <li>Captar a atenção das pessoas certas e tirar o máximo partido da web para alcançar os seus objetivos.</li>
          <li>Exploração de diversos tópicos associados à otimização de motores de busca, marketing nas redes sociais e impressão 3D.</li>'),
('data science', '30', null, 'data.jpg', 'ml','<li>Base teórica sólida sobre os principais algoritmos de Machine Learning e Data Science.</li>
          <li>Utilizar as mais recentes teorias de análise de dados, incluindo métodos de previsão e de dedução causal;.</li>
          <li>Utilizar uma linguagem de programação de estatística para pôr em prática os novos métodos de machine learning e modelação causal.</li>
          <li>Utilize as bibliotecas numpy, scikit-learn e pandas aplicado em Data Science e Machine Learning.</li>');

INSERT INTO Orderr(deliveryDate,purchaseDate,price,productName, description, idStudent)
VALUES ( (SELECT TO_CHAR((SELECT current_timestamp - (2 * interval '1 day') + (2 * interval '1 hour')), 'DD-MM-YYYY HH:MI:SS')), (SELECT TO_CHAR((SELECT current_timestamp - (2 * interval '1 day')), 'DD-MM-YYYY HH:MI:SS')) , '20', 'c++', '' ,  'fabio123' ),
((SELECT TO_CHAR((SELECT current_timestamp  - (1 * interval '1 day') + (1 * interval '1 hour')), 'DD-MM-YYYY HH:MI:SS')), (SELECT TO_CHAR((SELECT current_timestamp - (1 * interval '1 day')), 'DD-MM-YYYY HH:MI:SS')) , '20', 'java', '' ,  'fabio123'),
((SELECT TO_CHAR((SELECT current_timestamp - (0 * interval '1 day') + (0 * interval '1 hour')), 'DD-MM-YYYY HH:MI:SS')), (SELECT TO_CHAR((SELECT current_timestamp - (0 * interval '1 day')), 'DD-MM-YYYY HH:MI:SS')) , '20', 'c++', '' ,  'joao12' ),
((SELECT TO_CHAR((SELECT current_timestamp - (3 * interval '1 day') + (3 * interval '1 hour')), 'DD-MM-YYYY HH:MI:SS')), (SELECT TO_CHAR((SELECT current_timestamp - (3 * interval '1 day')), 'DD-MM-YYYY HH:MI:SS')) , '25', 'python', '' ,  'joao12' ),
((SELECT TO_CHAR((SELECT current_timestamp - (2 * interval '1 day') + (2 * interval '1 hour')), 'DD-MM-YYYY HH:MI:SS')), (SELECT TO_CHAR((SELECT current_timestamp - (2 * interval '1 day')), 'DD-MM-YYYY HH:MI:SS')) , '30', 'web development', '' ,  'rodrigo123' ),
((SELECT TO_CHAR((SELECT current_timestamp - (1 * interval '1 day') + (1 * interval '1 hour')), 'DD-MM-YYYY HH:MI:SS')), (SELECT TO_CHAR((SELECT current_timestamp - (1 * interval '1 day')), 'DD-MM-YYYY HH:MI:SS')) , '40', 'machine learning', '' ,  'rod4as' ),
((SELECT TO_CHAR((SELECT current_timestamp - (0 * interval '1 day') + (0 * interval '1 hour')), 'DD-MM-YYYY HH:MI:SS')), (SELECT TO_CHAR((SELECT current_timestamp - (0 * interval '1 day')), 'DD-MM-YYYY HH:MI:SS')) , '25', 'python', '' , 'rita123' ),
((SELECT TO_CHAR((SELECT current_timestamp - (0 * interval '1 day') + (0 * interval '1 hour')), 'DD-MM-YYYY HH:MI:SS')), (SELECT TO_CHAR((SELECT current_timestamp - (0 * interval '1 day')), 'DD-MM-YYYY HH:MI:SS')) , '20', 'java', '' ,  'rodrigo123' ),
((SELECT TO_CHAR((SELECT current_timestamp - (1 * interval '1 day') + (1 * interval '1 hour')), 'DD-MM-YYYY HH:MI:SS')), (SELECT TO_CHAR((SELECT current_timestamp - (1 * interval '1 day')), 'DD-MM-YYYY HH:MI:SS')) , '15', 'matematica', '' ,  'fabio123' ),
((SELECT TO_CHAR((SELECT current_timestamp - (3 * interval '1 day') + (3 * interval '1 hour')), 'DD-MM-YYYY HH:MI:SS')), (SELECT TO_CHAR((SELECT current_timestamp - (3 * interval '1 day')), 'DD-MM-YYYY HH:MI:SS')) , '20', 'web apis', '' ,  'ana12' ),
((SELECT TO_CHAR((SELECT current_timestamp - (3 * interval '1 day') + (3 * interval '1 hour')), 'DD-MM-YYYY HH:MI:SS')), (SELECT TO_CHAR((SELECT current_timestamp - (3 * interval '1 day')), 'DD-MM-YYYY HH:MI:SS')) , '40', 'machine learning', '' ,  'aluno' ),
((SELECT TO_CHAR((SELECT current_timestamp - (4 * interval '1 day') + (4 * interval '1 hour')), 'DD-MM-YYYY HH:MI:SS')), (SELECT TO_CHAR((SELECT current_timestamp - (4 * interval '1 day')), 'DD-MM-YYYY HH:MI:SS')) , '20', 'java', '' ,  'aluno' ),
((SELECT TO_CHAR((SELECT current_timestamp - (5 * interval '1 day') + (5 * interval '1 hour')), 'DD-MM-YYYY HH:MI:SS')), (SELECT TO_CHAR((SELECT current_timestamp - (5 * interval '1 day')), 'DD-MM-YYYY HH:MI:SS')) , '25', 'python', '' ,  'aluno' );


INSERT INTO Enrolled
VALUES ('fabio123', 'c++', 10),
('fabio123', 'java', 15),
('joao12', 'c++', 0),
('rodrigo1', 'python', 18),
('joao12', 'machine learning', 17),
('aluno', 'java', 15),
('aluno', 'python', 19),
('aluno', 'machine learning', 0);

INSERT INTO Salary(username, salary, salaryDate)
VALUES ('fabiouds', 1200.50, '01-11-2020'),
('fabiouds', 1100.50, '01-10-2020'),
('fabiouds', 1220.50, '02-09-2020'),
('fabiouds', 1250.50, '01-08-2020'),
('fabiouds', 1206.50, '03-07-2020'),
('fabiouds', 1220.50, '01-06-2020'),
('fabiouds', 1300.50, '01-05-2020'),
('fabiouds', 1000.50, '02-04-2020');

INSERT INTO Video(youtubeLink, courseName)
VALUES ('https://www.youtube.com/watch?v=YRGeyA2a0cQ', 'java'),
       ('https://www.youtube.com/watch?v=e9ffbsgMarE', 'java'),
       ('https://www.youtube.com/watch?v=h7A-YTEu-uI', 'java'),
       ('https://www.youtube.com/watch?v=xCixkaXrVMI', 'python'),
       ('https://www.youtube.com/watch?v=6wW-rpbecIA', 'java'),
       ('https://www.youtube.com/watch?v=1W228rb267o', 'python'),
       ('https://www.youtube.com/watch?v=9L5IHWTVyEs', 'machine learning'),
       ('https://www.youtube.com/watch?v=jDJsT3zm-NE', 'machine learning'),
       ('https://www.youtube.com/watch?v=zm9bqSSiIdo', 'matematica'),
       ('https://www.youtube.com/watch?v=yAHl_kpqr-k', 'matematica'),
       ('https://www.youtube.com/watch?v=-ayh6oEtjbA', 'matematica'),
       ('https://www.youtube.com/watch?v=SoYnZHBP-6M', 'matematica'),
       ('https://www.youtube.com/watch?v=ki3B8a-jLrE', 'c++'),
       ('https://www.youtube.com/watch?v=b5c2M0gVlgk', 'c++'),
       ('https://www.youtube.com/watch?v=qPYCnebQQ6U', 'web development'),
       ('https://www.youtube.com/watch?v=_uwWLff7CJA', 'web development'),
       ('https://www.youtube.com/watch?v=UNPrrP25voU', 'web development'),
       ('https://www.youtube.com/watch?v=t_ispmWmdjY', 'web apis'),
       ('https://www.youtube.com/watch?v=DLX62G4lc44', 'web apis'),
       ('https://www.youtube.com/watch?v=Fdf5aTYRW0E', 'web apis'),
       ('https://www.youtube.com/watch?v=_eh1conN6YM', 'controlo de sistemas'),
       ('https://www.youtube.com/watch?v=CSAp9ooQRT0', 'controlo de sistemas'),
       ('https://www.youtube.com/watch?v=E6R2XUEyRy0', 'controlo de sistemas'),
       ('https://www.youtube.com/watch?v=5sXPZeSLDSc', 'swift'),
       ('https://www.youtube.com/watch?v=45XUCShB7c0', 'swift'),
       ('https://www.youtube.com/watch?v=wlGExn2NNFQ', 'swift'),
       ('https://www.youtube.com/watch?v=vT1JzLTH4G4', 'visão computacional'),
       ('https://www.youtube.com/watch?v=OoUX-nOEjG0', 'visão computacional'),
       ('https://www.youtube.com/watch?v=h7iBpEHGVNc', 'visão computacional'),
       ('https://www.youtube.com/watch?v=DF4P0cjStkM', 'web design'),
       ('https://www.youtube.com/watch?v=b-0HekkbdJM', 'web design'),
       ('https://www.youtube.com/watch?v=iHDy_nEvgd4', 'web design'),
       ('https://www.youtube.com/watch?v=8aL0SCq80U4', 'matlab'),
       ('https://www.youtube.com/watch?v=w4-Z9jF8kpo', 'matlab'),
       ('https://www.youtube.com/watch?v=9k-V3rNNDDg', 'matlab'),
       ('https://www.youtube.com/watch?v=nU-IIXBWlS4', 'digital marketing'),
       ('https://www.youtube.com/watch?v=fsDwHJa_xcE', 'digital marketing'),
       ('https://www.youtube.com/watch?v=ua-CiDNNj30', 'data science'),
       ('https://www.youtube.com/watch?v=sbbYntt5CJk', 'data science');


