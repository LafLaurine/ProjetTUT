<?php

session_start();
header('Content-type: text/html; charset=utf-8');

?>

<!DOCTYPE html>
<html lang="fr">
<head>
<title>Intertional Student Planner - Projet tut</title>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="./CSS/style.css">
<link rel="stylesheet" type="text/css" href="./CSS/menu.css">
<link rel="stylesheet" type="text/css" href="./CSS/modal.css">
<link rel="stylesheet" type="text/css" href="./CSS/profile.css">
<link rel="stylesheet" type="text/css" href="./CSS/articles.css">
<script type="text/javascript" src="./js/jquery-3.2.1.min.js"></script>
<script src="./js/main.js"></script>
<script src="./js/profil.js"></script>

</head>
<body>
<nav>
<div id="logo"><img src="./img/logo.png"></div>





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

<h2>Mentions légales</h2>

<h3>Condition d'utilisation</h3>

<p>LOREM IPSUUUUUUUUUUUUUUM</p>

<h3>Limitation de responsabilité</h3>

<p>LOREM</p>

<h3>Propriété</h3>

<p>LOOOOOO</p>

<h3>Hébergeur</h3>

<p>1&1</p>

<h3>Conditon de service</h3>

<h3>responsabilité</h3>