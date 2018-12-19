<?php

	require_once 'php/sistema.php';
	require_once 'php/apostador.php';
	require_once 'php/usuario.php';

	session_start();
	//require_once 'index.php';

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
		$sistema = $_SESSION["sistema"];
		$usuarios = $sistema->getUsuarios();

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
		$telefone = p_respostas($_REQUEST['telefone']);
		$celular = p_respostas($_REQUEST['celular']);

		if(confirmation($email, $confirmarEmail)){
			if(confirmation($senha, $confirmarSenha)){

				$dataNascimento = $dia . '/' . $mes . '/' . $ano;
				$usuario = new Usuario($nome, $username, $email, $senha, $dataNascimento, $genero, $rg, $cpf, $telefone, $celular, $banco, $agencia, $conta);
				$usuario->setTipo($tipo);

				$apostador = new Apostador($_SESSION['numero_usuarios']+1, 0);
				$apostador = $usuario;	

				$cadastro = $tipo . ';' . $nome . ';' . $username . ';' . $email . ';' . $senha . ';' . $dataNascimento . ';' . $genero . ';' . $rg . ';' . $cpf . ';' . $telefone . ';' . $celular . ';' . $banco . ';' . $agencia . ';' . $conta;

				for($i = 0; $i < count($usuarios); $i++){
					if($usuarios[$i]->getCpf() == $cpf){
						header('Location: ../cadastro.html');
				  		echo 'Já existe um usuário cadastrado com esse CPF';
 						exit;	
					}
				}

				$arquivo = fopen('cadastros_usuarios.txt', 'a+');
				fwrite($arquivo, $cadastro);
				fclose($arquivo);

				$sistema->setUsuarios($apostador);
				$_SESSION['sistema'] = $sistema;
				$_SESSION["numero_usuarios"] = $_SESSION['numero_usuarios'] + 1;
				
			} else {
				echo 'Senha errada';	
			}
		} else {
			echo 'Email errado';
		}
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