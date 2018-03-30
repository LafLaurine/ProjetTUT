
<?php

if(!isset($_SESSION['lang'])){
    $_SESSION['lang'] = "fr";
  require_once "fr.inc";
}


if(isset($_GET['lang']) && $_GET['lang'] == "fr"){
  $_SESSION['lang'] = "fr";
  require_once "fr.inc";
}else if(isset($_GET['lang']) && $_GET['lang'] == "en"){
  $_SESSION['lang'] = "en";
  require_once "en.inc";

}

if(!isset($_GET['lang'])){
if(isset($_SESSION['lang']) && $_SESSION['lang']=='fr'){
  require_once "fr.inc";
  }

if(isset($_SESSION['lang']) && $_SESSION['lang']=='en'){
  require_once "en.inc";
}


}
 ?>
