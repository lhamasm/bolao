<?php
	class PessoalTela{
		protected $campeonato;
		protected $posicao;
		protected $pontuacao;
		protected $nome;
		protected $boloesdisponiveis;
		protected $apostar
		protected $verbolao;
		protected $provasresultados;
		protected $resultadosboloes;
		protected $reportarbugs;
		protected $termosCondicoes;

		function PessoalTela($campeonato, $posicao, $pontuacao, $nome, $boloesdisponiveis, $apostar, $verbolao, $provasresultados, $resultadosboloes, $reportarbugs, $termosCondicoes)
		{
			$this->campeonato = $campeonato;
			$this->posicao = $posicao;
			$this->pontuacao = $pontuacao;
			$this->nome = $nome;
			$this->boloesdisponiveis = $boloesdisponiveis;
			$this->apostar = $apostar;
			$this->verbolao = $verbolao;
			$this->provasresultados = $provasresultados;
			$this->resultadosboloes = $resultadosboloes;
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

		function getBoloesDisponiveis(){
			return $this->boloesdisponiveis;
		}

		function setBoloesDisponiveis($boloesdisponiveis){
			$this->boloesdisponiveis = $boloesdisponiveis;
		}

		function getApostar(){
			return $this->apostar;
		}

		function setApostar($apostar){
			$this->apostar = $apostar;
		}

		function getVerbolao(){
			return $this->verbolao;
		}

		function setVerbolao($verbolao){
			$this->verbolao = $verbolao;
		}

		function getProvasResultados(){
			return $this->provasresultados;
		}

		function setProvasResultados($provasresultados){
			$this->provasresultados = $provasresultados;
		}

		function getResultadosBoloes(){
			return $this->resultadosboloes;
		}

		function setResultadosBoloes($resultadosboloes){
			$this->resultadosboloes = $resultadosboloes;
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