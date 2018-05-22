<?php
	// INICIANDO SESSION PARA DEIXAR MENSAGEM DE ERRO AO LOGIN 
	session_start();
	
	// PEGANDO OS DADOS PASSADO PELO GET 
	$questao_id = isset($_GET['id']) ? $_GET['id'] : null; 

	// PEGANDO NIVEL DE ACESSO DO USUARIO LOGADO
    $nivel_do_usario = $_SESSION['nivel_acesso'];

	if ( $nivel_do_usario == 2  and $questao_id != null ){

		// ADICIONANDO CLASSE DE CADASTRO DE DISCIPLINA
		include '../class/disciplina.php';

		// ESTANCIANDO A CLASS
		$disciplina = new Disciplina();

		// ALTERANDO A SENHA 
		$resultado_deletar_disciplina = $disciplina->dropDisciplinas($questao_id);


		// SE CADASTRADO COM SUCESSO RETORNARA TRUE E CAIRA NA CONDICAO QUE DEIXARA A MENSAGEM
		if($resultado_deletar_disciplina){
			$_SESSION['success_msg_DELETAR_QUESTAO'] = "Disciplina deletada com sucesso!";
		}else{
			$_SESSION['erro_msg_DELETAR_QUESTAO'] = "Disciplina não foi deletada com sucesso!";
		}


	}
	//Pegando a url anterior
	$antes = $_SERVER['HTTP_REFERER'];

	//Redirecionando 
	header('Location: '.$antes);

?>