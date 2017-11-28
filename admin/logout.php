<?php
//    require_once('authenticate.php');
//    unset($_SESSION['authenticated']);
    unset($_SESSION);
    header("location: index.php");
?>