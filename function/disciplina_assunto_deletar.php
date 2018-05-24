<?php
	// INICIANDO SESSION PARA DEIXAR MENSAGEM DE ERRO AO LOGIN 
	session_start();
	
	// PEGANDO OS DADOS PASSADO PELO GET 
	$assunto_id = isset($_GET['id']) ? $_GET['id'] : null; 

	// PEGANDO NIVEL DE ACESSO DO USUARIO LOGADO
    $nivel_do_usario = $_SESSION['nivel_acesso'];

	if ( $nivel_do_usario == 2  and $assunto_id != null ){

		// ADICIONANDO CLASSE DE CADASTRO DE DISCIPLINA
		include '../class/assunto.php';
		
		// ESTANCIANDO A CLASS
		$assunto = new Assunto();

		// ALTERANDO A SENHA 
		$resultado_deletar_assunto = $assunto->dropAssunto($assunto_id);

		// SE CADASTRADO COM SUCESSO RETORNARA TRUE E CAIRA NA CONDICAO QUE DEIXARA A MENSAGEM
		if($resultado_deletar_assunto){
			$_SESSION['success_msg_DELETAR_ASSUNTO'] = "<b>Disciplina</b> deletada com sucesso!";
		}else{
			$_SESSION['erro_msg_DELETAR_ASSUNTO'] = "<b>Disciplina</b> não foi deletada com sucesso!";
		}


	}
	//Pegando a url anterior
	$antes = $_SERVER['HTTP_REFERER'];

	//Redirecionando 
	header('Location: '.$antes);

?>