<?php 
  
require_once $_SERVER['DOCUMENT_ROOT']. '/ProjetTUT/Traitements/connexion.php';

  
try
{
    $db = connectBd();
    $query = "DELETE from todo WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(":id",$_POST['id'],PDO::PARAM_INT);   
    $stmt->execute();
}

catch (PDOException $e)
{
   echo 'Erreur, problème de connexion à la base';
   echo $e->getTraceAsString();
}