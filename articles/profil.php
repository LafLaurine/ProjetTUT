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



<label for="drop" class="toggle">Menu</label>
<input type="checkbox" id="drop" />
    <ul class="menu">
        <li><a href="./">Home</a></li>
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
		<li><a href="./profil.php">Profil</a></li>
		
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
<h2>Mon profil</h2>


<div class="containerProf">
            <div class="card1">
                <img src="../img/user.png" style="width:50%">
                <p class="title">Session de <?php  $_SESSION['nickname']  ?> </p>
                
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
            <ul>
            <li>Canada</li>
           <li>→ UQAC</li>
            → BIA
            </ul>
            </div>

            
</div>

</body>
</html>