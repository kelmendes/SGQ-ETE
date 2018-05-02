<?php


$id_assunto = (isset($_POST['disciplina_questao_id_assunto'])) ? $_POST['disciplina_questao_id_assunto'] : null;
$mutipla_escolha = (isset($_POST['disciplina_questao_mutipla_escolha'])) ? $_POST['disciplina_questao_mutipla_escolha'] : null;
$questao_nome = (isset($_POST['disciplina_questao_nome'])) ? $_POST['disciplina_questao_nome'] : null;
$questao_pergunta = (isset($_POST['disciplinaquestao_pergunta'])) ? $_POST['disciplinaquestao_pergunta'] : null;


$text = 'Location: ../questoes?assunto='.$id_assunto;


if ( $id_assunto  != null and $mutipla_escolha != null and $questao_nome != null and $questao_pergunta != null ){

	//echo "mutipla_escolha: " . $mutipla_escolha . "</br>";
	//echo "questao_nome: " . $questao_nome . "</br>";
	//echo "questao_pergunta: " . $questao_pergunta . "</br>";

	if (strlen($questao_nome) > 50 ){
		$_SESSION['erro_msg_ASSUNTO'] = "<b>Nome Questão</b> ultrapassa o limite aceito pelo sistema!";
		header($text);
		exit;
	}

	if (strlen($questao_pergunta) > 499 ){
		$_SESSION['erro_msg_ASSUNTO'] = "<b>Questão Pergunta</b> ultrapassa o limite aceito pelo sistema!";
		header($text);
		exit;
	}

	// ADICIONANDO CLASSE DE CADASTRO DE DISCIPLINA
	include '../class/questões.php';

	// ESTANCIANDO A CLASS
	$questões = new Questões();

	// ALTERANDO A SENHA 
	$resultado_cadastro_questão = $questões->newQuestao($id_assunto, $mutipla_escolha, $questao_nome, $questao_pergunta);


	// SE CADASTRADO COM SUCESSO RETORNARA TRUE E CAIRA NA CONDICAO QUE DEIXARA A MENSAGEM
	if($resultado_cadastro_questão){
		$_SESSION['success_msg_ASSUNTO'] = "<b>Questão</b> cadastrada com sucesso!";
	}

	header($text);

}

?>