<?php
    @session_start();
    //on session creation
    $_SESSION['expire'] = time()+1*60;

    if(!isset($_SESSION['authenticated']) || (trim($_SESSION['authenticated']) != 'yes'))
    {
        header("location: index.php");
        exit();
    }

    if(time() > $_SESSION['expire'])
    { 
        session_destroy(); 
        session_write_close(); 
        session_unset(); 
        unset($_SESSION['authenticated']);
    }
?>