<?php 
header('Content-type: text/html; charset=UTF-8');
session_start();

function connectBd () {
    $pdo_options[PDO::ATTR_EMULATE_PREPARES] = false;
    /* Active le mode exception */
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    /* Indique le charset */
    $pdo_options[PDO::MYSQL_ATTR_INIT_COMMAND] = "SET NAMES utf8";
    return new PDO('mysql:host=localhost;dbname=unnom', 'root', '',$pdo_options);
}


function userExists($nickname) 
{
    $db = connectBd ();
    $nickname = $_POST['nickname'];
    $query = $db->prepare('SELECT nickname FROM User WHERE nickname = :nickname');
    $query->bindParam(':nickname', $nickname, PDO::PARAM_STR, 42);
    $query->execute();
    return ($query->rowCount() == 1);
}




$nickname = $_POST['nickname'];
$passwd = $_POST['passwd'];

if (isset($nickname,$passwd))
{

    if(userExists($nickname))
    {
        try
        {
            $db = connectBd();
        }

        catch (PDOException $e)
        {
           echo 'Erreur, problème de connexion à la base';
        }
       
        
        $options = [
            'cost' => 11,
            'salt' => 111111111111111111111111111
        ];

        //On crypte à nouveau le mot de passe afin de vérif avec le bon
        $hash = hash("sha256",$passwd);
       
        // Vérification des identifiants
        $query = "SELECT * FROM user WHERE (nickname = :nickname AND pass = :hash)";   
        $req = $db->prepare($query);
        $req->bindParam('nickname', $nickname, PDO::PARAM_STR, 42);
        $req->bindParam('hash', $hash , PDO::PARAM_STR, 64);
        $req->execute();
        $result = $req->fetch();

        //Teste si le mot de passe est associé avec le nickname
        if ($result)
        {
            
            if (!session_id()) 
            session_start();
            $_SESSION['nickname'] = $nickname;
            header('Location: ../index.php');
                
        } else 
        {
            echo "Mauvais mot de passe";
        }
        
    } 
    else
    {
        echo 'Utilisateur non inscrit';?>
        <input type="button" value="Accueil" onclick="document.location.href='../index.php';">
    <?php }

}

else
{
    echo 'Champs vides';
        
}

    
    


