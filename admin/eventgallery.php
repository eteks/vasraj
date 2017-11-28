<?php
require_once('authenticate.php');
include'includes/config.php';
if(isset($_POST['submit']) && $_POST['submit'] == 'add'){
    if($_POST['cmbMedia'] == 'I') {
        $upload_directory = dirname(__file__) . '/events/';
        $mime_arr = array('image/png', 'image/jpeg');
        $ext = array('JPG', 'jpg', 'jpeg', 'JPEG', 'png', 'PNG');
        if ($_FILES['file']['name'] != '') { //check if file field empty or not
            $pdf = $_FILES['file']['name'];
            $ext1 = end(explode('.', $pdf));
            if(in_array(mime_content_type($_FILES['file']['tmp_name']), $mime_arr))
            {
                if(in_array($ext1, $ext))
                {
                    $filename = date('YmdHis').rand().'.'.$ext1;
                    move_uploaded_file($_FILES['file']['tmp_name'], $upload_directory . $filename);
                    $media_url = $filename;
                } else
                    echo json_encode(array('status' =>0, 'msg' => 'Upload file with extension JPG, PNG'));
            } else 
                echo json_encode(array('status' =>0, 'msg' => 'Upload file with extension JPG, PNG'));
        }
    } else {
        $media_url = $_POST['txtfile'];
    }
    $dtime = date("H:i:s");
    $image_date = date('Y-m-d H:i:s', strtotime($_POST['txtDate'].' '.$dtime));
    $stmt = $db->prepare("INSERT INTO eventgallery_tbl (eg_eventdtls_fk, eg_mediaurl, eg_mediatype, eg_date) VALUES(?,?,?,?)");
    $stmt->bind_param('ssss', base64_decode($_REQUEST['id']), $media_url, $_POST['cmbMedia'], $image_date);
    $stmt->execute();
    $stmt->close();
    
    header('location: eventgallery.php?id='.$_REQUEST['id']);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Redruby">

        <link rel="shortcut icon" href="assets/images/favicon_1.ico">

        <title>Raj Nivas - Edit Event Gallery</title>
        
        <link href="assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="assets/plugins/magnific-popup/css/magnific-popup.css"/>
        <link href="assets/plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
        <link href="assets/plugins/bootstrap-sweetalert/sweet-alert.css" rel="stylesheet" type="text/css">
        
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
            <?php
            $eid = base64_decode($_REQUEST['id']);
            $stmt = $db->prepare("select ed_eventtitle, ed_eventstatus from eventdtls_tbl where eventdtls_pk=?");
            $stmt->bind_param('s', $eid);
            $stmt->execute();
            $stmt->store_result();
            $stmt->bind_result($e_name, $e_status);
            if ($stmt->num_rows > 0)
                $results = $stmt->fetch();
            else
                header('location: past_events.php');
            ?>
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="page-title"><?= ($e_status == 'S') ? 'Campaign Gallery' : 'Event Gallery'; ?></h4>
                                <ol class="breadcrumb">
                                    <li>
                                        <a href="dashboard.php">Dashboard</a>
                                    </li>
                                    <li>
                                        <a href="<?= ($e_status == 'U') ? 'upcoming_events.php' : ($e_status == 'S') ? 'swachh.php' : 'past_events.php'; ?>">
                                            <?= ($e_status == 'U') ? 'Upcoming Event' : ($e_status == 'S') ? 'Swachh Puducherry' : 'Past Event'; ?>
                                        </a>
                                    </li>
                                    <li class="active">
                                        Update Gallery
                                    </li>
                                </ol>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <div class="btn-group pull-right m-t-15">
                                    <a href="<?php if($e_status == 'U')
                                                        echo 'upcoming_events.php';
                                                    if($e_status == 'P')
                                                        echo 'past_events.php'; 
                                                    if($e_status == 'S')
                                                        echo 'swachh.php'; 
                                                    
                                            ?>" class="btn btn-default waves-effect waves-light" ><< Back</a>
                                </div>

                                    <h4 class="m-t-0 header-title">Add Media to <b><?= $e_name; ?></b></h4>
                                    <div class="row">
                                        <form action="<?php echo $_SERVER['PHP_SELF'].'?id='.$_REQUEST['id']; ?>" method="post" enctype="multipart/form-data">
                                            <div class="col-md-3">
                                                <div class="p-20">
                                                    <div class="form-group m-b-0">
                                                        <label class="control-label">Media Type</label>
                                                        <select class="form-control selectpicker" data-style="btn-primary btn-custom" name="cmbMedia">
                                                            <option value="I"> Image </option>
                                                            <option value="V"> Video </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="p-20">
                                                    <div class="form-group m-b-0">
                                                        <label class="control-label">Upload Image</label>
                                                        <input type="file" name="file" class="filestyle" data-buttonname="btn-primary">
                                                        <input type="test" name="txtfile" placeholder="YouTube Video Link" class="form-control" data-buttonname="btn-primary">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="p-20">
                                                    <div class="form-group m-b-0">
                                                        <label class="control-label">Upload Date</label>
                                                        <input type="text" class="form-control" placeholder="dd/mm/yyyy" id="datepicker-autoclose" parsley-trigger="change" required name="txtDate" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="p-20">
                                                    <div class="form-group m-b-0">
                                                        <button type="submit" class="form-control ladda-button btn btn-info waves-effect waves-light" data-style="expand-right" value="add" name="submit" id="btn-form">Add</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Media Type</th>
                                                <th>Media File</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                                <th style="display:none;">date order</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $stmteg = $db->prepare("select eventgallery_pk, eg_mediatype, eg_mediaurl, eg_date from eventgallery_tbl where eg_eventdtls_fk = ? ");
                                            $stmteg->bind_param('i', $eid);
                                            $stmteg->execute();
                                            $stmteg->store_result();
                                            $stmteg->bind_result($epk, $e_mediatype, $e_media, $e_date);
                                            if ($stmteg->num_rows > 0) {
                                                while ($stmteg->fetch()) {
                                                    $epk1 = $epk;
                                                    $epk = base64_encode($epk);
                                                    if($e_mediatype == 'I')
                                                        $mediaa = '<a href="./events/'.$e_media.'" target="_blank"><i style="font-size:25px;" class="fa fa-file-image-o"></i></a>';
                                                    else {
                                                        $e_mediaa = end(explode('=', $e_media));
                                                        $mediaa = '<a href="#" data-toggle="modal" data-target="#con-close-modal" data-video="'.$e_mediaa.'"><i style="font-size:25px;" class="fa fa-youtube-square"></i></a>';
                                                    }
                                                    $mediatype = ($e_mediatype == 'I') ? 'Image' : 'Video';
                                                    echo '<tr>' .
                                                    '<td>' . $mediatype . '</td>' .
                                                    '<td>'.$mediaa.'</td>' .
                                                    '<td>' . date('d-m-Y', strtotime($e_date)) . '</td>' .
                                                    '<td class="actions">'
                                                        .'<a href="javascript:void(0);" title="Delete" onclick="deleteimage(\''.$epk.'\');" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>'
                                                    .'</td>' .
                                                    '<td style="display:none;">' . strtotime($e_date) . '</td>' .
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
                <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;" id="youtube_modal">
                    <div class="modal-dialog"> 
                        <div class="modal-content">
                            <div class="modal-header"> 
                                <h4 class="modal-title">YouTube Video</h4> 
                            </div>
                            <div class="modal-body"> 
                                <div class="row">
                                    <div class="col-md-12"> 
                                        <div class="form-group">
                                            <iframe id="youTube" style="width:100%; height:350px;" src="" frameborder="0" allowfullscreen></iframe>
                                        </div> 
                                    </div> 
                                </div>

                            </div> 
                            <div class="modal-footer"> 
                                <button type="reset" class="btn btn-default waves-effect" onclick="$('#youTube').attr('src', '');" data-dismiss="modal">Close</button>
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

        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>
        <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/plugins/datatables/dataTables.bootstrap.js"></script>
        <script src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>     	
        <script type="text/javascript" src="assets/plugins/magnific-popup/js/jquery.magnific-popup.min.js"></script>
        <script src="assets/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="assets/plugins/parsleyjs/parsley.min.js"></script>
        <script src="assets/plugins/bootstrap-sweetalert/sweet-alert.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#datatable').dataTable({
                    "order": [[ 4, "desc" ]]
                });
                
                jQuery('#datepicker-autoclose').datepicker({
                    format: 'dd-mm-yyyy',
                    autoclose: true,
                    todayHighlight: true
                });
                $('form').parsley();
                
                $('select[name=cmbMedia]').on('change', function(){
                    if($(this).val() == 'I')
                    {
                        $('input[name=file]').next().show();
                        $('input[name=txtfile]').hide();
                        $('input[name=txtfile]').parent().find('label').text('Upload Image');
                    } else {
                        $('input[name=txtfile]').show();
                        $('input[name=file]').next().hide();
                        $('input[name=txtfile]').parent().find('label').text('YouTube Video URL');
                    }
                });
                
                $('a[data-video]').click(function(){
                    $('#youTube').attr('src', 'https://www.youtube.com/embed/'+ $(this).attr('data-video') +'?ecver=1');
                });
                $('input[name=txtfile]').hide();
            });
            function deleteimage(idagrs){
                var id = idagrs;
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
                        data: 'action=eventgallery_delete&id='+id,
                        cache: false,
                        success: function() {
                            location.reload();
                        }
                    });
                });
                return false;
            }
        </script>
    </body>
</html>