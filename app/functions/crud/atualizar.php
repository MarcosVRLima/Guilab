<?php 
	function atualizar( $id, $tabela, $attributes ){

		//conexao
		try{
			$pdo = conectar();
	
			$values = null;
	
			foreach( $attributes as $key => $value ){
	
				$values.= $key .'= :'.$key.',';
			}
	
			$values = (rtrim($values, ','));
	
			$atualizar = $pdo->prepare("UPDATE $tabela SET $values WHERE id=:id");
			
			$attributes['id'] = $id;
			$mensagem = $atualizar->execute($attributes);
			return $mensagem;
		}
		catch(PDOException $e){
			$mensagem = $e->getMessage();
			return $mensagem;
		}
	}
?>