<?php 
header('Content-type: text/html; charset=UTF-8');

//connection à la BD
function connectBd () {
    $pdo_options[PDO::ATTR_EMULATE_PREPARES] = false;
    /* Active le mode exception */
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    /* Indique le charset */
    $pdo_options[PDO::MYSQL_ATTR_INIT_COMMAND] = "SET NAMES utf8";
    return new PDO('mysql:host=localhost;dbname=unnom', 'root', '',$pdo_options);
}


$badLogin=false;

if(!empty($_POST['nickname']) && !empty($_POST['passwd']))
{

    $nickname=$_POST['nickname'];
    $db = connectBd();
    $query = "SELECT * FROM User WHERE nickname=\"$nickname\"";  
    $req = $db->prepare($query);
    $req->execute();
    $tab=$req->fetch(PDO::FETCH_ASSOC);
    
      if(!empty($tab))
      {
          //ce que l'user a entré
        $passwd=$tab['passwd'];
        //le pass hash
        $pwdhash = $_POST['passwd'];
        
        if (password_verify($passwd, $pwdhash)) 
        {
            $_SESSION['nickname']=$nickname;
            echo 'wow';
            //header('Location: ../index.php');
        }

        else{
            $badLogin=true;
            echo 'tg';
        }
           

      }

  }
  else
  {
    echo 'Champs vides';
  }

 
