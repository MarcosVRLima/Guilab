	<?php 
  function listar($tabela){

  	$pdo = conectar();

    $listar = $pdo->query("SELECT * FROM $tabela");
    $listar->execute();
    return $listar->fetchAll(PDO::FETCH_OBJ);
  }

//Listar por ID
function listarPorId($id, $tabela){

	$pdo = conectar();

	$listar = $pdo->query("SELECT * FROM $tabela WHERE id = $id");
	$listar->execute();
	return $listar->fetchAll(PDO::FETCH_OBJ);
}
function listarPorCampo($tabela, $coluna, $campo){

  $pdo = conectar();

	$listar = $pdo->query("SELECT * FROM $tabela WHERE $coluna LIKE '$campo'");
	$listar->execute();
	return $listar->fetchAll(PDO::FETCH_OBJ);
}

function listarPorFK($tabela, $coluna, $fk){

  $pdo = conectar();

	$listar = $pdo->query("SELECT * FROM $tabela WHERE $coluna = $fk");
	$listar->execute();
	return $listar->fetchAll(PDO::FETCH_OBJ);
}

function listarPorEmail($email){

  $pdo = conectar();

	$listar = $pdo->query("SELECT * FROM usuario WHERE email LIKE '$email'");
	$listar->execute();
	return $listar->fetchAll(PDO::FETCH_OBJ);
}

function listarPorDataId($id, $data){

  $pdo = conectar();

	$listar = $pdo->query("SELECT * FROM horarios WHERE '$data' between dataInicial and dataFinal AND responsavel_id = $id ORDER BY horarioInicial");
	$listar->execute();
	return $listar->fetchAll(PDO::FETCH_OBJ);
}

function listarPorData($data){

	$pdo = conectar();
  
	$listar = $pdo->query("SELECT * FROM horarios WHERE '$data' between dataInicial and dataFinal");
	$listar->execute();
	return $listar->fetchAll(PDO::FETCH_OBJ);
}

function listarPorDataAgendado($data, $horario){

	$pdo = conectar();
  
	  $listar = $pdo->query("SELECT * FROM agendamento WHERE `data` = '$data' AND horarios_id = $horario");
	  $listar->execute();
	  return $listar->fetchAll(PDO::FETCH_OBJ);
  }

function listarIDPessoa($tabela){

    $pdo = conectar();

    $listar = $pdo->query("SELECT * FROM $tabela");
    $pdo->beginTransaction();
    $listar->execute();
    $pdo->commit();
    $listar->fetchAll(PDO::FETCH_OBJ);
    return $pdo->lastInsertId();
  }

 ?>
 