-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 30, 2023 at 06:33 PM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bora_trabalhar`
--

-- --------------------------------------------------------

--
-- Table structure for table `cad_cliente`
--

CREATE TABLE `cad_cliente` (
  `nome` varchar(45) DEFAULT NULL,
  `sobrenome` varchar(45) DEFAULT NULL,
  `cpf` varchar(14) NOT NULL,
  `dt_nascimento` varchar(10) DEFAULT NULL,
  `genero` varchar(10) DEFAULT NULL,
  `cep` varchar(9) DEFAULT NULL,
  `uf` varchar(2) DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `endereco` varchar(30) DEFAULT NULL,
  `numero` varchar(10) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(225) NOT NULL,
  `id_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cad_cliente`
--

INSERT INTO `cad_cliente` (`nome`, `sobrenome`, `cpf`, `dt_nascimento`, `genero`, `cep`, `uf`, `cidade`, `bairro`, `endereco`, `numero`, `telefone`, `email`, `senha`, `id_cliente`) VALUES
('Ciclano', 'silva', '123.456.789-12', '2000-04-05', 'masculino', '65907410', 'MA', 'Imperatriz', 'Nova Imperatriz', 'Rua Projetada D', '1755', '(99) 99999-9999', 'ciclano@gmail.com', '1234', 1),
('teste', 'teste', '172.897.319-87', '2312-09-08', 'masculino', '65907420', 'MA', 'Imperatriz', 'Nova Imperatriz', 'Rua Santo Antônio', '12', '(12) 31231-7289', 'aaaa.@gmail.com', '123', 2),
('anna', 'morais', '623.442.293-45', '2004-08-08', 'feminino', '65907420', 'MA', 'Imperatriz', 'Nova Imperatriz', 'Rua Santo Antônio', '514140007', '(99) 98040-5150', 'annaklara57@gmai.com', '123', 3);

-- --------------------------------------------------------

--
-- Table structure for table `cad_colaborador`
--

CREATE TABLE `cad_colaborador` (
  `nome` varchar(45) DEFAULT NULL,
  `sobrenome` varchar(45) DEFAULT NULL,
  `cpf` varchar(14) NOT NULL,
  `dt_nascimento` varchar(10) DEFAULT NULL,
  `genero` varchar(10) DEFAULT NULL,
  `profissao` varchar(255) DEFAULT NULL,
  `cep` varchar(9) DEFAULT NULL,
  `uf` varchar(2) DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `endereco` varchar(30) DEFAULT NULL,
  `numero` varchar(10) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(225) NOT NULL,
  `id_colaborador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cad_colaborador`
--

INSERT INTO `cad_colaborador` (`nome`, `sobrenome`, `cpf`, `dt_nascimento`, `genero`, `profissao`, `cep`, `uf`, `cidade`, `bairro`, `endereco`, `numero`, `telefone`, `email`, `senha`, `id_colaborador`) VALUES
('htrjsrtjstr', 'fgjfgsjtjrtsjtsrj', '856.845.538-84', '2023-10-18', 'masculino', 'thjtfjfgjfgjkrtktk', '65906752', 'MA', 'Imperatriz', 'Residencial Sebastião Régis', 'Rua A', '457', '(79) 76065-6543', 'dwdgd@gmail.com', '456', 1),
('felipe', 'sylva', '123.123.12', '2000-01-23', 'masculino', '', '65907410', 'MA', 'Imperatriz', 'Nova Imperatriz', 'Rua Projetada D', '1755', '(99) 99999-9999', 'pedreiro@gmail.com', '123', 22),
('gustavinho', 'aa', '123.971.927-98', '1223-03-12', 'masculino', '', '65907420', 'MA', 'Imperatriz', 'Nova Imperatriz', 'Rua Santo Antônio', '123', '(12) 87937-9817', 'gusta@gmail.com', '123', 23),
('kayo', 'kayo', '120.987.312-90', '0123-09-07', 'masculino', 'Pedreiro', '65907420', 'MA', 'Imperatriz', 'Nova Imperatriz', 'Rua Santo Antônio', '02', '(12) 31678-2637', 'kayo@gmail.com', '123', 24);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cad_cliente`
--
ALTER TABLE `cad_cliente`
  ADD PRIMARY KEY (`id_cliente`),
  ADD KEY `cpf` (`cpf`);

--
-- Indexes for table `cad_colaborador`
--
ALTER TABLE `cad_colaborador`
  ADD PRIMARY KEY (`id_colaborador`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cad_cliente`
--
ALTER TABLE `cad_cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cad_colaborador`
--
ALTER TABLE `cad_colaborador`
  MODIFY `id_colaborador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
