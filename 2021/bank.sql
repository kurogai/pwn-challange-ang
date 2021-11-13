-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 30-Out-2021 às 16:29
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
-- Banco de dados: `bank`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `account`
--

DROP TABLE IF EXISTS `account`;
CREATE TABLE IF NOT EXISTS `account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `idade` int(11) NOT NULL,
  `location` varchar(30) NOT NULL,
  `money` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `account`
--

INSERT INTO `account` (`id`, `login`, `password`, `idade`, `location`, `money`, `nome`) VALUES
(1, 'teste', '698dc19d489c4e4db73e28a713eab07b', 18, 'Moz', 0, 'Teste 1'),
(6, 'b2de', '698dc19d489c4e4db73e28a713eab07b', 18, 'Mutamba', 0, 'Mauricio de souza');

-- --------------------------------------------------------

--
-- Estrutura da tabela `bank_login`
--

DROP TABLE IF EXISTS `bank_login`;
CREATE TABLE IF NOT EXISTS `bank_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(12) NOT NULL,
  `login` varchar(30) NOT NULL,
  `password` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `bank_login`
--

INSERT INTO `bank_login` (`id`, `uid`, `login`, `password`) VALUES
(1, 'gui_1923_aad', 'guilherme', '192309aaddc500140db28668e1bbd8b5'),
(2, 'ana_3db9_aab', 'ana', '3bd49aabc5fef61ccb0a0b1af0af19b4'),
(3, 'teste_00', 'teste', '698dc19d489c4e4db73e28a713eab07b');

-- --------------------------------------------------------

--
-- Estrutura da tabela `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emissor` varchar(10) NOT NULL,
  `receptor` varchar(10) NOT NULL,
  `content` varchar(512) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `message`
--

INSERT INTO `message` (`id`, `emissor`, `receptor`, `content`) VALUES
(1, 'b2de', 'teste', 'Teste de mensagem'),
(2, 'b2de', 'teste', 'Teste de mensagem'),
(3, 'b2de', 'teste', 'Oie, devolve meu dinheiro'),
(5, 'teste', 'b2de', 'Teste de mensagem para saber se ela chegou ao cliente com sucesso...'),
(6, 'b2de', 'teste', 'WWWWWWWWWWWWWWWWWWWWAAAAAAAAAAAAA');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
