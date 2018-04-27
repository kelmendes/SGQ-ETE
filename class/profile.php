<?php
	// ADICIONANDO ARQUIVO QUE MANTEM DADOS PARA CONEXÃO COM O BANCO DE DADOS 
	include 'configdb.php';

	/**
	* ARQUIVO PARA SE CONECTAR COM O BANCO DE DADOS 
	*/
	class Profile extends Configdb
	{
		// VARIAVEL PARA SE MANTER A CONEXÃO COM O DB
		var $conn;
		
		function __construct()
		{
			$this->conn = new PDO('mysql:host='.$this->host.';dbname='.$this->dbname, $this->user, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
		}

		// FUNCTION PARA LISTAR OS USUARIOS 
		function showInfo($id){
			$star = $this->conn->prepare("SELECT * FROM user WHERE user_id = :id");
			$star->bindValue(":id", $id, PDO::PARAM_INT);

			$run = $star->execute();
			$rs = $star->fetch(PDO::FETCH_ASSOC);
			return $rs;
		}

		
		// FUNCTION PARA CADASTRAR NOVO USUARIO 
		function updateProfile($user_id, $user_nome, $user_email){
			$star = $this->conn->prepare("
				UPDATE `user` SET 
					`user_nome`= :user_nome,
					`user_email`= :user_email,
					`user_update_at`= CURRENT_TIMESTAMP() 
				WHERE
					`user_id`= :user_id

				");
			// UTILIZANO MARCADORES PARA FAZER A INSERÇÃO DE VALOR NO QUERY 
			$star->bindValue(":user_id", $user_id);
			$star->bindValue(":user_nome", $user_nome);
			$star->bindValue(":user_email", $user_email);

			$run = $star->execute();
			return $run;
		}

		
		// FUNCTION PARA APAGAR USUARIO 
		function updatePassword($user_id, $user_senha){
			$star = $this->conn->prepare("
				UPDATE `user` SET 
					`user_senha`= :user_senha,
					`user_update_at`= CURRENT_TIMESTAMP() 
				WHERE
					`user_id`= :user_id");
			$star->bindValue(":user_id", $user_id, PDO::PARAM_INT);
			$star->bindValue(":user_senha", md5($user_senha));

			$run = $star->execute();
			return $run;
			
		}
		
	}


?>