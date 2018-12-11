<?php

	class EditarApostaTela{
		protected $valor;
		protected $opcaoAposta;

		function EditarApostaTela($valor, $opcaoAposta)
		{
			$this->valor = $valor;
			$this->opcaoAposta = $opcaoAposta;
		}

		function getValor(){
			return $this->valor;
		}

		function setValor($valor){
			$this->valor = $valor;
		}

		function getOpcaoAposta(){
			return $this->opcaoAposta;
		}

		function setOpcaoAposta($opcaoAposta){
			$this->opcaoAposta = $opcaoAposta;
		}
	}

?>