<?php 
session_start();
if (!isset($_SESSION['nickname'])) {
    header("Location: ./index.php");
}?>

<!DOCTYPE html>
<html>
<head>
    <title>Intertional Student Planner - Projet tut</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./CSS/style.css">
    <link rel="stylesheet" type="text/css" href="./CSS/menu.css">
    <link rel="stylesheet" type="text/css" href="./CSS/profile.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="./js/main.js"></script>
    <script src="./js/profile.js"></script>

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
        <div class="container">
        <div class="card">
            <img src="./img/user.png" style="width:50%">
            <h1 style="font-family: titleFont;">Profile</h1>
            <p class="title"><?php echo($_SESSION['nickname']); ?></p>
            
        <div id="myDIV" class="header">
        <h2 style="margin:5px">To Do List</h2>
        <input type="text" id="myInput" placeholder="A faire...">
        <span onclick="newElement()" class="addBtn">Ajouter</span>
        </div>

        <ul id="myUL">
        <li class="checked">Obtenir de l'argent</li>
        </ul>
           
        </div>
    	
	</div>
</body>
</html>