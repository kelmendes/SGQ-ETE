-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: testep1.mysql.dbaas.com.br
-- Generation Time: 07-Maio-2018 às 15:19
-- Versão do servidor: 5.6.35-81.0-log
-- PHP Version: 5.6.30-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testep1`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplina_assunto_questao_mutipla_escolha`
--

CREATE TABLE `disciplina_assunto_questao_mutipla_escolha` (
  `disciplina_assunto_questao_id` int(11) NOT NULL,
  `disciplina_assunto_questao_mutipla_escolha_id` int(11) NOT NULL,
  `disciplina_assunto_questao_mutipla_escolha_text` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `disciplina_assunto_questao_mutipla_escolha`
--

INSERT INTO `disciplina_assunto_questao_mutipla_escolha` (`disciplina_assunto_questao_id`, `disciplina_assunto_questao_mutipla_escolha_id`, `disciplina_assunto_questao_mutipla_escolha_text`) VALUES
(5, 5, 'APENAS 3'),
(5, 6, 'APENAS 4'),
(5, 7, 'APENAS 5'),
(5, 8, 'APENAS 7'),
(5, 9, 'APENAS 6'),
(9, 10, 'APLICAÇÃO'),
(9, 11, 'COMUNICAÇÃO '),
(9, 12, 'FÍSICA'),
(9, 13, 'REDE'),
(9, 14, 'TRASPORTE'),
(9, 15, 'ENLACE'),
(9, 16, 'APRESENTAÇÃO'),
(9, 17, 'SESSÃO ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `disciplina_assunto_questao_mutipla_escolha`
--
ALTER TABLE `disciplina_assunto_questao_mutipla_escolha`
  ADD PRIMARY KEY (`disciplina_assunto_questao_mutipla_escolha_id`),
  ADD KEY `disciplina_assunto_questao_id` (`disciplina_assunto_questao_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `disciplina_assunto_questao_mutipla_escolha`
--
ALTER TABLE `disciplina_assunto_questao_mutipla_escolha`
  MODIFY `disciplina_assunto_questao_mutipla_escolha_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `disciplina_assunto_questao_mutipla_escolha`
--
ALTER TABLE `disciplina_assunto_questao_mutipla_escolha`
  ADD CONSTRAINT `disciplina_assunto_questao_mutipla_escolha_ibfk_1` FOREIGN KEY (`disciplina_assunto_questao_id`) REFERENCES `disciplina_assunto_questao` (`disciplina_assunto_questao_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
