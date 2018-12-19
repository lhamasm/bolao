<?php

	session_start();

	function testeOnclick($op) {
	    array_push($_SESSION['opcao'], $op);
	    echo 'entrei';
	}
?>