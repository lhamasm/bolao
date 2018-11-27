<?php

	class Jogo {
		protected $id;
		protected $resultado;

		function Jogo($id, $resultado){
			$this->id = $id;
			$this->resultado = $resultado;
		}

		function setId($id){
			$this->id = $id;
		}

		function setResultado($resultado){
			$this->resultado = $resultado;
		}

		function getId(){
			return $this->id;
		}

		function getResultado(){
			return $this->resultado;
		}

		function exibirResultado(){

		}

		function armazenarResultados(){
			
		}
	}
?>