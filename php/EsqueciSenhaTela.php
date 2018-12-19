<?php

	require_once 'sistema.php';
	require_once 'usuario.php';
	
	session_start();

	class EsqueciSenhaTela {
		protected $cpf;
		protected $email;

		function EsqueciSenhaTela($cpf, $email)
		{
			$this->cpf = $cpf;
			$this->email = $email;
		}

		function getCpf(){
			return $this->cpf;
		}

		function getEmail(){
			return $this->email;
		}

		function setCpf($cpf){
			$this->cpf = $cpf;
		}

		function setEmail($email){
			$this->email = $email;
		}

		function prosseguir(){
			$sistema = $_SESSION['sistema'];
			$usuarios = $sistema->getUsuarios();

			for($i=0; $i<count($usuarios); $i++){
				if($usuarios[$i]->getCpf() == $this->cpf){
					if($usuarios[$i]->getEmail() == $this->email){
						$_SESSION['login'] = $this->cpf;
						$_SESSION['email'] = $this->email;
						$_SESSION['status'] = -1;
						header('Location: ../esqueci-senha-2.php');
						exit();
					} 
				}
			}

			$_SESSION['status'] = 3;
			header('Location: ../esqueci-senha.php');
			exit();
		}
	}
?>