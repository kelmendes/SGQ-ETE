<?php
	// INICIANDO SESSION PARA DEIXAR MENSAGEM DE ERRO AO LOGIN 
	session_start();
	// ADICIONANDO CLASSE DE CADASTRO DE DISCIPLINA
	include '../class/disciplina.php';

	// PEGANDO VALORES PASSADO PELO FORMULARIO 

	$disciplina_codigo = (isset($_POST['disciplina_codigo'])) ? $_POST['disciplina_codigo'] : null;
	$disciplina_nome = (isset($_POST['disciplina_nome'])) ? $_POST['disciplina_nome'] : null;
	$disciplina_nome_abreviacao = (isset($_POST['disciplina_nome_abreviacao'])) ? $_POST['disciplina_nome_abreviacao'] : null;


	// TESTAR SE FORAM PASSADOS TODOS OS VALORES 
	if( $disciplina_codigo != null and  $disciplina_nome != null and  $disciplina_nome_abreviacao ){

		// ESTANCIANDO A CLASS
		$disciplina = new Disciplina();

		// ALTERANDO A SENHA 
		$resultado_cadastro_disciplina = $disciplina->newDisciplinas( $disciplina_codigo, $disciplina_nome, $disciplina_nome_abreviacao );


		// SE CADASTRADO COM SUCESSO RETORNARA TRUE E CAIRA NA CONDICAO QUE DEIXARA A MENSAGEM
		if($resultado_cadastro_disciplina){
			$_SESSION['success_msg_CADASTRO_DISCIPLINA'] = "Disciplina cadastrada com sucesso!";
		}
		header('Location: ../home');


	}



?>