-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 24-Dez-2017 às 21:44
-- Versão do servidor: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teste_idealizza`
--
CREATE DATABASE IF NOT EXISTS `teste_idealizza` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `teste_idealizza`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos`
--

DROP TABLE IF EXISTS `alunos`;
CREATE TABLE IF NOT EXISTS `alunos` (
  `id_aluno` bigint(20) NOT NULL,
  `id_dados_pessoais` bigint(20) NOT NULL,
  `id_dados_cobranca` bigint(20) NOT NULL,
  `id_status` bigint(20) NOT NULL,
  `id_idioma` bigint(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cobranca`
--

DROP TABLE IF EXISTS `cobranca`;
CREATE TABLE IF NOT EXISTS `cobranca` (
  `id_cobranca` bigint(20) NOT NULL,
  `logradouro` varchar(100) NOT NULL,
  `numero` int(11) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `cep` varchar(20) NOT NULL,
  `id_estado` bigint(20) NOT NULL,
  `telefone` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `dados_pessoais`
--

DROP TABLE IF EXISTS `dados_pessoais`;
CREATE TABLE IF NOT EXISTS `dados_pessoais` (
  `id_dados` bigint(20) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `data_nascimento` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estado`
--

DROP TABLE IF EXISTS `estado`;
CREATE TABLE IF NOT EXISTS `estado` (
  `id_estado` bigint(20) NOT NULL,
  `nome_estado` varchar(30) NOT NULL,
  `uf` char(2) DEFAULT NULL,
  `id_usuario` bigint(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `estado`
--

INSERT INTO `estado` (`id_estado`, `nome_estado`, `uf`, `id_usuario`) VALUES
(1, 'Acre', NULL, NULL),
(2, 'Bahia', NULL, NULL),
(3, 'Roraima', NULL, NULL),
(4, 'Rondônia', NULL, NULL),
(5, 'Pará', NULL, NULL),
(6, 'Amazonas', NULL, NULL),
(7, 'Amapá', NULL, NULL),
(8, 'Tocantins', NULL, NULL),
(9, 'Rio Grande do Norte', NULL, NULL),
(10, 'Piauí', NULL, NULL),
(11, 'Pernambuco', NULL, NULL),
(12, 'Sergipe', NULL, NULL),
(13, 'Alagoas', NULL, NULL),
(14, 'Paraíba', NULL, NULL),
(15, 'Ceará', NULL, NULL),
(16, 'Maranhão', NULL, NULL),
(17, 'Paraná', NULL, NULL),
(18, 'Rio Grande do Sul', NULL, NULL),
(19, 'Santa Catarina', NULL, NULL),
(20, 'Minas Gerais', NULL, NULL),
(21, 'Espírito Santo', NULL, NULL),
(22, 'Rio de Janeiro', NULL, NULL),
(23, 'São Paulo', NULL, NULL),
(24, 'Mato Grosso', NULL, NULL),
(25, 'Mato Grosso do Sul', NULL, NULL),
(26, 'Goiás', NULL, NULL),
(27, 'Distrito Federal', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `idioma`
--

DROP TABLE IF EXISTS `idioma`;
CREATE TABLE IF NOT EXISTS `idioma` (
  `id_idioma` bigint(20) NOT NULL,
  `nome_idioma` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `idioma`
--

INSERT INTO `idioma` (`id_idioma`, `nome_idioma`) VALUES
(1, 'Inglês'),
(2, 'Francês'),
(3, 'Espanhol'),
(4, 'Alemão'),
(5, 'Italiano');

-- --------------------------------------------------------

--
-- Estrutura da tabela `status`
--

DROP TABLE IF EXISTS `status`;
CREATE TABLE IF NOT EXISTS `status` (
  `id_status` bigint(11) NOT NULL,
  `codigo_status` char(1) NOT NULL,
  `nome_status` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `status`
--

INSERT INTO `status` (`id_status`, `codigo_status`, `nome_status`) VALUES
(3, 'A', 'Ativo'),
(4, 'I', 'Inativo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`id_aluno`),
  ADD KEY `IDX_ALUNO` (`id_dados_pessoais`,`id_dados_cobranca`),
  ADD KEY `id_status` (`id_status`),
  ADD KEY `id_idioma` (`id_idioma`),
  ADD KEY `cons_aluno_cobranca` (`id_dados_cobranca`);

--
-- Indexes for table `cobranca`
--
ALTER TABLE `cobranca`
  ADD PRIMARY KEY (`id_cobranca`),
  ADD KEY `id_estado` (`id_estado`);

--
-- Indexes for table `dados_pessoais`
--
ALTER TABLE `dados_pessoais`
  ADD PRIMARY KEY (`id_dados`);

--
-- Indexes for table `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_estado`),
  ADD KEY `ind_usu_estado` (`id_usuario`);

--
-- Indexes for table `idioma`
--
ALTER TABLE `idioma`
  ADD PRIMARY KEY (`id_idioma`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`),
  ADD KEY `codigo_status` (`codigo_status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alunos`
--
ALTER TABLE `alunos`
  MODIFY `id_aluno` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `cobranca`
--
ALTER TABLE `cobranca`
  MODIFY `id_cobranca` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `dados_pessoais`
--
ALTER TABLE `dados_pessoais`
  MODIFY `id_dados` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `estado`
--
ALTER TABLE `estado`
  MODIFY `id_estado` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `idioma`
--
ALTER TABLE `idioma`
  MODIFY `id_idioma` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id_status` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `alunos`
--
ALTER TABLE `alunos`
  ADD CONSTRAINT `cons_aluno_cobranca` FOREIGN KEY (`id_dados_cobranca`) REFERENCES `cobranca` (`id_cobranca`),
  ADD CONSTRAINT `cons_aluno_idioma` FOREIGN KEY (`id_idioma`) REFERENCES `idioma` (`id_idioma`),
  ADD CONSTRAINT `cons_aluno_status` FOREIGN KEY (`id_status`) REFERENCES `status` (`id_status`),
  ADD CONSTRAINT `cons_alunos_dados` FOREIGN KEY (`id_dados_pessoais`) REFERENCES `dados_pessoais` (`id_dados`);

--
-- Limitadores para a tabela `cobranca`
--
ALTER TABLE `cobranca`
  ADD CONSTRAINT `cons_cobranca_estado` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
