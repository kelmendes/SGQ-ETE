-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: testep1.mysql.dbaas.com.br
-- Generation Time: 07-Maio-2018 às 15:28
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
(1, 4, 'Modelos de elaboração de projetos ', '2018-04-04 16:29:20', NULL),
(1, 5, 'Elaboração de projetos ', '2018-04-04 16:29:20', NULL),
(1, 6, 'Etapas de execução do projeto ', '2018-04-04 16:29:42', NULL),
(1, 7, 'Finalizar de projetos', '2018-04-04 16:29:42', NULL),
(2, 8, 'Modelos de elaboração de projetos ', '2018-04-04 16:32:22', NULL),
(2, 9, 'Elaboração de projetos ', '2018-04-04 16:32:22', NULL),
(2, 10, 'Etapas de execução do projeto ', '2018-04-04 16:32:50', NULL),
(2, 11, 'Finalização de um projeto ', '2018-04-04 16:32:50', NULL),
(3, 12, 'Introdução à orientação a objetos', '2018-04-04 16:34:56', NULL),
(3, 13, 'Classes e objetos', '2018-04-04 16:34:56', NULL),
(3, 14, 'Atributos e métodos', '2018-04-04 16:37:03', NULL),
(3, 15, 'Abstração e encapsulamento', '2018-04-04 16:37:03', NULL),
(3, 16, 'Interfaces e classes abstratas', '2018-04-04 16:37:03', NULL),
(3, 17, 'Relacionamento entre objetos', '2018-04-04 16:37:03', NULL),
(3, 18, 'Herança, dynamic binding e polimorfismo', '2018-04-04 16:37:03', NULL),
(3, 19, 'Construtores', '2018-04-04 16:37:03', NULL),
(3, 20, 'Listas', '2018-04-04 16:37:03', NULL),
(3, 21, 'Recursividade', '2018-04-04 16:37:03', NULL),
(3, 22, 'Métodos de ordenação', '2018-04-04 16:37:03', NULL),
(4, 23, ' Camadas do modelo Internet', '2018-04-04 16:41:30', NULL),
(4, 24, ' Protocolos e Serviços', '2018-04-04 16:41:30', NULL),
(4, 25, 'Características do Protocolo IP', '2018-04-04 16:41:30', NULL),
(4, 26, 'Endereçamento IP', '2018-04-04 16:41:30', NULL),
(4, 27, 'Protocolos', '2018-04-04 16:41:30', NULL),
(4, 28, 'Serviços da Internet', '2018-04-04 16:41:30', NULL),
(4, 29, 'E-mail e seus principais protocolos', '2018-04-04 16:41:30', NULL),
(4, 30, 'Transferir arquivos', '2018-04-04 16:41:30', NULL),
(4, 31, 'Funcionamento da Web', '2018-04-04 16:41:30', NULL),
(4, 32, 'Gerenciamento de Redes', '2018-04-04 16:41:30', NULL),
(4, 33, 'Segurança de Redes', '2018-04-04 16:41:30', NULL),
(5, 34, 'Outro', '2018-04-04 20:28:41', NULL),
(5, 35, 'Skimming', '2018-04-04 20:28:41', NULL),
(5, 36, 'Scanning', '2018-04-04 20:28:41', NULL),
(5, 37, 'Brainstorming', '2018-04-04 20:28:41', NULL),
(5, 38, 'Referência Contextual (pronomes)', '2018-04-04 20:28:41', NULL),
(5, 39, 'Verbos Irregulares', '2018-04-04 20:28:41', NULL),
(5, 40, 'Terminação ED', '2018-04-04 20:28:41', NULL),
(5, 41, 'Tradução', '2018-04-04 20:28:41', NULL),
(5, 42, 'Conhecimento Prévio', '2018-04-04 20:28:41', NULL),
(6, 43, 'Instalação do Sistema Operacional', '2018-04-04 20:34:04', NULL),
(6, 44, 'Componentes da arquitetura Linux', '2018-04-04 20:34:04', NULL),
(6, 45, 'Manipular o siste ma de arquivos ext4', '2018-04-04 20:34:04', NULL),
(6, 46, 'Gerenciamento de usuários do sistema', '2018-04-04 20:34:04', NULL),
(6, 47, 'Gerenciador Avançado de Pacotes (DPKG)', '2018-04-04 20:34:04', NULL),
(6, 48, 'Criação de Shell Script', '2018-04-04 20:34:04', NULL),
(6, 49, 'Conceitos de Sistemas de Arquivos Unix', '2018-04-04 20:34:04', NULL),
(6, 50, 'Arquivos', '2018-04-04 20:34:04', NULL),
(6, 51, 'O Sistema Cron', '2018-04-04 20:34:04', NULL),
(6, 52, 'Monitoramento da Rede', '2018-04-04 20:34:04', NULL),
(7, 53, 'Outro', '2018-05-02 14:41:12', NULL),
(7, 54, 'Introdução ', '2018-05-02 14:41:21', NULL),
(7, 55, 'Conceitos Básicos HTML', '2018-05-02 14:41:37', NULL),
(7, 56, 'Principais Tags', '2018-05-02 14:41:48', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `disciplina_assunto`
--
ALTER TABLE `disciplina_assunto`
  ADD PRIMARY KEY (`disciplina_assunto_id`),
  ADD KEY `disciplina_assunto_id_disciplina` (`disciplina_assunto_id_disciplina`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `disciplina_assunto`
--
ALTER TABLE `disciplina_assunto`
  MODIFY `disciplina_assunto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `disciplina_assunto`
--
ALTER TABLE `disciplina_assunto`
  ADD CONSTRAINT `disciplina_assunto_ibfk_1` FOREIGN KEY (`disciplina_assunto_id_disciplina`) REFERENCES `disciplina` (`disciplina_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
