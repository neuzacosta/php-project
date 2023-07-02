-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29-Jun-2023 às 20:01
-- Versão do servidor: 10.4.28-MariaDB
-- versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projeto`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `apolice`
--

CREATE TABLE `apolice` (
  `numeroApolice` int(11) NOT NULL,
  `nifCliente` int(11) NOT NULL,
  `companhiaApolice` varchar(20) NOT NULL,
  `ramoApolice` varchar(20) NOT NULL,
  `dataInicioApolice` date NOT NULL,
  `dataFimApolice` date NOT NULL,
  `estadoApolice` varchar(25) NOT NULL COMMENT 'em vigor/ anulada / anulada por substituição'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `nifCliente` int(11) NOT NULL,
  `nomeCliente` varchar(50) NOT NULL,
  `moradaCliente` varchar(100) NOT NULL,
  `contatoCliente` varchar(20) NOT NULL,
  `estadoCliente` varchar(10) NOT NULL COMMENT 'ativo / inativo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `recibo`
--

CREATE TABLE `recibo` (
  `numeroRecibo` int(11) NOT NULL,
  `numeroApolice` int(11) NOT NULL,
  `nifCliente` int(11) NOT NULL,
  `premioRecibo` decimal(10,2) NOT NULL,
  `comissaoRecibo` decimal(10,2) NOT NULL,
  `dataInicioRecibo` date NOT NULL,
  `dataFimRecibo` date NOT NULL,
  `estadoRecibo` varchar(15) NOT NULL COMMENT 'cobrado / em pagamento'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `psw` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `username`, `psw`, `email`) VALUES
(2, 'admin', 'Admin1988', 'admin1988@gmail.com'),
(3, 'tester', 'Tester1234', 'tester@gmail.com'),
(4, 'neuza', 'NEUZAcosta1988', 'n.costa@gmail.com');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `apolice`
--
ALTER TABLE `apolice`
  ADD PRIMARY KEY (`numeroApolice`),
  ADD KEY `nifCliente` (`nifCliente`);

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`nifCliente`);

--
-- Índices para tabela `recibo`
--
ALTER TABLE `recibo`
  ADD PRIMARY KEY (`numeroRecibo`),
  ADD KEY `numeroApolice` (`numeroApolice`),
  ADD KEY `nifClienteRecibo` (`nifCliente`);

--
-- Índices para tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `apolice`
--
ALTER TABLE `apolice`
  ADD CONSTRAINT `nifCliente` FOREIGN KEY (`nifCliente`) REFERENCES `cliente` (`nifCliente`);

--
-- Limitadores para a tabela `recibo`
--
ALTER TABLE `recibo`
  ADD CONSTRAINT `nifClienteRecibo` FOREIGN KEY (`nifCliente`) REFERENCES `cliente` (`nifCliente`),
  ADD CONSTRAINT `numeroApolice` FOREIGN KEY (`numeroApolice`) REFERENCES `apolice` (`numeroApolice`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
