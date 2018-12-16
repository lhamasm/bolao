<?php

	require_once 'administrador.php';

	class AdministradorBolao extends Administrador {
		protected $bolao;

		function AdministradorBolao($tipo, $nome, $username, $email, $senha, $dataNascimento, $genero, $rg, $cpf, $telefone, $celular, $banco, $agencia, $conta){
			parent::Usuario($tipo, $nome, $username, $email, $senha, $dataNascimento, $genero, $rg, $cpf, $telefone, $celular, $banco, $agencia, $conta);
			$this->bolao = array();
		}

		function getBolao(){
			return $this->bolao;
		}

		function setBolao($bolao) {
			array_push($this->bolao, $bolao);
		}

		function logar(){
			$sistema = $_SESSION["sistema"];
			$usuarios = $sistema->getUsuarios();
			for($i = 0; $i < count($usuarios); $i++){				
				if(p_respostas($usuarios[$i]->getCpf()) == $this->cpf){
					if($usuarios[$i]->getSenha() == $this->senha){
						$_SESSION["tipo"] = $usuarios[$i]->getTipo();
						$_SESSION["login"] = $this->cpf;
				  		$_SESSION["nome"] = $usuarios[$i]->getNome();
				  		$_SESSION["username"] = $usuarios[$i]->getUsername();
				  		$_SESSION["email"] = $usuarios[$i]->getEmail();
				  		$_SESSION["senha"] = $this->senha;
				  		$_SESSION["rg"] = $usuarios[$i]->getRg();
				  		$_SESSION["ddn"] = $usuarios[$i]->getDataNascimento();
				  		$_SESSION["telefone"] = $usuarios[$i]->getTelefone();
				  		$_SESSION["celular"] = $usuarios[$i]->getCelular();
				  		$_SESSION["banco"] = $usuarios[$i]->getBanco();
				  		$_SESSION["agencia"] = $usuarios[$i]->getAgencia();
				  		$_SESSION["conta"] = $usuarios[$i]->getConta();
				  		$_SESSION["genero"] = $usuarios[$i]->getGenero(); 
				  		$_SESSION["ranking"] = $usuarios[$i]->getPosicao();
				  		$_SESSION["pontuacao"] = $usuarios[$i]->getPontuacao();

				  		$mensagem = new ArquivoMensagem();
				  		$facade = new Facade($mensagem);
				  		$facade->lerDe('../bd/mensagens-' . $_SESSION['login'] . '.txt');

				  		header('Location: ../pos-login.php');

						exit();
					} else {
						$_SESSION['status'] = 3;
						header('Location: ../login.php');
	    				exit();
					}
				}
			}

			$_SESSION['status'] = 2;
			$_SESSION['tamanho'] = count($sistema->getUsuarios());
			//echo "Usuário não cadastrado no sistema";
			header('Location: ../login.php');
	    	exit();
		}
	}

?>