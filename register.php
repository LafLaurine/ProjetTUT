<!DOCTYPE html>
<html>
<head>
	<link href="./CSS/style.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div class="container">
		<h2>Inscription</h2>
		<form action="./Traitements/traitementRegister.php" class="formu" method="post">
			<div>
                <label for="name">Nom</label> 
                <input id="name" name="name">
            </div>
            
			<div>
                <label for="firstname">Prénom</label> 
                <input id="firstname" name="firstname">
            </div>
            
			<div>
                <label for="firstname">Sexe*</label> 
                <input name="sexe" type="radio" value="homme"> Homme <input name="sexe" type="radio" value="femme"> Femme <input name="sexe" type="radio" value="autre"> Autre
            </div>
            
			<div>
                <label for="firstname">Âge</label> 
                <input id="age" name="age">
            </div>
            
			<div>
                <label for="firstname">École</label> 
                <input id="ecole" name="ecole">
            </div>
            
			<div>
                <label for="id">Nom d'utilisateur*</label> 
                <input id="nickname" name="nickname" pattern="[A-Za-z0-9]{3,24}" required="" title="Au moins 3 caractères, pas de caractères spéciaux ni d'espacement">
            </div>
            
			<div>
                <label for="passwd">Mot de passe*</label> 
                <input id="passwd" name="passwd" pattern=".{2,}" required="" title="Au moins 2 caractères" type="password">
            </div>
            
			<div>
                <label for="passwdconf">Confirmation du mot de passe*</label> 
                <input id="passwdconf" name="passwdconf" required="" type="password">
            </div>
            
			<div>
                <label for="mail">Adresse mail*</label> 
                <input id="mail" name="mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required="" type="email">
            </div>
            
			<div>
				<div>
					<p>* : champs requis</p>
                </div>
            </div>
            
			<div>
				<div>
					<input name="submit" type="submit" value="S'inscrire">
				</div>
			</div>
		</form>
	</div>
</body>
</html>

        <?php 
        session_start();

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