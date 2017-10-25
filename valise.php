<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Intertional Student Planner - Projet tut</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./CSS/style.css">
    <link rel="stylesheet" type="text/css" href="./CSS/menu.css">
    
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
                
                <label for="drop-1" class="toggle">Articles +</label>
                <a href="./articles.php">Articles</a>
                <input type="checkbox" id="drop-1"/>
                <ul>
                    <li><a href="./valise.php">Valise</a></li>
                    <li><a href="./france.php">France</a></li>
                    <li><a href="./canada.php">Canada</a></li>
                </ul> 

            </li>
           
            <li><a href="#">Contact</a></li>
        </ul>
    </nav>
    <h1>Comment bien préparer sa valise ?</h1>
    <p>COMME CELA</p>
</body>

</html>