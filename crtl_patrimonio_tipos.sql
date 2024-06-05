-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 05-Jun-2024 às 14:23
-- Versão do servidor: 10.3.28-MariaDB
-- versão do PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `tecnologia`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `crtl_patrimonio_tipos`
--

CREATE TABLE `crtl_patrimonio_tipos` (
  `id` int(11) NOT NULL,
  `usuario_cadastro` varchar(200) DEFAULT NULL,
  `ip` varchar(200) NOT NULL,
  `color` varchar(200) DEFAULT NULL,
  `data_criacao` varchar(200) DEFAULT NULL,
  `nome` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `crtl_patrimonio_tipos`
--

INSERT INTO `crtl_patrimonio_tipos` (`id`, `usuario_cadastro`, `ip`, `color`, `data_criacao`, `nome`) VALUES
(6, 'vanderlei', '172.16.79.254', '#f3511b', '2023-07-06 17:04:10', 'CELULAR '),
(7, 'vanderlei', '172.16.79.254', '#43b681', '2023-07-06 17:04:20', 'CHIP '),
(8, 'vanderlei', '172.16.79.254', '#4e7fc1', '2023-07-06 17:04:41', 'ESTACAO '),
(9, 'vanderlei', '172.16.79.254', '#d2ce5b', '2023-07-06 17:04:52', 'IMPRESSORA '),
(10, 'vanderlei', '172.16.79.254', '#ea53dd', '2023-07-06 17:05:04', 'LEITOR '),
(12, 'vanderlei', '172.16.79.254', '#6128e6', '2023-07-06 17:05:40', 'MOCHILA '),
(13, 'vanderlei', '172.16.79.254', '#edeeb5', '2023-07-06 17:06:06', 'MONITOR '),
(14, 'vanderlei', '172.16.79.254', '#de9f7d', '2023-07-06 17:06:16', 'NOTEBOOK '),
(15, 'vanderlei', '172.16.79.254', '#36e2ce', '2023-07-06 17:06:34', 'RELOGIO '),
(17, 'vanderlei', '172.16.79.254', '#e3edb1', '2023-07-06 17:08:46', 'ROTEADOR '),
(18, 'vanderlei', '172.16.79.254', '#e411d2', '2023-07-06 17:09:10', 'SCANNER '),
(19, 'vanderlei', '172.16.79.254', '#a55845', '2023-07-06 17:09:27', 'TABLET '),
(20, 'vanderlei', '172.16.79.254', '#8ea4e6', '2023-07-06 17:09:36', 'TEC.MOUSE.S.FIO '),
(21, 'vanderlei', '172.16.79.254', '#0995ec', '2023-07-06 17:09:58', 'TV '),
(25, 'aprendiz02', '172.16.79.254', '#09f650', '2024-05-09 15:33:27', 'CARREGADOR ');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `crtl_patrimonio_tipos`
--
ALTER TABLE `crtl_patrimonio_tipos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `crtl_patrimonio_tipos`
--
ALTER TABLE `crtl_patrimonio_tipos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
