<?php
	class TermosCondicoesTela{
		protected $texto;

		function TermosCondicoesTela($texto){
			$this->texto = $texto;
		}

		function getTexto(){
			return $this->texto;
		}

		function setTexto($texto){
			$this->texto = $texto;
		}
	}
?>