<?php

	session_start();

	$cpf = '';
	$email = '';
	$ddn = '';

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$cpf = p_respostas($_REQUEST['cpf']);
		$email = p_respostas($_REQUEST['email']);

		$arquivo = fopen('../bd/usuarios.txt', 'r');
		while(!feof($arquivo)){
			$usuario = fgets($arquivo);

			$dados = explode(";", $usuario);

			if($dados[8] == $cpf){
				if($dados[3] == $email){
					fclose($arquivo);
					$_SESSION['login'] = $cpf;
					$_SESSION['email'] = $email;
					$_SESSION['status'] = -1;
					header('Location: ../esqueci-senha-2.php');
					exit();
				} else {
					fclose($arquivo);
					$_SESSION['status'] = 1;
					header('Location: ../esqueci-senha.php');
					exit();
				}
			} else {
				fclose($arquivo);
				$_SESSION['status'] = 2;
				echo $cpf;
				echo $dados[8];
				header('Location: ../esqueci-senha.php');
				exit;
			}
		}

		fclose($arquivo);

		$_SESSION['status'] = 3;
		header('Location: ../esqueci-senha.php');
		exit;
	}


	function p_respostas($dado) {
		$dado = trim($dado); // retirar espaços extras, tabs, enter 
		$dado = stripslashes($dado); // retirar barra invertida
		$dado = htmlspecialchars($dado);

		return $dado;
	}

?>