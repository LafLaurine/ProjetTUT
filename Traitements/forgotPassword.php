<!-- Si user oublie son mdp. Traitements -->

<?php

require_once $_SERVER['DOCUMENT_ROOT']. '/ProjetTUT/Traitements/connexion.php';

try
{
    $db = connectBd();
}

catch (PDOException $e)
{
    exit('Erreur, problème de connexion à la base');
}

if (isset($_POST["ForgotPassword"])) {
	
	if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
		$email = $_POST["email"];
		
    }
    else{
		echo "Mail invalide";
		exit;
	}


	$query = $db->prepare('SELECT * FROM user WHERE email = :email');
	$query->bindParam(':email', $email);
	$query->execute();
	$userExists = $query->fetch(PDO::FETCH_ASSOC);
	$db = null;
	
	if ($userExists["email"])
	{
	
		$salt = "707668678521355615030123615";

		
		$password = hash('sha256', $salt.$userExists["email"]);

		$pwrurl = "./reset_password.php?q=".$password;
		$mailbody = "Merci, votre demande a été envoyé";
        mail($userExists["email"], "", $mailbody);
		echo "La clé de récupération mot de passe a été envoyé ";
		
	}
	else
		echo "Mail non reconnu";
}
?>