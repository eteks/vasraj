<?php require_once('authenticate.php'); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="assets/images/favicon_1.ico">

        <title>Raj Nivas - Manage Governor Profile</title>

        <!--venobox lightbox-->
        <link rel="stylesheet" href="assets/plugins/magnific-popup/css/magnific-popup.css"/>
        <link href="assets/plugins/bootstrap-sweetalert/sweet-alert.css" rel="stylesheet" type="text/css">
        <link href="assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
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
                                <div class="btn-group pull-right m-t-15">
                                    <button class="btn btn-default waves-effect waves-light" id="btnaddnew" data-toggle="modal" data-target="#con-close-modal">Create New Governor Profile</button>
                                </div>
                                <h4 class="page-title">Manage Archives</h4>
                                <ol class="breadcrumb">
                                    <li><a href="dashboard.php">Dashboard</a></li>
                                    <li><a href="#">Archives</a></li>
                                    <li class="active">View</li>
                                </ol>
                            </div>
                        </div>

                        <div class="row port">
                            <div class="portfolioContainer">
                                <?php
                                $stmt = $db->prepare("select governormst_pk, gm_name, gm_photo, gm_current, count(id) from governormst_tbl left join rti on governormst_pk = governormst_fk and category='archives' group by governormst_pk");
                                $stmt->execute();
                                $stmt->store_result();
                                $stmt->bind_result($id, $g_name, $g_image, $current, $archcount);
                                if ($stmt->num_rows > 0) {
                                    while ($stmt->fetch()) {
                                ?>
                                        <div class="col-sm-6 col-lg-3 col-md-4">
                                            <div class="product-list-box thumb">
                                                <a href="./governor/<?= $g_image; ?>" class="image-popup" title="<?= $g_name; ?>">
                                                    <img src="./governor/<?= $g_image; ?>" class="thumb-img" alt="<?= $g_name; ?>">
                                                </a>
                                                <div class="product-action">
                                                    <a href="#" data-id="<?= base64_encode($id); ?>" class="btn btn-success btn-sm edit-governor" data-toggle="modal" data-target="#con-close-modal" title="Edit Governor Profile"><i class="md md-mode-edit"></i></a>
                                                    <a href="#" data-id="<?= base64_encode($id); ?>" class="btn btn-danger btn-sm delete-governor" title="Delete"><i class="md md-close"></i></a>
                                                    <a href="archives.php?id=<?= base64_encode($id); ?>" class="btn btn-default btn-sm" title="Add Archives"><i class="md fa fa-archive"></i></a>
                                            </div>
                                                <h4><?= $g_name.' ( '. $archcount .' )'; ?></h4>
                                            </div>
                                        </div>
                                    <?php }
                                } ?>
                            </div>
                        </div>
                    </div>     
                </div>
                <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog"> 
                        <div class="modal-content">
                            <form action="#" data-parsley-validate novalidate id="form-governor">
                                <input type="hidden" name="action" value="governor_save" />
                                <input type="hidden" name="pk" value="" />
                                <div class="modal-header"> 
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                                    <h4 class="modal-title">Create New Governor Profile</h4> 
                                </div> 
                                <div class="modal-body"> 
                                    <div class="row">
                                        <div class="col-md-12"> 
                                            <div class="form-group"> 
                                                <label for="field-2" class="control-label">Governor Name</label> 
                                                <input type="text" class="form-control" id="field-2" placeholder="Enter Name" parsley-trigger="change" required name="txtTitle" />
                                            </div> 
                                        </div> 
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6"> 
                                            <div class="form-group"> 
                                                <label for="field-2" class="control-label">Period From</label> 
                                                <input type="text" class="form-control" placeholder="dd/mm/yyyy" id="dtpFrom" parsley-trigger="change" required name="txtfromDate" />
                                            </div> 
                                        </div> 
                                        <div class="col-md-6"> 
                                            <div class="form-group"> 
                                                <label for="field-2" class="control-label">Period To</label> 
                                                <input type="text" class="form-control" placeholder="dd/mm/yyyy" id="dtpTo" parsley-trigger="change" name="txttoDate" />
                                            </div> 
                                        </div> 
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6"> 
                                            <div class="form-group"> 
                                                <label for="field-2" class="control-label">File Upload</label> 
                                                <input type="file" id="mediafileupload" name="mediafileupload" class="form-control filestyle" data-size="sm" />
                                                <img src="" id="mediafileimg" />
                                                <input type="hidden" id="mediafile" name="mediafile" />
                                                <span class="help-block"><small style="display: none;" class="text-danger">Upload files with extension PDF, DOC, JPG, PNG</small></span>
                                            </div> 
                                        </div> 
                                        <div class="col-md-6"> 
                                            <div class="form-group"> 
                                                <div class="checkbox checkbox-primary" style="margin-top: 30px !important;">
                                                    <input id="chkActive" name="chkActive" type="checkbox" value="Y" />
                                                    <label for="chkActive">
                                                        Yes, Active Governor
                                                    </label>
                                                </div>
                                            </div> 
                                        </div> 
                                    </div>
                                </div> 
                                <div class="modal-footer"> 
                                    <button type="reset" class="btn btn-default waves-effect" data-dismiss="modal">Close</button> 
                                    <button type="submit" class="ladda-button btn btn-info waves-effect waves-light" data-style="expand-right" id="btn-form">Save</button> 
                                </div>
                            </form>
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

        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>
        <script src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>     	
        <script src="assets/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="assets/plugins/isotope/js/isotope.pkgd.min.js"></script>
        <script type="text/javascript" src="assets/plugins/magnific-popup/js/jquery.magnific-popup.min.js"></script>
        <script type="text/javascript" src="assets/plugins/parsleyjs/parsley.min.js"></script>
        <script src="assets/plugins/bootstrap-sweetalert/sweet-alert.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('.image-popup').magnificPopup({
                    type: 'image',
                    closeOnContentClick: true,
                    mainClass: 'mfp-fade',
                    gallery: {
                        enabled: true,
                        navigateByImgClick: true,
                        preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
                    }
                });

                jQuery('#dtpFrom, #dtpTo').datepicker({
                    format: 'dd-mm-yyyy',
                    autoclose: true,
                    todayHighlight: true
                });
                $('#form-governor').parsley();
                
                $('#mediafileupload').on('change', fileUpload);
                $('#form-governor').submit(function(){
                    $.ajax({
                        type: "POST",
                        url: "includes/helper.php",
                        data: $('#form-governor').serialize(),
                        cache: false,
                        dataType: "JSON",
                        beforeSend: function() {
                            $('.close').trigger('click');
                        },
                        success: function(data) {
                            var alertType = (data.status == 1) ? 'success' : 'warning';
                            swal({
                                title: "",
                                text: data.msg,
                                type: alertType,
                                showCancelButton: false,
                                confirmButtonClass: 'btn-'+alertType,
                                confirmButtonText: "Ok",
                                closeOnConfirm: false
                            }, function () {
                                location.reload();
                            });
                        }
                    });
                    return false;
                });
                
                $('a.edit-governor').on('click', function(){
                    var id = $(this).attr('data-id');
                    $.ajax({
                        type: "POST",
                        url: "includes/helper.php",
                        data: 'action=governor_edit&id='+id,
                        cache: false,
                        dataType: "JSON",
                        beforeSend: function() {
                            $('#form-governor')[0].reset();
                            $('input[name=pk]').val('');
                            $('div.modal-header h4.modal-title').html('Edit Governor Profile');
                        },
                        success: function(data) {
                            if(data.status == '1') {
                                $('input[name=action]').val('governor_update');
                                $('input[name=pk]').val(id);
                                $('input[name=txtTitle]').val(data.name);
                                $('input[name=txtfromDate]').val(data.fdate);
                                $('input[name=txttoDate]').val(data.tdate);
                                $('input[name=mediafile]').val(data.pdf);
                                if(data.current == 'Y')
                                    $('input[name=chkActive]').prop('checked', 'checked');
                                $('#mediafileimg').attr({'src': './governor/'+data.pdf, 'style' : 'width:100%; height:100%;'});
                            }
                        }
                    });
                });
                
                $('a.delete-governor').on('click', function(){
                    var idd = $(this).attr('data-id');
                    swal({
                        title: "",
                        text: 'Do you want to Delete?',
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonClass: 'btn-warning',
                        confirmButtonText: "Delete",
                        closeOnConfirm: false
                    }, function () {
                         $.ajax({
                            type: "POST",
                            url: "includes/helper.php",
                            data: 'action=governor_delete&id='+idd,
                            cache: false,
                            success: function() {
                                location.reload();
                            }
                        });
                    });
                });
                
                $('#btnaddnew').on('click', function(){
                    $('#form-governor')[0].reset();
                    $('input[name=action]').val('governor_save');
                    $('input[name=pk]').val('');
                    $('div.modal-header h4.modal-title').html('Create New Governor Profile');
                    $('#mediafileimg').attr({'src': '', 'style' : 'display:none;'});
                });
            });
            
            function fileUpload(event){
                files = event.target.files;
                var data = new FormData();
                var file = files[0];
                data.append('file', file, file.name);
                var xhr = new XMLHttpRequest();     
                xhr.open('POST', 'includes/helper.php?action=mediacenter_upload_file&dest=governor', true);  
                xhr.send(data);
                xhr.onload = function () {
                    var response = JSON.parse(xhr.responseText);
                    if(xhr.status === 200 && response.status == 1){
                        $('#mediafile').val(response.file);
                        $('.text-danger').hide();
                        if(response.ext == '1')
                            $('#mediafileimg').attr({'src': './governor/'+response.file, 'style' : 'width:100%; height:100%;'});
                        else
                            $('#mediafileimg').attr({'src': '', 'style' : 'display:none;'});
                    }else if(response.status == '0'){
                        $('.text-danger').show();
                        $('#mediafileimg').hide();
                    }
                };
                $('#mediafileupload').val('');
            }
        </script>

    </body>
</html>