<?php

	require_once 'ExcluirParticipanteTela.php';

	if($_SERVER['REQUEST_METHOD'] == 'POST'){

		$apostador = $_REQUEST['apostador'];
		echo $apostador;
		$bolao = $_REQUEST['meu-bolao'];

		$telaExcluirParticipante = new ExcluirParticipanteTela($bolao, $apostador);
		$telaExcluirParticipante->excluir();
	}


?>