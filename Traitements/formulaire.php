<?php 
header('Content-type: text/html; charset=UTF-8');
session_start();
if (!isset($_SESSION['nickname'])) {
    header("Location: ./index.php");
}

function connectBd () {
    $pdo_options[PDO::ATTR_EMULATE_PREPARES] = false;
    /* Active le mode exception */
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    /* Indique le charset */
    $pdo_options[PDO::MYSQL_ATTR_INIT_COMMAND] = "SET NAMES utf8";
    return new PDO('mysql:host=localhost;dbname=unnom', 'root', '',$pdo_options);
}

$study = $_POST['studyDom'];

if (isset($_POST['envoi']))
{
    try
    {
        $db = connectBd();
    }

    catch (PDOException $e)
    {
       echo 'Erreur, problème de connexion à la base';
    }

    $query = "SELECT nom FROM departement AND nom FROM universite INNER JOIN enseignement ON departement.id = enseignement.departement_id AND INNER JOIN enseignement ON universite.id = enseignement.universite_id";   
    $req = $db->prepare($query);
    $req->execute();
}
