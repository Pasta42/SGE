-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 27/02/2020 às 01:17
-- Versão do servidor: 10.4.6-MariaDB
-- Versão do PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bancosge`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `ajuda`
--

CREATE TABLE `ajuda` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(80) NOT NULL,
  `descricao` text NOT NULL,
  `imagem` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `fornecedor`
--

CREATE TABLE `fornecedor` (
  `id` int(11) NOT NULL,
  `nome` varchar(250) NOT NULL,
  `cnpj` varchar(20) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `website` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `fornecedor`
--

INSERT INTO `fornecedor` (`id`, `nome`, `cnpj`, `telefone`, `email`, `website`) VALUES
(2, 'Soluque InformÃ¡tica', '12.222.234/5678-90', '(55) 3244-2818', 'sites@soluque.com.br', NULL),
(4, 'Nexus InformÃ¡tica', '12.111.134/5678-90', '(55) 3244-8965', 'contato@nexusinformatica.com.br', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `movimento`
--

CREATE TABLE `movimento` (
  `id` int(11) NOT NULL,
  `quantidade` int(6) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `movimentacao` tinyint(1) DEFAULT NULL,
  `id_produto` int(11) DEFAULT NULL,
  `valvenda` decimal(10,0) DEFAULT NULL,
  `valcusto` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `movimento`
--

INSERT INTO `movimento` (`id`, `quantidade`, `data`, `movimentacao`, `id_produto`, `valvenda`, `valcusto`) VALUES
(1, 10, '2020-02-02', 1, 2, NULL, '20'),
(2, 4, '2020-02-02', 2, 2, '35', NULL),
(3, 4, '2020-02-02', 2, 2, '35', NULL),
(4, 50, '2020-02-05', 1, 1, NULL, '1300');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(250) NOT NULL,
  `imagem` varchar(80) NOT NULL,
  `codigo` varchar(40) DEFAULT NULL,
  `referencia` varchar(40) DEFAULT NULL,
  `descricao` varchar(250) NOT NULL,
  `id_fornecedor` int(11) DEFAULT NULL,
  `valcusto` decimal(10,2) NOT NULL,
  `valvenda` decimal(10,2) NOT NULL,
  `data_cadastro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `imagem`, `codigo`, `referencia`, `descricao`, `id_fornecedor`, `valcusto`, `valvenda`, `data_cadastro`) VALUES
(1, 'Notebook Philco', '20200202_1413510.jpg', '123', '456', 'Notebook Philco com 4GB de ram, processador i5 de 8Âª geraÃ§Ã£o, SSD de 128 GB.', 2, '1300.00', '1800.00', '2020-01-07'),
(2, 'Pen Drive 16GB Multilaser', '20200202_1821330.jpeg', '135', '579', 'Pen Drive 16GB Multilaser', 2, '20.00', '35.00', '2020-02-02');

-- --------------------------------------------------------

--
-- Estrutura para tabela `relatorio`
--

CREATE TABLE `relatorio` (
  `id` int(11) NOT NULL,
  `entrada` varchar(250) NOT NULL,
  `saida` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(250) NOT NULL,
  `login` varchar(40) NOT NULL,
  `senha` varchar(40) NOT NULL,
  `permissao` tinyint(1) NOT NULL,
  `ativo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `login`, `senha`, `permissao`, `ativo`) VALUES
(1, 'Pasta 42', 'pasta42', '698dc19d489c4e4db73e28a713eab07b', 9, 1),
(2, 'Simone', 'simone', '39312e977ed924f4ee20f1f62a964d7b', 2, 1);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `ajuda`
--
ALTER TABLE `ajuda`
  ADD UNIQUE KEY `id` (`id`);

--
-- Índices de tabela `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `movimento`
--
ALTER TABLE `movimento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_produtos` (`id_produto`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_fornecedor` (`id_fornecedor`);

--
-- Índices de tabela `relatorio`
--
ALTER TABLE `relatorio`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `ajuda`
--
ALTER TABLE `ajuda`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `fornecedor`
--
ALTER TABLE `fornecedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `movimento`
--
ALTER TABLE `movimento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `relatorio`
--
ALTER TABLE `relatorio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `movimento`
--
ALTER TABLE `movimento`
  ADD CONSTRAINT `movimento_ibfk_1` FOREIGN KEY (`id_produto`) REFERENCES `produtos` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Restrições para tabelas `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `produtos_ibfk_1` FOREIGN KEY (`id_fornecedor`) REFERENCES `fornecedor` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
