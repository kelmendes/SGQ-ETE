-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 02-Abr-2018 às 02:46
-- Versão do servidor: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ete_pi1`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplina`
--

CREATE TABLE `disciplina` (
  `disciplina_id` int(11) NOT NULL,
  `disciplina_codigo` varchar(11) NOT NULL,
  `disciplina_nome` varchar(70) NOT NULL,
  `disciplina_nome_abreviacao` varchar(15) NOT NULL,
  `disciplina_create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `disciplina_update_atdisciplina_update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `disciplina`
--

INSERT INTO `disciplina` (`disciplina_id`, `disciplina_codigo`, `disciplina_nome`, `disciplina_nome_abreviacao`, `disciplina_create_at`, `disciplina_update_atdisciplina_update_at`) VALUES
(1, '24AB35', 'TESTE DISCIPLINA 01', 'TD01', '2018-03-26 13:49:41', NULL),
(2, '02AB36', 'TESTE DISCIPLINA 02', 'TD0236', '2018-03-26 13:56:42', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplina_assunto`
--

CREATE TABLE `disciplina_assunto` (
  `disciplina_assunto_id_disciplina` int(11) NOT NULL,
  `disciplina_assunto_id` int(11) NOT NULL,
  `disciplina_assunto_nome` varchar(50) NOT NULL,
  `disciplina_assunto_create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `disciplina_assunto_update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `disciplina_assunto`
--

INSERT INTO `disciplina_assunto` (`disciplina_assunto_id_disciplina`, `disciplina_assunto_id`, `disciplina_assunto_nome`, `disciplina_assunto_create_at`, `disciplina_assunto_update_at`) VALUES
(1, 1, 'Outro', '2018-03-27 13:57:24', NULL),
(2, 2, 'Outro', '2018-03-27 13:57:24', NULL),
(1, 3, 'Teste Assunto', '2018-03-27 14:16:24', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplina_assunto_questao`
--

CREATE TABLE `disciplina_assunto_questao` (
  `disciplina_assunto_questao_id_assunto` int(11) NOT NULL,
  `disciplina_assunto_questao_id` int(11) NOT NULL,
  `disciplina_assunto_questao_nome` varchar(50) NOT NULL,
  `disciplina_assunto_questao_pergunta` varchar(500) NOT NULL,
  `disciplina_assunto_questao_creat_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `disciplina_assunto_questao_update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `disciplina_assunto_questao`
--

INSERT INTO `disciplina_assunto_questao` (`disciplina_assunto_questao_id_assunto`, `disciplina_assunto_questao_id`, `disciplina_assunto_questao_nome`, `disciplina_assunto_questao_pergunta`, `disciplina_assunto_questao_creat_at`, `disciplina_assunto_questao_update_at`) VALUES
(1, 1, 'TESTE PRIMEIRA QUESTÃO', 'TESTE PERGUNTA PRIMEIRA QUESTÃO ', '2018-03-27 14:34:24', NULL),
(2, 2, 'TESTE SEGUNDA QUESTAÃO ', 'TEXTO PERGUNTA SEGUNDA QUESTÃO', '2018-03-27 14:34:24', NULL),
(3, 3, 'TESTE TERCEIRA QUESTÃO ', 'TEXTO DA TERCEIRA QUESTÃO ', '2018-03-27 14:35:09', NULL),
(2, 4, 'TESTE QUARTA QUESTÃO', 'TEXTO DA QUARTA QUESTÃO', '2018-03-27 14:35:09', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_matricula` varchar(11) NOT NULL,
  `user_nome` varchar(60) NOT NULL,
  `user_email` varchar(100) DEFAULT NULL,
  `user_senha` varchar(100) NOT NULL,
  `user_role` smallint(1) NOT NULL,
  `user_create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_update_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`user_id`, `user_matricula`, `user_nome`, `user_email`, `user_senha`, `user_role`, `user_create_at`, `user_update_at`) VALUES
(1, '20181234', 'Teste Nome', 'teste@ete.com.br', 'b81763710aa4f3e844f296bbbd8958bb', 1, '2018-02-28 21:19:19', '2018-04-01 21:45:55'),
(3, '20184321', 'KLEBSON MENDES DE ARAUJO', 'klerbersonmendes@gmail.com', 'a7227caec2597153ae5a84d3c775e790', 2, '2018-04-01 21:35:47', '2018-04-01 21:43:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `disciplina`
--
ALTER TABLE `disciplina`
  ADD PRIMARY KEY (`disciplina_id`),
  ADD UNIQUE KEY `disciplina_codigo` (`disciplina_codigo`);

--
-- Indexes for table `disciplina_assunto`
--
ALTER TABLE `disciplina_assunto`
  ADD PRIMARY KEY (`disciplina_assunto_id`),
  ADD KEY `disciplina_assunto_id_disciplina` (`disciplina_assunto_id_disciplina`);

--
-- Indexes for table `disciplina_assunto_questao`
--
ALTER TABLE `disciplina_assunto_questao`
  ADD PRIMARY KEY (`disciplina_assunto_questao_id`),
  ADD KEY `disciplina_assunto_questao_id_assunto` (`disciplina_assunto_questao_id_assunto`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`,`user_matricula`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `disciplina`
--
ALTER TABLE `disciplina`
  MODIFY `disciplina_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `disciplina_assunto`
--
ALTER TABLE `disciplina_assunto`
  MODIFY `disciplina_assunto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `disciplina_assunto_questao`
--
ALTER TABLE `disciplina_assunto_questao`
  MODIFY `disciplina_assunto_questao_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `disciplina_assunto`
--
ALTER TABLE `disciplina_assunto`
  ADD CONSTRAINT `disciplina_assunto_ibfk_1` FOREIGN KEY (`disciplina_assunto_id_disciplina`) REFERENCES `disciplina` (`disciplina_id`);

--
-- Limitadores para a tabela `disciplina_assunto_questao`
--
ALTER TABLE `disciplina_assunto_questao`
  ADD CONSTRAINT `disciplina_assunto_questao_ibfk_1` FOREIGN KEY (`disciplina_assunto_questao_id_assunto`) REFERENCES `disciplina_assunto` (`disciplina_assunto_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
