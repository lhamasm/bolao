<?php

	require_once 'convidar.php';
	require_once 'administrador-bolao.php';

	session_start();

	class ConvidarPorEmail implements Convidar {

		public function convidar($email) {

			$sistema = $_SESSION['sistema'];
			$boloes = $sistema->getBoloes();
			$usuarios = $sistema->getUsuarios();

			$adm = new AdministradorBolao($_SESSION['tipo'], $_SESSION['nome'], $_SESSION['username'], $_SESSION['email'], $_SESSION['senha'], $_SESSION['ddn'], $_SESSION['genero'], $_SESSION['rg'], $_SESSION['login'], $_SESSION['telefone'], $_SESSION['celular'], $_SESSION['banco'], $_SESSION['agencia'], $_SESSION['conta']);
				$adm->setBolao($boloes[count($boloes)-1]);
				$adm->setUsername($_SESSION['username']);
				$adm->convidarApostadorEmail($usuarios, $email, date('d/m/Y'), $boloes[count($boloes)-1]);

			for($i=0; $i<count($usuarios); $i++){
				if($usuarios[$i]->getEmail() == $email){
					$c = new Convite($_SESSION['login'], $usuarios[$i]->getCpf(), 'Convite', date('d/m/Y'), count($boloes));

					$convite = new ArquivoConvite();
				    $facade = new Facade($convite);
				    $facade->escreverEm('mensagens-' . $usuarios[$i]->getCpf() . '.txt', $c);
				    break;
				}
			}

			$_SESSION['status'] = 1;
			header("Location: ../convidar-amigos.php");
			exit();

		}

	}
	
?>