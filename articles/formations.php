<?php 
session_start();
header('Content-type: text/html; charset=utf-8');
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
<script type="text/javascript" src="./js/jquery-3.2.1.min.js"></script>
<script src="./js/main.js"></script>
<script src="./js/profil.js"></script>

</head>
<body>
<nav>
<div id="logo"><img src="../img/logo.png"></div>



<label for="drop" class="toggle">Menu</label>
<input type="checkbox" id="drop" />
<ul class="menu">
	<li><a href="./">Home</a></li>
	<li>
		
		<label for="drop-1" class="toggle">Articles +</label>
		<a href="index.php">Articles</a>
		<input type="checkbox" id="drop-1"/>
		<ul id="drop">
			<li><a href="valise.php">Canada</a></li>
			<li><a href="france.php">France</a></li>
			<li><a href="canada.php">États-Unis</a></li>
		</ul> 

	</li>
   
	<li><a href="./formations.php">Formations</a></li>
	<li><a href="./contact.php">Contact</a></li>
	<li><a href="./profil.php">Profil</a></li><img src="../img/avatar.jpg" id="avatar"/>
	<a href="../form.php" id="formul">Formulaire</a>
	
</ul>



</nav>




<div class="wrap">
<div class="search">
  <input type="text" class="searchTerm" placeholder="Rechercher">
  <button type="submit" class="searchButton">
	<img src="./img/search.png">
 </button>
</div>
</div>

<h1>INTERNATIONAL STUDENT PLANNER</h1>

<div id="grand">
<section id="formuCont">
		<h2>Europe</h2>
		<p>Allemagne</p>
		<p>Belgique</p>
		<p>Espagne</p>
		<p>France</p>
		<p>Italie</p>
		<p>Portugal</p>
	</section>
	
	<section id="middle">
		<h2>Amérique</h2>
		<p>Argentine</p>
		<p>Canada</p>
		<p>États-Unis</p>
		<p>Mexique</p>
	</section>

	<aside id="sidebar">
		<h2>Asie</h2>
		<p>Japon</p>
		<p>Chine</p>
		<p>Inde</p>
	</aside>
	</div>