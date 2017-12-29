<?php 
header('Content-type: text/html; charset=UTF-8');
session_start();

function connectBd () {
    $pdo_options[PDO::ATTR_EMULATE_PREPARES] = false;
    /* Active le mode exception */
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    /* Indique le charset */
    $pdo_options[PDO::MYSQL_ATTR_INIT_COMMAND] = "SET NAMES utf8";
    return new PDO('mysql:host=localhost;dbname=projettut', 'root', '',$pdo_options);
}


function userExists() 
{
    $db = connectBd();
    $pseudo = $_POST['pseudo'];
    $query = $db->query("SELECT * FROM user WHERE pseudo ='$pseudo';");
    $result = $query->fetch();
    return $result;
   
}




$pseudo = filter_input(INPUT_POST, 'pseudo');
$passwd = filter_input(INPUT_POST, 'pass');

if (isset($pseudo,$passwd))
{

    if(userExists($pseudo))
    {
        try
        {
            $db = connectBd();
            $options = [
                'cost' => 11,
                'salt' => 111111111111111111111111111
            ];
    
            //On crypte à nouveau le mot de passe afin de vérif avec le bon
            $hash = hash("sha256",$passwd);
           
            // Vérification des identifiants
            $query = "SELECT * FROM user WHERE (pseudo = :pseudo AND pass = :hash);";   
            $req = $db->prepare($query);
            $req->bindParam('pseudo', $pseudo, PDO::PARAM_STR, 32);
            $req->bindParam('hash', $hash , PDO::PARAM_STR, 64);
            $req->execute();
            $result = $req->fetch();
    
            //Teste si le mot de passe est associé avec le pseudo
            if ($result)
            {
                
                if (!session_id()) 
                session_start();
                $_SESSION['pseudo'] = $pseudo;
                header('Location: ../articles/index.php');
                    
            } else 
            {
                header( 'Location: ../destination.php?action=fail');
            }
            
        } 
        
        
        catch (PDOException $e)
        {
           echo 'Erreur, problème de connexion à la base';
        }
    
    }

    else
    {
        header( 'Location: ../destination.php?action=user');
    }

        
       
        
       
}

else
{
    header( 'Location: ../destination.php?action=empty');
        
}
?>
    
    


