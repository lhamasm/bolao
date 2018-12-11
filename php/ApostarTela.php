<?php
	
	class ApostarTela
	{
		protected $titulobolao;
		protected $valor;
		protected $opcao;
		protected $banco;
		protected $agencia;
		protected $conta;
		
		function ApostarTela($titulobolao, $valor, $opcao, $banco, $agencia, $conta)
		{
		$this->titulobolao = $titulobolao;
		$this->valor = $valor;
		$this->opcao = $opcao;
		$this->banco = $banco;
		$this->agencia = $agencia;
		$this->conta = $conta;
		}

		function getTituloBolao(){
			return $this->titulobolao;
		}

		function setTituloBolao($titulobolao){
			$this->titulobolao = $titulobolao;
		}

		function getValor(){
			return $this->valor;
		}

		function setValor($valor){
			$this->valor = $valor;
		}

		function getOpcao(){
			return $this->opcao;
		}

		function setOpcao($opcao){
			$this->opcao = $opcao;
		}

		function getBanco(){
			return $this->banco;
		}

		function setBanco($banco){
			$this->banco = $banco;
		}

		function getAgencia(){
			return $this->agencia;
		}

		function setAgencia($agencia){
			$this->agencia = $agencia;
		}

		function getConta(){
			return $this->conta;
		}

		function setConta($conta){
			$this->conta = $conta;
		}
	}
?>