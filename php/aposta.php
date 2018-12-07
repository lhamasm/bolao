<?php

	class Aposta {
		protected $usuario;
		protected $bolao;
		protected $valor;
		protected $opcaoDeAposta;

		function Aposta($usuario, $bolao, $valor,$opcaoDeAposta){
			$this->usuario = $usuario;
			$this->bolao = $bolao;
			$this->valor = $valor;
			$this->opcaoDeAposta = $opcaoDeAposta;
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

		function getUsuario(){
			return $this->usuario;
		}

		function getBolao(){
			return $this->bolao;
		}

		function getOpcaoDeAposta(){
			return $this->opcaoDeAposta;
		}

	}

?>