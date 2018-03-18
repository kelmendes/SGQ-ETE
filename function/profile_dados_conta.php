<?php
	// INICIANDO SESSION PARA DEIXAR MENSAGEM DE ERRO AO LOGIN 
	session_start();
	// ADICIONANDO CLASSE DE ALTERAR DADOS DA CONTA
	include '../class/profile.php';

	// PEGANDO VALORES PASSADO PELO FORMULARIO 
	$user_id = (isset($_POST['user_id']))? $_POST['user_id'] : null;
	$user_nome = (isset($_POST['user_nome']))? $_POST['user_nome'] : null;
	$user_email = (isset($_POST['user_email']))? $_POST['user_email'] : null;


	// TESTAR SE FORAM PASSADOS TODOS OS VALORES 
	if($user_id != null and $user_nome != null and $user_email != null){

		// VERIFICANDO TAMANHO DOS CAMPOS
		if (strlen($user_nome)){

		}





		// ESTANCIANDO A CLASS DE PROFILE 
		$prof = new Profile();

		// ALTERANDO DADOS DA CONTA 
		// updateProfile ( ID_CONTA, USER_NOME, USER_EMAIL) 
		$prof->updateProfile($user_id, $user_nome, $user_email);

	} else {
		// MENSAGEM DE ERRO 
		$_SESSION['erro_msg_DADOS_CONTA'] = "Por favor informe todos os campos necessários!";
	}

	header('Location: ../profile')




?>