-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30/11/2017 às 20:17
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

DELIMITER $$
--
-- Procedimentos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_usuarios_insert` (`plogin` VARCHAR(30), `psenha` VARCHAR(30), `ptelefone` BIGINT(11), `pemail` VARCHAR(30))  BEGIN
insert into usuario (login,senha,telefone,email,moral) values (plogin,psenha,ptelefone,pemail,1);

 SELECT * FROM usuario WHERE ID=LAST_INSERT_ID();
END$$

DELIMITER ;

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

--
-- Fazendo dump de dados para tabela `administrador`
--

INSERT INTO `administrador` (`ID_adm`, `Login`, `Password`, `Email`, `Telefone`) VALUES
(1, 'Jribarr', 'Jr18', 'j_ribarr@Hotmail.com', 5198975221),
(2, 'Junior', 'J1', 'jauhsdua@hguas.com', 519887548);

-- --------------------------------------------------------

--
-- Estrutura para tabela `cidade`
--

CREATE TABLE `cidade` (
  `Nome` varchar(50) NOT NULL,
  `CEP` int(15) NOT NULL,
  `ID_city` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `cidade`
--

INSERT INTO `cidade` (`Nome`, `CEP`, `ID_city`) VALUES
('Charqueadas', 96745000, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `gerencia_quadras`
--

CREATE TABLE `gerencia_quadras` (
  `id_adm` bigint(11) NOT NULL,
  `id_local` int(11) NOT NULL,
  `id_gerencia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `gerencia_quadras`
--

INSERT INTO `gerencia_quadras` (`id_adm`, `id_local`, `id_gerencia`) VALUES
(1, 1, 1),
(2, 2, 2);

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

--
-- Fazendo dump de dados para tabela `horarios`
--

INSERT INTO `horarios` (`id_quadra`, `status`, `hr_start`, `hr_fim`, `ID_hr`) VALUES
(1, 0, '2017-11-28 01:00:00', '2017-11-28 02:00:00', 1),
(1, 1, '2017-11-28 01:00:00', '2017-11-28 02:00:00', 2),
(1, 0, '2017-11-28 03:00:00', '2017-11-28 04:00:00', 3),
(1, 0, '2017-11-28 04:00:00', '2017-11-28 05:00:00', 4),
(1, 1, '2017-11-28 05:00:00', '2017-11-28 06:00:00', 5),
(3, 2, '2017-11-29 09:00:00', '2017-11-29 10:00:00', 6),
(1, 0, '2017-12-01 06:00:00', '2017-11-01 07:00:00', 7),
(2, 1, '2017-12-01 09:00:00', '2017-12-01 10:00:00', 8);

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

--
-- Fazendo dump de dados para tabela `horarios_marcados`
--

INSERT INTO `horarios_marcados` (`ID_marcado`, `id_hora`, `maracado_por`, `confirmado_por`) VALUES
(8, 3, 22, 1),
(10, 4, 10, 1),
(11, 6, 12, 2),
(12, 1, 12, 1),
(13, 7, 6, 1),
(14, 8, 7, NULL);

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

--
-- Fazendo dump de dados para tabela `local`
--

INSERT INTO `local` (`endereco`, `telefone`, `nome_local`, `ID_local`, `cidade`) VALUES
('G47', 5198975221, 'Jr Soccer', 1, 1),
('Av.Brasil 239', 51488487578, 'RANCATOK', 2, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `modalidades`
--

CREATE TABLE `modalidades` (
  `Nome` varchar(30) NOT NULL,
  `ID_mod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `modalidades`
--

INSERT INTO `modalidades` (`Nome`, `ID_mod`) VALUES
('Futebol', 1);

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

--
-- Fazendo dump de dados para tabela `quadra`
--

INSERT INTO `quadra` (`id_local`, `modalidade`, `nome`, `ID_quadra`, `descricao`) VALUES
(1, 1, 'Quadra do G', 1, 'Quadra de 100x100m  com duas goleiras e suporte pra rede de volei...etc'),
(1, 1, 'Quadra2', 2, '100x100m² 2 goleiras '),
(2, 1, 'Quadra volei', 3, 'rede 100x100m²');

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
-- Fazendo dump de dados para tabela `usuario`
--

INSERT INTO `usuario` (`id_user`, `telefone`, `login`, `moral`, `senha`, `email`) VALUES
(3, 5199897553, 'Mauricio Maia', '1', 'm123', 'MM@gmail.com'),
(5, 183881, 'Novo', '1', '123', 'Novo@mail.com'),
(6, 666666, 'Alexandre Debom', '1', 'dalhepipa', 'alexandrepipa@pipashine.com'),
(7, 5198975544, 'natalia', '1', 'frank13', 'nati@gmail.com'),
(8, 5198897524, 'jean', '1', 'kdelao', 'j@gmail.com'),
(10, 51698885, 'host', '1', 'h1', 'h@gmail.com'),
(11, 41455544, 'Junior Quadros', '1', 'j1', 'j_q@gmail.com'),
(12, 518887784, 'Tio ivo', '1', 'ti123', 'TI@gmail.com'),
(22, 519383948, 'Julior', '1', 'ir3', 'jul@gmail.com');

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
