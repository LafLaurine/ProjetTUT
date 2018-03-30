<?php

session_start();
header('Content-type: text/html; charset=utf-8');
require_once $_SERVER['DOCUMENT_ROOT']. '/ProjetTUT/lang/lang.php';

?>

<!DOCTYPE html>
<!-- différentes langues -->
<html lang="<?php echo $_SESSION['lang']; ?>">
<head>
<title>International Student Planner</title>
<meta charset="UTF-8">
<link rel="icon" type="image/png" href="../img/fav_logo.png"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<link rel="stylesheet" type="text/css" href="../CSS/style.css">
<link rel="stylesheet" type="text/css" href="../CSS/modal.css">
<link rel="stylesheet" type="text/css" href="../CSS/profil.css">
<link rel="stylesheet" type="text/css" href="../CSS/articles.css">
<link type="text/css" rel="stylesheet" href="../CSS/materialize.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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

<!-- menu principal -->
<nav>
  <div class="nav-wrapper">
    <a href="./index.php" id="logo-container" class="brand-logo"><img src="../img/logo.png" style="width: 3.4rem;"/></a>
    <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
    <ul class="right hide-on-med-and-down">
			<li><a href="?lang=fr">FR</a></li>
 			<li><a href="?lang=en">EN</a></li>
			<li><a href="./index.php"><?php echo _ACCUEIL ?></a></li>
			<li><a href="./articles.php"><?php echo _PAYS ?></a></li>
			<li><a href="./langue.php"><?php echo _LANGUE ?></a></li>
			<li><a href="./domaines.php"><?php echo _DOMAINES ?></a></li>
     
      <?php if (!isset($_SESSION['pseudo'])) {
                      echo '<li><a href="../destination.php">_CONNECTER</a></li>';
                  }
                  
                  else if (isset($_SESSION['pseudo'])) {
									echo '<li><a href="./profil.php">'; 
									echo _PROFIL;
									echo '</a></li>';
									echo '<li><a href="./form.php">';
									echo _FORMULAIRE;
									echo '</a></li>';
									echo '<li><a href="../Traitements/logout.php">';
									echo _DECONNEXION;
									echo '</a></li>';
                  }?>
      <li><a href="./contact.php"><?php echo _CONTACT?></a></li>
      
    </ul>
    <ul class="side-nav" id="mobile-demo">
    <li><a href="./index.php"><?php echo _ACCUEIL ?></a></li>
		<li><a href="./articles.php"><?php echo _PAYS ?></a></li>
		<li><a href="./langue.php"><?php echo _LANGUE ?></a></li>
		<li><a href="./domaine.php"><?php echo _DOMAINES ?></a></li>
      
      <?php if (!isset($_SESSION['pseudo'])) {
											echo '<li><a href="../destination.php">';
											echo '_CONNEXION';
											echo '</a></li>';
                  }
                  
                  else if (isset($_SESSION['pseudo'])) {
										echo '<li><a href="./profil.php">'; 
									echo _PROFIL;
									echo '</a></li>';
									echo '<li><a href="./form.php">';
									echo _FORMULAIRE;
									echo '</a></li>';
									echo '<li><a href="../Traitements/logout.php">';
									echo _DECONNEXION;
									echo '</a></li>';
                  }?>
      <li><a href="./contact.php"><?php echo _CONTACT ?></a></li>
    </ul>
  </div>
</nav>

<main>
<h1>INTERNATIONAL STUDENT PLANNER</h1>

<?php include($_SERVER['DOCUMENT_ROOT']. '/ProjetTUT/Traitements/twitter.php');?>

<div class="container">
	<div class="cards">
		<a class="card" href="http://localhost/ProjetTUT/articles/articles.php?article=5">
			<span class="card-header" style="background-image: url(../img/img1.JPG);">
				<span class="card-title">
					<h3><?php echo _MONT ?></h3>
				</span>
			</span>
			<span class="card-summary">
			<?php echo _MONTDESC ?>
			</span>
			<span class="card-meta">
			<?php echo _VISITE ?>
			</span>
		</a>

		
		<a class="card" href="http://localhost/ProjetTUT/articles/articles_domaine.php?article=10">
			<span class="card-header" style="background-image: url(../img/iut-bobigny.jpg)">
				<span class="card-title">
					<h3><?php echo _BOBIGNY ?></h3>
				</span>
			</span>
			<span class="card-summary">
			<?php echo _BOBIGNYDESC ?>
			</span>
			<span class="card-meta">
			<?php echo _PRATIQUE ?>
			</span>
		</a>

		<a class="card" href="http://localhost/ProjetTUT/articles/articles.php?article=7">
			<span class="card-header" style="background-image: url(../img/img4.JPG);">
				<span class="card-title">
					<h3><?php echo _NY ?></h3>
				</span>
			</span>
			<span class="card-summary">
			<?php echo _NYDESC ?>
			</span>
			<span class="card-meta">
			<?php echo _VISITE ?>
			</span>
		</a>
		
		<a class="card" href="http://localhost/ProjetTUT/articles/articles_domaine.php?article=8">
			<span class="card-header" style="background-image: url(../img/valise.jpg);">
				<span class="card-title">
					<h3><?php echo _VALISE ?></h3>
				</span>
			</span>
			<span class="card-summary">
			<?php echo _VALISEDESC ?>
			</span>
			<span class="card-meta">
			<?php echo _PRATIQUE ?>
			</span>
		</a>
		
		<a class="card" href="http://localhost/ProjetTUT/articles/articles.php?article=1">
			<span class="card-header" style="background-image: url(../img/uqac.jpg);">
				<span class="card-title">
					<h3><?php echo _UQAC ?></h3>
				</span>
			</span>
			<span class="card-summary">
			<?php echo _UQACDESC ?>			</span>
			<span class="card-meta">
			<?php echo _CULTURE ?>
			</span>
		</a>

		<a class="card" href="http://localhost/ProjetTUT/articles/articles_domaine.php?article=9">
			<span class="card-header" style="background-image: url(../img/cold.jpeg);">
				<span class="card-title">
					<h3><?php echo _FROID ?></h3>
				</span>
			</span>
			<span class="card-summary">
			<?php echo _FROIDDESC ?>
			</span>
			<span class="card-meta">
			<?php echo _PRATIQUE ?>
			</span>
		</a>

		<a class="card" href="http://localhost/ProjetTUT/articles/articles.php?article=4">
			<span class="card-header" style="background-image: url(../img/p13.png);">
				<span class="card-title">
					<h3><?php echo _P13 ?></h3>
				</span>
			</span>
			<span class="card-summary">
			<?php echo _P13DESC ?>
			</span>
			<span class="card-meta">
			<?php echo _PRATIQUE ?>
			</span>
		</a>

		
	</div>
	</div>

	</main>
	<footer class="page-footer blue darken-2">
	<div class="container">
	  <div class="row">
  
		<div class="col l6 s12">
			<h5 class="white-text"><?php echo _RS ?></h5>
			<ul>
			<li class="social-footer"><a href="https://www.facebook.com/Internacia1/?ref=br_rs" target="_blank">Facebook</a></li>
      <li class="social-footer"><a href="https://twitter.com/ISPFrance?lang=fr" target="_blank">Twitter</a></li>
      <li class="social-footer"><a href="https://www.instagram.com/internationalstudentplanner/" target="_blank">Instagram</a></li>
			  </ul>
		  </div>
		<div class="col l3 s12 right">
		  <h5 class="white-text"><?php echo _ANNEXE ?></h5>
		  <ul>
			<li><a href="./propos.php"><?php echo _ABOUT ?></a></li>
		  <li><a href="./mention.php"><?php echo _ML ?></a></li>
		  <li><a href="./partenaires.php"><?php echo _PARTNER ?></a></li>
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