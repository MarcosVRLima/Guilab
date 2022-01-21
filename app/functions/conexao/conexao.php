<?php 

function conectar(){
	try {
		$pdo = new PDO('mysql:host=localhost;dbname=dbguilab', 'root', '');
		$pdo->exec("set names utf8");
		$pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $pdo;
	} catch (PDOException $e) {
		echo 'ERROR: '. $e->getMessage();
	}
}

/**
* 
*/
?>