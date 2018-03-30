<?php 
  
  require_once $_SERVER['DOCUMENT_ROOT']. '/ProjetTUT/Traitements/connexion.php';

  
try
{
    $db = connectBd();
    if(isset($_POST['addEntry'])) { 
    $query = $db->prepare('INSERT INTO todo(title,description) VALUES(?, ?)'); 

            $query->bindParam(1, $_POST['title'], PDO::PARAM_STR);
            $query->bindParam(2, $_POST['description'], PDO::PARAM_STR);
            $query->execute(); 
            header("Location: ../articles/profil.php"); 
        }
    }

catch (PDOException $e)
{
   echo 'Erreur, problème de connexion à la base';
   echo $e;
}