-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Maio-2023 às 23:56
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `proj_senac`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `acess_logs`
--

CREATE TABLE `acess_logs` (
  `log` int(11) NOT NULL,
  `way` varchar(3) DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL,
  `acess_date` date DEFAULT NULL,
  `acess_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `acess_logs`
--

INSERT INTO `acess_logs` (`log`, `way`, `usuario`, `acess_date`, `acess_time`) VALUES
(1, 'IN', 1, '2023-04-17', '11:46:26'),
(2, 'OUT', 1, '2023-04-17', '11:46:29'),
(3, 'IN', 1, '2023-04-17', '11:47:24'),
(4, 'OUT', 1, '2023-04-17', '11:47:36'),
(5, 'IN', 1, '2023-04-17', '11:47:53'),
(7, 'IN', 1, '2023-04-17', '11:50:57'),
(9, 'IN', 1, '2023-04-17', '11:52:34'),
(11, 'IN', 1, '2023-04-17', '12:08:17'),
(12, 'OUT', 1, '2023-04-17', '12:10:16'),
(13, 'IN', 1, '2023-04-17', '12:11:37'),
(14, 'OUT', 1, '2023-04-17', '12:12:07'),
(15, 'IN', 1, '2023-05-05', '19:21:37'),
(16, 'OUT', 1, '2023-05-05', '19:34:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `chaves`
--

CREATE TABLE `chaves` (
  `id_chave` int(11) NOT NULL,
  `chave` varchar(8) DEFAULT NULL,
  `pesquisa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `chaves`
--

INSERT INTO `chaves` (`id_chave`, `chave`, `pesquisa`) VALUES
(1, '12345678', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresas`
--

CREATE TABLE `empresas` (
  `id_emp` int(11) NOT NULL,
  `razao` varchar(200) NOT NULL,
  `fantasia` varchar(200) NOT NULL,
  `status_emp` varchar(1) NOT NULL,
  `doc` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `empresas`
--

INSERT INTO `empresas` (`id_emp`, `razao`, `fantasia`, `status_emp`, `doc`) VALUES
(1, 'Athos clima organizacional LTDA', 'Athos RH', 'A', '13.043.813/0001-00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `emp_user`
--

CREATE TABLE `emp_user` (
  `emp_user_id` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `empresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `emp_user`
--

INSERT INTO `emp_user` (`emp_user_id`, `usuario`, `empresa`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens_pesq`
--

CREATE TABLE `itens_pesq` (
  `id_item` int(11) NOT NULL,
  `id_pesq` int(11) DEFAULT NULL,
  `id_perg` int(11) DEFAULT NULL,
  `id_option` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `itens_pesq`
--

INSERT INTO `itens_pesq` (`id_item`, `id_pesq`, `id_perg`, `id_option`) VALUES
(1, 1, 4, 61),
(2, 1, 4, 62),
(3, 1, 2, 61),
(4, 1, 2, 62),
(5, 1, 2, 67);

-- --------------------------------------------------------

--
-- Estrutura da tabela `options`
--

CREATE TABLE `options` (
  `id_option` int(11) NOT NULL,
  `value_op` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `options`
--

INSERT INTO `options` (`id_option`, `value_op`) VALUES
(57, 'Menos de 1 ano'),
(58, 'De 1 a 3 anos'),
(59, 'De 3 a 5 anos'),
(60, 'Acima de 5 anos'),
(61, 'Sim'),
(62, 'Não'),
(63, 'Excelente'),
(64, 'Bom'),
(65, 'Regular'),
(66, 'Ruim'),
(67, 'As vezes '),
(68, 'Muito satisfeito'),
(69, 'Satisfeito'),
(70, 'Insatisfeito'),
(71, 'Plano de saúde '),
(72, 'Folga no dia do aniversario'),
(73, 'Bolsa de estudos '),
(74, 'Participação nos lucros'),
(75, 'Bônus de participação');

-- --------------------------------------------------------

--
-- Estrutura da tabela `perguntas`
--

CREATE TABLE `perguntas` (
  `id_perg` int(11) NOT NULL,
  `desc_perg` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `perguntas`
--

INSERT INTO `perguntas` (`id_perg`, `desc_perg`) VALUES
(1, 'QUANTO TEMPO DE TRABALHO VOCÊ TEM?'),
(2, 'MINHA OPINIÃO É SOLICITADA PARA A ORGANIZAÇÃO DO TRABALHO?'),
(3, 'COMO VOCÊ AVALIA O RELACIONAMENTO COM SEU GESTOR?'),
(4, 'TENHO CONFIANÇA NAS DECISÕES DO MEU GESTOR ?'),
(5, 'MEU GESTOR REPASSA AS INFORMAÇÕES QUE NECESSITO PARA DESEMPENHAR BEM O MEU TRABALHO?'),
(6, 'RECEBO FEEDBACK A RESPEITO DO MEU DESEMPENHO NO MEU TRABALHO?  '),
(7, 'NAS ULTIMAS DUAS SEMANAS VOCÊ RECEBEU RECONHECIMENTO OU ELOGIO POR FAZER UM BOM TRABALHO?'),
(8, 'O SEU GESTOR DEMONSTRA INTERESSE EM BUSCAR SOLUÇÕES E DAR RETORNO AS SUAS SOLICITAÇÕES ?'),
(9, 'TENHO ABERTURA PARA DISCORDAR DA VISÃO DOS MEUS SUPERIORES SEM MEDO DE REPRESÁLiAS?'),
(10, 'SOU RECONHECIDO PELA CONTRIBUIÇÃO DAS MINHAS ATIVIDADES PARA OS RESULTADOS ALCANÇADOS DA EMPRESA?'),
(11, 'A EMPRESA PROPORCIONA TREINAMENTOS PARA APRIMORAR MEU TRABALHO??'),
(12, 'VOCÊ ACREDITA QUE A EMPRESA SE PREOCUPA COM A QUALIDADE DE VIDA E  O BEM ESTAR DE SEUS COLABORADORES?'),
(13, 'VOCÊ ACHA QUE EMPRESA PAGA SALARIOS COMPATIVEIS COM A DO MERCADO?'),
(14, 'QUAL O SEU NIVEL DE SATISFAÇÃO COM OS BENEFICIOS OFERECIDOS PELA INSTITUIÇÃO?'),
(15, 'VOCÊ TEM OS MATERIAIS NECESSARIO PARA DESEMPENHAR UM BOM TRABALHO?'),
(16, 'COMO VOCÊ AVALIA A PREOCUPAÇÃO DA EMPRESA COM SUA SEGURANÇA NO TRABALHO?'),
(17, 'SINTO-ME BEM INFORMADO SOBRE O QUE ACONTECE NA EMPRESA?'),
(18, 'VOCÊ SE SENTE SATISFEITO EM TRABAHAR NA EMPRESA COM TUDO O QUE LHE É OFERECIDO?'),
(19, 'ENTRE OS BENEFÍCIOS A SEGUIR, QUAL VOCÊ ESCOLHERIA?');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pesquisas`
--

CREATE TABLE `pesquisas` (
  `id_pesq` int(11) NOT NULL,
  `nome_pesq` varchar(200) NOT NULL,
  `data_inicio` date DEFAULT NULL,
  `data_fim` date DEFAULT NULL,
  `empresa` int(11) NOT NULL,
  `populacao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pesquisas`
--

INSERT INTO `pesquisas` (`id_pesq`, `nome_pesq`, `data_inicio`, `data_fim`, `empresa`, `populacao`) VALUES
(1, 'Clima organizacional', '2023-04-16', '2023-04-18', 1, 30);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`user_id`, `name`, `email`, `pass`, `status`) VALUES
(1, 'Davi', 'ddomiccossuol@gmail.com', '85c4a21175d3836db52baa4998c9fcbd', 'A'),
(2, 'Washington', 'dvla2023@hotmail.com', 'fcb18b4be7eabd01e1a915c3961856ba', 'A'),
(3, 'Celio', 'ti@caite.com.br', '81b63be6de6e476664b17e6bf033f669', 'A');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `acess_logs`
--
ALTER TABLE `acess_logs`
  ADD PRIMARY KEY (`log`),
  ADD KEY `FK_UserLog` (`usuario`);

--
-- Índices para tabela `chaves`
--
ALTER TABLE `chaves`
  ADD PRIMARY KEY (`id_chave`),
  ADD KEY `FK_PesqChave` (`pesquisa`);

--
-- Índices para tabela `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id_emp`);

--
-- Índices para tabela `emp_user`
--
ALTER TABLE `emp_user`
  ADD PRIMARY KEY (`emp_user_id`),
  ADD KEY `FK_UserEMP` (`usuario`),
  ADD KEY `FK_EmpUser` (`empresa`);

--
-- Índices para tabela `itens_pesq`
--
ALTER TABLE `itens_pesq`
  ADD PRIMARY KEY (`id_item`),
  ADD KEY `FK_pesqItem` (`id_pesq`),
  ADD KEY `FK_pergItem` (`id_perg`),
  ADD KEY `FK_optItem` (`id_option`);

--
-- Índices para tabela `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id_option`);

--
-- Índices para tabela `perguntas`
--
ALTER TABLE `perguntas`
  ADD PRIMARY KEY (`id_perg`);

--
-- Índices para tabela `pesquisas`
--
ALTER TABLE `pesquisas`
  ADD PRIMARY KEY (`id_pesq`),
  ADD KEY `FK_EmpPesq` (`empresa`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `acess_logs`
--
ALTER TABLE `acess_logs`
  MODIFY `log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `chaves`
--
ALTER TABLE `chaves`
  MODIFY `id_chave` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id_emp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `emp_user`
--
ALTER TABLE `emp_user`
  MODIFY `emp_user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `itens_pesq`
--
ALTER TABLE `itens_pesq`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `options`
--
ALTER TABLE `options`
  MODIFY `id_option` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT de tabela `perguntas`
--
ALTER TABLE `perguntas`
  MODIFY `id_perg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `pesquisas`
--
ALTER TABLE `pesquisas`
  MODIFY `id_pesq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `acess_logs`
--
ALTER TABLE `acess_logs`
  ADD CONSTRAINT `FK_UserLog` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`user_id`);

--
-- Limitadores para a tabela `chaves`
--
ALTER TABLE `chaves`
  ADD CONSTRAINT `FK_PesqChave` FOREIGN KEY (`pesquisa`) REFERENCES `pesquisas` (`id_pesq`);

--
-- Limitadores para a tabela `emp_user`
--
ALTER TABLE `emp_user`
  ADD CONSTRAINT `FK_EmpUser` FOREIGN KEY (`empresa`) REFERENCES `empresas` (`id_emp`),
  ADD CONSTRAINT `FK_UserEMP` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`user_id`);

--
-- Limitadores para a tabela `itens_pesq`
--
ALTER TABLE `itens_pesq`
  ADD CONSTRAINT `FK_optItem` FOREIGN KEY (`id_option`) REFERENCES `options` (`id_option`),
  ADD CONSTRAINT `FK_pergItem` FOREIGN KEY (`id_perg`) REFERENCES `perguntas` (`id_perg`),
  ADD CONSTRAINT `FK_pesqItem` FOREIGN KEY (`id_pesq`) REFERENCES `pesquisas` (`id_pesq`);

--
-- Limitadores para a tabela `pesquisas`
--
ALTER TABLE `pesquisas`
  ADD CONSTRAINT `FK_EmpPesq` FOREIGN KEY (`empresa`) REFERENCES `empresas` (`id_emp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
