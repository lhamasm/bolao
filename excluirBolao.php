<?php

	require_once 'sistema.php';
	require_once 'administrador-sistema.php';
	require_once 'usuario.php';

	session_start();

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$bolao = $_REQUEST['item-b'];

		$adm = $_SESSION['usuario'];
		$adm->excluirBolao($bolao);
	}

?>