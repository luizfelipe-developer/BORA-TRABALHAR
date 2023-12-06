-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 06, 2023 at 05:59 PM
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
  `id_cliente` int(11) NOT NULL,
  `cad_foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `profissao` varchar(255) NOT NULL,
  `cep` varchar(9) DEFAULT NULL,
  `uf` varchar(2) DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `endereco` varchar(30) DEFAULT NULL,
  `numero` varchar(10) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(225) NOT NULL,
  `id_colaborador` int(11) NOT NULL,
  `cad_foto` varchar(255) DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `categorias_selecionadas`
--

CREATE TABLE `categorias_selecionadas` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `categoria` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `fotos`
--

CREATE TABLE `fotos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `caminho` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fotos`
--

INSERT INTO `fotos` (`id`, `nome`, `caminho`) VALUES
(1, 'saradao', 'med.png'),
(2, 'fasd', 'saradao-academia.png'),
(3, 'alfaiate', 'Dia do alfaiate post stories data comemorativa(1).png'),
(4, 'alo', 'RobloxScreenShot20230627_165824596.png'),
(5, 'top', 'RobloxScreenShot20230627_165824596.png'),
(6, '', 'academia.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tabela_solicitacao`
--

CREATE TABLE `tabela_solicitacao` (
  `id` int(11) NOT NULL,
  `colaborador_id` int(11) NOT NULL,
  `nome_cliente` varchar(255) NOT NULL,
  `descricao_servico` text NOT NULL,
  `data_solicitacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Indexes for table `categorias_selecionadas`
--
ALTER TABLE `categorias_selecionadas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `fotos`
--
ALTER TABLE `fotos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabela_solicitacao`
--
ALTER TABLE `tabela_solicitacao`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `colaborador_id` (`colaborador_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cad_cliente`
--
ALTER TABLE `cad_cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `cad_colaborador`
--
ALTER TABLE `cad_colaborador`
  MODIFY `id_colaborador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `categorias_selecionadas`
--
ALTER TABLE `categorias_selecionadas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `fotos`
--
ALTER TABLE `fotos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tabela_solicitacao`
--
ALTER TABLE `tabela_solicitacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categorias_selecionadas`
--
ALTER TABLE `categorias_selecionadas`
  ADD CONSTRAINT `categorias_selecionadas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `cad_colaborador` (`id_colaborador`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tabela_solicitacao`
--
ALTER TABLE `tabela_solicitacao`
  ADD CONSTRAINT `tabela_solicitacao_ibfk_1` FOREIGN KEY (`colaborador_id`) REFERENCES `cad_colaborador` (`id_colaborador`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
