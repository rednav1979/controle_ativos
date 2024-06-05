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
-- Estrutura da tabela `crtl_patrimonio_icones`
--

CREATE TABLE `crtl_patrimonio_icones` (
  `id` int(11) NOT NULL,
  `usuario_cadastro` varchar(200) DEFAULT NULL,
  `ip` varchar(200) NOT NULL,
  `data_criacao` varchar(200) DEFAULT NULL,
  `nome` varchar(200) DEFAULT NULL,
  `caminho` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `crtl_patrimonio_icones`
--

INSERT INTO `crtl_patrimonio_icones` (`id`, `usuario_cadastro`, `ip`, `data_criacao`, `nome`, `caminho`) VALUES
(25, 'vanderlei', '172.16.79.171 ', '2023-08-17 14:47:48', 'ESTACAO', 'desktop.jpg'),
(27, 'vanderlei', '172.16.79.171 ', '2023-08-17 15:17:21', 'CHIP', 'chip.jpg'),
(29, 'vanderlei', '172.16.79.171 ', '2023-08-17 15:19:46', 'MOCHILA', 'mochila.png'),
(30, 'vanderlei', '172.16.79.171 ', '2023-08-17 15:21:40', 'IMPRESSORA', 'impressora.jpg'),
(31, 'vanderlei', '172.16.79.171 ', '2023-08-17 15:21:49', 'LEITOR', 'leitor.jpg'),
(32, 'vanderlei', '172.16.79.171 ', '2023-08-17 15:22:02', 'MONITOR', 'monitor.png'),
(33, 'vanderlei', '172.16.79.171 ', '2023-08-17 15:22:18', 'NOTEBOOK', 'notebook.jpg'),
(34, 'vanderlei', '172.16.79.171 ', '2023-08-17 15:22:34', 'TABLET', 'tablet.jpg'),
(35, 'vanderlei', '172.16.79.171 ', '2023-08-17 15:22:42', 'TEC.MOUSE.S.FIO', 'teclado.jpg'),
(36, 'vanderlei', '172.16.79.171 ', '2023-08-17 15:22:52', 'TV', 'tv.jpg'),
(37, 'vanderlei', '172.16.79.171 ', '2023-08-17 15:23:09', 'ROTEADOR', 'roteador.jpg'),
(38, 'vanderlei', '172.16.79.171 ', '2023-08-17 15:23:45', 'ESTACAO', 'desktop.jpg'),
(39, 'vanderlei', '172.16.79.171 ', '2023-08-17 15:24:19', 'CELULAR', 'celular.jpg'),
(40, 'vanderlei', '172.16.79.171 ', '2023-08-17 15:24:50', 'RELOGIO', 'relogio.jpg'),
(41, 'vanderlei', '172.16.79.171 ', '2023-08-17 15:25:06', 'SCANNER', 'scanner.jpg'),
(42, 'vanderlei', '172.16.79.171 ', '2023-08-17 16:04:31', 'TABLET', 'tablet.jpg'),
(43, 'vanderlei', '172.16.79.171 ', '2023-08-18 08:34:35', 'OK', 'ok.jpg'),
(44, 'aprendiz02', '172.16.79.254 ', '2024-05-09 15:34:37', 'CARREGADOR', 'ok.jpg');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `crtl_patrimonio_icones`
--
ALTER TABLE `crtl_patrimonio_icones`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `crtl_patrimonio_icones`
--
ALTER TABLE `crtl_patrimonio_icones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
