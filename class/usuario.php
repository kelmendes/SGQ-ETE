<?php
	// ADICIONANDO ARQUIVO QUE MANTEM DADOS PARA CONEXÃO COM O BANCO DE DADOS 
	include 'configdb.php';

	/**
	* ARQUIVO PARA SE CONECTAR COM O BANCO DE DADOS 
	*/
	class Usuario extends Configdb
	{
		// VARIAVEL PARA SE MANTER A CONEXÃO COM O DB
		var $conn;
		
		function __construct()
		{
			$this->conn = new PDO('mysql:host='.$this->host.';dbname='.$this->dbname, $this->user, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
		}

		// FUNCTION PARA LISTAR OS USUARIOS 
		function listUser(){
			$star = $this->conn->prepare("SELECT * FROM user");

			$run = $star->execute();
			return $star;
		}

		// FUNCTION PARA CADASTRAR NOVO USUARIO 
		function newUser($user_matricula, $user_nome, $user_email, $user_senha, $user_role){
			$star = $this->conn->prepare("
				INSERT INTO `user`(`user_matricula`, `user_nome`, `user_email`, `user_senha`, `user_role`, `user_create_at`) VALUES ( :user_matricula , :user_nome , :user_email, :user_senha, :user_role, CURRENT_TIMESTAMP() ) ");
			// UTILIZANO MARCADORES PARA FAZER A INSERÇÃO DE VALOR NO QUERY 
			$star->bindValue(":user_matricula", $user_matricula, PDO::PARAM_INT);
			$star->bindValue(":user_nome", $user_nome, PDO::PARAM_STR);
			$star->bindValue(":user_email", $user_email, PDO::PARAM_STR);
			$star->bindValue(":user_senha", md5($user_senha));
			$star->bindValue(":user_role", $user_role, PDO::PARAM_INT);

			$run = $star->execute();
			return $run;
		}

		// FUNCTION PARA APAGAR USUARIO 
		function dropUser($idUser){
			$star = $this->conn->prepare("DELETE FROM user WHERE user_id = :idUser");
			$star->bindValue(":idUser", $idUser, PDO::PARAM_INT);

			$run = $star->execute();
			return $run;
		}

	}


?>