<?php

	require_once 'sistema.php';
	require_once 'usuario.php';
	require_once 'bolao.php';
	require_once 'convite.php';

	abstract class Administrador extends Usuario {

		function Administrador($tipo, $nome, $username, $email, $senha, $dataNascimento, $genero, $rg, $cpf, $telefone, $celular, $banco, $agencia, $conta){
			parent::Usuario($tipo, $nome, $username, $email, $senha, $dataNascimento, $genero, $rg, $cpf, $telefone, $celular, $banco, $agencia, $conta);
		}

		/*function public convidaUsername(){
			$this->convidarApostadorUsername($username, $data, $bolao);
		}

		function public convidaEmail(){
			$this->convidarApostadorEmail($email, $data, $bolao);
		}

		function public Excluir(){
			$this->excluirApostador($apostador, $bolao);
		}*/

		function convidarApostadorUsername($usuarios, $username, $data, $bolao) {
			for($i = 0; $i < count($usuarios); $i++){
				if($usuarios[$i]->getUsername() == $username){
					$convite = new Convite($this->username, $username, $bolao->getTitulo(), $data);
					$usuarios[$i]->setMensagem($convite);
				}
			}
		}

		function convidarApostadorEmail($usuarios, $email, $data, $bolao) {
			for($i = 0; $i < count($usuarios); $i++){
				if($usuarios[$i]->getEmail() == $email){
					$convite = new Convite($this->username, $email, $bolao->getTitulo(), $data);
					$usuarios[$i]->setMensagem($convite);
				}
			}
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