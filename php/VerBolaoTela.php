<?php
	
	class VerBolaoTela
	{
		protected $titulobolao;
		protected $campeonato;
		protected $tipo;
		protected $criador;
		protected $descricao;
		protected $tipojogo;
		protected $tipoaposta;
		protected $escolhaaposta;
		protected $noparticipantes;
		protected $datatermino;
		
		function VerBolaoTela($titulobolao, $campeonato, $tipojogo, $tipo, $criador, $descricao, $tipoaposta, $escolhaaposta, $noparticipantes, $datatermino)
		{
		$this->titulobolao = $titulobolao;
		$this->campeonato = $campeonato;
		$this->tipojogo = $tipojogo;
		$this->tipo = $tipo;
		$this->criador = $criador;
		$this->descricao = $descricao;
		$this->tipoaposta = $tipoaposta;
		$this->escolhaaposta = $escolhaaposta;
		$this->noparticipantes = $noparticipantes;
		$this->datatermino = $datatermino;
		}

		function getTituloBolao(){
			return $this->titulobolao;
		}

		function setTituloBolao($titulobolao){
			$this->titulobolao = $titulobolao;
		}

		function getCampeonato(){
			return $this->campeonato;
		}

		function setCampeonato($campeonato){
			$this->campeonato = $campeonato;
		}

		function getTipoJogo(){
			return $this->tipojogo;
		}

		function setTipoJogo($tipojogo){
			$this->tipojogo = $tipojogo;
		}

		function getTipo(){
			return $this->tipo;
		}

		function setTipo($tipo){
			$this->tipo = $tipo;
		}

		function getCriador(){
			return $this->criador;
		}

		function setCriador($criador){
			$this->criador = $criador;
		}

		function getDescricao(){
			return $this->descricao;
		}

		function setDescricao($descricao){
			$this->descricao = $descricao;
		}

		function getTipoAposta(){
			return $this->tipoaposta;
		}

		function setTipoAposta($tipoaposta){
			$this->tipoaposta = $tipoaposta;
		}

		function getEscolhaAposta(){
			return $this->escolhaaposta;
		}

		function setEscolhaAposta($escolhaaposta){
			$this->escolhaaposta = $escolhaaposta;
		}

		function getNoParticipantes(){
			return $this->noparticipantes;
		}

		function setNoParticipantes($noparticipantes){
			$this->noparticipantes = $noparticipantes;
		}

		function getDataTermino(){
			return $this->datatermino;
		}

		function setDataTermino($datatermino){
			$this->datatermino = $datatermino;
		}
	}
?>