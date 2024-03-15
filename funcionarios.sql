-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15/03/2024 às 02:09
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `siga_transportes`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `id` bigint(20) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `fk_empresa_id` bigint(20) NOT NULL,
  `CPF` varchar(50) NOT NULL,
  `PIS` varchar(30) NOT NULL,
  `data_admissao` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `endereco` varchar(90) NOT NULL,
  `fk_funcao_id` bigint(20) NOT NULL,
  `telefone` varchar(60) NOT NULL,
  `salario` decimal(10,2) NOT NULL,
  `fk_cidades_id` bigint(20) NOT NULL,
  `fk_situacoes_id` bigint(20) NOT NULL,
  `data_cadastro` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Despejando dados para a tabela `funcionarios`
--

INSERT INTO `funcionarios` (`id`, `nome`, `fk_empresa_id`, `CPF`, `PIS`, `data_admissao`, `email`, `endereco`, `fk_funcao_id`, `telefone`, `salario`, `fk_cidades_id`, `fk_situacoes_id`, `data_cadastro`) VALUES
(2, 'tstese', 2, '32423', '423423', '2024-03-01', 'fsafj@gmail.com', 'rewrew', 1, '2142341', 13213.00, 44, 6, '2024-03-09'),
(3, 'TTete', 2, '21321', '314', '2024-03-01', 'fsdfas@gmail.com', 'rwerew', 1, '2423', 423423.00, 43, 6, '2024-03-09');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_g7p4bs353x28sq9069xrwphe7` (`fk_cidades_id`),
  ADD KEY `FK_t0ukey4u7380lj0vs5gvudhap` (`fk_situacoes_id`),
  ADD KEY `fk_empresa_id` (`fk_empresa_id`),
  ADD KEY `fk_funcao_id` (`fk_funcao_id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD CONSTRAINT `FK_g7p4bs353x28sq9069xrwphe7` FOREIGN KEY (`fk_cidades_id`) REFERENCES `localidades` (`id`),
  ADD CONSTRAINT `FK_t0ukey4u7380lj0vs5gvudhap` FOREIGN KEY (`fk_situacoes_id`) REFERENCES `situacoes` (`id`),
  ADD CONSTRAINT `fk_empresa_id` FOREIGN KEY (`fk_empresa_id`) REFERENCES `empresas` (`id`),
  ADD CONSTRAINT `fk_funcao_id` FOREIGN KEY (`fk_funcao_id`) REFERENCES `funcoes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
