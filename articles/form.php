<?php 
session_start();
header('Content-type: text/html; charset=utf-8');

if (!isset($_SESSION['nickname'])) {
	
		 echo "<script type=\"text/javascript\">
		 alert(\"Utilisateur non connecté\");
		 location=\"index.php\";
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



<label for="drop" class="toggle">Menu</label>
<input type="checkbox" id="drop" />
<ul class="menu">
	<li><a href="./articles/index.php">Home</a></li>
	<li>
		
		<label for="drop-1" class="toggle">Articles +</label>
		<a href="index.php">Articles</a>
		<input type="checkbox" id="drop-1"/>
		<ul id="drop">
			<li><a href="valise.php">Valise</a></li>
			<li><a href="france.php">France</a></li>
			<li><a href="canada.php">Canada</a></li>
		</ul> 

	</li>
   
	<li><a href="./formations.php">Formations</a></li>
	<li><a href="./contact.php">Contact</a></li>
	<li><a href="./profil.php">Profil</a></li><img src="../img/avatar.jpg" id="avatar"/>
	<a href="./form.php" id="formul">Formulaire</a>
	
</ul>



</nav>




<div class="wrap">
<div class="search">
  <input type="text" class="searchTerm" placeholder="Rechercher">
  <button type="submit" class="searchButton">
	<img src="../img/search.png">
 </button>
</div>
</div>

<h1>INTERNATIONAL STUDENT PLANNER</h1>
	<div class="containerF">
		<h2 style="margin-left:45%";>Questionnaire</h2>
		<form action="./Traitements/traitementForm.php" class="formu" method="post">
		<fieldset>
			<div>
				<label for="study">Niveau d'études*</label><br>
				<input name="study" type="radio">Lycée</br>
				<input name="study" type="radio">Bac +1 ou +2</br>
				<input name="study" type="radio">Master</br>
				<input name="study" type="radio">Hors études</br>
			</div></br>

			<div>
				<label for="studyDom">Domaine d'études*</label><br>
				<input name="studyDom" type="checkbox" value="art">Art</br>
				<input name="studyDom" type="checkbox" value="infor">Informatique</br>
				<input name="studyDom" type="checkbox" value="medecine">Médecine</br>
				<input name="studyDom" type="checkbox" value="sport">Sport</br>
			</div></br>
			
			
			<div>
				<label for="language">Langue(s) recherché(es)*</label><br>
				<input name="language" type="checkbox" value="Fr">Français</br>
				<input name="language" type="checkbox" value="Eng">Anglais</br>
				<input name="language" type="checkbox" value="All">Allemand</br>
				<input name="language" type="checkbox" value="Italien">Italien</br>
            </div></br>

            <div>
				<label for="job">Métier envisagé*</label> </br>
				<input id="job" type="text" name="job" required>
            </div></br>

			<div>
				<label for="country">Pays souhaité</label> </br>
				<select id="country" form="countryform">
					<option value="fr">France</option>
					<option value="eng">Angleterre</option>
					<option value="all">Allemagne</option>
					<option value="ital">Italie</option>
					<option value="can">Canada</option>
					<option value="jap">Japon</option>
				</select>
            </div></br>

			<div>
			<label for="budget">Budget</label> </br>
			<input name="budget" type="text" id="budget">
			</div>
			</br>

			<div>
				<label for="climat">Climat préféré</label></br>
				<input name="climat" type="radio" value="froid">Froid
				<input name="climat" type="radio" value="mod">Modéré
				<input name="climat" type="radio" value="chaud">Chaud
			</div></br>

			<div>
				<label for="env">Environnement</label></br>
				<input name="env" type="radio" value="ville">Ville
				<input name="env" type="radio" value="camp">Campagne
			</div></br>

			<div>
				<label for="loisir">Loisirs</label><br>
				<input name="loisir" type="checkbox" value="dess">Dessiner
				<input name="loisir" type="checkbox" value="prog">Programmer
				<input name="loisir" type="checkbox" value="lire">Lire
				<input name="loisir" type="checkbox" value="serie">Regarder des séries
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