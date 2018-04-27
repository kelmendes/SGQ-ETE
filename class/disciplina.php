<?php
	// ADICIONANDO ARQUIVO QUE MANTEM DADOS PARA CONEXÃO COM O BANCO DE DADOS 
	include 'configdb.php';

	/**
	* ARQUIVO PARA SE CONECTAR COM O BANCO DE DADOS 
	*/
	class Disciplina extends Configdb
	{
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


	}


?>