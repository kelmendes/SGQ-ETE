<?php
	// ADICIONANDO ARQUIVO QUE MANTEM DADOS PARA CONEXÃO COM O BANCO DE DADOS 
	include 'configdb.php';

	/**
	* ARQUIVO PARA SE CONECTAR COM O BANCO DE DADOS 
	*/
	class Disciplina extends Configdb
	{
		// VARIAVEL PARA SE MANTER A CONEXÃO COM O DB
		var $conn;
		
		function __construct()
		{
			$this->conn = new PDO('mysql:host='.$this->host.';dbname='.$this->dbname, $this->user, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
		}

		// FUNCTION PARA LISTAR DISCIPLINAS 
		function listDisciplinas(){
			$star = $this->conn->prepare("
				SELECT
				    A.disciplina_id,
				    A.disciplina_codigo,
				    A.disciplina_nome,
				    (SELECT COUNT(*) 
				     FROM disciplina_assunto
				     WHERE disciplina_assunto_id_disciplina = A.disciplina_id ) AS disciplina_total_assunto
				FROM
				    disciplina AS A
			    ORDER BY disciplina_nome");

			$run = $star->execute();
			return $star;
		}


		// FUNCTION PARA CADASTRAR DISCIPLINA 
		function newDisciplinas($disciplina_codigo, $disciplina_nome, $disciplina_nome_abreviacao){
			$star = $this->conn->prepare("
				INSERT INTO `disciplina`(
					    `disciplina_codigo`,
					    `disciplina_nome`,
					    `disciplina_nome_abreviacao`,
					    `disciplina_create_at`,
					)VALUES(
					    :disciplina_codigo,
					    :disciplina_nome,
					    :disciplina_nome_abreviacao,
					    CURRENT_TIMESTAMP(),
					");
			$star->bindValue(":disciplina_codigo", $disciplina_codigo, PDO::PARAM_STR);
			$star->bindValue(":disciplina_nome", $disciplina_nome, PDO::PARAM_STR);
			$star->bindValue(":disciplina_nome_abreviacao", $disciplina_nome_abreviacao, PDO::PARAM_STR);

			$run = $star->execute();
			return $star;
		}


	}


?>