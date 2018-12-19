<?php
	class PosLoginTela{
		protected $posicao;
		protected $pontuacao;
		protected $competicoes
		protected $nome;
		protected $reportarBugs;
		protected $termosCondicoes

		function PosLoginTela($reportarBugs, $posicao, $pontuacao, $nome, $competicoes, $termosCondicoes)
		{
			$this->reportarBugs = $reportarBugs;
			$this->competicoes = $competicoes;
			$this->posicao = $posicao;
			$this->pontuacao = $pontuacao;
			$this->nome = $nome;
			$this->termosCondicoes = $termosCondicoes;
		}

		function getReportarBugs(){
			return $this->reportarBugs;
		}

		function setReportarBugs($reportarBugs){
			$this->reportarBugs = $reportarBugs;
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

		function getCompeticoes(){
			return $this->competicoes;
		}

		function setCompeticoes($competicoes){
			$this->competicoes = $competicoes;
		}

		function getTermosCondicoes(){
			return $this->termosCondicoes;
		}

		function setTermosCondicoes($termosCondicoes){
			$this->termosCondicoes = $termosCondicoes;
		}
	}
?>