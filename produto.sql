-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 22-Maio-2018 às 17:52
-- Versão do servidor: 10.1.19-MariaDB
-- PHP Version: 5.5.38

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
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `idProduto` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `valorUnitario` decimal(10,2) NOT NULL,
  `valorGasto` decimal(10,2) NOT NULL,
  `qtd` int(11) NOT NULL,
  `qtdMin` int(11) NOT NULL,
  `validade` date NOT NULL,
  `categoria` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`idProduto`, `nome`, `valorUnitario`, `valorGasto`, `qtd`, `qtdMin`, `validade`, `categoria`) VALUES
(1, 'nescal', '10.00', '5.00', 10, 5, '2018-12-26', 'categoria1'),
(2, 'mel', '10.00', '5.00', 500, 200, '2019-06-18', 'categoria2'),
(3, 'mel', '10.00', '5.00', 500, 200, '2019-06-18', 'categoria2'),
(4, 'mel', '10.00', '5.00', 500, 200, '2019-06-18', 'categoria2'),
(5, 'mel', '10.00', '5.00', 500, 200, '2019-06-18', 'categoria2'),
(6, 'wesllen.sousa', '20.00', '5.00', 2, 1, '2018-05-23', 'categoria2'),
(7, 'wesllen.sousa', '20.00', '5.00', 2, 1, '2018-05-23', 'categoria2'),
(8, 'wesllen.sousa', '20.00', '5.00', 10, 100, '2018-05-22', 'categoria1'),
(9, 'wesllen.sousa', '20.00', '5.00', 10, 100, '2018-05-22', 'categoria1'),
(10, 'wesllen.sousa', '20.00', '5.00', 10, 100, '2018-05-22', 'categoria1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`idProduto`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `idProduto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
