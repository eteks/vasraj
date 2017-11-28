<?php
include 'config.php';
if(isset($_REQUEST))
{
    if($_REQUEST['action'] == 'mediacenter_upload_file') {
        $upload_directory = dirname(__file__) . '/../'.$_REQUEST['dest'].'/';
        $mime_arr = array('image/png', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/pdf', 'image/jpeg');
        if($_REQUEST['dest'] == 'governor')
            $ext = array('JPG', 'jpg', 'jpeg', 'JPEG', 'png', 'PNG');
        else
            $ext = array('pdf', 'PDF', 'doc', 'docx', 'DOC', 'DOCX', 'JPG', 'jpg', 'jpeg', 'JPEG', 'png', 'PNG');
        $ext2 = array('JPG', 'jpg', 'jpeg', 'JPEG', 'png', 'PNG');
        if ($_FILES['file']['name'] != '') { //check if file field empty or not
            $pdf = $_FILES['file']['name'];
            $ext1 = end(explode('.', $pdf));
            if(in_array(mime_content_type($_FILES['file']['tmp_name']), $mime_arr))
            {
                if(in_array($ext1, $ext))
                {
                    $filename = date('YmdHis').rand().'.'.$ext1;
                    move_uploaded_file($_FILES['file']['tmp_name'], $upload_directory . $filename);
                    $ext3 = in_array($ext1, $ext2) ? '1' : '0';
                    echo json_encode(array('status' =>1, 'file' => $filename, 'ext' => $ext3));
                } else {
                    if($_REQUEST['dest'] == 'governor')
                        echo json_encode(array('status' =>0, 'msg' => 'Upload file with extension JPG, JPEG, PNG'));
                    else
                        echo json_encode(array('status' =>0, 'msg' => 'Upload file with extension PDF, DOC, JPG, PNG'));
                }
            } else { 
                if($_REQUEST['dest'] == 'governor')
                    echo json_encode(array('status' =>0, 'msg' => 'Upload file with extension JPG, JPEG, PNG'));
                else
                    echo json_encode(array('status' =>0, 'msg' => 'Upload file with extension PDF, DOC, JPG, PNG'));
            }
        }
    }
    
    /*
     * Media Center Starts Here
     */
    if($_REQUEST['action'] == 'mediacenter_save') {
        $governor = isset($_REQUEST['cmbGovernor']) && !empty($_REQUEST['cmbGovernor']) ? strip_tags($_REQUEST['cmbGovernor']) : NULL;
        $mcategory = strip_tags($_REQUEST['cmbCategory']);
        $rtiname = strip_tags($_REQUEST['txtTitle']);
        $rtidesp = strip_tags($_REQUEST['txtDesc']);
        $filename = strip_tags($_REQUEST['mediafile']);
        $dtime = date("H:i:s");
        $txtDate = date('Y-m-d H:i:s', strtotime(strip_tags($_REQUEST['txtDate']).' '.$dtime));
        $stmt = $db->prepare("INSERT INTO rti(rtiname,rtitext,category,governormst_fk,pdf,rti_date) VALUES(?,?,?,?,?,?)");
        $stmt->bind_param('ssssss', $rtiname, $rtidesp, $mcategory, $governor, $filename, $txtDate);
        $stmt->execute();
        $stmt->close();
        $status = ($db->affected_rows) ? '1' : '0';
        $msg = ($status=='1') ? 'Successfully Saved' : 'Server Error. Try again...';
        echo json_encode(array('status' => $status, 'msg' => $msg));
    }
    if($_REQUEST['action'] == 'mediacenter_edit') {
        $id = base64_decode($_REQUEST["id"]);
        $stmt = $db->prepare("select rtiname, rtitext, category, governormst_fk, pdf, rti_date from rti where id=?");
        $stmt->bind_param('s', $id);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($rtiname, $rtitext, $category, $governor, $pdf, $extrti_date);
        if($stmt->num_rows > 0)
        {
            $results = $stmt->fetch();
            $ext2 = array('jpg', 'jpeg', 'png');
            $ext1 = strtolower(end(explode('.', $pdf)));
            $ext3 = in_array($ext1, $ext2) ? '1' : '0';
            $result = array('name' => $rtiname, 'txt' => $rtitext, 'category' => $category, 'governor' => $governor, 'pdf' => $pdf, 'date' => date('d-m-Y', strtotime($extrti_date)), 'status' => '1', 'ext' => $ext3);
        } else
            $result = array('status' => '0');
        $stmt->free_result();
        $stmt->close();
        echo json_encode($result);
    }
    if($_REQUEST['action'] == 'mediacenter_update') {
        $governor = isset($_REQUEST['cmbGovernor']) && !empty($_REQUEST['cmbGovernor']) ? strip_tags($_REQUEST['cmbGovernor']) : NULL;
        $mcategory = strip_tags($_REQUEST['cmbCategory']);
        $rtiname = strip_tags($_REQUEST['txtTitle']);
        $rtidesp = strip_tags($_REQUEST['txtDesc']);
        $filename = strip_tags($_REQUEST['mediafile']);
        $dtime = date("H:i:s");
        $txtDate = date('Y-m-d H:i:s', strtotime(strip_tags($_REQUEST['txtDate']).' '.$dtime));
        $pk = base64_decode($_REQUEST['pk']);
        $stmt = $db->prepare("update rti set rtiname=?, rtitext=?, category=?, governormst_fk=?, pdf=?, rti_date=? where id=?");
        $stmt->bind_param('sssssss', $rtiname, $rtidesp, $mcategory, $governor, $filename, $txtDate, $pk);
        $stmt->execute();
        $stmt->close();
        $status = ($db->affected_rows) ? '1' : '0';
        $msg = ($status=='1') ? 'Updated Successfully' : 'Server Error. Try again...';
        echo json_encode(array('status' => $status, 'msg' => $msg));
    }
    if($_REQUEST['action'] == 'mediacenter_delete') {
        $r = base64_decode($_REQUEST["id"]);
        $stmtimg = $db->prepare("select pdf from rti where id=?");
        $stmtimg->bind_param('s', $r);
        $stmtimg->execute();
        $stmtimg->store_result();
        $stmtimg->bind_result($image);
        if($stmtimg->num_rows > 0)
        {
            $result = $stmtimg->fetch();
            if(!empty($image) && file_exists("../rtiuploads/$image"))
                unlink("../rtiuploads/$image");
        }
        $stmt = $db->prepare("delete from rti where id=?");
        $stmt->bind_param('s', $r);
        $stmt->execute();
    }
    
    /*
     * News Stream Starts Here
     */
    if($_REQUEST['action'] == 'newsstream_save') {
        $rtiname = strip_tags($_REQUEST['txtTitle']);
        $rtidesp = strip_tags($_REQUEST['txtDesc']);
        $filename = strip_tags($_REQUEST['mediafile']);
        $dtime = date("H:i:s");
        $txtDate = date('Y-m-d H:i:s', strtotime(strip_tags($_REQUEST['txtDate']).' '.$dtime));
        $stmt = $db->prepare("INSERT INTO newsroom(n_name,n_description,n_image,ndate) VALUES(?,?,?,?)");
        $stmt->bind_param('ssss', $rtiname, $rtidesp, $filename, $txtDate);
        $stmt->execute();
        $stmt->close();
        $status = ($db->affected_rows) ? '1' : '0';
        $msg = ($status=='1') ? 'Successfully Saved' : 'Server Error. Try again...';
        echo json_encode(array('status' => $status, 'msg' => $msg));
    }
    if($_REQUEST['action'] == 'newsstream_edit') {
        $id = base64_decode($_REQUEST["id"]);
        $stmt = $db->prepare("select n_name, n_description, n_image, ndate from newsroom where id=?");
        $stmt->bind_param('s', $id);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($rtiname, $rtitext, $pdf, $extrti_date);
        if($stmt->num_rows > 0)
        {
            $results = $stmt->fetch();
            $ext2 = array('jpg', 'jpeg', 'png');
            $ext1 = strtolower(end(explode('.', $pdf)));
            $ext3 = in_array($ext1, $ext2) ? '1' : '0';
            $result = array('name' => $rtiname, 'txt' => $rtitext, 'pdf' => $pdf, 'date' => date('d-m-Y', strtotime($extrti_date)), 'status' => '1', 'ext' => $ext3);
        } else
            $result = array('status' => '0');
        $stmt->free_result();
        $stmt->close();
        echo json_encode($result);
    }
    if($_REQUEST['action'] == 'newsstream_update') {
        $rtiname = strip_tags($_REQUEST['txtTitle']);
        $rtidesp = strip_tags($_REQUEST['txtDesc']);
        $filename = strip_tags($_REQUEST['mediafile']);
        $dtime = date("H:i:s");
        $txtDate = date('Y-m-d H:i:s', strtotime(strip_tags($_REQUEST['txtDate']).' '.$dtime));
        $pk = base64_decode($_REQUEST['pk']);
        $stmt = $db->prepare("update newsroom set n_name=?, n_description=?, n_image=?, ndate=? where id=?");
        $stmt->bind_param('sssss', $rtiname, $rtidesp, $filename, $txtDate, $pk);
        $stmt->execute();
        $stmt->close();
        $status = ($db->affected_rows) ? '1' : '0';
        $msg = ($status=='1') ? 'Updated Successfully' : 'Server Error. Try again...';
        echo json_encode(array('status' => $status, 'msg' => $msg));
    }
    if($_REQUEST['action'] == 'newsstream_delete') {
        $r = base64_decode($_REQUEST["id"]);
        $stmtimg = $db->prepare("select n_image from newsroom where id=?");
        $stmtimg->bind_param('s', $r);
        $stmtimg->execute();
        $stmtimg->store_result();
        $stmtimg->bind_result($image);
        if($stmtimg->num_rows > 0)
        {
            $result = $stmtimg->fetch();
            if(!empty($image) && file_exists("../newsimages/$image"))
                unlink("../newsimages/$image");
        }
        $stmt = $db->prepare("delete from newsroom where id=?");
        $stmt->bind_param('s', $r);
        $stmt->execute();
    }
    
    /*
     * Gallery Category Starts Here
     */
    if($_REQUEST['action'] == 'category_add') {
        $category = strip_tags($_REQUEST['value']);
        $category_slag = strip_tags(str_replace(' ', '_', $_REQUEST['value']));
        $stmt = $db->prepare("INSERT INTO category(cat_name,cat_slug) VALUES(?,?)");
        $stmt->bind_param('ss', $category, $category_slag);
        $stmt->execute();
        $stmt->close();
        $status = ($db->affected_rows) ? '1' : '0';
        echo $status;
    }
    
    if($_REQUEST['action'] == 'category_update') {
        $pk = base64_decode($_REQUEST['pk']);
        $cat = $_REQUEST['value'];
        $slug = str_replace('_', ' ', $_REQUEST['value']);
        $stmt = $db->prepare("update category set cat_name=?, cat_slug=? where id=?");
        $stmt->bind_param('sss', $cat, $slug, $pk);
        $stmt->execute();
        $stmt->close();
        echo $status = ($db->affected_rows) ? '1' : '0';
    }
    
    if($_REQUEST['action'] == 'category_delete') {
        $r = base64_decode($_REQUEST["id"]);
        $stmtimg = $db->prepare("select id, image from gallery where category_id=?");
        $stmtimg->bind_param('s', $r);
        $stmtimg->execute();
        $stmtimg->store_result();
        $stmtimg->bind_result($pk, $image);
        if($stmtimg->num_rows > 0)
        {
            while($stmtimg->fetch()){
                if(!empty($image) && file_exists("../gallery/$image"))
                    unlink("../gallery/$image");
                $stmt = $db->prepare("delete from gallery where id=?");
                $stmt->bind_param('s', $pk);
                $stmt->execute();
            }
        }
        $stmt = $db->prepare("delete from subcategory where cat_id=?");
        $stmt->bind_param('s', $r);
        $stmt->execute();
        $stmt = $db->prepare("delete from category where id=?");
        $stmt->bind_param('s', $r);
        $stmt->execute();
        echo $r;
    }
    
    /*
     * Gallery Sub Category Starts Here
     */
    if($_REQUEST['action'] == 'subcategory_add') {
        $category = strip_tags($_REQUEST['value']);
        $category_slag = strip_tags(str_replace(' ', '_', $_REQUEST['value']));
        $stmt = $db->prepare("INSERT INTO subcategory(cat_id, subcat_name, subcat_slug) VALUES(?,?,?)");
        $stmt->bind_param('sss', base64_decode($_GET['id']), $category, $category_slag);
        $stmt->execute();
        $stmt->close();
        $status = ($db->affected_rows) ? '1' : '0';
        echo $status;
    }
    
    if($_REQUEST['action'] == 'subcategory_update') {
        $pk = base64_decode($_REQUEST['pk']);
        $cat = $_REQUEST['value'];
        $slug = str_replace('_', ' ', $_REQUEST['value']);
        $stmt = $db->prepare("update subcategory set subcat_name=?, subcat_slug=? where id=?");
        $stmt->bind_param('sss', $cat, $slug, $pk);
        $stmt->execute();
        $stmt->close();
        echo $status = ($db->affected_rows) ? '1' : '0';
    }
    
    if($_REQUEST['action'] == 'subcategory_delete') {
        $r = base64_decode($_REQUEST["id"]);
        $stmtimg = $db->prepare("select id, image from gallery where category_id=?");
        $stmtimg->bind_param('s', $r);
        $stmtimg->execute();
        $stmtimg->store_result();
        $stmtimg->bind_result($pk, $image);
        if($stmtimg->num_rows > 0)
        {
            while($stmtimg->fetch()){
                if(!empty($image) && file_exists("../gallery/$image"))
                    unlink("../gallery/$image");
                $stmt = $db->prepare("delete from gallery where id=?");
                $stmt->bind_param('s', $pk);
                $stmt->execute();
            }
        }
        $stmt = $db->prepare("delete from subcategory where id=?");
        $stmt->bind_param('s', $r);
        $stmt->execute();
        echo $r;
    }
    
    if($_REQUEST['action'] == 'gallery_delete') {
        $r = base64_decode($_REQUEST["id"]);
        $stmtimg = $db->prepare("select image from gallery where id=?");
        $stmtimg->bind_param('s', $r);
        $stmtimg->execute();
        $stmtimg->store_result();
        $stmtimg->bind_result($image);
        if($stmtimg->num_rows > 0)
        {
            $result = $stmtimg->fetch();
            if(!empty($image) && file_exists("../gallery/$image"))
                unlink("../gallery/$image");
            $stmt = $db->prepare("delete from gallery where id=?");
            $stmt->bind_param('s', $r);
            $stmt->execute();
        }
    }
    
    /*
     * Upcoming Events Starts Here
     */
    if($_REQUEST['action'] == 'events_save') {
        $rtiname = strip_tags($_REQUEST['txtTitle']);
        $rtidesp = strip_tags($_REQUEST['txtDesc']);
        $eventType = strip_tags($_REQUEST['eventType']);
        $dtime = date("H:i:s");
        $txtDate = date('Y-m-d H:i:s', strtotime(strip_tags($_REQUEST['txtDate']).' '.$dtime));
        $createdon = date('Y-m-d H:i:s');
        $mcategory = strip_tags($_REQUEST['cmbStatus']);
        $stmt = $db->prepare("INSERT INTO eventdtls_tbl (ed_eventtitle,ed_eventdate,ed_eventdesc,ed_status,ed_eventstatus, ed_createdon) VALUES(?,?,?,?,?,?)");
        $stmt->bind_param('ssssss', $rtiname, $txtDate, $rtidesp, $mcategory, $eventType, $createdon);
        $stmt->execute();
        $stmt->close();
        $status = ($db->affected_rows) ? '1' : '0';
        $msg = ($status=='1') ? 'Successfully Saved' : 'Server Error. Try again...';
        echo json_encode(array('status' => $status, 'msg' => $msg));
    }
    if($_REQUEST['action'] == 'events_edit') {
        $id = base64_decode($_REQUEST["id"]);
        $stmt = $db->prepare("select ed_eventtitle,ed_eventdate,ed_eventdesc,ed_status from eventdtls_tbl where eventdtls_pk=?");
        $stmt->bind_param('s', $id);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($EventTitle, $EventDate, $EventDesc, $Status);
        if($stmt->num_rows > 0)
        {
            $results = $stmt->fetch();
            $result = array('name' => $EventTitle, 'txt' => $EventDesc, 'category' => $Status, 'date' => date('d-m-Y', strtotime($EventDate)), 'status' => '1');
        } else
            $result = array('status' => '0');
        $stmt->free_result();
        $stmt->close();
        echo json_encode($result);
    }
    if($_REQUEST['action'] == 'events_update') {
        $mcategory = strip_tags($_REQUEST['cmbStatus']);
        $rtiname = strip_tags($_REQUEST['txtTitle']);
        $rtidesp = strip_tags($_REQUEST['txtDesc']);
        $dtime = $_REQUEST['txtDate'].' '.date("H:i:s");
        $createdon = date('Y-m-d H:i:s');
        $txtDate = date('Y-m-d H:i:s', strtotime(strip_tags($dtime)));
        $pk = base64_decode($_REQUEST['pk']);
        $stmt = $db->prepare("update eventdtls_tbl set ed_eventtitle=?, ed_eventdate=?, ed_eventdesc=?, ed_status=?, ed_createdon=? where eventdtls_pk=?");
        $stmt->bind_param('ssssss', $rtiname, $txtDate, $rtidesp, $mcategory, $createdon, $pk);
        $stmt->execute();
        $stmt->close();
        $status = ($db->affected_rows) ? '1' : '0';
        $msg = ($status=='1') ? 'Updated Successfully' : 'Server Error. Try again...';
        echo json_encode(array('status' => $status, 'msg' => $msg));
    }
    if($_REQUEST['action'] == 'events_delete') {
        $r = base64_decode($_REQUEST["id"]);
        $stmt = $db->prepare("select eg_mediaurl, eg_mediatype from eventgallery_tbl where eg_eventdtls_fk=? and eg_mediatype='V'");
        $stmt->bind_param('s', $r);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($mediaurl);
        if($stmt->num_rows > 0)
        {
            while($stmt->fetch())
            {
                if(!empty($mediaurl) && file_exists("../events/$mediaurl"))
                {
                    unlink("../events/$mediaurl");
                }
            }
        }
        $stmt = $db->prepare("delete from eventgallery_tbl where eg_eventdtls_fk=?");
        $stmt->bind_param('s', $r);
        $stmt->execute();
        $stmt = $db->prepare("delete from eventcomments_tbl where ec_eventdtls_fk=?");
        $stmt->bind_param('s', $r);
        $stmt->execute();
        $stmt = $db->prepare("delete from eventdtls_tbl where eventdtls_pk=?");
        $stmt->bind_param('s', $r);
        $stmt->execute();
    }
    
    if($_REQUEST['action'] == 'eventgallery_delete') {
        $r = base64_decode($_REQUEST["id"]);
        $stmt = $db->prepare("select eg_mediaurl, eg_mediatype from eventgallery_tbl where eventgallery_pk=?");
        $stmt->bind_param('s', $r);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($mediaurl, $mediatype);
        echo $db->error;
        if($stmt->num_rows > 0)
        {
            $stmt->fetch();
            if($mediatype == 'I')
            if(!empty($mediaurl) && file_exists("../events/$mediaurl"))
            {
                unlink("../events/$mediaurl");
            }
        }
        $stmt = $db->prepare("delete from eventgallery_tbl where eventgallery_pk=?");
        $stmt->bind_param('s', $r);
        $stmt->execute();
    }
    
    if($_REQUEST['action'] == 'notification') {
        $stmtimg = $db->prepare("SELECT (SELECT count(tourdtls_pk) FROM tourdtls_tbl where td_readstatus='U'), (SELECT count(shramdaandtls_Pk) from shramdaandtls_tbl where sd_readstatus='U'), (SELECT count(shrurideasdtls_pk) from shrurideasdtls_tbl where sid_readstatus='U'), (SELECT count(feedbackdtls_pk) from feedbackdtls_tbl where fbd_readstatus='U')");
        $stmtimg->execute();
        $stmtimg->store_result();
        $stmtimg->bind_result($tour, $shramdaan, $ideas, $feedback);
        $stmtimg->fetch();
        echo json_encode(array('T' => $tour, 'S' => $shramdaan, 'I' => $ideas, 'F' => $feedback, 'Tot' => $tour+$shramdaan+$ideas+$feedback));
    }
    
    if($_REQUEST['action'] == 'update_comment') {
        $pk = base64_decode($_REQUEST['pk']);
        $val = strip_tags($_REQUEST['value']);
        $stmt = $db->prepare("update eventcomments_tbl set ec_comments=? where ec_eventcomments_pk=?");
        $stmt->bind_param('ss', $val, $pk);
        $stmt->execute();
        $stmt->close();
        echo ($db->affected_rows) ? '1' : '0';
    }
    
    if($_REQUEST['action'] == 'commentaction') {
        $pk = base64_decode($_REQUEST['id']);
        $status = strip_tags($_REQUEST['status']);
        $stmt = $db->prepare("update eventcomments_tbl set ec_status=? where ec_eventcomments_pk=?");
        $stmt->bind_param('ss', $status, $pk);
        $stmt->execute();
        $stmt->close();
        if($db->affected_rows){
            if($status=='A') 
                echo '1';
            if($status=='D') 
                echo '2';
            if($status=='N') 
                echo '3';
        } else 
            echo '0';
    }
    
    /*
     * Manage Governor Profile
     */
    if($_REQUEST['action'] == 'governor_save') {
        $txtTitle = strip_tags($_REQUEST['txtTitle']);
        $filename = strip_tags($_REQUEST['mediafile']);
        $txtfDate = date('Y-m-d', strtotime(strip_tags($_REQUEST['txtfromDate'])));
        $txttDate = !empty($_REQUEST['txttoDate']) ? date('Y-m-d', strtotime(strip_tags($_REQUEST['txttoDate']))) : NULL;
        $txtDate = date('Y-m-d H:i:s');
        $current = isset($_REQUEST['chkActive']) && !empty($_REQUEST['chkActive']) ? 'Y' : 'N' ;
        $stmt = $db->prepare("INSERT INTO governormst_tbl(gm_name,gm_photo,gm_current,gm_from,gm_to,gm_createdon) VALUES(?,?,?,?,?,?)");
        $stmt->bind_param('ssssss', $txtTitle, $filename, $current, $txtfDate, $txttDate, $txtDate);
        $stmt->execute();
        $stmt->close();
        $status = ($db->affected_rows) ? '1' : '0';
        $msg = ($status=='1') ? 'Successfully Saved' : 'Server Error. Try again...';
        echo json_encode(array('status' => $status, 'msg' => $msg));
    }
    if($_REQUEST['action'] == 'governor_edit') {
        $id = base64_decode($_REQUEST["id"]);
        $stmt = $db->prepare("select gm_name, gm_photo, gm_current, gm_from, gm_to from governormst_tbl where governormst_pk=?");
        $stmt->bind_param('s', $id);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($g_name, $g_photo, $g_current, $g_fdate, $g_tdate);
        if($stmt->num_rows > 0)
        {
            $results = $stmt->fetch();
            $g_tdate = empty($g_tdate) ? '' : date('d-m-Y', strtotime($g_tdate)) ; 
            $result = array('name' => $g_name, 'current' => $g_current, 'pdf' => $g_photo, 'fdate' => date('d-m-Y', strtotime($g_fdate)), 'tdate' => $g_tdate, 'status' => '1');
        } else
            $result = array('status' => '0');
        $stmt->free_result();
        $stmt->close();
        echo json_encode($result);
    }
    if($_REQUEST['action'] == 'governor_update') {
        $txtTitle = strip_tags($_REQUEST['txtTitle']);
        $filename = strip_tags($_REQUEST['mediafile']);
        $txtfDate = date('Y-m-d', strtotime(strip_tags($_REQUEST['txtfromDate'])));
        $txttDate = !empty($_REQUEST['txttoDate']) ? date('Y-m-d', strtotime(strip_tags($_REQUEST['txttoDate']))) : NULL;
        $current = isset($_REQUEST['chkActive']) && !empty($_REQUEST['chkActive']) ? 'Y' : 'N' ;
        $pk = base64_decode($_REQUEST['pk']);
        $stmt = $db->prepare("update governormst_tbl set gm_name=?, gm_photo=?, gm_current=?, gm_from=?, gm_to=? where governormst_pk=?");
        $stmt->bind_param('ssssss', $txtTitle, $filename, $current, $txtfDate, $txttDate, $pk);
        $stmt->execute();
        $stmt->close();
        $status = ($db->affected_rows) ? '1' : '0';
        $msg = ($status=='1') ? 'Updated Successfully' : 'Server Error. Try again...';
        echo json_encode(array('status' => $status, 'msg' => $msg));
    }
    if($_REQUEST['action'] == 'governor_delete') {
        $r = base64_decode($_REQUEST["id"]);
        $stmtimg = $db->prepare("select gm_photo from governormst_tbl where governormst_pk=?");
        $stmtimg->bind_param('s', $r);
        $stmtimg->execute();
        $stmtimg->store_result();
        $stmtimg->bind_result($image);
        if($stmtimg->num_rows > 0)
        {
            $result = $stmtimg->fetch();
            if(!empty($image) && file_exists("../governor/$image"))
                unlink("../governor/$image");
        }
        $stmt = $db->prepare("delete from governormst_tbl where governormst_pk=?");
        $stmt->bind_param('s', $r);
        $stmt->execute();
    }
}
?>