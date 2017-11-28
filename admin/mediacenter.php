<?php require_once('authenticate.php'); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="assets/images/favicon_1.ico">

        <title>Rajnivas - Media Center</title>

        <!-- DataTables -->
        <link href="assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
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
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="btn-group pull-right m-t-15">
                                    <button class="btn btn-default waves-effect waves-light" id="btnaddnew" data-toggle="modal" data-target="#con-close-modal">Add New</button>
                                </div>
                                <h4 class="page-title">Media Center</h4>
                                <ol class="breadcrumb">
                                    <li>
                                        <a href="dashboard.php">Dashboard</a>
                                    </li>
                                    <li>
                                        <a href="#">Media Center</a>
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
                                                <th>Title</th>
                                                <th>Category</th>
                                                <th>File</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                                <th style="display:none;">date order</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $stmt = $db->prepare("select id, rtiname, category, pdf, rti_date from rti where category != 'archives' ORDER BY id DESC");
                                            $stmt->execute();
                                            $stmt->store_result();
                                            $stmt->bind_result($id, $rti_name, $category, $pdf, $rti_date);
                                            if ($stmt->num_rows > 0) {
                                                while ($stmt->fetch()) {
                                                    $id = base64_encode($id);
                                                    $fileext = strtoupper(end(explode('.', $pdf)));
                                                    $fileType = array('PDF' => 'fa-file-pdf-o', 'DOC' => 'fa-file-word-o', 'DOCX' => 'fa-file-word-o', 'JPG' => 'fa-file-image-o', 'PNG' => 'fa-file-image-o');
                                                    echo '<tr>' .
                                                    '<td>' . $rti_name . '</td>' .
                                                    '<td>' . ucfirst($category)  . '</td>' .
                                                    '<td><a href="./rtiuploads/'.$pdf.'" target="_blank"><i style="font-size:25px;" class="fa '.$fileType[$fileext].'"></i></a></td>' .
                                                    '<td>' . date('d-m-Y', strtotime($rti_date)) . '</td>' .
                                                    '<td class="actions">'
                                                    . '<a href="javascript:void(0);" onclick="editrow(\''.$id.'\');" data-id="'.$id.'" class="on-default edit-row" data-toggle="modal" title="Edit" data-target="#con-close-modal"><i class="fa fa-pencil"></i></a>&nbsp;&nbsp;&nbsp;
                                                        <a href="javascript:void(0);" onclick="deleterow(\''.$id.'\');" title="Delete" data-id="'.$id.'" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>'
                                                    . '</td>' .
                                                    '<td style="display:none;">' . strtotime($rti_date) . '</td>' .
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
                <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog"> 
                        <div class="modal-content">
                            <form action="#" data-parsley-validate novalidate id="form-mediacenter">
                                <input type="hidden" name="action" value="mediacenter_save" />
                                <input type="hidden" name="pk" value="" />
                                <div class="modal-header"> 
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                                    <h4 class="modal-title">Add New Media Center</h4> 
                                </div> 
                                <div class="modal-body"> 
                                    <div class="row">
                                        <div class="col-md-12"> 
                                            <div class="form-group"> 
                                                <label for="field-1" class="control-label">Media Category</label> 
                                                <select class="form-control selectpicker" data-style="btn-primary btn-custom" name="cmbCategory">
                                                    <option value="press">Press Release</option>
                                                    <option value="meeting">Meeting Minutes</option>
                                                    <option value="speeches">Speeches</option>
                                                    <option value="presentation">Presentation</option>
                                                    <option value="reports">Reports</option>
                                                </select>
                                            </div> 
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12"> 
                                            <div class="form-group"> 
                                                <label for="field-2" class="control-label">Title</label> 
                                                <input type="text" class="form-control" id="field-2" placeholder="Enter Title" parsley-trigger="change" required name="txtTitle" />
                                            </div> 
                                        </div> 
                                    </div>
                                    <div class="row"> 
                                        <div class="col-md-12"> 
                                            <div class="form-group no-margin"> 
                                                <label for="field-7" class="control-label">Description</label> 
                                                <textarea class="form-control autogrow" id="field-7" placeholder="Write Description Here" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 104px;" parsley-trigger="change" required name="txtDesc"></textarea>
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
                                                <label for="field-2" class="control-label">Date</label> 
                                                <input type="text" class="form-control" placeholder="dd/mm/yyyy" id="datepicker-autoclose" parsley-trigger="change" required name="txtDate" />
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

        <script src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
     	
        <script src="assets/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js" type="text/javascript"></script>
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

        <script type="text/javascript" src="assets/plugins/parsleyjs/parsley.min.js"></script>
        <script src="assets/plugins/bootstrap-sweetalert/sweet-alert.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#datatable').dataTable({
                    "order": [[ 5, "desc" ]]
                });
                
                jQuery('#datepicker-autoclose').datepicker({
                    format: 'dd-mm-yyyy',
                    autoclose: true,
                    todayHighlight: true
                });
                $('#form-mediacenter').parsley();
                
                $('#mediafileupload').on('change', fileUpload)
                $('#form-mediacenter').submit(function(){
                    $.ajax({
                        type: "POST",
                        url: "includes/helper.php",
                        data: $('#form-mediacenter').serialize(),
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
                
                $('#btnaddnew').on('click', function(){
                    $('#form-mediacenter')[0].reset();
                    $('input[name=action]').val('mediacenter_save');
                    $('input[name=pk]').val('');
                    $('div.modal-header h4.modal-title').html('Add New Media Center');
                    $('#mediafileimg').attr({'src': '', 'style' : 'display:none;'});
                });
            });
            
            function editrow(idarg){
                var id = idarg;
                alert(id);
                $.ajax({
                    type: "POST",
                    url: "includes/helper.php",
                    data: 'action=mediacenter_edit&id='+id,
                    cache: false,
                    dataType: "JSON",
                    beforeSend: function() {
                        $('#form-mediacenter')[0].reset();
                        $('input[name=pk]').val('');
                        $('div.modal-header h4.modal-title').html('Edit Media Center');
                    },
                    success: function(data) {
                        if(data.status == '1') {
                            $('input[name=action]').val('mediacenter_update');
                            $('input[name=pk]').val(id);
                            $('input[name=txtTitle]').val(data.name);
                            $('textarea[name=txtDesc]').html(data.txt);
                            $('select[name=cmbCategory]').val(data.category).attr('selected','selected');
                            $('input[name=mediafile]').val(data.pdf);
                            if(data.ext == '1')
                                $('#mediafileimg').attr({'src': './rtiuploads/'+data.pdf, 'style' : 'width:100%; height:100%;'});
                            else
                                $('#mediafileimg').attr({'src': '', 'style' : 'display:none;'});
                            $('input[name=txtDate]').val(data.date);
                        }
                    }
                });
            }
            function deleterow(idarg)
            {
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
                        data: 'action=mediacenter_delete&id='+id,
                        cache: false,
                        success: function() {
                            location.reload();
                        }
                    });
                });
            }
            function fileUpload(event){
                files = event.target.files;
                var data = new FormData();
                var file = files[0];
                data.append('file', file, file.name);
                var xhr = new XMLHttpRequest();     
                xhr.open('POST', 'includes/helper.php?action=mediacenter_upload_file&dest=rtiuploads', true);  
                xhr.send(data);
                xhr.onload = function () {
                    var response = JSON.parse(xhr.responseText);
                    if(xhr.status === 200 && response.status == 1){
                        $('#mediafile').val(response.file);
                        $('.text-danger').hide();
                        if(response.ext == '1')
                            $('#mediafileimg').attr({'src': './rtiuploads/'+response.file, 'style' : 'width:100%; height:100%;'});
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