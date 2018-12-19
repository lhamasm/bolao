<?php

	require_once 'ArquivoInterface.php';
	require_once 'sistema.php';
	require_once 'bolao.php';
	require_once 'aposta.php';

	class ArquivoBolao implements ArquivoInterface {

		public function ler($nome) {

			if(file_exists($nome)){

				$sistema = $_SESSION['sistema'];

				$arquivo = fopen($nome, 'r') or die("Não foi possível abrir o arquivo");

				$contador = 0;
				while(!feof($arquivo)){
					$bolao = fgets($arquivo);

					if($bolao != ''){
						$dados = explode(':', $bolao);

						if($dados[7] != ''){
				        	$participantes = explode('*', $dados[7]);
				        } else {
				        	$participantes = array();
				        }
				        //$opcoesAposta = explode('*', $dados[10]);
				        if($dados[14] != ''){
				       		$apostas = explode(';', $dados[14]);
				       	}else {
				        	$apostas = array();
				        }
				        $tipoJogo = explode('*', $dados[8]);

				        $b = new Bolao($dados[0], $dados[1], $dados[2], $dados[3], $dados[4], $dados[5], $dados[6], $tipoJogo, $dados[9],/* $opcoesAposta,*/ $dados[10], $dados[12]);

				        for($i=0; $i < count($participantes); $i++){
				        	$b->setParticipantes($participantes[$i]);
				        }

				        $b->setResultado($dados[11]);
				        $b->setTempoLimite($dados[13]);

				        for($i=0; $i < count($apostas); $i++){
				        	$ap = explode('*', $apostas[$i]);
				         	$a = new Aposta($ap[0], $contador, $ap[1], $ap[2], $ap[3], 1);
				          	$b->setApostas($a);
				        }

		        		$sistema->setBoloes($b);
		        		$contador += 1;
					}
				}

				fclose($arquivo);

				$_SESSION['sistema'] = $sistema;
			}

		}

		public function escrever($nome, $bolao) {

			$cadastro = $bolao->getId() . ':' . $bolao->getCriador() . ':' . $bolao->getTipo() . ':' . $bolao->getCampeonato() . ':' . $bolao->getTitulo() . ':' . $bolao->getDescricao() . ':' . $bolao->getLimiteDeParticipantes() . ':';

			for($i=0; $i<count($bolao->getParticipantes())-1; $i++){
				$cadastro = $cadastro . $bolao->getParticipantes()[$i] . '*';
			}
			if(count($bolao->getParticipantes()) > 0){
				$cadastro = $cadastro . $bolao->getParticipantes()[count($bolao->getParticipantes())-1] . ':';
			} else {
				$cadastro = $cadastro . ':';
			}

			 $cadastro = $cadastro . $bolao->getTipoJogo()[0] . '*' . $bolao->getTipoJogo()[1] . '*' . $bolao->getTipoJogo()[2] . '*' . $bolao->getTipoJogo()[3] . '*' . $bolao->getTipoJogo()[4] . '*' . $bolao->getTipoJogo()[5] . ':' . $bolao->getTipoAposta() . ':';

			/*$opcoesAposta = $bolao->getOpcoesAposta();
			for($i = 0; $i < count($opcoesAposta)-1; $i++){
				$cadastro = $cadastro . $opcoesAposta[$i] . '*';
			}
			if($opcoesAposta > 0){
				$cadastro = $cadastro . $opcoesAposta[count($opcoesAposta)-1];
			}*/

			$cadastro = $cadastro . $bolao->getSenha() . '::0:' . $bolao->getTempoLimite() . ':';

			for($i=0; $i<count($bolao->getApostas())-1; $i++){
				$cadastro = $cadastro . $bolao->getApostas()[$i]->getUsuario() . '*' . $bolao->getApostas()[$i]->getValor() . '*' . $bolao->getApostas()[$i]->getOpcaoDeAposta() . '*' . $bolao->getApostas()[$i]->getData() . ';';
			}
			if(count($bolao->getApostas()) > 0){
				$cadastro = $cadastro . $bolao->getApostas()[count($bolao->getApostas())-1]->getUsuario() . '*' . $bolao->getApostas()[count($bolao->getApostas())-1]->getValor() . '*' . $bolao->getApostas()[count($bolao->getApostas())-1]->getOpcaoDeAposta() . '*' . $bolao->getApostas()[count($bolao->getApostas())-1]->getData();
			} else {
				$cadastro = $cadastro . ':';
			}

			if(file_exists($nome)){
				$arquivo = fopen($nome, 'a+') or die("Não foi possível abrir o arquivo");
			} else {
				$arquivo = fopen($nome, 'w+') or die("Não foi possível abrir o arquivo");
			}

			fwrite($arquivo, $cadastro . PHP_EOL);
			fclose($arquivo);

		}

	}

?>