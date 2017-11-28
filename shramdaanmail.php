<?php
@session_start();
include 'admin/config.php';
if(isset($_POST) && !empty($_POST))
{
    if($_POST['txtCaptcha'] == $_SESSION['captcha']['code'])
    {
        $name= strip_tags($_POST['name']);
        $gender=$_POST['gender'];
        $mobileno=$_POST['mobile'];
        $email=$_POST['email'];
        $address=  strip_tags($_POST['address']);
        $typesofsharamdan=$_POST['typesofsharamdan'];
        $description=  strip_tags($_POST['description']);
        $date = date('Y-m-d H:i:s');
//        $to = 'shramdaan.rajnivas@gmail.com';
//        $subject = 'Shramdaan Mail';
//        $from = $email;
//
//        // To send HTML mail, the Content-type header must be set
//        $headers = 'MIME-Version: 1.0'."\r\n";
//        $headers .= 'Content-Type: text/html; charset=ISO-8859-1'."\r\n"; 
//        $headers .= 'From: '.$email."\r\n".
//            'Reply-To: '.$email."\r\n" .
//            'X-Mailer: PHP/' . phpversion(); 
//
//        $message = '<html><body>';
//        $message .= '<h1 style="color:#f40;">SHRAMDAAN EMAIL</h1>';
//        $message .= '<p style="color:#080;font-size:18px;">Name :'.$name.'</p>';
//        $message .= '<p style="color:#080;font-size:18px;">Gender :'.$gender.'</p>';
//        $message .= '<p style="color:#080;font-size:18px;">Mobile No. :'.$mobileno.'</p>';
//        $message .= '<p style="color:#080;font-size:18px;">Email :'.$email.'</p>';
//        $message .= '<p style="color:#080;font-size:18px;">Address :'.$address.'</p>';
//        $message .= '<p style="color:#080;font-size:18px;">Types of Shramdaan :'.$typesofsharamdan.'</p>';
//        $message .= '<p style="color:#080;font-size:18px;">Description :'.$description.'</p>';
//        $message .= '</body></html>';
//        echo mail($to, $subject, $message, $headers) ? 1 : 0;
        
        $stmt = $db->prepare("INSERT INTO shramdaandtls_tbl VALUES ('', '$name', '$gender', '$mobileno', '$email', '$address', '$typesofsharamdan', '$description', 'U', '$date')");
        $stmt->execute();
        $stmt->close();
        echo ($db->affected_rows) ? '1' : '0';
} else
        echo '00';
}
?>