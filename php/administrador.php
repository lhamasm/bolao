<?php

	require_once 'sistema.php';
	require_once 'usuario.php';
	require_once 'bolao.php';
	require_once 'convite.php';

	abstract class Administrador extends Usuario {

		function Administrador($tipo, $nome, $username, $email, $senha, $dataNascimento, $genero, $rg, $cpf, $telefone, $celular, $banco, $agencia, $conta){
			parent::Usuario($tipo, $nome, $username, $email, $senha, $dataNascimento, $genero, $rg, $cpf, $telefone, $celular, $banco, $agencia, $conta);
		}

		function convidarApostadorUsername($usuarios, $username, $data, $bolao) {
			for($i = 0; $i < count($usuarios); $i++){
				if($usuarios[$i]->getUsername() == $username){
					$convite = new Convite($this->username, $username, 'Participe do bolão' . $bolao->getTitulo(), $bolao, $data);
					$usuarios[$i]->setMensagem($convite);
					$_SESSION['status'] = 1;
					header('Location: ../convidar-amigos.php');
					exit();
				}
			}

			$_SESSION['status'] = 0;
			header('Location: ../convidar-amigos.php');
			exit();
		}

		function convidarApostadorEmail($usuarios, $email, $data, $bolao) {
			for($i = 0; $i < count($usuarios); $i++){
				if($usuarios[$i]->getEmail() == $email){
					$convite = new Convite($this->username, $email, 'Participe do bolão' . $bolao->getTitulo(), $bolao, $data);
					$usuarios[$i]->setMensagem($convite);
					$_SESSION['status'] = 1;
					header('Location: ../convidar-amigos.php');
					exit();
				}
			}

			$_SESSION['status'] = 0;
			header('Location: ../convidar-amigos.php');
			exit();
		}

		function excluirApostador($boloes, $apostador, $bolao){
			for($i = 0; $i < count($boloes); $i++){
				if($boloes[$i]->getId() == $bolao->getId()){
					$p = $boloes[$i]->getParticipantes();
					for($j = 0; $j < count($p); $j++){
						if($p[$j]->getCpf() == $apostador){
							array_splice($p, $j, 1);
						}
					}
				}
			}
		}

		/*function convidarApostador($user, $data, $titulo){
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
		}*/
	}
?>