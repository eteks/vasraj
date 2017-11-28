<?php
@session_start();
include 'admin/config.php';
if(isset($_POST) && !empty($_POST))
{
    if($_POST['txtCaptcha'] == $_SESSION['captcha']['code'])
    {
        $pk= strip_tags(base64_decode($_POST['pk']));
        $name= strip_tags($_POST['name']);
        $mobileno=$_POST['mobile'];
        $email=$_POST['email'];
        $comments = strip_tags($_POST['comments']);
        $date = date('Y-m-d H:i:s');
        $stmt = $db->prepare("INSERT INTO eventcomments_tbl VALUES ('', '$pk', '$name', '$email', '$mobileno', '$comments', '$date', 'N')");
        $stmt->execute();
        $stmt->close();
        echo ($db->affected_rows) ? '1' : '0';
} else
        echo '00';
}
?>