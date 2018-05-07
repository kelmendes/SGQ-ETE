-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 07-Maio-2018 às 20:00
-- Versão do servidor: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teste2`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `prova_questoes_selecionadas`
--

CREATE TABLE `prova_questoes_selecionadas` (
  `prova_questoes_selecionadas_user_id` int(11) NOT NULL,
  `prova_questoes_selecionadas_disciplina_assunto_questao_id` int(11) NOT NULL,
  `prova_questoes_selecionadas_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `prova_questoes_selecionadas`
--
ALTER TABLE `prova_questoes_selecionadas`
  ADD PRIMARY KEY (`prova_questoes_selecionadas_id`),
  ADD KEY `prova_questoes_selecionadas_user_id` (`prova_questoes_selecionadas_user_id`),
  ADD KEY `prova_questoes_selecionadas_disciplina_assunto_questao_id` (`prova_questoes_selecionadas_disciplina_assunto_questao_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `prova_questoes_selecionadas`
--
ALTER TABLE `prova_questoes_selecionadas`
  MODIFY `prova_questoes_selecionadas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `prova_questoes_selecionadas`
--
ALTER TABLE `prova_questoes_selecionadas`
  ADD CONSTRAINT `prova_questoes_selecionadas_ibfk_1` FOREIGN KEY (`prova_questoes_selecionadas_user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `prova_questoes_selecionadas_ibfk_2` FOREIGN KEY (`prova_questoes_selecionadas_disciplina_assunto_questao_id`) REFERENCES `disciplina_assunto_questao` (`disciplina_assunto_questao_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
