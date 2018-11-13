<?php

	$nome = "";
	$username = "";
	$email = "";
	$confirmarEmail = "";
	$senha = "";
	$confirmarSenha = "";
	$dia = "";
	$mes = "";
	$ano = "";
	$banco = "";
	$agencia = "";
	$conta = "";
	$termos = "";
	$genero = "";

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$nome = p_respostas($_REQUEST['nome']);
		echo $nome;
		$username = p_respostas($_REQUEST['username']);
		echo $username;
		$email = p_respostas($_REQUEST['email']);
		echo $email;
		$confirmarEmail = p_respostas($_REQUEST['cmfemail']);
		echo $confirmarEmail;
		$senha = p_respostas($_REQUEST['senha']);
		echo $senha;
		$confirmarSenha = p_respostas($_REQUEST['cmfsenha']);
		echo $confirmarSenha;
		$dia = $_REQUEST['dia'];
		echo $dia;
		$mes = $_REQUEST['mes'];
		echo $mes;
		$ano = $_REQUEST['ano'];
		echo $ano;
		$banco = p_respostas($_REQUEST['banco']);
		echo $banco;
		$agencia = p_respostas($_REQUEST['agencia']);
		echo $agencia;
		$conta = p_respostas($_REQUEST['conta']);
		echo $conta;
		$termos = $_REQUEST['termos'];
		echo $termos;
		$genero = $_REQUEST['genero'];
		echo $genero;
	}

	function p_respostas($dado) {
		$dado = trim($dado); // retirar espaços extras, tabs, enter 
		$dado = stripslashes($dado); // retirar barra invertida
		$dado = htmlspecialchars($dado);

		return $dado;
	}

	function confirmation($dado1, $dado2){
		if($dado1 == $dado2) return true;
		else return false;
	}

?>