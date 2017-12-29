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
			<li><a href="articles.php">Pays</a></li>
			<li><a href="articles_domaine.php">Domaine</a></li>
		</ul> 

	</li>
   
	<li><a href="./formations.php">Formations</a></li>
	<li><a href="./contact.php">Contact</a></li>
	<li><a href="./profil.php">Profil</a></li><img src="../img/avatar.jpg" id="avatar"/>
	<?php if (!isset($_SESSION['pseudo'])) {
		echo '<a href="../destination.php" id="seCo">Se connecter</a>';
	}
	
	else if (isset($_SESSION['pseudo'])) {
	echo '<a href="./form.php" id="formul">Formulaire</a>';
	echo '<a href="../Traitements/logout.php" id="deco">Déconnexion</a></br>';
	}?>
	
</ul>

</nav>

<h1>INTERNATIONAL STUDENT PLANNER</h1>

<article class="article">

<?php if (isset($_GET["action"]) && $_GET["action"] == "get_articles" && isset($_GET["id_article"]))
{
$detail_article = file_get_contents('http://localhost/ProjetTUT/Traitements/apiArticles.php?action=get_articles&id_article='.$_GET["id_article"]);
$detail_article = json_decode($detail_article, true);
echo $detail_article["titre"]; ?> </br>
<?php echo $detail_article["contenu"]; ?>
 <br/>
<a href="http://localhost/ProjetTUT/articles/articles.php?action=get_list_articles" alt="Liste articles">Retourner à la liste des articles</a>
<?php 
}


else
{
$Liste_article = file_get_contents("http://localhost/ProjetTUT/Traitements/apiArticles.php?action=get_list_articles");
$Liste_article = json_decode($Liste_article, true); ?>
<ul>
<?php foreach ($Liste_article as $app): ?>
<li>
<?php 
if ($app["id_article"] <=2) { ?>
	<a href=<?php echo "http://localhost/ProjetTUT/articles/articles.php?action=get_articles&id_article=".$app["id_article"] ?> > <?php echo $app["titre"];?></a></br>
<?php }
 ?>


</li>
<?php endforeach; ?>
</ul>
<?php } ?>

</article>


</body>

</html>