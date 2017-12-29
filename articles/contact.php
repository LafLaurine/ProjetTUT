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
<h2 id="contactText">Contact</h2>

<?php

if ($_SERVER['REQUEST_METHOD']=='POST') {
   
    
    $nombreErreur = 0; // Variable qui compte le nombre d'erreur
    
    // Définit toutes les erreurs possibles
    if (!isset($_POST['email'])) { // Si la variable "email" du formulaire n'existe pas
      $nombreErreur++; // On incrémente la variable qui compte les erreurs
      $erreur1 = '<p>Vous n\'avez pas entré de mail</p>';
    } else {
      if (empty($_POST['email'])) { // Si la variable est vide
        $nombreErreur++; // On incrémente la variable qui compte les erreurs
        $erreur2 = '<p>Vous avez oublié de donner votre email.</p>';
      } else {
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
          $nombreErreur++; // On incrémente la variable qui compte les erreurs
          $erreur3 = '<p>Ceci n\'est pas un mail</p>';
        }
      }
    }
    
    if (!isset($_POST['message'])) {
      $nombreErreur++;
      $erreur4 = '<p>Il y a un problème avec la variable "message".</p>';
    } else {
      if (empty($_POST['message'])) {
        $nombreErreur++;
        $erreur5 = '<p>Vous avez oublié de donner un message.</p>';
      }
    }

    if ($nombreErreur==0) { // S'il n'y a pas d'erreur
        // Récupération des variables et sécurisation des données
        $nom = htmlentities($_POST['nom']); // htmlentities() convertit des caractères "spéciaux" en équivalent HTML
        $email = htmlentities($_POST['email']);
        $message = htmlentities($_POST['message']);
        
        // Variables concernant l'email
        $destinataire = 'laurine.lafontaine@outlook.fr'; // Adresse email du webmaster
        $sujet = 'Titre du message'; // Titre de l'email
        $contenu = '<html><head><title>Titre du message</title></head><body>';
        $contenu .= '<p>Bonjour, vous avez reçu un message à partir de votre site web.</p>';
        $contenu .= '<p><strong>Nom</strong>: '.$nom.'</p>';
        $contenu .= '<p><strong>Email</strong>: '.$email.'</p>';
        $contenu .= '<p><strong>Message</strong>: '.$message.'</p>';
        $contenu .= '</body></html>'; // Contenu du message de l'email
        
        // Pour envoyer un email HTML, l'en-tête Content-type doit être défini
        $headers = 'MIME-Version: 1.0'."\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
        
        @mail($destinataire, $sujet, $contenu, $headers); // Fonction principale qui envoi l'email
        
        echo '<h2>Message envoyé!</h2>'; // Afficher un message pour indiquer que le message a été envoyé
      } else { // S'il y a un moins une erreur
        echo '<div style="border:1px solid #ff0000; padding:5px;">';
        echo '<p style="color:#ff0000;">Désolé, il y a eu '.$nombreErreur.' erreur(s). Voici le détail des erreurs:</p>';
        if (isset($erreur1)) echo '<p>'.$erreur1.'</p>';
        if (isset($erreur2)) echo '<p>'.$erreur2.'</p>';
        if (isset($erreur3)) echo '<p>'.$erreur3.'</p>';
        if (isset($erreur4)) echo '<p>'.$erreur4.'</p>';
        if (isset($erreur5)) echo '<p>'.$erreur5.'</p>';
        if (isset($erreur6)) echo '<p>'.$erreur6.'</p>';
        if (isset($erreur7)) echo '<p>'.$erreur7.'</p>';
        echo '</div>';
      }
    }
    ?>
    
<div id="containerForm">
<form method="post" action="<?php echo strip_tags($_SERVER['REQUEST_URI']); ?>">
  <div class='name'>
    <input class='first' placeholder='Nom et prénom' type='text' name="nom">
  </div>
  <div class='contact'>
    <input class='email' placeholder='E-mail' type='text' name="email"> 
  </div>
  <div class='message'>
    <textarea placeholder='Votre message'></textarea>
  </div>
    <input type="submit" name="submit" value="Envoyer" class="button" />
</form>
</div>

</body>
</html>