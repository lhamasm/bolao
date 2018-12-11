<?php
	
	Class CadastroTela {
		protected $nome;
		protected $username;
		protected $email;
		protected $cmfemail;
		protected $senha;
		protected $cmfsenha;
		protected $dia;
		protected $mes;
		protected $ano;
		protected $genero;
		protected $rg;
		protected $cpf;
		protected $telefone;
		protected $celular;
		protected $banco;
		protected $agencia;
		protected $conta;


		function CadastroTela($nome, $username, $email, $cmfemail, $senha, $cmfsenha, $dia, $mes, $ano, $genero, $rg, $cpf, $telefone, $celular, $banco, $agencia, $conta){
			
			$this->nome = $nome;
			$this->username = $username;
			$this->email = $email;
			$this->cmfemail = $cmfemail;
			$this->senha = $senha;
			$this->cmfsenha = $cmfsenha;
			$this->dia = $dia;
			$this->mes = $mes;
			$this->ano = $ano;
			$this->genero = $genero;
			$this->rg = $rg;
			$this->cpf = $cpf;
			$this->telefone = $telefone;
			$this->celular = $celular;
			$this->banco = $banco;
			$this->agencia = $agencia;
			$this->conta = $conta;
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

		function getCmfemail(){
			return $this->cmfemail;
		}

		function getSenha(){
			return $this->senha;
		}

		function getCmfsenha(){
			return $this->cmfsenha;
		}

		function getDia(){
			return $this->dia;
		}

		function getMes(){
			return $this->mes;
		}

		function getAno(){
			return $this->ano;
		}

		function getGenero(){
			return $this->genero;
		}

		function getRg(){
			return $this->rg;
		}

		function getCpf(){
			return $this->cpf;
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

		function setCmfemail($email){
			$this->cmfemail = $email;
		}

		function setSenha($senha){
			$this->senha = $senha;
		}

		function setCmfsenha($senha){
			$this->cmfsenha = $senha;
		}

		function setDia($dia){
			$this->dia = $dia;
		}

		function setMes($mes){
			$this->mes = $mes;
		}

		function setAno($ano){
			$this->ano = $ano;
		}

		function setGenero($genero){
			$this->genero = $genero;
		}

		function setRg($rg){
			$this->rg = $rg;
		}

		function setCpf($cpf){
			$this->cpf = $cpf;
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
		
	}
?>