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

<article class="article">
<header>
  <h1 class="headline">
    Comment bien préparer sa valise ?
  </h1>
</header>

<figure>
  <img src="../img/valise.jpg" alt="valise" class="imageArticle">
  <figcaption><strong>Comment bien partir ? Les solutions</strong></figcaption>
</figure>
<p class='textArticle'>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc eu auctor odio. 
  Ut eros orci, tincidunt sed lorem vitae, egestas sagittis orci. Proin semper eu dolor ut vulputate. 
  Aenean sodales arcu et augue tempor, et sollicitudin dui consectetur. Quisque finibus, arcu at ultricies pellentesque, lorem leo semper justo, 
  a fringilla sem risus at lorem. Donec vitae metus gravida, imperdiet risus et, sodales metus. 
  Etiam ornare vehicula massa non iaculis. Donec ante risus, pretium nec nibh ac, tristique venenatis turpis. 
  Maecenas at mi ornare, euismod libero vitae, fermentum turpis. Aliquam non sodales tortor, ut consequat metus. 
  Vivamus porttitor rhoncus ullamcorper. Sed aliquet, arcu at imperdiet facilisis, turpis urna placerat arcu, 
  fringilla porttitor ante mauris nec enim. Donec sit amet magna dui. Integer sodales tempus varius. 
  Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. 
  Duis nulla diam, blandit nec erat lacinia, euismod facilisis est.</p>

</article>
</body>

</html>