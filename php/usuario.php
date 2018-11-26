<?php
	
	class Usuario {
		protected $nome;
		protected $username;
		protected $email;
		protected $senha;
		protected $dataNascimento;
		protected $genero;
		protected $rg;
		protected $cpf;
		protected $telefone;
		protected $celular;
		protected $banco;
		protected $agencia;
		protected $conta;

		# Construtor
		function Usuario($nome, $username, $email, $senha, $dataNascimento, $genero, $rg, $cpf, $telefone, $celular, $banco, $agencia, $conta){

			$this->nome = $nome;
			$this->username = $username;
			$this->email = $email;
			$this->senha = $senha;
			$this->dataNascimento = $dataNascimento;
			$this->genero = $genero;
			$this->rg = $rg;
			$this->cpg = $cpf;
			$this->telefone = $telefone;
			$this->celular = $celular;
			$this->banco = $banco;
			$this->agencia = $agencia;
			$this->conta = $conta;

		}

		# Getters e Setters

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

		function getDataNascimento(){
			return $this->dataNascimento;
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

		function setSenha($senha){
			$this->senha = $senha;
		}

		function setGenero($genero){
			$this->genero = $genero;
		}

		function setDataNascimento($dataNascimento){
			$this->dataNascimento = $dataNascimento;
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

		# Métodos
		function criarBolao(){

		}

		function verificarResultado($bolao){

		}

		function consultarBolao(){

		}

		function consultarHistoricoAposta(){

		}

		function verificarResultado($jogo) {

		}
	}

?>