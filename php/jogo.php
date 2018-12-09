<?php

	class Jogo {
		protected $id;
		protected $resultado;
		protected $data;

		function Jogo($id, $resultado, $data){
			$this->id = $id;
			$this->resultado = $resultado;
			$this->data = $data;
		}

		function setId($id){
			$this->id = $id;
		}

		function setResultado($resultado){
			$this->resultado = $resultado;
		}

		function setData($data){
			$this->data = $data;
		}

		function getId(){
			return $this->id;
		}

		function getResultado(){
			return $this->resultado;
		}

		function getData(){
			return $this->data;
		}
	}
?>