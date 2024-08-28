-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28/08/2024 às 17:50
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `dbgerenciamento`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tblcliente`
--

CREATE TABLE `tblcliente` (
  `idCliente` int(11) NOT NULL,
  `nomeCliente` varchar(50) NOT NULL,
  `cpfCliente` varchar(11) NOT NULL,
  `emailCliente` varchar(100) NOT NULL,
  `statusCliente` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tblcliente`
--

INSERT INTO `tblcliente` (`idCliente`, `nomeCliente`, `cpfCliente`, `emailCliente`, `statusCliente`) VALUES
(1, 'Juliana Santos', '12345678965', 'juliana@email.com', 'ATIVO');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tblfuncionario`
--

CREATE TABLE `tblfuncionario` (
  `idFuncionario` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `funcao` varchar(10) NOT NULL,
  `statusFuncionario` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tblfuncionario`
--

INSERT INTO `tblfuncionario` (`idFuncionario`, `nome`, `funcao`, `statusFuncionario`) VALUES
(1, 'Maria Silva Oliveira', 'Vendedora', 'ATIVO');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tblpagamento`
--

CREATE TABLE `tblpagamento` (
  `idPagamento` int(11) NOT NULL,
  `idVenda` int(11) NOT NULL,
  `FormaPagamento` varchar(12) DEFAULT NULL,
  `subtotal` double(10,2) NOT NULL,
  `quantidadeParcela` varchar(100) NOT NULL,
  `dataVencimento` date NOT NULL,
  `valorParcela` double(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tblpagamento`
--

INSERT INTO `tblpagamento` (`idPagamento`, `idVenda`, `FormaPagamento`, `subtotal`, `quantidadeParcela`, `dataVencimento`, `valorParcela`) VALUES
(1, 1, 'Parcelamento', 650.50, '5', '2024-10-23', 130.00);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tblproduto`
--

CREATE TABLE `tblproduto` (
  `idProduto` int(11) NOT NULL,
  `produto` varchar(50) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `valorUnitario` double(10,2) DEFAULT NULL,
  `statusProduto` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tblproduto`
--

INSERT INTO `tblproduto` (`idProduto`, `produto`, `categoria`, `valorUnitario`, `statusProduto`) VALUES
(1, 'Jaqueta Over', 'Inverno ', 150.00, 'ATIVO'),
(2, 'Camista Time São Paulo', 'Esporte', 50.25, 'DESATIVADO');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tblvenda`
--

CREATE TABLE `tblvenda` (
  `idVenda` int(11) NOT NULL,
  `quantidade` double(10,2) NOT NULL,
  `valor` double(10,2) NOT NULL,
  `subtotal` double(10,2) NOT NULL,
  `statusVenda` varchar(10) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `idFuncionario` int(11) NOT NULL,
  `idProduto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tblvenda`
--

INSERT INTO `tblvenda` (`idVenda`, `quantidade`, `valor`, `subtotal`, `statusVenda`, `idCliente`, `idFuncionario`, `idProduto`) VALUES
(1, 3.00, 35.50, 106.50, 'ATIVO', 1, 1, 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tblcliente`
--
ALTER TABLE `tblcliente`
  ADD PRIMARY KEY (`idCliente`);

--
-- Índices de tabela `tblfuncionario`
--
ALTER TABLE `tblfuncionario`
  ADD PRIMARY KEY (`idFuncionario`);

--
-- Índices de tabela `tblpagamento`
--
ALTER TABLE `tblpagamento`
  ADD PRIMARY KEY (`idPagamento`),
  ADD KEY `idVenda` (`idVenda`);

--
-- Índices de tabela `tblproduto`
--
ALTER TABLE `tblproduto`
  ADD PRIMARY KEY (`idProduto`);

--
-- Índices de tabela `tblvenda`
--
ALTER TABLE `tblvenda`
  ADD PRIMARY KEY (`idVenda`),
  ADD KEY `idCliente` (`idCliente`),
  ADD KEY `idFuncionario` (`idFuncionario`),
  ADD KEY `idProduto` (`idProduto`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tblcliente`
--
ALTER TABLE `tblcliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tblfuncionario`
--
ALTER TABLE `tblfuncionario`
  MODIFY `idFuncionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tblpagamento`
--
ALTER TABLE `tblpagamento`
  MODIFY `idPagamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tblproduto`
--
ALTER TABLE `tblproduto`
  MODIFY `idProduto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tblvenda`
--
ALTER TABLE `tblvenda`
  MODIFY `idVenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `tblpagamento`
--
ALTER TABLE `tblpagamento`
  ADD CONSTRAINT `tblpagamento_ibfk_1` FOREIGN KEY (`idVenda`) REFERENCES `tblvenda` (`idVenda`);

--
-- Restrições para tabelas `tblvenda`
--
ALTER TABLE `tblvenda`
  ADD CONSTRAINT `tblvenda_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `tblcliente` (`idCliente`),
  ADD CONSTRAINT `tblvenda_ibfk_2` FOREIGN KEY (`idFuncionario`) REFERENCES `tblfuncionario` (`idFuncionario`),
  ADD CONSTRAINT `tblvenda_ibfk_3` FOREIGN KEY (`idProduto`) REFERENCES `tblproduto` (`idProduto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
