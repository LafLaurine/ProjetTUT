<?php 
session_start();
header('Content-type: text/html; charset=utf-8');
require_once $_SERVER['DOCUMENT_ROOT']. '/ProjetTUT/Traitements/connexion.php';

if (!isset($_SESSION['pseudo'])) {
	
		 echo "<script type=\"text/javascript\">
		 alert(\"Utilisateur non connecté\");
		 location=\"../destination.php\";
		 </script>";
 }


?>


<!DOCTYPE html>
<html lang="fr">
<head>
<title>Intertional Student Planner - Projet tut</title>
<meta charset="UTF-8">
<link rel="icon" type="image/png" href="../img/fav_logo.png"/>
<link rel="stylesheet" type="text/css" href="../CSS/style.css">
<link type="text/css" rel="stylesheet" href="../CSS/materialize.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="../CSS/profil.css">
<link rel="stylesheet" type="text/css" href="../CSS/articles.css">
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/materialize.js"></script>
<script src="../js/main.js"></script>
<script src="../js/profil.js"></script>
</head>
<body>
<script>
	$(document).ready(function)
	{
		$(".dropdown-trigger").dropdown();
	});
	</script>
<style>
.table-of-contents a.active {
    border-left: 2px solid #1976D2!important;
  }
  nav .nav-wrapper img{
    margin-left: 10px;
    margin-top: 3px;
  }
  
      body {
    display: flex;
    min-height: 100vh;
    flex-direction: column;
    }
  
    main {
    flex: 1 0 auto;
    }
  </style>

<nav>
  <div class="nav-wrapper">
    <a href="./index.php" id="logo-container" class="brand-logo"><img src="../img/logo.png" style="width: 3.4rem;"/></a>
    <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
    <ul class="right hide-on-med-and-down">
			<li><a href="?lang=fr">FR</a></li>
 			<li><a href="?lang=en">EN</a></li>
			<li><a href="./index.php">Accueil</a></li>
			<li><a href="./articles.php">Pays</a></li>
			<li><a href="./langue.php">Langues</a></li>
			<li><a href="./domaines.php">Domaines</a></li>
     
      <?php if (!isset($_SESSION['pseudo'])) {
                      echo '<li><a href="../destination.php">Se connecter</a></li>';
                  }
                  
                  else if (isset($_SESSION['pseudo'])) {
									echo '<li><a href="./profil.php">Profil</a></li>';
									echo '<li><a href="./form.php">Formulaire</a></li>';
									echo '<li><a href="../Traitements/logout.php">Déconnexion</a></li>';
                  }?>
      <li><a href="./contact.php">Contact</a></li>
      
    </ul>
    <ul class="side-nav" id="mobile-demo">
    <li><a href="./index.php">Accueil</a></li>
    <li><a href="./articles.php">Pays</a></li>
    <li><a href="./langue.php">Langues</a></li>
    <li><a href="./domaines.php">Domaines</a></li>
      
      <?php if (!isset($_SESSION['pseudo'])) {
                      echo '<li><a href="../destination.php">Se connecter</a></li>';
                  }
                  
                  else if (isset($_SESSION['pseudo'])) {
                    echo '<li><a href="./profil.php">Profil</a></li>';
                    echo '<li><a href="./form.php">Formulaire</a></li>';
                    echo '<li><a href="../Traitements/logout.php">Déconnexion</a></li>';
                  }?>
      <li><a href="./contact.php">Contact</a></li>
    </ul>
  </div>
</nav>

					  
<h1>INTERNATIONAL STUDENT PLANNER</h1>

<div class="containerF" style="z-index:1000000000000000000000000;">
		<form action="../Traitements/traitementForm.php" class="formu" method="post">
		<fieldset>
			<div>
			<label for="studyLevel">Formation*</label><br>
			<?php try
				{

					$db = connectBd();
					$req=$db->prepare('SELECT niveau_formation.* FROM niveau_formation 
					JOIN formation ON formation.id_poids = niveau_formation.id_poids
					JOIN formation_acquise ON formation_acquise.id_formation = formation.id_formation
					WHERE id_etu = :id_etu;');
					$req->bindValue(":id_etu",$_SESSION['id_etu'],PDO::PARAM_INT);
					$req->execute();

					$formation_choisi = array();
					
					while( $data = $req->fetch(PDO::FETCH_ASSOC))
					{
						array_push($formation_choisi,$data["id_formation"]);
					}

					$db = connectBd();
					$req2=$db->prepare('SELECT * FROM niveau_formation');
					$req2->execute();
					$selected="";
					while( $data = $req2->fetch(PDO::FETCH_ASSOC))
					{
						if (in_array($data["id_niveau"], $formation_choisi)) {
							echo "<option value='{$data['id_niveau']}' checked=\"checked\" >{$data['nom_niveau']}</option>";
						}
						else
						{
							echo "<input {$selected} name='studyLevel' type='radio' value='{$data["id_niveau"]}'>{$data["nom_niveau"]}</br>";
						}
					} 
				}
				catch (Exception $e)
				{
					$e->getMessage();
					echo $e;        
				}?>
			</div></br>

			<div  class = "row">
		
				<label for="studyLevel">Intitulé de votre formation : </label><br>
				<select id="studyLevel" name="studyLevel">
				<?php try
				{

					$db = connectBd();
					$req=$db->prepare('SELECT formation.* FROM formation 
					JOIN formation_acquise ON formation.id_formation = formation.id_formation
					WHERE id_etu = :id_etu;');
					$req->bindValue(":id_etu",$_SESSION['id_etu'],PDO::PARAM_INT);
					$req->execute();

					$formation_choisi = array();
					
					while( $data = $req->fetch(PDO::FETCH_ASSOC))
					{
						array_push($formation_choisi,$data["id_formation"]);
					}

					$db = connectBd();
					$req2=$db->prepare('SELECT * FROM formation');
					$req2->execute();
					while( $data = $req2->fetch(PDO::FETCH_ASSOC))
					{
						if (in_array($data["id_formation"], $formation_choisi)) {
							echo "<option value='{$data['id_formation']}' selected=\"selected\" >{$data['id_formation']}</option>";
						}
						else
						{
							echo "<option value='{$data['id_formation']}'>{$data['nom_formation']}</option>";	
						}
					} 
				}
				catch (Exception $e)
				{
					$e->getMessage();
					echo $e;        
				}
				?>
				</select>
			</div></br>

			<div  class = "row">
				<label for="projet">Projet* <i class="material-icons">event</i></label><br>
				<input name="projet" type='text'>
			</div></br>

			<div class = "row">
				<label for="domaine">Domaine(s) d'études* <i class="material-icons">school</i></label><br>
				<select id="domaine" name="domaine[]" multiple>
				<?php try
				{

					$db = connectBd();
					$req=$db->prepare('SELECT domaine.* FROM domaine 
					JOIN interet_domaine ON interet_domaine.id_domaine = domaine.id_domaine
					WHERE id_etu = :id_etu;');
					$req->bindValue(":id_etu",$_SESSION['id_etu'],PDO::PARAM_INT);
					$req->execute();

					$domaine_choisi = array();
					
					while( $data = $req->fetch(PDO::FETCH_ASSOC))
					{
						array_push($domaine_choisi,$data["id_domaine"]);
					}

					$db = connectBd();
					$req2=$db->prepare('SELECT * FROM domaine');
					$req2->execute();
					while( $data = $req2->fetch(PDO::FETCH_ASSOC))
					{
						if (in_array($data["id_domaine"], $domaine_choisi)) {
							echo "<option value='{$data['id_domaine']}' selected=\"selected\" >{$data['nom_domaine']}</option>";
						}
						else
						{
							echo "<option value='{$data['id_domaine']}'>{$data['nom_domaine']}</option>";	
						}
					} 
				}
				catch (Exception $e)
				{
					$e->getMessage();
					echo $e;        
				}
				?>
				</select>
			</div></br>
			
			
			<div>
				<label for="langue">Langue(s) recherché(es)* <i class="material-icons">language</i></label><br>
				<select id="langue" name="langue[]" multiple="multiple">
				<?php try
				{

					$db = connectBd();
					$req=$db->prepare('SELECT langue.* FROM langue 
					JOIN langue_pratiquee ON langue_pratiquee.id_langue = langue.id_langue
					WHERE id_etu = :id_etu;');
					$req->bindValue(":id_etu",$_SESSION['id_etu'],PDO::PARAM_INT);
					$req->execute();

					$langue_choisi = array();
					
					while( $data = $req->fetch(PDO::FETCH_ASSOC))
					{
						array_push($langue_choisi,$data["id_langue"]);
					}

					$db = connectBd();
					$req2=$db->prepare('SELECT * FROM langue');
					$req2->execute();
					while( $data = $req2->fetch(PDO::FETCH_ASSOC))
					{
						if (in_array($data["id_langue"], $langue_choisi)) {
							echo "<option value='{$data['id_langue']}' selected=\"selected\" >{$data['nom_langue']}</option>";
						}
						else
						{
							echo "<option value='{$data['id_langue']}'>{$data['nom_langue']}</option>";	
						}
					} 
				}
				catch (Exception $e)
				{
					$e->getMessage();
					echo $e;        
				}?>
				</select>
            </div></br>

            <div>
				<label for="job">Métier(s) envisagé(s)*</label> <i class="material-icons">work</i></br>
				<select id="job" name="job[]" multiple="multiple">
				<?php try
				{

					$db = connectBd();
					$req=$db->prepare('SELECT metier.* FROM metier 
					JOIN interet_metier ON interet_metier.id_metier = metier.id_metier
					WHERE id_etu = :id_etu;');
					$req->bindValue(":id_etu",$_SESSION['id_etu'],PDO::PARAM_INT);
					$req->execute();

					$metier_choisi = array();
					
					while( $data = $req->fetch(PDO::FETCH_ASSOC))
					{
						array_push($metier_choisi,$data["id_metier"]);
					}

					$db = connectBd();
					$req2=$db->prepare('SELECT * FROM metier');
					$req2->execute();
					while( $data = $req2->fetch(PDO::FETCH_ASSOC))
					{
						if (in_array($data["id_metier"], $metier_choisi)) {
							echo "<option value='{$data['id_metier']}' selected=\"selected\" >{$data['nom_metier']}</option>";
						}
						else
						{
							echo "<option value='{$data['id_metier']}'>{$data['nom_metier']}</option>";	
						}
					} 
				}
				catch (Exception $e)
				{
					$e->getMessage();
					echo $e;        
				}
				?>
				</select>
            </div></br>

			<div>
				<label for="pays">Pays souhaité</label><i class="material-icons">g_translate</i></br>
				<select id="pays" name="pays[]" multiple="multiple">
				<?php try
				{

					$db = connectBd();
					$req=$db->prepare('SELECT pays.* FROM pays 
					JOIN interet_pays ON interet_pays.id_pays = pays.id_pays
					WHERE id_etu = :id_etu;');
					$req->bindValue(":id_etu",$_SESSION['id_etu'],PDO::PARAM_INT);
					$req->execute();

					$pays_choisi = array();
					
					while( $data = $req->fetch(PDO::FETCH_ASSOC))
					{
						array_push($pays_choisi,$data["id_pays"]);
					}

					$req2=$db->prepare('SELECT * FROM pays');
					$req2->execute();
					while( $data = $req2->fetch(PDO::FETCH_ASSOC))
					{
						if (in_array($data["id_pays"], $pays_choisi)) {
							echo "<option value='{$data['id_pays']}' selected=\"selected\" >{$data['nom_pays']}</option>";
						}
						else
						{
							echo "<option value='{$data['id_pays']}'>{$data['nom_pays']}</option>";	
						}
					} 
				}
				catch (Exception $e)
				{
					$e->getMessage();
					echo $e;        
				}
				?>
				</select>
            </div></br>
			
			<div>
				<div>
					<input name="envoi" type="submit" value="Valider" class="waves-effect waves-light btn">
				</div>
			</div>
		</form>

	</div>
	</fieldset>	
	</div>
	

</body>
</html>