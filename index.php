<?php

session_start();
header('Content-type: text/html; charset=utf-8');



?>

<!DOCTYPE HTML>
<html lang="fr">
<head>
    <title>Intertional Student Planner - Projet tut</title>
    <meta charset="UTF-8">
    <meta name="author" content="Laurine Lafontaine">
	<meta name="description" content="Projet tut"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="./CSS/style.css">
    <link rel="stylesheet" type="text/css" href="./CSS/menu.css">
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
                
                <label for="drop-1" class="toggle">Pays +</label>
                <a href="./articles.php">Pays</a>
                <input type="checkbox" id="drop-1"/>
                <ul>
                    <li><a href="./valise.php">Canada</a></li>
                    <li><a href="./france.php">France</a></li>
                    <li><a href="./canada.php">États-Unis</a></li>
                </ul> 

            </li>
           
            <li><a href="#">Contact</a></li>
        </ul>
    </nav>
    <!-- POUR LE SITE !!!!!
    UN FOND EN VIDEO EN OPACITE PAS BEAUCOUP DE GENS QUI VOYAGENT
    INTERNATIONAL STUDENT PLANNER + PHRASE DESCRIPTION (=INFORMATION)
    ENSUITE LA PAGE FAIT GENRE DES SLIDES POUR CLIQUER SUR TON CHOIX
    CHOIX NUMBER 1 : HEY MAGGLE TU PEUX ACCEDER AUX ARTICLES "CONSULTER LES ARTICLES"
    CHOIX 2 : C'EST BON TU PEUX TE CO "TROUVE TA DESTINATION"
    !-->

          <div id="accueil">
			    <h1 id="site">INTERNATIONAL STUDENT PLANNER</h1>
                <a id="info" class="button">Informations</a>
                    <div class="information" style="display:none;">Projet tuteuré deuxième année de DUT MMI. 
                    Le but de ce site est d'accompagner les étudiants dans le choix de leur échange ou période à l'étranger</div>
        
                  



                <?php 
                //si user pas connecté
                   
                    if (!isset($_SESSION['nickname'])) {


                    
                
            echo '<div id="form">
            <a onclick="document.getElementById(\'anim\').style.display=\'block\'" class="button">Login</a>
            <div id="anim" class="modal">
            <form class="modal-content animate formu" action="./Traitements/traitementLogin.php" method="post">
                    <div class="container">
                        <label>Nom d\'utilisateur</label></br>
                        <input id="nickname" name="nickname" type="text" placeholder="Nom d\'utilisateur" required>
                        <label>Mot de passe</label></br>
                        <input id="passwd" name="passwd" type="password" placeholder="Password" required>
                        <button type="submit">Se connecter</button>
                    </div>
                  
                    <div class="container" style="background-color:#f1f1f1">
                    <button type="button" onclick="document.getElementById(\'anim\').style.display=\'none\'" class="cancelbtn">Cancel</button>
                    </div>
            </div>

                </form>
                </br>
                <a id="register" href="./register.php" class="button">Pas encore inscrit ?</a>
                <div id="co-result"><p></p></div>';

                    }
                    
                    //utilisateur connecté
        else {
            echo ' <section id="bla" class="container">
            <div class="slope">
              <article class="content"> 
              <p>Bienvenue '. $_SESSION['nickname'] .'</p>';
              echo '<p>';
            echo ' <a href="./logout.php" class="button">Déconnexion</a></br>';
            echo ' <a href="./form.php" class="button">Accéder au formulaire</button></a></br>';
            echo ' <a href="./profil.php" class="button">Profil</a></br>';
            echo '</p>';
            echo '</article>';
            echo '</div>';
            echo '</section>';
        } ?>
        </div>
            
    

<footer>
<!--<p> Mentions légales</p>-->
</footer>



</body>
</html>