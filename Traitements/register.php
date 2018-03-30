<!-- Inscriptin utilisateur -->

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

		<form action="./Traitements/traitementRegister.php" class="email-signup" method="post">
        <div class="u-form-group">
                <label for="nom">Nom(s)*</label> 
                <input type="text" name="nom1" placeholder="Nom1">
                <input type="text" name="nom2" placeholder="Nom2">
            </div>
            
            <div class="u-form-group">
                <label for="firstname">Prénom(s)*</label> 
                <input type="text" name="prenom1" placeholder="Prénom1">
                <input type="text" name="prenom2" placeholder="Prénom2">
            </div>
            
            <div class="u-form-group">
                <label for="sexe">Sexe</label> 
                <input name="sexe" type="radio" value="homme"> Homme 
                <input name="sexe" type="radio" value="femme"> Femme 
                <input name="sexe" type="radio" value="autre"> Autre
            </div>
            
            <div class="u-form-group">
                <label for="firstname">Date de naissance*</label> 
                <input type="date" id="age" min="1960-01-01" name="date_naiss" required="">
            </div>
                        
            <div class="u-form-group">
                <label for="id">Nom d'utilisateur*</label> 
                <input id="pseudo" type="text" name="pseudo" pattern="[A-Za-z0-9]{3,24}" required="" title="Au moins 3 caractères, pas de caractères spéciaux ni d'espacement">
            </div>
            
            <div class="u-form-group">
                <label for="passwd">Mot de passe*</label> 
                <input id="passwd" name="pass" pattern=".{6,}" required="" title="Au moins 6 caractères" type="password"></br>
                <input onclick="myFunction()" id="showmdp" type="checkbox"> Montrer le mot de passe
            </div>
            
            <div class="u-form-group">
                <label for="passwdconf">Confirmation du mot de passe*</label> 
                <input id="passwdconf" name="passwordconf" required="" type="password"></br>
            </div>
            
            <div class="u-form-group">
                <label for="mail">Adresse mail*</label> 
                <input id="mail" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required="" type="email">
            </div>
            
            <div class="u-form-group">
				<p>* : champs requis</p>
            </div>
            
            <div class="u-form-group">
            <button>S'inscrire</button>
            </div>
		</form>
        <?php 

        //gère la requête GET lorsque l'utilisateur entre un mauvais pseudo/mail
        
            if(isset($_GET["error"])){
                if($_GET["error"] == "pseudo" || $_GET["error"] == "email"){
                    echo'<p class="error"> Erreur : ' . $_GET["error"] .' déjà utilisé.</p>';
                    echo '<a href="./index.php"><button>Accueil</button></a>';
                }
     
                else {
                    echo'<p class="error"> Erreur inconnue.</p>';

                }

            }
              
       
                
        ?>
    </div>