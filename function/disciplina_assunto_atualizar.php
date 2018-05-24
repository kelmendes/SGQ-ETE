<?php
	// INICIANDO SESSION PARA DEIXAR MENSAGEM DE ERRO AO LOGIN 
	session_start();

	// PEGANDO VALORES PASSADO PELO FORMULARIO 
	$disciplina_assunto_id = isset($_POST['disciplina_assunto_id']) ? $_POST['disciplina_assunto_id'] : null;
	$disciplina_assunto_nome = isset($_POST['disciplina_assunto_nome']) ? $_POST['disciplina_assunto_nome'] : null;
	$disciplina_assunto_id_disciplina = isset($_POST['disciplina_assunto_id_disciplina']) ? $_POST['disciplina_assunto_id_disciplina'] : null;


	// CRIANDO LINK PARA VOLTAR PARA MESMA QUESTAO 
	$text = 'Location: ../disciplina_assunto_update?id='.$disciplina_assunto_id;

	if ( $disciplina_assunto_id != null and $disciplina_assunto_nome != null and $disciplina_assunto_id_disciplina != null){

		// VERIFICANDO TAMANHO DO CAMPO NOME DISCIPLINA
		if (strlen($disciplina_assunto_nome) > 40 ){
			$_SESSION['erro_msg_ATUALIZAR_ASSUNTO'] = "<b>Nome Assunto</b> ultrapassa o limite aceito pelo sistema!";
			header($text);
			exit;
		}

		// ADICIONANDO CLASS DE ASSUNTO 
	    include '../class/assunto.php';

	    // ESTANCIANDO A CLASS DE ASSUNTO 
	    $assunto = new Assunto();

	    //FAZENDO CONSULTA PELA CLASS 
	    $resultado_assuntos = $assunto->updateAssunto($disciplina_assunto_id_disciplina, $disciplina_assunto_nome, $disciplina_assunto_id);
		
		if ($resultado_assuntos){
			$_SESSION['success_msg_ATUALIZAR_ASSUNTO'] = "<b>Assunto</b> atualizado com sucesso!";
			header($text);
			exit;
		}
		


	}else {
		$_SESSION['erro_msg_ATUALIZAR_ASSUNTO'] = "Informar todos os correios!";
		header($text);
		exit;
	}




?>