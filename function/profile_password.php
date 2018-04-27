<?php
	// INICIANDO SESSION PARA DEIXAR MENSAGEM DE ERRO AO LOGIN 
	session_start();
	// ADICIONANDO CLASSE DE ALTERAR DADOS DA CONTA
	include '../class/profile.php';

	// PEGANDO VALORES PASSADO PELO FORMULARIO 
	$user_id = (isset($_POST['user_id']))? $_POST['user_id'] : null;
	$user_senha_new = (isset($_POST['user_senha_new']))? $_POST['user_senha_new'] : null;
	$user_senha_confirm = (isset($_POST['user_senha_confirm']))? $_POST['user_senha_confirm'] : null;

	// TESTAR SE FORAM PASSADOS TODOS OS VALORES 
	if ($user_senha_new != null and $user_senha_confirm != null and $user_id != null){

		// VERIFICANDO TAMANHO DOS CAMPOS
		if (strlen($user_senha_new) > 20 or strlen($user_senha_confirm) > 20){
			$_SESSION['erro_msg_PASSWORD'] = "Sua senha ultrapassa o limite aceito pelo sistema!";
			header('Location: ../profile');
			exit;
		}

		// VERIFICANDO SE AS SENHAS SÃO IGUAIS
		if ($user_senha_new !=  $user_senha_confirm){
			$_SESSION['erro_msg_PASSWORD'] = "As senhas informadas não são iguais!";
			header('Location: ../profile');
			exit;
			
		}

		// ESTANCIANDO A CLASS
		$prof = new Profile();

		// ALTERANDO A SENHA 
		$prof->updatePassword($user_id, $user_senha_new);


	}else{
		$_SESSION['erro_msg_PASSWORD'] = "Por favor informar todos os campos!";
	}

	header('Location: ../profile')
?>