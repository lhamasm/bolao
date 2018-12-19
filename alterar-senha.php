<?php

	require_once 'EsqueciSenhaTela2.php';
	require_once 'funcoes.php';

	//session_start();
	
	$senha = '';
	$confirmarSenha = '';

	if($_SERVER['REQUEST_METHOD'] == 'POST'){

		$senha = p_respostas($_REQUEST['pwd']);
		$confirmarSenha = p_respostas($_REQUEST['pwd-2']);

		$telaEsqueciSenha = new EsqueciSenhaTela2($senha, $confirmarSenha);
		$telaEsqueciSenha->alterar();
	}
?>