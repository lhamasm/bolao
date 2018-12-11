<?php

  require_once 'sistema.php';
  require_once 'usuario.php';
  require_once 'funcoes.php';
  require_once 'index.php';

  session_start();

	$login = '';
	$senha = '';

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$login = p_respostas($_REQUEST['cpf']);
		$senha = p_respostas($_REQUEST['pwd']);

		$sistema = $_SESSION["sistema"];
		var_dump($usuarios = $sistema->getUsuarios());
		for($i = 0; $i < count($usuarios); $i++){
			if(p_respostas($usuarios[$i]->getCpf()) == $login){
				if($usuarios[$i]->getSenha() == $senha){
					$_SESSION["login"] = $login;
			  		$_SESSION["nome"] = $usuarios[$i]->getNome();
			  		$_SESSION["username"] = $usuarios[$i]->getUsername();
			  		$_SESSION["email"] = $usuarios[$i]->getEmail();
			  		$_SESSION["senha"] = $senha;
			  		$_SESSION["rg"] = $usuarios[$i]->getRg();
			  		$_SESSION["ddn"] = $usuarios[$i]->getDataNascimento();
			  		$_SESSION["telefone"] = $usuarios[$i]->getTelefone();
			  		$_SESSION["celular"] = $usuarios[$i]->getCelular();
			  		$_SESSION["banco"] = $usuarios[$i]->getBanco();
			  		$_SESSION["agencia"] = $usuarios[$i]->getAgencia();
			  		$_SESSION["conta"] = $usuarios[$i]->getConta();
			  		$_SESSION["genero"] = $usuarios[$i]->getGenero(); 

			  		header('Location: ../pos-login.php');
					 exit();
				} 
			} 
		}

		echo "Usuário não cadastrado no sistema";
		header('Location: ../login.php');
    exit();
	}

?>