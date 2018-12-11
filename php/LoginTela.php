<?php

	class LoginTela{
		protected $cpf;
		protected $senha;
		protected $lembreDeMim;

		function loginTela($cpf, $senha, $lembreDeMim){
			$this->cpf = $cpf;
			$this->senha = $senha;
			$this->lembreDeMim = $lembreDeMim;
		}

		function getCPF(){
			return $this->cpf;
		}

		function getLembre(){
			return $this->lembreDeMim;
		}

		function getSenha(){
			return $this->senha;
		}

		function setCPF($cpf){
			$this->cpf = $cpf;
		}

		function setSenha($senha){
			$this->senha = $senha;
		}

		function setLembre($lembre){
			$this->lembreDeMim = $lembre;
		}

	}

?>