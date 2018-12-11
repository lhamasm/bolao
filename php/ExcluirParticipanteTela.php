<?php
	class ExcluirParticipanteTela{
		protected $booleana;

		function ExcluirParticipanteTela($booleana)
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