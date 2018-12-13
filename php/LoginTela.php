<?php

		session_start();

	  require_once 'sistema.php';
	  require_once 'usuario.php';
	  require_once 'funcoes.php';

	class LoginTela{
		protected $cpf;
		protected $senha;
		protected $lembreDeMim;

		function loginTela($cpf, $senha, $lembreDeMim){
			$this->cpf = $cpf;
			$this->senha = $senha;
			$this->lembreDeMim = $lembreDeMim;
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

				  		$mensagens = array();
				  		if(file_exists('../bd/mensagens-' . $_SESSION['login'] . '.txt')){
				  			$arquivo = fopen('../bd/mensagens-' . $_SESSION['login'] . '.txt', 'r+');
				  			while(!feof($arquivo)){
				  				$mensagem = fgets($arquivo);
				  				array_push($mensagens, $mensagem);
				  			}
				  			fclose($arquivo);
				  		}

				  		$_SESSION['msg'] = $mensagens;

				  		if($_SESSION["tipo"] == '0'){
				  			header('Location: ../pos-login.php');
				  		} else {
				  			header('Location: ../adm-page.php');
				  		}
						exit();
					} else {
						$_SESSION['status'] = 3;
						header('Location: ../login.php');
	    				exit();
					}
				} else {
					$_SESSION['status'] = 4;
					header('Location: ../login.php');
    				exit();
				}
			}

			$_SESSION['status'] = 2;
			//echo "Usuário não cadastrado no sistema";
			header('Location: ../login.php');
	    	exit();
		}

	}

?>