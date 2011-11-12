-- phpMyAdmin SQL Dump
-- version 3.3.3
-- http://www.phpmyadmin.net
--
-- Servidor: mysql09.uni5.net
-- Tempo de Geração: Nov 11, 2011 as 01:33 PM
-- Versão do Servidor: 5.1.56
-- Versão do PHP: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `zorbit02`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `msg`
--

CREATE TABLE IF NOT EXISTS `msg` (
  `id_msg` int(11) NOT NULL AUTO_INCREMENT,
  `nome_msg` varchar(64) NOT NULL,
  `texto_msg` text NOT NULL,
  `data_msg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_msg`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `msg`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `sessao`
--

CREATE TABLE IF NOT EXISTS `sessao` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `sessao`
--

