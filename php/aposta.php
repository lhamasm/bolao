<?php

	class Aposta {
		protected $usuario;
		protected $bolao;
		protected $valor;
		protected $opcaoDeAposta;
		protected $data;
		protected $status;

		function Aposta($usuario, $bolao, $valor,$opcaoDeAposta, $data, $status){
			$this->usuario = $usuario;
			$this->bolao = $bolao;
			$this->valor = $valor;
			$this->opcaoDeAposta = $opcaoDeAposta;
			$this->data = $data;
			$this->status = $status;
		}

		function setUsuario($usuario){
			$this->usuario = $usuario;
		}

		function setBolao($bolao){
			$this->bolao = $bolao;
		}

		function setValor($valor){
			$this->valor = $valor;
		}

		function setOpcaoDeAposta($opcaoDeAposta){
			$this->opcaoDeAposta = $opcaoDeAposta;
		}

		function setData($data){
			$this->data = $data;
		}

		function setStatus($status){
			$this->status = $status;
		}

		function getUsuario(){
			return $this->usuario;
		}

		function getBolao(){
			return $this->bolao;
		}

		function getOpcaoDeAposta(){
			return $this->opcaoDeAposta;
		}

		function getValor(){
			return $this->valor;
		}

		function getData(){
			return $this->data;
		}

		function getStatus(){
			return $this->status;
		}

	}

?>