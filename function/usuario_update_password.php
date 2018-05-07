<?php
	// INICIANDO SESSION PARA DEIXAR MENSAGEM DE ERRO AO LOGIN 
	session_start();

	// PEGANDO VALORES PASSADO PELO FORMULARIO 
	$user_id = (isset($_POST['user_id']))? $_POST['user_id'] : null;
	$user_senha_new = (isset($_POST['user_senha_new']))? $_POST['user_senha_new'] : null;
	$user_senha_confirm = (isset($_POST['user_senha_confirm']))? $_POST['user_senha_confirm'] : null;

	$text = 'Location: ../usuarios_edit?user='.$user_id;


	// TESTAR SE FORAM PASSADOS TODOS OS VALORES 
	if ($user_senha_new != null and $user_senha_confirm != null and $user_id != null){

		// VERIFICANDO TAMANHO DOS CAMPOS
		if (strlen($user_senha_new) > 20 or strlen($user_senha_confirm) > 20){
			$_SESSION['erro_msg_PASSWORD'] = "Sua senha ultrapassa o limite aceito pelo sistema!";
			header($text);
			exit;
		}

		// VERIFICANDO TAMANHO DOS CAMPOS
		if (strlen($user_senha_new) < 8 ){
			$_SESSION['erro_msg_PASSWORD'] = "Sua senha não atinge o tamanho mínimo solicitado pelo sistema!";
			header($text);
			exit;
		}

		// VERIFICANDO SE AS SENHAS SÃO IGUAIS
		if ($user_senha_new !=  $user_senha_confirm){
			$_SESSION['erro_msg_PASSWORD'] = "As senhas informadas não são iguais!";
			header($text);
			exit;
			
		}

		// ADICIONANDO CLASSE DE ALTERAR DADOS DA CONTA
		include '../class/usuario.php';

		// ESTANCIANDO A CLASS
		$user = new Usuario();

		// ALTERANDO A SENHA 
		$resultado_cadastro = $user->updateUserPassword($user_id, $user_senha_new);

		// SE CADASTRADO COM SUCESSO RETORNARA TRUE E CAIRA NA CONDICAO QUE DEIXARA A MENSAGEM
		if($resultado_cadastro){
			$_SESSION['success_msg_UPDATE_USER_PASSWORD'] = "Senha atualizado com sucesso!";
		}
		 header($text);


	}else{
		$_SESSION['erro_msg_PASSWORD'] = "Por favor informar todos os campos!";
	}

	header($text)
?>