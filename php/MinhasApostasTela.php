<?php

	class MinhasApostasTela{
		protected $reportarbugs;
		protected $editaraposta;
		protected $posicao;
		protected $pontuacao;
		protected $nome;
		protected $campeonato;
		protected $apostas;
		protected $termosCondicoes
		protected $excluiraposta;

		function MinhasApostasTela($reportarbugs, $editaraposta, $excluiraposta, $posicao, $pontuacao, $nome, $campeonato, $apostas, $termosCondicoes)
		{
			$this->reportarbugs = $reportarbugs;
			$this->editaraposta = $editaraposta;
			$this->excluiraposta = $excluiraposta;
			$this->posicao = $posicao;
			$this->pontuacao = $pontuacao;
			$this->nome = $nome;
			$this->campeonato = $campeonato;
			$this->apostas = $apostas;
			$this->termosCondicoes = $termosCondicoes
		}

		function getReportarBugs(){
			return $this->reportarbugs;
		}

		function setReportarBugs($reportarbugs){
			$this->reportarbugs = $reportarbugs;
		}

		function getEditarAposta(){
			return $this->editaraposta;
		}

		function setEditarAposta($editaraposta){
			$this->editaraposta = $editaraposta;
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

		function getTermosCondicoes(){
			return $this->termosCondicoes;
		}

		function setTermosCondicoes($termosCondicoes){
			$this->termosCondicoes = $termosCondicoes;
		}

		function getExcluirAposta(){
			return $this->excluiraposta;
		}

		function setExcluirAposta($excluiraposta){
			$this->excluiraposta = $excluiraposta;
		}
	}

?>