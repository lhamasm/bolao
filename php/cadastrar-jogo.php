<?php

	require_once 'sistema.php';
	require_once 'CadastrarResultadoTela.php';
	require_once 'funcoes.php';

	session_start();

	if($_SERVER['REQUEST_METHOD'] == 'POST'){

		$campeonato = $_REQUEST['camp'];

		echo $campeonato;

		$ano = $_REQUEST['ano'];

		$tipo = $_REQUEST['tipoJogo'];

		$membros = array();

		if($tipo == '1') {
			$dataProva = $_REQUEST['dataProvaCaixaMisteriosa'];

			$tema = $_REQUEST['temaCaixaMisteriosa'];
			if($tema == 'outro'){
				$tema = $_REQUEST['outroTemaCaixaMisteriosa'];
			}

			$ganhador = $_REQUEST['ganhadorCaixaMisteriosa'];

			$ingredientes = $_REQUEST['iCaixaMisteriosa'];
		} elseif($tipo == '2'){
			$dataProva = $_REQUEST['dataProvaEquipes'];

			$tema = $_REQUEST['temaEquipes'];
			if($tema == 'outro'){
				$tema = $_REQUEST['outroTemaEquipes'];
			}

			$ganhador = $_REQUEST['ganhadorEquipes'];

			$ingredientes = $_REQUEST['iEquipes'];

			$vermelha = array();
			$amarela = array();
			$azul = array();
			$verde = array();

			$membros = $_POST['membrosequipes'];

			for($i=0; $i<count($membros); $i++){

				$m = explode('-', $membros[$i]);
				//echo $m[0];
				//echo $m[1];
				if($m[1] == 'Vermelha'){
					array_push($vermelha, $m[0]);
				} elseif ($m[1] == 'Amarela'){
					array_push($amarela, $m[0]);
				} elseif ($m[1] == 'Azul'){
					array_push($azul, $m[0]);
				} else {
					array_push($verde, $m[0]);
				}

			}

			$help = array();

			array_push($help, $vermelha);
			array_push($help, $amarela);
			array_push($help, $azul);
			array_push($help, $verde);

		} elseif($tipo == '3'){
			$dataProva = $_REQUEST['dataProvaEliminacao'];

			$tema = $_REQUEST['temaEliminacao'];
			if($tema == 'outro'){
				$tema = $_REQUEST['outroTemaEliminacao'];
			}

			$ganhador = $_REQUEST['ganhadorEliminacao'];

			$ingredientes = $_REQUEST['iEliminacao'];
		} elseif($tipo == '4'){
			$dataProva = $_REQUEST['dataProvaRepescagem'];

			$tema = $_REQUEST['temaRepescagem'];
			if($tema == 'outro'){
				$tema = $_REQUEST['outroTemaRepescagem'];
			}

			$ganhador = $_REQUEST['ganhadorRepescagem'];

			$ingredientes = $_REQUEST['iRepescagem'];
		} elseif($tipo == '5'){
			$dataProva = $_REQUEST['dataProvaSemifinal'];

			$tema = $_REQUEST['temaSemifinal'];
			if($tema == 'outro'){
				$tema = $_REQUEST['outroTemaSemifinal'];
			}

			$ganhador = $_REQUEST['ganhadorSemifinal'];

			$ingredientes = $_REQUEST['iSemifinal'];
		} else {
			$dataProva = $_REQUEST['dataProvaFinal'];

			$tema = $_REQUEST['temaFinal'];
			
			if($tema == 'outro'){
				$tema = $_REQUEST['outroTemaFinal'];
			}

			$ganhador = $_REQUEST['ganhadorFinal'];

			$ingredientes = $_REQUEST['iFinal'];
		}

		$ingredientes = explode('-', $ingredientes);
		array_splice($ingredientes, count($ingredientes)-1);


		$tela = new CadastrarResultadoTela($campeonato, $ano, $tipo, $dataProva, $tema, $ganhador, $ingredientes);
		if(isset($_POST['membrosequipes'])){
			$tela->setEquipes($help);
		}

		$tela->cadastrar();
	}


?>