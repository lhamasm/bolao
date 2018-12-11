<?php
	class EsqueciSenhaTela {
		protected $cpf;
		protected $email;
		protected $dataDeNascimento;

		function EsqueciSenhaTela($cpf, $email, $dataDeNascimento)
		{
			$this->cpf = $cpf;
			$this->email = $email;
			$this->dataDeNascimento = $dataDeNascimento;
		}

		function getCpf(){
			return $this->cpf;
		}

		function getEmail(){
			return $this->email;
		}

		function getDataDeNascimento(){
			return $this->dataDeNascimento;
		}

		function setCpf($cpf){
			$this->cpf = $cpf;
		}

		function setEmail($email){
			$this->email = $email;
		}

		function setDataDeNascimento($dataDeNascimento){
			$this->dataDeNascimento = $dataDeNascimento;
		}
	}
?>