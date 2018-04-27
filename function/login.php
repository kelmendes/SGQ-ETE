<?php
	// INICIANDO SESSION PARA DEIXAR MENSAGEM DE ERRO AO LOGIN 
	session_start();

	// ADICIONANDO A CLASSE QUE IRA VALIDAR OS USUARIOS 
	include '../class/conecta.php';

	// ESTANCIANDO A CLASSE 
	$conn = new Conecta();


	// PEGANDO VALORES ENVIADO PELO POST 
	$username_bruto = $_POST['username'];
	$password_bruto = $_POST['password'];

	//FAZENDO TRATAMENTO DE ENTRADA DE DADOS 
	$username = preg_replace('/\D/', '', $username_bruto);
	$password = addslashes($password_bruto);

	
	// TESTANDO RESULTADO DA CONSULTA 
	$resultado_valor = $conn->login($username, $password);

	if ($resultado_valor){
		//echo "USUARIO LOGADO!!</br>";
		//echo "Nome: ".$resultado_valor['user_nome'] . "</br>";
		//echo "Matricula: ".$resultado_valor['user_matricula'] . "</br>";
		//echo "Email: ".$resultado_valor['user_email'];

		$_SESSION['id_usuario'] = $resultado_valor['user_id'];
		$_SESSION['nome_usuario'] = $resultado_valor['user_nome'];
		header('Location: ../home');
	}else{
		// MENAGEM QUE FICARA NO ALERTA
		$_SESSION['erro_msg'] = "<b>Nome de usuário</b> ou <b>senha</b> errados. Por favor tente outra vez.";
		header('Location: ../');
	}
