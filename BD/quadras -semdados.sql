-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30/11/2017 às 20:18
-- Versão do servidor: 10.1.28-MariaDB
-- Versão do PHP: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `quadras`
--
CREATE DATABASE IF NOT EXISTS `quadras` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `quadras`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `administrador`
--

CREATE TABLE `administrador` (
  `ID_adm` bigint(11) NOT NULL,
  `Login` varchar(20) NOT NULL,
  `Password` varchar(25) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Telefone` bigint(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cidade`
--

CREATE TABLE `cidade` (
  `Nome` varchar(50) NOT NULL,
  `CEP` int(15) NOT NULL,
  `ID_city` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `gerencia_quadras`
--

CREATE TABLE `gerencia_quadras` (
  `id_adm` bigint(11) NOT NULL,
  `id_local` int(11) NOT NULL,
  `id_gerencia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `horarios`
--

CREATE TABLE `horarios` (
  `id_quadra` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `hr_start` datetime NOT NULL,
  `hr_fim` datetime NOT NULL,
  `ID_hr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `horarios_marcados`
--

CREATE TABLE `horarios_marcados` (
  `ID_marcado` bigint(11) NOT NULL,
  `id_hora` int(11) NOT NULL,
  `maracado_por` int(11) NOT NULL,
  `confirmado_por` bigint(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `local`
--

CREATE TABLE `local` (
  `endereco` varchar(40) NOT NULL,
  `telefone` bigint(13) NOT NULL,
  `nome_local` varchar(40) NOT NULL,
  `ID_local` int(11) NOT NULL,
  `cidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `modalidades`
--

CREATE TABLE `modalidades` (
  `Nome` varchar(30) NOT NULL,
  `ID_mod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `moral`
--

CREATE TABLE `moral` (
  `Nome` varchar(40) NOT NULL,
  `ID_mor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `quadra`
--

CREATE TABLE `quadra` (
  `id_local` int(11) NOT NULL,
  `modalidade` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `ID_quadra` int(11) NOT NULL,
  `descricao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_user` int(11) NOT NULL,
  `telefone` bigint(13) NOT NULL,
  `login` varchar(30) NOT NULL,
  `moral` varchar(1) NOT NULL,
  `senha` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`ID_adm`);

--
-- Índices de tabela `cidade`
--
ALTER TABLE `cidade`
  ADD PRIMARY KEY (`ID_city`);

--
-- Índices de tabela `gerencia_quadras`
--
ALTER TABLE `gerencia_quadras`
  ADD PRIMARY KEY (`id_gerencia`),
  ADD KEY `id_adm` (`id_adm`),
  ADD KEY `id_local` (`id_local`);

--
-- Índices de tabela `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`ID_hr`),
  ADD KEY `horarios_ibfk_1` (`id_quadra`);

--
-- Índices de tabela `horarios_marcados`
--
ALTER TABLE `horarios_marcados`
  ADD PRIMARY KEY (`ID_marcado`),
  ADD UNIQUE KEY `id_hora` (`id_hora`),
  ADD KEY `maracado_por` (`maracado_por`),
  ADD KEY `confirmado_por` (`confirmado_por`);

--
-- Índices de tabela `local`
--
ALTER TABLE `local`
  ADD PRIMARY KEY (`ID_local`),
  ADD KEY `cidade` (`cidade`);

--
-- Índices de tabela `modalidades`
--
ALTER TABLE `modalidades`
  ADD PRIMARY KEY (`ID_mod`);

--
-- Índices de tabela `moral`
--
ALTER TABLE `moral`
  ADD PRIMARY KEY (`ID_mor`);

--
-- Índices de tabela `quadra`
--
ALTER TABLE `quadra`
  ADD PRIMARY KEY (`ID_quadra`),
  ADD KEY `pertence` (`id_local`),
  ADD KEY `modalidade` (`modalidade`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `login` (`login`),
  ADD KEY `moral` (`moral`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `administrador`
--
ALTER TABLE `administrador`
  MODIFY `ID_adm` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `cidade`
--
ALTER TABLE `cidade`
  MODIFY `ID_city` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `gerencia_quadras`
--
ALTER TABLE `gerencia_quadras`
  MODIFY `id_gerencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `horarios`
--
ALTER TABLE `horarios`
  MODIFY `ID_hr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `horarios_marcados`
--
ALTER TABLE `horarios_marcados`
  MODIFY `ID_marcado` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `local`
--
ALTER TABLE `local`
  MODIFY `ID_local` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `modalidades`
--
ALTER TABLE `modalidades`
  MODIFY `ID_mod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `moral`
--
ALTER TABLE `moral`
  MODIFY `ID_mor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `quadra`
--
ALTER TABLE `quadra`
  MODIFY `ID_quadra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `gerencia_quadras`
--
ALTER TABLE `gerencia_quadras`
  ADD CONSTRAINT `gerencia_quadras_ibfk_1` FOREIGN KEY (`id_adm`) REFERENCES `administrador` (`ID_adm`),
  ADD CONSTRAINT `gerencia_quadras_ibfk_2` FOREIGN KEY (`id_local`) REFERENCES `local` (`id_local`);

--
-- Restrições para tabelas `horarios`
--
ALTER TABLE `horarios`
  ADD CONSTRAINT `horarios_ibfk_1` FOREIGN KEY (`id_quadra`) REFERENCES `quadra` (`ID_quadra`);

--
-- Restrições para tabelas `horarios_marcados`
--
ALTER TABLE `horarios_marcados`
  ADD CONSTRAINT `horarios_marcados_ibfk_3` FOREIGN KEY (`id_hora`) REFERENCES `horarios` (`ID_hr`),
  ADD CONSTRAINT `horarios_marcados_ibfk_4` FOREIGN KEY (`maracado_por`) REFERENCES `usuario` (`id_user`),
  ADD CONSTRAINT `horarios_marcados_ibfk_5` FOREIGN KEY (`confirmado_por`) REFERENCES `administrador` (`ID_adm`);

--
-- Restrições para tabelas `local`
--
ALTER TABLE `local`
  ADD CONSTRAINT `local_ibfk_1` FOREIGN KEY (`cidade`) REFERENCES `cidade` (`ID_city`);

--
-- Restrições para tabelas `quadra`
--
ALTER TABLE `quadra`
  ADD CONSTRAINT `pertence` FOREIGN KEY (`id_local`) REFERENCES `local` (`id_local`),
  ADD CONSTRAINT `quadra_ibfk_1` FOREIGN KEY (`modalidade`) REFERENCES `modalidades` (`ID_mod`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
