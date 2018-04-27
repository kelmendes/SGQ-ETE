<?php
	// INICIANDO SESSION PARA DEIXAR MENSAGEM DE ERRO AO LOGIN 
	session_start();
	// ADICIONANDO CLASSE DE CADASTRO DE DISCIPLINA
	include '../class/disciplina.php';

	// PEGANDO VALORES PASSADO PELO FORMULARIO 

	$disciplina_codigo = (isset($_POST['disciplina_codigo'])) ? $_POST['disciplina_codigo'] : null;


?>


