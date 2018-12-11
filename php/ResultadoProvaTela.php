<?php
	class ResultadoProvaTela {
		protected $prova;
		protected $ganhadores;

		function ResultadoProvaTela($prova, $ganhadores)
		{
			$this->prova = $prova;
			$this->ganhadores = $ganhadores;
		}

		function getProva(){
			return $this->prova;
		}

		function setProva($prova){
			$this->prova = $prova;
		}

		function getGanhadores(){
			return $this->ganhadores;
		}

		function setGanhadores($ganhadores){
			$this->ganhadores = $ganhadores;
		}
	}
?>