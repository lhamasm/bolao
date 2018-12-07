<?php
	
	class Convite{
		protected $enviador;
		protected $recebedor;
		protected $data;
		protected $bolao;

		function Convite($enviador, $recebedor, $bolao, $data) {
			$this->enviador = $enviador;
			$this->recebedor = $recebedor;
			$this->data = $data;
			$this->bolao = $bolao;
		}

		function setEnviador($enviador){
			$this->enviador = $enviador;
		}

		function setRecebedor($recebedor){
			$this->recebedor = $recebedor;
		}

		function setData($data){
			$this->data = $data;
		}

		function setBolao($bolao){
			$this->bolao = $bolao;
		}

		function getEnviador(){
			return $this->enviador;
		}

		function getRecebedor(){
			return $this->recebedor;
		}

		function getData(){
			return $this->data;
		}

		function getBolao(){
			return $this->bolao;
		}
	}
?>