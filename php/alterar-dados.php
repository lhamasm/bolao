<?php

	require_once 'sistema.php';
	require_once 'usuario.php';

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
		$sistema = $_SESSION["sistema"];
		$usuarios = $sistema->getUsuarios();

		if(isset($_REQUEST['username'])){
			$username = p_respostas($_REQUEST['username']);
		} else {
			$username = $_SESSION['username'];
		}

		if(isset($_REQUEST['nova-senha']) && $_REQUEST['nova-senha'] != ''){
			$senha = p_respostas($_REQUEST['nova-senha']);
		} else {
			$senha = $_SESSION['senha'];
		}

		if(isset($_REQUEST['confirmar-nova-senha']) && $_REQUEST['confirmar-nova-senha'] != ''){
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
			for($i=0; $i < count($usuarios); $i++){
				if($usuarios[$i]->getCpf() == $_SESSION['login']){
					$usuarios[$i]->setNome($nome); 
					$usuarios[$i]->setUsername($username);
					$usuarios[$i]->setEmail($email);
					$usuarios[$i]->setSenha($senha);
					$usuarios[$i]->setDataNascimento($ddn);
					$usuarios[$i]->setGenero($genero);
					$usuarios[$i]->setRg($rg);
					$usuarios[$i]->setTelefone($telefone);
					$usuarios[$i]->setCelular($celular);
					$usuarios[$i]->setBanco($banco);
					$usuarios[$i]->setAgencia($agencia);
					$usuarios[$i]->setConta($conta);

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

					$arquivo = fopen('../bd/usuarios.txt', 'w+');
					for($j=0; $j<count($usuarios); $j++){
						$alteracao = $usuarios[$j]->getTipo() . ';' . $usuarios[$j]->getNome() . ';' . $usuarios[$j]->getUsername() . ';' . $usuarios[$j]->getEmail() . ';' . $usuarios[$j]->getSenha() . ';' . $usuarios[$j]->getDataNascimento() . ';' . $usuarios[$j]->getGenero() . ';' . $usuarios[$j]->getRg() . ';' . $usuarios[$j]->getCpf() . ';' . $usuarios[$j]->getTelefone() . ';' . $usuarios[$j]->getCelular() . ';' . $usuarios[$j]->getBanco() . ';' . $usuarios[$j]->getAgencia() . ';' . $usuarios[$j]->getConta();
						fwrite($arquivo, $alteracao);
					}
					fclose($arquivo);
					echo 'Alteração realizada com sucesso!';
					header('Location: ../minha-conta.php');
					exit();
				}
			} 

			echo 'Erro';
			header('Location: ../minha-conta.php');
			exit();
		} else {
			echo 'Senha incorreta';
			header('Location: ../minha-conta.php');
			exit();
		}
	}

	function p_respostas($dado) {
		$dado = trim($dado); // retirar espaços extras, tabs, enter 
		$dado = stripslashes($dado); // retirar barra invertida
		$dado = htmlspecialchars($dado);

		return $dado;
	}
?>