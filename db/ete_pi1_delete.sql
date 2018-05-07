-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: testep1.mysql.dbaas.com.br
-- Generation Time: 07-Maio-2018 às 15:43
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
(1, 'PI', 'PROJETO INTEGRADOR 1', 'PI', '2018-03-26 13:49:41', NULL),
(2, 'PII', 'PROJETO INTEGRADOR 2', 'PII', '2018-03-26 13:56:42', NULL),
(3, 'POO', 'Programação Orientada a Objetos', 'POO', '2018-04-04 16:34:05', NULL),
(4, 'RDC', 'REDES DE COMPUTADORES', 'RC', '2018-04-04 16:39:02', NULL),
(5, 'IG', 'INGLÊS TÉCNICO', 'IG', '2018-04-04 20:26:21', NULL),
(6, 'SOL', 'SISTEMAS OPERACIONAIS LIVRES', 'SOL', '2018-04-04 20:30:19', NULL),
(7, 'WEB20171', 'Desenvolvimento WEB ', 'DWB', '2018-05-02 14:41:02', NULL);

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

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplina_assunto_questao`
--

CREATE TABLE `disciplina_assunto_questao` (
  `disciplina_assunto_questao_id_assunto` int(11) NOT NULL,
  `disciplina_assunto_questao_id` int(11) NOT NULL,
  `disciplina_assunto_questao_nome` varchar(50) NOT NULL,
  `disciplina_assunto_questao_pergunta` varchar(500) NOT NULL,
  `disciplina_assunto_questao_mutipla_escolha` smallint(1) NOT NULL,
  `disciplina_assunto_questao_creat_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `disciplina_assunto_questao_update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `disciplina_assunto_questao`
--

INSERT INTO `disciplina_assunto_questao` (`disciplina_assunto_questao_id_assunto`, `disciplina_assunto_questao_id`, `disciplina_assunto_questao_nome`, `disciplina_assunto_questao_pergunta`, `disciplina_assunto_questao_mutipla_escolha`, `disciplina_assunto_questao_creat_at`, `disciplina_assunto_questao_update_at`) VALUES
(23, 5, 'Camadas Modelo OSI', 'Em quantas camadas se divide o modelo de referência OSI?', 1, '2018-04-04 16:46:08', NULL),
(23, 6, 'O QUE É REDES DE COMPUTADORES', 'O que é uma rede de computadores?', 0, '2018-04-04 16:46:08', NULL),
(23, 7, ' LAN, MAN, WAN', 'Quanto à dispersão geográfica como são classificadas as redes de computadores?', 0, '2018-04-04 16:46:08', NULL),
(23, 8, 'CAMDAS DO MODELO OSI', 'Explique cada camada do modelo osi.', 0, '2018-05-02 14:38:50', NULL),
(23, 9, 'Camadas que pertence ao TCP/IP', 'Qual das camadas abaixo não faz parte do modelo OSI?', 1, '2018-05-02 14:39:52', NULL),
(56, 10, 'Niveis de títulos ', 'Em quantos nivéis de título existe no html por padrão, e qual tag é utilizada para fazer um título de 1(primeiro) nível.', 1, '2018-05-02 14:43:25', NULL),
(55, 11, 'Importancia identação', 'Qual a principal função da identação e cometarios?', 0, '2018-05-02 16:11:48', NULL);

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
-- Extraindo dados da tabela `prova_questoes_selecionadas`
--

INSERT INTO `prova_questoes_selecionadas` (`prova_questoes_selecionadas_user_id`, `prova_questoes_selecionadas_disciplina_assunto_questao_id`, `prova_questoes_selecionadas_id`) VALUES
(3, 6, 31),
(3, 9, 32),
(3, 5, 33);

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
-- Indexes for table `disciplina_assunto_questao_mutipla_escolha`
--
ALTER TABLE `disciplina_assunto_questao_mutipla_escolha`
  ADD PRIMARY KEY (`disciplina_assunto_questao_mutipla_escolha_id`),
  ADD KEY `disciplina_assunto_questao_id` (`disciplina_assunto_questao_id`);

--
-- Indexes for table `prova_questoes_selecionadas`
--
ALTER TABLE `prova_questoes_selecionadas`
  ADD PRIMARY KEY (`prova_questoes_selecionadas_id`),
  ADD KEY `prova_questoes_selecionadas_user_id` (`prova_questoes_selecionadas_user_id`),
  ADD KEY `prova_questoes_selecionadas_disciplina_assunto_questao_id` (`prova_questoes_selecionadas_disciplina_assunto_questao_id`);

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
  MODIFY `disciplina_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `disciplina_assunto`
--
ALTER TABLE `disciplina_assunto`
  MODIFY `disciplina_assunto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `disciplina_assunto_questao`
--
ALTER TABLE `disciplina_assunto_questao`
  MODIFY `disciplina_assunto_questao_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `disciplina_assunto_questao_mutipla_escolha`
--
ALTER TABLE `disciplina_assunto_questao_mutipla_escolha`
  MODIFY `disciplina_assunto_questao_mutipla_escolha_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `prova_questoes_selecionadas`
--
ALTER TABLE `prova_questoes_selecionadas`
  MODIFY `prova_questoes_selecionadas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

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
  ADD CONSTRAINT `disciplina_assunto_ibfk_1` FOREIGN KEY (`disciplina_assunto_id_disciplina`) REFERENCES `disciplina` (`disciplina_id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `disciplina_assunto_questao`
--
ALTER TABLE `disciplina_assunto_questao`
  ADD CONSTRAINT `disciplina_assunto_questao_ibfk_1` FOREIGN KEY (`disciplina_assunto_questao_id_assunto`) REFERENCES `disciplina_assunto` (`disciplina_assunto_id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `disciplina_assunto_questao_mutipla_escolha`
--
ALTER TABLE `disciplina_assunto_questao_mutipla_escolha`
  ADD CONSTRAINT `disciplina_assunto_questao_mutipla_escolha_ibfk_1` FOREIGN KEY (`disciplina_assunto_questao_id`) REFERENCES `disciplina_assunto_questao` (`disciplina_assunto_questao_id`) ON DELETE CASCADE;

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
