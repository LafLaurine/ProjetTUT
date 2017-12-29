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

<button id="pays" value="pays" class="button formaChoice pays">Par pays/domaine</button>

<div id="grand" class="paysContent">
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

	<aside class="sidebar">
		<h2>Asie</h2>
		<p>Japon</p>
		<p>Chine</p>
		<p>Inde</p>
	</aside>

	<aside class="sidebar">
		<h2>Océanie</h2>
		<p>Australie</p>
		<p>Nouvelle-Zélande</p>
	</aside>

	<aside class="sidebar">
		<h2>Afrique</h2>
		<p>Maroc</p>
		<p>Tunisie</p>
		<p>Afrique du Sud</p>
	</aside>

</div>

<div class="domContent">
<section id="formuCont">
		<h2>Art</h2>
		<p>Baccalauréat interdisciplinaire en art</p>
		<p>Licence Art Plastique</p>
		<p>Baccalauréat art visuel</p>
		<p>DUT MMI</p>
</section>
	
	<section id="middle">
		<h2>Informatique</h2>
		<p>Baccalauréat en conception de jeux vidéo</p>
		<p>DUT Informatique</p>
		<p>DUT MMI</p>
		<p>Classe préparatoire en mathématiques</p>
	</section>

	<aside class="sidebar">
		<h2>Administration</h2>
		<p>DUT GEA</p>
		<p>DUT TC</p>
		<p>Baccalauréat sciences comptables</p>
	</aside>

	<aside class="sidebar">
		<h2>Éducation</h2>
		<p>Licence</p>
		<p>Baccalauréat classe secondaire</p>
	</aside>

	<aside class="sidebar">
		<h2>Ingénierie</h2>
		<p>Prépa ingénieur</p>
		<p>Baccalauréat génie</p>
	</aside>
</div>

<div class="domContent">

	<section id="com">
	<aside class="sidebar">
		<h2>Communication</h2>
		<p>Licence communication</p>
		<p>DUT MMI</p>
	</aside>
	</section>

	<aside class="sidebar">
		<h2>Gestion</h2>
		<p>Maroc</p>
		<p>Tunisie</p>
		<p>Afrique du Sud</p>
	</aside>

	<aside class="sidebar">
		<h2>Langues</h2>
		<p>Licence anglais</p>
		<p>Licence allemand</p>
		<p>Baccalauréat en langue</p>
	</aside>

	<aside class="sidebar">
		<h2>Sciences</h2>
		<p>Maroc</p>
		<p>Tunisie</p>
		<p>Afrique du Sud</p>
	</aside>

	<aside class="sidebar">
		<h2>Santé</h2>
		<p>Maroc</p>
		<p>Tunisie</p>
		<p>Afrique du Sud</p>
	</aside>


</div>