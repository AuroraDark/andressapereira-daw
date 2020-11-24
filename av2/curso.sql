-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 24, 2020 at 05:10 AM
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
-- Database: `curso`
--

-- --------------------------------------------------------

--
-- Table structure for table `aluno`
--

CREATE TABLE `aluno` (
  `matricula` text NOT NULL,
  `nome` text NOT NULL,
  `cpf` text NOT NULL,
  `dataNasc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `aluno`
--

INSERT INTO `aluno` (`matricula`, `nome`, `cpf`, `dataNasc`) VALUES
('20200001', 'Lara Agatha Porto', '35572207616', '17/11/1944'),
('20200002', 'Julio Isaac Castro', '25537768968', '11/08/1984'),
('20200003', 'Bárbara Silvana Antonella Silveira', '01528955587', '22/06/1967'),
('20200004', 'Lucca Manoel Barbosa', '95522260580', '14/01/1989');

-- --------------------------------------------------------

--
-- Table structure for table `aluno_disciplina`
--

CREATE TABLE `aluno_disciplina` (
  `matricula` text NOT NULL,
  `codDisciplina` int(11) NOT NULL,
  `apto` int(1) NOT NULL,
  `nomeDisc` text NOT NULL,
  `nomeAluno` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `aluno_disciplina`
--

INSERT INTO `aluno_disciplina` (`matricula`, `codDisciplina`, `apto`, `nomeDisc`, `nomeAluno`) VALUES
('20200001', 1, 0, 'Redes e Sistemas Distribuídos', 'Lara Agatha Porto'),
('20200002', 1, 1, 'Redes e Sistemas Distribuídos', 'Julio Isaac Castro'),
('20200003', 1, 1, 'Redes e Sistemas Distribuídos', 'Bárbara Silvana Antonella Silveira'),
('20200004', 1, 0, 'Redes e Sistemas Distribuídos', 'Lucca Manoel Barbosa'),
('20200001', 2, 2, 'Desenvolvimento de Aplicações Web', 'Lara Agatha Porto'),
('20200002', 2, 1, 'Desenvolvimento de Aplicações Web', 'Julio Isaac Castro'),
('20200003', 2, 0, 'Desenvolvimento de Aplicações Web', 'Bárbara Silvana Antonella Silveira'),
('20200004', 2, 1, 'Desenvolvimento de Aplicações Web', 'Lucca Manoel Barbosa'),
('20200001', 3, 1, 'Programação Orientada a Objetos', 'Lara Agatha Porto'),
('20200002', 3, 0, 'Programação Orientada a Objetos', 'Julio Isaac Castro'),
('20200003', 3, 0, 'Programação Orientada a Objetos', 'Bárbara Silvana Antonella Silveira'),
('20200004', 3, 1, 'Programação Orientada a Objetos', 'Lucca Manoel Barbosa'),
('20200001', 4, 0, 'Estrutura de Dados', 'Lara Agatha Porto'),
('20200002', 4, 0, 'Estrutura de Dados', 'Julio Isaac Castro'),
('20200003', 4, 0, 'Estrutura de Dados', 'Bárbara Silvana Antonella Silveira'),
('20200004', 4, 0, 'Estrutura de Dados', 'Lucca Manoel Barbosa'),
('20200001', 5, 1, 'Álgebra Linear', 'Lara Agatha Porto'),
('20200002', 5, 0, 'Álgebra Linear', 'Julio Isaac Castro'),
('20200003', 5, 1, 'Álgebra Linear', 'Bárbara Silvana Antonella Silveira'),
('20200004', 5, 0, 'Álgebra Linear', 'Lucca Manoel Barbosa'),
('20200001', 6, 1, 'Projeto de Banco de Dados', 'Lara Agatha Porto'),
('20200002', 6, 0, 'Projeto de Banco de Dados', 'Julio Isaac Castro'),
('20200003', 6, 1, 'Projeto de Banco de Dados', 'Bárbara Silvana Antonella Silveira'),
('20200004', 6, 0, 'Projeto de Banco de Dados', 'Lucca Manoel Barbosa'),
('20200004', 6, 0, 'Projeto de Banco de Dados', 'Lucca Manoel Barbosa');

-- --------------------------------------------------------

--
-- Table structure for table `aluno_inscrito`
--

CREATE TABLE `aluno_inscrito` (
  `matricula` text NOT NULL,
  `codTurma` int(11) NOT NULL,
  `nomeAluno` text NOT NULL,
  `nomeDisc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `aluno_inscrito`
--

INSERT INTO `aluno_inscrito` (`matricula`, `codTurma`, `nomeAluno`, `nomeDisc`) VALUES
('20200001', 2, 'Lara', 'Desenvolvimento');

-- --------------------------------------------------------

--
-- Table structure for table `disciplina`
--

CREATE TABLE `disciplina` (
  `codDisciplina` int(11) NOT NULL,
  `nome` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `disciplina`
--

INSERT INTO `disciplina` (`codDisciplina`, `nome`) VALUES
(1, 'Redes e Sistemas Distribuídos'),
(2, 'Desenvolvimento de Aplicações Web'),
(3, 'Programação Orientada a Objetos'),
(4, 'Estrutura de Dados'),
(5, 'Álgebra Linear'),
(6, 'Projeto de Banco de Dados');

-- --------------------------------------------------------

--
-- Table structure for table `turma`
--

CREATE TABLE `turma` (
  `codTurma` int(11) NOT NULL,
  `turno` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `turma`
--

INSERT INTO `turma` (`codTurma`, `turno`) VALUES
(1, 'Manhã'),
(2, 'Tarde'),
(3, 'Noite');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
