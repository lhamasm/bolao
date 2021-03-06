<?php

	require_once 'sistema.php';
	require_once 'bolao.php';
	require_once 'jogo.php';
	
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
		protected $mensagens;

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
			$this->mensagens = array();

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

		function getMensagem(){
			return $this->mensagens;
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

		function setMensagem($mensagem){
			array_push($this->mensagens , $mensagem);
		}

		# Métodos
		function criarBolao($criador, $tipo, $campeonato, $titulo, $descricao, $limiteDeParticipantes, $tipoJogo, $tipoAposta, $opcoesAposta, $senha){

			$bolao = new Bolao($criador, $tipo, $campeonato, $titulo, $descricao, $limiteDeParticipantes, $tipoJogo, $tipoAposta, $opcoesAposta, $senha);

		}

		function verificarResultado($bolao){
			for($i = 0; $i < count($boloes); $i++){
				if($boloes[$i]->getTitulo() == $bolao){
					return $boloes[$i]->getResultado();
				}
			}
		}

		function consultarBolao($bolao){
			for($i = 0; $i < count($boloes); $i++){
				if($boloes[$i]->getTitulo() == $bolao){
					return $boloes[$i];
				}
			}
		}

		function consultarHistoricoAposta($usuario){
			for($i = 0; $i < count($usuarios); $i++){
				if($usuarios[$i]->getCpf() == $usuario){
					return $usuarios[$i]->getApostas();
				}
			}
		}

		function verificarResultado($jogo) {
			for($i = 0; $i < count($jogos); $i++){
				if($jogos[$i]->getId() == $jogo){
					return $jogos[$i];
				}
			}
		}

		function recebermensagem($mensagem){

		}
	}

?>