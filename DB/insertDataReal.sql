SET search_path to explicaFeup;
/**
* PASS ALUNO PADRAO -> teste
* PASS PROFESSOR PADRAO -> teste15
* PASS ADMIN PADRAO -> admin15
*/
/*
* mm/dd/yyyy
*/
INSERT INTO Userr
VALUES('fabio123','fabio@hotmail.com','915487895','Fabio Andre', '$2y$10$rnf7Rb4y.pdU5jCqO/Qp7.8PMs/rY4Y4pozoY2Fl2ZM5bPSED/Z5m', '233669914', 'user_fabio123_543.jpeg' ,'08/12/1997',0, null, null, '#1B49C2', 'm'),
('asantos98','aslms.tic@gmail.com','912359655','Alberto Santos', '$2y$10$eOUWoxxe2uR0TSNOkwp7d.PQnUXfoBJiD9f4HoNxqmI5oY7Mdz6Ie', '202186385', null ,'06/06/1998',0, 'Interessado e motivado, com especial enfoque em tópicos como inovação tecnológica, inteligência artificial e finanças pessoais.', 'Desporto e Viagens', '#1B49C2', 'm'),
('catarina4','catarinalves_04@hotmail.com','912947873','Catarina Alves', '$2y$10$4lUvlPNPpfg3Vro78.3YTOnEZXLMaXqvSeTDMriOggZVZ1.o9lzkK', '210206497', null ,'02/06/1998',0, 'Estudante', 'Música, Natação', '#1B49C2', 'f'),
('rsmartins','rsmartins98@gmail.com','969975345','Ricardo Martins', '$2y$10$mNpqlGSQ0WUJAIPutpLEIO6SpkYxK3Bup3VbBeh7hvfRa.s0pw6G6', '223918695', null ,'05/12/1998',0, null, 'Moto4, Gaming, Read', '#1B49C2', 'm'),
('diogoOGrande','up201809213@fe.up.pt','933358800','Diogo Silva', '$2y$10$0y2N/W9EJquwfTgzYBJgWOEy8.Tg1AeIdg/CqfQDqZlHe280XSjhy', '209595922', null ,'07/08/1998',0, 'Sou um aluno aplicado que gosta sempre de aprender mais. Os meus interesses são na área de robótica. Recentemente tive problemas com uma unidade curricular (iest) mas com a ajuda destes professores sinto que vou conseguir ultrapassar este problema ', 'Kickboxing, boxing, mma, xadrez, ler e viajar', '#1B49C2', 'm'),
('anaAlves01','ana.alves.01@gmail.com','918463022','Ana Alves', '$2y$10$HUPT5DQPeNKZ8lfJmMk.nODdbg088Sr4wZhnMe0GYJp8pLG/cd3.6', '216415292', null ,'01/14/2004',0,  'Sou estudante e gostava de aprender mais sobre informática.', 'Ler romances, dançar, fazer exercício. ', '#1B49C2', 'f'),
('zeBisnagas','joseviriato2020@gmail.com','919370399','José Pinto', '$2y$10$AUaaQbLDb8Id6T/skrJ9seXBl8Rf/eT7ROrn5THNZOpb.5V3iDe2O', '272514420', null ,'07/29/200',0, 'Sou estudante durante o dia, de noite  sou jogador semi-profissional de counterstrike, gosto de correr e jogar à bola.  Sou ridiculamente sexy e tímido. Um dia gostava de trabalhar no ramo da advocacia.', 'Jogar à bola e ginásio', '#1B49C2', 'm'),
('carlos_manu','carlos.manu@hotmail.com','911233423','Carlos Manuel', '$2y$10$AxR3z.N4jRs1fKiLsjXig.whD.gPbiH7zXohBlBpd0bEL6a8Rsus6', '213220687', null ,'06/13/1996',0, 'Sou um estudante a terminar a licenciatura que gosta de desporto e jogar', 'Correr, jogar e passear', '#1B49C2', 'm'),
('sebeira','sebeira.22@gmail.com','912321312','Sebastião Pereira', '$2y$10$UZ/Tcx5EzA00k0FWtS8zNuAho1YeX8O48dA3LL8vjp7FW8RMwmAJC', '273535650', null ,'03/18/1998',0, 'Trabalho em markting numa empresa de informática', 'Ler livros, passear', '#1B49C2', 'm'),
('zorlando','csrlosandre20metros@gmail.com','912575773','Carlos André', '$2y$10$Iwt5mn2OXwfQ5M5eJm5Qy.qNcmFGpNlwCYyzUTGZRHbwZ1Z6aVLni', '246072830', 'user_zorlando_5341.jpg' ,'05/31/2003',0, 'Sou estudante, neste momento no 10 ano, curso de eletricista. Gostava de me tornar num grande jogador de csgo. Inspiro me bastante no coach Zorlakoka  e espero um dia poder jogar numa grande equipa.', 'Jogar computador ', '#1B49C2', 'm'),
('ritaantunes811','ritaantunes_2005@hotmail.com','935017368','Rita Antunes', '$2y$10$29QRmv3MJmuIdHMSm5CKzutAGQcLCLMbYwxJVLLAZP0WxYPdVBWLm', '243701764', null ,'03/04/1997',0, 'Estudante de medicina em busca de desenvolver as suas capacidades no ramo da informatica para melhorar a sua preparação e execução de investigação clínica', 'Exercício físico, cinema, literatura', '#1B49C2', 'f'),
('admin','electrusintelligentus@gmail.com','926901471','Admin', '$2y$10$m0LEz76GJykSVq/QIt1iXesMa.0rUwcX5njCpTEdjblzTxNodPK5W', '280825358', 'user_admin_12.jpg' ,null,2, null, null, '#1B49C2', 'm'),
('fabiouds','fabiouds@hotmail.com','926901937','Fabio Morais', '$2y$10$Qog6MBSLHuiXGXvizGJ83OgVgsNw9wTJitwzVcEPaOy6G/vTrPtlC', '265075408', null ,'06/15/1997',1, null, null, '#1B49C2', 'm'),
('fernandojpsilva','up201604125@fe.up.pt','915985839','Fernando Silva', '$2y$10$mi3hMyymks/xM0hkSjZcx.pCr46XCyk3YOzf4zM3hAQKs8ZXXyr5e', '243701764', null ,'06/14/1998',1, 'Estudante no 5º ano do MIEEC. Tenho grande interesse em áreas da gestão industrial como o Lean manufacturing, a indústria 4.0, sistemas de gestão de qualidade, sistemas de apoio à decisão, data science aplicada a negócios, entre outros.', 'Praticar desportos, ver futebol, formula 1, esports, ler', '#1B49C2', 'm');

INSERT INTO Student
VALUES('fabio123'),
('asantos98'),
('catarina4'),
('rsmartins'),
('diogoOGrande'),
('anaAlves01'),
('zeBisnagas'),
('carlos_manu'),
('sebeira'),
('zorlando'),
('ritaantunes811');


INSERT INTO Teacher
VALUES('fabiouds', 1200),
('fernandojpsilva', 1200);

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
VALUES ( (SELECT TO_CHAR((SELECT current_timestamp - (27 * interval '1 day') + (2 * interval '1 hour')), 'DD-MM-YYYY HH:MI:SS')), (SELECT TO_CHAR((SELECT current_timestamp - (27 * interval '1 day')), 'DD-MM-YYYY HH:MI:SS')) , '20', 'c++', '' ,  'fabio123' ),
((SELECT TO_CHAR((SELECT current_timestamp  - (10 * interval '1 day') + (1 * interval '1 hour')), 'DD-MM-YYYY HH:MI:SS')), (SELECT TO_CHAR((SELECT current_timestamp - (10 * interval '1 day')), 'DD-MM-YYYY HH:MI:SS')) , '20', 'java', '' ,  'asantos98'),
((SELECT TO_CHAR((SELECT current_timestamp - (31 * interval '1 day') + (4 * interval '1 hour')), 'DD-MM-YYYY HH:MI:SS')), (SELECT TO_CHAR((SELECT current_timestamp - (31 * interval '1 day')), 'DD-MM-YYYY HH:MI:SS')) , '25', 'python', '' ,  'catarina4' ),
((SELECT TO_CHAR((SELECT current_timestamp - (21 * interval '1 day') + (3 * interval '1 hour')), 'DD-MM-YYYY HH:MI:SS')), (SELECT TO_CHAR((SELECT current_timestamp - (3 * interval '1 day')), 'DD-MM-YYYY HH:MI:SS')) , '40', 'machine learning', '' ,  'rsmartins' ),
((SELECT TO_CHAR((SELECT current_timestamp - (22 * interval '1 day') + (2 * interval '1 hour')), 'DD-MM-YYYY HH:MI:SS')), (SELECT TO_CHAR((SELECT current_timestamp - (22 * interval '1 day')), 'DD-MM-YYYY HH:MI:SS')) , '25', 'python', '' ,  'rsmartins' ),
((SELECT TO_CHAR((SELECT current_timestamp - (12 * interval '1 day') + (1 * interval '1 hour')), 'DD-MM-YYYY HH:MI:SS')), (SELECT TO_CHAR((SELECT current_timestamp - (12 * interval '1 day')), 'DD-MM-YYYY HH:MI:SS')) , '40', 'machine learning', '' ,  'diogoOGrande' ),
((SELECT TO_CHAR((SELECT current_timestamp - (11 * interval '1 day') + (2 * interval '1 hour')), 'DD-MM-YYYY HH:MI:SS')), (SELECT TO_CHAR((SELECT current_timestamp - (11 * interval '1 day')), 'DD-MM-YYYY HH:MI:SS')) , '25', 'python', '' , 'diogoOGrande' ),
((SELECT TO_CHAR((SELECT current_timestamp - (6 * interval '1 day') + (1 * interval '1 hour')), 'DD-MM-YYYY HH:MI:SS')), (SELECT TO_CHAR((SELECT current_timestamp - (6 * interval '1 day')), 'DD-MM-YYYY HH:MI:SS')) , '40', 'machine learning', '' ,  'anaAlves01' ),
((SELECT TO_CHAR((SELECT current_timestamp - (11 * interval '1 day') + (1 * interval '1 hour')), 'DD-MM-YYYY HH:MI:SS')), (SELECT TO_CHAR((SELECT current_timestamp - (11 * interval '1 day')), 'DD-MM-YYYY HH:MI:SS')) , '40', 'machine learning', '' ,  'zeBisnagas' ),
((SELECT TO_CHAR((SELECT current_timestamp - (21 * interval '1 day') + (3 * interval '1 hour')), 'DD-MM-YYYY HH:MI:SS')), (SELECT TO_CHAR((SELECT current_timestamp - (21 * interval '1 day')), 'DD-MM-YYYY HH:MI:SS')) , '55', 'swift', '' ,  'carlos_manu' ),
((SELECT TO_CHAR((SELECT current_timestamp - (28 * interval '1 day') + (3 * interval '1 hour')), 'DD-MM-YYYY HH:MI:SS')), (SELECT TO_CHAR((SELECT current_timestamp - (3 * interval '1 day')), 'DD-MM-YYYY HH:MI:SS')) , '40', 'machine learning', '' ,  'sebeira' ),
((SELECT TO_CHAR((SELECT current_timestamp - (34 * interval '1 day') + (4 * interval '1 hour')), 'DD-MM-YYYY HH:MI:SS')), (SELECT TO_CHAR((SELECT current_timestamp - (4 * interval '1 day')), 'DD-MM-YYYY HH:MI:SS')) , '20', 'matlab', '' ,  'zorlando' ),
((SELECT TO_CHAR((SELECT current_timestamp - (33 * interval '1 day') + (5 * interval '1 hour')), 'DD-MM-YYYY HH:MI:SS')), (SELECT TO_CHAR((SELECT current_timestamp - (5 * interval '1 day')), 'DD-MM-YYYY HH:MI:SS')) , '40', 'machine learning', '' ,  'ritaantunes811' );


INSERT INTO Enrolled
VALUES ('fabio123', 'c++', -1),
('asantos98', 'java', -1),
('catarina4', 'python', -1),
('rsmartins', 'machine learning', -1),
('rsmartins', 'python', -1),
('diogoOGrande', 'machine learning', -1),
('diogoOGrande', 'python', -1),
('anaAlves01', 'machine learning', -1),
('zeBisnagas', 'machine learning', -1),
('carlos_manu', 'swift', -1),
('sebeira', 'machine learning', -1),
('zorlando', 'matlab', -1),
('ritaantunes811', 'machine learning', -1);

INSERT INTO Salary(username, salary, salaryDate)
VALUES ('fabiouds', 1200.50, '01-11-2020'),
('fabiouds', 1100.50, '01-10-2020'),
('fabiouds', 1220.50, '02-09-2020'),
('fabiouds', 1250.50, '01-08-2020'),
('fabiouds', 1206.50, '03-07-2020'),
('fabiouds', 1220.50, '01-06-2020'),
('fabiouds', 1300.50, '01-05-2020'),
('fabiouds', 1000.50, '02-04-2020'),
('fernandojpsilva', 1120.50, '01-11-2020'),
('fernandojpsilva', 1330.50, '01-10-2020'),
('fernandojpsilva', 1220.50, '02-09-2020'),
('fernandojpsilva', 1220, '01-08-2020'),
('fernandojpsilva', 1406.50, '03-07-2020'),
('fernandojpsilva', 1420, '01-06-2020'),
('fernandojpsilva', 1300, '01-05-2020'),
('fernandojpsilva', 1200, '02-04-2020');;

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

