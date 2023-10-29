-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29-Out-2023 às 15:51
-- Versão do servidor: 10.4.28-MariaDB
-- versão do PHP: 8.0.28

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
-- Estrutura da tabela `acertos_viagens`
--

CREATE TABLE `acertos_viagens` (
  `id` int(20) NOT NULL,
  `fk_lancar_viagens_id` bigint(20) NOT NULL,
  `creditar` decimal(10,2) NOT NULL,
  `debitar` decimal(10,2) NOT NULL,
  `historico` varchar(100) NOT NULL,
  `fk_plano_contas_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` bigint(20) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `CNPJ` varchar(60) NOT NULL,
  `ie` varchar(60) NOT NULL,
  `email` varchar(100) NOT NULL,
  `endereco` varchar(80) NOT NULL,
  `telefone` varchar(60) NOT NULL,
  `data_cadastro` date NOT NULL,
  `fk_cidades_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `CNPJ`, `ie`, `email`, `endereco`, `telefone`, `data_cadastro`, `fk_cidades_id`) VALUES
(37, 'SADA TRANSPORTES LTDA', '11.111.111/1111-11', '1111111111111', 'sada@gmail.com', 'FIAT', '(31) 65678-7894', '2023-10-21', 44);

-- --------------------------------------------------------

--
-- Estrutura da tabela `documentos`
--

CREATE TABLE `documentos` (
  `id` bigint(20) NOT NULL,
  `nome_doc` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `documentos`
--

INSERT INTO `documentos` (`id`, `nome_doc`) VALUES
(1, 'Cupom Fiscal'),
(4, 'Nota Fiscal'),
(5, 'Recibo'),
(7, 'PIX3');

-- --------------------------------------------------------

--
-- Estrutura da tabela `doc_veiculos`
--

CREATE TABLE `doc_veiculos` (
  `id` int(11) NOT NULL,
  `nome_doc` varchar(60) NOT NULL,
  `data_realizado` date NOT NULL,
  `data_vencimento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresas`
--

CREATE TABLE `empresas` (
  `id` bigint(20) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `CNPJ` varchar(80) NOT NULL,
  `ie` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `fk_cidades_id` bigint(20) NOT NULL,
  `fone` varchar(30) NOT NULL,
  `responsavel` varchar(80) NOT NULL,
  `data_inicio` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `empresas`
--

INSERT INTO `empresas` (`id`, `nome`, `CNPJ`, `ie`, `email`, `endereco`, `fk_cidades_id`, `fone`, `responsavel`, `data_inicio`) VALUES
(1, 'fsdfs', '23.131', '312312', 'FSDF@FAFAS', '321312', 43, '321321312312', '312321', '2023-10-25'),
(2, 'Gloria Transportes', '03.252.789/0001-66', '1247917891254', 'gloria.transportes@yahoo.com', 'Rua 1', 43, '31356565', 'Teste', '1989-08-28');

-- --------------------------------------------------------

--
-- Estrutura da tabela `exames_medicos`
--

CREATE TABLE `exames_medicos` (
  `id` int(11) NOT NULL,
  `nome_exame` varchar(60) NOT NULL,
  `data_realizado` date NOT NULL,
  `data_vencimento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedores`
--

CREATE TABLE `fornecedores` (
  `id` bigint(20) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `CNPJ` varchar(80) NOT NULL,
  `ie` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `endereco` varchar(80) NOT NULL,
  `fone` varchar(30) NOT NULL,
  `responsavel` varchar(80) NOT NULL,
  `data_cadastro` date NOT NULL,
  `fk_cidades_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `fornecedores`
--

INSERT INTO `fornecedores` (`id`, `nome`, `CNPJ`, `ie`, `email`, `endereco`, `fone`, `responsavel`, `data_cadastro`, `fk_cidades_id`) VALUES
(2, 'GW Pneus editado', '11.111.111/1111-11', '211111111123', 'FSDF@FAFAS', 'dasd2121', '1231232', 'fdsafas', '2023-09-24', 43);

-- --------------------------------------------------------

--
-- Estrutura da tabela `frotas`
--

CREATE TABLE `frotas` (
  `id` bigint(20) NOT NULL,
  `nome_frota` varchar(20) NOT NULL,
  `fk_empresas_id` bigint(20) NOT NULL,
  `fk_situacoes_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `id` bigint(20) NOT NULL,
  `CPF` varchar(50) NOT NULL,
  `PIS` varchar(30) NOT NULL,
  `data_admissao` date NOT NULL,
  `data_demissao` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `endereco` varchar(90) NOT NULL,
  `funcao` varchar(60) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `telefone` varchar(60) NOT NULL,
  `fk_cidades_id` bigint(20) NOT NULL,
  `fk_situacoes_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `lancar_baixa_veiculos`
--

CREATE TABLE `lancar_baixa_veiculos` (
  `id` bigint(20) NOT NULL,
  `fk_veiculos_id` bigint(20) NOT NULL,
  `data_venda` date NOT NULL,
  `km_final` int(11) NOT NULL,
  `comprador` varchar(60) NOT NULL,
  `fone_comprador` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `lancar_contabilidade`
--

CREATE TABLE `lancar_contabilidade` (
  `id` bigint(20) NOT NULL,
  `data` date NOT NULL,
  `debitar` decimal(10,2) NOT NULL,
  `creditar` decimal(10,2) NOT NULL,
  `historico` varchar(100) NOT NULL,
  `fk_plano_contas_id` bigint(20) NOT NULL,
  `fk_documento_id` bigint(20) NOT NULL,
  `fk_empresa_id` bigint(20) NOT NULL,
  `fk_fornecedor_id` bigint(20) NOT NULL,
  `fk_veiculos_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `lancar_ferias`
--

CREATE TABLE `lancar_ferias` (
  `id` int(20) NOT NULL,
  `fk_funiconarios_id` bigint(20) NOT NULL,
  `data_inicio` date NOT NULL,
  `data_fim` date NOT NULL,
  `ano_referente` date NOT NULL,
  `valor` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `lancar_financeiro_viagens`
--

CREATE TABLE `lancar_financeiro_viagens` (
  `id` bigint(20) NOT NULL,
  `fk_lancar_viagens_id` bigint(20) NOT NULL,
  `creditar` decimal(8,2) NOT NULL,
  `debitar` decimal(8,2) NOT NULL,
  `historico` varchar(100) NOT NULL,
  `fk_plano_contas_id` bigint(20) NOT NULL,
  `fk_documento_id` bigint(20) NOT NULL,
  `fk_fornecedor_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `lancar_viagens`
--

CREATE TABLE `lancar_viagens` (
  `id` bigint(20) NOT NULL,
  `crtc` varchar(30) NOT NULL,
  `data` date NOT NULL,
  `fk_frota_id` bigint(20) NOT NULL,
  `fk_motorista_id` bigint(20) NOT NULL,
  `fk_origem_id` bigint(20) NOT NULL,
  `kmFinal` int(11) NOT NULL,
  `kmInicial` int(11) NOT NULL,
  `litragem` double NOT NULL,
  `qtdeveiculos` int(11) NOT NULL,
  `fk_destino_id` bigint(20) NOT NULL,
  `fk_empresa_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `localidades`
--

CREATE TABLE `localidades` (
  `id` bigint(20) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `pais` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `localidades`
--

INSERT INTO `localidades` (`id`, `cidade`, `estado`, `pais`) VALUES
(43, 'Betim', 'MG', 'Brasil'),
(44, 'BELO HORIZONTE', 'MG', 'BRASIL');

-- --------------------------------------------------------

--
-- Estrutura da tabela `plano_contas`
--

CREATE TABLE `plano_contas` (
  `id` bigint(20) NOT NULL,
  `conta` int(11) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `descricao` varchar(20) NOT NULL,
  `subconta` int(11) NOT NULL,
  `sigla_situacao` char(1) NOT NULL,
  `saldo` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `plano_contas`
--

INSERT INTO `plano_contas` (`id`, `conta`, `tipo`, `descricao`, `subconta`, `sigla_situacao`, `saldo`) VALUES
(1, 1, 'Resultado', 'Despesas', 1, 'D', 0.00),
(2, 1, 'Resultado', 'Despesas', 1, 'D', 0.00);

-- --------------------------------------------------------

--
-- Estrutura da tabela `situacoes`
--

CREATE TABLE `situacoes` (
  `id` bigint(20) NOT NULL,
  `tipo_nome` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `situacoes`
--

INSERT INTO `situacoes` (`id`, `tipo_nome`) VALUES
(5, 'aposentado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipos_niveis`
--

CREATE TABLE `tipos_niveis` (
  `id` bigint(20) NOT NULL,
  `nome_nivel` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `tipos_niveis`
--

INSERT INTO `tipos_niveis` (`id`, `nome_nivel`) VALUES
(1, 'admin'),
(2, 'usuario');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipos_veiculos`
--

CREATE TABLE `tipos_veiculos` (
  `id` bigint(20) NOT NULL,
  `tipo_de_veiculo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `tipos_veiculos`
--

INSERT INTO `tipos_veiculos` (`id`, `tipo_de_veiculo`) VALUES
(1, 'sem veículo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `fk_id_nivel` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `cpf`, `usuario`, `senha`, `fk_id_nivel`) VALUES
(7, 'JUNINHO', '03083415621', 'osmar.saraiva@gmail.com', '123', 1),
(8, 'JR', '000.000.000-00', 'admin@admin.com', '123', 1),
(10, 'tew', '231', 'osmar.saraiva@gmail.com', '213', 2),
(11, 'eeditado', '030.834.156-21', 'admin@admin.com', '123', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `veiculos`
--

CREATE TABLE `veiculos` (
  `id` bigint(20) NOT NULL,
  `fk_tipo_veiculo_id` bigint(20) NOT NULL,
  `marca` varchar(80) NOT NULL,
  `modelo` varchar(80) NOT NULL,
  `placas` varchar(80) NOT NULL,
  `dataCompra` date NOT NULL,
  `fk_empresas_id` bigint(20) NOT NULL,
  `fk_frota_id` bigint(20) NOT NULL,
  `tipo_aquisicao` varchar(50) NOT NULL,
  `km_inicial` int(11) NOT NULL,
  `fk_situacoes_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `acertos_viagens`
--
ALTER TABLE `acertos_viagens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_lancar_viagens_id_acerto` (`fk_lancar_viagens_id`),
  ADD KEY `fk_plano_contas_id_acerto` (`fk_plano_contas_id`);

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cidades_id` (`fk_cidades_id`);

--
-- Índices para tabela `documentos`
--
ALTER TABLE `documentos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `doc_veiculos`
--
ALTER TABLE `doc_veiculos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cidade` (`fk_cidades_id`);

--
-- Índices para tabela `exames_medicos`
--
ALTER TABLE `exames_medicos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cidades` (`fk_cidades_id`);

--
-- Índices para tabela `frotas`
--
ALTER TABLE `frotas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `situcao_fk` (`fk_situacoes_id`),
  ADD KEY `fk_empresas` (`fk_empresas_id`);

--
-- Índices para tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_g7p4bs353x28sq9069xrwphe7` (`fk_cidades_id`),
  ADD KEY `FK_t0ukey4u7380lj0vs5gvudhap` (`fk_situacoes_id`);

--
-- Índices para tabela `lancar_baixa_veiculos`
--
ALTER TABLE `lancar_baixa_veiculos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_veiculos_id` (`fk_veiculos_id`);

--
-- Índices para tabela `lancar_contabilidade`
--
ALTER TABLE `lancar_contabilidade`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_dy6uec0ucvvq1eniwyk4fltiy` (`fk_plano_contas_id`),
  ADD KEY `FK_p3afl2c4etqqj1kbawusk2ypt` (`fk_documento_id`),
  ADD KEY `FK_cskm7ts2fpctppnbkr8paqut9` (`fk_empresa_id`),
  ADD KEY `FK_3bim69q3srfcw7r38ymii6hw7` (`fk_fornecedor_id`),
  ADD KEY `fk_veiculos_id_conta` (`fk_veiculos_id`);

--
-- Índices para tabela `lancar_ferias`
--
ALTER TABLE `lancar_ferias`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `lancar_financeiro_viagens`
--
ALTER TABLE `lancar_financeiro_viagens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_fornecedor_id` (`fk_fornecedor_id`),
  ADD KEY `fK_documento_id` (`fk_documento_id`),
  ADD KEY `fk_lancar_viagens_id` (`fk_lancar_viagens_id`),
  ADD KEY `fk_plano_contas_id` (`fk_plano_contas_id`);

--
-- Índices para tabela `lancar_viagens`
--
ALTER TABLE `lancar_viagens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_vmoiw2vk729vpaiy1mbqiddu` (`fk_destino_id`),
  ADD KEY `FK_6bmjdy748u31bj7h67t4sguoq` (`fk_empresa_id`),
  ADD KEY `FK_nwy4b86krnhbcqdmlpfrwecn4` (`fk_frota_id`),
  ADD KEY `FK_i9gvvojss1nphrrfh3keu7a0l` (`fk_motorista_id`),
  ADD KEY `FK_drkp8j09nsncparffe322twvv` (`fk_origem_id`);

--
-- Índices para tabela `localidades`
--
ALTER TABLE `localidades`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `plano_contas`
--
ALTER TABLE `plano_contas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `situacoes`
--
ALTER TABLE `situacoes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tipos_niveis`
--
ALTER TABLE `tipos_niveis`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tipos_veiculos`
--
ALTER TABLE `tipos_veiculos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_qvxlhmubifx9m0egeyca0j0fh` (`tipo_de_veiculo`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_nivel` (`fk_id_nivel`);

--
-- Índices para tabela `veiculos`
--
ALTER TABLE `veiculos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_empresas_id` (`fk_empresas_id`),
  ADD KEY `fk_frota_id` (`fk_frota_id`),
  ADD KEY `fk_situaçoes_id` (`fk_situacoes_id`),
  ADD KEY `fk_tipo_veiculo_id` (`fk_tipo_veiculo_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `acertos_viagens`
--
ALTER TABLE `acertos_viagens`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de tabela `documentos`
--
ALTER TABLE `documentos`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `doc_veiculos`
--
ALTER TABLE `doc_veiculos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `exames_medicos`
--
ALTER TABLE `exames_medicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `frotas`
--
ALTER TABLE `frotas`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `lancar_baixa_veiculos`
--
ALTER TABLE `lancar_baixa_veiculos`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `lancar_contabilidade`
--
ALTER TABLE `lancar_contabilidade`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `lancar_ferias`
--
ALTER TABLE `lancar_ferias`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `lancar_financeiro_viagens`
--
ALTER TABLE `lancar_financeiro_viagens`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `lancar_viagens`
--
ALTER TABLE `lancar_viagens`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `localidades`
--
ALTER TABLE `localidades`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de tabela `plano_contas`
--
ALTER TABLE `plano_contas`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `situacoes`
--
ALTER TABLE `situacoes`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tipos_niveis`
--
ALTER TABLE `tipos_niveis`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tipos_veiculos`
--
ALTER TABLE `tipos_veiculos`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `veiculos`
--
ALTER TABLE `veiculos`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `acertos_viagens`
--
ALTER TABLE `acertos_viagens`
  ADD CONSTRAINT `fk_lancar_viagens_id_acerto` FOREIGN KEY (`fk_lancar_viagens_id`) REFERENCES `lancar_viagens` (`id`),
  ADD CONSTRAINT `fk_plano_contas_id_acerto` FOREIGN KEY (`fk_plano_contas_id`) REFERENCES `plano_contas` (`id`);

--
-- Limitadores para a tabela `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `fk_cidades_id` FOREIGN KEY (`fk_cidades_id`) REFERENCES `localidades` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `empresas`
--
ALTER TABLE `empresas`
  ADD CONSTRAINT `fk_cidade` FOREIGN KEY (`fk_cidades_id`) REFERENCES `localidades` (`id`);

--
-- Limitadores para a tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  ADD CONSTRAINT `fk_cidades` FOREIGN KEY (`fk_cidades_id`) REFERENCES `localidades` (`id`);

--
-- Limitadores para a tabela `frotas`
--
ALTER TABLE `frotas`
  ADD CONSTRAINT `fk_empresas` FOREIGN KEY (`fk_empresas_id`) REFERENCES `empresas` (`id`),
  ADD CONSTRAINT `situcao_fk` FOREIGN KEY (`fk_situacoes_id`) REFERENCES `situacoes` (`id`);

--
-- Limitadores para a tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD CONSTRAINT `FK_g7p4bs353x28sq9069xrwphe7` FOREIGN KEY (`fk_cidades_id`) REFERENCES `localidades` (`id`),
  ADD CONSTRAINT `FK_t0ukey4u7380lj0vs5gvudhap` FOREIGN KEY (`fk_situacoes_id`) REFERENCES `situacoes` (`id`);

--
-- Limitadores para a tabela `lancar_baixa_veiculos`
--
ALTER TABLE `lancar_baixa_veiculos`
  ADD CONSTRAINT `fk_veiculos_id` FOREIGN KEY (`fk_veiculos_id`) REFERENCES `veiculos` (`id`);

--
-- Limitadores para a tabela `lancar_contabilidade`
--
ALTER TABLE `lancar_contabilidade`
  ADD CONSTRAINT `FK_3bim69q3srfcw7r38ymii6hw7` FOREIGN KEY (`fk_fornecedor_id`) REFERENCES `fornecedores` (`id`),
  ADD CONSTRAINT `FK_cskm7ts2fpctppnbkr8paqut9` FOREIGN KEY (`fk_empresa_id`) REFERENCES `empresas` (`id`),
  ADD CONSTRAINT `FK_dy6uec0ucvvq1eniwyk4fltiy` FOREIGN KEY (`fk_plano_contas_id`) REFERENCES `plano_contas` (`id`),
  ADD CONSTRAINT `FK_p3afl2c4etqqj1kbawusk2ypt` FOREIGN KEY (`fk_documento_id`) REFERENCES `documentos` (`id`),
  ADD CONSTRAINT `fk_veiculos_id_conta` FOREIGN KEY (`fk_veiculos_id`) REFERENCES `veiculos` (`id`);

--
-- Limitadores para a tabela `lancar_financeiro_viagens`
--
ALTER TABLE `lancar_financeiro_viagens`
  ADD CONSTRAINT `fK_documento_id` FOREIGN KEY (`fk_documento_id`) REFERENCES `documentos` (`id`),
  ADD CONSTRAINT `fk_fornecedor_id` FOREIGN KEY (`fk_fornecedor_id`) REFERENCES `fornecedores` (`id`),
  ADD CONSTRAINT `fk_lancar_viagens_id` FOREIGN KEY (`fk_lancar_viagens_id`) REFERENCES `lancar_viagens` (`id`),
  ADD CONSTRAINT `fk_plano_contas_id` FOREIGN KEY (`fk_plano_contas_id`) REFERENCES `plano_contas` (`id`);

--
-- Limitadores para a tabela `lancar_viagens`
--
ALTER TABLE `lancar_viagens`
  ADD CONSTRAINT `FK_6bmjdy748u31bj7h67t4sguoq` FOREIGN KEY (`fk_empresa_id`) REFERENCES `empresas` (`id`),
  ADD CONSTRAINT `FK_i9gvvojss1nphrrfh3keu7a0l` FOREIGN KEY (`fk_motorista_id`) REFERENCES `funcionarios` (`id`),
  ADD CONSTRAINT `FK_nwy4b86krnhbcqdmlpfrwecn4` FOREIGN KEY (`fk_frota_id`) REFERENCES `frotas` (`id`);

--
-- Limitadores para a tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_id_nivel` FOREIGN KEY (`fk_id_nivel`) REFERENCES `tipos_niveis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `veiculos`
--
ALTER TABLE `veiculos`
  ADD CONSTRAINT `fk_empresas_id` FOREIGN KEY (`fk_empresas_id`) REFERENCES `empresas` (`id`),
  ADD CONSTRAINT `fk_frota_id` FOREIGN KEY (`fk_frota_id`) REFERENCES `frotas` (`id`),
  ADD CONSTRAINT `fk_situaçoes_id` FOREIGN KEY (`fk_situacoes_id`) REFERENCES `situacoes` (`id`),
  ADD CONSTRAINT `fk_tipo_veiculo_id` FOREIGN KEY (`fk_tipo_veiculo_id`) REFERENCES `tipos_veiculos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
