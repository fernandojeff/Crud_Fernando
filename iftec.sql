-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25-Out-2022 às 00:12
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `iftec`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `cod_funcionario` int(11) NOT NULL,
  `nome` varchar(128) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `nascimento` date DEFAULT NULL,
  `endereco` varchar(228) DEFAULT NULL,
  `sexo` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `funcionarios`
--

INSERT INTO `funcionarios` (`cod_funcionario`, `nome`, `cpf`, `nascimento`, `endereco`, `sexo`) VALUES
(0, '', '', '0000-00-00', '', ''),
(1, 'Murilo', '787.773.815-30', '1954-02-12', 'Rua José Paulino da Costa', 'masculino'),
(2, 'Bernardo Lorenzo Nunes', '335.263.745-89', '1974-06-08', 'Rua A', 'Masculino'),
(3, 'Bernardo Lorenzo Nunes', '335.263.745-89', '1974-06-08', 'Rua A', 'Masculino'),
(4, 'Bernardo Lorenzo Nunes', '335.263.745-89', '1974-06-08', 'Rua A', 'Masculino'),
(5, 'Letícia Alice Márcia Brito', '738.007.413-00', '6216-05-04', 'Rua Adison Pereira da Silva', 'Feminino'),
(6, 'Fernanda Melissa Maria dos Santos', '772.603.842-04', '1965-12-03', 'Rua Adriano Pacheco', 'Feminino');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`cod_funcionario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
