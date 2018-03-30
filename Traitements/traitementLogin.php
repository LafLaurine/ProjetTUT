<!-- Traitement de la connexion -->

<?php 
header('Content-type: text/html; charset=UTF-8');
session_start();
require_once $_SERVER['DOCUMENT_ROOT']. '/ProjetTUT/Traitements/connexion.php';

//Teste si l'utilisateur existe
function userExists() 
{
    $db = connectBd();
    $pseudo = $_POST['pseudo'];
    $query = $db->query("SELECT * FROM user WHERE pseudo ='$pseudo';");
    $result = $query->fetch();
    return $result;
   
}

//Récupération des variables
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
            $result = $req->fetch(PDO::FETCH_ASSOC);
    
            //Teste si le mot de passe est associé avec le pseudo
            if ($result)
            {
                
                if (!session_id()) 
                session_start();
                $_SESSION['pseudo'] = $pseudo;
                $_SESSION['id_etu']= $result['id_etu'];
                header('Location: ../articles/profil.php');
                    
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
    
    


