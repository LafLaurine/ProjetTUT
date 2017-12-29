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
                    <p class="para">Projet tuteuré deuxième année de DUT MMI. </p>
                <p class="para">Le but de ce site est d'accompagner les étudiants dans le choix de leur échange ou période à l'étranger</p>
                </div>
                

                <?php 
                //si user pas connecté
                   
                    if (!isset($_SESSION['pseudo'])) {


                    
                
            echo '<div id="form">
            <a onclick="document.getElementById(\'anim\').style.display=\'block\'" id="btnLog" class="button">CONNEXION</a>
            <div id="anim" class="modal">
            <div class="login-form">
            
            <button type="button" onclick="document.getElementById(\'anim\').style.display=\'none\'" class="cancelbtn">X</button>
            <div class="login-top">
                <h1 class="login-header">CONNEXION</h1>
                <form action="./Traitements/traitementLogin.php" method="post">
                    <input type="text" id="user-name" name="pseudo" />
                    <label for="user-name" class="input-prefix">Pseudo</label>
                    
                    <input type="password" id="password" name="pass" />
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

                <a onclick="document.getElementById(\'registerForm\').style.display=\'block\'" id="btnReg" class="button">INSCRIPTION</a>
                <div id="registerForm" class="modal">
                
                <button type="button" onclick="document.getElementById(\'registerForm\').style.display=\'none\'" class="cancelbtn">X</button>'?>
                  
                <?php include "./Traitements/register.php"; ?>
               
               
               <?php echo ' </div>';
               
               if(@$_GET['action'] == 'success' ) {
                echo "<h2 style=\"color:#3080D0; text-align:center;\"> Votre compte a bien été enregistré, vous pouvez vous connecter </h2>";
               }

               if(@$_GET['action'] == 'fail' ) {
                echo "<h2 style=\"color:#3080D0; text-align:center;\"> Mauvais mot de passe </h2>";
               }

               if(@$_GET['action'] == 'wrongMDP' ) {
                echo "<h2 style=\"color:#3080D0; text-align:center;\"> Les mots de passe ne correspondent pas </h2>";
               }

               if(@$_GET['action'] == 'user' ) {
                echo "<h2 style=\"color:#3080D0; text-align:center;\"> Utilisateur non inscrit </h2>";
               }

               if(@$_GET['action'] == 'empty' ) {
                echo "<h2 style=\"color:#3080D0; text-align:center;\"> Champs vides </h2>";
               }

                    }
                    
      ?>
        </div>
        </div>
            
</body>
</html>