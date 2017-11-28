<?php
include_once 'admin/config.php';
if(isset($_POST) && !empty($_POST))
{
    extract($_POST);
    $pagenum = !isset($pageno) ? 1 : intval($pageno);
    $slno = $pagenum;
    $i = ($slno * 10) - 9;
//    $page_limit =  ($_GET["show"] <> "" && is_numeric($_GET["show"]) ) ? intval($_GET["show"]) : 10;
    $page_limit = 10;
    $result='';
    if($media == 'news'){
        $stmtcnt = $db->prepare("select count(id) from newsroom");
        $stmtcnt->execute();
        $stmtcnt->store_result();
        $stmtcnt->bind_result($cnt);
        $stmtcnt->fetch();
        $last = ceil($cnt/$page_limit);
        if ($pagenum < 1)
            $pagenum = 1;
        elseif ($pagenum > $last)
            $pagenum = $last;
        $lower_limit = ($pagenum - 1) * $page_limit;
        $lower_limit = ($lower_limit < 0) ? 0 : $lower_limit;
        $stmt = $db->prepare("select id, n_name, n_image, n_description, ndate from newsroom ORDER BY id DESC limit {$lower_limit}, {$page_limit}");
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($id, $n_name, $n_img, $n_desp, $n_date);
        if ($stmt->num_rows > 0) {
            while ($stmt->fetch()) {
                $id = base64_encode($id);
                $new_desp = substr($n_desp, 0, 350);
                $lg_image = "<img src='admin/newsimages/$n_img'/><br />";
                ?>
                <div class="span12 newsroom">
                    <div class="span3 marginl0"><?php echo $lg_image; ?></div>
                    <div class="span9">
                        <h4 class="blue-text"><a href="newsroom_details.php?news=<?php echo $id ?>#newsdesp" class="blue-text"><?php echo $n_name; ?></a></h4>
                        <div class="divide5"></div>
                        <small><?php echo date('d-m-Y', strtotime($n_date)); ?></small>
                        <div class="divide10"></div>
                        <div class="news-desp"><?php echo $new_desp; ?></div>
                        <div class="divide10"></div>
                        <a href="newsroom_details.php?news=<?php echo $id ?>#newsdesp" class="btn readmore small-more">Read more</a>
                    </div>
                </div>
                <?php
            }
        }
        $stmt->free_result();
        $stmt->close();
    }
    if($media == 'press'){
        $stmtcnt = $db->prepare("select count(id) from rti where category=?");
        $stmtcnt->bind_param('s', $media);
        $stmtcnt->execute();
        $stmtcnt->store_result();
        $stmtcnt->bind_result($cnt);
        $stmtcnt->fetch();
        $last = ceil($cnt/$page_limit);
        if ($pagenum < 1)
            $pagenum = 1;
        elseif ($pagenum > $last)
            $pagenum = $last;
        $lower_limit = ($pagenum - 1) * $page_limit;
        $lower_limit = ($lower_limit < 0) ? 0 : $lower_limit;
        $result .= '<table align="center" cellpadding="5" cellspacing="5" style="width:90%;">'
                . '<tbody>'
                    . '<tr class="head">'
                    . '<td width="35"><span class="Para_Head_Style">Sl. No </span></td>'
                    . '<td width="333"><span class="Para_Head_Style">Title</span></td>'
                    . '</tr>';
        $stmt = $db->prepare("select rtiname, rtitext, pdf from rti where category=? ORDER BY id DESC limit {$lower_limit}, {$page_limit}");
        $stmt->bind_param('s', $media);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($r_name, $r_txt, $r_pdf);
        if ($stmt->num_rows > 0){
            while ($stmt->fetch()) {
                if(!empty($r_pdf) && file_exists('admin/rtiuploads/'.$r_pdf))
                    $href = 'admin/rtiuploads/'.$r_pdf;
                else
                    $href='#';
                $result .= '<tr><td>'.$i.'</td><td><a href="'.$href.'" style="text-decoration: none" class="Para_Footer_Style" target="_blank">'.$r_name.'<br/><small>'.$r_txt.'</a></td></tr>';
                $i++;
            }
        } else {
                $result .= '<tr><td colspan="2">No Press Release Found...</td></tr>';
        }
        $stmt->free_result();
        $stmt->close();
        $result .= '</tbody>';
        $result .= '</table>';
    }
    if($media == 'meeting'){
        $stmtcnt = $db->prepare("select count(id) from rti where category=?");
        $stmtcnt->bind_param('s', $media);
        $stmtcnt->execute();
        $stmtcnt->store_result();
        $stmtcnt->bind_result($cnt);
        $stmtcnt->fetch();
        $last = ceil($cnt/$page_limit);
        if ($pagenum < 1)
            $pagenum = 1;
        elseif ($pagenum > $last)
            $pagenum = $last;
        $lower_limit = ($pagenum - 1) * $page_limit;
        $lower_limit = ($lower_limit < 0) ? 0 : $lower_limit;
        $result .= '<table align="center" cellpadding="5" cellspacing="5" style="width:90%;">'
                . '<tbody>'
                . '<tr class="head">'
                . '<td width="35"><span class="Para_Head_Style">Sl. No </span></td>'
                . '<td width="333"><span class="Para_Head_Style">Title</span></td>'
                . '</tr>';
        $stmt6 = $db->prepare("select rtiname, rtitext, pdf from rti where category=? ORDER BY id DESC limit {$lower_limit}, {$page_limit}") or die($db->error);
        $stmt6->bind_param('s', $media);
        $stmt6->execute();
        $stmt6->store_result();
        $stmt6->bind_result($r_name, $r_txt, $r_pdf);
        if ($stmt6->num_rows > 0){
            while ($stmt6->fetch()) {
                if(!empty($r_pdf) && file_exists('admin/rtiuploads/'.$r_pdf))
                    $href = 'admin/rtiuploads/'.$r_pdf;
                else
                    $href='#';
                $result .= '<tr><td>'.$i.'</td><td><a href="'.$href.'" style="text-decoration: none" class="Para_Footer_Style" target="_blank">'.$r_name.'<br/><small>'.$r_txt.'</a></td></tr>';
                $i++;
            }
        } else {
            $result .= '<tr><td colspan="2">No Meeting Minutes Found...</td></tr>';
        }
        $stmt6->free_result();
        $stmt6->close();
        $result .= '</tbody>';
        $result .= '</table>';
    }
    if($media == 'speeches'){
        $stmtcnt = $db->prepare("select count(id) from rti where category=?");
        $stmtcnt->bind_param('s', $media);
        $stmtcnt->execute();
        $stmtcnt->store_result();
        $stmtcnt->bind_result($cnt);
        $stmtcnt->fetch();
        $last = ceil($cnt/$page_limit);
        if ($pagenum < 1)
            $pagenum = 1;
        elseif ($pagenum > $last)
            $pagenum = $last;
        $lower_limit = ($pagenum - 1) * $page_limit;
        $lower_limit = ($lower_limit < 0) ? 0 : $lower_limit;
        $result .= '<table align="center" cellpadding="5" cellspacing="5" style="width:90%;">';
        $result .= '<tbody>';
        $result .= '<tr class="head">';
        $result .= '<td width="35"><span class="Para_Head_Style">Sl. No </span></td>';
        $result .= '<td width="333"><span class="Para_Head_Style">Title</span></td>';
        $result .= '</tr>';
        $stmt = $db->prepare("select rtiname, rtitext, pdf from rti where category=? ORDER BY id DESC limit {$lower_limit}, {$page_limit}");
        $stmt->bind_param('s', $media);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($r_name, $r_txt, $r_pdf);
        if ($stmt->num_rows > 0){
            while ($stmt->fetch()) {
                if(!empty($r_pdf) && file_exists('admin/rtiuploads/'.$r_pdf))
                    $href = 'admin/rtiuploads/'.$r_pdf;
                else
                    $href = '#';
                $result .= '<tr><td>'.$i.'</td><td><a href="'.$href.'" style="text-decoration: none" class="Para_Footer_Style" target="_blank">'.$r_name.'<br/><small>'.$r_txt.'</a></td></tr>';
                $i++;
            }
        } else {
            $result .= '<tr><td colspan="2">No Speeches Found...</td></tr>';
        }
        $stmt->free_result();
        $stmt->close();
        $result .= '</tbody>';
        $result .= '</table>';
    }
    if($media == 'presentation'){
        $stmtcnt = $db->prepare("select count(id) from rti where category=?");
        $stmtcnt->bind_param('s', $media);
        $stmtcnt->execute();
        $stmtcnt->store_result();
        $stmtcnt->bind_result($cnt);
        $stmtcnt->fetch();
        $last = ceil($cnt/$page_limit);
        if ($pagenum < 1)
            $pagenum = 1;
        elseif ($pagenum > $last)
            $pagenum = $last;
        $lower_limit = ($pagenum - 1) * $page_limit;
        $lower_limit = ($lower_limit < 0) ? 0 : $lower_limit;
        $result .= '<table align="center" cellpadding="5" cellspacing="5" style="width:90%;">'
                . '<tbody>'
                . '<tr class="head">'
                . '<td width="35"><span class="Para_Head_Style">Sl. No </span></td>'
                . '<td width="333"><span class="Para_Head_Style">Title</span></td>'
                . '</tr>';
        $stmt = $db->prepare("select rtitext, pdf from rti where category=? ORDER BY id DESC limit {$lower_limit}, {$page_limit}");
        $stmt->bind_param('s', $media);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($r_txt, $r_pdf);
        if ($stmt->num_rows > 0){
            while ($stmt->fetch()) {
                if(!empty($r_pdf) && file_exists('admin/rtiuploads/'.$r_pdf))
                    $href = 'admin/rtiuploads/'.$r_pdf;
                else
                    $href='#';
                $result .= '<tr><td>'.$i.'</td><td><a href="'.$href.'" style="text-decoration: none" class="Para_Footer_Style" target="_blank">'.$r_txt.'</a></td></tr>';
                $i++;
            }
        } else {    
            $result .= '<tr><td colspan="2">No Presentations Found...</td></tr>';
        }
        $stmt->free_result();
        $stmt->close();
        $result .= '</tbody>'
                . '</table>';
    }
    if($media == 'reports'){
        $stmtcnt = $db->prepare("select count(id) from rti where category=?");
        $stmtcnt->bind_param('s', $media);
        $stmtcnt->execute();
        $stmtcnt->store_result();
        $stmtcnt->bind_result($cnt);
        $stmtcnt->fetch();
        $last = ceil($cnt/$page_limit);
        if ($pagenum < 1)
            $pagenum = 1;
        elseif ($pagenum > $last)
            $pagenum = $last;
        $lower_limit = ($pagenum - 1) * $page_limit;
        $lower_limit = ($lower_limit < 0) ? 0 : $lower_limit;
        $result .= '<table align="center" cellpadding="5" cellspacing="5" style="width:90%;">'
                . '<tbody>'
                . '<tr class="head">'
                . '<td width="35"><span class="Para_Head_Style">Sl. No </span></td>'
                . '<td width="333"><span class="Para_Head_Style">Title</span></td>'
                . '</tr>';
        $stmt = $db->prepare("select rtiname, rtitext, pdf from rti where category=? ORDER BY id DESC limit {$lower_limit}, {$page_limit}");
        $stmt->bind_param('s', $media);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($r_name, $r_txt, $r_pdf);
        if ($stmt->num_rows > 0){
            while ($stmt->fetch()) {
                if(!empty($r_pdf) && file_exists('admin/rtiuploads/'.$r_pdf))
                    $href = 'admin/rtiuploads/'.$r_pdf;
                else
                    $href='#';
                $result .= '<tr><td>'.$i.'</td><td><a href="'.$href.'" style="text-decoration: none" class="Para_Footer_Style" target="_blank">'.$r_name.'<br/><small>'.$r_txt.'</a></td></tr>';
                $i++;
            }
        } else {
            $result .= '<tr><td colspan="2">No Reports Found...</td></tr>';
        }
        $stmt->free_result();
        $stmt->close();
        $result .= '</tbody>'
                . '</table>';
    }
    if($media == 'archives'){
        $stmtcnt = $db->prepare("select count(governormst_pk) from governormst_tbl");
        $stmtcnt->execute();
        $stmtcnt->store_result();
        $stmtcnt->bind_result($cnt);
        $stmtcnt->fetch();
        $last = ceil($cnt/$page_limit);
        if ($pagenum < 1)
            $pagenum = 1;
        elseif ($pagenum > $last)
            $pagenum = $last;
        $lower_limit = ($pagenum - 1) * $page_limit;
        $lower_limit = ($lower_limit < 0) ? 0 : $lower_limit;
        
        $stmt = $db->prepare("select distinct governormst_pk, gm_name, gm_photo, gm_current, gm_from, gm_to, governormst_fk from governormst_tbl left join rti on governormst_pk = governormst_fk ORDER BY if(gm_to is NULL OR gm_to='', date(gm_from), date(gm_to)) DESC limit {$lower_limit}, {$page_limit}");
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($id, $gm_name, $gm_photo, $gm_current, $gm_from, $gm_to, $rtipk);
        $jj = 1;
        if ($stmt->num_rows > 0){
            while ($stmt->fetch()) {
                $disp = ($gm_current == 'Y') ? 'Active Governor' : date('d-m-Y', strtotime($gm_from)) .' - ' . date('d-m-Y', strtotime($gm_to));
                $img = (!empty($gm_photo) && file_exists('admin/governor/'.$gm_photo)) ? '<img src="admin/governor/'.$gm_photo.'" />' : '';
                if($jj % 2 == 1)
                    echo '<div class="span12 newsroom">';
                ?>
                    <div class="span3 marginl0"><?php echo $img; ?></div>
                    <div class="span3">
                        <h4 class="blue-text"><?php echo $gm_name; ?></h4>
                        <div class="divide5"></div>
                        <small><?= $disp; ?></small>
                        <div class="divide10"></div>
                        <?= !empty($rtipk) ? '<a href="archives-details.php?id='.base64_encode($id).'" class="btn readmore small-more">View Archives</a>' : ''; ?>
                    </div>
                    <div class="divide10"></div>
                <?php
                if($jj % 2 == 0)
                    echo '</div>';
                $jj++;
            }
        }
        $stmt->free_result();
        $stmt->close();
        $result = '';
    }
    if($media == 'archives-details'){
        $id = base64_decode($id);
        $stmtcnt = $db->prepare("select count(id) from rti where governormst_fk=?");
        $stmtcnt->bind_param('s', $id);
        $stmtcnt->execute();
        $stmtcnt->store_result();
        $stmtcnt->bind_result($cnt);
        $stmtcnt->fetch();
        $last = ceil($cnt/$page_limit);
        if ($pagenum < 1)
            $pagenum = 1;
        elseif ($pagenum > $last)
            $pagenum = $last;
        $lower_limit = ($pagenum - 1) * $page_limit;
        $lower_limit = ($lower_limit < 0) ? 0 : $lower_limit;
        $result .= '<table align="center" cellpadding="5" cellspacing="5" style="width:90%;">'
                    . '<tbody>'
                        . '<tr class="head">'
                            . '<td width="35"><span class="Para_Head_Style">Sl. No </span></td>'
                            . '<td width="300"><span class="Para_Head_Style">Title</span></td>'
                            . '<td width="30"><span class="Para_Head_Style">Date</span></td>'
                        . '</tr>';
        $query = '';
        if(isset($y) && !empty($y) && empty($m))
            $query = " and year(rti_date)='$y' ";
        if(isset($m) && !empty($m))
            $query = " and month(rti_date)='$m' and year(rti_date)='$y' ";
        $stmt = $db->prepare("select rtiname, rtitext, pdf, rti_date from rti where governormst_fk=? $query ORDER BY rti_date DESC limit {$lower_limit}, {$page_limit}");
        $stmt->bind_param('s', $id);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($r_name, $r_txt, $r_pdf, $rti_date);
        if ($stmt->num_rows > 0){
            while ($stmt->fetch()) {
                if(!empty($r_pdf) && file_exists('admin/rtiuploads/'.$r_pdf))
                    $href = 'admin/rtiuploads/'.$r_pdf;
                else
                    $href='#';
                $rtidate = !empty($rti_date) ? date('d-m-Y', strtotime($rti_date)) : '-';
                $result .= '<tr><td>'.$i.'</td><td><a href="'.$href.'" style="text-decoration: none" class="Para_Footer_Style" target="_blank">'.$r_name.'<br/><small>'.$r_txt.'</small></a></td><td>'.$rtidate.'</td></tr>';
                $i++;
            }
        } else {
            $result .= '<tr><td colspan="2">No Archives Found...</td></tr>';
        }
        $stmt->free_result();
        $stmt->close();
        $result .= '</tbody>'
                . '</table>';
    }
    echo $result;
    if($cnt>10)
    {
    ?>
    <div class="height30"></div>
    <table width="100%" border="0" cellspacing="0" cellpadding="2"  align="center">
        <tr>
            <td valign="top" align="left"></td>
            <td valign="top" align="center" >
            <?php
            if ( ($pagenum-1) > 0) { ?>	
                <a href="javascript:void(0);" class="links" onclick="displayRecords('<?php echo 1; ?>');">First</a>
                <a href="javascript:void(0);" class="links"  onclick="displayRecords('<?php echo $pagenum-1; ?>');">Previous</a>
            <?php }
            for($i=1; $i<=$last; $i++) {
                if ($i == $pagenum ) { ?>
                    <a href="javascript:void(0);" class="selected" ><?php echo $i ?></a>
        <?php } else { ?>
                    <a href="javascript:void(0);" class="links"  onclick="displayRecords('<?php echo $i; ?>');" ><?php echo $i ?></a>
        <?php }
        }
        if ( ($pagenum+1) <= $last) { ?>
            <a href="javascript:void(0);" onclick="displayRecords('<?php echo $pagenum+1; ?>');" class="links">Next</a>
        <?php } if ( ($pagenum) != $last) { ?>	
            <a href="javascript:void(0);" onclick="displayRecords('<?php echo $last; ?>');" class="links" >Last</a> 
        <?php } ?>
            </td>
            <td align="right" valign="top">
            Page <?php echo $pagenum; ?> of <?php echo $last; ?>
            </td>
        </tr>
    </table>
<?php
    }
}
?>