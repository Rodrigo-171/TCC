-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 19-Ago-2020 às 00:18
-- Versão do servidor: 10.4.10-MariaDB
-- versão do PHP: 7.0.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bdpet`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `animal`
--

DROP TABLE IF EXISTS `animal`;
CREATE TABLE IF NOT EXISTS `animal` (
  `Cod_animal` int(11) NOT NULL AUTO_INCREMENT,
  `sexo_animal` char(1) DEFAULT NULL,
  `nome_animal` varchar(20) DEFAULT NULL,
  `para_que` varchar(20) DEFAULT NULL,
  `data_nasc_animal` int(11) DEFAULT NULL,
  `preco_animal` decimal(9,2) DEFAULT NULL,
  `cod_raca` int(11) DEFAULT NULL,
  `cod_usu` int(11) DEFAULT NULL,
  `cod_status_animal` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`Cod_animal`),
  KEY `cod_usu` (`cod_usu`),
  KEY `cod_raca` (`cod_raca`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
INSERT INTO `animal` (`nome_animal`, `sexo_animal`, `data_nasc_animal`, `para_que`, `preco_animal`, `cod_raca`, `cod_usu`) VALUES ('toto', 'F', '2020-11-03', 'adocao', NULL, 1, 1);
SELECT * FROM `animal`;
SELECT * FROM `animal` INNER JOIN `raca` ON `animal`.`cod_raca` = `raca`.`cod_raca`;
SELECT * FROM `animal` INNER JOIN `especie` ON `animal`.`cod_especie` = `especie`.`cod_especie`;

SELECT nome_raca AS raca,
cod_animal, nome_animal, sexo_animal, data_nasc_animal, preco_animal, cod_status_animal AS animal,
nome_especie AS especie
FROM animal AS A
INNER JOIN raca AS R
ON A.cod_raca = R.cod_raca
INNER JOIN especie AS E
ON R.cod_especie = E.cod_especie;

UPDATE animal set cod_raca = 1 where cod_animal = 1;


-- --------------------------------------------------------
select * from `animal`;
--
-- Estrutura da tabela `denuncia`
--

DROP TABLE IF EXISTS `denuncia`;
CREATE TABLE IF NOT EXISTS `denuncia` (
  `cod_denuncia` int(11) NOT NULL,
  `data_hora_denuncia` datetime DEFAULT NULL,
  `desc_denuncia` text DEFAULT NULL,
  `cod_usu_denuncia` int(11) DEFAULT NULL,
  `cod_usu_denunciado` int(11) DEFAULT NULL,
  `cod_status_denuncia` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`cod_denuncia`),
  KEY `cod_usu_denuncia` (`cod_usu_denuncia`),
  KEY `cod_usu_denunciado` (`cod_usu_denunciado`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `enderecos`
--
DROP TABLE IF EXISTS `enderecos`;
CREATE TABLE IF NOT EXISTS `enderecos` (
  `cod_endereco` int(11) NOT NULL AUTO_INCREMENT,
  `rua` varchar(64) NOT NULL,
  `numero` int(11) NOT NULL,
  `bairro` varchar(32) NOT NULL,
  `cidade` varchar(32) NOT NULL,
  `estado` varchar(32) NOT NULL,
  `cep` varchar(8) NOT NULL,
  `complemento` varchar(64) DEFAULT NULL,
  `cod_usu` int(11) DEFAULT NULL,
  PRIMARY KEY (`cod_endereco`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

ALTER TABLE `enderecos` ADD CONSTRAINT `fk_usuario` FOREIGN KEY ( `cod_usu` ) REFERENCES `usuario` ( `cod_usu` ) ;
DELETE FROM enderecos WHERE cod_endereco = '1';
--
-- Extraindo dados da tabela `enderecos`
--
SELECT * FROM enderecos; 

INSERT INTO `enderecos` (`cod_endereco`, `rua`, `numero`, `bairro`, `cidade`, `estado`, `cep`, `complemento`, `cod_usu`) VALUES
(1, 'rua cesario verde', 187, 'jardim tupã', 'barueri', 'SP', '06435050', 'casa 2', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `especie`
--

DROP TABLE IF EXISTS `especie`;
CREATE TABLE IF NOT EXISTS `especie` (
  `cod_especie` int(11) NOT NULL,
  `nome_especie` varchar(20) DEFAULT NULL,
  `cod_status_especie` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`cod_especie`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------
INSERT INTO `especie` (`cod_especie`, `nome_especie`, `cod_status_especie`) VALUES (4, 'roedor', 'A');
select * from `especie`;
--
-- Estrutura da tabela `foto`
--

DROP TABLE IF EXISTS `foto`;
CREATE TABLE IF NOT EXISTS `foto` (
  `cod_foto` int(11) NOT NULL AUTO_INCREMENT,
  `url_foto` varchar(100) DEFAULT NULL,
  `Cod_animal` int(11) DEFAULT NULL,
  `Cod_usu` int(11) DEFAULT NULL,
  `cod_status_foto` varchar(1) DEFAULT NULL,
  `data` datetime,
  PRIMARY KEY (`cod_foto`),
  KEY `Cod_animal` (`Cod_animal`),
  KEY `Cod_usu` (`Cod_usu`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------
SELECT * FROM `foto`;
DELETE FROM foto WHERE cod_usu = '1';
SELECT * FROM foto WHERE cod_usu = '1';
ALTER TABLE `foto` ADD CONSTRAINT `fk_usuario` FOREIGN KEY ( `cod_usu` ) REFERENCES `usuario` ( `cod_usu` ) ;

--
-- Estrutura da tabela `raca`
--

DROP TABLE IF EXISTS `raca`;
CREATE TABLE IF NOT EXISTS `raca` (
  `cod_raca` int(11) NOT NULL,
  `nome_raca` varchar(50) DEFAULT NULL,
  `cod_especie` int(11) DEFAULT NULL,
  `cod_status_raca` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`cod_raca`),
  KEY `cod_especie` (`cod_especie`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


-- --------------------------------------------------------
INSERT INTO `raca` (`cod_raca`, `nome_raca`, `cod_especie`, `cod_status_raca`) VALUES (1, 'Vira-lata', '0', 'A'), (2, 'Bedlington Terrier', '1', 'A'),
(3, 'Bichon Frise', '1', 'A'), (4, 'Bloodhound', '1', 'A'), (5, 'Bobtail', '1', 'A'), (6, 'Boxer', '1', 'A'), (7, 'Buldogue Frances', '1', 'A'),
(8, 'Buldogue Ingles', '1', 'A'), (9, 'Cane Corso', '1', 'A'), (10, 'Chihuahua', '1', 'A'), (11, 'Chow Chow', '1', 'A'), (12, 'Dalmata', '1', 'A'),
(13, 'Dogue Alemao', '1', 'A'), (14, 'Labrador Retriever', '1', 'A'), (15, 'Husky Siberiano', '1', 'A'), (16, 'Terrier Escoces', '1', 'A'), (17, 'Rottweiler', '1', 'A'), 
(18, 'Pastor Alemao', '1', 'A'), (19, 'Pinscher Miniatura', '1', 'A'), (20, 'Pastor Australiano', '1', 'A'), (21, 'Maltes', '1', 'A'), (22, 'Yorkshire Terrier', '1', 'A'),
(23, 'Shih Tzu', '1', 'A'), (24, 'Pug', '1', 'A'), (25, 'Lhasa Apso', '1', 'A'), (26, 'Dachshund', '1', 'A'), (27, 'Lulu da Pomerania', '1', 'A'), (28, 'Afegao Hound', '1', 'A'),
(29, 'Affenpinscher', '1', 'A'), (30, 'Akita', '1', 'A');

INSERT INTO `raca` (`cod_raca`, `nome_raca`, `cod_especie`, `cod_status_raca`) VALUES (31,'Maine Coon', '2', 'A'), (32,'American Wirehair', '2', 'A'), (33,'Burmilla', '2', 'A'),
(34,'Pixie Bob', '2', 'A'), (35,'American Curl', '2', 'A'), (36,'LaPerm', '2', 'A'), (37,'Toniques', '2', 'A'), (38,'Javanes', '2', 'A'), (39,'Somali', '2', 'A'),
(40,'Chausie', '2', 'A'), (41,'Birmanes', '2', 'A'), (42,'Sagrado da Birmania', '2', 'A'), (43,'Sokoke', '2', 'A'), (44,'Devon Rex', '2', 'A'), (45,'Turkish Van', '2', 'A'),
(46,'Korat', '2', 'A'), (47,'Savannah', '2', 'A'), (48,'Oriental Shorthair', '2', 'A'), (49,'Chartreux', '2', 'A'), (50,'Selkirk Rex', '2', 'A'), (51,'Nebelung', '2', 'A'),
(52,'Cornish Rex', '2', 'A'), (53,'Ocicat', '2', 'A'), (54,'Peterbald', '2', 'A'), (55,'Selvagem', '2', 'A'), (56,'Exotico de Pelo Curto', '2', 'A'), (57,'Azul Russo', '2', 'A'),
(58,'Scottish Fold', '2', 'A'), (59,'Snowshoe', '2', 'A'), (60,'Manx', '2', 'A');

INSERT INTO `raca` (`cod_raca`, `nome_raca`, `cod_especie`, `cod_status_raca`) VALUES (61,'Castor Rex', '3', 'A'), (62,'Holland Lop', '3', 'A'), (63,'Cabeca de Leao', '3', 'A'),
(64,'Angora Ingles', '3', 'A'), (65,'Anao Holandes ', '3', 'A'), (66,'Hotot', '3', 'A'), (67,'Belier', '3', 'A'), (68,'Gigante de Flandres', '3', 'A'), (69,'Tan', '3', 'A'),
(70,'Mini Lop', '3', 'A'), (71,'Fuzzy Lop', '3', 'A'), (72,'Nova Zelandia', '3', 'A'), (73,'Teddy', '3', 'A'), (74,'Gigante de Bouscat', '3', 'A'), (75,'Coelho Gigante Continental', '3', 'A'),
(76,'Coelho Pigmeu da Bacia de Columbia', '3', 'A'), (77,'Jersey Wooly', '3', 'A'), (78,'Britannia Petite', '3', 'A'), (79,'Riesen', '3', 'A'), (80,'Flandre Belga', '3', 'A'),
(81,'Albino', '3', 'A'), (82,'Chichila', '3', 'A'), (83,'Marrom Preto', '3', 'A'), (84,'Gigante de Espanha', '3', 'A'), (85,'California', '3', 'A'), (86,'Borboleta Ingles', '3', 'A'),
(87,'Borboleta Frances', '3', 'A'), (88,'Azul de  Viena', '3', 'A'), (89,'Prateado de Champagne', '3', 'A'), (90,'Leonardo de Borgonha', '3', 'A');

INSERT INTO `raca` (`cod_raca`, `nome_raca`, `cod_especie`, `cod_status_raca`) VALUES (91,'Hamster', '4', 'A'), (92,'Hamster Sirio', '4', 'A'), (93,'Hamster Anao Russo', '4', 'A'),
(94,'Porquinho da India Abissinio', '4', 'A'), (95,'Coroado Americano ', '4', 'A'), (96,'Coroado Ingles', '4', 'A'), (97,'Curly', '4', 'A'), (98,'Pelo Curto(ingles)', '4', 'A'),
(99,'Peruano de Pelo Curto', '4', 'A'), (100,'Rex', '4', 'A'), (101,'Ridgeback', '4', 'A'), (102,'Somali', '4', 'A'), (103,'Teddy Americano', '4', 'A'), (104,'Teddy Suico', '4', 'A'),
(105,'Alpaca', '4', 'A'), (106,'Coronet', '4', 'A'), (107,'Lunkarya', '4', 'A'), (108,'Merino', '4', 'A'), (109,'Mohair', '4', 'A'), (110,'Peruano', '4', 'A'),
(111,'Sheltie', '4', 'A'), (112,'Texel', '4', 'A'), (113,'Baldwin', '4', 'A'), (114,'Skinny', '4', 'A'), (115,'Twister Dumbo', '4', 'A'), (116,'Gerbil', '4', 'A'), (117,'Capivara', '4', 'A'),
(118,'Abissinio', '4', 'A'), (119,'Camundonga', '4', 'A'), (120,'Hamster Chines', '4', 'A');

select * from `raca`;
delete from `raca` where cod_raca = 1 and 26;
--
-- Estrutura da tabela `tipos_usuario`
--

DROP TABLE IF EXISTS `tipos_usuario`;
CREATE TABLE IF NOT EXISTS `tipos_usuario` (
  `cod_tipo_usu` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_usuario` varchar(16) NOT NULL,
  PRIMARY KEY (`cod_tipo_usu`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipos_usuario`
--

INSERT INTO `tipos_usuario` (`cod_tipo_usu`, `tipo_usuario`) VALUES
(1, 'Administrador'),
(2, 'Cliente');

-- --------------------------------------------------------

--
-- Estrutura da tabela `transacao`
--

DROP TABLE IF EXISTS `transacao`;
CREATE TABLE IF NOT EXISTS `transacao` (
  `cod_transacao` int(11) NOT NULL,
  `data_hora_transacao` datetime DEFAULT NULL,
  `cod_tipo_transacao` char(1) DEFAULT NULL,
  `Cod_animal` int(11) DEFAULT NULL,
  `cod_usu` int(11) DEFAULT NULL,
  `cod_status_transacao` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`cod_transacao`),
  KEY `Cod_animal` (`Cod_animal`),
  KEY `cod_usu` (`cod_usu`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `cod_usu` int(11) NOT NULL AUTO_INCREMENT,
  `cod_tipo_usu` int(11) NOT NULL,
  `nome_usu` varchar(60) NOT NULL,
  `email_usu` varchar(50) NOT NULL,
  `senha_usu` varchar(32) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `genero_usu` varchar(1) NOT NULL,
  `celular_usu` double NOT NULL,
  `nascimento_usu` date NOT NULL,
  `imagem_usu` text NOT NULL,
  `cod_status_usu` varchar(1) NOT NULL,
  PRIMARY KEY (`cod_usu`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
UPDATE usuario SET nome_usu = 'Rodrigo', email_usu = 'joao@network.com', celular_usu = '11972596964' WHERE cod_usu = '1';
--
SELECT * FROM `usuario`; 
SELECT * FROM `enderecos`;

SELECT *
FROM usuario AS U
INNER JOIN enderecos AS E ON U.cod_usu = E.cod_usu;


INSERT INTO `usuario` (`cod_usu`, `cod_tipo_usu`, `nome_usu`, `email_usu`, `senha_usu`, `cpf`, `genero_usu`, `celular_usu`, `nascimento_usu`, `imagem_usu`, `cod_status_usu`) VALUES
(1, 1, 'joao', 'joao@network.com', '2c13817fca846f6f9a7d934d71a668ee', '52334374814', 'M', 11972596964, '2002-12-02', 'fotoPerfil.jpg', 'A');
COMMIT;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

