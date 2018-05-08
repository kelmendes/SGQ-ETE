<?php
	// INICIANDO SESSION PARA DEIXAR MENSAGEM DE ERRO AO LOGIN 
	session_start();
	
	// PEGANDO OS DADOS PASSADO PELO GET 
	$questao_id = isset($_GET['id']) ? $_GET['id'] : null; 

	// PEGANDO NIVEL DE ACESSO DO USUARIO LOGADO
    $nivel_do_usario = $_SESSION['nivel_acesso'];

	if ( $nivel_do_usario == 2  and $questao_id != null ){

		// ADICIONANDO CLASSE DE CADASTRO DE DISCIPLINA
		include '../class/questões.php';

		// ESTANCIANDO A CLASS
		$questao = new Questões();

		// ALTERANDO A SENHA 
		$resultado_deletar_questao = $questao->dropQuestao($questao_id);


		// SE CADASTRADO COM SUCESSO RETORNARA TRUE E CAIRA NA CONDICAO QUE DEIXARA A MENSAGEM
		if($resultado_deletar_questao){
			$_SESSION['success_msg_QUESTAO'] = "Questão deletada com sucesso!";
		}


	}


	// SE CADASTRADO COM SUCESSO RETORNARA TRUE E CAIRA NA CONDICAO QUE DEIXARA A MENSAGEM
	if($nivel_do_usario != 2){
		$_SESSION['erro_msg_QUESTAO'] = "Você não tem permissão para deletar questões!";
	}


	//Pegando a url anterior
	$antes = $_SERVER['HTTP_REFERER'];

	//Redirecionando 
	header('Location: '.$antes);

?>