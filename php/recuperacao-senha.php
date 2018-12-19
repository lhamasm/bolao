<?php
	
	require_once 'index.php';
	require_once 'EsqueciSenhaTela.php';
	require_once 'funcoes.php';

	//session_start();

	$cpf = '';
	$email = '';

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$cpf = p_respostas($_REQUEST['cpf']);
		$email = p_respostas($_REQUEST['email']);

		$telaEsqueciSenha = new EsqueciSenhaTela($cpf, $email);
		$telaEsqueciSenha->prosseguir();
	}

?>