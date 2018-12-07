<?php

	require_once 'sistema.php';
	require_once 'usuario.php';
	require_once 'bolao.php';
	require_once 'convite.php';

	class Administrador extends Usuario {

		function convidarApostador($user, $data, $titulo){
			for($i = 0; $i < count($usuarios); $i++){
				if($usuarios[$i]->getUsername() == $username){
					$convite = new Convite($this->username, $user, $titulo, $data);
					$usuarios[$i]->setMensagem($convite);
				}
			}
		}

		function convidarApostador($email, $data, $titulo){
			for($i = 0; $i < count($usuarios); $i++){
				if($usuarios[$i]->getEmail() == $email){
					$convite = new Convite($this->username, $usuarios[$i]->getUsername(), $titulo, $data);
					$usuarios[$i]->setMensagem($convite);
				}
			}
		}

		function excluirApostador($bolao, $apostador){
			for($i = 0; $i < count($boloes); $i++){
				if($boloes[$i]->getTitulo() == $bolao){
					$p = $boloes[$i]->getParticipantes();
					for($j = 0; $j < count($p); $j++){
						if($p[$j]->getCpf() == $apostador){
							array_splice($p, $j, 1);
						}
					}
				}
			}
		}
	}
?>