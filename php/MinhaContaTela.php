<?php

	require_once 'sistema.php';
	require_once 'usuario.php';
	require_once 'facade.php';
	require_once 'ArquivoUsuario.php';

	session_start();
	
	Class MinhaContaTela {
		protected $username;
		protected $email;
		protected $senha;
		protected $cmfsenha;

		protected $nome;
		protected $rg;
		protected $telefone;
		protected $genero;
		protected $dataDeNascimento;
		protected $celular;
		
		protected $banco;
		protected $agencia;
		protected $conta;

		//protected $reportarBugs;
		//protected $termosCondicoes

		//protected $posicao;
		//protected $pontuacao;
		//protected $campeonato;


		function MinhaContaTela($nome, $username, $email, $senha, $cmfsenha, $dataDeNascimento, $genero, $rg, $telefone, $celular, $banco, $agencia, $conta/*, $reportarBugs, $posicao, $pontuacao, $campeonato, $termosCondicoes*/){
			
			$this->nome = $nome;
			$this->username = $username;
			$this->email = $email;
			$this->senha = $senha;
			$this->cmfsenha = $cmfsenha;
			$this->dataDeNascimento = $dataDeNascimento;
			$this->genero = $genero;
			$this->rg = $rg;
			$this->telefone = $telefone;
			$this->celular = $celular;
			$this->banco = $banco;
			$this->agencia = $agencia;
			$this->conta = $conta;
			/*$this->reportarBugs = $reportarBugs;
			$this->posicao = $posicao;
			$this->pontuacao = $pontuacao;
			$this->campeonato = $campeonato;
			$this->termosCondicoes = $termosCondicoes;*/
		}

		function getNome(){
			return $this->nome;
		}

		function getUsername(){
			return $this->username;
		}

		function getEmail(){
			return $this->email;
		}

		function getSenha(){
			return $this->senha;
		}

		function getCmfsenha(){
			return $this->cmfsenha;
		}

		function getdataDeNascimento(){
			return $this->dataDeNascimento;
		}

		function getReportarBugs(){
			return $this->reportarBugs;
		}

		function getGenero(){
			return $this->genero;
		}

		function getRg(){
			return $this->rg;
		}

		function getTelefone(){
			return $this->telefone;
		}

		function getCelular(){
			return $this->celular;
		}

		function getBanco(){
			return $this->banco;
		}

		function getAgencia(){
			return $this->agencia;
		}

		function getConta(){
			return $this->conta;
		}

		function setNome($nome){
			$this->nome = $nome;
		}

		function setUsername($username){
			$this->username = $username;
		}

		function setEmail($email){
			$this->email = $email;
		}

		function setSenha($senha){
			$this->senha = $senha;
		}

		function setCmfsenha($senha){
			$this->cmfsenha = $senha;
		}

		function setdataDeNascimento($dataDeNascimento){
			$this->dataDeNascimento = $dataDeNascimento;
		}

		/*function setReportarBugs($reportarBugs){
			$this->reportarBugs = $reportarBugs;
		}*/

		function setGenero($genero){
			$this->genero = $genero;
		}

		function setRg($rg){
			$this->rg = $rg;
		}

		function setTelefone($telefone){
			$this->telefone = $telefone;
		}

		function setCelular($celular){
			$this->celular = $celular;
		}

		function setBanco($banco){
			$this->banco = $banco;
		}

		function setAgencia($agencia){
			$this->agencia = $agencia;
		}

		function setConta($conta){
			$this->conta = $conta;
		}

		/*function getPosicao(){
			return $this->posicao;
		}

		function setPosicao($posicao){
			$this->posicao = $posicao;
		}

		function getPontuacao(){
			return $this->pontuacao;
		}

		function setPontuacao($pontuacao){
			$this->pontuacao = $pontuacao;
		}

		function getCampeonato(){
			return $this->campeonato;
		}

		function setCampeonato($campeonato){
			$this->campeonato = $campeonato;
		}
		
		function getTermosCondicoes(){
			return $this->termosCondicoes;
		}

		function setTermosCondicoes($termosCondicoes){
			$this->termosCondicoes = $termosCondicoes;
		}*/

		function alterarDados() {
			if($this->senha == $this->cmfsenha){
				$sistema = $_SESSION["sistema"];
				$usuarios = $sistema->getUsuarios();

				for($i=0; $i < count($usuarios); $i++){
					if($usuarios[$i]->getCpf() == $_SESSION['login']){
						$usuarios[$i]->setNome($this->nome); 
						$usuarios[$i]->setUsername($this->username);
						$usuarios[$i]->setEmail($this->email);
						$usuarios[$i]->setSenha($this->senha);
						$usuarios[$i]->setDataNascimento($this->dataDeNascimento);
						$usuarios[$i]->setGenero($this->genero);
						$usuarios[$i]->setRg($this->rg);
						$usuarios[$i]->setTelefone($this->telefone);
						$usuarios[$i]->setCelular($this->celular);
						$usuarios[$i]->setBanco($this->banco);
						$usuarios[$i]->setAgencia($this->agencia);
						$usuarios[$i]->setConta($this->conta);

						$_SESSION["nome"] = $this->nome; 
						$_SESSION["username"] = $this->username;
						$_SESSION["email"] = $this->email;
						$_SESSION["senha"] = $this->senha;
						$_SESSION["rg"] = $this->rg;
						$_SESSION["ddn"] = $this->dataDeNascimento;
						$_SESSION["telefone"] = $this->telefone;
						$_SESSION["celular"] = $this->celular;
						$_SESSION["banco"] = $this->banco;
						$_SESSION["agencia"] = $this->agencia;
						$_SESSION["conta"] = $this->conta;

						for($j=0; $j<count($usuarios); $j++){
							$usuario = new ArquivoUsuario();
						    $facade = new Facade($usuario);
						    $facade->escreverEm('./bd/usuarios.txt', $usuarios[$i]);
						}
						$_SESSION['status'] = 1;
						header('Location: ../minha-conta.php');
						exit();
					}
				} 

				$_SESSION['status'] = 0;
				header('Location: ../minha-conta.php');
				exit();
			} else {
				$_SESSION['status'] = 2;
				header('Location: ../minha-conta.php');
				exit();
			}
		}
	}
?>