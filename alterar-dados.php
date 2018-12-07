<?php

	session_start();

	$username = '';
	$senha = '';
	$confirmarSenha = '';
	$email = '';
	$nome = '';
	$genero = '';
	$rg = '';
	$ddn = '';
	$telefone = '';
	$celular = '';
	$banco = '';
	$agencia = '';
	$conta = '';

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		if(isset($_REQUEST['username'])){
			$username = p_respostas($_REQUEST['username']);
		} else {
			$username = $_SESSION['username'];
		}

		if(isset($_REQUEST['nova-senha'])){
			$senha = p_respostas($_REQUEST['nova-senha']);
		} else {
			$senha = $_SESSION['senha'];
		}

		if(isset($_REQUEST['confirmar-nova-senha'])){
			$confirmarSenha = p_respostas($_REQUEST['confirmar-nova-senha']);
		} else {
			$confirmarSenha = $_SESSION['senha'];
		}

		if(isset($_REQUEST['email'])){
			$email = p_respostas($_REQUEST['email']);
		} else {
			$email = $_SESSION['email'];
		}

		if(isset($_REQUEST['nome'])){
			$nome = p_respostas($_REQUEST['nome']);
		} else {
			$nome = $_SESSION['nome'];
		}

		if(isset($_REQUEST['genero'])){
			$genero = $_REQUEST['genero'];
		} else {
			$genero = $_SESSION['genero'];
		}

		if(isset($_REQUEST['rg'])){
			$rg = p_respostas($_REQUEST['rg']);
		} else {
			$rg = $_SESSION['rg'];
		}

		if(isset($_REQUEST['ddn'])){
			$ddn = p_respostas($_REQUEST['ddn']);
		} else {
			$ddn = $_SESSION['ddn'];
		}

		if(isset($_REQUEST['telefone'])){
			$telefone = p_respostas($_REQUEST['telefone']);
		} else {
			$telefone = $_SESSION['telefone'];
		}

		if(isset($_REQUEST['celular'])){
			$celular = p_respostas($_REQUEST['celular']);
		} else {
			$celular = $_SESSION['celular'];
		}

		if(isset($_REQUEST['banco'])){
			$banco = p_respostas($_REQUEST['banco']);
		} else {
			$banco = $_SESSION['banco'];
		}

		if(isset($_REQUEST['agencia'])){
			$agencia = p_respostas($_REQUEST['agencia']);
		} else {
			$agencia = $_SESSION['agencia'];
		}

		if(isset($_REQUEST['conta'])){
			$conta = p_respostas($_REQUEST['conta']);
		} else {
			$conta = $_SESSION['conta'];
		}

		if($senha == $confirmarSenha){
			if(file_exists('cadastros_usuarios.txt')){
				$arquivo = fopen('cadastros_usuarios.txt', 'r+');
				while(!feof($arquivo)){
					$usuario = fgets($arquivo);

					$dados = explode(";", $usuario);
					if($dados[0] == $_SESSION['login']){
						if($senha == $confirmarSenha){
							$dados[1] = $nome; 
							$dados[2] = $username;
							$dados[3] = $email;
							$dados[4] = $senha;
							$dados[5] = $rg;
							$dados[6] = $ddn;
							$dados[7] = $telefone;
							$dados[8] = $celular;
							$dados[9] = $banco;
							$dados[10] = $agencia;
							$dados[11] = $conta;

							$_SESSION["nome"] = $nome; 
							$_SESSION["username"] = $username;
							$_SESSION["email"] = $email;
							$_SESSION["senha"] = $senha;
							$_SESSION["rg"] = $rg;
							$_SESSION["ddn"] = $ddn;
							$_SESSION["telefone"] = $telefone;
							$_SESSION["celular"] = $celular;
							$_SESSION["banco"] = $banco;
							$_SESSION["agencia"] = $agencia;
							$_SESSION["conta"] = $conta;

							$alteracao = '';
							for($i = 0; $i < count($dados); $i++){
								$alteracao += $dados[$i] . ';';
							}
							fwrite($arquivo, $alteracao);
							fclose($arquivo);
							header('Location: ../minha-conta.php');
							echo 'Dados alterados com sucesso!';
							exit;
						} else {
							echo 'Senha incorreta';
						}
					}
				}
				//header('Location: ../minha-conta.php');
				echo 'Error';
			} else {
				//header('Location: ../minha-conta.php');
				echo 'Error';
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