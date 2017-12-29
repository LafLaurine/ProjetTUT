<!DOCTYPE html>


<script>

function myFunction() {
  var x = document.getElementById("passwd");
  if (x!=null)
  {
      if (x.type === "password") {
      x.type = "text";
  } else {
      x.type = "password";
  }
  }
  
}
</script>


<html>
<head>
    <title>Intertional Student Planner - Projet tut</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../CSS/style.css">
    <link rel="stylesheet" type="text/css" href="../CSS/menu.css">
    <link rel="stylesheet" type="text/css" href="../CSS/modal.css">
    <script type="text/javascript" src="./js/jquery-3.2.1.min.js"></script>
    <script src="js/main.js"></script>

</head>
<body>

	<div class="container">
    <div class="login-wrap">
    <h1 class="login-header">INSCRIPTION</h1>
		<form action="./Traitements/traitementRegister.php" class="form" method="post">
			<div>
                <label for="nom">Nom(s)*</label> 
                <input id="nom" type="text" name="nom1" placeholder="Nom1">
                <input id="nom" type="text" name="nom2" placeholder="Nom2">
            </div>
            
			<div>
                <label for="firstname">Prénom(s)*</label> 
                <input id="prenom" type="text" name="prenom1" placeholder="Prénom1">
                <input id="prenom" type="text" name="prenom2" placeholder="Prénom2">
            </div>
            
			<div>
                <label for="sexe">Sexe</label> 
                <input name="sexe" type="radio" value="homme"> Homme 
                <input name="sexe" type="radio" value="femme"> Femme 
                <input name="sexe" type="radio" value="autre"> Autre
            </div>
            
			<div>
                <label for="firstname">Date de naissance*</label> 
                <input type="date" id="age" min="1960-01-01" name="date_naiss" required="">
            </div>
                        
			<div>
                <label for="id">Nom d'utilisateur*</label> 
                <input id="pseudo" type="text" name="pseudo" pattern="[A-Za-z0-9]{3,24}" required="" title="Au moins 3 caractères, pas de caractères spéciaux ni d'espacement">
            </div>
            
			<div>
                <label for="passwd">Mot de passe*</label> 
                <input id="passwd" name="pass" pattern=".{6,}" required="" title="Au moins 6 caractères" type="password"></br>
                <input onclick="myFunction()" id="showmdp" type="checkbox"> Montrer le mot de passe
            </div>
            
			<div>
                <label for="passwdconf">Confirmation du mot de passe*</label> 
                <input id="passwdconf" name="passwordconf" required="" type="password"></br>
            </div>
            
			<div>
                <label for="mail">Adresse mail*</label> 
                <input id="mail" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required="" type="email">
            </div>
            
			<div>
				<p>* : champs requis</p>
            </div>
            
			<div>
				<div>
					<input name="submit" type="submit" value="S'inscrire" class="sub">
				</div>
			</div>
		</form>
    </div>
</div>
</body>
</html>

        <?php 

        //gère la requête GET lorsque l'utilisateur entre un mauvais pseudo/mail
        
            if(isset($_GET["error"])){
                if($_GET["error"] == "pseudo" || $_GET["error"] == "email"){
                    echo'<p class="error"> Erreur : ' . $_GET["error"] .' déjà utilisé.</p>';
                    echo '<a href="./index.php"><button>Accueil</button></a>';
                }
     
                else {
                    echo'<p class="error"> Erreur inconnue.</p>';
                    echo '<a href="./index.php"><button>Accueil</button></a>';

                }

            }
              
       
                
        ?>
    </div>