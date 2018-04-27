<?php 
	// INICIAR SESSION PARA PODER DESTRUIR
	session_start(); 
	session_destroy(); 

	header("Location: ../"); 
?>