<?php require_once('authenticate.php');
include 'config.php';
if(isset($_REQUEST['id']) && !empty($_REQUEST['id']))
{
    $id = base64_decode($_REQUEST['id']);
    
    $Groups = array('I' => 'Individual', 'S' => 'Small Group(Max 5)');
    $Genders = array('M' => 'Male', 'F' => 'Female');
    $Nationalitys = array('I' => 'Indian', 'O' => 'Other');
    $IDs = array('D' => 'Driving License', 'P' => 'Passport', 'PAN' => 'PAN Card', 'VID' => 'Voter ID-Card', 'GID' => 'Govt.Issued ID-Card', 'SID' => 'Student ID-Card', 'BP' => 'Bank Passbook', 'O' => 'Others');
        
    $stmt = $db->prepare("select td_group, td_dov, td_noadult, td_nochild, td_name, td_gender, td_nationality, td_dob, td_address, td_mobile, td_email, td_state, td_idtype, td_idno, td_individual, td_person1, td_person2, td_person3, td_person4 from tourdtls_tbl where tourdtls_pk=?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($Group, $dov, $noadult, $nochild, $name, $gender, $nationality, $dob, $address, $mobile, $email, $state, $IDType, $IDNo, $Individual, $person1, $person2, $person3, $person4);
    if ($stmt->num_rows > 0) {
        $stmt->fetch();
        $stmtupdate = $db->prepare("update tourdtls_tbl set td_readstatus='R' where tourdtls_pk=?");
        $stmtupdate->bind_param('s', $id);
        $stmtupdate->execute();
        $stmtupdate->close();
    } else
        header('location: tours.php');
} else
    header('location: tours.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
    <head>
        <meta name="viewport" content="width=device-width" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Raj Nivas - Tour Details Print</title>
        <style type="text/css">
            img {
                max-width: 100%;
            }
            body {
                -webkit-font-smoothing: antialiased; -webkit-text-size-adjust: none; width: 100% !important; height: 100%; line-height: 1.6em;
            }
            body {
                background-color: #f6f6f6;
            }
            @media only screen and (max-width: 640px) {
                body {
                    padding: 0 !important;
                }
                h1 {
                    font-weight: 800 !important; margin: 20px 0 5px !important;
                }
                h2 {
                    font-weight: 800 !important; margin: 20px 0 5px !important;
                }
                h3 {
                    font-weight: 800 !important; margin: 20px 0 5px !important;
                }
                h4 {
                    font-weight: 800 !important; margin: 20px 0 5px !important;
                }
                h1 {
                    font-size: 22px !important;
                }
                h2 {
                    font-size: 18px !important;
                }
                h3 {
                    font-size: 16px !important;
                }
                .container {
                    padding: 0 !important; width: 100% !important;
                }
                .content {
                    padding: 0 !important;
                }
                .content-wrap {
                    padding: 10px !important;
                }
                .invoice {
                    width: 100% !important;
                }
            }
        </style>
    </head>

    <body itemscope style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; -webkit-font-smoothing: antialiased; -webkit-text-size-adjust: none; width: 100% !important; height: 100%; line-height: 1.6em; background-color: #f6f6f6; margin: 0;" bgcolor="#f6f6f6">

        <table class="body-wrap" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; background-color: #f6f6f6; margin: 0;" bgcolor="#f6f6f6"><tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;" valign="top"></td>
                <td class="container" width="600" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto;" valign="top">
                    <div class="content" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; max-width: 600px; display: block; margin: 0 auto; padding: 20px;">
                        <table class="main" width="100%" cellpadding="0" cellspacing="0" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; border-radius: 3px; background-color: #fff; margin: 0; border: 1px solid #e9e9e9;" bgcolor="#fff">
                            <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                <td class="alert alert-warning" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 16px; vertical-align: top; color: #fff; font-weight: 500; text-align: center; border-radius: 3px 3px 0 0; background-color: #4371ca; margin: 0; padding: 10px;" align="center" bgcolor="#4371ca" valign="top">
                                    Raj Nivas Visitor Details
                                </td>
                            </tr>
                            <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                <td class="content-wrap" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 20px;" valign="top">
                                    <table width="100%" cellpadding="0" cellspacing="0" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                        <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                            <td colspan="2" class="content-block" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; font-weight: bold; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                                Visitor's Name
                                            </td>
                                            <td colspan="2" class="content-block" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                                <?= $name; ?>
                                            </td>
                                        </tr>
                                        <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                            <td colspan="2" class="content-block" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; font-weight: bold; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                                Date of Visit
                                            </td>
                                            <td colspan="2" class="content-block" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                                <?= date('d-m-Y', strtotime($dov)); ?>
                                            </td>
                                        </tr>
                                        <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                            <td colspan="2" class="content-block" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; font-weight: bold; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                                Group Type
                                            </td>
                                            <td colspan="2" class="content-block" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                                <?= $Groups[$Group]; ?>
                                            </td>
                                        </tr>
                                        <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                            <td colspan="2" class="content-block" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; font-weight: bold; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                                Number of Adult(s)
                                            </td>
                                            <td colspan="2" class="content-block" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                                <?= $noadult; ?>
                                            </td>
                                        </tr>
                                        <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                            <td colspan="2" class="content-block" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; font-weight: bold; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                                Number of Children(s)
                                            </td>
                                            <td colspan="2" class="content-block" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                                <?= $nochild; ?>
                                            </td>
                                        </tr>
                                        <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                            <td colspan="2" class="content-block" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; font-weight: bold; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                                Gender
                                            </td>
                                            <td colspan="2" class="content-block" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                                <?= $Genders[$gender]; ?>
                                            </td>
                                        </tr>
                                        <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                            <td colspan="2" class="content-block" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; font-weight: bold; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                                Nationality
                                            </td>
                                            <td colspan="2" class="content-block" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                                <?= $Nationalitys[$nationality]; ?>
                                            </td>
                                        </tr>
                                        <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                            <td colspan="2" class="content-block" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; font-weight: bold; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                                Date of Birth
                                            </td>
                                            <td colspan="2" class="content-block" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                                <?= date('d-m-Y', strtotime($dob)); ?>
                                            </td>
                                        </tr>
                                        <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                            <td colspan="2" class="content-block" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; font-weight: bold; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                                Address
                                            </td>
                                            <td colspan="2" class="content-block" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                                <?= $address; ?>
                                            </td>
                                        </tr>
                                        <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                            <td colspan="2" class="content-block" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; font-weight: bold; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                                Mobile No
                                            </td>
                                            <td colspan="2" class="content-block" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                                <?= $mobile; ?>
                                            </td>
                                        </tr>
                                        <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                            <td colspan="2" class="content-block" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; font-weight: bold; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                                Email ID
                                            </td>
                                            <td colspan="2" class="content-block" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                                <?= $email; ?>
                                            </td>
                                        </tr>
                                        <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                            <td colspan="2" class="content-block" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; font-weight: bold; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                                State
                                            </td>
                                            <td colspan="2" class="content-block" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                                <?= $state; ?>
                                            </td>
                                        </tr>
                                        <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                            <td colspan="2" class="content-block" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; font-weight: bold; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                                ID Type - ID Number
                                            </td>
                                            <td colspan="2" class="content-block" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                                <?= $IDs[$IDType].' - '.$IDNo ?>
                                            </td>
                                        </tr>
                                        <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                            <td colspan="2" class="content-block" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; font-weight: bold; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                                If you are an individual visitor
                                            </td>
                                            <td colspan="2" class="content-block" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                                <?= $Individual; ?>
                                            </td>
                                        </tr>
                                        <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                            <td colspan="2" class="content-block" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; font-weight: bold; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                                1. Accompanied Person’s Name
                                            </td>
                                            <td colspan="2" class="content-block" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                                <?= $person1; ?>
                                            </td>
                                        </tr>
                                        <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                            <td colspan="2" class="content-block" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; font-weight: bold; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                                2. Accompanied Person’s Name
                                            </td>
                                            <td colspan="2" class="content-block" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                                <?= $person2; ?>
                                            </td>
                                        </tr>
                                        <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                            <td colspan="2" class="content-block" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; font-weight: bold; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                                3. Accompanied Person’s Name
                                            </td>
                                            <td colspan="2" class="content-block" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                                <?= $person3; ?>
                                            </td>
                                        </tr>
                                        <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                            <td colspan="2" class="content-block" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; font-weight: bold; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                                4. Accompanied Person’s Name
                                            </td>
                                            <td colspan="2" class="content-block" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                                <?= $person4; ?>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </div>
                </td>
                <td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;" valign="top"></td>
            </tr></table></body>
</html>
