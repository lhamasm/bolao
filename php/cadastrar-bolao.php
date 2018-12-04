<?php

	session_start();

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
	$bolao = $_SESSION["username"];

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$campeonato = p_respostas($_REQUEST['campeonato']);
		echo $campeonato;

		$tipoBolao = p_respostas($_REQUEST['tipo-bolao']);
		echo $tipoBolao;

		$bolao = $bolao. ';' . $campeonato . ';' . $tipoBolao;

		if(isset($_REQUEST['pwd'])){
			$senha = p_respostas($_REQUEST['pwd']);
			echo $senha;
			$bolao = $bolao . ';' . $senha;
		}

		$nome = p_respostas($_REQUEST['nome']);
		echo $nome;
		$bolao = $bolao . ';' . $nome;

		if(isset($_REQUEST['descricao'])){
			$descricao = p_respostas($_REQUEST['descricao']);
			echo $descricao;
			$bolao = $bolao . ';' . $descricao;
		}

		if(isset($_REQUEST['participantes'])){
			$participantes = p_respostas($_REQUEST['participantes']);
			echo $participantes;
			$bolao = $bolao . ';' . $participantes;
		}

		if(isset($_REQUEST['unlimited'])){
			$limite = $_REQUEST['unlimited'];
			echo $limite;
			$bolao = $bolao . ';' . $limite;
		}

		if(isset($_REQUEST['caixa-misteriosa'])){
			$caixaMisteriosa = $_REQUEST['caixa-misteriosa'];
			echo $caixaMisteriosa;
			$bolao = $bolao . ';' . $caixaMisteriosa;
		}

		if(isset($_REQUEST['equipes'])){
			$equipes = $_REQUEST['equipes'];
			echo $equipes;
			$bolao = $bolao . ';' . $equipes;
		}

		if(isset($_REQUEST['eliminacao'])){
			$eliminacao = $_REQUEST['eliminacao'];
			echo $eliminacao;
			$bolao = $bolao . ';' . $eliminacao;
		}

		if(isset($_REQUEST['repescagem'])){
			$repescagem = $_REQUEST['repescagem'];
			echo $repescagem;
			$bolao = $bolao . ';' . $repescagem;
		}

		if(isset($_REQUEST['semifinal'])){
			$semifinal = $_REQUEST['semifinal'];
			echo $semifinal;
			$bolao = $bolao . ';' . $semifinal;
		}

		if(isset($_REQUEST['final'])){
			$final = $_REQUEST['final'];
			echo $final;
			$bolao = $bolao . ';' . $final;
		}

		$tipoAposta = $_REQUEST['tipo-aposta'];
		echo $tipoAposta;
		$bolao = $bolao . ';' . $tipoAposta;
		
		if(file_exists('cadastros_bolao.txt')){
			$arquivo = fopen('cadastros_bolao.txt', 'r+');

			while(!feof($arquivo)){
				$bolao = fgets($arquivo);

				$dados = explode(";", $bolao);
				if($dados[0] == $_SESSION["username"] && $dados[4] == $nome){
					echo 'Bolão existente';
					exit;
				}
			}

			fwrite($arquivo, $bolao);
			fclose($arquivo);
			echo "Bolão cadastrado com sucesso!";
		} else {
			$arquivo = fopen('cadastros_bolao.txt', 'a+');
			fwrite($arquivo, $bolao);
			fclose($arquivo);
			echo "Bolão cadastrado com sucesso!";
		}
	}

	function p_respostas($dado) {
		$dado = trim($dado); // retirar espaços extras, tabs, enter 
		$dado = stripslashes($dado); // retirar barra invertida
		$dado = htmlspecialchars($dado);

		return $dado;
	}

?>