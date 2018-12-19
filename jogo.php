<?php

	class Jogo {
		protected $campeonato;
		protected $ano;
		protected $tipo;
		protected $dataProva;
		protected $tema;
		protected $ganhador;
		protected $ingredientes;
		protected $equipes;

		function Jogo($campeonato, $ano, $tipo, $dataProva, $tema, $ganhador, $ingredientes){
			$this->campeonato = $campeonato;
			$this->ano = $ano;
			$this->tipo = $tipo;
			$this->dataProva = $dataProva;
			$this->tema = $tema;
			$this->ganhador = $ganhador;
			$this->ingredientes = $ingredientes;
			$this->equipes = array();
		}

		function getCampeonato(){
			return $this->campeonato;
		}

		function setCampeonato($campeonato) {
			$this->campeonato = $campeonato;
		}

		function getAno(){
			return $this->ano;
		}

		function setAno($ano){
			$this->ano = $ano;
		}

		function getTipo(){
			return $this->tipo;
		}

		function setTipo($tipo){
			$this->tipo = $tipo;
		}

		function getData() {
			return $this->dataProva;
		}

		function setData($data) {
			$this->dataProva = $data;
		}

		function getTema(){
			return $this->tema;
		}

		function setTema($tema){
			$this->tema = $tema;
		}

		function getGanhador(){
			return $this->ganhador;
		}

		function setGanhador($ganhador){
			$this->ganhador = $ganhador;
		}

		function getIngredientes(){
			return $this->ingredientes;
		}

		function setIngredientes($ingredientes){
			$this->ingredientes = $ingredientes;
		}

		function getEquipes(){
			return $this->equipes;
		}

		function setEquipes($equipes){
			$this->equipes = $equipes;
		}
	}
?>