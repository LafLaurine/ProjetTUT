<?php 
session_start();
header('Content-type: text/html; charset=utf-8');
require_once $_SERVER['DOCUMENT_ROOT']. '/ProjetTUT/Traitements/connexion.php';
?>


<!DOCTYPE html>
<html lang="fr">
<head>
<title>International Student Planner - Projet tut</title>
<meta charset="UTF-8">
<link rel="icon" type="image/png" href="../img/fav_logo.png"/>
<link rel="stylesheet" type="text/css" href="../CSS/style.css">
<link type="text/css" rel="stylesheet" href="../CSS/materialize.css"  media="screen,projection"/>
<link rel="stylesheet" type="text/css" href="../CSS/profil.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="../CSS/articles.css">
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script src="../js/main.js"></script>
<script type="text/javascript" src="../js/materialize.js"></script>
<script src="../js/profil.js"></script>

</head>

<script>
	$(document).ready(function)
	{
		$(".dropdown-trigger").dropdown();
	});
	</script>
<style>
.table-of-contents a.active {
    border-left: 2px solid #1976D2!important;
  }
  nav .nav-wrapper img{
    margin-left: 10px;
    margin-top: 3px;
  }
  
      body {
    display: flex;
    min-height: 100vh;
    flex-direction: column;
    }
  
    main {
    flex: 1 0 auto;
    }
  </style>

<nav>
  <div class="nav-wrapper">
    <a href="./index.php" id="logo-container" class="brand-logo"><img src="../img/logo.png" style="width: 3.4rem;"/></a>
    <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
    <ul class="right hide-on-med-and-down">
			<li><a href="?lang=fr">FR</a></li>
 			<li><a href="?lang=en">EN</a></li>
			<li><a href="./index.php">Accueil</a></li>
			<li><a href="./articles.php">Pays</a></li>
			<li><a href="./langue.php">Langues</a></li>
			<li><a href="./domaines.php">Domaines</a></li>
     
      <?php if (!isset($_SESSION['pseudo'])) {
                      echo '<li><a href="../destination.php">Se connecter</a></li>';
                  }
                  
                  else if (isset($_SESSION['pseudo'])) {
									echo '<li><a href="./profil.php">Profil</a></li>';
									echo '<li><a href="./form.php">Formulaire</a></li>';
									echo '<li><a href="../Traitements/logout.php">Déconnexion</a></li>';
                  }?>
      <li><a href="./contact.php">Contact</a></li>
      
    </ul>
    <ul class="side-nav" id="mobile-demo">
    <li><a href="./index.php">Accueil</a></li>
    <li><a href="./articles.php">Pays</a></li>
    <li><a href="./langue.php">Langues</a></li>
    <li><a href="./domaines.php">Domaines</a></li>
      
      <?php if (!isset($_SESSION['pseudo'])) {
                      echo '<li><a href="../destination.php">Se connecter</a></li>';
                  }
                  
                  else if (isset($_SESSION['pseudo'])) {
                    echo '<li><a href="./profil.php">Profil</a></li>';
                    echo '<li><a href="./form.php">Formulaire</a></li>';
                    echo '<li><a href="../Traitements/logout.php">Déconnexion</a></li>';
                  }?>
      <li><a href="./contact.php">Contact</a></li>
    </ul>
  </div>
</nav>


<main>
<h1>INTERNATIONAL STUDENT PLANNER</h1>


<?php 
 try
	{
        	if (isset($_GET['article'])) 
		{
			$db = connectBd();
			$req=$db->prepare('SELECT DISTINCT * FROM article
			JOIN domaine ON article.id_domaine=domaine.id_domaine WHERE id_article=:id_article');
			$req->bindValue(":id_article",$_GET["article"],PDO::PARAM_STR);
			$req->execute();

			if($data = $req->fetch(PDO::FETCH_ASSOC))
			{
				echo '
				<div class="center-align truc" style="max-width:50em; margin-left:28rem;">
				<div class="card-panel"> <span>'. $data["contenu"]. '</span></div></div>
				';
				echo '<a href="./index.php" alt="Liste articles" class="showTag">Retourner à l`\accueil</a>';
			}
			else
			{
				echo "Pas d'article trouvé";
			}
		}
		else
		{	?>
			
			<table class="highlight bordered centered" style="margin-left: -3.7em;">
			<thead>
				<tr>
				<th>Domaine</th>
				<th>Articles</th>
				</tr>
			</thead>
			<tbody>
			<tr>
			<?php $db = connectBd();
			$req=$db->prepare('SELECT DISTINCT * FROM domaine');
			$req->execute();

			while( $data = $req->fetch(PDO::FETCH_ASSOC))
			{
				

				$req2=$db->prepare('SELECT DISTINCT * FROM article WHERE id_domaine=:id_domaine');
				$req2->bindValue(":id_domaine",$data["id_domaine"],PDO::PARAM_INT);
				$req2->execute();

				while( $article = $req2->fetch(PDO::FETCH_ASSOC))
				{
				
          echo "<td><a href=\"domaines.php?article={$article['id_article']}\">". $article["titre"]. '</td>';	
          echo '<td>'. $data["nom_domaine"]. '</td></tr>';	
				
				}
				
			}
		
		
	 ?>



</tbody>
</table></br></br>

<table class="highlight bordered centered">
	<thead>
		<tr>
		<th>Formations</th>
		<th>Domaine</th>
		</tr>
	</thead>
<tbody>
<tr>
<?php 
	$db = connectBd();
  $req=$db->prepare('SELECT DISTINCT * FROM composante');
  $req->execute();

  while( $data = $req->fetch(PDO::FETCH_ASSOC))
  {
          
  /* On sélectionne les formations dans la base de donnéees et on effectue un tri selon composante */
  $req2=$db->prepare('SELECT DISTINCT * FROM formation
      LEFT JOIN composante ON formation.id_composante=composante.id_composante
      WHERE formation.id_composante=:id_composante');
      $req2->bindValue(":id_composante",$data["id_composante"],PDO::PARAM_INT);
  $req2->execute();
  
          while( $compo = $req2->fetch(PDO::FETCH_ASSOC))
          {
      echo '<td>'. '<a style="text-decoration:underline;" target="_blank" href='.$compo["url"].'>'. $compo["nom_formation"].'</a></td>';
      echo '<td>'. $data["nom_composante"]. '</td></tr>';
          }
  }
		
	
  }
}
	catch (Exception $e)
	{
		$e->getMessage();
		echo $e;        
	} ?>


</tbody>
</table>


</main>
	
<footer class="page-footer blue darken-2">
<div class="container">
  <div class="row">

	<div class="col l6 s12">
		<h5 class="white-text">Réseaux sociaux</h5>
		<ul>
		<li class="social-footer"><a href="https://www.facebook.com/Internacia1/?ref=br_rs" target="_blank">Facebook</a></li>
  <li class="social-footer"><a href="https://twitter.com/ISPFrance?lang=fr" target="_blank">Twitter</a></li>
  <li class="social-footer"><a href="https://www.instagram.com/internationalstudentplanner/" target="_blank">Instagram</a></li>
		  </ul>
	  </div>
	<div class="col l3 s12 right">
	  <h5 class="white-text">Annexes</h5>
	  <ul>
		<li><a href="./propos.php">À propos</a></li>
	  <li><a href="./mention.php">Mentions légales</a></li>
	  <li><a href="./partenaires.php">Partenaires</a></li>
	  </ul>
	</div>
  </div>
</div>
<div class="footer-copyright">
  <div class="container">
  © 2017 International Student Planner
  </div>
</div>
</footer>

</body>
</html>