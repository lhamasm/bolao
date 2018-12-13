<?php

	require_once 'CadastrarBolaoTela.php';

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

		$telaCadastrarBolao = new CadastrarBolaoTela($campeonato, $tipo, $senha, $nome, $descricao, $participantes, $opcoesAposta, $tipoJogo, $tipoAposta, $dataTermino);
		$telaCadastrarBolao->cadastrarBolao();
	}

?>