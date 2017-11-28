<?php

@session_start();
include 'admin/config.php';
if (isset($_POST) && !empty($_POST)) {
    if ($_POST['txtCaptcha'] == $_SESSION['captcha']['code']) {
        extract($_POST);

//        $to = 'chhrajnivas.py@gov.in';
//        $subject = 'Raj Nivas Visitor Request';
//        $from = 'chhrajnivas.py@gov.in';
//
//        $headers = 'MIME-Version: 1.0' . "\r\n";
//        $headers .= 'Content-Type: text/html; charset=ISO-8859-1' . "\r\n";
//
//        $headers .= 'From: ' . $from . "\r\n" .
//                'Reply-To: ' . $from . "\r\n" .
//                'X-Mailer: PHP/' . phpversion();
//
//        $message = '<html><body>';
//        $message .= '<h1 style="color:#f40;">Raj Nivas Visitor Request Email</h1>';
//        $message .= '<p style="color:#080;font-size:18px;">Group Type :' . $radGroup . '</p>';
//        $message .= '<p style="color:#080;font-size:18px;">Date of Visit :' . date('d-m-Y', strtotime($txtdov)) . '</p>';
//        $message .= '<p style="color:#080;font-size:18px;">Number of Adults. :' . $txtnoadult . '</p>';
//        $message .= '<p style="color:#080;font-size:18px;">Number of Childrens :' . $txtnochild . '</p>';
//        $message .= '<p style="color:#080;font-size:18px;">Visitor\'s Name :' . $name . '</p>';
//        $message .= '<p style="color:#080;font-size:18px;">Gender :' . $cmbGender . '</p>';
//        $message .= '<p style="color:#080;font-size:18px;">Nationality :' . $radNationality . '</p>';
//        $message .= '<p style="color:#080;font-size:18px;">Date of Birth :' . date('d-m-Y', strtotime($txtdob)) . '</p>';
//        $message .= '<p style="color:#080;font-size:18px;">Address :' . $address . '</p>';
//        $message .= '<p style="color:#080;font-size:18px;">Mobile No :' . $mobile . '</p>';
//        $message .= '<p style="color:#080;font-size:18px;">Email ID :' . $email . '</p>';
//        $message .= '<p style="color:#080;font-size:18px;">State :' . $txtstate . '</p>';
//        $message .= '<p style="color:#080;font-size:18px;">ID Type :' . $radID . '</p>';
//        $message .= '<p style="color:#080;font-size:18px;">ID Number :' . $txtIDNo . '</p>';
//        $message .= '<p style="color:#080;font-size:18px;">Individual Visitor :' . $txtIndividual . '</p>';
//        $message .= '<p style="color:#080;font-size:18px;">1. Accompanied Person\'s Name :' . $txtperson1 . '</p>';
//        $message .= '<p style="color:#080;font-size:18px;">2. Accompanied Person\'s Name :' . $txtperson2 . '</p>';
//        $message .= '<p style="color:#080;font-size:18px;">3. Accompanied Person\'s Name :' . $txtperson3 . '</p>';
//        $message .= '<p style="color:#080;font-size:18px;">4. Accompanied Person\'s Name :' . $txtperson4 . '</p>';
//        $message .= '</body></html>';
//
//        echo mail($to, $subject, $message, $headers) ? 1 : 0;

        $txtdov = date('Y-m-d', strtotime($txtdov));
        $txtnoadult = (isset($txtnoadult) && !empty($txtnoadult)) ? strip_tags($txtnoadult) : '';
        $txtnochild = (isset($txtnochild) && !empty($txtnochild)) ? strip_tags($txtnochild) : '';
        $name = (isset($name) && !empty($name)) ? strip_tags($name) : '';
        $txtdob = date('Y-m-d', strtotime($txtdob));
        $address = (isset($address) && !empty($address)) ? strip_tags($address) : '';
        $mobile = (isset($mobile) && !empty($mobile)) ? strip_tags($mobile) : '';
        $email = (isset($email) && !empty($email)) ? strip_tags($email) : '';
        $txtstate = (isset($txtstate) && !empty($txtstate)) ? strip_tags($txtstate) : '';
        $txtIDNo = (isset($txtIDNo) && !empty($txtIDNo)) ? strip_tags($txtIDNo) : '';
        $txtIndividual = (isset($txtIndividual) && !empty($txtIndividual)) ? strip_tags($txtIndividual) : '';
        $txtperson1 = (isset($txtperson1) && !empty($txtperson1)) ? strip_tags($txtperson1) : '';
        $txtperson2 = (isset($txtperson2) && !empty($txtperson2)) ? strip_tags($txtperson2) : '';
        $txtperson3 = (isset($txtperson3) && !empty($txtperson3)) ? strip_tags($txtperson3) : '';
        $txtperson4 = (isset($txtperson4) && !empty($txtperson4)) ? strip_tags($txtperson4) : '';
        $date = date('Y-m-d H:i:s');

        $stmt = $db->prepare("INSERT INTO tourdtls_tbl (td_group, td_dov, td_noadult, td_nochild, td_name, td_gender, td_nationality, td_dob, td_address, td_mobile, td_email, td_state, td_idtype, td_idno, td_individual, td_person1, td_person2, td_person3, td_person4, td_createdon) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param('ssssssssssssssssssss', $radGroup, $txtdov, $txtnoadult, $txtnochild, $name, $cmbGender, $radNationality, $txtdob, $address, $mobile, $email, $txtstate, $radID, $txtIDNo, $txtIndividual, $txtperson1, $txtperson2, $txtperson3, $txtperson4, $date);
        $stmt->execute();
        $stmt->close();
        echo ($db->affected_rows) ? '1' : '0';
    } else
        echo '00';
}
?>