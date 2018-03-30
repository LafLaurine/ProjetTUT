<?php

session_start();
require_once $_SERVER['DOCUMENT_ROOT']. '/ProjetTUT/Traitements/functions.php';
header('Content-type: text/html; charset=utf-8');

//Si user pas connecté, redirection vers la page de connexion
if (!isset($_SESSION['pseudo'])) {
   
        echo "<script type=\"text/javascript\">
        alert(\"Utilisateur non connecté\");
        location=\"../destination.php\";
        </script>";
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Intertional Student Planner - Projet tut</title>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="../img/fav_logo.png"/>
    <link rel="stylesheet" type="text/css" href="../CSS/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="../CSS/materialize.css">
    <link rel="stylesheet" type="text/css" href="../CSS/modal.css">
	<link rel="stylesheet" type="text/css" href="../CSS/profil.css">
    <link rel="stylesheet" type="text/css" href="../CSS/todo.css">
    <link rel="stylesheet" type="text/css" href="../CSS/articles.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/materialize.js"></script>
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

<div id="userProfil">
<h2>Mon profil</h2>
<?php 

$db = connectBd();
                    $query = "SELECT avatar FROM user WHERE pseudo=:pseudo";
                    $results = $db->prepare($query); 
                    $results->bindParam(':pseudo', $_SESSION['pseudo']); 
                    $results->execute();
                    $avatar = $results->fetch(PDO::FETCH_ASSOC);

$pseudo = $_SESSION['pseudo']; ?>

            <div class="card1">
            <form action="profil.php" method="post" enctype="multipart/form-data">
                <label for="uploadPic">
                   <!--Si fichier existe, register -->
                   <?php if($avatar==0)
                   {
                    echo '<img id="profile_pic" src="../img/user.png" style="width:50%">';
                   }
                   
                   else
                   {
                    echo '<img id="profile_pic" src="../files/pictures/'.$_SESSION['pseudo'].'.jpg" style="width:50%">';
                   }
                   ?>
                   
                </label>
                <input type="file" onchange="loadNewProfilePic(this)" style="display:none" name="uploadPic" id="uploadPic" accept="image/x-png, image/jpeg" >
                <input type="submit" id="attrPic" name="attrPic" class="waves-effect waves-light btn" value="Ajouter photo" />
                </form>
                <p class="title">Session de <?php print_r($pseudo); ?> </p>
               
                
                <?php 

                if(isset($_FILES["uploadPic"]))
                {
                        if(!empty($_FILES['uploadPic']['tmp_name']) )
                        {
                            $img = $_FILES['uploadPic']['type'];
                            $type = explode("/", $img);
                            $extension = $type[1];

                            //$FileDir = '../files/pictures/'.$_SESSION['pseudo'].'.'.$extension;

                            $FileDir = '../files/pictures/'.$_SESSION['pseudo'].'.jpg';

                            $check = getimagesize($_FILES['uploadPic']['tmp_name']);
                            if($check !== false) 
                            {
                                foreach(glob("../files/pictures/".$_SESSION['pseudo'].".*") as $file)
                                {
                                    unlink($file);
                                }
                            }
                            if (move_uploaded_file($_FILES['uploadPic']['tmp_name'], $FileDir))
				            {
                                $db = connectBd();
                                $query = "UPDATE user SET avatar=1 WHERE pseudo=:pseudo"; 
                                $results = $db->prepare($query);
                                $results->bindParam(':pseudo', $_SESSION['pseudo']); 
                                $results->execute();
				            }
                        }
                        
                }?></div>
</div>
                
      
                <h2>To-do list</h2> 

                <div class="row" style="margin-left:8em;">
                <div class="col s12 m5">
                    <div class="card-panel teal">
                      
                <div id="todo"> 
                    <?php 
                    $db = connectBd();
                    $query = "SELECT * FROM todo ORDER BY id asc"; 
                    $results = $db->prepare($query); 
                    $results->execute();
                    $count = $results->rowCount();

                    if($count) { 
                        while($row = $results->fetch(PDO::FETCH_ASSOC)) { 
                            $title = $row['title']; 
                            $description = $row['description']; 
                            $id = $row['id']; 
                        
                    echo '<div class="item">'; 
                    
                    $data = $title;
                    $data2 = $description;?>
                    
                    <input type="hidden" name="id" id="id" value="<?php echo $id ?>" />
                    
                    <div class="options"> 
                        <a class="deleteEntryAnchor waves-effect waves-light btn" data-id=<?php echo $id ?> >Effacer</a> 
                    </div> 
                            
                    <?php echo "<h4>".$data."</h4>"; 
                    echo "<p>".$data2."</p>"; 
                    echo '</div>'; 
                        } 
                    } else { 
                        echo "<p>Aucun item</p>"; 
                    } 
                    ?> 
                </div><!--end todo wrap--> 
                  
                <div id="addNewEntry"> 
                <form action="../Traitements/add_item.php" method="post">			
                <p><label for="title">Titre</label>
                <input type="text" name="title" id="title" class="input" required maxlength="48"/></p>                    			
                <p><label for="description"> Description</label>
                <textarea name="description" id="description" required ></textarea></p>                                   				
                <p><input type="submit" name="addEntry" class="addEntry waves-effect waves-light btn" value="Ajouter tâche" /></p>                    
                </form>
                </div><!-- end add new entry --> 
                  
                </div>
                </div><!-- end main--> 
                </div>

           
            <div class="forma">
            <button class="btn">Passer premium</button>
            <h4 style="color:black";>Résultats du formulaire</h4>
            
            </div>
            <!-- Affichage des résultats du formulaire -->
            <?php if(isset($_SESSION["id_etu"])): ?>
            <?php $unis = getUniversities($_SESSION["id_etu"]);
                if(count($unis)>0):?>
                    <?php foreach($unis as $univ): ?>
                    <div class="result"><h2><a target="_blank" href="<?php echo $univ['url']?>"><?php echo $univ['nom_univ']?></a></h2>
                    <ul class="collapsible popout" data-collapsible="accordion">
                    <li>
                    <div class="collapsible-header"><i class="material-icons">more_horiz</i>En savoir plus</div>
                    <div class="collapsible-body"><span> <?php echo $univ['plus']?></span></div>
                    </li>
                    </ul>
                        <?php foreach(getFormations($univ['id_univ']) as $formation): ?>
                            <div><h4><a target="_blank" class="waves-effect waves-light btn" href="<?php echo $formation['url']?>"><i class="material-icons right">more_vert</i><?php echo $formation["nom_formation"] ?></a></h4></div>
                        <?php endforeach; ?>
                       
                    </div>
                    <?php endforeach; ?>
                <?php else: ?>
                <div class="result">Aucune université ne correpsond à vos choix.</div>
                <?php endif; ?>
                
            <?php endif; ?>
            </div>

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