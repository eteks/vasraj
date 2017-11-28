<?php require_once('authenticate.php'); 
include'includes/config.php';
if(isset($_POST['submit']) && $_POST['submit'] == 'add'){
    $upload_directory = dirname(__file__) . '/gallery/';
    $mime_arr = array('image/png', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/pdf', 'image/jpeg');
    $ext = array('JPG', 'jpg', 'jpeg', 'JPEG', 'png', 'PNG');
    if ($_FILES['file']['name'] != '') {
        $pdf = $_FILES['file']['name'];
        $ext1 = end(explode('.', $pdf));
        if(in_array(mime_content_type($_FILES['file']['tmp_name']), $mime_arr))
        {
            if(in_array($ext1, $ext))
            {
                $image_name = $_POST['txtTitle'];
                $category_id = base64_decode($_REQUEST['id']);
                $image_date = date('Y-m-d H:i:s', strtotime($_POST['txtDate'].' '.date("H:i:s")));
                $filename = date('YmdHis').rand().'.'.$ext1;
                move_uploaded_file($_FILES['file']['tmp_name'], $upload_directory . $filename);
                $stmt = $db->prepare("INSERT INTO gallery (image_name,category_id,image,image_date) VALUES(?,?,?,?)");
                $stmt->bind_param('ssss', $image_name, $category_id, $filename, $image_date);
                $stmt->execute();
                $stmt->close();
            } else
                echo json_encode(array('status' =>0, 'msg' => 'Upload file with extension JPG, PNG'));
        } else 
            echo json_encode(array('status' =>0, 'msg' => 'Upload file with extension JPG, PNG'));
    }
    header('location: gallery_list.php?id='.$_REQUEST['id']);
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

        <title>Rajnivas - Edit Gallery</title>

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
        <div id="wrapper">
            <?php include'includes/header.php' ?>
            <?php include'includes/left_menu.php' ?>
            <?php
            $id = base64_decode($_REQUEST['id']);
            $stmt = $db->prepare("select subcat_name from subcategory where id=?");
            $stmt->bind_param('s', $id);
            $stmt->execute();
            $stmt->store_result();
            $stmt->bind_result($cat);
            if ($stmt->num_rows > 0) {
                $results = $stmt->fetch();
                $catname = $db->prepare("select cat.id from category cat inner join subcategory sub on cat.id=sub.cat_id where sub.id=?");
                $catname->bind_param('s', $id);
                $catname->execute();
                $catname->store_result();
                $catname->bind_result($catid);
                $catname->fetch();
            }
            else
                header('location: gallery.php');
            ?>
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="page-title">Add Images to Gallery</h4>
                                <ol class="breadcrumb">
                                    <li>
                                        <a href="dashboard.php">Dashboard</a>
                                    </li>
                                    <li>
                                        <a href="gallery.php">Category</a>
                                    </li>
                                    <li>
                                        <a href="gallerysub.php?id=<?= base64_encode($catid); ?>">Sub Category</a>
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
                                    <a href="gallerysub.php?id=<?= base64_encode($catid); ?>" class="btn btn-default waves-effect waves-light" ><< Back</a>
                                </div>
                                <h4 class="m-t-0 header-title">Add Images to <b><?= $cat; ?></b></h4>
                                <div class="row">
                                    <form action="<?php echo $_SERVER['PHP_SELF'].'?id='.$_REQUEST['id']; ?>" method="post" enctype="multipart/form-data">
                                        <div class="col-md-3">
                                            <div class="p-20">
                                                <div class="form-group m-b-0">
                                                    <label class="control-label">Image Name</label>
                                                    <input type="text" class="form-control" id="field-2" placeholder="Enter Title" parsley-trigger="change" required name="txtTitle" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="p-20">
                                                <div class="form-group m-b-0">
                                                    <label class="control-label">Upload Image</label>
                                                    <input type="file" name="file" class="filestyle" required data-buttonname="btn-primary">
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
                        <div class="row port">
                        <?php
                        $stmt = $db->prepare("select id, image, image_name, image_date from gallery where category_id = ? ORDER BY id DESC");
                        $stmt->bind_param('s', $id);
                        $stmt->execute();
                        $stmt->store_result();
                        $stmt->bind_result($pk, $img, $img_name, $image_date);
                        if ($stmt->num_rows > 0) {
                            while ($stmt->fetch()) { 
                            ?>
                            <div class="portfolioContainer">
                                <div class="col-sm-6 col-lg-2 col-md-4">
                                    <div class="product-list-box thumb">
                                        <a href="gallery/<?= $img; ?>" class="image-popup" title="<?= $img_name.' ('.date('d-m-Y', strtotime($image_date)).')' ?>">
                                            <img src="gallery/<?= $img; ?>" class="thumb-img" alt="<?= $img_name; ?>" />
                                        </a>
                                        <div class="product-action">
                                            <a href="#" onclick="deleteimage('<?= base64_encode($pk); ?>');" class="btn btn-danger btn-sm delete-gallery" title="Delete"><i class="md md-close"></i></a>
                                        </div>
                                        <h5><?= $img_name.' ('.date('d-m-Y', strtotime($image_date)).')'; ?></h5>
                                    </div>
                                </div>
                            </div>
                        <?php
                            }    
                        } ?>
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

        <script src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>     	
        <script type="text/javascript" src="assets/plugins/magnific-popup/js/jquery.magnific-popup.min.js"></script>
        <script src="assets/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js" type="text/javascript"></script>
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
                        preload: [0, 1]
                    }
                });
                
                jQuery('#datepicker-autoclose').datepicker({
                    format: 'dd-mm-yyyy',
                    autoclose: true,
                    todayHighlight: true
                });
                $('form').parsley();
            });
            function deleteimage(idarg){
                var id = idarg;
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
                        data: 'action=gallery_delete&id='+id,
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