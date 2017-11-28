<?php require_once('authenticate.php'); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="assets/images/favicon_1.ico">

        <title>Rajnivas - Gallery Sub Category</title>
        <link rel="stylesheet" href="assets/plugins/magnific-popup/css/magnific-popup.css"/>
        <link type="text/css" href="assets/plugins/x-editable/css/bootstrap-editable.css" rel="stylesheet">
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

    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">
            <?php include'includes/header.php' ?>
            <?php include'includes/left_menu.php' ?>
            <div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="btn-group pull-right m-t-15">
                                    <button class="btn btn-default waves-effect waves-light" style="margin-left: 30px;" id="txtcategory" data-type="text" data-pk="1" data-placement="left" data-placeholder="Required" data-title="Enter Category Name">Add New Sub Category</button>
                                </div>
                                <?php
                                if(!isset($_REQUEST['id']) || empty($_REQUEST['id']))
                                    header('location:gallery.php');
                                else {
                                    $id = base64_decode($_REQUEST['id']);
                                    $subcatid = $db->prepare("select cat_name from category where id=$id");
                                    $subcatid->execute();
                                    $subcatid->store_result();
                                    $subcatid->bind_result($catname);
                                    $subcatid->fetch();
                                }
                                ?>
                                <h4 class="page-title">Gallery: Category - <?= $catname; ?></h4>
                                <ol class="breadcrumb">
                                    <li>
                                        <a href="dashboard.php">Dashboard</a>
                                    </li>
                                    <li>
                                        <a href="#">Gallery</a>
                                    </li>
                                    <li class="active">
                                        View - Sub Category
                                    </li>
                                </ol>
                            </div>
                        </div>
                        <div class="row port">
                            <div class="portfolioContainer">
                        <?php
                        $stmt = $db->prepare("select sub.id, sub.subcat_name, ifnull(count(b.id), 0), SUBSTRING_INDEX(group_concat(b.image order by b.id ASC SEPARATOR '**'),'**',-1),  SUBSTRING_INDEX(group_concat(b.image_name order by b.id DESC SEPARATOR '**'),'**',-1) from subcategory sub left join gallery b on sub.id=b.category_id where sub.cat_id = $id group by sub.id ORDER BY b.id DESC");
                        $stmt->execute();
                        $stmt->store_result();
                        $stmt->bind_result($id, $cat_name, $cnt, $img, $img_name);
                        if ($stmt->num_rows > 0) {
                            while ($stmt->fetch()) {
                                if(!empty($id)) {
                                $id = base64_encode($id);
                                $style = '';
                                if(!empty($img) && file_exists('./gallery/'.$img)) 
                                    $img_disp = '<img src="gallery/'.$img.'" class="thumb-img" alt="'.$img_name.'">';
                                else {
                                    $img_disp = '<i class="fa fa-file-image-o" style="font-size: 100px; text-align:center;"></i>';
                                    $style = 'style="padding-left: 20%;"';
                                }
                            ?>
                                <div class="col-sm-6 col-lg-2 col-md-4">
                                    <div class="product-list-box thumb">
                                        <a <?= $style; ?> href="gallery/<?= $img; ?>" class="image-popup" title="<?= $img_name ?>">
                                            <?= $img_disp; ?>
                                        </a>
                                        <div class="product-action">
                                            <a href="#" data-cat="<?= $cat_name; ?>" data-id="<?= $id; ?>" class="btn btn-success btn-sm edit-gallery" data-type="text" data-pk="<?= $id; ?>" data-placement="right" data-placeholder="Required" data-title="Enter Category Name" title="Edit"><i class="md md-mode-edit"></i></a>
                                            <a href="#" data-id="<?= $id; ?>" class="btn btn-danger btn-sm delete-gallery" title="Delete"><i class="md md-close"></i></a>
                                        </div>
                                        <a href="gallery_list.php?id=<?= $id; ?>"><h5><?= $cat_name.' (Images - '.$cnt.')'; ?></h5></a>
                                    </div>
                                </div>
                            <?php } } } ?>
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

        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

        <script type="text/javascript" src="assets/plugins/isotope/js/isotope.pkgd.min.js"></script>
        <script type="text/javascript" src="assets/plugins/magnific-popup/js/jquery.magnific-popup.min.js"></script>
        <script type="text/javascript" src="assets/plugins/x-editable/js/bootstrap-editable.min.js"></script>
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
                
                $.fn.editableform.buttons = 
                '<button type="submit" class="btn btn-primary editable-submit btn-sm waves-effect waves-light"><i class="md md-done"></i></button>' +
                '<button type="button" class="btn btn-white editable-cancel btn-sm waves-effect"><i class="md md-clear"></i></button>';

                $('#txtcategory').editable({
                    type: 'text',
                    placement: 'left',
                    name: 'category',
                    url: 'includes/helper.php?action=subcategory_add&id=<?= $_REQUEST['id']; ?>',
                    success: function(response) {
                        $('#txtcategory').html('Add New Sub Category');
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
                        }, function () {
                            location.reload();
                        });
                    },
                    validate: function(value) {
                        if($.trim(value) == '') return 'This field is required';
                    },
                });
                                
                $('a.edit-gallery').editable({
                    name: 'category',
                    url: 'includes/helper.php?action=subcategory_update&pk='+$(this).attr('data-pk'),
                    success: function(response) {
                        $('#txtcategory').html('Add New Category');
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
                        }, function () {
                            location.reload();
                        });
                    },
                    validate: function(value) {
                        if($.trim(value) == '') return 'This field is required';
                    },
                });
                
                $('a.edit-gallery').on('click', function(){
                    $('form.editableform input[type=text]').val($(this).attr('data-cat'))
                });
                $('#txtcategory').on('click', function(){
                    $('form.editableform input[type=text]').val('')
                });
                $('a.delete-gallery').on('click', function(){
                    var id = $(this).attr('data-id');
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
                            data: 'action=subcategory_delete&id='+id,
                            cache: false,
                            success: function() {
                                location.reload();
                            }
                        });
                    });
                    return false;
                });
            });
        </script>
    </body>
</html>