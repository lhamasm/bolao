<?php

	require_once 'administrador-sistema.php';

	session_start();

	if($_SERVER['REQUEST_METHOD'] == 'POST'){

		$tipo = $_REQUEST['permissao'];
		$usuario = $_REQUEST['quem'];

		$_SESSION['usuario']->alterarPermissao($tipo, $usuario);
	}
?>