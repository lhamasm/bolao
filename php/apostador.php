<?php

	require_once 'usuario.php';
	require_once 'facade.php';
	require_once 'ArquivoMensagem.php';
	require_once 'funcoes.php';
	
	class Apostador extends Usuario {
		protected $posicao;
		protected $pontuacao;
		protected $apostas;

		# Construtor
		function Apostador($tipo, $nome, $username, $email, $senha, $dataNascimento, $genero, $rg, $cpf, $telefone, $celular, $banco, $agencia, $conta, $posicao, $pontuacao){
			parent::Usuario($tipo, $nome, $username, $email, $senha, $dataNascimento, $genero, $rg, $cpf, $telefone, $celular, $banco, $agencia, $conta);
			$this->posicao = $posicao;
			$this->pontuacao = $pontuacao;
			$this->apostas = array();
		}

		# Gettes e Setters
		function getPosicao() {
			return $this->posicao;
		}

		function getPontuacao() {
			return $this->pontuacao;
		}

		function getApostas(){
			return $this->apostas;
		}

		function setPosicao($posicao) {
			$this->posicao = $posicao;
		}

		function setPontuacao($pontuacao) {
			$this->pontuacao += $pontuacao;
		}

		function setApostas($aposta){
			array_push($this->apostas, $aposta);
		}

		# Métodos
		function reportarBugs($texto) {
			$mensagem = new Mensagem($texto);
			$sistema->setBugs($mensagem);
		}

		function apostar($usuario, $bolao, $valor, $opcaoDeAposta){
			if ($bolao->getLimiteDeParticipantes() > count($bolao->getParticipantes())) {
				$aposta = new Aposta($usuario, $bolao, $valor, $opcaoDeAposta);
				array_push($this->apostas, $aposta);

				for ($i=0; $i < count($bolao->getParticipantes()); $i++) { 
					if (($bolao->getParticipantes())[$i] == $usuario) {
						break;
					}
				}

				if ($i ==  count($bolao->getParticipantes())) {
					$bolao->setParticipantes($usuario);
				}
				
				$bolao->setApostas($aposta);
				$bolao->setDinheiros(doubleval($valor));

			}
			else {
				echo 'Limite de Participantes atingido';
			}
		}

		function editarAposta($aposta, $data) {
			if ($data < $bolao->getTempoLimite()) {
				for ($i=0; $i < count(($aposta->getBolao())->getApostas()); $i++) { 
					if ((($aposta->getBolao())->getApostas())[$i] == $aposta) {
						# edit aposta here
					}
				}
			}
			else {
				return -1;
			}
		}

		function aceitarConvite() {
			
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