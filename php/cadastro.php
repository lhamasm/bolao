<?php
	require_once 'funcoes.php';

	$tipo = 0;
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
	$rg = "";
	$cpf = "";
	$telefone = "";
	$celular = "";

	if($_SERVER['REQUEST_METHOD'] == 'POST'){

		$nome = p_respostas($_REQUEST['nome']);
		$username = p_respostas($_REQUEST['username']);
		$email = p_respostas($_REQUEST['email']);
		$confirmarEmail = p_respostas($_REQUEST['cmfemail']);
		$senha = p_respostas($_REQUEST['senha']);
		$confirmarSenha = p_respostas($_REQUEST['cmfsenha']);
		$dia = $_REQUEST['dia'];
		$mes = conversao_mes($_REQUEST['mes']);
		$ano = $_REQUEST['ano'];
		$banco = p_respostas($_REQUEST['banco']);
		$agencia = p_respostas($_REQUEST['agencia']);
		$conta = p_respostas($_REQUEST['conta']);
		$termos = $_REQUEST['termos'];
		$genero = $_REQUEST['genero'];
		$rg = p_respostas($_REQUEST['rg']);
		$cpf = p_respostas($_REQUEST['cpf']);

		if(isset($_REQUEST['telefone'])){
			$telefone = p_respostas($_REQUEST['telefone']);
		}

		if(isset($_REQUEST['celular'])){
			$celular = p_respostas($_REQUEST['celular']);
		}

		$telaCadastro = new CadastroTela($nome, $username, $email, $confirmarEmail, $senha, $confirmarSenha, $dia, $mes, $ano, $genero, $rg, $cpf, $telefone, $celular, $banco, $agencia, $conta);
		$telaCadastro->cadastrar();
	}

	function conversao_mes($mes){
		if($mes == 'janeiro'){
			return '01';
		} else if ($mes == 'fevereiro'){
			return '02';
		} else if ($mes == 'março'){
			return '03';
		} else if ($mes == 'abril'){
			return '04';
		} else if ($mes == 'maio'){
			return '05';
		} else if ($mes == 'junho'){
			return '06';
		} else if ($mes == 'julho'){
			return '07';
		} else if ($mes == 'agosto'){
			return '08';
		} else if ($mes == 'setembro'){
			return '09';
		} else if ($mes == 'outubro'){
			return '10';
		} else if ($mes == 'novembro'){
			return '11';
		} else if ($mes == 'dezembro'){
			return '12';
		}
	}
?>