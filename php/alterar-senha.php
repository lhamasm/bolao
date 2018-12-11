<?php

	require_once 'sistema.php';
	require_once 'usuario.php';
	require_once 'bolao.php';
	require_once 'jogo.php';

	session_start();
	
	$senha = '';
	$confirmarSenha = '';

	if($_SERVER['REQUEST_METHOD'] == 'POST'){

		$sistema = $_SESSION['sistema'];
		$usuarios = $sistema->getUsuarios();

		$senha = p_respostas($_REQUEST['pwd']);
		$confirmarSenha = p_respostas($_REQUEST['pwd-2']);

		for($i=0; $i<count($usuarios); $i++){
			if($usuarios[$i]->getCpf() == $_SESSION['login'] && $usuarios[$i]->getEmail() == $_SESSION['email']){
				if($senha == $confirmarSenha){
					$usuarios[$i]->setSenha($senha);
					
					$s = new Sistema($usuarios, $sistema->getJogos(), $sistema->getBoloes(), $sistema->getBugs());
					$_SESSION['sistema'] = $s;

					$arquivo = fopen('../bd/usuarios.txt', 'w+');
					for($i=0; $i<count($usuarios); $i++){
						$alteracao = $usuarios[$j]->getTipo() . ';' . $usuarios[$j]->getNome() . ';' . $usuarios[$j]->getUsername() . ';' . $usuarios[$j]->getEmail() . ';' . $usuarios[$j]->getSenha() . ';' . $usuarios[$j]->getDataNascimento() . ';' . $usuarios[$j]->getGenero() . ';' . $usuarios[$j]->getRg() . ';' . $usuarios[$j]->getCpf() . ';' . $usuarios[$j]->getTelefone() . ';' . $usuarios[$j]->getCelular() . ';' . $usuarios[$j]->getBanco() . ';' . $usuarios[$j]->getAgencia() . ';' . $usuarios[$j]->getConta() . PHP_EOL;
							fwrite($arquivo, $alteracao);
					}

					fclose($arquivo);
					$_SESSION['status'] = 1;
					header("Location: ../esqueci-senha-2.php");
					exit();
				} else {
					$_SESSION['status'] = 2;
					header("Location: ../esqueci-senha-2.php");
					exit();
				}
			}
		}
		$_SESSION['status'] = 3;
		header("Location: ../esqueci-senha-2.php");
		exit();
	}


	function p_respostas($dado) {
		$dado = trim($dado); // retirar espaços extras, tabs, enter 
		$dado = stripslashes($dado); // retirar barra invertida
		$dado = htmlspecialchars($dado);

		return $dado;
	}
?>