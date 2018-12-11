<?php

	require_once 'sistema.php';
	require_once 'bolao.php';
	require_once 'funcoes.php';

	session_start();

	$id = '';
	$campeonato = '';
	$tipo = '';
	$senha = '';
	$nome = '';
	$descricao = '';
	$participantes = '';
	$escolhasAposta = array();
	$tipoJogo = array();
	$tipoAposta = '';
	$opcoesAposta = array();
	$dataTermino = '';

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$sistema = $_SESSION['sistema'];
		$boloes = $sistema->getBoloes();

		$id = count($boloes) + 1;
		$campeonato = $_SESSION['modalidade'];
		
		if($_REQUEST['tipo-bolao'] == 'publico'){
			$tipo = 0;
		} else {
			$tipo = 1;
		}

		if(isset($_REQUEST['pwd'])) {
			$senha = p_respostas($_REQUEST['pwd']);
		}
		$nome = p_respostas($_REQUEST['nome']);

		if(isset($_REQUEST['descricao'])){
			$descricao = p_respostas($_REQUEST['descricao']);
		}

		if(isset($_REQUEST['participantes']) && $_REQUEST['participantes'] != ''){
			$participantes = p_respostas($_REQUEST['participantes']);
		} else {
			$participantes = 10;
		}

		if(isset($_REQUEST['caixa-misteriosa'])){
			array_push($tipoJogo, 1);
		} else {
			array_push($tipoJogo, 0);
		}

		if(isset($_REQUEST['equipes'])){
			array_push($tipoJogo, 1);
		} else {
			array_push($tipoJogo, 0);
		}

		if(isset($_REQUEST['eliminacao'])){
			array_push($tipoJogo, 1);
		} else {
			array_push($tipoJogo, 0);
		}

		if(isset($_REQUEST['repescagem'])){
			array_push($tipoJogo, 1);
		} else {
			array_push($tipoJogo, 0);
		}

		if(isset($_REQUEST['semifinal'])){
			array_push($tipoJogo, 1);
		} else {
			array_push($tipoJogo, 0);
		}

		if(isset($_REQUEST['final'])){
			array_push($tipoJogo, 1);
		} else {
			array_push($tipoJogo, 0);
		}

		if($_REQUEST['tipo-aposta'] != 'outro'){
			$tipoAposta = $_REQUEST['tipo-aposta'];
		} else {
			$tipoAposta = $_REQUEST['outra-opcao'];
		}

		$dataTermino = $_REQUEST['data'];
		$data = explode('-', $dataTermino);
		$dataTermino = $data[2] . '/' . $data[1] . '/' . $data[0];

		$opcoesAposta = explode('-', $_REQUEST['escolhas2']);

		$cadastro = $id . ';' . $_SESSION['login'] . ';' . $tipo . ';' . $campeonato . ';' . $nome . ';' . $descricao . ';' . $participantes . ';;' . $tipoJogo[0] . '-' . $tipoJogo[1] . '-' . $tipoJogo[2] . '-' . $tipoJogo[3] . '-' . $tipoJogo[4] . '-' . $tipoJogo[5] . ';' . $tipoAposta . ';';

		for($i = 0; $i < count($opcoesAposta)-1; $i++){
			if($i == count($opcoesAposta)-2){
				$cadastro = $cadastro . $opcoesAposta[$i];
			} else {
				$cadastro = $cadastro . $opcoesAposta[$i] . '-';
			}
		}

		$cadastro = $cadastro . ';' . $senha . ';;0;' . $dataTermino . PHP_EOL;

		$bolao = new Bolao($id, $_SESSION['login'], $tipo, $campeonato, $nome, $descricao, $participantes, $tipoJogo, $tipoAposta, $opcoesAposta, $senha, 0);
		$bolao->setTempoLimite($dataTermino);

		for($i = 0; $i < count($boloes); $i++){
			if($boloes[$i]->getCriador() == $_SESSION['login'] && $boloes[$i]->getTitulo() == $nome && $boloes[$i]->getCampeonato() == $campeonato){
				$_SESSION['status'] = 2;
				header('Location: ../cadastro-bolao.php');
		  		//echo 'Já existe um bolão com o mesmo nome, administrador e campeonato';
				exit();	
			}
		}

		if(file_exists('../bd/boloes.txt')){
			$arquivo = fopen('../bd/boloes.txt', 'a+') or die("Não foi possível abrir o arquivo");
		} else {
			$arquivo = fopen('../bd/boloes.txt', 'w+') or die("Não foi possível abrir o arquivo");
		}

		fwrite($arquivo, $cadastro);
		fclose($arquivo);

		$sistema->setBoloes($bolao);
		$_SESSION['sistema'] = $sistema;

		$_SESSION['status'] = 3;
		//echo "Bolão cadastrado com sucesso!";
		header('Location: ../convidar-amigos.php');
		exit();
	}

?>