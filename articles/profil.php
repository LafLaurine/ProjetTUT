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
<h2>Mon profil</h2>
<?php 

$pseudo = $_SESSION['pseudo']; ?>

<div class="containerProf">
            <div class="card1">
                <img src="../img/user.png" style="width:50%">
                <p class="title">Session de <?php print_r($pseudo); ?> </p>
               
                
           <div id="myDIV" class="header">
            <h2 style="margin:5px">To Do List</h2>
            <input type="text" id="myInput" placeholder="A faire...">
            <span onclick="newElement()" class="addBtn">Ajouter</span>
            </div>
    
            <ul id="myUL">
            <li class="checked">Obtenir de l'argent</li>
            </ul>
               
            </div>

            <div class="forma">
            <h2>Formulaire</h2>
            <h4 style="color:black";>Résultats</h4>
            <a href="./form.php"><button class="button" value="modif">Modifier le formulaire</button></a>
            </div>

            
</div>

</body>
</html>