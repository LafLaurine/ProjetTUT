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
                <label for="name">Nom</label> 
                <input id="name" type="text" name="name">
            </div>
            
			<div>
                <label for="firstname">Prénom</label> 
                <input id="firstname" type="text" name="firstname">
            </div>
            
			<div>
                <label for="firstname">Sexe*</label> 
                <input name="sexe" type="radio" value="homme"> Homme 
                <input name="sexe" type="radio" value="femme"> Femme 
                <input name="sexe" type="radio" value="autre"> Autre
            </div>
            
			<div>
                <label for="firstname">Âge</label> 
                <input id="age" type="text" name="age">
            </div>
            
			<div>
                <label for="firstname">École</label> 
                <input id="ecole" type="text" name="ecole">
            </div>
            
			<div>
                <label for="id">Nom d'utilisateur*</label> 
                <input id="nickname" type="text" name="nickname" pattern="[A-Za-z0-9]{3,24}" required="" title="Au moins 3 caractères, pas de caractères spéciaux ni d'espacement">
            </div>
            
			<div>
                <label for="passwd">Mot de passe*</label> 
                <input id="passwd" name="passwd" pattern=".{6,}" required="" title="Au moins 6 caractères" type="password"></br>
                <input onclick="myFunction()" id="showmdp" type="checkbox"> Montrer le mot de passe
            </div>
            
			<div>
                <label for="passwdconf">Confirmation du mot de passe*</label> 
                <input id="passwdconf" name="passwdconf" required="" type="password"></br>
                <input onclick="myFunction()" id="showmdp" type="checkbox"> Montrer le mot de passe
            </div>
            
			<div>
                <label for="mail">Adresse mail*</label> 
                <input id="mail" name="mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required="" type="email">
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
                if($_GET["error"] == "nickname" || $_GET["error"] == "email"){
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