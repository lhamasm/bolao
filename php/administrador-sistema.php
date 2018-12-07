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

		function excluirBolao($bolao){
			for($i = 0; $i < count($boloes); $i++){
				if($boloes[$i]->getTitulo() == $bolao){
					array_splice($boloes, $i, 1);
				}
			}
		}

		function excluirUsuario($usuario) {
			for($i = 0; $i < count($usuarios); $i++){
				if($usuarios[$i]->getCpf() == $usuario){
					array_splice($usuarios, $i, 1);
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

		function sendMensagem($username, $texto){
			for($i = 0; $i < count($usuarios); $i++){
				if($usuarios[$i]->getUsername() == $username){
					$mensagem = new Mensagem($texto);
					$usuarios[$i]->setMensagem($mensagem);
				}
			}
		}

	}
?>