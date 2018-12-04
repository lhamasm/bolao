<?php

	session_start();

	$login = '';
	$senha = '';

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$login = p_respostas($_REQUEST['cpf']);
		$senha = p_respostas($_REQUEST['pwd']);

		if(file_exists("cadastros_usuarios.txt")){
			$arquivo = fopen("cadastros_usuarios.txt", "r");

			while(!feof($arquivo)) {
			  $usuario = fgets($arquivo);

			  $dados = explode(";", $usuario);
			  if($dados[0] == $login){
			  	if($dados[4] == $senha){
			  		$_SESSION["login"] = $login;
			  		$_SESSION["nome"] = $dados[1];
			  		$_SESSION["username"] = $dados[2];
			  		$_SESSION["email"] = $dados[3];
			  		$_SESSION["senha"] = $senha;
			  		$_SESSION["rg"] = $dados[5];
			  		$_SESSION["ddn"] = $dados[6];
			  		$_SESSION["telefone"] = $dados[7];
			  		$_SESSION["celular"] = $dados[8];
			  		$_SESSION["banco"] = $dados[9];
			  		$_SESSION["agencia"] = $dados[10];
			  		$_SESSION["conta"] = $dados[11];
			  		$_SESSION["genero"] = $dados[12];

			  		header('Location: ../index-pagina-pessoal.php');
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
		} else {
			header('Location: ../index.html');
			echo 'Usuário não cadastrado';
			exit;
		}
	}

	function p_respostas($dado) {
		$dado = trim($dado); // retirar espaços extras, tabs, enter 
		$dado = stripslashes($dado); // retirar barra invertida
		$dado = htmlspecialchars($dado);

		return $dado;
	}

?>