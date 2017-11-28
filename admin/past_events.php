<?php require_once('authenticate.php'); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="assets/images/favicon_1.ico">

        <title>Raj Nivas - Past Events</title>

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
                                <h4 class="page-title">Past Events</h4>
                                <ol class="breadcrumb">
                                    <li>
                                        <a href="dashboard.php">Dashboard</a>
                                    </li>
                                    <li>
                                        <a href="#">Past Events</a>
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
                                                <th>Event Title</th>
                                                <th>Event Date</th>
                                                <th>Comments</th>
                                                <th>Media</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                                <th style="display: none;">date order</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $stmt = $db->prepare("select eventdtls_pk, ed_eventtitle, ed_eventdate, if(ed_status='P', 'Published', 'Draft'), count(distinct eventgallery_pk), count(distinct ec_eventcomments_pk), ed_createdon from eventdtls_tbl left join eventcomments_tbl on eventdtls_pk = ec_eventDtls_fk left join eventgallery_tbl on eg_eventdtls_fk = eventdtls_pk WHERE ed_eventstatus='P' group by eventdtls_pk");
                                            $stmt->execute();
                                            $stmt->store_result();
                                            $stmt->bind_result($id, $EventTitle, $EventDate, $Status, $mcnt, $cnt, $createdon);
                                            if ($stmt->num_rows > 0) {
                                                while ($stmt->fetch()) {
                                                    $id1 = $id;
                                                    $id = base64_encode($id);
                                                    echo '<tr>' .
                                                    '<td>' . $EventTitle . '</td>' .
                                                    '<td>' . date('d-m-Y', strtotime($EventDate)) . '</td>' .
                                                    '<td>' . $cnt . '</td>' .
                                                    '<td>' . $mcnt . '</td>' .
                                                    '<td>' . $Status . '</td>' .
                                                    '<td class="actions">'
                                                    . '<a href="javascript:void(0);" onclick="editrow(\''.$id.'\');" class="on-default edit-row" data-toggle="modal" data-target="#con-close-modal" title="Edit"><i class="fa fa-pencil"></i></a>&nbsp;&nbsp;&nbsp;'
                                                    .'<a href="javascript:void(0);" onclick="deleterow(\''.$id.'\');" class="on-default remove-row" title="Delete"><i class="fa fa-trash-o"></i></a>&nbsp;&nbsp;&nbsp;'
                                                    .'<a href="eventcomments.php?pid='.$id.'" target="_blank" class="on-default" title="View Comments"><i class="fa fa-commenting"></i></a>&nbsp;&nbsp;&nbsp;'
                                                    .'<a href="eventgallery.php?id='.$id.'" target="_blank" class="on-default" title="Add Gallery"><i class="fa fa-file-image-o"></i></a>'
                                                    . '</td>' .
                                                    '<td style="display:none;">' . strtotime($createdon) . '</td>' .
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
                            <form action="#" data-parsley-validate novalidate id="form-upevents">
                                <input type="hidden" name="action" value="events_save" />
                                <input type="hidden" name="pk" value="" />
                                <input type="hidden" name="eventType" value="P" />
                                <div class="modal-header"> 
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                                    <h4 class="modal-title">Add Past Events</h4> 
                                </div> 
                                <div class="modal-body"> 
                                    <div class="row">
                                        <div class="col-md-12"> 
                                            <div class="form-group"> 
                                                <label for="field-2" class="control-label">Event Title</label> 
                                                <input type="text" class="form-control" id="field-2" placeholder="Enter Title" parsley-trigger="change" required name="txtTitle" />
                                            </div> 
                                        </div> 
                                    </div>
                                    <div class="row"> 
                                        <div class="col-md-12"> 
                                            <div class="form-group no-margin"> 
                                                <label for="field-7" class="control-label">Event Description</label> 
                                                <textarea class="form-control autogrow" id="field-7" placeholder="Write Description Here" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 104px;" parsley-trigger="change" required name="txtDesc"></textarea>
                                            </div> 
                                        </div> 
                                    </div> 
                                    <div class="row">
                                        <div class="col-md-6"> 
                                            <div class="form-group"> 
                                                <label for="field-2" class="control-label">Date</label> 
                                                <input type="text" class="form-control" placeholder="dd/mm/yyyy" id="datepicker-autoclose" parsley-trigger="change" required name="txtDate" />
                                            </div> 
                                        </div>
                                        <div class="col-md-6"> 
                                            <div class="form-group"> 
                                                <label for="field-2" class="control-label">Status</label> 
                                                <select class="form-control selectpicker" data-style="btn-primary btn-custom" name="cmbStatus">
                                                    <option value="P">Publish</option>
                                                    <option value="D">Save in Draft</option>
                                                </select>
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
                    "order": [[ 6, "desc" ]]
                });
                
                jQuery('#datepicker-autoclose').datepicker({
                    format: 'dd-mm-yyyy',
                    autoclose: true,
                    todayHighlight: true
                });
                $('#form-upevents').parsley();
                
                $('#form-upevents').submit(function(){
                    $.ajax({
                        type: "POST",
                        url: "includes/helper.php",
                        data: $('#form-upevents').serialize(),
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
                    $('#form-upevents')[0].reset();
                    $('input[name=action]').val('events_save');
                    $('input[name=pk]').val('');
                    $('input[name=eventType]').val('P');
                    $('div.modal-header h4.modal-title').html('Add Past Events');
                });
            });
            
            function editrow(idarg){
                var id = idarg;
                $.ajax({
                    type: "POST",
                    url: "includes/helper.php",
                    data: 'action=events_edit&id='+id,
                    cache: false,
                    dataType: "JSON",
                    beforeSend: function() {
                        $('#form-upevents')[0].reset();
                        $('input[name=pk]').val('');
                        $('div.modal-header h4.modal-title').html('Edit Upcoming Events');
                    },
                    success: function(data) {
                        if(data.status == '1') {
                            $('input[name=action]').val('events_update');
                            $('input[name=pk]').val(id);
                            $('input[name=txtTitle]').val(data.name);
                            $('textarea[name=txtDesc]').html(data.txt);
                            $('select[name=cmbStatus]').val(data.category).attr('selected','selected');
                            $('input[name=txtDate]').val(data.date);
                        }
                    }
                });
            }
            
            function deleterow(idarg){
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
                        data: 'action=events_delete&id='+idarg,
                        cache: false,
                        success: function() {
                            location.reload();   
                        }
                    });
                });
            }
        </script>
    </body>
</html>