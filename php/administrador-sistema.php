<?php

	require_once 'sistema.php';
	require_once 'administrador.php';

	class AdministradorSistema extends Administrador {

		function cadastrarResultado($jogo, $resultado){
			for($i = 0; $i < count($jogos); $i++){
				if($jogos[$i]->getId() == $jogo){
					$jogos[$i]->setResultado($resultado);
				}
			}
		}

		function consultarUsuario($usuario) {
			for($i = 0; $i < count($usuarios); $i++){
				if($usuarios[$i]->getCpf() == $usuario){
					return $usuarios[$i];
				}
			}
		}

		function enviarMensagem($username, $texto){
			for($i = 0; $i < count($usuarios); $i++){
				if($usuarios[$i]->getUsername() == $username){
					$mensagem = new Mensagem($texto);
					$usuarios[$i]->setMensagem($mensagem);
				}
			}
		}

	}
?>