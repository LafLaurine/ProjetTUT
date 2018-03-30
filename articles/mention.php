<?php

session_start();
header('Content-type: text/html; charset=utf-8');

?>

<!DOCTYPE html>
<html lang="fr">
<head>
<title>International Student Planner - Projet tut</title>
<meta charset="UTF-8">
<link rel="icon" type="image/png" href="../img/fav_logo.png"/>
<link rel="stylesheet" type="text/css" href="../CSS/style.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="../CSS/modal.css">
<link rel="stylesheet" type="text/css" href="../CSS/profil.css">
<link rel="stylesheet" type="text/css" href="../CSS/articles.css">
<link type="text/css" rel="stylesheet" href="../CSS/materialize.css"  media="screen,projection"/>
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script src="../js/main.js"></script>
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

<h2 class="mentionTitle">Mentions légales</h2>

<p>Merci de lire attentivement les présentes modalités d'utilisation du site avant de le parcourir. 
En vous connectant sur celui-ci, vous acceptez sans réserve les présentes modalités.</p>

<h3 class="mention">Qui sommes nous ?</h3>
<p>En vertu de l'article 6 de la loi n° 2004-575 du 21 juin 2004 pour la confiance dans l'économie numérique, 
il est précisé aux utilisateurs du site International Student Planner l'identité des différents intervenants dans le cadre de sa réalisation et de son suivi : 
Cabrera Alycia, Gantier Pauline, Lafontaine Laurine et Pontoise Lucie </p>
<p>1 rue de Chablis</p>
<p>93000 Bobigny</p>
<p>France</p>
<p>Tél. : + 33 1 49 40 30 00</p>


<h3 class="mention">Hébergeur</h3>
<p>1&1</p>
<p>Société d'hébergement</p>
<p>www.1and1.fr</p>
<p>Tél. : 0 970 808 911</p>

<h3 class="mention">Conditions d'utilisation</h3>
<p>Le site accessible par l'url suivant : www.internationalstudentplanner.fr est exploité dans le respect de la législation français, qui implique l’acceptation pleine et entière des conditions générales d’utilisation ci-après décrites. Ces conditions d’utilisation sont susceptibles d’être modifiées ou complétées à tout moment, les utilisateurs du site International Student Planner sont donc invités à les consulter de manière régulière.
International Student Planner ne saurait être tenu pour responsable en aucune manière d’une mauvaise utilisation du service.
Ce site est normalement accessible à tout moment aux utilisateurs. 
Une interruption pour raison de maintenance technique peut être toutefois décidée par International Student Planner, 
qui s’efforcera alors de communiquer préalablement aux utilisateurs les dates et heures de l’intervention.
International Student Planner s’efforce de fournir sur le site des informations aussi précises que possible. Toutefois, il ne pourra être tenue 
responsable des omissions, des inexactitudes et des carences dans la mise à jour, qu’elles soient de son fait ou du fait des tiers partenaires 
qui lui fournissent ces informations.</p>

<h3 class="mention">Propriété intellectuelle et contrefaçons.</h3>
<p>International Student Planner est propriétaire des droits de propriété intellectuelle ou détient les droits d’usage sur tous les éléments accessibles sur le site, notamment les textes, images, graphismes, logo, icônes, sons, logiciels.</p>
<p>Toute reproduction, représentation, modification, publication, adaptation de tout ou partie des éléments du site, quel que soit le moyen ou le procédé utilisé, est interdite, sauf autorisation écrite préalable de : International Student Planner.</p>
<p>Toute exploitation non autorisée du site ou de l’un quelconque des éléments qu’il contient sera considérée comme constitutive d’une contrefaçon et poursuivie conformément aux dispositions des articles L.335-2 et suivants du Code de Propriété Intellectuelle.</p>

<h3 class="mention">Limitation de responsabilité</h3>
<p>Tout contenu téléchargé ne peut être assuré par International Student Planner. L’utilisateur est conscient de ce qu’il s’apprête à télécharger. 
En conséquence, International Student Planner ne saurait être tenu responsable d'un quelconque dommage subi par l'ordinateur de 
l'utilisateur ou d'une quelconque perte de données consécutives au téléchargement.</p>

<h3 class="mention">Limitations contractuelles sur les données techniques.</h3>
<p>Ce site est proposé en langages HTML5,CSS3,JavaScript et PHP. Pour un meilleur confort d'utilisation, nous vous recommandons de recourir à 
des navigateurs modernes comme Safari, Firefox, Chrome.</p>

<h3 class="mention"> Gestion des données personnelles.</h3>
<p>En France, les données personnelles sont notamment protégées par la loi n° 78-87 du 6 janvier 1978, la loi n° 2004-801 du 6 août 2004, l'article L. 226-13 du Code pénal et la Directive Européenne du 24 octobre 1995.</p>
<p> En tout état de cause International Student Planner ne collecte des informations personnelles relatives à l'utilisateur que pour le besoin de certains services proposés par le site L'utilisateur fournit ces informations en toute connaissance de cause, notamment lorsqu'il procède par lui-même à leur saisie. Il est alors précisé à l'utilisateur du site l’obligation ou non de fournir ces informations.</p>
<p>Conformément aux dispositions des articles 38 et suivants de la loi 78-17 du 6 janvier 1978 relative à l’informatique, aux fichiers et aux libertés, tout utilisateur dispose d’un droit d’accès, de rectification et d’opposition aux données personnelles le concernant, en effectuant sa demande écrite et signée, accompagnée d’une copie du titre d’identité avec signature du titulaire de la pièce, en précisant l’adresse à laquelle la réponse doit être envoyée.</p>
<p>Aucune information personnelle de l'utilisateur du site n'est publiée à l'insu de l'utilisateur, échangée, transférée, cédée ou vendue sur un support quelconque à des tiers. Seule l'hypothèse du rachat de International Student Planner et de ses droits permettrait la transmission des dites informations à l'éventuel acquéreur qui serait à son tour tenu de la même obligation de conservation et de modification des données vis à vis de l'utilisateur du site .</p>
<p>Le site n'est pas déclaré à la CNIL car il ne recueille pas d'informations personnelles.</p>
<p>Les bases de données sont protégées par les dispositions de la loi du 1er juillet 1998 transposant la directive 96/9 du 11 mars 1996 
relative à la protection juridique des bases de données.</p>

<h3 class="mention">Liens hypertextes et cookies.</h3>
<p>Le site contient un certain nombre de liens hypertextes vers d’autres sites, mis en place avec l’autorisation de International Student Planner. Cependant, International Student Planner n’a pas la possibilité de vérifier le contenu des sites ainsi visités, et n’assumera en conséquence aucune responsabilité de ce fait.</p>
<p>La navigation sur le site est susceptible de provoquer l’installation de cookie(s) sur l’ordinateur de l’utilisateur. Un cookie est un fichier de petite taille, qui ne permet pas l’identification de l’utilisateur, mais qui enregistre des informations relatives à la navigation d’un ordinateur sur un site. Les données ainsi obtenues visent à faciliter la navigation ultérieure sur le site, et ont également vocation à permettre diverses mesures de fréquentation.</p>
<p>Le refus d’installation d’un cookie peut entraîner l’impossibilité d’accéder à certains services. L’utilisateur peut toutefois configurer son ordinateur de la manière suivante, pour refuser l’installation des cookies :</p>
<p>Sous Internet Explorer : onglet outil (pictogramme en forme de rouage en haut a droite) / options internet. Cliquez sur Confidentialité et choisissez Bloquer tous les cookies. Validez sur Ok.</p>
<p>Sous Firefox : en haut de la fenêtre du navigateur, cliquez sur le bouton Firefox, puis aller dans l'onglet Options. Cliquer sur l'onglet Vie privée.
  Paramétrez les Règles de conservation sur :  utiliser les paramètres personnalisés pour l'historique. Enfin décochez-la pour  désactiver les cookies.</p>
<p>Sous Safari : Cliquez en haut à droite du navigateur sur le pictogramme de menu (symbolisé par un rouage). Sélectionnez Paramètres. Cliquez sur Afficher les paramètres avancés. Dans la section "Confidentialité", cliquez sur Paramètres de contenu. Dans la section "Cookies", vous pouvez bloquer les cookies.</p>
<p>Sous Chrome : Cliquez en haut à droite du navigateur sur le pictogramme de menu (symbolisé par trois lignes horizontales). Sélectionnez Paramètres. Cliquez sur Afficher les paramètres avancés. Dans la section "Confidentialité", cliquez sur préférences.  Dans l'onglet "Confidentialité", vous pouvez bloquer les cookies.</p>

<h3 class="mention">Précautions d'usage</h3>
<p>Il vous incombe par conséquent de prendre les précautions d'usage nécessaires pour vous assurer que ce que vous 
choisissez d'utiliser ne soit pas entaché d'erreurs voire d'éléments de nature destructrice tels que virus, trojans..</p>

<h3 class="mention">Contactez-nous</h3>
<p>Vous pouvez nous écrire par courrier électronique à : isp@gmail.com</p>

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