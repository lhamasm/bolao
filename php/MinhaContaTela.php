<?php
	
	Class CadastroTela {
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

		protected $reportarBugs;
		protected $termosCondicoes

		protected $posicao;
		protected $pontuacao;
		protected $campeonato;


		function CadastroTela($nome, $username, $email, $senha, $cmfsenha, $dataDeNascimento, $genero, $rg, $telefone, $celular, $banco, $agencia, $conta, $reportarBugs, $posicao, $pontuacao, $campeonato, $termosCondicoes){
			
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
			$this->reportarBugs = $reportarBugs;
			$this->posicao = $posicao;
			$this->pontuacao = $pontuacao;
			$this->campeonato = $campeonato;
			$this->termosCondicoes = $termosCondicoes;
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

		function setReportarBugs($reportarBugs){
			$this->reportarBugs = $reportarBugs;
		}

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

		function getPosicao(){
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
		}
	}
?>