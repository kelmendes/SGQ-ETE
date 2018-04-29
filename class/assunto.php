<?php
	// ADICIONANDO ARQUIVO QUE MANTEM DADOS PARA CONEXÃO COM O BANCO DE DADOS 
	include 'configdb.php';

	/**
	* ARQUIVO PARA SE CONECTAR COM O BANCO DE DADOS 
	*/
	class Assunto extends Configdb
	{

		var $conn;


		function __construct()
		{
			$this->conn = new PDO('mysql:host='.$this->host.';dbname='.$this->dbname, $this->user, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
		}
		

		// FUNCTION PARA PEGAR INFORMACOES QUE SAO EXIBIDAS NA PAGINA  
		function getInfoDisciplina($disciplina_assunto){
			$star = $this->conn->prepare("
				SELECT
				    A.disciplina_nome,
				    A.disciplina_codigo,
				    A.disciplina_nome_abreviacao
				FROM
				    disciplina AS A 
				WHERE
					A.disciplina_id = :disciplina_assunto
				");

			$star->bindValue(":disciplina_assunto", $disciplina_assunto, PDO::PARAM_INT);
			$run = $star->execute();
			$rs = $star->fetch(PDO::FETCH_ASSOC);
			return $rs;
		}


		// FUNCTION PARA LISTAR TODAS OS ASSUNTOS DE UMA DETERMINADA DISCIPLINA 
		function listAssuntos($disciplina_assunto){
			$star = $this->conn->prepare("
				SELECT
				    S.disciplina_assunto_id,
				    S.disciplina_assunto_nome,
				    (SELECT COUNT(*) 
				     FROM disciplina_assunto_questao
				     WHERE 	disciplina_assunto_questao_id_assunto = S.disciplina_assunto_id ) AS assunto_total_questoes
				FROM
				    disciplina_assunto AS S
				WHERE
					S.disciplina_assunto_id_disciplina = :disciplina_assunto
			    ORDER BY
			    	disciplina_assunto_nome");

			$star->bindValue(":disciplina_assunto", $disciplina_assunto, PDO::PARAM_INT);
			$run = $star->execute();
			return $star;
		}

		function newAssunto($disciplina_assunto_id_disciplina, $disciplina_assunto_nome){
			$star = $this->conn->prepare("
				INSERT INTO `disciplina_assunto`(
				    `disciplina_assunto_id_disciplina`,
				    `disciplina_assunto_nome`,
				    `disciplina_assunto_create_at`
				)
				VALUES( 
					:disciplina_assunto_id_disciplina ,
				    :disciplina_assunto_nome ,
				    CURRENT_TIMESTAMP() )");

			$star->bindValue(":disciplina_assunto_id_disciplina", $disciplina_assunto_id_disciplina);
			$star->bindValue(":disciplina_assunto_nome", $disciplina_assunto_nome);
			$run = $star->execute();
			return $run;

		}


	}


?>