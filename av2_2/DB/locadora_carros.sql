-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 28, 2020 at 09:30 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `locadora_carros`
--

-- --------------------------------------------------------

--
-- Table structure for table `carros`
--

CREATE TABLE `carros` (
  `placa` text NOT NULL,
  `marca` text NOT NULL,
  `modelo` text NOT NULL,
  `cor` text NOT NULL,
  `ano` int(11) NOT NULL,
  `valor_dia` double NOT NULL,
  `cidade` text NOT NULL,
  `disponivel` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `carros`
--

INSERT INTO `carros` (`placa`, `marca`, `modelo`, `cor`, `ano`, `valor_dia`, `cidade`, `disponivel`) VALUES
('BJY8361', 'Ford', 'Ka SEL 1.5 16V Flex 5p', 'Marrom', 2015, 68, '2', 1),
('CYM8668', 'Hyundai', 'Atos Prime GL 1.0 Mec', 'Branco', 2001, 50, '2', 0),
('DAI4656', 'JAC', 'T6 2.0 JET Flex 5p Mec.', 'Marrom', 2014, 158.3, '2', 1),
('DSA3374', 'Citroen', 'C3 XTR 1.6 Flex 16V 5p', 'Branco', 2006, 57, '2', 1),
('EOG6053', 'Ford', 'Focus Ghia/ XR 2.0 /Ghia 2.0 16V Flex 5p', 'Preto', 2001, 40, '2', 1),
('GQD5969', 'Ferrari', 'F430 F1', 'Vermelho', 2005, 1276.8, '4', 0),
('HIS9718', 'VW - VolksWagen', 'Polo GT 2.0 Mi Total Flex 8V 5p', 'Branco', 2009, 67, '4', 1),
('HLU8981', 'Toyota', 'Corolla XLi 1.6 16V 110cv Mec.', 'Preto', 2003, 72, '4', 1),
('JHB8470', 'Ford', 'EcoSport 4WD 2.0/ 2.0 Flex 16V 5p', 'Cinza', 2004, 76.7, '6', 1),
('JHD9586', 'BMW', '225i Active Tourer Sport 2.0 TB Aut.', 'Preto', 2015, 210.9, '6', 1),
('JPJ8097', 'Fiat', 'Toro Opening Edition 1.8 16V Flex Aut.', 'Vermelho', 2017, 169.8, '5', 1),
('JRH7226', 'Hyundai', 'i30 2.0 16V 145cv 5p Mec.', 'Prata', 2010, 97, '5', 1),
('JSW9066', 'Mitsubishi', 'ASX OUTDOOR 2.0 4x2 16V 160cv Aut.', 'Branco', 2016, 125, '5', 1),
('KSQ5837', 'Ford', 'Fiesta TITANIUM 1.6 16V Flex Aut.', 'Vermelho Escuro', 2013, 67.4, '1', 1),
('KTN9858', 'Audi', 'A3 Sedan 1.4 TB FSI Flex Tiptronic 4p', 'Branco', 2016, 680.8, '1', 0),
('KYT9605', 'Fiat', 'Palio ELX 1.3 mpi Flex 8V 4p', 'Branco', 2004, 43.9, '1', 1),
('LGL6600', 'Renault', 'SANDERO Dynamique Hi-Power 1.6 8V 5p', 'Prata', 2015, 52.5, '1', 1),
('LMH2673', 'Honda', 'Civic Sedan EXS 1.8/1.8 Flex 16V Aut. 4p', 'Preto', 2007, 159.9, '1', 1),
('MPR1903', 'VW - VolksWagen', 'Fox Comfortline 1.6 Flex 8V 5p', 'Preto', 2015, 70, '3', 1),
('MSB1446', 'VW - VolksWagen', 'Gol Plus 1.0 Mi Total Flex 4p', '2006', 2006, 80, '3', 1),
('MSK8039', 'Hyundai', 'GENESIS 3.8 V6 24V 290cv 4p Aut.', 'Bege', 2012, 70, '3', 1),
('MTM7063', 'Land Rover', 'Range R. SVAutobiography SUPERC. 5.0 V8', 'Prata', 2012, 189, '3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cidades`
--

CREATE TABLE `cidades` (
  `idCidade` int(11) NOT NULL,
  `cidade` text NOT NULL,
  `estado` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cidades`
--

INSERT INTO `cidades` (`idCidade`, `cidade`, `estado`) VALUES
(1, 'Rio de Janeiro', 'RJ'),
(2, 'São Paulo', 'SP'),
(3, 'Vitória', 'ES'),
(4, 'Belo Horizonte', 'MG'),
(5, 'Salvador', 'BA'),
(6, 'Brasília', 'DF');

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

CREATE TABLE `clientes` (
  `nome` varchar(50) NOT NULL,
  `sobrenome` varchar(200) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `ccnome` varchar(200) NOT NULL,
  `ccnum` varchar(16) NOT NULL,
  `ccval` varchar(7) NOT NULL,
  `cccod` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clientes`
--

INSERT INTO `clientes` (`nome`, `sobrenome`, `cpf`, `ccnome`, `ccnum`, `ccval`, `cccod`) VALUES
('Samara', 'Fernandes Costa', '14189709812', 'SAMARA F. COSTA', '1234123412341234', '21/23', '121'),
('Andressa', 'Pereira Silva', '16161174614', 'ANDRESSA P. SILVA', '5395222793925100', '07/2021', '675'),
('Miguel ', 'Anderson Martin Castro', '338.799.267-00', 'MIGUEL A. M. CASTRO', '5143550839293553', '10/2022', '657');

-- --------------------------------------------------------

--
-- Table structure for table `locacao`
--

CREATE TABLE `locacao` (
  `idLocacao` int(11) NOT NULL,
  `cpf` text NOT NULL,
  `placa` text NOT NULL,
  `idLoja` int(11) NOT NULL,
  `idCidade` int(11) NOT NULL,
  `data_ini` date NOT NULL,
  `periodo` int(11) NOT NULL,
  `parcelas` int(11) NOT NULL,
  `valor_total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `locacao`
--

INSERT INTO `locacao` (`idLocacao`, `cpf`, `placa`, `idLoja`, `idCidade`, `data_ini`, `periodo`, `parcelas`, `valor_total`) VALUES
(1, '16161174614', 'GQD5969', 10, 4, '2020-12-27', 7, 12, 8937.6),
(4, '338.799.267-00', 'KTN9858', 1, 1, '2020-12-28', 30, 10, 20424),
(7, '14189709812', 'CYM8668', 5, 2, '2020-12-28', 7, 5, 350);

-- --------------------------------------------------------

--
-- Table structure for table `lojas`
--

CREATE TABLE `lojas` (
  `idLoja` int(11) NOT NULL,
  `idCidade` int(11) NOT NULL,
  `endereco` text NOT NULL,
  `cep` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lojas`
--

INSERT INTO `lojas` (`idLoja`, `idCidade`, `endereco`, `cep`) VALUES
(1, 1, 'RIOgaleão - Aeroporto Internacional Tom Jobim - Av. Vinte de Janeiro, s/nº - Galeão', '21941-570'),
(2, 1, 'R. Nelson Mandela, 100 - Botafogo, Rio de Janeiro', '22270-010'),
(3, 1, 'Rua Almirante, R. Luís Belart, 100 - Jardim Guanabara', '21941-100'),
(4, 2, 'R. Vieira de Morais, 1996 - Campo Belo', '04617-007'),
(5, 2, 'R. da Consolação, 323 - Centro Histórico de São Paulo', '01301-000'),
(6, 2, 'Av. Morumbi, 8653 - Cidade Monções, São Paulo', '04703-004'),
(7, 3, 'R. José Vivácqua, 254 - Jabour', '29072-285'),
(8, 3, ' Av. Fernando Ferrari, 2727 - Segurança do Lar', '29072-340'),
(9, 3, 'Av. Adalberto Simão Nader, 1401 - Goiabeiras', '29070-063'),
(10, 4, 'Av. Francisco Sá, 56 - Prado', '30411-145'),
(11, 4, 'Av. Professor Magalhães Penido, 100- São Luiz', '31270-700'),
(12, 5, 'Jardim, R. Anquises Réis, 81 - Armação, Salvador', '41750-100'),
(13, 5, 'Av. Tancredo Neves, 939 - Parque Bela Vista', '41820-021'),
(14, 6, 'Smas Dentro do Extra Park Shopping - Subsolo - Guará', '71215-300'),
(15, 6, 'Área Militar - Lago Sul', '71605-250'),
(16, 6, 'EPAR, 1471 - Lago Sul', '70297-400');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carros`
--
ALTER TABLE `carros`
  ADD PRIMARY KEY (`placa`(7));

--
-- Indexes for table `cidades`
--
ALTER TABLE `cidades`
  ADD PRIMARY KEY (`idCidade`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`cpf`);

--
-- Indexes for table `locacao`
--
ALTER TABLE `locacao`
  ADD PRIMARY KEY (`idLocacao`);

--
-- Indexes for table `lojas`
--
ALTER TABLE `lojas`
  ADD PRIMARY KEY (`idLoja`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `locacao`
--
ALTER TABLE `locacao`
  MODIFY `idLocacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
