<?php
	 
	 class HistoricoApostasTela
	 {

	 	protected $campeonato;
		protected $posicao;
		protected $pontuacao;
		protected $nome;
		protected $apostas
		protected $reportarbugs;
		protected $termosCondicoes;
	 	
	 	function HistoricoApostasTela($campeonato, $posicao, $pontuacao, $nome, $apostas, $reportarbugs, $termosCondicoes)
	 	{
	 		$this->campeonato = $campeonato;
			$this->posicao = $posicao;
			$this->pontuacao = $pontuacao;
			$this->nome = $nome;
			$this->apostas = $apostas;
			$this->reportarbugs = $reportarbugs;
			$this->termosCondicoes = $termosCondicoes;
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

		function getNome(){
			return $this->nome;
		}

		function setNome($nome){
			$this->nome = $nome;
		}

		function getCampeonato(){
			return $this->campeonato;
		}

		function setCampeonato($campeonato){
			$this->campeonato = $campeonato;
		}

		function getApostas(){
			return $this->apostas;
		}

		function setApostas($apostas){
			$this->apostas = $apostas;
		}

		function getReportarBugs(){
			return $this->reportarbugs;
		}

		function setReportarBugs($reportarbugs){
			$this->reportarbugs = $reportarbugs;
		}

		function getTermosCondicoes(){
			return $this->termosCondicoes;
		}

		function setTermosCondicoes($termosCondicoes){
			$this->termosCondicoes = $termosCondicoes;
		}
	 }
?>