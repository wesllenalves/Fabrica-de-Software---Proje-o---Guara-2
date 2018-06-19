-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 19-Jun-2018 às 08:02
-- Versão do servidor: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `idClientes` int(11) NOT NULL,
  `nomeCliente` varchar(255) NOT NULL,
  `documento` varchar(20) NOT NULL,
  `tipoPessoa` varchar(255) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `dataCadastro` date DEFAULT NULL,
  `rua` varchar(70) DEFAULT NULL,
  `numero` varchar(15) DEFAULT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `cidade` varchar(45) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `cep` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
-- Estrutura da tabela `lancamentos`
--

CREATE TABLE `lancamentos` (
  `idLancamentos` int(11) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `valor` varchar(15) NOT NULL,
  `data_vencimento` date NOT NULL,
  `data_pagamento` date DEFAULT NULL,
  `baixado` tinyint(1) DEFAULT NULL,
  `cliente_fornecedor` varchar(255) DEFAULT NULL,
  `forma_pgto` varchar(100) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `anexo` varchar(250) DEFAULT NULL,
  `clientes_id` int(11) DEFAULT NULL,
  `dataModificado` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `lancamentos`
--

INSERT INTO `lancamentos` (`idLancamentos`, `descricao`, `valor`, `data_vencimento`, `data_pagamento`, `baixado`, `cliente_fornecedor`, `forma_pgto`, `tipo`, `anexo`, `clientes_id`, `dataModificado`) VALUES
(1, 'bolo', '2.00', '0000-00-00', '0000-00-00', NULL, NULL, 'Dinheiro', 'receita', NULL, NULL, '0000-00-00 00:00:00'),
(2, 'bolo', '1.11', '0000-00-00', '0000-00-00', NULL, NULL, 'Dinheiro', 'despesa', NULL, NULL, '0000-00-00 00:00:00'),
(4, 'Mantega teste', '20.00', '0000-00-00', '0000-00-00', NULL, NULL, 'Dinheiro', 'receita', NULL, NULL, '0000-00-00 00:00:00'),
(5, 'bolo', '2.00', '0000-00-00', '0000-00-00', NULL, 'wes', 'Dinheiro', 'receita', NULL, NULL, '0000-00-00 00:00:00'),
(6, 'bolo', '200.00', '2018-06-19', '0000-00-00', NULL, 'wes', 'Dinheiro', 'receita', NULL, NULL, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `orcamento`
--

CREATE TABLE `orcamento` (
  `idOrcamento` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `descricao` text NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `produto` varchar(255) NOT NULL,
  `qtd` int(11) NOT NULL,
  `data` date NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `orcamento`
--

INSERT INTO `orcamento` (`idOrcamento`, `nome`, `telefone`, `descricao`, `cidade`, `produto`, `qtd`, `data`, `status`) VALUES
(1, 'pessoa fisica', '61981745695', 'uma festa muito boa                                         \r\n                                    ', 'brasilia', 'bolo , bolo , bolo', 2, '2018-06-16', 'Aguardando Atendimento');

-- --------------------------------------------------------

--
-- Estrutura da tabela `os`
--

CREATE TABLE `os` (
  `idOs` int(11) NOT NULL,
  `nome` varchar(11) NOT NULL,
  `usuarios_id` varchar(255) DEFAULT NULL,
  `status` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `dataInicial` date DEFAULT NULL,
  `dataFinal` date DEFAULT '0000-00-00',
  `telefone` varchar(255) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `produtos` varchar(255) NOT NULL,
  `descricaoServico` varchar(150) DEFAULT NULL,
  `valorTotal` varchar(15) DEFAULT NULL,
  `lancamento` int(11) DEFAULT NULL,
  `faturado` tinyint(1) NOT NULL,
  `dataCadastro` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `os`
--

INSERT INTO `os` (`idOs`, `nome`, `usuarios_id`, `status`, `dataInicial`, `dataFinal`, `telefone`, `quantidade`, `cidade`, `produtos`, `descricaoServico`, `valorTotal`, `lancamento`, `faturado`, `dataCadastro`) VALUES
(4, 'wesllen alv', '', 'Aberto', '2018-06-17', '2018-06-30', '61981745695', 12, 'brasilia', 'bolo,casquinha', 'festa para um casamento ', NULL, NULL, 0, '0000-00-00 00:00:00'),
(5, 'pessoa fisi', '', 'Em Andamento', '2018-06-17', '2018-06-25', '61981745695', 1, 'brasilia', 'bolo', 'servico', NULL, NULL, 0, '0000-00-00 00:00:00'),
(3, 'wesllen alv', '', 'Em Andamento', '2018-06-16', '2018-09-14', '61981745695', 12, 'brasilia', 'caro, bolo', 'festa', NULL, NULL, 0, '0000-00-00 00:00:00'),
(6, 'pessoa fisi', '', 'Aberto', '2018-06-17', '2018-06-17', '61981745695', 1, 'brasilia', 'bolo', 'ws', NULL, NULL, 0, '0000-00-00 00:00:00'),
(7, 'pessoa fisi', '', 'Aberto', '2018-06-17', '2018-06-17', '61981745695', 1, 'brasilia', 'bolo', 'ws', NULL, NULL, 0, '0000-00-00 00:00:00'),
(8, 'pessoa fisi', '', 'OrÃ§amento', '2018-06-15', '2018-06-17', '61981745695', 1, 'brasilia', 'festa', 'festa', NULL, NULL, 0, '0000-00-00 00:00:00'),
(9, 'pessoa fisi', '', 'OrÃ§amento', '2018-06-15', '2018-06-17', '61981745695', 1, 'brasilia', 'festa', 'festa', NULL, NULL, 0, '0000-00-00 00:00:00'),
(10, 'pessoa fisi', '', 'OrÃ§amento', '2018-06-15', '2018-06-17', '61981745695', 1, 'brasilia', 'festa', 'festa', NULL, NULL, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `idProduto` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `unidade` varchar(255) NOT NULL,
  `precoCompra` decimal(10,2) NOT NULL,
  `precoVenda` decimal(10,2) NOT NULL,
  `estoque` int(11) NOT NULL,
  `estoqueMinimo` int(11) DEFAULT NULL,
  `validade` date DEFAULT NULL,
  `dataModificado` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`idProduto`, `nome`, `unidade`, `precoCompra`, `precoVenda`, `estoque`, `estoqueMinimo`, `validade`, `dataModificado`) VALUES
(2, 'bolo', 'KG', '200.00', '300.00', 20, 10, '2018-06-13', '0000-00-00 00:00:00'),
(3, 'bolo', 'KG', '0.02', '0.03', 20, 1, '2018-06-13', '0000-00-00 00:00:00'),
(4, 'bolo', 'KG', '0.00', '0.00', 1, 1, '2018-06-13', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos`
--

CREATE TABLE `servicos` (
  `idServicos` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `descricao` varchar(45) DEFAULT NULL,
  `preco` decimal(10,2) NOT NULL,
  `dataModificado` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `servicos`
--

INSERT INTO `servicos` (`idServicos`, `nome`, `descricao`, `preco`, `dataModificado`) VALUES
(8, 'pessoa fisica', 'bolo', '0.00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE `vendas` (
  `idVendas` int(11) NOT NULL,
  `dataVenda` date DEFAULT NULL,
  `valorTotal` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `desconto` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `faturado` tinyint(1) DEFAULT NULL,
  `clientes_id` int(11) NOT NULL,
  `usuarios_id` int(11) DEFAULT NULL,
  `lancamentos_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idClientes`);

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
-- Indexes for table `lancamentos`
--
ALTER TABLE `lancamentos`
  ADD PRIMARY KEY (`idLancamentos`),
  ADD KEY `fk_lancamentos_clientes1` (`clientes_id`);

--
-- Indexes for table `orcamento`
--
ALTER TABLE `orcamento`
  ADD PRIMARY KEY (`idOrcamento`);

--
-- Indexes for table `os`
--
ALTER TABLE `os`
  ADD PRIMARY KEY (`idOs`),
  ADD KEY `fk_os_clientes1` (`nome`),
  ADD KEY `fk_os_usuarios1` (`usuarios_id`),
  ADD KEY `fk_os_lancamentos1` (`lancamento`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`idProduto`);

--
-- Indexes for table `servicos`
--
ALTER TABLE `servicos`
  ADD PRIMARY KEY (`idServicos`);

--
-- Indexes for table `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`idVendas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idClientes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `idFuncionario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lancamentos`
--
ALTER TABLE `lancamentos`
  MODIFY `idLancamentos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orcamento`
--
ALTER TABLE `orcamento`
  MODIFY `idOrcamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `os`
--
ALTER TABLE `os`
  MODIFY `idOs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `idProduto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `servicos`
--
ALTER TABLE `servicos`
  MODIFY `idServicos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `vendas`
--
ALTER TABLE `vendas`
  MODIFY `idVendas` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
