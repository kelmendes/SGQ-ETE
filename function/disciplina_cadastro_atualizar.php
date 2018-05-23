<?php
	// INICIANDO SESSION PARA DEIXAR MENSAGEM DE ERRO AO LOGIN 
	session_start();

	// PEGANDO VALORES PASSADO PELO FORMULARIO 
	$disciplina_id = isset($_POST['disciplina_id'])? $_POST['disciplina_id'] : null;
	$disciplina_nome = isset($_POST['disciplina_nome'])? $_POST['disciplina_nome'] : null;
	$disciplina_nome_abreviacao = isset($_POST['disciplina_abreviacao'])? $_POST['disciplina_abreviacao'] : null;
	$disciplina_codigo = isset($_POST['disciplina_codigo'])? $_POST['disciplina_codigo'] : null;

	// CRIANDO LINK PARA VOLTAR PARA MESMA QUESTAO 
	$text = 'Location: ../disciplina_update?id='.$disciplina_id;

	if ($disciplina_id != null and  $disciplina_nome != null and  $disciplina_codigo != null and  $disciplina_nome_abreviacao != null ){
		

		// VERIFICANDO TAMANHO DO CAMPO NOME DISCIPLINA
		if (strlen($disciplina_nome) > 70 ){
			$_SESSION['erro_msg_ATUALIZAR_DISCIPLINA'] = "<b>Nome Disciplina</b> ultrapassa o limite aceito pelo sistema!";
			header($text);
			exit;
		}

		// VERIFICANDO TAMANHO DO CAMPO NOME DISCIPLINA ABREVIACAO
		if (strlen($disciplina_nome_abreviacao) > 15 ){
			$_SESSION['erro_msg_ATUALIZAR_DISCIPLINA'] = "<b>Nome Disciplina - Abreviado</b> ultrapassa o limite aceito pelo sistema!";
			header($text);
			exit;
		}

		// VERIFICANDO TAMANHO DO CAMPO CODIGO DISCIPLINA
		if (strlen($disciplina_codigo) > 11 ){
			$_SESSION['erro_msg_ATUALIZAR_DISCIPLINA'] = "<b>Código Disciplina</b> ultrapassa o limite aceito pelo sistema!";
			header($text);
			exit;
		}


		// ADICIONANDO CLASSE DE CADASTRO DE DISCIPLINA
		include '../class/disciplina.php';

		// ESTANCIANDO A CLASS
		$disciplina = new Disciplina();

		// ALTERANDO A SENHA 
		$resultado_atualizar = $disciplina->updateDisciplina( $disciplina_id, $disciplina_nome, $disciplina_nome_abreviacao, $disciplina_codigo);

		// SE CADASTRADO COM SUCESSO RETORNARA TRUE E CAIRA NA CONDICAO QUE DEIXARA A MENSAGEM
		if($resultado_atualizar){
			$_SESSION['success_msg_ATUALIZAR_DISCIPLINA'] = "Dados atualizado com sucesso!";
			header($text);
			exit;
		}


		//echo "<b>disciplina_id</b>:" . $disciplina_id . "</br>";
		//echo "<b>disciplina_nome</b>:" . $disciplina_nome . "</br>";
		//echo "<b>disciplina_nome</b>:" . $disciplina_nome . "</br>";
		//echo "<b>disciplina_nome_abreviacao</b>:" . $disciplina_nome_abreviacao . "</br>";

	}




?>