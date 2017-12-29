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
<link rel="stylesheet" type="text/css" href="../CSS/modal.css">
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

<div id="testimonials">
        <ul>
			<li>
				<blockquote>Site génial ! J'ai pu partir l'esprit tranquille.</blockquote>
				<p class="author">Pauline, étudiante</p>
			</li>
			<li>
				<blockquote>Je recommande ce site, simple à utiliser !</blockquote>
				<p class="author">Florian, étudiant</a></p>
			</li>
			<li>
				<blockquote>Quel site fabuleux !</blockquote>
				<p class="author">Jean, prof</a></p>
			</li>
        </ul>
    </div>

<div class="container">
	<div class="cards">
		<a class="card" href="#">
			<span class="card-header" style="background-image: url(../img/img1.JPG);">
				<span class="card-title">
					<h3>Incontournables à Montréal</h3>
				</span>
			</span>
			<span class="card-summary">
				Trucs à voir à Montéral : beaucoup de musées à visiter si vous êtes interessés par les arts. 
				Sinon, de très bon spot pour manger ainsi que pour rire.
			</span>
			<span class="card-meta">
				Visites
			</span>
		</a>

		
		<a class="card" href="#">
			<span class="card-header" style="background-image: url(../img/img3.jpeg)">
				<span class="card-title">
					<h3>Transports</h3>
				</span>
			</span>
			<span class="card-summary">
				Comparaison des meilleurs transports
			</span>
			<span class="card-meta">
				Transport
			</span>
		</a>

		<a class="card" href="#">
			<span class="card-header" style="background-image: url(../img/img4.JPG);">
				<span class="card-title">
					<h3>Incontournables à New York</h3>
				</span>
			</span>
			<span class="card-summary">
				Choses incontournables à voir à NY. Vous allez pouvoir découvrir les meilleurs endroits qui s'y trouvent.
				En passant par le Brooklyn Bridge et Rockfeller.
			</span>
			<span class="card-meta">
				Visites
			</span>
		</a>
		
		<a class="card" href="./valise.php">
			<span class="card-header" style="background-image: url(../img/valise.jpg);">
				<span class="card-title">
					<h3>Préparer sa valise</h3>
				</span>
			</span>
			<span class="card-summary">
				Comment préparer sa valise pour ses études ?
			</span>
			<span class="card-meta">
				Pratique
			</span>
		</a>
		
		<a class="card" href="#">
			<span class="card-header" style="background-image: url(../img/poutine.jpg);">
				<span class="card-title">
					<h3>Spécialité culinaires</h3>
				</span>
			</span>
			<span class="card-summary">
				Using Flexbox is such a an easy, well supported way for grid-style content, such as cards. The cards height will expand to match the longest item.
			</span>
			<span class="card-meta">
				Published: June 18th, 2015
			</span>
		</a>

		<a class="card" href="#">
			<span class="card-header" style="background-image: url(../img/cold.jpeg);">
				<span class="card-title">
					<h3>Se préparer au froid</h3>
				</span>
			</span>
			<span class="card-summary">
				Si vous partez étudier au Canada, vous aurez besoin de beaucoup de conseil quant à savoir quel manteau choisir.
			</span>
			<span class="card-meta">
				Published: June 18th, 2015
			</span>
		</a>

		<a class="card" href="#">
			<span class="card-header" style="background-image: url(../img/quebec.jpg);">
				<span class="card-title">
					<h3>Fêtes et jours fériés à Québec</h3>
				</span>
			</span>
			<span class="card-summary">
				Each card is created from an &lt;a&gt; tag so the whole card is linked.
			</span>
			<span class="card-meta">
				Published: June 18th, 2015
			</span>
		</a>

		<a class="card" href="#">
			<span class="card-header" style="background-image: url(http://placeimg.com/400/400/tech);">
				<span class="card-title">
					<h3>Où sortir à Toronto</h3>
				</span>
			</span>
			<span class="card-summary">
			</span>
			<span class="card-meta">
				Published: June 18th, 2015
			</span>
		</a>
	</div>

	<footer>
		<p style='color:black';>Copyright © 2017 | International Student Planner</p>
		<p><a href="../mention.php" target="_blank">Mentions légales</a></p>
		<p><a href="../partenaires.php"  target="_blank">Partenaires</a></p>
		
	</footer>
	


</div>
</body>
</html>