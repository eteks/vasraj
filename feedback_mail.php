<?php

@session_start();
include 'admin/config.php';
if(isset($_POST) && !empty($_POST))
{
    if($_POST['txtCaptcha'] == $_SESSION['captcha']['code'])
    {
        $name       =   strip_tags($_POST['name']);
        $address    =   strip_tags($_POST['address']);
        $email      =   $_POST['email'];
        $message    =   strip_tags($_POST['message']);
        $date       =   date('Y-m-d H:i:s');
        
        $stmt = $db->prepare("INSERT INTO feedbackdtls_tbl VALUES ('', '$name', '$email', '$address', '$message', 'U', '$date')");
        $stmt->execute();
        $stmt->close();
        echo ($db->affected_rows) ? '1' : '0';
} else
        echo '00';
}
?>