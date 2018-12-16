<?php

	require_once 'ApostarTela.php';
	require_once 'funcoes.php';

	session_start();

	if($_SERVER['REQUEST_METHOD'] == 'POST'){

		$valor = p_respostas($_REQUEST['valoraposta']);
		$opcaoAposta = $_REQUEST['opcaoaposta'];

		if($opcaoAposta == 'outro'){
			$opcaoAposta = $_REQUEST['outro'];
		}

		if(isset($_REQUEST['senha-bolao'])){
			$senha = $_REQUEST['senha-bolao'];
		} else {
			$senha = '';
		}

		$bolaoId = $_REQUEST['bolao-id'];

		$telaApostar = new ApostarTela($bolaoId, $valor, $opcaoAposta, $senha, $_SESSION['banco'], $_SESSION['agencia'], $_SESSION['conta']);
		$telaApostar->apostar();
	}
	
?>