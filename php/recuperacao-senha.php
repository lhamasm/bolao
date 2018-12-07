<?php

	session_start();

	$cpf = '';
	$email = '';
	$ddn = '';

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$cpf = p_respostas($_REQUEST['cpf']);
		$email = p_respostas($_REQUEST['email']);
		$ddn = p_respostas($_REQUEST['ddn']);

		$arquivo = fopen('cadastros_usuarios.txt', 'r');
		while(!feof($aquivo)){
			$usuario = fgets($arquivo);

			$dados = explode(";", $usuario);

			if($cpf == $_SESSION['login'] && $dados[0] == $cpf){
				if($email == $_SESSION['email'] && $dados[3] == $email){
					if($ddn == $_SESSION['ddn'] && $dados[6] == '16/03/1996'){
						exit;
					} else {
						header('Location: ../esqueci-senha.html');
					  	echo 'Data de Nascimento incorreta';
						exit;
					}
				} else {
					header('Location: ../esqueci-senha.html');
				  	echo 'E-mail incorreto';
					exit;
				}
			} else {
				header('Location: ../esqueci-senha.html');
			  	echo 'CPF incorreto';
				exit;
			}
		}

		header('Location: ../esqueci-senha.html');
	  	echo 'Usuário não cadastrado no sistema';
		exit;
	}


	function p_respostas($dado) {
		$dado = trim($dado); // retirar espaços extras, tabs, enter 
		$dado = stripslashes($dado); // retirar barra invertida
		$dado = htmlspecialchars($dado);

		return $dado;
	}

?>