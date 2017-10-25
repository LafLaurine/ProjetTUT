<link rel="stylesheet" type="text/css" href="./CSS/style.css">

<?php

//connection à la BD
function connectBd () {
    $pdo_options[PDO::ATTR_EMULATE_PREPARES] = false;
    /* Active le mode exception */
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    /* Indique le charset */
    $pdo_options[PDO::MYSQL_ATTR_INIT_COMMAND] = "SET NAMES utf8";
    return new PDO('mysql:host=localhost;dbname=unnom', 'root', '',$pdo_options);
}

//teste si le nom d'utilisateur est pris ou non
function testNicknameValidity ($nickname) {
    $db = connectBd ();
    $req = $db->prepare('SELECT * FROM user WHERE nickname = :nickname');
    $req->execute(array("nickname" => $nickname));
    $result = $req->fetch();
    if ($result)
        return true;
    else 
        return false;
}

//test si le mail est pris ou non
function testEmailValidity ($email) {
    $db = connectBd ();
    $req = $db->prepare('SELECT * FROM user WHERE email = :email');
    $req->execute(array("email" => $email));
    $result = $req->fetch();
    if ($result)
        return true;
    else 
        return false;
}

// Récupération des variables issues du formulaire par la méthode post
$name = filter_input(INPUT_POST, 'name');
$firstname = filter_input(INPUT_POST, 'firstname');
$sexe = filter_input(INPUT_POST, 'sexe');
$age = filter_input(INPUT_POST, 'age');
$ecole = filter_input(INPUT_POST, 'ecole');
$nickname = filter_input(INPUT_POST, 'nickname');
$passwd = filter_input(INPUT_POST, 'passwd');
$passwdconf = filter_input(INPUT_POST, 'passwdconf');
$mail = filter_input(INPUT_POST, 'mail');

// Si le formulaire est envoyé
if (isset($nickname,$passwd,$mail)) 
{   
    // Teste que les valeurs ne sont pas vides ou composées uniquement d'espaces  
    $nickname = trim($nickname) != '' ? $nickname : null;
    $passwd = trim($passwd) != '' ? $passwd : null;
   
    //Si différent de null

    try
    {
        $db = connectBd();
    }
    catch (PDOException $e)
    {
        exit('Erreur, problème de connexion à la base');
    }

    $nicknameValidity = testNicknameValidity($nickname);
    $mailValidity = testEmailValidity($mail);

    //redirige en GET si nom utilisateur existe déjà
    if ($nicknameValidity) {
        header("Location: ../register.php?error=nickname");    
    }

    //redirige en GET si mail existe déjà
    else if ($mailValidity) {
        header ("Location: ../register.php?error=email");
    } 
    
    //Association des éléments que l'user a entré à la BD
    else {
        if ($passwd == $passwdconf)
        {
            // Password du form
            $hash = hash("sha256",$passwd);
            $req = $db->prepare('INSERT INTO user(name, firstname, sexe, age, ecole, nickname, pass, email) VALUES (:name, :firstname, :sexe, 
            :age, :ecole, :nickname, :passwd, :mail)');
    
            $req->execute(array("name" => $name, "firstname" => $firstname, "sexe" => $sexe, "age"=>$age, "ecole"=>$ecole, 
            "nickname" => $nickname, "passwd"=>$hash, "mail"=>$mail));
            
            if($req)
            {
                if (!session_id()) 
                    session_start();
            
                header('Location: ../registerSuccess.php');
    
            }                
        }

        
        else
        {
            echo '<p> Les mots de passe ne correspondent pas</p>';
        }
        
    }


}
?>