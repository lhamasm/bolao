<?php
	class ReportarBugsTela{
		protected $onde;
		protected $descricao;
		protected $detalhes;

		function ReportarBugsTela($onde, $descricao, $detalhes){
			$this->onde = $onde;
			$this->descricao = $descricao;
			$this->detalhes = $detalhes;
		}

		function getOnde(){
			return $this->onde;
		}

		function getDescricao(){
			return $this->descricao;
		}

		function getDetalhes(){
			return $this->detalhes;
		}

		function setOnde($onde){
			$this->onde = $onde;
		}

		function setDescricao($descricao){
			$this->descricao = $descricao;
		}

		function setDetalhes($detalhes){
			$this->detalhes = $detalhes;
		}
	}
?>