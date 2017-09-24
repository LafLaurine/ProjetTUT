<link rel="stylesheet" type="text/css" href="./CSS/style.css">

<?php
session_start();
session_unset();
session_destroy();
header('Location: index.php');
?>