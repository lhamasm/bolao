<?php

	require_once 'convidar.php';
	require_once 'usuario.php';
	require_once 'convite.php';
	require_once 'ArquivoConvite.php';
	require_once 'facade.php';

	//session_start();

	class ConvidarPorUsername implements Convidar {

		public function convidar($username, $bolao) {

			$sistema = $_SESSION['sistema'];
			$boloes = $sistema->getBoloes();
			$usuarios = $sistema->getUsuarios();

			$usuario = $_SESSION['usuario'];

			for($i=0; $i<count($usuarios); $i++){
				if($username != $_SESSION['username']){
					if($usuarios[$i]->getUsername() == $username){
						$usuario->convidarApostador($usuarios[$i], $i, date('d/m/Y'), $boloes[intval($bolao)]);
					}
				} else {
					$_SESSION['status'] = 3;
					header("Location: ../convidar-amigos.php");
					exit();
				}
			}

			// Não foi possível convidar, pois não existe usuário com esse username
			if($_SESSION['status'] != 1){
				$_SESSION['status'] = 2;
				header("Location: ../convidar-amigos.php");
				exit();
			}
		}

	}
	
?>