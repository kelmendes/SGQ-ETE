<?php

	// PEGANDO OS DADOS PASSADO PELO GET 
	$user_id = isset($_GET['user_id']) ? $_GET['user_id'] : null; 
	$questao_id = isset($_GET['questao_id']) ? $_GET['questao_id'] : null;

	if ( $user_id != null  and $questao_id != null ){

		// ADICIONANDO CLASSE DE CADASTRO DE DISCIPLINA
		include '../class/questões.php';

		// ESTANCIANDO A CLASS
		$questoes = new Questões();

		// ALTERANDO A SENHA 
		$resultado_selecionar_questão = $questoes->setQuestaoSelect($user_id, $questao_id);


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