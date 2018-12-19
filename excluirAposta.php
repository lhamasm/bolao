<?php

	require_once 'ExcluirApostaTela.php';

	if($_SERVER['REQUEST_METHOD'] == 'POST'){

		$aposta = $_REQUEST['apostaex-id'];

		$telaExcluirAposta = new ExcluirApostaTela($aposta);
		$telaExcluirAposta->excluir();
	}

?>