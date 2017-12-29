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



<button class="hamburger">&#9776;</button>
<ul class="menu">
	<li><a href="./">Home</a></li>
	<li>
		
		<label for="drop-1" class="toggle">Articles +</label>
		<a href="index.php">Articles</a>
		<input type="checkbox" id="drop-1"/>
		<ul id="drop">
			<li><a href="valise.php">Canada</a></li>
			<li><a href="france.php">France</a></li>
			<li><a href="canada.php">États-Unis</a></li>
		</ul> 

	</li>
   
	<li><a href="./formations.php">Formations</a></li>
	<li><a href="./contact.php">Contact</a></li>
	<li><a href="./profil.php">Profil</a></li><img src="../img/avatar.jpg" id="avatar"/>
	<a href="./form.php" id="formul">Formulaire</a>
	<?php if (isset($_SESSION['pseudo'])) {
	echo '<a href="../Traitements/logout.php" id="deco">Déconnexion</a></br>';
	}?>
	
</ul>

</nav>

<?php 

function connectBd () {
    $pdo_options[PDO::ATTR_EMULATE_PREPARES] = false;
    /* Active le mode exception */
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    /* Indique le charset */
    $pdo_options[PDO::MYSQL_ATTR_INIT_COMMAND] = "SET NAMES utf8";
    return new PDO('mysql:host=localhost;dbname=unnom', 'root', '',$pdo_options);
}

$search = $_POST['search'];

if (isset($search))
{

try
{
    $db = connectBd();
    $query = "SELECT titre,contenu FROM article  WHERE (`title` LIKE:search) OR (`contenu` LIKE:search)";   
    $req = $db->prepare($query);
    $req->bindValue(':search',%.$search.%, PDO::PARAM_STR);
	$req->execute();

    while( $data = $req->fetch(PDO::FETCH_ASSOC))
    {
        
		$key = array_search($search, $data); 
		echo $key;
      
    }
    
    
}

catch (Exception $e)
{
    $e->getMessage();
    echo $e;        
}

}



?>
