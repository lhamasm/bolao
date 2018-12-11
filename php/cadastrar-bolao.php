<?php

	$campeonato = "";
	$tipoBolao = "";
	$senha = "";
	$nome = "";
	$descricao = "";
	$participantes = "";
	$limite = "";
	$escolhasAposta = "";
	$caixaMisteriosa = "";
	$equipe = "";
	$eliminacao = "";
	$repescagem = "";
	$semifinal = "";
	$final = "";
	$tipoAposta = "";

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$campeonato = $_POST['campeonato'];
		echo $campeonato;

		$tipoBolao = $_POST['tipo-bolao'];
		echo $tipoBolao;

		$senha = $_POST['pwd'];
		echo $senha;

		$nome = $_POST['nome'];
		echo $nome;

		$descricao = $_POST['descricao'];
		echo $descricao;

		$participantes = $_POST['participantes'];
		echo $participantes;

		$limite = $_POST['unlimited'];
		echo $limite;

		$caixaMisteriosa = $_POST['caixa-misteriosa'];
		echo $caixaMisteriosa;

		$equipe = $_POST['equipe'];
		echo $equipe;

		$eliminacao = $_POST['eliminacao'];
		echo $eliminacao;

		$semifinal = $_POST['semifinal'];
		echo $semifinal;

		$tipoAposta = $POST['tipo-aposta'];
		echo $tipoAposta;
	}

?>