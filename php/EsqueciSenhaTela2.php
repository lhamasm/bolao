<?php

	require_once 'sistema.php';
	require_once 'usuario.php';
	require_once 'bolao.php';
	require_once 'jogo.php';
	require_once 'facade.php';
	require_once 'ArquivoUsuario.php';

	session_start();

	class EsqueciSenhaTela2 {
		protected $senha;
		protected $confirmarSenha;

		function EsqueciSenhaTela2($senha, $confirmarSenha)
		{
			$this->senha = $senha;
			$this->confirmarSenha = $confirmarSenha;
		}

		function getSenha(){
			return $this->cpf;
		}

		function getConfirmarSenha(){
			return $this->email;
		}

		function setSenha($senha){
			$this->senha = $senha;
		}

		function setConfirmarSenha($confirmarSenha){
			$this->confirmarSenha = $confirmarSenha;
		}

		function alterar(){
			$sistema = $_SESSION['sistema'];
			$usuarios = $sistema->getUsuarios();

			for($i=0; $i<count($usuarios); $i++){
				if($usuarios[$i]->getCpf() == $_SESSION['login'] && $usuarios[$i]->getEmail() == $_SESSION['email']){
					if($this->senha == $this->confirmarSenha){
						$usuarios[$i]->setSenha($this->senha);
						
						$s = new Sistema($usuarios, $sistema->getJogos(), $sistema->getBoloes(), $sistema->getBugs());
						$_SESSION['sistema'] = $s;

						unlink('../bd/usuarios.txt');
						$usuario = new ArquivoUsuario();
					    $facade = new Facade($usuario);
						for($j=0; $j<count($usuarios); $j++){
							$facade->escreverEm('../bd/usuarios.txt', $usuarios[$j]);
						}						    

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
	}
?>