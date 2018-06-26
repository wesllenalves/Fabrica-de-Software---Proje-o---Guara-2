-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 26-Jun-2018 às 11:32
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
  `rua` varchar(70) DEFAULT NULL,
  `numero` varchar(15) DEFAULT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `cidade` varchar(45) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `cep` varchar(20) DEFAULT NULL,
  `dataCadastro` datetime DEFAULT NULL,
  `dataModificado` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`idClientes`, `nomeCliente`, `documento`, `tipoPessoa`, `telefone`, `celular`, `email`, `rua`, `numero`, `bairro`, `cidade`, `estado`, `cep`, `dataCadastro`, `dataModificado`) VALUES
(3, 'wesllen alves de sousa', '032.309.441-43', 'PF', '(61) 9817-4569', '(61) 9 8174-5695', 'wesllenalves@gmail.com', 'sres, apartamento, apartamento, apartamento, apartamento, apartamento,', '1614', 'aguas claras', 'brasilia', 'DF', '70645-160', '0000-00-00 00:00:00', '2018-06-26 01:06:59'),
(4, 'cliente teste silva', '03230944143', 'PJ', '6130459780', '61981745695', 'cliente@cliente.com', '20 norte', '1614', 'aguas claras', 'Brasilia', 'DF', '70645160', '2018-06-26 00:00:00', '0000-00-00 00:00:00'),
(5, 'wesllen teste de cadastro', '032.309.441-43', 'PF', '(61) 9817-4569', '(98) 1 7456-95', '', NULL, NULL, NULL, 'brasilia', 'AC', '71915-750', '2018-06-26 03:21:42', '0000-00-00 00:00:00'),
(6, 'wesllen teste ', '032.309.441-43', 'PF', '(61) 9817-4569', '(98) 1 7456-95', '', NULL, NULL, NULL, 'brasilia', 'AC', '71915-750', '2018-06-26 03:22:26', '0000-00-00 00:00:00'),
(7, 'wesllen teste de cadastro', '032.309.441-43', 'PF', '(61) 9817-4569', '(98) 1 7456-95', '', NULL, NULL, NULL, 'brasilia', 'AC', '71915-750', '2018-06-26 03:23:11', '0000-00-00 00:00:00'),
(8, 'wesllen teste de cadastro', '032.309.441-43', 'PF', '(61) 9817-4569', '(98) 1 7456-95', '', NULL, NULL, NULL, 'brasilia', 'AC', '71915-750', '2018-06-26 03:24:09', '0000-00-00 00:00:00');

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

--
-- Extraindo dados da tabela `endereco`
--

INSERT INTO `endereco` (`idEndereco`, `cidade`, `cep`, `endereco`, `uf`, `complemento`) VALUES
(1, 'Brasilia', '70645160', 'SRES Quaadra 10 bloco p ', 'DF', 'Apartamento green park');

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
  `status_pedido` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `dataInicial` date DEFAULT NULL,
  `dataFinal` date DEFAULT '0000-00-00',
  `quantidade` int(11) NOT NULL,
  `produtos` varchar(255) NOT NULL,
  `descricaoServico` text,
  `valorTotal` varchar(15) DEFAULT NULL,
  `lancamento` int(11) DEFAULT NULL,
  `faturado` tinyint(1) NOT NULL,
  `dataCadastro` datetime NOT NULL,
  `dataUpdate` datetime NOT NULL,
  `usuarios_id` int(11) DEFAULT NULL,
  `clientes_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `os`
--

INSERT INTO `os` (`idOs`, `status_pedido`, `dataInicial`, `dataFinal`, `quantidade`, `produtos`, `descricaoServico`, `valorTotal`, `lancamento`, `faturado`, `dataCadastro`, `dataUpdate`, `usuarios_id`, `clientes_id`) VALUES
(5, 'Em Andamento', '2018-06-17', '2018-06-25', 1, 'bolo', 'servico', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(6, 'Aberto', '2018-06-17', '2018-06-17', 1, 'bolo', 'ws', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(7, 'Aberto', '2018-06-17', '2018-06-17', 1, 'bolo', 'ws', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(8, 'OrÃ§amento', '2018-06-15', '2018-06-17', 1, 'festa', 'festa', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(9, 'OrÃ§amento', '2018-06-15', '2018-06-17', 1, 'festa', 'festa', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(10, 'OrÃ§amento', '2018-06-15', '2018-06-17', 1, 'festa', 'festa', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(11, 'Aberto', '2018-06-18', '0000-00-00', 10, 'bolo,nescal', 'festa                                        \r\n                                ', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 0),
(12, 'Aberto', '2018-06-18', '0000-00-00', 10, 'bolo,nescal', 'festa                                        \r\n                                ', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 0),
(13, 'Aberto', '2018-06-22', '0000-00-00', 10, 'bolo,nescal', 'teste                                        \r\n                                ', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 0),
(14, 'Aberto', '2018-06-25', '0000-00-00', 10, 'bolo,nescal,pao', 'teste de formulario para orÃ§amento                                        \r\n                                ', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 0),
(15, 'Aberto', '2018-06-30', '0000-00-00', 10, 'bolo,nescal,pao', '                ooooooooooooooooooooooooooo                       \r\n                                ', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 0),
(16, 'Aberto', '2018-06-30', '0000-00-00', 10, 'bolo,nescal,pao', '                ooooooooooooooooooooooooooo                       \r\n                                ', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 0),
(17, 'Aberto', '2018-06-30', '0000-00-00', 10, 'bolo,nescal,pao', 'ooooooooooooooooooo                                        \r\n                                ', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 0),
(18, 'Aberto', '2018-06-06', '0000-00-00', 10, 'bolo,nescal', '                                        \r\n                        testo        ', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 0),
(19, 'Aberto', '2018-06-29', '0000-00-00', 10, 'bolo', 'wesss                                        \n                                ', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 0),
(20, 'Aberto', '2018-06-16', '0000-00-00', 1, 'nescal', 'fabrica                                        \r\n                                ', NULL, NULL, 0, '2018-06-25 11:53:59', '0000-00-00 00:00:00', NULL, 0),
(21, 'Aberto', '2018-06-29', '0000-00-00', 10, 'bolo,nescal,pao', '                                        \r\ntestetetste                                ', NULL, NULL, 0, '2018-06-25 11:56:40', '0000-00-00 00:00:00', NULL, 0),
(23, 'Finalizado', '2018-06-02', '2018-06-05', 2, 'bolo,nescal,pao', '                                        \r\n teste mais teste                               <br>Produtos pedido<br>', NULL, NULL, 0, '2018-06-26 03:22:26', '2018-06-26 05:06:46', 1, 6),
(24, 'Aberto', '2018-06-02', '0000-00-00', 2, 'bolo,nescal,pao', '                                        \r\n teste mais teste                               <br>Produtos pedido<br>', NULL, NULL, 0, '2018-06-26 03:23:11', '0000-00-00 00:00:00', NULL, 7),
(25, 'Aberto', '2018-06-02', '0000-00-00', 2, 'bolo,nescal,pao', '                                        \r\n teste mais teste                               <br>Produtos pedido<br>', NULL, NULL, 0, '2018-06-26 03:24:09', '0000-00-00 00:00:00', NULL, 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `idProduto` int(11) NOT NULL,
  `nome_produto` varchar(100) NOT NULL,
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

INSERT INTO `produto` (`idProduto`, `nome_produto`, `unidade`, `precoCompra`, `precoVenda`, `estoque`, `estoqueMinimo`, `validade`, `dataModificado`) VALUES
(2, 'bolo', 'KG', '20.00', '30.00', 20, 15, '2018-06-13', '0000-00-00 00:00:00'),
(3, 'nescal', 'KG', '0.02', '10.00', 20, 1, '2018-06-13', '0000-00-00 00:00:00'),
(4, 'pao', 'KG', '0.00', '0.00', 1, 1, '2018-06-13', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos_os`
--

CREATE TABLE `produtos_os` (
  `idProdutos_os` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `os_id` int(11) NOT NULL,
  `produtos_id` int(11) NOT NULL,
  `subTotal` varchar(15) DEFAULT NULL,
  `DataCadastro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produtos_os`
--

INSERT INTO `produtos_os` (`idProdutos_os`, `quantidade`, `os_id`, `produtos_id`, `subTotal`, `DataCadastro`) VALUES
(1, 2, 10, 3, '20', '0000-00-00 00:00:00'),
(2, 1, 10, 3, '10', '0000-00-00 00:00:00'),
(4, 20, 10, 3, '200', '0000-00-00 00:00:00'),
(5, 10, 10, 3, '100', '0000-00-00 00:00:00'),
(6, 20, 10, 3, '200', '0000-00-00 00:00:00'),
(7, 20, 10, 3, '200', '0000-00-00 00:00:00'),
(8, 10, 5, 3, '100', '0000-00-00 00:00:00'),
(9, 2, 5, 3, '20', '0000-00-00 00:00:00'),
(15, 2, 23, 3, '20', '0000-00-00 00:00:00'),
(16, 2, 23, 3, '20', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos`
--

CREATE TABLE `servicos` (
  `idServicos` int(11) NOT NULL,
  `id_os` int(11) NOT NULL,
  `nome_servico` varchar(45) NOT NULL,
  `descricao` varchar(45) DEFAULT NULL,
  `preco` decimal(10,2) NOT NULL,
  `dataModificado` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `servicos`
--

INSERT INTO `servicos` (`idServicos`, `id_os`, `nome_servico`, `descricao`, `preco`, `dataModificado`) VALUES
(8, 0, 'Conjunto de mesa unidade', 'Conjuntos de mesas decoradas com o tema da fe', '51.00', '0000-00-00 00:00:00'),
(10, 0, 'decoraÃ§Ã£o', 'decora toda sua casa', '200.00', '2018-06-19 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos_os`
--

CREATE TABLE `servicos_os` (
  `idServicos_os` int(11) NOT NULL,
  `os_id` int(11) NOT NULL,
  `servicos_id` int(11) NOT NULL,
  `subTotal` varchar(15) DEFAULT NULL,
  `dataCadastro` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `servicos_os`
--

INSERT INTO `servicos_os` (`idServicos_os`, `os_id`, `servicos_id`, `subTotal`, `dataCadastro`) VALUES
(7, 5, 10, '200.00', '0000-00-00 00:00:00'),
(5, 21, 10, '200.00', '0000-00-00 00:00:00'),
(8, 5, 8, '51.00', '0000-00-00 00:00:00'),
(10, 22, 10, '200.00', '0000-00-00 00:00:00'),
(16, 23, 8, '51.00', '0000-00-00 00:00:00'),
(13, 24, 10, '200.00', '0000-00-00 00:00:00'),
(17, 23, 10, '200.00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuarios` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `nome_usuario` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `nivel` int(11) NOT NULL DEFAULT '1',
  `id_endereco` int(11) NOT NULL,
  `data_update` datetime DEFAULT NULL,
  `data_cadastro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`idUsuarios`, `user`, `nome_usuario`, `password`, `status`, `nivel`, `id_endereco`, `data_update`, `data_cadastro`) VALUES
(1, 'wesllenalves', 'wesllen alves de sousa', 'e10adc3949ba59abbe56e057f20f883e', 0, 0, 1, '0000-00-00 00:00:00', '2018-06-23 00:00:00'),
(2, 'admin', 'admin silva santos', '21232f297a57a5a743894a0e4a801fc3', 0, 2, 1, NULL, '2018-06-25 00:00:00');

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
  ADD KEY `fk_os_clientes1` (`clientes_id`),
  ADD KEY `fk_os_usuarios1` (`usuarios_id`),
  ADD KEY `fk_os_lancamentos1` (`lancamento`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`idProduto`);

--
-- Indexes for table `produtos_os`
--
ALTER TABLE `produtos_os`
  ADD PRIMARY KEY (`idProdutos_os`),
  ADD KEY `fk_produtos_os_os1` (`os_id`),
  ADD KEY `fk_produtos_os_produtos1` (`produtos_id`);

--
-- Indexes for table `servicos`
--
ALTER TABLE `servicos`
  ADD PRIMARY KEY (`idServicos`);

--
-- Indexes for table `servicos_os`
--
ALTER TABLE `servicos_os`
  ADD PRIMARY KEY (`idServicos_os`),
  ADD KEY `fk_servicos_os_os1` (`os_id`),
  ADD KEY `fk_servicos_os_servicos1` (`servicos_id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuarios`),
  ADD KEY `fkEndereco_Usuario` (`id_endereco`);

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
  MODIFY `idClientes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `endereco`
--
ALTER TABLE `endereco`
  MODIFY `idEndereco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `idOs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `idProduto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `produtos_os`
--
ALTER TABLE `produtos_os`
  MODIFY `idProdutos_os` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `servicos`
--
ALTER TABLE `servicos`
  MODIFY `idServicos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `servicos_os`
--
ALTER TABLE `servicos_os`
  MODIFY `idServicos_os` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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

--
-- Limitadores para a tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fkEndereco_Usuario` FOREIGN KEY (`id_endereco`) REFERENCES `endereco` (`idEndereco`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
