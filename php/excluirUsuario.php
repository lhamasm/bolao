<?php

	require_once 'sistema.php';
	require_once 'administrador-sistema.php';
	require_once 'usuario.php';

	session_start();

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$usuario = $_REQUEST['item'];

		$adm = $_SESSION['usuario'];
		$adm->excluirUsuario($usuario);
	}

?>