<!-- Gestion des résultats du formulaire en fonction des choix de l'étudiant -->

<?php

require_once $_SERVER['DOCUMENT_ROOT']. '/ProjetTUT/Traitements/connexion.php';

//Récupération des universités en fonction des choix
function getUniversities($id_etu)
{
    $que = "SELECT DISTINCT universite.* FROM universite
    JOIN campus ON universite.id_univ=campus.id_univ
    JOIN ville ON campus.id_ville = ville.id_ville
    JOIN pays ON ville.id_pays = pays.id_pays
    JOIN langue_parlee_pays ON langue_parlee_pays.id_pays=pays.id_pays
    JOIN langue ON langue.id_langue = langue_parlee_pays.id_langue
    JOIN composante ON composante.id_campus=campus.id_campus
    JOIN formation ON formation.id_composante=composante.id_composante
    JOIN niveau_formation ON formation.id_poids=niveau_formation.id_poids
    JOIN metier_enseigne ON metier_enseigne.id_formation=formation.id_formation
    JOIN metier ON metier.id_metier=metier_enseigne.id_metier
    JOIN metier_discipline ON metier.id_metier=metier_discipline.id_metier
    JOIN discipline ON discipline.id_discipline=metier_discipline.id_discipline
    JOIN domaine ON domaine.id_domaine = discipline.id_domaine
    LEFT JOIN interet_metier ON interet_metier.id_etu = {$id_etu}
    LEFT JOIN interet_domaine ON interet_domaine.id_etu = {$id_etu}
    LEFT JOIN interet_pays ON interet_pays.id_etu = {$id_etu}
    WHERE (interet_metier.id_metier IS NULL OR interet_metier.id_metier=metier.id_metier)
    AND (interet_domaine.id_domaine IS NULL OR interet_domaine.id_domaine=domaine.id_domaine)
    AND (interet_pays.id_pays IS NULL OR interet_pays.id_pays=pays.id_pays) ;";

    $db = connectBd();

    $req = $db->prepare($que);
    $req->execute();

    $universities=array();

    while($data = $req->fetch(PDO::FETCH_ASSOC))
    {
        array_push($universities,$data) ;
    }
    return $universities;
   
}

//Récupération des formations en fonction des universités obtenues
function getFormations($id_univ)
{
            $qwe = "SELECT DISTINCT formation.* FROM formation
            JOIN composante ON formation.id_composante=composante.id_composante
            JOIN campus ON composante.id_campus=campus.id_campus
            JOIN universite ON campus.id_univ=universite.id_univ
            WHERE universite.id_univ=:id_univ ;";
        
            $db = connectBd();
        
            $req = $db->prepare($qwe);
            $req->bindValue(":id_univ",$id_univ,PDO::PARAM_INT);
            $req->execute();
        
            $formations = array();

            while( $compo = $req->fetch(PDO::FETCH_ASSOC))
            {
                array_push($formations,$compo);
            }

            return $formations;
}

?>