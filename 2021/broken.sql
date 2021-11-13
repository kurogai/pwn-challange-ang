-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 30-Out-2021 às 16:30
-- Versão do servidor: 5.7.31
-- versão do PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `broken`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `account`
--

DROP TABLE IF EXISTS `account`;
CREATE TABLE IF NOT EXISTS `account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(30) NOT NULL,
  `user` varchar(30) NOT NULL,
  `password` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `account`
--

INSERT INTO `account` (`id`, `email`, `user`, `password`) VALUES
(1, 'admin@broken.com', 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918'),
(2, 'maria@maria.com', 'maria', '94aec9fbed989ece189a7e172c9cf41669050495152bc4c1dbf2a38d7fd85627'),
(9, 'teste@broken.com', 'teste', '46070d4bf934fb0d4b06d9e2c46e346944e322444900a435d7d9a95e6d7435f5'),
(4, 'aaa@aaa.com', 'aaa', '9834876dcfb05cb167a5c24953eba58c4ac89b1adf57f28f2f9d09af107ee8f0'),
(5, 'aaa@aaa.com', 'aaa', '9834876dcfb05cb167a5c24953eba58c4ac89b1adf57f28f2f9d09af107ee8f0'),
(6, 'aaa@aaa.com', 'aaa', '9834876dcfb05cb167a5c24953eba58c4ac89b1adf57f28f2f9d09af107ee8f0'),
(7, 'aaa@aaa.com', 'aaa', '9834876dcfb05cb167a5c24953eba58c4ac89b1adf57f28f2f9d09af107ee8f0'),
(8, 'aaa@aaa.com', 'aaa', '9834876dcfb05cb167a5c24953eba58c4ac89b1adf57f28f2f9d09af107ee8f0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  `content` varchar(100) NOT NULL,
  `data` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `message`
--

INSERT INTO `message` (`id`, `nome`, `content`, `data`) VALUES
(1, 'Heber Julio', 'oasndsadnjdsa', '21-21-2021'),
(2, 'Maria Alonso', 'oiasnnsaosnad', 'asiosad'),
(3, 'admin', 'Bom dia', '29-09-21'),
(4, 'admin', 'Bom dia', '29-09-21'),
(5, 'admin', 'Oie', '29-09-21'),
(6, 'admin', 'Oie', '29-09-21'),
(7, 'admin', 'Hello World', '29-09-21'),
(8, 'admin', 'Wow pessoal', '29-09-21'),
(9, 'admin', '<img src=\'x\'>', '29-09-21'),
(10, 'maria', 'XSS aqui? Wow pessoal', '29-09-21'),
(11, 'admin', 'Eae pessoal', '29-09-21'),
(12, 'teste', 'Rui orlando nao presta', '29-10-21'),
(13, 'teste', 'Boa sorte com o xss pessoal', '29-10-21'),
(14, 'teste', 'Please work', '29-10-21'),
(15, 'teste', 'Eae irmao', '29-10-21');

-- --------------------------------------------------------

--
-- Estrutura da tabela `recover`
--

DROP TABLE IF EXISTS `recover`;
CREATE TABLE IF NOT EXISTS `recover` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(20) NOT NULL,
  `token` varchar(20) NOT NULL,
  `code` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `recover`
--

INSERT INTO `recover` (`id`, `email`, `token`, `code`) VALUES
(5, 'admin@broken.com', '18621eb537cda6202a1c', 482);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
