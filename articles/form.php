<?php 
session_start();
header('Content-type: text/html; charset=utf-8');

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
<link rel="stylesheet" type="text/css" href="../CSS/style.css">
<link rel="stylesheet" type="text/css" href="../CSS/menu.css">
<link rel="stylesheet" type="text/css" href="../CSS/profile.css">
<link rel="stylesheet" type="text/css" href="../CSS/articles.css">
<script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
<script src="../js/main.js"></script>
<script src="../js/profil.js"></script>

</head>
<body>
<nav>
<div id="logo"><img src="../img/logo.png"></div>



<button class="hamburger">&#9776;</button>
<ul class="menu">
	<li><a href="./">Home</a></li>
	<li>
		
		<label for="drop-1" class="toggle">Articles +</label>
		<a href="index.php">Articles</a>
		<input type="checkbox" id="drop-1"/>
		<ul id="drop">
			<li><a href="articles.php">Pays</a></li>
			<li><a href="articles_domaine.php">Domaine</a></li>
		</ul> 

	</li>
   
	<li><a href="./formations.php">Formations</a></li>
	<li><a href="./contact.php">Contact</a></li>
	<li><a href="./profil.php">Profil</a></li><img src="../img/avatar.jpg" id="avatar"/>
	<?php if (!isset($_SESSION['pseudo'])) {
		echo '<a href="../destination.php" id="seCo">Se connecter</a>';
	}
	
	else if (isset($_SESSION['pseudo'])) {
	echo '<a href="./form.php" id="formul">Formulaire</a>';
	echo '<a href="../Traitements/logout.php" id="deco">Déconnexion</a></br>';
	}?>
	
</ul>

</nav>

<h1>INTERNATIONAL STUDENT PLANNER</h1>
	<div class="containerF">
		<h2 style="margin-left:45%";>Questionnaire</h2>
		<form action="../Traitements/traitementForm.php" class="formu" method="post">
		<fieldset>
			<div>
				<label for="study">Niveau d'études*</label><br>
				<input name="study" type="radio">Lycée</br>
				<input name="study" type="radio">Bac +1 ou +2</br>
				<input name="study" type="radio">Bac +3</br>
				<input name="study" type="radio">Master</br>
				<input name="study" type="radio">Doctorat</br>
				<input name="study" type="radio">Hors études</br>
			</div></br>

			<div>
				<label for="studyLevel">Intitulé de votre formation : </label><br>
				<input name="studyLevel" type='text'>
			</div></br>

			<div>
				<label for="projet">Projet*</label><br>
				<input name="projet" type='text'>
			</div></br>

			<div>
				<label for="domaine">Domaine d'études*</label><br>
				<select id="domain" form="domainForm" multiple>
					<option value="art" name="art">Art</option>
					<option value="informatique" name"informatique">Informatique</option>
					<option value="administration" name="administration">Administration</option>
					<option value="education" name="education">Éducation</option>
					<option value="ingenierie" name="ingénierie">Ingénierie</option>	
					<option value="communication" name="communication">Communication</option>
					<option value="gestion" name="gestion">Gestion</option>
					<option value="langues" name="langue">Langues</option>
					<option value="sciences" name="sciences">Sciences</option>
					<option value="sante" name="santé">Santé</option>			
				</select>
			</div></br>
			
			
			<div>
				<label for="langue">Langue(s) recherché(es)*</label><br>
				<select id="langue" form="language" multiple>
					<option value="fr" name="fr">Français</option>
					<option value="eng" name="eng">Anglais</option>
					<option value="de" name="de">Allemand</option>
					<option value="es" name="es">Espagnol</option>
					<option value="jpn" name="jpn">Japon</option>
				</select>
            </div></br>

            <div>
				<label for="job">Métier envisagé*</label> </br>
				<input id="job" type="text" name="job" required>
            </div></br>

			<div>
				<label for="country">Pays souhaité</label> </br>
				<select id="country" form="countryform" multiple>
					<option value="fr" name="France">France</option>
					<option value="eng" name="Angleterre">Angleterre</option>
					<option value="de" name="Allemagne">Allemagne</option>
					<option value="ca" name="Canada">Canada</option>
					<option value="qc" name="Québec">Québec</option>
					<option value="es" name="Espagne">Espagne</option>
					<option value="jap" name="Japon">Japon</option>
					<option value="aus" name="Australie">Australie</option>
					<option value="eu" name="États-Unis">États-Unis</option>
					<option value="nz" name="Nouvelle-Zélande">Nouvelle-Zélande</option>
					<option value="aut" name="Autriche">Autriche</option>
				</select>
            </div></br>

			<div>
				<label for="climat">Climat préféré</label></br>
				<input name="climat" type="radio" value="froid">Froid
				<input name="climat" type="radio" value="mod">Modéré
				<input name="climat" type="radio" value="chaud">Chaud
			</div></br>

			<div>
				<label for="env">Environnement</label></br>
				<input name="env" type="radio" value="ville">Grande ville
				<input name="env" type="radio" value="villeMoy">Ville moyenne
				<input name="env" type="radio" value="villePet">Petite ville
			</div></br>

			<div>
				<label for="loisir">Loisirs</label><br>
				<input name="loisir" type="checkbox" value="dess" name="dessiner">Dessiner
				<input name="loisir" type="checkbox" value="prog" name="programmer">Programmer
				<input name="loisir" type="checkbox" value="lire" name="lire">Lire
				<input name="loisir" type="checkbox" value="serie" name="série">Regarder des séries
			</div></br>
			
			<div>
				<div>
					<input name="envoi" type="submit" value="Valider">
				</div>
			</div>
		</form>

		
	</div>
	</fieldset>

	
</body>
</html>