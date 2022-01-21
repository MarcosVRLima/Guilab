<?php
function cadastrar( $tabela, $attributes ){

	//conexao
	
	 try{
		$pdo = conectar();
		$keys = array_keys($attributes);
		$camposTabela = implode(',', $keys);
		$values = null;
	
		foreach( $keys as $key ){
			$values.=', :'.$key;
		}
		
		$values = (trim(ltrim($values, ',')));

		$cadastrar = $pdo->prepare("INSERT INTO $tabela ( $camposTabela ) VALUES( $values )");
		$cadastrar->execute($attributes);
		return $pdo->lastInsertId();
	 }
	 catch(PDOException $e){
		return $e->getMessage();
	 }

}
?>
