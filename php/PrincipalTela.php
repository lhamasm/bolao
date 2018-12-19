<?php
	class PrincipalTela{
		protected $participantes;
		protected $ranking;
		protected $noticias;

		function PrincipalTela($participantes, $ranking, $noticias)
		{
			$this->participantes = $participantes;
			$this->ranking = $ranking;
			$this->noticias = $noticias;
		}

		function getParticipantes(){
			return $this->participantes;
		}

		function setParticipantes($participantes){
			$this->participantes = $participantes;
		}

		function getRanking(){
			return $this->ranking;
		}

		function setRanking($ranking){
			$this->ranking = $ranking;
		}

		function getNoticias(){
			return $this->noticias;
		}

		function setNoticias($noticias){
			$this->noticias = $noticias;
		}
	}
?>