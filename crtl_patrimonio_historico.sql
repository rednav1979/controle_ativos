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
-- Estrutura da tabela `crtl_patrimonio_historico`
--

CREATE TABLE `crtl_patrimonio_historico` (
  `id` int(11) NOT NULL,
  `data_cadastro` varchar(200) NOT NULL,
  `endereco_ip` varchar(200) DEFAULT NULL,
  `netbios` varchar(200) DEFAULT NULL,
  `sistema_operacional` varchar(200) DEFAULT NULL,
  `fabricante` varchar(200) DEFAULT NULL,
  `colaborador` varchar(200) DEFAULT NULL,
  `departamento` varchar(200) DEFAULT NULL,
  `tipo_equipamento` varchar(200) DEFAULT NULL,
  `url_foto` varchar(500) DEFAULT NULL,
  `url_termo` varchar(500) DEFAULT NULL,
  `usuario_cadastro` varchar(500) DEFAULT NULL,
  `obra` varchar(500) DEFAULT NULL,
  `id_historico` varchar(500) DEFAULT NULL,
  `historico` varchar(500) DEFAULT NULL,
  `icone` varchar(200) DEFAULT NULL,
  `D_E_L_E_T_E` varchar(2) DEFAULT NULL,
  `obs_ticket` varchar(200) DEFAULT NULL,
  `solicitacao_suporte` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `crtl_patrimonio_historico`
--


--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `crtl_patrimonio_historico`
--
ALTER TABLE `crtl_patrimonio_historico`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `crtl_patrimonio_historico`
--
ALTER TABLE `crtl_patrimonio_historico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1502;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
