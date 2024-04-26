-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25-Abr-2024 às 16:44
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `lpi_tp`
--
CREATE DATABASE IF NOT EXISTS `lpi_tp` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `lpi_tp`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

CREATE TABLE `curso` (
  `id_curso` int(11) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `duracao` time NOT NULL,
  `preco` decimal(8,2) DEFAULT NULL,
  `nome` varchar(60) DEFAULT NULL,
  `idade_maxima` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `curso`
--

INSERT INTO `curso` (`id_curso`, `descricao`, `duracao`, `preco`, `nome`, `idade_maxima`) VALUES(13, 'Aprenda a programar em Python desde o básico até conceitos avançados.', '30:00:00', 99.99, 'Curso de Programação em Python', NULL);
INSERT INTO `curso` (`id_curso`, `descricao`, `duracao`, `preco`, `nome`, `idade_maxima`) VALUES(14, 'Aprenda a desenvolver páginas web usando HTML, CSS e JavaScript.', '45:30:00', 129.99, 'Curso de Desenvolvimento Web', NULL);
INSERT INTO `curso` (`id_curso`, `descricao`, `duracao`, `preco`, `nome`, `idade_maxima`) VALUES(15, 'Conheça os fundamentos da inteligência artificial e suas aplicações.', '20:15:00', 79.99, 'Curso de Introdução à Inteligência Artificial', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `inscricao`
--

CREATE TABLE `inscricao` (
  `id_inscricao` int(11) NOT NULL,
  `id_utilizador` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `data_inscricao` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `nivel_acesso`
--

CREATE TABLE `nivel_acesso` (
  `id_nivel` int(11) NOT NULL,
  `descricao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `nivel_acesso`
--

INSERT INTO `nivel_acesso` (`id_nivel`, `descricao`) VALUES(1, 'aluno');
INSERT INTO `nivel_acesso` (`id_nivel`, `descricao`) VALUES(2, 'docente');
INSERT INTO `nivel_acesso` (`id_nivel`, `descricao`) VALUES(3, 'administrador');
INSERT INTO `nivel_acesso` (`id_nivel`, `descricao`) VALUES(4, 'não validado');
INSERT INTO `nivel_acesso` (`id_nivel`, `descricao`) VALUES(5, 'apagado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `utilizador`
--

CREATE TABLE `utilizador` (
  `id_utilizador` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `nivel_acesso` int(11) NOT NULL,
  `data_nascimento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `utilizador`
--

INSERT INTO `utilizador` (`id_utilizador`, `nome`, `email`, `password`, `nivel_acesso`, `data_nascimento`) VALUES(1, 'aluno', 'aluno', 'ca0cd09a12abade3bf0777574d9f987f', 1, NULL);
INSERT INTO `utilizador` (`id_utilizador`, `nome`, `email`, `password`, `nivel_acesso`, `data_nascimento`) VALUES(2, 'docente', 'docente', 'ac99fecf6fcb8c25d18788d14a5384ee', 2, NULL);
INSERT INTO `utilizador` (`id_utilizador`, `nome`, `email`, `password`, `nivel_acesso`, `data_nascimento`) VALUES(3, 'administrador', 'admin', '21232f297a57a5a743894a0e4a801fc3', 3, NULL);
INSERT INTO `utilizador` (`id_utilizador`, `nome`, `email`, `password`, `nivel_acesso`, `data_nascimento`) VALUES(6, 'miguel', 'miguel', '81dc9bdb52d04dc20036dbd8313ed055', 4, NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id_curso`);

--
-- Índices para tabela `inscricao`
--
ALTER TABLE `inscricao`
  ADD PRIMARY KEY (`id_inscricao`),
  ADD KEY `fk_chave_estrangeira_utilizador` (`id_utilizador`),
  ADD KEY `fk_chave_estrangeira_curso` (`id_curso`);

--
-- Índices para tabela `nivel_acesso`
--
ALTER TABLE `nivel_acesso`
  ADD PRIMARY KEY (`id_nivel`);

--
-- Índices para tabela `utilizador`
--
ALTER TABLE `utilizador`
  ADD PRIMARY KEY (`id_utilizador`),
  ADD UNIQUE KEY `unique_email` (`email`),
  ADD KEY `fk_chave_estrangeira_acesso` (`nivel_acesso`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `curso`
--
ALTER TABLE `curso`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `utilizador`
--
ALTER TABLE `utilizador`
  MODIFY `id_utilizador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `inscricao`
--
ALTER TABLE `inscricao`
  ADD CONSTRAINT `fk_chave_estrangeira_curso` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`),
  ADD CONSTRAINT `fk_chave_estrangeira_utilizador` FOREIGN KEY (`id_utilizador`) REFERENCES `utilizador` (`id_utilizador`);

--
-- Limitadores para a tabela `utilizador`
--
ALTER TABLE `utilizador`
  ADD CONSTRAINT `fk_chave_estrangeira_acesso` FOREIGN KEY (`nivel_acesso`) REFERENCES `nivel_acesso` (`id_nivel`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
