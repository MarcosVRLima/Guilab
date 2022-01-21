<?php
  function deletar($campo, $id, $tabela){
      $pdo = conectar();
      $deletar = $pdo->prepare("DELETE FROM $tabela WHERE $campo = :id");
      $deletar->bindValue(":id", $id);
      return $deletar->execute();

  }
 ?>
