<?php

function connectBd () {
    $pdo_options[PDO::ATTR_EMULATE_PREPARES] = false;
    /* Active le mode exception */
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    /* Indique le charset */
    $pdo_options[PDO::MYSQL_ATTR_INIT_COMMAND] = "SET NAMES utf8";
    return new PDO('mysql:host=localhost;dbname=unnom', 'root', '',$pdo_options);
}

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