<?php
	class MeusBoloesTela{
		protected $reportarbugs;
		protected $posicao;
		protected $pontuacao;
		protected $nome;
		protected $campeonato;
		protected $boloes;
		protected $termosCondicoes
		protected $excluirparticipante

		function MeusBoloesTela($reportarbugs, $posicao, $pontuacao, $nome, $campeonato, $boloes, $termosCondicoes, $excluirparticipante)
		{
			$this->reportarbugs = $reportarbugs;
			$this->posicao = $posicao;
			$this->pontuacao = $pontuacao;
			$this->nome = $nome;
			$this->campeonato = $campeonato;
			$this->boloes = $boloes;
			$this->termosCondicoes = $termosCondicoes;
			$this->excluirparticipante = $excluirparticipante;

		}

		function getReportarBugs(){
			return $this->reportarbugs;
		}

		function setReportarBugs($reportarbugs){
			$this->reportarbugs = $reportarbugs;
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

		function getBoloes(){
			return $this->boloes;
		}

		function setBoloes($boloes){
			$this->boloes = $boloes;
		}

		function getTermosCondicoes(){
			return $this->termosCondicoes;
		}

		function setTermosCondicoes($termosCondicoes){
			$this->termosCondicoes = $termosCondicoes;
		}

		function getExcluirParticipante(){
			return $this->excluirparticipante;
		}

		function setExcluirParticipante($excluirparticipante){
			$this->excluirparticipante = $excluirparticipante;
		}
	}

?>