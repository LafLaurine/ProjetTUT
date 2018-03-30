<?php

session_start();
header('Content-type: text/html; charset=utf-8');

?>

<!DOCTYPE HTML>
<html lang="fr">
<head>
<title>International Student Planner</title>
<meta charset="UTF-8">
<meta name="author" content="Laurine Lafontaine">
<meta name="description" content="Projet tut"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="./CSS/style.css">
    <link rel="stylesheet" type="text/css" href="./CSS/video.css">
    <link rel="stylesheet" type="text/css" href="./CSS/modal.css">
    <script type="text/javascript" src="./js/jquery.min.js"></script>
    <script type="text/javascript" src="./js/materialize.js"></script>
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
                <?php 
                //si user pas connecté
                   
                    if (!isset($_SESSION['pseudo'])) { ?>

                    
        <div class="login-box">
        <div class="lb-header">
        <a href="#" class="active" id="login-box-link">Se connecter</a>
        <a href="#" id="signup-box-link">S'inscrire</a>
        </div>

        
        <form class="email-login" action="./Traitements/traitementLogin.php" style="margin-top: 20%;" method="post">
        <div class="u-form-group">
        <label for="user-name" class="input-prefix">Pseudo</label>
        <input type="text" id="user-name" name="pseudo" />
        </div>
          <div class="u-form-group">
          <label for="password" class="input-prefix">Mot de passe</label>
          <input type="password" id="password" name="pass" />
          </div>
          <div class="u-form-group">
            <button>Se connecter</button>
          </div>
          <div class="u-form-group">
            <a href="#" class="forgot-password">Mot de passe oublié ?</a>
          </div>

         <?php if(@$_GET['action'] == 'success' ) {
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
               }?>
               
        </form>

        <?php include("./Traitements/register.php"); ?>

   
        </div>                                  
               
               <?php echo ' </div>';
                    }

                    else
                    {
                    echo '<a class="button" href="Traitements/logout.php" id="deco" style="margin-left:43%";>Déconnexion</a></br>';
                    echo '<a class="button" href="articles/articles.php" id="deco" style="margin-left:43%";>Retour aux articles</a></br>';
                    }
                    
      ?>
        </div>
            
</body>
</html>