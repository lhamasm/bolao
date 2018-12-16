<?php

	  require_once 'sistema.php';
	  require_once 'administrador-sistema.php';
	  require_once 'apostador.php';
	  require_once 'funcoes.php';
	  require_once 'facade.php';
	  require_once 'ArquivoMensagem.php';

	//session_start();

	class LoginTela{
		protected $cpf;
		protected $senha;
		protected $lembreDeMim;
		private $strategy;

		function loginTela($cpf, $senha, $lembreDeMim){
			$this->cpf = $cpf;
			$this->senha = $senha;
			$this->lembreDeMim = $lembreDeMim;

			$usuarios = array();

			for($i=0; $i<count($_SESSION['sistema']->getUsuarios()); $i++){
				if($_SESSION['sistema']->getUsuarios()[$i]->getCpf() == $this->cpf){
					if($_SESSION['sistema']->getUsuarios()[$i]->getSenha() == $this->senha){
						if($_SESSION['sistema']->getUsuarios()[$i]->getTipo() == '0') {
							$this->strategy = new Apostador($_SESSION['sistema']->getUsuarios()[$i]->getTipo(), $_SESSION['sistema']->getUsuarios()[$i]->getNome(), $_SESSION['sistema']->getUsuarios()[$i]->getUsername(), $_SESSION['sistema']->getUsuarios()[$i]->getEmail(), $_SESSION['sistema']->getUsuarios()[$i]->getSenha(), $_SESSION['sistema']->getUsuarios()[$i]->getDataNascimento(), $_SESSION['sistema']->getUsuarios()[$i]->getGenero(), $_SESSION['sistema']->getUsuarios()[$i]->getRg(), $_SESSION['sistema']->getUsuarios()[$i]->getCpf(),$_SESSION['sistema']->getUsuarios()[$i]->getTelefone(), $_SESSION['sistema']->getUsuarios()[$i]->getCelular(), $_SESSION['sistema']->getUsuarios()[$i]->getBanco(), $_SESSION['sistema']->getUsuarios()[$i]->getAgencia(), $_SESSION['sistema']->getUsuarios()[$i]->getConta(), $_SESSION['sistema']->getUsuarios()[$i]->getPosicao(), $_SESSION['sistema']->getUsuarios()[$i]->getPontuacao());

							array_push($usuarios, $this->strategy);
						} else {
							$this->strategy = new AdministradorSistema($_SESSION['sistema']->getUsuarios()[$i]->getTipo(), $_SESSION['sistema']->getUsuarios()[$i]->getNome(), $_SESSION['sistema']->getUsuarios()[$i]->getUsername(), $_SESSION['sistema']->getUsuarios()[$i]->getEmail(), $_SESSION['sistema']->getUsuarios()[$i]->getSenha(), $_SESSION['sistema']->getUsuarios()[$i]->getDataNascimento(), $_SESSION['sistema']->getUsuarios()[$i]->getGenero(), $_SESSION['sistema']->getUsuarios()[$i]->getRg(), $_SESSION['sistema']->getUsuarios()[$i]->getCpf(),$_SESSION['sistema']->getUsuarios()[$i]->getTelefone(), $_SESSION['sistema']->getUsuarios()[$i]->getCelular(), $_SESSION['sistema']->getUsuarios()[$i]->getBanco(), $_SESSION['sistema']->getUsuarios()[$i]->getAgencia(), $_SESSION['sistema']->getUsuarios()[$i]->getConta());

							array_push($usuarios, $this->strategy);
						}
					} else {
						$this->strategy = null;
						$_SESSION['status'] = 3;
					}
				} else {
					array_push($usuarios, $_SESSION['sistema']->getUsuarios()[$i]);
				}
			}

			$s = new Sistema($usuarios, $_SESSION['sistema']->getJogos(), $_SESSION['sistema']->getBoloes(), $_SESSION['sistema']->getBugs());
			$_SESSION['sistema'] = $s;
		}

		function getCPF(){
			return $this->cpf;
		}

		function getLembre(){
			return $this->lembreDeMim;
		}

		function getSenha(){
			return $this->senha;
		}

		function setCPF($cpf){
			$this->cpf = $cpf;
		}

		function setSenha($senha){
			$this->senha = $senha;
		}

		function setLembre($lembre){
			$this->lembreDeMim = $lembre;
		}

		function login() {
			if($this->strategy == null){
				
				if($_SESSION['status'] != 3){
					$_SESSION['status'] = 2;
				}				
				//$_SESSION['tamanho'] = count($sistema->getUsuarios());
				//echo "Usuário não cadastrado no sistema";
				header('Location: ../login.php');
		    	exit();
			}
			$this->strategy->logar();
		}

	}

?>