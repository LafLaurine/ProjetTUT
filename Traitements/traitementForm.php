<!-- Traitement du formulaire -->

<?php 

require_once $_SERVER['DOCUMENT_ROOT']. '/ProjetTUT/Traitements/connexion.php';

header('Content-type: text/html; charset=UTF-8');
session_start();
if (!isset($_SESSION['pseudo'])) {
    header("Location: ./index.php");
}

$envoi = filter_input(INPUT_POST, 'envoi');


//Fonction pour récupérer les valeurs des select = requête spécifique puisque choix multiple
function testValue($name)
{
    if(isset($_POST[$name]))
    {
        return $_POST[$name];
    }

    return null;
}

$domaines = testValue("domaine");
$niveau = filter_input(INPUT_POST, 'studyLevel');
$formation = filter_input(INPUT_POST, 'study');
$projet = filter_input(INPUT_POST, 'projet');
$langues = testValue("langue");
$jobs =  testValue("job");
$pays = testValue("pays");
$id_etu = $_SESSION['id_etu'];


//Si le formulaire est envoyé, on enregistre les données dans la BDD
if (isset($envoi))
{
    try
    {
        $db = connectBd();

        //On supprime l'id de l'étudiant s'il est déjà référencé
        $q1 = $db->prepare('DELETE FROM interet_domaine WHERE id_etu=?');
        $q1->bindParam(1, $id_etu);
        $q1->execute();

        $q2 = $db->prepare('DELETE FROM formation_acquise WHERE id_etu=?');
        $q2->bindParam(1, $id_etu);
        $q2->execute();

        $q3 = $db->prepare('DELETE FROM langue_pratiquee WHERE id_etu=?');
        $q3->bindParam(1, $id_etu);
        $q3->execute();

        
        $q4 = $db->prepare('DELETE FROM interet_metier WHERE id_etu=?');
        $q4->bindParam(1, $id_etu);
        $q4->execute();


        $q6 = $db->prepare('DELETE FROM interet_pays WHERE id_etu=?');
        $q6->bindParam(1, $id_etu);
        $q6->execute();


        if($formation!=null)
        {
                $qw = $db->prepare('INSERT INTO formation_acquise(id_etu,id_formation,id_poids) VALUES (?,?,?) ON DUPLICATE KEY UPDATE id_etu=?,id_formation=?,id_poids=?;');
                $qw->bindParam(1, $id_etu);
                $qw->bindParam(2, $formation);
                $qw->bindParam(3, $niveau);
                $qw->bindParam(4, $id_etu);
                $qw->bindParam(5, $formation);
                $qw->bindParam(6, $niveau);
                $qw->execute();
        }

        if($langues!=null)
        {
            foreach($langues as $langue)
            {
                $qw = $db->prepare('INSERT INTO langue_pratiquee(id_etu,id_langue) VALUES (?,?) ON DUPLICATE KEY UPDATE id_etu=?,id_langue=?;');
                $qw->bindParam(1, $id_etu);
                $qw->bindParam(2, $langue);
                $qw->bindParam(3, $id_etu);
                $qw->bindParam(4, $langue);
                $qw->execute();
            }
        }

        
        if($jobs!=null)
        {
            foreach($jobs as $job)
            {
                $q2 = $db->prepare('INSERT INTO interet_metier(id_etu,id_metier) VALUES (?,?) ON DUPLICATE KEY UPDATE id_etu=?,id_metier=?;');
                $q2->bindParam(1, $id_etu);
                $q2->bindParam(2, $job);
                $q2->bindParam(3, $id_etu);
                $q2->bindParam(4, $job);
                $q2->execute();
            }
        }

        if($domaines!=null)
        {
            foreach($domaines as $selected)
            {
                $q1 = $db->prepare('INSERT INTO interet_domaine(id_etu,id_domaine) VALUES (?,?) ON DUPLICATE KEY UPDATE id_etu=?,id_domaine=?;');
                $q1->bindParam(1, $id_etu);
                $q1->bindParam(2, $selected);
                $q1->bindParam(3, $id_etu);
                $q1->bindParam(4, $selected);
                $q1->execute();
            }
        }

        if($pays!=null)
        {
            foreach($pays as $pay)
            {
                $q3 = $db->prepare('INSERT INTO interet_pays(id_etu,id_pays) VALUES (?,?) ON DUPLICATE KEY UPDATE id_etu=?,id_pays=?;');
                $q3->bindParam(1, $id_etu);
                $q3->bindParam(2, $pay);
                $q3->bindParam(3, $id_etu);
                $q3->bindParam(4, $pay);
                $q3->execute();
            }
        }
       // header( 'Location: ../articles/profil.php');
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


