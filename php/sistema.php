<?php

	require_once 'bolao.php';
	require_once 'jogo.php';
	require_once 'usuario.php';
	require_once 'bug.php';

	class Sistema {
		protected $usuarios;
		protected $jogos;
		protected $boloes;
		protected $bugs;
	}

	function Sistema($usuarios, $jogos, $boloes, $bugs){
		$this->usuarios = $usuarios;
		$this->jogos = $jogos;
		$this->boloes = $boloes;
		$this->bugs = $bugs;
	}

	function Sistema(){
		$this->usuarios = array();
		$this->jogos = array();
		$this->boloes = array();
		$this->bugs = array();
	}

	function setUsuarios($usuarios){
		$this->usuarios = $usuarios; //.push?
	}

	function setJogos($jogos){
		$this->jogos = $jogos; //.push?
	}

	function setBoloes($boloes){
		$this->boloes = $boloes; //.push?
	}

	function setBugs($bugs){
		$this->bugs = $bugs; //.push?
	}

	function getUsuarios(){
		return $this->usuarios; 
	}

	function getJogos(){
		return $this->jogos;
	}

	function getBoloes(){
		return $this->boloes;
	}

	function getBugs(){
		return $this->bugs;
	}

	function criarBolao($criador, $tipo, $campeonato, $titulo, $descricao, $limiteDeParticipantes, $tipoJogo, $tipoAposta, $opcoesAposta, $senha){

			$bolao = new Bolao($criador, $tipo, $campeonato, $titulo, $descricao, $limiteDeParticipantes, $tipoJogo, $tipoAposta, $opcoesAposta, $senha);

	}

	function consultarBolao($bolao){
			for($i = 0; $i < count($boloes); $i++){
				if($boloes[$i]->getTitulo() == $bolao){
					return $boloes[$i];
				}
			}
		}

	function excluirBolao($bolao){
		for($i = 0; $i < count($boloes); $i++){
			if($boloes[$i]->getTitulo() == $bolao){
				array_splice($boloes, $i, 1);
			}
		}
	}
	function criarUsuario(){

	}

	function consultarUsuario($cpf, $senha){
		
	}

	function excluirUsuario($usuario) {
		for($i = 0; $i < count($usuarios); $i++){
			if($usuarios[$i]->getCpf() == $usuario){
				array_splice($usuarios, $i, 1);
			}
		}
	}

	function adicionarBug(){

	}

	function apagarBug($bug){
		for ($i=0; $i < count($bugs); $i++) { 
			if ($bugs[$i].getId() == $bug) {
				array_splice($bugs, $i, 1);
			}
		}
	}

	function adicionarJogo(){

	}

	function consultarJogo(){

	}

	function excluirJogo(){
		
	}

?>