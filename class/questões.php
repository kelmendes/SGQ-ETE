<?php
	// ADICIONANDO ARQUIVO QUE MANTEM DADOS PARA CONEXÃO COM O BANCO DE DADOS 
	include 'configdb.php';

	/**
	* ARQUIVO PARA SE CONECTAR COM O BANCO DE DADOS 
	*/
	class Questões extends Configdb
	{

		var $conn;


		function __construct()
		{
			$this->conn = new PDO('mysql:host='.$this->host.';dbname='.$this->dbname, $this->user, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
		}
		
		// FUNCTION PARA PEGAR INFORMACOES DE UM ASSUNTO E MOSTRAR NA PAGINA  DE 
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

		// FUNCTION PARA PEGAR QUESTÕES DE UM DETERMINADO ASSUNTO 
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

		// FUNCTION PARA PEGAR INFORMAÇÕES DE UMA QUESTÃO DISSERTATIVA
		function getQuestaoDissertativa($disciplina_assunto_questao_id){
			$star = $this->conn->prepare("
				SELECT
		            *
		        FROM
		            disciplina_assunto_questao AS Q
		        WHERE
		            Q.disciplina_assunto_questao_id = :disciplina_assunto_id
				");	
    		$star->bindValue(":disciplina_assunto_id", $disciplina_assunto_questao_id , PDO::PARAM_INT);
			$run = $star->execute();
			$rs = $star->fetch(PDO::FETCH_ASSOC);
			return $rs;
		}

		// FUNCTION PEGAR INFORMAÇÕES DE UMA MULTIPLA ESCOLHA
		function getQuestaoMultiEscolha($disciplina_assunto_questao_id){
			$star = $this->conn->prepare("
				SELECT
		            *
		        FROM
		            disciplina_assunto_questao AS Q
		        WHERE
		            Q.disciplina_assunto_questao_id = :disciplina_assunto_id
				");	
    		$star->bindValue(":disciplina_assunto_id", $disciplina_assunto_questao_id , PDO::PARAM_INT);
			$run = $star->execute();
			$rs = $star->fetch(PDO::FETCH_ASSOC);
			return $rs;

		}

		// FUNCTION PEGAR AS ALTERNATIVAS DA QUESTÃO DE MULTIPLA ESCOLHA
		function getQuestaoMultiEscolhaAlternativas($disciplina_assunto_questao_id){
			$star = $this->conn->prepare("
				SELECT
		            *
		        FROM
		            disciplina_assunto_questao_mutipla_escolha AS M
		        WHERE
		            M.disciplina_assunto_questao_id = :disciplina_assunto_id

		    ");

		    $star->bindValue(":disciplina_assunto_id", $disciplina_assunto_questao_id , PDO::PARAM_INT);
			$star->execute();
			return $star;

		}

		// CADASTRO DE QUESTÃO 
		function newQuestao($id_assunto, $mutipla_escolha, $questao_nome, $questao_pergunta){
			$star = $this->conn->prepare("
				INSERT INTO `disciplina_assunto_questao`(
				    `disciplina_assunto_questao_id_assunto`,
				    `disciplina_assunto_questao_nome`,
				    `disciplina_assunto_questao_pergunta`,
				    `disciplina_assunto_questao_mutipla_escolha`,
				    `disciplina_assunto_questao_creat_at`
				)
				VALUES(
					:disciplina_assunto_questao_id_assunto,
				    :disciplina_assunto_questao_nome,
				    :disciplina_assunto_questao_pergunta,
				    :disciplina_assunto_questao_mutipla_escolha,
					CURRENT_TIMESTAMP()	
				)");	
			$star->bindValue(":disciplina_assunto_questao_id_assunto", $id_assunto, PDO::PARAM_INT);
		    $star->bindValue(":disciplina_assunto_questao_mutipla_escolha", $mutipla_escolha );
		    $star->bindValue(":disciplina_assunto_questao_nome", $questao_nome );
		    $star->bindValue(":disciplina_assunto_questao_pergunta", $questao_pergunta );

			$run = $star->execute();
			return $star;

		}

		// CADASTRO DE ALTERNATIVAS DE QUESTÃO DE MULTIPLA ESCOLHA 	
		function newQuestaoAlternativa( $questao_id, $questao_mutipla_escolha_text ){
			$star = $this->conn->prepare("
				INSERT INTO `disciplina_assunto_questao_mutipla_escolha`(
				    `disciplina_assunto_questao_id`,
				    `disciplina_assunto_questao_mutipla_escolha_text`
				)
				VALUES(
					:disciplina_assunto_questao_id,
				    :disciplina_assunto_questao_mutipla_escolha_text
				)");	
			$star->bindValue(":disciplina_assunto_questao_id", $questao_id, PDO::PARAM_INT);
		    $star->bindValue(":disciplina_assunto_questao_mutipla_escolha_text", $questao_mutipla_escolha_text );

			$run = $star->execute();
			return $star;

		}

		// FUNCTION PARA ADICIONAR A QUESTÃO NA TABELA DE SELECIONADA PELO USUÁRIO 
		function setQuestaoSelect( $user_id, $questao_id ){
			$star = $this->conn->prepare("
				INSERT INTO `prova_questoes_selecionadas`(
				    `prova_questoes_selecionadas_user_id`,
				    `prova_questoes_selecionadas_disciplina_assunto_questao_id`
				)
				VALUES(
				    :prova_questoes_selecionadas_user_id,
				    :prova_questoes_selecionadas_disciplina_assunto_questao_id
				)");	
			$star->bindValue(":prova_questoes_selecionadas_user_id", $user_id, PDO::PARAM_INT);
		    $star->bindValue(":prova_questoes_selecionadas_disciplina_assunto_questao_id", $questao_id, PDO::PARAM_INT);

			$run = $star->execute();
			return $star;

		}

		// FUNCTION PARA REMOVER UMA QUESTÃO DAS QUESTÕES QUE FORAM SELECIONADAS 
		function dropQuestaoSelect( $prova_questoes_selecionadas_id, $user_id){
			$star = $this->conn->prepare("
				DELETE
				FROM
				    `prova_questoes_selecionadas`
				WHERE
				    prova_questoes_selecionadas_id = :prova_questoes_selecionadas_id
				AND 
					prova_questoes_selecionadas_user_id = :user_id ");

			$star->bindValue(":prova_questoes_selecionadas_id", $prova_questoes_selecionadas_id, PDO::PARAM_INT);
			$star->bindValue(":user_id", $user_id, PDO::PARAM_INT);

			$run = $star->execute();
			return $star;

		}

		// REMOVER TODAS AS QUESTÕES SELECIONDAS PELO USUÁRIO 
		function dropQuestaoSelectAll( $user_id ){
			$star = $this->conn->prepare("
				DELETE
				FROM
				    `prova_questoes_selecionadas`
				WHERE 
					prova_questoes_selecionadas_user_id = :prova_questoes_selecionadas_user_id ");

			$star->bindValue(":prova_questoes_selecionadas_user_id", $user_id, PDO::PARAM_INT);

			$run = $star->execute();
			return $star;

		}

		// APAGANDO UMA QUESTÃO DO BANCO DE DADOS 
		function dropQuestao( $questao_id ){
			$star = $this->conn->prepare("
				DELETE
				FROM
				    `disciplina_assunto_questao`
				WHERE
				    disciplina_assunto_questao_id = :disciplina_assunto_questao_id  ");

			$star->bindValue(":disciplina_assunto_questao_id", $questao_id, PDO::PARAM_INT);

			$run = $star->execute();
			return $star;
		}





	}


?>