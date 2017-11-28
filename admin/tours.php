<?php require_once('authenticate.php'); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="assets/images/favicon_1.ico">

        <title>Rajnivas - Tours</title>

        <link href="assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css"/>

        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/core.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/components.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css"/>

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="assets/js/modernizr.min.js"></script>

    </head>

    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">
            <?php include'includes/header.php' ?>
            <?php include'includes/left_menu.php' ?>
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="page-title">Raj Nivas Tour</h4>
                                <ol class="breadcrumb">
                                    <li>
                                        <a href="dashboard.php">Dashboard</a>
                                    </li>
                                    <li>
                                        <a href="#">Tour</a>
                                    </li>
                                    <li class="active">
                                        View
                                    </li>
                                </ol>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="display:none;">PK</th>
                                                <th>Visitor Name</th>
                                                <th>Mobile</th>
                                                <th>Adult(s)</th>
                                                <th>Children(s)</th>
                                                <th>Date of Visit</th>
                                                <th>Nationality</th>
                                                <th>Gender</th>
                                                <th>State</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $stmt = $db->prepare("select tourdtls_pk, td_name, td_mobile, td_noadult, td_nochild, td_dov, if(td_nationality='I', 'Indian', 'Other'), if(td_gender='M', 'Male', 'Female'), td_state from tourdtls_tbl") or die($db->error);
                                            $stmt->execute();
                                            $stmt->store_result();
                                            $stmt->bind_result($Pk, $name, $mobile, $noadult, $nochild, $dov, $nationality, $gender, $state);
                                            if ($stmt->num_rows > 0) {
                                                while ($stmt->fetch()) {
                                                    $id = base64_encode($Pk);
                                                    echo '<tr class="unfocused focused">' .
                                                    '<td style="display:none;">' . $Pk . '</td>' .
                                                    '<td>' . $name . '</td>' .
                                                    '<td>' . $mobile . '</td>' .
                                                    '<td>' . $noadult . '</td>' .
                                                    '<td>' . $nochild . '</td>' .
                                                    '<td>' . date('d-m-Y', strtotime($dov)) . '</td>' .
                                                    '<td>' . $nationality . '</td>' .
                                                    '<td>' . $gender . '</td>' .
                                                    '<td>' . $state . '</td>' .
                                                    '<td class="actions">'
                                                    . '<a href="tourdtls.php?id='.$id.'" target="_blank" class="on-default"><i class="fa fa-print" title="Print"></i></a>'
                                                    . '</td>' .
                                                    '</tr>';
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php include 'includes/footer.php'; ?>
            </div>
        </div>
        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>

        <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/plugins/datatables/dataTables.bootstrap.js"></script>
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#datatable').dataTable({
                    "order": [[ 0, "desc" ]]
                });
                notification();
            });
            
            window.onfocus = function(){ notification(); }
        </script>
    </body>
</html>