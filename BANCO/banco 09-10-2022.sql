-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09-Out-2022 às 07:05
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `tcc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `agendamentos`
--

CREATE TABLE `agendamentos` (
  `id_agendamento` int(11) NOT NULL,
  `id_usuario_fk` int(11) NOT NULL,
  `id_local_fk` int(11) NOT NULL,
  `data_agendamento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `agendamentos`
--

INSERT INTO `agendamentos` (`id_agendamento`, `id_usuario_fk`, `id_local_fk`, `data_agendamento`) VALUES
(59, 0, 21, '2022-10-15'),
(62, 0, 0, '2022-10-19'),
(64, 0, 0, '2022-10-24'),
(65, 0, 0, '2022-10-26'),
(66, 0, 0, '2022-10-24'),
(72, 52, 27, '2022-10-06'),
(74, 62, 27, '2022-10-09'),
(75, 61, 27, '2022-10-29');

-- --------------------------------------------------------

--
-- Estrutura da tabela `blocos`
--

CREATE TABLE `blocos` (
  `id_bloco` int(11) NOT NULL,
  `bloco` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `blocos`
--

INSERT INTO `blocos` (`id_bloco`, `bloco`) VALUES
(7, 'a'),
(8, 'b'),
(10, 'c');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contas`
--

CREATE TABLE `contas` (
  `id_conta` int(11) NOT NULL,
  `conta` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `contas`
--

INSERT INTO `contas` (`id_conta`, `conta`) VALUES
(1, 'Despesas Com Pessoal'),
(2, 'Despesas Operacionais'),
(3, 'Conservação e Manutenção'),
(4, 'Tarifas Bancárias'),
(5, 'Depesas Diversas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `despesas`
--

CREATE TABLE `despesas` (
  `id_despesa` int(11) NOT NULL,
  `despesa` varchar(100) NOT NULL,
  `valor_despesa` float(10,2) NOT NULL,
  `data_despesa` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_conta_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `despesas`
--

INSERT INTO `despesas` (`id_despesa`, `despesa`, `valor_despesa`, `data_despesa`, `id_conta_fk`) VALUES
(2, 'água', 1200.00, '2022-10-10 03:00:00', 2),
(11, 'manutenção do interfone ', 111.00, '2022-10-22 03:00:00', 3),
(12, 'energia', 46.77, '2022-10-29 03:00:00', 5),
(15, 'manutenção do jardim ', 110.99, '2022-10-21 03:00:00', 3),
(16, 'limpeza da piscina', 100.00, '2022-10-19 03:00:00', 3),
(17, 'internet', 120.99, '2022-10-10 03:00:00', 2),
(18, 'eletricista', 325.00, '2022-10-21 03:00:00', 3),
(19, 'manutenção do portão', 115.00, '2022-10-28 03:00:00', 3),
(20, 'materiais de limpeza', 158.63, '2022-10-27 03:00:00', 5),
(23, 'honorários do escritório', 300.00, '2022-10-03 03:00:00', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `imoveis`
--

CREATE TABLE `imoveis` (
  `id_imovel` int(11) NOT NULL,
  `numero_imovel` int(11) NOT NULL,
  `id_bloco_fk` int(11) NOT NULL,
  `id_situacao_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `imoveis`
--

INSERT INTO `imoveis` (`id_imovel`, `numero_imovel`, `id_bloco_fk`, `id_situacao_fk`) VALUES
(78, 1, 7, 0),
(82, 1, 7, 1),
(83, 2, 7, 1),
(84, 3, 7, 1),
(85, 4, 7, 1),
(86, 5, 7, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `locais`
--

CREATE TABLE `locais` (
  `id_local` int(11) NOT NULL,
  `nome_local` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `locais`
--

INSERT INTO `locais` (`id_local`, `nome_local`) VALUES
(27, 'Salão'),
(29, 'quadra'),
(32, 'Área de Churrasco ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mural_de_recados`
--

CREATE TABLE `mural_de_recados` (
  `id_recado` int(11) NOT NULL,
  `id_usuario_fk` int(11) NOT NULL,
  `descricao_recado` varchar(300) NOT NULL,
  `data_recado` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tipo_recado_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `mural_de_recados`
--

INSERT INTO `mural_de_recados` (`id_recado`, `id_usuario_fk`, `descricao_recado`, `data_recado`, `tipo_recado_fk`) VALUES
(56, 52, 'Amanhã será realizada limpeza no estacionamento, das 11:00 as 13:30', '2022-10-05 03:40:16', 1),
(57, 61, 'Foi encontrado uma chave de carro, deixei com o porteiro ontem', '2022-10-05 03:41:11', 1),
(60, 52, 'Lembrando que na próxima segunda haverá reunião', '2022-10-05 03:50:34', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `situacoes_imoveis`
--

CREATE TABLE `situacoes_imoveis` (
  `id_situacao_imovel` int(11) NOT NULL,
  `situacao_imovel` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `situacoes_imoveis`
--

INSERT INTO `situacoes_imoveis` (`id_situacao_imovel`, `situacao_imovel`) VALUES
(1, 'Alugado'),
(2, 'Disponível Para Alugar'),
(3, 'A Venda'),
(4, 'Indisponivel'),
(5, 'Possui Proprietário');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipos_recados`
--

CREATE TABLE `tipos_recados` (
  `id_tipo_recado` int(11) NOT NULL,
  `tipo_recado` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tipos_recados`
--

INSERT INTO `tipos_recados` (`id_tipo_recado`, `tipo_recado`) VALUES
(1, 'Aviso'),
(2, 'Recado'),
(3, 'Reclamação');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipos_usuarios`
--

CREATE TABLE `tipos_usuarios` (
  `id_tipo_usuario` int(11) NOT NULL,
  `tipo_usuario` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tipos_usuarios`
--

INSERT INTO `tipos_usuarios` (`id_tipo_usuario`, `tipo_usuario`) VALUES
(1, 'Proprietário'),
(2, 'Inquilino'),
(3, 'Síndico');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(80) NOT NULL,
  `telefone_usuario` varchar(14) NOT NULL,
  `email_usuario` varchar(50) NOT NULL,
  `tipo_usuario_fk` varchar(12) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `id_imovel_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nome_usuario`, `telefone_usuario`, `email_usuario`, `tipo_usuario_fk`, `senha`, `id_imovel_fk`) VALUES
(52, 'Rafael Donizeti dos Santos Druzian', '999999', 'rafadruzian@gmail.com', '3', '1234', 56),
(61, 'Rogério Fernandes', '999999', 'salve@gmail.com', '1', '1234', 65),
(62, 'Joaquim Osvaldo de Oliveira', '88888888', 'jqer@gmail.com', '1', '1234', 56),
(63, 'baby jhon', 'aaaaaaaaa', 'salve@gmail.com', '1', '777', 77);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `agendamentos`
--
ALTER TABLE `agendamentos`
  ADD PRIMARY KEY (`id_agendamento`);

--
-- Índices para tabela `blocos`
--
ALTER TABLE `blocos`
  ADD PRIMARY KEY (`id_bloco`);

--
-- Índices para tabela `contas`
--
ALTER TABLE `contas`
  ADD PRIMARY KEY (`id_conta`);

--
-- Índices para tabela `despesas`
--
ALTER TABLE `despesas`
  ADD PRIMARY KEY (`id_despesa`);

--
-- Índices para tabela `imoveis`
--
ALTER TABLE `imoveis`
  ADD PRIMARY KEY (`id_imovel`);

--
-- Índices para tabela `locais`
--
ALTER TABLE `locais`
  ADD PRIMARY KEY (`id_local`);

--
-- Índices para tabela `mural_de_recados`
--
ALTER TABLE `mural_de_recados`
  ADD PRIMARY KEY (`id_recado`);

--
-- Índices para tabela `situacoes_imoveis`
--
ALTER TABLE `situacoes_imoveis`
  ADD PRIMARY KEY (`id_situacao_imovel`);

--
-- Índices para tabela `tipos_recados`
--
ALTER TABLE `tipos_recados`
  ADD PRIMARY KEY (`id_tipo_recado`);

--
-- Índices para tabela `tipos_usuarios`
--
ALTER TABLE `tipos_usuarios`
  ADD PRIMARY KEY (`id_tipo_usuario`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `agendamentos`
--
ALTER TABLE `agendamentos`
  MODIFY `id_agendamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT de tabela `blocos`
--
ALTER TABLE `blocos`
  MODIFY `id_bloco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `contas`
--
ALTER TABLE `contas`
  MODIFY `id_conta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `despesas`
--
ALTER TABLE `despesas`
  MODIFY `id_despesa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `imoveis`
--
ALTER TABLE `imoveis`
  MODIFY `id_imovel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT de tabela `locais`
--
ALTER TABLE `locais`
  MODIFY `id_local` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de tabela `mural_de_recados`
--
ALTER TABLE `mural_de_recados`
  MODIFY `id_recado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de tabela `situacoes_imoveis`
--
ALTER TABLE `situacoes_imoveis`
  MODIFY `id_situacao_imovel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tipos_recados`
--
ALTER TABLE `tipos_recados`
  MODIFY `id_tipo_recado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tipos_usuarios`
--
ALTER TABLE `tipos_usuarios`
  MODIFY `id_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
