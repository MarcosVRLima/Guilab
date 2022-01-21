<?php

	// Load Composer's autoloader
	require __DIR__ . '/assets/php/vendor/autoload.php';

	require 'app/functions/conexao/conexao.php';
	require 'app/functions/crud/cadastrar.php';
	require 'app/functions/crud/atualizar.php';
	require 'app/functions/crud/listar.php';
	require 'app/functions/crud/deletar.php';

	require 'app/functions/includes/cadastrar.php';
	require 'app/functions/includes/login.php';
	require 'app/functions/includes/editar.php';
	require 'app/functions/includes/deletar.php';

	//Funções
 	function inverteData($data){
		if(count(explode("/",$data)) > 1){
			return implode("-",array_reverse(explode("/",$data)));
		}elseif(count(explode("-",$data)) > 1){
			return implode("/",array_reverse(explode("-",$data)));
		}
	}

	function tiraSegundos($time){
		$newtime = explode(":", $time);
		return $newtime[0] . ":" . $newtime[1];
	}

	//Gera uma key alfa-numerica randomicamente
	function generateRandomString($size){
		$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuwxyz0123456789";
		$randomString = '';
		for($i = 0; $i < $size; $i = $i+1){
		   $randomString .= $chars[mt_rand(0,60)];
		}
		return $randomString;
	 }
?>