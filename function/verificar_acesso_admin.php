<?php 
	// VERIFICAR SE EXIXTE OS DADOS DE LOGIN
	if($_SESSION["nivel_acesso"] != 2) 
	{ 
		// PASSANDO MESAGEM DE ERROR 
		$_SESSION['erro_msg_CADASTRO_DISCIPLINA'] = "Sem permissão para acessar a página solicitada!";

		// REDIRECIONANDO PARA PAGINA HOME
		header("Location: ./home"); 

		exit; 
	} 
?> 