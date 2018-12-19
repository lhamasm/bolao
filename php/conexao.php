<?php

	class Conexao {

		private static $usuarios;
		private static $boloes;
		private static $jogos;

	    public static function getInstanceUsuarios(){
	        static $usuarios = null;

	        if (null === $usuarios) {
	            $usuarios = new Conexao();
	        }

	        return $usuarios;
	    }

	    public static function getInstanceBoloes(){
	        static $boloes = null;

	        if (null === $boloes) {
	            $boloes = new Conexao();
	        }

	        return $boloes;
	    }

	    public static function getInstanceJogos(){
	        static $jogos = null;

	        if (null === $jogos) {
	            $jogos = new Conexao();
	        }

	        return $jogos;
	    }

	    protected function Conexao()
	    {
	    }

	    private function __clone()
	    {
	    }

	    private function __wakeup()
	    {
	    }
}

?>