<?php

	// PEGANDO VALORES ENVIADO PELO POST 
	$username_bruto = $_POST['username'];
	$password_bruto = $_POST['password'];

	//FAZENDO TRATAMENTO DE ENTRADA DE DADOS 
	$username = preg_replace('/\D/', '', $username_bruto);
	$password = addslashes($password_bruto);

	//CONEXÃO COM BANCO DE DADOS USANDO PDO
	$conn = new PDO('mysql:host=localhost;dbname=ete_pi1', 'root', '');

	//CONSULTANDO NO BANCO DE DADOS SE O USUARIO EXISTE - SE SIM SERA REORNADO VALOR 1
	$query = "
	SELECT 
		* 
	FROM 
		user 
	WHERE
		user_matricula = '$username' AND  user_senha = '$password'";

	$resultado_login = $conn->query($query);

	// TESTANDO RESULTADO DA CONSULTA 
	$resultado_valor = $resultado_login->rowCount();

	if ($resultado_valor >= 1 ){
		$USER = $resultado_login->fetch(PDO::FETCH_ASSOC);
		echo "USUARIO LOGADO!!</br>";
		echo "Nome: ".$USER['user_nome'] . "</br>";
		echo "Matricula: ".$USER['user_matricula'] . "</br>";
		echo "Email: ".$USER['user_email'];
	}else{
		echo 'USUARIO NÃO ENCONTRADO@!!!!!!';
	}
