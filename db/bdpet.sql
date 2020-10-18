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
  `id_venda_animal` char(1) DEFAULT NULL,
  `cod_raca` int(11) DEFAULT NULL,
  `cod_usu` int(11) DEFAULT NULL,
  `cod_status_animal` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`Cod_animal`),
  KEY `cod_usu` (`cod_usu`),
  KEY `cod_raca` (`cod_raca`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

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
  PRIMARY KEY (`cod_endereco`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `enderecos`
--

INSERT INTO `enderecos` (`cod_endereco`, `rua`, `numero`, `bairro`, `cidade`, `estado`, `cep`, `complemento`) VALUES
(1, 'rua cesario verde', 187, 'jardim tupã', 'barueri', 'SP', '06435050', 'casa 2');

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

--
-- Estrutura da tabela `foto`
--

DROP TABLE IF EXISTS `foto`;
CREATE TABLE IF NOT EXISTS `foto` (
  `cod_foto` int(11) NOT NULL,
  `url_foto` varchar(100) DEFAULT NULL,
  `Cod_animal` int(11) DEFAULT NULL,
  `cod_status_foto` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`cod_foto`),
  KEY `Cod_animal` (`Cod_animal`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `raca`
--

DROP TABLE IF EXISTS `raca`;
CREATE TABLE IF NOT EXISTS `raca` (
  `cod_raca` int(11) NOT NULL,
  `nome_raca` varchar(20) DEFAULT NULL,
  `cod_especie` int(11) DEFAULT NULL,
  `cod_status_raca` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`cod_raca`),
  KEY `cod_especie` (`cod_especie`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

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
  `genero_usu` varchar(1) NOT NULL,
  `celular_usu` double NOT NULL,
  `nascimento_usu` date NOT NULL,
  `imagem_usu` text NOT NULL,
  `cod_endereco` int(11) NOT NULL,
  `cod_status_usu` varchar(1) NOT NULL,
  PRIMARY KEY (`cod_usu`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--
SELECT * FROM `usuario`; 

INSERT INTO `usuario` (`cod_usu`, `cod_tipo_usu`, `nome_usu`, `email_usu`, `senha_usu`, `genero_usu`, `celular_usu`, `nascimento_usu`, `imagem_usu`, `cod_endereco`, `cod_status_usu`) VALUES
(1, 2, 'jonatas', 'jonatas@jonatas.com', '4a7d1ed414474e4033ac29ccb8653d9b', 'M', 11972596964, '2000-03-19', 'fotoPerfil.jpg', 1, 'A');
COMMIT;

-- Estrutura para tabela `avaliacos`
--

CREATE TABLE `avaliacos` (
  `id` int(11) NOT NULL,
  `qnt_estrela` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `avaliacos`
--

INSERT INTO `avaliacos` (`id`, `qnt_estrela`, `created`, `modified`) VALUES
(1, 3, '2017-08-28 22:35:17', NULL),
(2, 5, '2017-08-28 22:35:35', NULL);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `avaliacos`
--
ALTER TABLE `avaliacos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `avaliacos`
--
ALTER TABLE `avaliacos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

select * from `avaliacos`;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
