<?php

	require_once 'sistema.php';
	require_once 'apostador.php';

	class Bolao {

		protected $id;
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
		protected $ganhadores;
		protected $dinheiros;
		protected $tempoLimite;
		protected $apostas;

		function Bolao($id, $criador, $tipo, $campeonato, $titulo, $descricao, $limiteDeParticipantes, $tipoJogo, $tipoAposta, $opcoesAposta, $senha, $dinheiros){
			$this->id = $id;
			$this->criador = $criador;
			$this->tipo = $tipo;
			$this->campeonato = $campeonato;
			$this->titulo = $titulo;
			$this->descricao = $descricao;
			$this->limiteDeParticipantes = $limiteDeParticipantes;
			$this->participantes = array();
			$this->tipoJogo = $tipoJogo;
			$this->tipoAposta = $tipoAposta;
			$this->opcoesAposta = $opcoesAposta;
			$this->senha = $senha;
			$this->dinheiros = $dinheiros;
			$this->ganhadores = array();
			$this->resultado = array();
			$this->tempoLimite = 0;
			$this->apostas = array();
		}

		function setId($id){
			$this->id = $id;
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

		function setParticipantes($participante){
			array_push($this->participantes, $participante);
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

		function setDinheiros($valor){
			$this->dinheiros += $valor;
		}

		function setTempoLimite($tempoLimite){
			$this->tempoLimite = $tempoLimite;
		}

		function setApostas($aposta){
			array_push($this->apostas, $aposta);
		}

		function getId(){
			return $this->id;
		}

		function getTipo(){
			return $this->tipo;
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

		function getTempoLimite(){
			return $this->tempoLimite;
		}

		function getApostas(){
			return $this->apostas;
		}

		function getDinheiros(){
			return $this->dinheiros;
		}


		/*function determinarVencedor($jogos){

			for($i = 0; $i < count($this->tipoJogo); $i++){
				for($j = 0; $j < count($jogos); $j++){
					if($this->tipoJogo[$i]->getId() == $jogos[$j]->getId()){
						if($jogos[$j]->getResultado == ''){
							return -1;
						}
					}
				}
			}

			for($i = 0; $i < count($this->participantes); $i++){
				$a = ($this->participantes[$i])->getApostas();
				for($j = 0; $j < count($a); $j++){
					if($a[$j]->getBolao() == $this->titulo) {
						if($a[$j]->getOpcaoDeAposta() == $this->resultado){
							array_push($this->ganhadores, $this->participantes[$i]);
						}
					}
				}
			}

			return $this->ganhadores;

		}*/

		function calcularValorVencedor(){
			$g = determinarVencedor();

			return $this->dinheiros/count($g);
		}
	}
?>