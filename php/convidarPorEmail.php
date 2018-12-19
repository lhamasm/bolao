<?php

	require_once 'convidar.php';
	require_once 'usuario.php';

	session_start();

	class ConvidarPorEmail implements Convidar {

		public function convidar($email, $bolao) {

			$sistema = $_SESSION['sistema'];
			$boloes = $sistema->getBoloes();
			$usuarios = $sistema->getUsuarios();

			$usuario = $_SESSION['usuario'];

			for($i=0; $i<count($usuarios); $i++){
				if($username != $_SESSION['email']){
					if($usuarios[$i]->getEmail() == $email){
						$usuario->convidarApostador($usuarios[$i], $i, $data, $boloes[intval($bolao)]);
						exit();
					}
				} else {
					$_SESSION['status'] = 3;
					header("Location: ../convidar-amigos.php");
					exit();
				}
			}

			// Não foi possível convidar, pois não existe usuário com esse email
			$_SESSION['status'] = 2;
			header("Location: ../convidar-amigos.php");
			exit();

		}

	}
	
?>