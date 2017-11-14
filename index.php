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
    <link rel="stylesheet" type="text/css" href="./CSS/split.css">
</head>
<?php 

echo '<body style="overflow:hidden";>



    <div class="split-pane col-xs-12 col-sm-6 uiux-side">
    <div>
        <div class="text-content">
        <div class="big">TROUVER SA FORMATION A L\'ÉTRANGER ?</div>
        </div>
        <a id="register" href="./destination.php" class="button">TROUVE TA DESTINATION</a>
    </div>
    </div>
    <div class="split-pane col-xs-12 col-sm-6 frontend-side">
    <div>
        <div class="text-content">
        <div class="big">TE RENSEIGNER ?</div>
        </div>
        <a id="artc" href="./articles/index.php" class="button">CONSULTER LES ARTICLES</a>
    </div>
    </div>
    </body>';?>

</html>








