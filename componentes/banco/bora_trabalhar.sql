-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 06/10/2023 às 19:44
-- Versão do servidor: 5.7.24
-- Versão do PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bora_trabalhar`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cad_cliente`
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
  `confirmacao_senha` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `cad_cliente`
--

INSERT INTO `cad_cliente` (`nome`, `sobrenome`, `cpf`, `dt_nascimento`, `genero`, `cep`, `uf`, `cidade`, `bairro`, `endereco`, `numero`, `telefone`, `email`, `senha`, `confirmacao_senha`) VALUES
('felipe', 'guimaraes', '467.267.472-78', '3273-06-27', 'masculino', '65907420', 'MA', 'Imperatriz', 'Nova Imperatriz', 'Rua Santo Antônio', '42', '(67) 67472-8687', 'felipe.guimaraes5050@gmail.com', '123', '123'),
('fdjdrjdryj', 'rtshjsrtjsrtjstrj', '756.856.856-86', '2023-10-11', 'masculino', '65906752', 'MA', 'Imperatriz', 'Residencial Sebastião Régis', 'Rua A', '32', '(56) 74585-6568', 'nhffvhdffbahdfb@gmail.com', '9876', '9876');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cad_colaborador`
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
  `confirmacao_senha` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `cad_colaborador`
--

INSERT INTO `cad_colaborador` (`nome`, `sobrenome`, `cpf`, `dt_nascimento`, `genero`, `profissao`, `cep`, `uf`, `cidade`, `bairro`, `endereco`, `numero`, `telefone`, `email`, `senha`, `confirmacao_senha`) VALUES
('gustavinho', 'jiodw', '878.378.728-78', '1232-03-12', 'masculino', 'oedreuri', '65907420', 'MA', 'Imperatriz', 'Nova Imperatriz', 'Rua Santo Antônio', '53', '(82) 98490-2809', 'gustavo.souza789@gmail.com', '123', '123');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cad_cliente`
--
ALTER TABLE `cad_cliente`
  ADD PRIMARY KEY (`cpf`);

--
-- Índices de tabela `cad_colaborador`
--
ALTER TABLE `cad_colaborador`
  ADD PRIMARY KEY (`cpf`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
