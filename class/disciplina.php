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
			$this->conn = new PDO('mysql:host='.$this->host.';dbname='.$this->dbname, $this->user, $this->password);
		}

		// FUNCTION PARA LISTAR OS USUARIOS 
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


	}


?>