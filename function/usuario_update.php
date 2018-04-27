<?php 
// INICIANDO SESSION PARA DEIXAR MENSAGEM DE ERRO AO LOGIN 
session_start();

$user_id =  (isset($_POST['user_id']))? $_POST['user_id'] : null;
$user_matricula =  (isset($_POST['user_matricula']))? $_POST['user_matricula'] : null;
$user_nome =  (isset($_POST['user_nome']))? $_POST['user_nome'] : null;
$user_email =  (isset($_POST['user_email']))? $_POST['user_email'] : null;
$user_role =  (isset($_POST['user_role']))? $_POST['user_role'] : null;

//"user_id".$user_id."</br>";
//"user_matricula".$user_matricula."</br>";
//"user_nome".$user_nome."</br>";
//"user_email".$user_email."</br>";
//"user_role".$user_role."</br>";

$text = 'Location: ../usuarios_edit?user='.$user_id;

if ($user_matricula != null and $user_nome != null  and $user_email != null  and $user_role != null ){

	// VERIFICANDO TAMANHO DOS CAMPOS
	if ( strlen($user_matricula)>11 or strlen($user_nome)>60 or strlen($user_email)>100){
		$_SESSION['erro_msg_UPDATE_USER'] = "Verifique os dados informados, pois ultrapassa o limite aceito pelo sistema!";
		header($text);
		exit;
	}	

	// ADICIONANDO A CLASSE QUE IRA VALIDAR OS USUARIOS 
    include '../class/usuario.php';

	// ESTANCIANDO A CLASS
	$usuario = new Usuario();

	// ALTERANDO A SENHA 
	$resultado_cadastro = $usuario->updateUser($user_id, $user_matricula, $user_nome, $user_email, $user_role);

	// SE CADASTRADO COM SUCESSO RETORNARA TRUE E CAIRA NA CONDICAO QUE DEIXARA A MENSAGEM
	if($resultado_cadastro){
		$_SESSION['success_msg_UPDATE_USER'] = "Usuário atualizado com sucesso!";
	}
	 header($text);


}else{
	$_SESSION['erro_msg_UPDATE_USER'] = "Verifique os dados informados!";
	header($text);
}