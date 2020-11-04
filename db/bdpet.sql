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
  `Cod_animal` int(11) NOT NULL,
  `sexo_animal` char(1) DEFAULT NULL,
  `nome_animal` varchar(20) DEFAULT NULL,
  `ano_nasc_animal` int(11) DEFAULT NULL,
  `preco_animal` decimal(9,2) DEFAULT NULL,
  `cod_raca` int(11) DEFAULT NULL,
  `cod_usu` int(11) DEFAULT NULL,
  `cod_status_animal` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`Cod_animal`),
  KEY `cod_usu` (`cod_usu`),
  KEY `cod_raca` (`cod_raca`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `animal` (`cod_animal`, `sexo_animal`, `nome_animal`, `ano_nasc_animal`, `preco_animal`, `cod_raca`, `cod_especie`, `cod_usu`, `cod_status_animal`) VALUES
(1, 'F', 'Toto', '2015', '', '1', '1', '1', 'A'); 
SELECT * FROM `animal`;
SELECT * FROM `animal` INNER JOIN `raca` ON `animal`.`cod_raca` = `raca`.`cod_raca`;
SELECT * FROM `animal` INNER JOIN `especie` ON `animal`.`cod_especie` = `especie`.`cod_especie`;

SELECT nome_raca AS raca,
cod_animal, nome_animal, sexo_animal, ano_nasc_animal, preco_animal, cod_status_animal AS animal,
nome_especie AS especie
FROM animal AS A
INNER JOIN raca AS R
ON A.cod_raca = R.cod_raca
INNER JOIN especie AS E
ON A.cod_especie = E.cod_especie;

SELECT nome_raca AS raca, cod_animal, nome_animal, sexo_animal, ano_nasc_animal, preco_animal, cod_status_animal AS animal, nome_especie AS especie FROM animal AS A INNER JOIN raca AS R ON A.cod_raca = R.cod_raca INNER JOIN especie AS E ON A.cod_especie = E.cod_especie;

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
INSERT INTO `especie` (`cod_especie`, `nome_especie`, `cod_status_especie`) VALUES (4, 'Roedor', 'R');
select * from `especie`;
--
-- Estrutura da tabela `foto`
--

DROP TABLE IF EXISTS `foto`;
CREATE TABLE IF NOT EXISTS `foto` (
  `cod_foto` int(11) NOT NULL,
  `url_foto` varchar(100) DEFAULT NULL,
  `Cod_animal` int(11) DEFAULT NULL,
  `Cod_usu` int(11) DEFAULT NULL,
  `cod_status_foto` varchar(1) DEFAULT NULL,
  `data` datetime,
  PRIMARY KEY (`cod_foto`),
  KEY `Cod_animal` (`Cod_animal`)
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
  `cod_status_raca` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`cod_raca`),
  KEY `cod_especie` (`cod_especie`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------
INSERT INTO `raca` (`cod_raca`, `nome_raca`, `cod_especie`, `cod_status_raca`) VALUES (4, 'Bearded Collie', '1', 'BC'), (5, 'Bedlington Terrier', '1', 'BT'),
(6, 'Bichon Frisé', '1', 'BF'), (7, 'Bloodhound', '1', 'BD'), (8, 'Bobtail', '1', 'BB'), (9, 'Boxer', '1', 'BX'), (10, 'Buldogue Francês', '1', 'BE'),
(11, 'Buldogue Inglês', '1', 'BI'), (12, 'Cane Corso', '1', 'CC'), (13, 'Chihuahua', '1', 'CH'), (14, 'Chow Chow', '1', 'CW'), (15, 'Dálmata', '1', 'DM'),
(16, 'Dogue Alemão', '1', 'DA'), (17, 'Labrador Retriever', '1', 'LR'), (18, 'Husky Siberiano', '1', 'HS'), (19, 'Terrier Escocês', '1', 'TE'), (20, 'Rottweiler', '1', 'RT'), 
(21, 'Pastor Alemão', '1', 'PA'), (22, 'Pinscher Miniatura', '1', 'PM'), (23, 'Pastor Australiano', '1', 'PS'), (24, 'Maltês', '1', 'MA'), (25, 'Yorkshire Terrier', '1', 'YT');
select * from `raca`;
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
--
SELECT * FROM `usuario`; 
SELECT * FROM `enderecos`;
UPDATE enderecos SET cep = '06418060', numero = '515' WHERE cod_usu = '5';
DELETE FROM usuario WHERE cod_usu = '1500';

INSERT INTO `usuario` (`cod_usu`, `cod_tipo_usu`, `nome_usu`, `email_usu`, `senha_usu`, `cpf`, `genero_usu`, `celular_usu`, `nascimento_usu`, `imagem_usu`, `cod_status_usu`) VALUES
(1, 1, 'joao', 'joao@network.com', '2c13817fca846f6f9a7d934d71a668ee', '52334374814', 'M', 11972596964, '2002-12-02', 'fotoPerfil.jpg', 'A');
COMMIT;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

