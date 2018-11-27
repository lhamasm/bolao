<?php

	class Bolao {

		protected $criador;
		protected $tipo;
		protected $campeonato;
		protected $titulo;
		protected $descricao;
		protected $limiteDeParticipantes;
		protected $participantes;
		protected $tipoJogo;
		protected $tipoAposta;
		protected $opcoesAposta;
		protected $senha;
		protected $resultado;

		function Bolao($criador, $tipo, $campeonato, $titulo, $descricao, $limiteDeParticipantes, $participantes,$tipoJogo, $tipoAposta, $opcoesAposta, $senha){
			$this->criador = $criador;
			$this->tipo = $tipo;
			$this->campeonato = $campeonato;
			$this->titulo = $titulo;
			$this->descricao = $descricao;
			$this->limiteDeParticipantes = $limiteDeParticipantes;
			$this->participantes = $participantes;
			$this->tipoJogo = $tipoJogo;
			$this->tipoAposta = $tipoAposta;
			$this->opcoesAposta = $opcoesAposta;
			$this->senha = $senha;
		}

		function setCriador($criador){
			$this->criador = $criador;
		}

		function setTipo($tipo){
			$this->tipo = $tipo;
		}

		function setCampeonato($campeonato){
			$this->campeonato = $campeonato;
		}

		function setTitulo($titulo){
			$this->titulo = $titulo;
		}

		function setDescricao($descricao){
			$this->descricao = $descricao;
		}

		function setLimiteDeParticipantes($limiteDeParticipantes){
			$this->limiteDeParticipantes = $limiteDeParticipantes;
		}

		function setParticipantes($participantes){
			$this->participantes = $participantes;
		}

		function setTipoJogo($tipoJogo){
			$this->tipoJogo = $tipoJogo;
		}

		function setTipoAposta($tipoAposta){
			$this->tipoAposta = $tipoAposta;
		}

		function setOpcoesAposta($opcoesAposta){
			$this->opcoesAposta = $opcoesAposta;
		}

		function setSenha($senha){
			$this->senha = $senha;
		}

		function setResultado($resultado){
			$this->resultado = $resultado;
		}

		function getCriador(){
			return $this->criador;
		}

		function getCampeonato(){
			return $this->campeonato;
		}

		function getTitulo(){
			return $this->titulo;
		}

		function getDescricao(){
			return $this->descricao;
		}

		function getLimiteDeParticipantes(){
			return $this->limiteDeParticipantes;
		}

		function getParticipantes(){
			return $this->participantes;
		}

		function getTipoJogo(){
			return $this->tipoJogo;
		}

		function getTipoAposta(){
			return $this->tipoAposta;
		}

		function getOpcoesAposta(){
			return $this->opcoesAposta;
		}

		function getSenha(){
			return $this->senha;
		}

		function getResultado(){
			return $this->resultado;
		}

		function determinarVencedor(){

		}

		function calcularValorVencedor(){

		}

		function exibirJogos(){

		}

		function determinarTempoLimiteApostas(){

		}

		function verificarPosicaoRanking(){
			
		}
	}

?>