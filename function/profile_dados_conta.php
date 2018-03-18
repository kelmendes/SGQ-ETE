<?php
	// ADICIONANDO CLASSE DE ALTERAR DADOS DA CONTA
	include '../class/profile.php';

	// PEGANDO VALORES PASSADO PELO FORMULARIO 
	$user_id = (isset($_POST['user_id']))? $_POST['user_id'] : null;
	$user_matricula = (isset($_POST['user_matricula']))? $_POST['user_matricula'] : null;
	$user_nome = (isset($_POST['user_nome']))? $_POST['user_nome'] : null;
	$user_email = (isset($_POST['user_email']))? $_POST['user_email'] : null;


	// ESTANCIANDO A CLASS DE PROFILE 
	$prof = new Profile();

	// VER SE TODOS OS VALORES ESTAO SENDO PASSADO
	//echo "<b>user_id</b>".$user_id."</br>";
	//echo "<b>user_matricula</b>".$user_matricula."</br>";
	//echo "<b>user_nome</b>".$user_nome."</br>";
	//echo "<b>user_email</b>".$user_email."</br>";

	// ALTERANDO DADOS DA CONTA 
	// updateProfile ( ID_CONTA, USER_MATRICULA, USER_NOME, USER_EMAIL) 
	$prof->updateProfile($user_id, $user_matricula, $user_nome, $user_email);





?>