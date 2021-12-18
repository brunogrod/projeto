-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18-Dez-2021 às 22:43
-- Versão do servidor: 10.4.21-MariaDB
-- versão do PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bdacadlutas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblalunos`
--

CREATE TABLE `tblalunos` (
  `idAluno` int(11) NOT NULL,
  `fotoAluno` varchar(50) NOT NULL,
  `nomeAluno` varchar(100) NOT NULL,
  `idmodalidade` int(11) NOT NULL,
  `telefoneAluno` varchar(20) NOT NULL,
  `emailAluno` varchar(50) NOT NULL,
  `atestadoAluno` varchar(50) NOT NULL,
  `pgAluno` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblcalendario`
--

CREATE TABLE `tblcalendario` (
  `idcalendario` int(11) NOT NULL,
  `idModalidade` int(11) NOT NULL,
  `horarios` varchar(50) NOT NULL,
  `diasSemana` varchar(100) NOT NULL,
  `idprofessor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tblcalendario`
--

INSERT INTO `tblcalendario` (`idcalendario`, `idModalidade`, `horarios`, `diasSemana`, `idprofessor`) VALUES
(1, 1, '20:00', 'Dias de Semana', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblfuncionarios`
--

CREATE TABLE `tblfuncionarios` (
  `idfuncionarios` int(11) NOT NULL,
  `nomeFunc` varchar(100) NOT NULL,
  `emailFunc` varchar(100) NOT NULL,
  `cpfFunc` varchar(20) NOT NULL,
  `senha` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblmodalidades`
--

CREATE TABLE `tblmodalidades` (
  `idmodalidade` int(11) NOT NULL,
  `modal` varchar(30) NOT NULL,
  `preco` float(10,2) NOT NULL,
  `idProfessor` varchar(50) NOT NULL,
  `diasSemana` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tblmodalidades`
--

INSERT INTO `tblmodalidades` (`idmodalidade`, `modal`, `preco`, `idProfessor`, `diasSemana`) VALUES
(1, 'Judo', 170.00, '1', 'Terças e Quintas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblnivelacesso`
--

CREATE TABLE `tblnivelacesso` (
  `idsituacao` int(11) NOT NULL,
  `situacao` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tblnivelacesso`
--

INSERT INTO `tblnivelacesso` (`idsituacao`, `situacao`) VALUES
(1, 'Administrador'),
(2, 'Colaborador'),
(3, 'Usuario');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblprofessores`
--

CREATE TABLE `tblprofessores` (
  `idprofessor` int(11) NOT NULL,
  `fotoProf` varchar(50) NOT NULL,
  `nomeProf` varchar(150) NOT NULL,
  `idmodalidade` int(11) NOT NULL,
  `dispon` varchar(50) NOT NULL,
  `personal` varchar(10) NOT NULL,
  `horaaula` varchar(10) NOT NULL,
  `telefoneProf` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tblprofessores`
--

INSERT INTO `tblprofessores` (`idprofessor`, `fotoProf`, `nomeProf`, `idmodalidade`, `dispon`, `personal`, `horaaula`, `telefoneProf`) VALUES
(1, '', 'Rafael Silva', 1, 'Segunda, Quartas e Sextas', 'Sim', '20:00', '(21) 1234-5678'),
(3, '', 'João', 3, 'Terça Feira', 'Não', '12:00', '(21) 1234-5678'),
(4, '', 'Arthur', 2, 'Sexta Feira', 'Sim', '15:00', '(21) 1234-5678');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblsituacao`
--

CREATE TABLE `tblsituacao` (
  `idsituacao` int(11) NOT NULL,
  `situacao` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tblsituacao`
--

INSERT INTO `tblsituacao` (`idsituacao`, `situacao`) VALUES
(1, 'Ativo'),
(2, 'Inativo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblusuarios`
--

CREATE TABLE `tblusuarios` (
  `idusuario` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `idsituacao` int(11) NOT NULL,
  `idnivelacesso` int(11) NOT NULL,
  `criado` date NOT NULL,
  `modificado` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tblusuarios`
--

INSERT INTO `tblusuarios` (`idusuario`, `nome`, `email`, `senha`, `idsituacao`, `idnivelacesso`, `criado`, `modificado`) VALUES
(1, 'Administrador', 'adm@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 1, '2021-12-15', '2021-12-16'),
(2, 'Maria', 'maria@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 2, '2021-12-16', '2021-12-16');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tblalunos`
--
ALTER TABLE `tblalunos`
  ADD PRIMARY KEY (`idAluno`);

--
-- Índices para tabela `tblcalendario`
--
ALTER TABLE `tblcalendario`
  ADD PRIMARY KEY (`idcalendario`);

--
-- Índices para tabela `tblfuncionarios`
--
ALTER TABLE `tblfuncionarios`
  ADD PRIMARY KEY (`idfuncionarios`);

--
-- Índices para tabela `tblmodalidades`
--
ALTER TABLE `tblmodalidades`
  ADD PRIMARY KEY (`idmodalidade`);

--
-- Índices para tabela `tblnivelacesso`
--
ALTER TABLE `tblnivelacesso`
  ADD PRIMARY KEY (`idsituacao`);

--
-- Índices para tabela `tblprofessores`
--
ALTER TABLE `tblprofessores`
  ADD PRIMARY KEY (`idprofessor`);

--
-- Índices para tabela `tblsituacao`
--
ALTER TABLE `tblsituacao`
  ADD PRIMARY KEY (`idsituacao`);

--
-- Índices para tabela `tblusuarios`
--
ALTER TABLE `tblusuarios`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tblalunos`
--
ALTER TABLE `tblalunos`
  MODIFY `idAluno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tblcalendario`
--
ALTER TABLE `tblcalendario`
  MODIFY `idcalendario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tblfuncionarios`
--
ALTER TABLE `tblfuncionarios`
  MODIFY `idfuncionarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tblmodalidades`
--
ALTER TABLE `tblmodalidades`
  MODIFY `idmodalidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tblnivelacesso`
--
ALTER TABLE `tblnivelacesso`
  MODIFY `idsituacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tblprofessores`
--
ALTER TABLE `tblprofessores`
  MODIFY `idprofessor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tblsituacao`
--
ALTER TABLE `tblsituacao`
  MODIFY `idsituacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tblusuarios`
--
ALTER TABLE `tblusuarios`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
