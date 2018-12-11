<?php
	class PessoalTela{
		protected $campeonato;
		protected $posicao;
		protected $pontuacao;
		protected $nome;
		protected $campeonatobolao;
		protected $tipobolao
		protected $nomebolao;
		protected $descricaobolao;
		protected $noparticipantesbolao;
		protected $escolhasapostabolao;
		protected $tipojogobolao;
		protected $tipoapostabolao;
		protected $reportarbugs;
		protected $termosCondicoes;

		function PessoalTela($campeonato, $posicao, $pontuacao, $nome, $campeonatobolao, $tipobolao, $nomebolao, $descricaobolao, $noparticipantesbolao, $reportarbugs, $termosCondicoes, $escolhasapostabolao, $tipojogobolao, $tipoapostabolao)
		{
			$this->campeonato = $campeonato;
			$this->posicao = $posicao;
			$this->pontuacao = $pontuacao;
			$this->nome = $nome;
			$this->campeonatobolao = $campeonatobolao;
			$this->tipobolao = $tipobolao;
			$this->nomebolao = $nomebolao;
			$this->descricaobolao = $descricaobolao;
			$this->noparticipantesbolao = $noparticipantesbolao;
			$this->reportarbugs = $reportarbugs;
			$this->termosCondicoes = $termosCondicoes;
			$this->escolhasapostabolao = $escolhasapostabolao;
			$this->tipojogobolao = $tipojogobolao;
			$this->tipoapostabolao = $tipoapostabolao;
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

		function getCampeonatoBolao(){
			return $this->campeonatobolao;
		}

		function setCampeonatoBolao($campeonatobolao){
			$this->campeonatobolao = $campeonatobolao;
		}

		function getTipoBolao(){
			return $this->tipobolao;
		}

		function setTipoBolao($tipobolao){
			$this->tipobolao = $tipobolao;
		}

		function getNomeBolao(){
			return $this->nomebolao;
		}

		function setNomeBolao($nomebolao){
			$this->nomebolao = $nomebolao;
		}

		function getDescricaoBolao(){
			return $this->descricaobolao;
		}

		function setDescricaoBolao($descricaobolao){
			$this->descricaobolao = $descricaobolao;
		}

		function getNoParticipantesBolao(){
			return $this->noparticipantesbolao;
		}

		function setNoParticipantesBolao($noparticipantesbolao){
			$this->noparticipantesbolao = $noparticipantesbolao;
		}

		function getEscolhasApostaBolao(){
			return $this->escolhasapostabolao;
		}

		function setEscolhasApostaBolao($escolhasapostabolao){
			$this->escolhasapostabolao = $escolhasapostabolao;
		}

		function getTipoJogoBolao(){
			return $this->tipojogobolao;
		}

		function setTipoJogoBolao($tipojogobolao){
			$this->tipojogobolao = $tipojogobolao;
		}

		function getTipoApostaBolao(){
			return $this->tipoapostabolao;
		}

		function setTipoApostaBolao($tipoapostabolao){
			$this->tipoapostabolao = $tipoapostabolao;
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