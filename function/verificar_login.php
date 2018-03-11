<?php 
	// INICIAR SESSION 
	session_start(); 

	// VERIFICAR SE EXIXTE OS DADOS DE LOGIN
	if(!isset($_SESSION["id_usuario"]) || !isset($_SESSION["nome_usuario"])) 
	{ 
		// USUUARIOS NAO LOGADOS IRAO PARA PAGINA INICIAL
		header("Location: ../"); 
		exit; 
	} 
?> 