<?php

session_start();
header('Content-type: text/html; charset=utf-8');



?>

<!DOCTYPE HTML>
<html lang="fr">
<head>
    <title>Intertional Student Planner</title>
    <meta charset="UTF-8">
    <meta name="description" content="Accompagner les étudiants dans le choix de leur échange ou période à l'étranger.">
    <link rel="stylesheet" type="text/css" href="./CSS/style.css">
    <script src="js/main.js"></script>

</head>

<body>

    <div id="services" class="container-fluid ">

            <div id="form">
                <div class="title">
                    <h1 class="text-center">International Student Planner</h1>
                </div>
                <div id="btinfos">
                    <button>Informations </button>
                </div>
                <div id="informations">Projet tutoré DUT MMI</div>
                <h2 class="text-center">Connexion</h2>

                <?php 
                //si user pas connecté
                    if (!isset($_SESSION['nickname'])) {


                    
                
            echo '<button onclick="document.getElementById(\'anim\').style.display=\'block\'">Login</button>
            <div id="anim" class="modal">
            <form class="modal-content animate formu" action="./Traitements/traitementLogin.php" method="post">
                    <div class="container">
                        <label>Nom d\'utilisateur ou e-mail</label></br>
                        <input id="nickname" name="nickname" type="text" placeholder="Nom d\'utilisateur ou mail" required></br>
                        <label>Mot de passe</label></br>
                        <input id="passwd" name="passwd" type="password" placeholder="Password" required></br>
                        <button type="submit">Se connecter</button></br>
                    </div>
                  
                    <div class="container" style="background-color:#f1f1f1">
                    <button type="button" onclick="document.getElementById(\'anim\').style.display=\'none\'" class="cancelbtn">Cancel</button>
                    </div>
            </div>

                </form>
                </br>
                <a id="register" href="./register.php"><button type ="button">Pas encore inscrit ?</button></a>
                <div id="co-result"><p></p></div>';

                    }
                    
                    //utilisateur connecté
            else {
                echo '<p>Bienvenue '. $_SESSION['nickname'] .'</p>';
                echo ' <a href="./logout.php"><button>Déconnexion</button></a>';
            } ?>
            </div>
    </div>


<footer>
<p> Mentions légales</p>
</footer>



</body>
</html>