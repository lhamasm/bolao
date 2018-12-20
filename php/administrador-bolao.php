<?php

	require_once 'sistema.php';
	require_once 'administrador.php';
	require_once 'jogo.php';
	require_once 'bolao.php';
	require_once 'ArquivoJogos.php';
	require_once 'ArquivoUsuario.php';
	require_once 'ArquivoBolao.php';
	require_once 'facade.php';

	class AdministradorBolao extends Administrador {
		protected $bolao;

		function AdministradorBolao($tipo, $nome, $username, $email, $senha, $dataNascimento, $genero, $rg, $cpf, $telefone, $celular, $banco, $agencia, $conta){
			parent::Administrador($tipo, $nome, $username, $email, $senha, $dataNascimento, $genero, $rg, $cpf, $telefone, $celular, $banco, $agencia, $conta);
			$this->bolao = array();
		}

		function getBolao(){
			return $this->bolao;
		}

		function setBolao($bolao) {
			array_push($this->bolao, $bolao);
		}
	}

?>