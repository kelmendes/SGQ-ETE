<?php
	// INICIANDO SESSION PARA DEIXAR MENSAGEM DE ERRO AO LOGIN 
	session_start();
	
	// PEGANDO ID DO USUARIO LOGADO 
    $id_user = $_SESSION['id_usuario'];

	if ( $id_user != null  ){

		// ADICIONANDO CLASSE DE CADASTRO DE DISCIPLINA
		include '../class/questões.php';

		// ESTANCIANDO A CLASS
		$questoes = new Questões();

		// ALTERANDO A SENHA 
		$resultado_selecionar_questão_deletar = $questoes->dropQuestaoSelectAll($id_user);


		// SE CADASTRADO COM SUCESSO RETORNARA TRUE E CAIRA NA CONDICAO QUE DEIXARA A MENSAGEM
		//if($$resultado_selecionar_questão){
		//	$_SESSION['success_msg_SELECIONAR_QUESTAO'] = "Disciplina cadastrada com sucesso!";
		//}


	}

	//Pegando a url anterior
	$antes = $_SERVER['HTTP_REFERER'];

	//Redirecionando 
	header('Location: '.$antes);

?>