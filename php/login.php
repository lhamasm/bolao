<?php

	$login = '';
	$senha = '';

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$login = p_respostas($_REQUEST['cpf']);
		$senha = p_respostas($_REQUEST['pwd']);

		$arquivo = fopen("cadastros_usuarios.txt", "r");

		while(!feof($arquivo)) {
		  $usuario = fgets($arquivo);

		  $dados = explode(";", $usuario);
		  if($dados[0] == $login){
		  	if($dados[4] == $senha){
		  		header('Location: ../index-principal.html');
				exit;
			} else {
				header('Location: ../index.html');
			  	echo 'Senha inválida';
				exit;
			}
		  } else {
		  	header('Location: ../index.html');
		  	echo 'Login inválido';
			exit;
		  }
		}
	}

	function p_respostas($dado) {
		$dado = trim($dado); // retirar espaços extras, tabs, enter 
		$dado = stripslashes($dado); // retirar barra invertida
		$dado = htmlspecialchars($dado);

		return $dado;
	}

?>