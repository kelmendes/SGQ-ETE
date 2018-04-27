<?php
	// ADICIONANDO ARQUIVO QUE MANTEM DADOS PARA CONEXÃO COM O BANCO DE DADOS 
	include 'configdb.php';

	/**
	* ARQUIVO PARA SE CONECTAR COM O BANCO DE DADOS 
	*/
	class Conecta extends Configdb
	{
		// VARIAVEL PARA SE MANTER A CONEXÃO COM O DB
		var $conn;
		
		function __construct()
		{
			$this->conn = new PDO('mysql:host='.$this->host.';dbname='.$this->dbname, $this->user, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
		}

		// FUNCTION PARA LOGAR NO SISTEMA 
		function login($user, $senha){
			$star = $this->conn->prepare("SELECT * FROM user WHERE user_matricula = :user AND  user_senha = :senha");
			// UTILIZANO MARCADORES PARA FAZER A INSERÇÃO DE VALOR NO QUERY 
			$star->bindValue(":user", $user, PDO::PARAM_INT);
			$star->bindValue(":senha", md5($senha));

			$run = $star->execute();
			$rs = $star->fetch(PDO::FETCH_ASSOC);
			return $rs;
		}
	}


?>