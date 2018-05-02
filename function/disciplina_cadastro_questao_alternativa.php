<?php
	// INICIANDO SESSION PARA DEIXAR MENSAGEM DE ERRO AO LOGIN 
	session_start();
	// ADICIONANDO CLASSE DE CADASTRO DE DISCIPLINA
	include '../class/questões.php';

	// PEGANDO VALORES PASSADO PELO FORMULARIO 
	$questao_id = (isset($_POST['disciplina_assunto_questao_id'])) ? $_POST['disciplina_assunto_questao_id'] : null;
	$questao_mutipla_escolha_text = (isset($_POST['disciplina_assunto_questao_mutipla_escolha_text'])) ? $_POST['disciplina_assunto_questao_mutipla_escolha_text'] : null;


	$text = 'Location: ../questao_multi_escolha?id='.$questao_id;

	if ( $questao_id  != null and  $questao_mutipla_escolha_text  != null){

		if (strlen($questao_mutipla_escolha_text) > 249 ){
			$_SESSION['erro_msg_ALTERNATIVA'] = "<b>Texto da Alternativa</b> ultrapassa o limite aceito pelo sistema!";
			header($text);
			exit;
		}

		// ESTANCIANDO A CLASS
		$questões = new Questões();

		// ALTERANDO A SENHA 
		$resultado_cadastro_alternativa = $questões->newQuestaoAlternativa( $questao_id, $questao_mutipla_escolha_text );


		// SE CADASTRADO COM SUCESSO RETORNARA TRUE E CAIRA NA CONDICAO QUE DEIXARA A MENSAGEM
		if($resultado_cadastro_alternativa){
			$_SESSION['success_msg_ALTERNATIVA'] = "<b>Alternativa</b> cadastrada com sucesso!";
		}

		header($text);



	}


?>


