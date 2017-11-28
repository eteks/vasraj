<?php
@session_start();
if(isset($_POST) && !empty($_POST))
{
    if($_POST['txtCaptcha'] == $_SESSION['captcha']['code'])
    {
        extract($_POST);
        
        $to = 'chhrajnivas.py@gov.in';
//        $to = 'info@redarty.com';
        $subject = 'Raj Nivas Visitor Request';
        $from = $email;

        // To send HTML mail, the Content-type header must be set
        $headers = 'MIME-Version: 1.0'."\r\n";
        $headers .= 'Content-Type: text/html; charset=ISO-8859-1'."\r\n"; 
        $headers .= 'From: '.$email."\r\n".
            'Reply-To: '.$email."\r\n" .
            'X-Mailer: PHP/' . phpversion(); 

        // Create email headers
        $headers .= 'From: '.$from."\r\n".
            'Reply-To: '.$from."\r\n" .
            'X-Mailer: PHP/' . phpversion();

        // Compose a simple HTML email message
        $message = '<html><body>';
        $message .= '<h1 style="color:#f40;">Raj Nivas Visitor Request Email</h1>';
        $message .= '<p style="color:#080;font-size:18px;">Group Type :'.$radGroup.'</p>';
        $message .= '<p style="color:#080;font-size:18px;">Date of Visit :'.date('d-m-Y', strtotime($txtdov)).'</p>';
        $message .= '<p style="color:#080;font-size:18px;">Number of Adults. :'.$txtnoadult.'</p>';
        $message .= '<p style="color:#080;font-size:18px;">Number of Childrens :'.$txtnochild.'</p>';
        $message .= '<p style="color:#080;font-size:18px;">Visitor\'s Name :'.$name.'</p>';
        $message .= '<p style="color:#080;font-size:18px;">Gender :'.$cmbGender.'</p>';
        $message .= '<p style="color:#080;font-size:18px;">Nationality :'.$radNationality.'</p>';
        $message .= '<p style="color:#080;font-size:18px;">Date of Birth :'.date('d-m-Y', strtotime($txtdob)).'</p>';
        $message .= '<p style="color:#080;font-size:18px;">Address :'.$address.'</p>';
        $message .= '<p style="color:#080;font-size:18px;">Mobile No :'.$mobile.'</p>';
        $message .= '<p style="color:#080;font-size:18px;">Email ID :'.$email.'</p>';
        $message .= '<p style="color:#080;font-size:18px;">State :'.$txtstate.'</p>';
        $message .= '<p style="color:#080;font-size:18px;">ID Type :'.$radID.'</p>';
        $message .= '<p style="color:#080;font-size:18px;">ID Number :'.$txtIDNo.'</p>';
        $message .= '<p style="color:#080;font-size:18px;">Individual Visitor :'.$txtIndividual.'</p>';
        $message .= '<p style="color:#080;font-size:18px;">1. Accompanied Person\'s Name :'.$txtperson1.'</p>';
        $message .= '<p style="color:#080;font-size:18px;">2. Accompanied Person\'s Name :'.$txtperson2.'</p>';
        $message .= '<p style="color:#080;font-size:18px;">3. Accompanied Person\'s Name :'.$txtperson3.'</p>';
        $message .= '<p style="color:#080;font-size:18px;">4. Accompanied Person\'s Name :'.$txtperson4.'</p>';
        $message .= '</body></html>';

        
echo mail($to, $subject, $message, $headers) ? 1 : 0;
} else
        echo '00';
}
?>