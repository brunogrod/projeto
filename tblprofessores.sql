-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17-Dez-2021 às 23:50
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

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tblprofessores`
--
ALTER TABLE `tblprofessores`
  ADD PRIMARY KEY (`idprofessor`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tblprofessores`
--
ALTER TABLE `tblprofessores`
  MODIFY `idprofessor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
