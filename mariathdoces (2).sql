-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 23-Maio-2018 às 21:02
-- Versão do servidor: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mariathdoces`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `tipoCliente` char(2) NOT NULL,
  `email` varchar(50) NOT NULL,
  `login` varchar(100) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `cidade` varchar(70) DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `uf` char(2) DEFAULT NULL,
  `complemento` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

CREATE TABLE `endereco` (
  `idEndereco` int(11) NOT NULL,
  `cidade` varchar(70) NOT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `endereco` varchar(100) NOT NULL,
  `uf` char(2) NOT NULL,
  `complemento` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `evento`
--

CREATE TABLE `evento` (
  `codigoVenda` int(11) NOT NULL,
  `qtd` int(11) NOT NULL,
  `transporte` decimal(10,2) DEFAULT NULL,
  `desconto` int(11) DEFAULT NULL,
  `valorTotal` decimal(10,2) NOT NULL,
  `formaPagamento` varchar(20) NOT NULL,
  `data` date NOT NULL,
  `status` varchar(45) NOT NULL,
  `localEvento` varchar(45) DEFAULT NULL,
  `fkEndereco` int(11) NOT NULL,
  `fkProduto` int(11) NOT NULL,
  `fkCliente` int(11) NOT NULL,
  `cidade` varchar(70) NOT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `endereco` varchar(100) NOT NULL,
  `uf` char(2) NOT NULL,
  `complemento` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `eventofuncionario`
--

CREATE TABLE `eventofuncionario` (
  `idEventoFuncionario` int(11) NOT NULL,
  `qtdFuncionario` int(11) DEFAULT NULL,
  `valorFuncionario` decimal(10,2) DEFAULT NULL,
  `valorTotal` decimal(10,2) DEFAULT NULL,
  `fkFuncionario` int(11) DEFAULT NULL,
  `fkEvento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fluxoanual`
--

CREATE TABLE `fluxoanual` (
  `idFluxoAnual` int(11) NOT NULL,
  `ano` year(4) NOT NULL,
  `valorGasto` decimal(10,2) NOT NULL,
  `valorColetado` decimal(10,2) NOT NULL,
  `lucro` decimal(10,2) NOT NULL,
  `fkFluxoMensal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fluxomensal`
--

CREATE TABLE `fluxomensal` (
  `idFluxoMensal` int(11) NOT NULL,
  `data` date NOT NULL,
  `valorGasto` decimal(10,2) NOT NULL,
  `valorColetado` decimal(10,2) NOT NULL,
  `lucro` decimal(10,2) NOT NULL,
  `fkEvento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `idFuncionario` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `perfil` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `cidade` varchar(70) DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `uf` char(2) DEFAULT NULL,
  `complemento` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `idProduto` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `valorUnitario` decimal(10,2) NOT NULL,
  `valorGasto` decimal(10,2) NOT NULL,
  `qtd` int(11) NOT NULL,
  `qtdMin` int(11) DEFAULT NULL,
  `validade` date DEFAULT NULL,
  `categoria` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indexes for table `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`idEndereco`);

--
-- Indexes for table `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`codigoVenda`),
  ADD KEY `fkProduto` (`fkProduto`),
  ADD KEY `fkCliente` (`fkCliente`);

--
-- Indexes for table `eventofuncionario`
--
ALTER TABLE `eventofuncionario`
  ADD PRIMARY KEY (`idEventoFuncionario`),
  ADD KEY `fkFuncionario` (`fkFuncionario`),
  ADD KEY `fkEvento` (`fkEvento`);

--
-- Indexes for table `fluxoanual`
--
ALTER TABLE `fluxoanual`
  ADD PRIMARY KEY (`idFluxoAnual`),
  ADD KEY `fkFluxoMensal` (`fkFluxoMensal`);

--
-- Indexes for table `fluxomensal`
--
ALTER TABLE `fluxomensal`
  ADD PRIMARY KEY (`idFluxoMensal`),
  ADD KEY `fkEvento` (`fkEvento`);

--
-- Indexes for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`idFuncionario`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`idProduto`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `endereco`
--
ALTER TABLE `endereco`
  MODIFY `idEndereco` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `evento`
--
ALTER TABLE `evento`
  MODIFY `codigoVenda` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `eventofuncionario`
--
ALTER TABLE `eventofuncionario`
  MODIFY `idEventoFuncionario` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fluxoanual`
--
ALTER TABLE `fluxoanual`
  MODIFY `idFluxoAnual` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fluxomensal`
--
ALTER TABLE `fluxomensal`
  MODIFY `idFluxoMensal` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `idFuncionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `idProduto` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `evento_ibfk_1` FOREIGN KEY (`fkProduto`) REFERENCES `produto` (`idProduto`),
  ADD CONSTRAINT `evento_ibfk_2` FOREIGN KEY (`fkCliente`) REFERENCES `cliente` (`idCliente`);

--
-- Limitadores para a tabela `eventofuncionario`
--
ALTER TABLE `eventofuncionario`
  ADD CONSTRAINT `eventofuncionario_ibfk_1` FOREIGN KEY (`fkFuncionario`) REFERENCES `funcionario` (`idFuncionario`),
  ADD CONSTRAINT `eventofuncionario_ibfk_2` FOREIGN KEY (`fkEvento`) REFERENCES `evento` (`codigoVenda`);

--
-- Limitadores para a tabela `fluxoanual`
--
ALTER TABLE `fluxoanual`
  ADD CONSTRAINT `fluxoanual_ibfk_1` FOREIGN KEY (`fkFluxoMensal`) REFERENCES `fluxomensal` (`idFluxoMensal`);

--
-- Limitadores para a tabela `fluxomensal`
--
ALTER TABLE `fluxomensal`
  ADD CONSTRAINT `fluxomensal_ibfk_1` FOREIGN KEY (`fkEvento`) REFERENCES `evento` (`codigoVenda`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
