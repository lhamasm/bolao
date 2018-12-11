<?php

	require_once 'sistema.php';
	require_once 'jogo.php';
	require_once 'funcoes.php';

	session_start();

	if($_SERVER['REQUEST_METHOD'] == 'POST'){

		$sistema = $_SESSION['sistema'];

		$tipo = $_REQUEST['tipo'];
		if($tipo == "caixa-misteriosa"){
			$tipo = 1;
		} elseif($tipo == "equipes"){
			$tipo = 2;
		} elseif($tipo == "eliminacao"){
			$tipo = 3;
		} elseif($tipo == "repescagem"){
			$tipo = 4;
		} elseif($tipo == "semifinal"){
			$tipo = 5;
		} else {
			$tipo = 6;
		}

		$data = $_REQUEST['data'];
		$date = DateTime::createFromFormat('Y-m-d', $data);
		$data = $date->format('d/m/Y');

		$resultado = array();

		if($tipo == 'equipes'){
			$cor = $_REQUEST['cor'];
			if($cor == 'outra'){
				$cor = $_REQUEST['corr'];
			}
			array_push($resultado, 'Equipe ' . $cor);			
		}

		if(isset($_REQUEST['adriana'])){
			array_push($resultado, 'Adriana');
		}

		if(isset($_REQUEST['alex'])){
			array_push($resultado, 'Alex');
		}

		if(isset($_REQUEST['andre'])){
			array_push($resultado, 'André');
		}

		if(isset($_REQUEST['andreR'])){
			array_push($resultado, 'André R');
		}

		if(isset($_REQUEST['daniel'])){
			array_push($resultado, 'Daniel');
		}

		if(isset($_REQUEST['heaven'])){
			array_push($resultado, 'Heaven');
		}

		if(isset($_REQUEST['manuela'])){
			array_push($resultado, 'Manuela');
		}

		if(isset($_REQUEST['marcela'])){
			array_push($resultado, 'Marcela');
		}

		if(isset($_REQUEST['paulo'])){
			array_push($resultado, 'Paulo');
		}

		if(isset($_REQUEST['rafael'])){
			array_push($resultado, 'Rafael');
		}

		if(isset($_REQUEST['roberta'])){
			array_push($resultado, 'Roberta');
		}

		if(isset($_REQUEST['simone'])){
			array_push($resultado, 'Simone');
		}

		if(isset($_REQUEST['thalles'])){
			array_push($resultado, 'Thales');
		}

		if(isset($_REQUEST['will'])){
			array_push($resultado, 'William');
		}

		$res = '';
		for($i=0; $i<count($resultado)-1; $i++){
			$res = $res . $resultado[$i] . '-';
		}
		$res = $res . $resultado[count($resultado)-1];

		$jogo = new Jogo($tipo, $res, $data);
		$sistema->setJogos($jogo);
		$jogos = $sistema->getJogos();
		$_SESSION['sistema'] = $sistema;

		$arquivo = fopen('../bd/jogos.txt', 'w+');
		for($i = 0; $i < count($jogos)-1; $i++){
			$cadastro = $jogos[$i]->getId() . ';' . $jogos[$i]->getResultado() . ';' . $jogos[$i]->getData() . PHP_EOL;
			fwrite($arquivo, $cadastro);
		}
		$cadastro = $jogos[count($jogos)-1]->getId() . ';' . $jogos[count($jogos)-1]->getResultado() . ';' . $jogos[count($jogos)-1]->getData();
			fwrite($arquivo, $cadastro);
		fclose($arquivo);

		echo 'Jogo cadastrado com sucesso';
		header("Location: ../cadastrar-resultados.php");
		exit()
	}


?>