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
		$telefone = p_respostas($_REQUEST['telefone']);
		$celular = p_respostas($_REQUEST['celular']);

		if(confirmation($email, $confirmarEmail)){
			if(confirmation($senha, $confirmarSenha)){
				$cadastro = $cpf . ';' . $nome . ';' . $username . ';' . $email . ';' . $senha . ';' . $rg . ';' . $dia . '/' . $mes . '/' . $ano . ';' . $telefone . ';' . $celular . ';' . $banco . ';' . $agencia . ';' . $conta . ';' . $genero;
				$arquivo = fopen("cadastros_usuarios.txt", "a+") or die("O arquivo não pôde ser aberto");

				while(!feof($arquivo)) {
				  $usuario = fgets($arquivo);

				  $dados = explode(";", $usuario);
				  if($dados[0] == $cpf){
				  	header('Location: ../cadastro.html');
				  	echo 'Já existe um usuário cadastrado com esse CPF';
 					exit;
				  } 
				}

				fwrite($arquivo, $cadastro);
				fclose($arquivo);
				header('Location: ../index.html');
				echo 'Cadastro realizado com sucesso!';	
				exit;				
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