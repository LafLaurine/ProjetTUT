<?php 
header('Content-type: text/html; charset=UTF-8');
session_start();
if (!isset($_SESSION['pseudo'])) {
    header("Location: ./index.php");
}

function connectBd () {
    $pdo_options[PDO::ATTR_EMULATE_PREPARES] = false;
    /* Active le mode exception */
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    /* Indique le charset */
    $pdo_options[PDO::MYSQL_ATTR_INIT_COMMAND] = "SET NAMES utf8";
    return new PDO('mysql:host=localhost;dbname=projettut', 'root', '',$pdo_options);
}

$domaine = filter_input(INPUT_POST, 'domaine');
$envoi = filter_input(INPUT_POST, 'envoi');
$study = filter_input(INPUT_POST, 'study');
$studyLevel = filter_input(INPUT_POST, 'studyLevel');
$projet = filter_input(INPUT_POST, 'projet');
$langue = filter_input(INPUT_POST, 'langue');
$job = filter_input(INPUT_POST, 'job');
$country = filter_input(INPUT_POST, 'country');
$loisir = filter_input(INPUT_POST, 'loisir');

if (isset($envoi))
{
    try
    {
        $db = connectBd();
        $req = $db->prepare('INSERT INTO metier(nom_metier) VALUES (?)');
        $req->bindParam(1, $job);
        $req->execute();

        $query = $db->prepare('INSERT INTO projet(nom_projet) VALUES (?)');
        $query->bindParam(1, $projet);
        $query->execute();

        $qwery = "SELECT DISTINCT * FROM universite 
        JOIN discipline ON domaine.id_domaine=discipline.id_domaine
        WHERE nom_univ = :nom_univ;";
        $requete = $db->prepare($qwery);
        $requete->bindValue(':nom_univ', $univ, PDO::PARAM_STR);
        $requete->execute();

        while( $data = $req->fetch(PDO::FETCH_ASSOC))
        {
            
         echo "<div>".$data["nom_univ"]."</div>";
          
        }

       /*  $query = "SELECT DISTINCT * FROM departement 
        JOIN enseignement ON departement.id=enseignement.id_departement 
        JOIN enseigne ON  enseignement.id=enseigne.id_ens
        JOIN universite ON universite.id= enseigne.id_univ
        WHERE nom_departement = :nom_departement;";   
        $req = $db->prepare($query);
        $req->bindValue(':nom_departement', $domaine, PDO::PARAM_STR);
        $req->execute();
        
    
        while( $data = $req->fetch(PDO::FETCH_ASSOC))
        {
            
         echo "<div>".$data["nom_enseignement"]."</div>";
         echo "<div>".$data["nom_univ"]."</div>";
          
        }
         */


        
    }

    catch (Exception $e)
    {
        $e->getMessage();
        echo $e;        
    }

   
}

else
{
    echo 'Champs vides';
}


