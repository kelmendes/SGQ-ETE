<?php 
	// INICIAR SESSION 
	session_start(); 

	// VERIFICAR SE EXIXTE OS DADOS DE LOGIN
	if(!isset($_SESSION["id_usuario"]) || !isset($_SESSION["nome_usuario"])) 
	{ 
		// USUUARIOS NAO LOGADOS IRAO PARA PAGINA INICIAL
		header("Location: ./"); 
		// PASSANDO MESAGEM DE ERROR 
		$_SESSION['erro_msg'] = "Essa página não está disponível para usuários não auternticados.";
		exit; 
	} 
?> 