<?php
	class ExcluirApostaTela{
		protected $booleana;

		function ExcluirApostaTela($booleana)
		{
			$this->booleana = $booleana;
		}

		function getBooleana(){
			return $this->booleana;
		}

		function setBooleana($booleana){
			$this->booleana = $booleana;
		}
	}

?>