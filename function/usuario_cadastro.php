<?php
	// INICIANDO SESSION PARA DEIXAR MENSAGEM DE ERRO AO LOGIN 
	session_start();

	// ADICIONANDO CLASSE DE ALTERAR DADOS DA CONTA
	include '../class/usuario.php';

	// PEGANDO VALORES PASSADO PELO FORMULARIO 
	$user_matricula = (isset($_POST['user_matricula']))? $_POST['user_matricula'] : null;
	$user_nome = (isset($_POST['user_nome']))? $_POST['user_nome'] : null;
	$user_email = (isset($_POST['user_email']))? $_POST['user_email'] : null;
	$user_role = (isset($_POST['user_role']))? $_POST['user_role'] : null;
	$user_senha = (isset($_POST['user_senha']))? $_POST['user_senha'] : null;

	if ($user_matricula != null and $user_nome != null  and $user_email != null  and $user_role != null  and $user_senha != null ){

		if (strlen($user_senha) > 20 ){
			$_SESSION['erro_msg_CADASTRO_USUARIO'] = "Sua senha ultrapassa o limite aceito pelo sistema!";
			header('Location: ../usuarios');
			exit;
		}

		// VERIFICANDO TAMANHO DOS CAMPOS
		if ( strlen($user_matricula)>11 or strlen($user_nome)>60 or strlen($user_email)>100){
			$_SESSION['erro_msg_CADASTRO_USUARIO'] = "Verifique os dados informados, pois ultrapassa o limite aceito pelo sistema!";
			header('Location: ../usuarios');
			exit;
		}

		// ESTANCIANDO A CLASS
		$usuario = new Usuario();

		// ALTERANDO A SENHA 
		$resultado_cadastro = $usuario->newUser($user_matricula, $user_nome, $user_email, $user_senha, $user_role);

		// SE CADASTRADO COM SUCESSO RETORNARA TRUE E CAIRA NA CONDICAO QUE DEIXARA A MENSAGEM
		if($resultado_cadastro){
			$_SESSION['success_msg_CADASTRO_USUARIO'] = "Usuário cadastrado com sucesso!";
		}
		header('Location: ../usuarios');

		
	}else{
		$_SESSION['erro_msg_CADASTRO_USUARIO'] = "Verifique os dados informados!";
		header('Location: ../usuarios');
	}


?>