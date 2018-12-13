<?php

	require_once 'sistema.php';
	require_once 'usuario.php';
	require_once 'bolao.php';
	require_once 'jogo.php';

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

			for($i=0; $i<count($usuarios)-1; $i++){
				if($usuarios[$i]->getCpf() == $_SESSION['login'] && $usuarios[$i]->getEmail() == $_SESSION['email']){
					if($this->senha == $this->confirmarSenha){
						$usuarios[$i]->setSenha($this->senha);
						
						$s = new Sistema($usuarios, $sistema->getJogos(), $sistema->getBoloes(), $sistema->getBugs());
						$_SESSION['sistema'] = $s;

						$arquivo = fopen('../bd/usuarios.txt', 'w+');
						for($j=0; $j<count($usuarios)-1; $j++){
							$alteracao = $usuarios[$j]->getTipo() . ';' . $usuarios[$j]->getNome() . ';' . $usuarios[$j]->getUsername() . ';' . $usuarios[$j]->getEmail() . ';' . $usuarios[$j]->getSenha() . ';' . $usuarios[$j]->getDataNascimento() . ';' . $usuarios[$j]->getGenero() . ';' . $usuarios[$j]->getRg() . ';' . $usuarios[$j]->getCpf() . ';' . $usuarios[$j]->getTelefone() . ';' . $usuarios[$j]->getCelular() . ';' . $usuarios[$j]->getBanco() . ';' . $usuarios[$j]->getAgencia() . ';' . $usuarios[$j]->getConta() . PHP_EOL;
								fwrite($arquivo, $alteracao);
						}

						fclose($arquivo);
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