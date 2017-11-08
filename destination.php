<?php

session_start();
header('Content-type: text/html; charset=utf-8');

?>

<!DOCTYPE HTML>
<html lang="fr">
<head>
    <title>Intertional Student Planner</title>
    <meta charset="UTF-8">
    <meta name="author" content="Laurine Lafontaine">
	<meta name="description" content="Projet tut"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="./CSS/style.css">
    <link rel="stylesheet" type="text/css" href="./CSS/video.css">
    <link rel="stylesheet" type="text/css" href="./CSS/modal.css">
    <link rel="stylesheet" type="text/css" href="./CSS/profile.css">
    <script type="text/javascript" src="./js/jquery-3.2.1.min.js"></script>
    <script src="./js/main.js"></script>
    <script src="./js/profil.js"></script>

</head>

<body>

         

        <video poster="./img/screen.jpg" id="bgvid" playsinline autoplay muted loop>
          <source src="./img/videoweb.webm" type="video/webm">
          <source src="./img/video.mp4" type="video/mp4">
        </video>

        <div id="video">

                <h1 id="site">INTERNATIONAL STUDENT PLANNER</h1>
                <div id="bloc">
                <a id="info" class="button">Informations</a>
                <div class="information" style="display:none;">
                    <p>Projet tuteuré deuxième année de DUT MMI. </p>
                <p>Le but de ce site est d'accompagner les étudiants dans le choix de leur échange ou période à l'étranger</p>
                </div>
                

                <?php 
                //si user pas connecté
                   
                    if (!isset($_SESSION['nickname'])) {


                    
                
            echo '<div id="form">
            <a onclick="document.getElementById(\'anim\').style.display=\'block\'" class="button">Login</a>
            <div id="anim" class="modal">
            <div class="login-form">
            
            <button type="button" onclick="document.getElementById(\'anim\').style.display=\'none\'" class="cancelbtn">X</button>
            <div class="login-top">
                <h1 class="login-header">LOGIN</h1>
                <form action="./Traitements/traitementLogin.php" method="post">
                    <input type="text" id="user-name" name="nickname" />
                    <label for="user-name" class="input-prefix">Pseudo</label>
                    
                    <input type="password" id="password" name="passwd" />
                    <label for="password" class="input-prefix">Mot de passe</label>
                    
                    <input type="submit" id="sign-in" name="Sign-in" value="Se connecter" />
                    
                </form>
                
            </div>
            
            <div id="form">
            <div class="login-bottom">
                <a href="./Traitements/forgotPwd.php" class="forgot-password">Mot de passe oublié ?</a>
            </div>
            
            </div>              
               
                </div>
                </div>

                <a onclick="document.getElementById(\'registerForm\').style.display=\'block\'" class="button">Pas encore inscrit</a>
                <div id="registerForm" class="modal">
                
                <button type="button" onclick="document.getElementById(\'registerForm\').style.display=\'none\'" class="cancelbtn">X</button>'?>
                <?php include "./Traitements/register.php"; ?>
               
               
               <?php echo ' </div>';

                    }
                    
                    //utilisateur connecté
        else {
            echo ' <section id="bla" class="container">
            <div class="slope">
              <article class="content"> 
              <p>Bienvenue '. $_SESSION['nickname'] .'</p>';
              echo '<p>';
            echo ' <a href="./logout.php" class="transition">Déconnexion</a></br>';
            echo '<a href="./form.php" class="transition">Trouve ta destination</button></a></br>';
            echo ' <a onclick="document.getElementById(\'anim\').style.display=\'block\'" class="button">Profile</a>
            <div id="anim" class="modal">';
            echo ' <button type="button" onclick="document.getElementById(\'anim\').style.display=\'none\'" class="cancelbtn">X</button>
             <div class="container">
            <div class="card">
                <img src="./img/user.png" style="width:50%">
                <p class="title">Session de' . $_SESSION['nickname'] . '</p>';
                
           echo ' <div id="myDIV" class="header">
            <h2 style="margin:5px">To Do List</h2>
            <input type="text" id="myInput" placeholder="A faire...">
            <span onclick="newElement()" class="addBtn">Ajouter</span>
            </div>
    
            <ul id="myUL">
            <li class="checked">Obtenir de l\'argent</li>
            </ul>
               
            </div>
            
            </div>';
            echo '</div>';
            echo '</p>';
            echo '</article>';
            echo '</div>';
            echo '</section>';
        } ?>
        </div>
        </div>
            

<footer>
<!--<p> Mentions légales</p>-->
</footer>



</body>
</html>