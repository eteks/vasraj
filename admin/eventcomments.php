<?php require_once('authenticate.php'); 
include 'config.php';
if(isset($_REQUEST['uid']) || isset($_REQUEST['pid']))
{
    $id = (isset($_REQUEST['uid']) && !empty($_REQUEST['uid'])) ? base64_decode($_REQUEST['uid']) : base64_decode($_REQUEST['pid']);
    $status = (isset($_REQUEST['uid']) && !empty($_REQUEST['uid'])) ? 'U' : 'P';
    $stmt = $db->prepare("select ed_eventtitle,ed_eventdate,ed_eventdesc,if(ed_status='P', 'Published', 'Saved in Draft') from eventdtls_tbl where eventdtls_pk=? and ed_eventstatus=?");
    $stmt->bind_param('is', $id, $status);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($eventtitle,$eventdate,$eventdesc,$estatus);
    if ($stmt->num_rows > 0) {
        $stmt->fetch();
        $ss = ($estatus=='Published') ? 'success' : 'danger';
     } else
        (isset($_REQUEST['uid']) && !empty($_REQUEST['uid'])) ? header('location: upcoming_events.php') : header('location: past_events.php');
} else
    (isset($_REQUEST['uid']) && !empty($_REQUEST['uid'])) ? header('location: upcoming_events.php') : header('location: past_events.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="assets/images/favicon_1.ico">

        <title>Raj Nivas - Comments</title>
        <link type="text/css" href="assets/plugins/x-editable/css/bootstrap-editable.css" rel="stylesheet">
        <link href="assets/plugins/smoothproducts/css/smoothproducts.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/bootstrap-sweetalert/sweet-alert.css" rel="stylesheet" type="text/css">
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="assets/js/modernizr.min.js"></script>
        <style type="text/css">
            .fullwidth-xedit{
                width:900px !important;
            }
        </style>
    </head>

    <body class="fixed-left">

        <div id="wrapper">
            <?php include'includes/header.php' ?>
            <?php include'includes/left_menu.php' ?>
            <div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="page-title">Event Comments</h4>
                                <ol class="breadcrumb">
                                    <li>
                                        <a href="#">Dashboard</a>
                                    </li>
                                    <li>
                                        <a href="#">Event Comments</a>
                                    </li>
                                    <li class="active">
                                        View
                                    </li>
                                </ol>
                            </div>
                        </div>
                        <div class="row">
                           <div class="col-xs-12">
                               <div class="card-box product-detail-box">
                                   <div class="row">
                                       <div class="col-sm-12">
                                           <div class="product-right-info">
                                               <h3><b><?= $eventtitle; ?></b></h3>
                                               <hr/>
                                               <h5 class="font-600">Event Description</h5>
                                               <p class="text-muted"><?= $eventdesc; ?></p>
                                               <div class="m-t-30">
                                                   <button type="button" class="btn btn-white"> Event Date: <?= date('d-m-Y', strtotime($eventdate)); ?></button>
                                                   <button type="button" class="btn btn-<?= $ss; ?> waves-effect waves-light m-l-10"><?= $estatus; ?></button>
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title"><b>Comments</b></h4>
                                    <div>
                                        <?php
                                        $stmt = $db->prepare("select ec_eventcomments_pk, ec_name, ec_email, ec_mobile, ec_comments, ec_date, ec_status from eventcomments_tbl WHERE ec_eventdtls_fk=$id order by ec_date desc");
                                        $stmt->execute();
                                        $stmt->store_result();
                                        $stmt->bind_result($pk, $name, $email, $mobile, $comments, $date, $cstatus);
                                        if ($stmt->num_rows > 0) {
                                            while ($stmt->fetch()) {
                                        ?>
                                        <div class="media" style="margin-bottom: 20px; padding-bottom: 20px; border-bottom: 1px solid black;">
                                            <div class="media-left">
                                                <a href="#"> <img class="media-object img-circle" src="assets/images/avatar.png" style="width: 64px; height: 64px;"> </a>
                                            </div>
                                            <div class="media-body">
                                                <div>
                                                    <div class="col-sm-4">
                                                        <h4 class="media-heading"><?= $name . ' (' . $mobile.')'; ?></h4>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <h4 class="media-heading"><?= $email; ?></h4>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <h4 class="media-heading"><?= date('d-m-Y', strtotime($date)); ?>
                                                            <span style="float: right;">
                                                                <select name="cmbAction" data-id="<?= base64_encode($pk); ?>">
                                                                    <option <?php echo ($cstatus=='N')?'selected':''; ?> value="N">New</option>
                                                                    <option <?php echo ($cstatus=='D')?'selected':''; ?> value="D">Decline</option>
                                                                    <option <?php echo ($cstatus=='A')?'selected':''; ?> value="A">Approve</option>
                                                                </select>
                                                            </span>
                                                        </h4>
                                                    </div>
                                                </div>
                                                <p><a href="#" class="txtComments" data-inputclass="fullwidth-xedit" data-type="textarea" data-pk="<?= base64_encode($pk); ?>" data-placeholder="Your comments here..." data-title="Edit Comments"><?= $comments; ?></a></p>
                                            </div>
                                        </div>
                                        <?php
                                                }
                                            } else
                                                echo '<p>No Comment(s) for this Event...</p>'
                                        ?>
                                    </div>
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
        <script type="text/javascript" src="assets/plugins/x-editable/js/bootstrap-editable.min.js"></script>
        <script src="assets/plugins/smoothproducts/js/smoothproducts.min.js"></script>
        <script src="assets/plugins/bootstrap-sweetalert/sweet-alert.min.js"></script>
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>
        <script type="text/javascript">
            $(window).load(function() {
                $('.sp-wrap').smoothproducts();
            });
            
            $(document).ready(function(){
                $('.txtComments').editable({
                    showbuttons: 'bottom',
                    type: 'text',
                    mode: 'inline',
                    name: 'cmbComments',
                    url: 'includes/helper.php?action=update_comment',
                    success: function(response) {
                        var msg = (response == 1)? 'Successfully Saved' : 'Server Error. Try again...' ;
                        var alertType = (response == 1)? 'success' : 'warning' ;
                        swal({
                            title: "",
                            text: msg,
                            type: alertType,
                            showCancelButton: false,
                            confirmButtonClass: 'btn-'+alertType,
                            confirmButtonText: "Ok",
                            closeOnConfirm: false
                        });
                    },
                    validate: function(value) {
                        if($.trim(value) == '') return 'This field is required';
                    },
                });
            
                $('select[name=cmbAction]').on('change', function(){
                    var dataid = $(this).attr('data-id');
                    var thisval = $(this).val();
                    $.ajax({
                        type: "POST",
                        url: "includes/helper.php",
                        data: 'action=commentaction&id='+dataid+'&status='+thisval,
                        cache: false,
                        success: function(response) {
                            var msg = '';
                            if(response == 1)
                                msg  = 'Comment Approved'
                            if(response == 2)
                                msg = 'Comment Declined';
                            if(response == 3)
                                msg = 'Comment Status Updated as New';
                            if(response == 0)
                                msg = 'Server Error. Try again...';

                            var alertType = (response == 1 || response == 2 || response == 3)? 'success' : 'warning' ;
                            swal({
                                title: "",
                                text: msg,
                                type: alertType,
                                showCancelButton: false,
                                confirmButtonClass: 'btn-'+alertType,
                                confirmButtonText: "Ok",
                                closeOnConfirm: false
                            });
                        }
                    });
                });
            });
        </script>
    </body>
</html>