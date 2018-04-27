<?php
	// ADICIONANDO ARQUIVO QUE MANTEM DADOS PARA CONEXÃO COM O BANCO DE DADOS 
	include 'configdb.php';

	/**
	* ARQUIVO PARA SE CONECTAR COM O BANCO DE DADOS 
	*/
	class Questões extends Configdb
	{
		// VARIAVEL PARA SE MANTER A CONEXÃO COM O DB
		var $conn;
		
		function __construct()
		{
			$this->conn = new PDO('mysql:host='.$this->host.';dbname='.$this->dbname, $this->user, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
		}

		// FUNCTION PARA PEGAR INFORMACOES QUE SAO EXIBIDAS NA PAGINA  
		function getInfoAssunto($disciplina_assunto_id){
			$star = $this->conn->prepare("
				SELECT
				    S.disciplina_assunto_nome,
				    S.disciplina_assunto_id_disciplina,
				    S.disciplina_assunto_id,
				    A.disciplina_nome_abreviacao,
				    A.disciplina_id,
				    A.disciplina_nome
				FROM
				    disciplina_assunto AS S 
				INNER JOIN 
					disciplina AS A
				ON 
					A.disciplina_id = S.disciplina_assunto_id_disciplina
				WHERE
					S.disciplina_assunto_id = :disciplina_assunto_id
			");

			$star->bindValue(":disciplina_assunto_id", $disciplina_assunto_id, PDO::PARAM_INT);
			$run = $star->execute();
			$rs = $star->fetch(PDO::FETCH_ASSOC);
			return $rs;
		}


		function getQuestoes($disciplina_assunto_id){
			$star = $this->conn->prepare("
				SELECT 
					*
				FROM 
					disciplina_assunto_questao
				WHERE
					disciplina_assunto_questao_id_assunto = :disciplina_assunto_id
				");	
			$star->bindValue(":disciplina_assunto_id", $disciplina_assunto_id, PDO::PARAM_INT);
			$run = $star->execute();
			return $star;

		}
	}


?>