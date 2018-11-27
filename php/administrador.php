<?php

	require_once 'sistema.php';
	require_once 'usuario.php';
	require_once 'bolao.php';

	class Administrador extends Usuario {

		function convidarApostador(){

		}

		function excluirApostador($bolao, $apostador){
			for($i = 0; $i < count($boloes); $i++){
				if($boloes[$i]->getTitulo() == $bolao){
					$p = $boloes[$i]->getParticipantes();
					for($j = 0; $j < count($p); $j++){
						if($p[$j]->getCpf() == $apostador){
							array_splice($p, $j, 1);
						}
					}
				}
			}
		}
	}
?>