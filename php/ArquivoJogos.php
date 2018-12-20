<?php

	require_once 'ArquivoInterface.php';
	require_once 'sistema.php';
	require_once 'jogo.php';


	class ArquivoJogo implements ArquivoInterface {

		public function ler($nome) {

			if(file_exists($nome)){
				$sistema = $_SESSION['sistema'];
				
				$arquivo = fopen($nome, 'r') or die("Não foi possível abrir o arquivo");

				while(!feof($arquivo)){
					$jogo = fgets($arquivo);

					if($jogo != ''){
						$dados = explode(':', $jogo);
						$j = new Jogo($dados[0], $dados[1], $dados[2], $dados[3], $dados[4], $dados[5], $dados[6]);
						$j->setEquipes($dados[8]);

		        		$sistema->setJogos($j);
					}
				}

				fclose($arquivo);

				$_SESSION['sistema'] = $sistema;
			}

		}

		public function escrever($nome, $jogo) {

			$sistema = $_SESSION['sistema'];

			$cadastro = $jogo->getCampeonato() . ':' . $jogo->getAno() . ':' . $jogo->getTipo() . ':' . $jogo->getData() . ':' . $jogo->getTema() . ':' . $jogo->getGanhador() . ':';

			for($i=0; $i<count($jogo->getIngredientes())-1; $i++){
				$cadastro = $cadastro . $jogo->getIngredientes()[$i] . '*';
			}
			if(count($jogo->getIngredientes()) > 0){
				$cadastro = $cadastro . $jogo->getIngredientes()[count($jogo->getIngredientes())-1] . ':';
			} else {
				$cadastro = $cadastro . ':';
			}

			$equipe = $jogo->getEquipes();
			for($i=0; $i<count($equipe); $i++){
				if(count($equipe[$i]) > 0){
					if($i == 0){
						$cadastro = $cadastro . "Equipe Vermelha" . '-';
					} elseif($i == 1){
						$cadastro = $cadastro . "Equipe Amarela" . '-';
					} elseif($i == 2){
						$cadastro = $cadastro . "Equipe Azul" . '-';
					} else {
						$cadastro = $cadastro . "Equipe Verde" . '-';
					}
				}

				for($j=0; $j<count($equipe[$i])-1; $j++){
					$cadastro = $cadastro . $equipe[$i][$j] . ';';
				}
				if(count($equipe[$i]) > 0){
					$cadastro = $cadastro . $equipe[$i][count($equipe[$i])-1];
				}
			}

			if(count($equipe) == 0){
				$cadastro = $cadastro . ':';
			}

			echo $cadastro . PHP_EOL;
			$arquivo = fopen($nome, 'a+') or die("Não foi possível abrir o arquivo");
			fwrite($arquivo, $cadastro);
			fclose($arquivo);

			$sistema->setJogos($jogo);
			
			$_SESSION['sistema'] = $sistema;

		}

	}

?>