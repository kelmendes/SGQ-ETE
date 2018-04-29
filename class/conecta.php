<?php
	// ADICIONANDO ARQUIVO QUE MANTEM DADOS PARA CONEXÃO COM O BANCO DE DADOS 
	include 'configdb.php';

	/**
	* ARQUIVO PARA SE CONECTAR COM O BANCO DE DADOS 
	*/
	class Conecta extends Configdb
	{
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