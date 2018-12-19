<?php

	require_once 'index.php';
  	require_once 'funcoes.php';
  	require_once 'LoginTela.php';

  	//session_start();

	$login = '';
	$senha = '';
	$lembra = false;		

	if($_SERVER['REQUEST_METHOD'] == 'POST'){

		$login = p_respostas($_REQUEST['cpf']);
		$senha = p_respostas($_REQUEST['pwd']);

		if(isset($_REQUEST['lembra'])){
			$lembra = true;
		} else {
			$lembra = false;
		} 

		$telaLogin = new LoginTela($login, $senha, $lembra);
		$telaLogin->login();
	}

?>