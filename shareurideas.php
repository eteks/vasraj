<?php

@session_start();
include 'admin/config.php';
if(isset($_POST) && !empty($_POST))
{
    if($_POST['txtCaptcha'] == $_SESSION['captcha']['code'])
    {
        $name=  strip_tags($_POST['name']);
        $address=  strip_tags($_POST['address']);
        $email=$_POST['email'];
        $mobileno=$_POST['mobile'];
        $message=  strip_tags($_POST['message']);
        $date = date('Y-m-d H:i:s');

//        $to = 'suggestions.rajnivas@gmail.com';
//        $subject = 'Share Your Ideas Mail';
//        $from = $email;
//
//        $headers = 'MIME-Version: 1.0'."\r\n";
//        $headers .= 'Content-Type: text/html; charset=ISO-8859-1'."\r\n"; 
//        $headers .= 'From: '.$email."\r\n".
//            'Reply-To: '.$email."\r\n" .
//            'X-Mailer: PHP/' . phpversion(); 
//
//        $message = '<html><body>';
//        $message .= '<h1 style="color:#f40;">SHARE YOUR IDEAS</h1>';
//        $message .= '<p style="color:#080;font-size:18px;">Name :'.$name.'</p>';
//        $message .= '<p style="color:#080;font-size:18px;">Address :'.$address.'</p>';
//        $message .= '<p style="color:#080;font-size:18px;">Email :'.$email.'</p>';
//        $message .= '<p style="color:#080;font-size:18px;">Mobile No. :'.$mobileno.'</p>';
//        $message .= '<p style="color:#080;font-size:18px;">Message :'.$message.'</p>';
//        $message .= '</body></html>';
//        echo mail($to, $subject, $message, $headers) ? 1 : 0;
        
        $stmt = $db->prepare("INSERT INTO shrurideasdtls_tbl VALUES ('', '$name', '$mobileno', '$email', '$address', '$message', 'U', '$date')");
        $stmt->execute();
        $stmt->close();
        echo ($db->affected_rows) ? '1' : '0';
} else
        echo '00';
}
?>