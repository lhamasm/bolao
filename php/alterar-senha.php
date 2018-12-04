<?php

	$senha = '';
	$confirmarSenha = '';

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$senha = p_respostas($_REQUEST['pwd']);
		$confirmarSenha = p_respostas($_REQUEST['pwd-2']);

		$arquivo = fopen('cadastros_usuarios.txt', 'r');
		while(!feof($aquivo)){
			$usuario = fgets($arquivo);

			$dados = explode(";", $usuario);

			if($dados[0] == $_SESSION['login'] && $dados[3] == $_SESSION['email'] && $dados[6] == $_SESSION['ddn']){
				if($senha == $confirmarSenha){
					$dados[4] = $senha;

					$alteracao = '';
					for($i = 0; $i < count($dados); $i++){
						$alteracao += $dados[$i] . ';';
					}

					fwrite($arquivo, $alteracao);
					fclose($arquivo);
					header('Location: ../esqueci-senha.php');
					echo 'Senha alterada com sucesso!';
					exit;
				} else {
					header('Location: ../esqueci-senha.php');
					echo 'Senha errada!';
					exit;
				}
			}
		}

		exit;
	}


	function p_respostas($dado) {
		$dado = trim($dado); // retirar espaços extras, tabs, enter 
		$dado = stripslashes($dado); // retirar barra invertida
		$dado = htmlspecialchars($dado);

		return $dado;
	}
?>