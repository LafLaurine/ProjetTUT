<link rel="stylesheet" type="text/css" href="./CSS/style.css">

<?php

//connection à la BD
function connectBd () {
    $pdo_options[PDO::ATTR_EMULATE_PREPARES] = false;
    /* Active le mode exception */
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    /* Indique le charset */
    $pdo_options[PDO::MYSQL_ATTR_INIT_COMMAND] = "SET NAMES utf8";
    return new PDO('mysql:host=localhost;dbname=projettut', 'root', '',$pdo_options);
}

//teste si le nom d'utilisateur est pris ou non
function testpseudoValidity ($pseudo) {
    $db = connectBd();
    $req = $db->query("SELECT * FROM user WHERE pseudo ='$pseudo';");
    $result = $req->fetch();
    if ($result)
        return true;
    else 
        return false;
}

//test si le mail est pris ou non
function testEmailValidity ($email) {
    $db = connectBd ();
    $req = $db->query("SELECT * FROM user WHERE email = '$mail';");
    $result = $req->fetch();
    if ($result)
        return true;
    else 
        return false;
}

/// Récupération des variables issues du formulaire par la méthode post
$nom1 = filter_input(INPUT_POST, 'nom1');
$nom2 = filter_input(INPUT_POST, 'nom2');
$prenom1 = filter_input(INPUT_POST, 'prenom1');
$prenom2 = filter_input(INPUT_POST, 'prenom2');
$sexe = filter_input(INPUT_POST, 'sexe');
$date_naiss = filter_input(INPUT_POST, 'date_naiss');
$pseudo = filter_input(INPUT_POST, 'pseudo');
$pass = filter_input(INPUT_POST, 'pass');
$passwordconf = filter_input(INPUT_POST, 'passwordconf');
$mail = filter_input(INPUT_POST, 'email');

try
{ 
    $db = connectBd ();
    // Si le formulaire est envoyé
    if (isset($pseudo,$pass,$mail))  
    {   
        // Teste que les valeurs ne sont pas vides ou composées uniquement d'espaces  
        $pseudo = trim($pseudo) != '' ? $pseudo : null;
        $pass = trim($pass) != '' ? $pass : null;
    
        //Si différent de null      
        $pseudoValidity = testpseudoValidity($pseudo);
        $mailValidity = testEmailValidity($mail); 
        

        //redirige en GET si nom utilisateur existe déjà
        if ($pseudoValidity) {
            header("Location: ../register.php?error=pseudo");    
        }

        //redirige en GET si mail existe déjà
        else if ($mailValidity) {
            header ("Location: ../register.php?error=email");
        } 

        //Association des éléments que l'user a entré à la BD
        else {
            
            if ($pass == $passwordconf)
            {
                
                // Password du form
                $hash = hash("sha256",$pass);
                
                $req = $db->prepare('INSERT INTO user(pseudo, pass, prenom1, prenom2, nom1, nom2, email, sexe, date_naiss) VALUES (?,?,?,?,?,?,?,?,?)');

                $req->bindParam(1, $pseudo);
                $req->bindParam(2, $hash);
                $req->bindParam(3, $prenom1);
                $req->bindParam(4, $prenom2);
                $req->bindParam(5, $nom1);
                $req->bindParam(6, $nom2);
                $req->bindParam(7, $mail);
                $req->bindParam(8, $sexe);
                $req->bindParam(9, $date_naiss);
                //var_dump($pseudo);  
                $req->execute();

                
                
                
               
                if($req)
                {
                    if (!session_id())
                    {
                        session_start();
                        setcookie('pseudo', $_POST['pseudo'], time() + 365*24*3600, null, null, false, true); 
                
                        header( 'Location: ../destination.php?action=success');
                    } 
                        
        
                }                
            }
            else
            {
                header( 'Location: ../destination.php?action=wrongMDP');
            }
            
        }
    }
}

catch (PDOException $e)
{
    exit('Erreur, problème de connexion à la base');
}
?>