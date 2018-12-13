<?php

	require_once "EditarApostaTela.php";
	require_once "funcoes.php";

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$idAposta = $_REQUEST['aposta-id'];
		$valor = p_respostas($_REQUEST['valoraposta']);
		$opcao = $_REQUEST['opcaoAposta'];

		$telaEditarAposta = new EditarApostaTela($idAposta, $valor, $opcao);
		$telaEditarAposta->alterarAposta();
	}

?>