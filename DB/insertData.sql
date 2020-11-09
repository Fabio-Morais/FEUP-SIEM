SET search_path to explicaFeup;

INSERT INTO Userr
VALUES('fabio123','fabio@hotmail.com','915487895','Fabio Andre', '$2y$10$VwAhND9H9voMR.rrlyd.8umf3B4M2YTMJ1mo7VDmUClRLIdaR.8q2', '266757014', null ,'08/12/1997'),
('joao12','joao@hotmail.com','915487895','Joao Silva', '$2y$10$NnACkeR4nNWTYIrXaM5qF.udZYNNtLIb2CDLGS2QPIcMcALrvpCTa', '233487875', null ,'01/12/1998'),
('rodrigo1','rodrigo@hotmail.com','915487895','Rodrigo Martins', '$2y$10$PSjSNAc.JESmfn9jOU/vP.eiGRuAO3wXY4nCaNYJU27kCdWUBwR8m', '268948550', null ,'02/23/1995'),
('admin','electrusintelligentus@gmail.com','926901471','', '$2y$10$lPu1AU1qKkSmvmWTIDWHhecLZFEGdZG.rMCzm3EPHfx.fXIs0LTg.', '', null ,''),
('fabiouds','fabiouds@hotmail.com','926901937','Fabio Morais', '$2y$10$sTCYatGB7IYSLGcYK/Gz2.CZdvI31InCvHI2/HJ1KBuTJsEAoTIwi', '258975229', null ,'06/15/1997');


INSERT INTO Aluno
VALUES('fabio123'),
('joao12'),
('rodrigo1'),

INSERT INTO Professor
VALUES('fabiouds');

INSERT INTO Admin
VALUES('admin');

INSERT INTO Curso
VALUES('C/C++'),
('java'),
('python'),
('web development'),
('web apis'),
('matematica');

INSERT INTO Cliente(nome, email, telefone, nif)
VALUES('Alfredo Rodrigues', 'exema@hotmail.com','934587458', '229967221'),
('Rita Martins', 'ritazs@hotmail.com','934554458', '290041376'),
('Ana Rodrigues', 'ana123@hotmail.com','934682458', '207214972'),
('Joao Morais', 'jony123@hotmail.com','934593438', '253161991'),
('Pedro Martins', 'pedrocas134@hotmail.com','939577858', '236979418'),
('Rodrigo Rocha', 'rodrig.12@hotmail.com','914387468', '268646767'),
('Fernando Silva', 'fernandoboss@hotmail.com','964557458', '255615175'),
('Manuel Silva', 'manu15@hotmail.com','934574238', '251724573'),
('Vitor Francisco', 'vitor.12.r@hotmail.com','934387457', '250401185'),
('Miguel Rodrigues', 'miguelrodrigues97@hotmail.com','914587458', '237330229'),
('Diogo Silva', 'diogo.12311231@hotmail.com','934564458', '297958720'),
('Alberto Rocha', 'albe.asdass@hotmail.com','934237458', '299660419');

INSERT INTO Encomenda(dataentrega,datadecompra,preco,nomeProduto, descricao, idCliente, idAluno)
VALUES (null, (SELECT TO_CHAR((SELECT current_timestamp - (2 * interval '1 day')), 'DD-MM-YYYY HH:MI:SS')) , '20', 'C/C++', '' , (SELECT id FROM Cliente where email ='exema@hotmail.com'), null ),
(null, (SELECT TO_CHAR((SELECT current_timestamp - (1 * interval '1 day')), 'DD-MM-YYYY HH:MI:SS')) , '20', 'C/C++', '' , (SELECT id FROM Cliente where email ='ritazs@hotmail.com'), null ),
(null, (SELECT TO_CHAR((SELECT current_timestamp - (0 * interval '1 day')), 'DD-MM-YYYY HH:MI:SS')) , '20', 'C/C++', '' , (SELECT id FROM Cliente where email ='ana123@hotmail.com'), null ),
(null, (SELECT TO_CHAR((SELECT current_timestamp - (3 * interval '1 day')), 'DD-MM-YYYY HH:MI:SS')) , '20', 'C/C++', '' , (SELECT id FROM Cliente where email ='jony123@hotmail.com'), null ),
(null, (SELECT TO_CHAR((SELECT current_timestamp - (2 * interval '1 day')), 'DD-MM-YYYY HH:MI:SS')) , '20', 'C/C++', '' , (SELECT id FROM Cliente where email ='rodrig.12@hotmail.com'), null ),
(null, (SELECT TO_CHAR((SELECT current_timestamp - (1 * interval '1 day')), 'DD-MM-YYYY HH:MI:SS')) , '20', 'C/C++', '' , (SELECT id FROM Cliente where email ='fernandoboss@hotmail.com'), null ),
(null, (SELECT TO_CHAR((SELECT current_timestamp - (0 * interval '1 day')), 'DD-MM-YYYY HH:MI:SS')) , '20', 'C/C++', '' , (SELECT id FROM Cliente where email ='manu15@hotmail.com'), null ),
(null, (SELECT TO_CHAR((SELECT current_timestamp - (0 * interval '1 day')), 'DD-MM-YYYY HH:MI:SS')) , '20', 'C/C++', '' , (SELECT id FROM Cliente where email ='vitor.12.r@hotmail.com'), null ),
(null, (SELECT TO_CHAR((SELECT current_timestamp - (0 * interval '1 day')), 'DD-MM-YYYY HH:MI:SS')) , '20', 'C/C++', '' , (SELECT id FROM Cliente where email ='miguelrodrigues97@hotmail.com'), null ),
(null, (SELECT TO_CHAR((SELECT current_timestamp - (0 * interval '1 day')), 'DD-MM-YYYY HH:MI:SS')) , '20', 'C/C++', '' , (SELECT id FROM Cliente where email ='diogo.12311231@hotmail.com'), null ),
(null, (SELECT TO_CHAR((SELECT current_timestamp - (0 * interval '1 day')), 'DD-MM-YYYY HH:MI:SS')) , '20', 'C/C++', '' , (SELECT id FROM Cliente where email ='albe.asdass@hotmail.com'), null ),


