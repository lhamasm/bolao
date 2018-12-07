<?php

	require_once 'administrador.php';

	class AdministradorBolao extends Administrador {
		protected $bolao;

		function AdministradorBolao($bolao){
			$this->bolao = $bolao;
		}

		function getBolao(){
			return $this->bolao;
		}

		function setBolao($bolao) {
			$this->bolao = $bolao;
		}
	}

?>