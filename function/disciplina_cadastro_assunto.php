<?php
	// INICIANDO SESSION PARA DEIXAR MENSAGEM DE ERRO AO LOGIN 
	session_start();
	// ADICIONANDO CLASSE DE CADASTRO DE DISCIPLINA
	include '../class/assunto.php';

	// PEGANDO VALORES PASSADO PELO FORMULARIO 
	$disciplina_codigo = (isset($_POST['disciplina_codigo'])) ? $_POST['disciplina_codigo'] : null;
	$disciplina_assunto_nome = (isset($_POST['disciplina_assunto_nome'])) ? $_POST['disciplina_assunto_nome'] : null;


	$text = 'Location: ../assunto?disciplina='.$disciplina_codigo;

	if ( $disciplina_codigo  != null and  $disciplina_assunto_nome  != null){

		if (strlen($disciplina_assunto_nome) > 50 ){
			$_SESSION['erro_msg_ASSUNTO'] = "<b>Nome Assunto</b> ultrapassa o limite aceito pelo sistema!";
			header($text);
			exit;
		}

		// ESTANCIANDO A CLASS
		$assunto = new Assunto();

		// ALTERANDO A SENHA 
		$resultado_cadastro_assunto = $assunto->newAssunto( $disciplina_codigo, $disciplina_assunto_nome );


		// SE CADASTRADO COM SUCESSO RETORNARA TRUE E CAIRA NA CONDICAO QUE DEIXARA A MENSAGEM
		if($resultado_cadastro_assunto){
			$_SESSION['success_msg_ASSUNTO'] = "<b>Assunto</b> cadastrada com sucesso!";
		}

		header($text);



	}


?>


