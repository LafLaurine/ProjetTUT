<?php 
session_start();
if (!isset($_SESSION['nickname'])) {
    header("Location: ./index.php");
}?>

<!DOCTYPE html>
<html>
<head>
	<title>Intertional Student Planner - Projet tut</title>
	<meta charset="UTF-8">

	<link rel="stylesheet" type="text/css" href="./CSS/menu.css">
	<link rel="stylesheet" type="text/css" href="./CSS/form.css">
	<link rel="stylesheet" type="text/css" href="./CSS/modal.css">
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="js/main.js"></script>

</head>
<body>
<nav>
    <div id="logo"><img src="./img/logo.png"></div>

    <label for="drop" class="toggle">Menu</label>
    <input type="checkbox" id="drop" />
        <ul class="menu">
            <li><a href="./">Home</a></li>
            <li>
                
                <label for="drop-1" class="toggle">Articles +</label>
                <a href="./articles.php">Articles</a>
                <input type="checkbox" id="drop-1"/>
                <ul>
                    <li><a href="./articles/valise.php">Valise</a></li>
                    <li><a href="./articles/france.php">France</a></li>
                    <li><a href="./articles/canada.php">Canada</a></li>
                </ul> 

            </li>
           
            <li><a href="#">Contact</a></li>
        </ul>
	</nav>
	
	<div class="container">
		<h2>Questionnaire</h2>
		<form action="./Traitements/traitementForm.php" class="formu" method="post">

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
				<label for="job">Métier envisagé*</label> 
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
			<a onclick="myFunction()">Budget</a></br>
				<input id="slider" type ="range" min ="1000" max="10000" value ="0"></br>
				<p id="demo"></p>
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
					<input name="submit" type="submit" value="Valider">
				</div>
			</div>
		</form>
	</div>
</body>
</html>