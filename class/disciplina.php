<?php
	// ADICIONANDO ARQUIVO QUE MANTEM DADOS PARA CONEXÃO COM O BANCO DE DADOS 
	include 'configdb.php';

	/**
	* ARQUIVO PARA SE CONECTAR COM O BANCO DE DADOS 
	*/
	class Disciplina extends Configdb
	{
		
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
				    A.disciplina_create_at,
				    (SELECT COUNT(*) 
				     FROM disciplina_assunto
				     WHERE disciplina_assunto_id_disciplina = A.disciplina_id ) AS disciplina_total_assunto
				FROM
				    disciplina AS A
			    ORDER BY disciplina_nome");

			$run = $star->execute();
			return $star;
		}
        
        
        
        // FUNCTION PARA LISTAR DISCIPLINAS 
		function listDisciplinasUpdate($id){
			$star = $this->conn->prepare("
				SELECT
				    *
				FROM
				    disciplina AS A
                WHERE 
                    A.disciplina_id = :disciplina_id
			    ");
            
            
            $star->bindValue(":disciplina_id", $id);
        
            $run = $star->execute();
			$rs = $star->fetch(PDO::FETCH_ASSOC);
			return $rs;
		}


		// FUNCTION PARA CADASTRAR DISCIPLINA 
		function newDisciplinas($disciplina_codigo, $disciplina_nome, $disciplina_nome_abreviacao){
			$star = $this->conn->prepare("
				INSERT INTO `disciplina`(
					    `disciplina_codigo`,
					    `disciplina_nome`,
					    `disciplina_nome_abreviacao`,
					    `disciplina_create_at`
					)VALUES(
					    :disciplina_codigo ,
					    :disciplina_nome ,
					    :disciplina_nome_abreviacao ,
					    CURRENT_TIMESTAMP() )
					");

			$star->bindValue(":disciplina_codigo", $disciplina_codigo);
			$star->bindValue(":disciplina_nome", $disciplina_nome);
			$star->bindValue(":disciplina_nome_abreviacao", $disciplina_nome_abreviacao);

			$run = $star->execute();
			return $star;
		}


		// FUNCTION DELETAR UMA DISCIPLINA
		function dropDisciplinas($disciplina_id){
			$star = $this->conn->prepare("
				DELETE
				FROM
				    `disciplina`
				WHERE
				    	disciplina_id = :disciplina_id
				   ");

			$star->bindValue(":disciplina_id", $disciplina_id);

			$run = $star->execute();
			return $run;
		}


		// ATUALIZAR DISCIPLINA 
		function updateDisciplina( $disciplina_id, $disciplina_nome, $disciplina_nome_abreviacao, $disciplina_codigo ){
			$star = $this->conn->prepare("
				UPDATE
				    `disciplina`
				SET
				    `disciplina_codigo` = :disciplina_codigo,
				    `disciplina_nome` = :disciplina_nome,
				    `disciplina_nome_abreviacao` = :disciplina_nome_abreviacao,
				    `disciplina_update_atdisciplina_update_at` = CURRENT_TIMESTAMP() 
				WHERE
				    `disciplina_id` = :disciplina_id
					");

			$star->bindValue(":disciplina_id", $disciplina_id);
			$star->bindValue(":disciplina_codigo", $disciplina_codigo);
			$star->bindValue(":disciplina_nome", $disciplina_nome);
			$star->bindValue(":disciplina_nome_abreviacao", $disciplina_nome_abreviacao);


			$run = $star->execute();
			return $star;


		}



	}


?>