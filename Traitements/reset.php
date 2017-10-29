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


if (isset($_POST["ResetPasswordForm"]))
{

	$email = $_POST["email"];
	$password = $_POST["password"];
	$confirmpassword = $_POST["confirmpassword"];
	$hash = $_POST["q"];


	$salt = "707668678521355615030123615";

	
	$resetkey = hash('sha256', $salt.$email);

	
	if ($resetkey == $hash)
	{
		if ($password == $confirmpassword)
		{
			
			$password = hash('sha256', $salt.$password);

			// Update the user's password
				$query = $db->prepare('UPDATE users SET passwd = :password WHERE email = :email');
				$query->bindParam(':password', $password);
				$query->bindParam(':email', $email);
				$query->execute();
				$db = null;
			echo "Mot de passe mis à jour";
		}
		else
			echo "Les mot de passes ne matchent pas";
	}
	else
		echo "La clé de mot de passe est fausse";
}

?>
