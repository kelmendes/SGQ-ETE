<?php
	// INICIANDO SESSION PARA DEIXAR MENSAGEM DE ERRO AO LOGIN 
	session_start();

	// ADICIONANDO CLASSE DE ALTERAR DADOS DA CONTA
	include '../class/usuario.php';

	// PEGANDO VALORES PASSADO PELO FORMULARIO 
	$user_id = (isset($_POST['user_id']))? $_POST['user_id'] : null;

	// ESTANCIANDO A CLASS
	$usuario = new Usuario();

	// ALTERANDO A SENHA 
	$resultado_cadastro_deletar = $usuario->dropUser($user_id);

	// SE CADASTRADO COM SUCESSO RETORNARA TRUE E CAIRA NA CONDICAO QUE DEIXARA A MENSAGEM
	if($resultado_cadastro_deletar){
		$_SESSION['success_msg_CADASTRO_USUARIO'] = "Usuário cadastrado com sucesso!";
	}else{
		$_SESSION['erro_msg_CADASTRO_USUARIO'] = "Aconteceu um erro, por favor tente novamente!";
	}
	header('Location: ../usuarios');
?>