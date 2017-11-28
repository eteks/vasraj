<?php
@session_start();
include_once 'admin/config.php';
include("captcha.php");
$_SESSION['captcha'] = simple_php_captcha();
if (isset($_REQUEST['id']) && !empty($_REQUEST['id'])) {
    $pk = base64_decode($_REQUEST['id']);
    $stmt = $db->prepare("select eventdtls_pk, ed_eventtitle, ed_eventdate, ed_eventdesc, ed_eventstatus, if(count(ec_eventcomments_pk)>0, count(ec_eventcomments_pk), '') from eventdtls_tbl left join eventcomments_tbl on ec_eventdtls_fk = eventdtls_pk and ec_status='A' WHERE eventdtls_pk=?");
    $stmt->bind_param('s', $pk);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $EventTitle, $EventDate, $eventdesc, $eventstatus, $comment_count);
    if ($stmt->num_rows > 0) {
        $result = $stmt->fetch();
    }
} else
    header('location: past_events.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>LG Secretariat - Lt.Governor's Profile</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><meta http-equiv="X-Frame-Options" content="deny">
        <!--meta http-equiv="X-UA-Compatible" content="IE=edge" /-->
        <meta name="description" content="">
        <meta name="author" content="">
        <link href="css/bootstrap.css" rel="stylesheet">
        <script type="text/javascript" src="js/jquery.js"></script>
        <link rel="stylesheet" type="text/css" href="js/rs-plugin/css/settings.css" media="screen" />
        <script type="text/javascript" src="js/jquery.js"></script>
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="css/type/fontello.css">
        <link rel="stylesheet"  href="css/lightslider.css"/>
        <script src="js/lightslider.js"></script> 
        <script type="text/javascript">
            $(document).ready(function() {
               $('#image-gallery').lightSlider({
                    gallery:true,
                    item:1,
                    vertical:true,
                    verticalHeight:295,
                    vThumbWidth:80,
                    thumbItem:5,
                    thumbMargin:4,
                    slideMargin:0,
                    speed:500,
                    auto:true,
                    loop:true,
                    onSliderLoad: function() {
                        $('#image-gallery').removeClass('cS-hidden');
                    }
               });
            });
        </script>
        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <link rel="icon" type="image/png" href="images/favicon-16x16.png" sizes="16x16">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800,400italic' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,800,900,400italic' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="js/form/sky-forms.css" type="text/css" media="all">
        <script type="text/javascript">
            if (top != window) {
                top.location = window.location
            }
        </script>
    </head>
    <body class="boxedlayout">
        <div class="responsive_wrapper">
            <div id="responsive-menu">
                <div class="resp-closer"><i class="txt-center icon-cancel-1 white medium lm10 tm10"></i></div>
                <div class="resp-menuheader">LG</div>
                <ul>
                    <a href="index.php"><li class="rev-toplevel"></li></a>
                    <li class="rev-sublevel"><a href="index.php" style="padding-right: 42px;">Home</a></li>
                    <li class="rev-toplevel">about</li>
                    <li class="rev-sublevel"><a href="profile.html" style="padding-right: 42px;">Lt. Governor's Profile</a></li>
                    <li class="rev-sublevel"><a href="residence.html" style="padding-right: 18px;">Lt. Governor's Residence</a></li>
                    <li class="rev-sublevel"><a href="puducherry_history.html" style="padding-right: 36px;">History of Puducherry</a></li>
                    <li class="rev-toplevel">the office</li>
                    <li class="rev-sublevel"><a href="office.html" style="padding-right:18px;">Lt. Governor's Secretariat</a></li>
                    <li class="rev-sublevel"><a href="previous_governors.html" style="padding-right: 13px;">Past Lt. Governors</a></li>
                    <li class="rev-sublevel"><a href="previous_commissioners.html" style="padding-right: 13px;">Past High Commissioners</a></li>
                    <li class="rev-sublevel"><a href="welfarefunds.html" style="padding-right: 18px;">Lt. Governor's Grants/Welfare funds</a></li>
                    <li class="rev-sublevel"><a href="act_rules.html" style="padding-right: 50px;">Act Rules</a></li>
                    <li class="rev-sublevel"><a href="recruitment.html" style="padding-right: 173px;">Recruitment</a></li>
                    <li class="rev-sublevel"><a href="gos_notification.html" style="padding-right: 19px;">GO's / Notification</a></li>
                    <li class="rev-toplevel"><a href="gallery.php" style="padding-right: 42px;">Gallery</a></li>
                    <li class="rev-toplevel"><a href="rti.html" style="padding-right: 42px;">RTI</a></li>
                    <li class="rev-toplevel"><a href="contact.html" style="padding-right: 42px;">Contact Us</a></li>
                </ul>
            </div>
        </div>
        <section class="boxed-wrapper page">
            <header class="header">
                <section class="header_wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="divide5"></div>
                            <div class="span5">
                                <div class="logoholder">
                                    <a href="index.php"><img src="images/logo.png" alt=""></a>
                                </div>
                            </div>
                            <div class="span7 rightfloat">
                                <div class="divide30">
                                    <div class="rightfloat social-div">
                                        <a href="https://www.facebook.com/LtGov.Puducherry" target="_blank"><img src="images/facebook.png" alt="" style="width:28px"/></a>
                                        <a href="https://twitter.com/lgov_puducherry" target="_blank"><img src="images/twit.png" alt="" style="width:28px"/></a>
                                        <a href="https://www.tumblr.com/blog/lgov-puducherry" target="_blank"><img src="images/tumbler.png" alt="" style="width:28px"/></a>
                                        <a href="https://www.youtube.com/c/LtGovernorPuducherry" target="_blank"><img src="images/you-tube.png" alt="" style="width:28px"/></a>
                                        <a href="https://www.instagram.com/lgov_puducherry" target="_blank"><img src="images/instagram.png" alt="" style="width:28px"/></a>
                                        &nbsp;&nbsp; <img src="images/wap.png" style="width:28px;"/> <span class="white mr5">9500560001</span>
                                        <a href="uc.html" target="_blank" class="login-btn white mr20">Login</a>
                                    </div>
                                    <div class="rightfloat">
                                        <a href="#maincontent" class="skip" id="skip">Main Content</a>
                                        <a href="javascript:void(0);" class="font-small" id="decfont">A-</a>
                                        <a href="javascript:void(0);" class="font-normal" id="norfont">A</a>
                                        <a href="javascript:void(0);" class="font-big" id="incfont">A+</a>
                                        <a href="javascript:void(0);" class="bw">B/W</a>
                                        <a href="index.php" class="reset">Reset</a>
                                        <a href="screenreader.html" class="sr mr10">Screen Reader</a>
                                    </div> 
                                </div>
                                <div id="nav" class="hidden-phone">
                                    <ul>
                                        <li><a href="index.php">Home</a></li>
                                        <li><span class="hassubmenu toplevel">About</span>
                                            <ul>
                                                <li><a href="profile.html">Lt. Governor's Profile</a></li>
                                                <li><a href="residence.html">Lt. Governor's Residence</a></li>
                                                <li><a href="puducherry_history.html">History of Puducherry</a></li>
                                            </ul>
                                        </li>
                                        <li><span class="hassubmenu toplevel">The Office</span>
                                            <ul>
                                                <li><a href="office.html">Lt. Governor's Secretariat</a></li>
                                                <li><a href="previous_governors.html">Past Lt. Governors</a></li>
                                                <li><a href="previous_commissioners.html">Past High Commissioners</a></li>
                                                <li><a href="welfarefunds.html">Lt. Governor's Grants/Welfare funds</a></li>
                                                <li><a href="act_rules.html">Act & Rules</a></li>
                                                <li><a href="recruitment.html">Recruitment</a></li>
                                                <li><a href="gos_notification.html">GO's / Notification</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="gallery.php" class="">Photo Gallery</a></li>
                                        <li><a href="rti.html" class="">RTI</a></li>
                                        <li><a href="contact.html" class="">Contact Us</a></li>
                                    </ul>
                                    <div class="clear"></div>
                                </div><!-- END OF THE #NAV CONTAINER -->
                                <div class="resp-navigator reversefadeitem"><i class="icon-menu medium gray"></i></div>
                            </div><!-- END OF NAVIGTION HOLDER -->
                        </div> <!-- END OF ROW -->
                    </div> <!-- END OF CONTAINER -->
                </section> <!-- END OF HEADER WRAPPER  -->
            </header>
            <!-- THE CONTENT -->
            <section class="maincontent" id="maincontent">
                <article class="fullwidth_img_container_small">
                    <img src="images/news.jpg" alt="" style="width:100%">
                </article>
                <div class="divide10"></div>
                <section class="container"  id="maincontentbelow">
                    <div class="row">
                        <div class="divide10"></div>
                        <div class="span12">
                            <h3 class="article-title"><?php
                                if($eventstatus == 'P') 
                                    echo 'Past Events';
                                if($eventstatus == 'S') 
                                    echo 'Swachh Puducherry Campaign';
                                if($eventstatus == 'U')
                                    echo 'Upcoming Events'; ?></h3>
                        </div>
                        <div class="divide10"></div>

                    </div>
                    <div class="row">
                        <article>
                            <div class="span12 newsroom newsdetails eventdetails">
                                <div id="newsdesp">
                                    <div class="event-gallery" style="max-width:600px;">
                                        <ul id="image-gallery" class="gallery list-unstyled cS-hidden">
                                            <?php
                                            $stmteg = $db->prepare("select eg_mediatype, eg_mediaurl from eventgallery_tbl where eg_eventdtls_fk = ? order by eventgallery_pk DESC");
                                            $stmteg->bind_param('i', $pk);
                                            $stmteg->execute();
                                            $stmteg->store_result();
                                            $stmteg->bind_result($e_mediatype, $e_media);
                                            if ($stmteg->num_rows > 0) {
                                                while ($stmteg->fetch()) { 
                                                    if($e_mediatype == 'I')
                                                        echo '<li data-thumb="./admin/events/'.$e_media.'"><img src="./admin/events/'.$e_media.'" /></li>';
                                                    else {
                                                        $e_mediaa = end(explode('=', $e_media));
                                                        $thumb_img = 'https://i1.ytimg.com/vi/'.$e_mediaa.'/0.jpg';
                                                        echo '<li data-thumb="'.$thumb_img.'">'
                                                                . '<iframe id="youTube" style="width:100%; height:350px;" src="https://www.youtube.com/embed/'.$e_mediaa.'?ecver=1" frameborder="0" allowfullscreen></iframe>'
                                                            . '</li>';
                                                    }
                                                    ?>
                                                <?php }
                                            } ?>
                                        </ul>
                                    </div>
                                    <div class="divide10"></div>
                                    <h2 class="blue-text"><?= $EventTitle; ?></h2>
                                    <div class="divide5"></div>
                                    <small><?= date('d-m-Y', strtotime($EventDate)); ?></small>
                                    <div class="divide10"></div>
                                    <div class="news-desp"><?= $eventdesc; ?></div>
                                    <div class="divide10"></div>
                                    <?php
                                        if($eventstatus == 'P') 
                                            echo '<a href="past_events.php" class="btn readmore small-more"><< Back</a>';
                                        if($eventstatus == 'S') 
                                            echo '<a href="swachhpuducherry.php" class="btn readmore small-more"><< Back</a>';
                                        if($eventstatus == 'U')
                                            echo '<a href="upcoming_events.php" class="btn readmore small-more"><< Back</a>';
                                    ?>
                                    <div class="divide10"></div>
                                    <?php
                                    if($eventstatus != 'S'){ ?>
                                    <h2 class="blue-text"><?= $comment_count; ?> Comment(s)</h2>
                                    <div class="comments-list">
                                        <ul>
                                            <?php
                                            $stmtcmt = $db->prepare("select ec_name, ec_comments, ec_date from eventcomments_tbl WHERE ec_eventdtls_fk=?  and ec_status='A' order by ec_date desc");
                                            $stmtcmt->bind_param('s', $id);
                                            $stmtcmt->execute();
                                            $stmtcmt->store_result();
                                            $stmtcmt->bind_result($p_name, $comments, $c_date);
                                        if ($stmtcmt->num_rows > 0) {
                                            while ($stmtcmt->fetch()) {
                                            ?>
                                            <li>
                                                <div class="author">
                                                    <img src="images/31.jpg"/>
                                                </div>
                                                <div class="comments">
                                                    <p class="name-details"><span><?= $p_name; ?></span></p>
                                                    <p class="date"><?= date('M d Y - h:iA', strtotime($c_date)); ?></p>
                                                    <p><?= $comments; ?></p>
                                                </div>
                                            </li>
                                            <?php }
                                        } else 
                                            echo '<li><div class="comments"><p>No Comments for this Event</p></div></li>';
                                        ?>
                                        </ul>
                                    </div>
                                    <div class="divide10"></div>
                                    <h2 class="blue-text">Leave a Reply</h2>
                                    <div class="span6 share-your-ideas" style="margin-left:0px;">
                                        <form name="shareideas" id="shareideas" class="shareideas sky-form" action="#" method="post">
                                            <label>Name</label>
                                            <input type="hidden" value="<?= $_REQUEST['id']; ?>" name="pk" />
                                            <label class="input"><input type="text" name="name" id="name" required /></label>
                                            <div class="divide10"></div>
                                            <label>Email</label>
                                            <label class="input"><input type="text" name="email" id="email" required /></label>
                                            <div class="divide10"></div>
                                            <label>Mobile</label>
                                            <label class="input"><input type="text" name="mobile" id="mobile" required /></label>
                                            <div class="divide10"></div>
                                            <label>Comments</label>
                                            <label class="input"><textarea name="comments" id="comments"></textarea></label>
                                            <div class="divide10"></div>
                                            <label>Captcha</label><img src="<?php echo $_SESSION['captcha']['image_src']; ?>" style="width:160px;" alt="CAPTCHA code">
                                            <label class="input"><input type="text" name="txtCaptcha" id="txtCaptcha" /></label>
                                            <div class="divide20"></div>
                                            <input type="submit" name="submit" value="Post Your Comment" id="submit"/>
                                            <div class="message"></div>
                                        </form>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </article>
                    </div>            
                </section>
                <div class="divide60"></div>
                <div class="referals negativehover">
                    <a href="http://presidentofindia.nic.in/" onclick="return external_alert()" target="_blank"><div class="refitem one_fifth nhitem"><img src="images/companies/1.png" alt=""></div></a>
                    <a href="http://www.pmindia.gov.in/en/" onclick="return external_alert()" target="_blank"><div class="refitem one_fifth nhitem"><img src="images/companies/2.png" alt=""></div></a>
                    <a href="http://india.gov.in/" onclick="return external_alert()" target="_blank"><div class="refitem one_fifth nhitem"><img src="images/companies/3.png" alt=""></div></a>
                    <a href="https://swachhbharat.mygov.in/" onclick="return external_alert()" target="_blank"><div class="refitem one_fifth nhitem"><img src="images/companies/6.png" alt=""></div></a>
                    <a href="http://digitalindia.gov.in/" onclick="return external_alert()" target="_blank"><div class="refitem one_fifth nhitem"><img src="images/companies/7.png" alt=""></div></a>
                    <a href="https://www.py.gov.in/" onclick="return external_alert()" target="_blank"><div class="refitem one_fifth nhitem"><img src="images/companies/4.png" alt=""></div></a>
                    <a href="http://www.karaikal.gov.in/" onclick="return external_alert()" target="_blank"><div class="refitem one_fifth nhitem"><img src="images/companies/8.png" alt=""></div></a>
                    <a href="http://mahe.gov.in/" onclick="return external_alert()" target="_blank"><div class="refitem one_fifth nhitem"><img src="images/companies/9.png" alt=""></div></a>
                    <a href="http://yanam.gov.in/" onclick="return external_alert()" target="_blank"><div class="refitem one_fifth lastcolumn nhitem"><img src="images/companies/10.png" alt=""></div></a>
                    <a href="http://tourism.pondicherry.gov.in/" onclick="return external_alert()" target="_blank"><div class="refitem one_fifth nhitem"><img src="images/companies/5.png" alt=""></div></a>
                    <div class="clear"></div>
                </div>
            </section> <!-- END OF MAIN CONTENT HERE -->
            <footer>
                <section class="subfooter">
                    <div class="container">
                        <div class="one_fifth">
                            <p class="small">Content managed by <br>
                                Governor's Office
                            </p>
                        </div>

                        <div class="one_fifth">
                            <p class="small">Hosted by <br>
                                National Informatics Centre</p>
                        </div>

                        <div class="one_third">
                            <a href="terms_of_use.html">Website Policies</a>&nbsp;&nbsp;&nbsp;
                            <a href="faq.html">FAQ</a>&nbsp;&nbsp;&nbsp;
                            <a href="site_map.html">Site Map</a></p>
                        </div>
                        <div class="one_fourth">
                            <p class="small">Page updated on
                                30/05/2016 10:10 IST</p>
                        </div>
                        <div class="clear"></div>
                    </div>
                </section>
            </footer>
        </section><!-- THE END OF THE BOXED WRAPPER -->
        <a href="#" class="scrollToTop"></a>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/jquery.overscroll.min.js"></script>
        <script type="text/javascript" src="js/jquery.themepunch.plugins.min.js"></script>
        <script type="text/javascript" src="js/jquery.themepunch.showbizpro.js"></script>
        <script type="text/javascript" src="js/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
        <script type="text/javascript" src="js/twitter.min.js"></script>
        <script type="text/javascript" src="js/jquery.jscrollpane.min.js"></script>
        <script type="text/javascript" src="js/jquery.mousewheel.js"></script>
        <script type="text/javascript" src="js/jquery.fh.portfolio.js"></script>
        <script type="text/javascript" src="js/jquery.gmap.js"></script>
        <script type="text/javascript" src="js/retina.js" ></script>
        <script type='text/javascript' src='js/mediaelement-and-player.min.js'></script>
        <script type='text/javascript' src='js/FitVids.js'></script>
        <script type="text/javascript" src="js/jquery.jribbble-0.11.0.ugly.js" ></script>
        <script type="text/javascript" src="js/jquery.dcflickr.1.0.js" ></script>
        <script src="js/form/jquery.form.min.js"></script>
        <script src="js/form/jquery.validate.min.js"></script>
        <script type="text/javascript" src="js/screen.js" ></script>
        <script type='text/javascript'>
            jQuery(document).ready(function ()
            {
                jQuery("a#skip").click(function () {
                    jQuery('html, body').animate({scrollTop: jQuery('#maincontentbelow').offset().top - 30}, 'slow');
                });
                jQuery('#incfont').click(function () {
                    curSize = parseInt(jQuery('#maincontent').css('font-size')) + 2;
                    if (curSize <= 20)
                        jQuery('body').css('font-size', curSize);
                });
                jQuery('#norfont').click(function () {
                    jQuery('body').css('font-size', '15px');
                });
                jQuery('#decfont').click(function () {
                    curSize = parseInt(jQuery('#maincontent').css('font-size')) - 2;
                    if (curSize >= 12)
                        jQuery('body').css('font-size', curSize);
                });
                jQuery(".bw").click(function () {
                    jQuery("section").css("background-color", "black");
                    jQuery("header").css("background-color", "black");
                    jQuery("footer").css("background-color", "black");
                    jQuery(".home-container").css("background-color", "black");
                    jQuery("section").css("color", "white");
                    jQuery("header").css("color", "white");
                    jQuery("footer").css("color", "white");
                    jQuery(".news-desp p").css("color", "white");
                });
                
                jQuery(".reset").click(function () {
                    location.reload();
                });
                
                jQuery("#shareideas").validate(
                {
                    rules:
                    {
                        name: {required: true},
                        email: {required: true, email: true},
                        mobile: {required: true, minlength: 10},
                        comments: {required: true, },
                        txtCaptcha: {required: true, },
                    },
                    messages:
                    {
                        name:
                        {
                            required: 'Please enter your name',
                        },
                        email:
                        {
                            required: 'Please enter your email address',
                            email: 'Please enter a VALID email address'
                        },
                        mobile:
                        {
                            required: 'Please enter your Mobile No'
                        },
                        comments:
                        {
                            required: 'Please enter your Comments'
                        },
                        txtCaptcha:
                        {
                            required: 'Please enter Captcha'
                        },
                    },
                    submitHandler: function (form)
                    {
                        $.ajax({
                            url: 'postcomments.php',
                            type: 'POST',
                            data: $('#shareideas').serialize(),
                            beforeSend: function () {
                                $('#submit').css('pointer-events', 'none');
                                $('div.message').html('<img src="images/fancybox_loading.gif" />').show();
                            },
                            success: function (data) {
                                if (data == '1')
                                {
                                    $('div.message').html('Thanks for your Comment').css({'color': '#6fb679', 'display': 'block'});
                                    $('#submit').css('pointer-events', 'all');
                                    $('#shareideas')[0].reset();
                                } else if (data == '00')
                                    $('div.message').html('Enter correct Captcha!').css({'color': 'red', 'display': 'block'});
                                else
                                    $('div.message').html('Server Not Available. Please try again later!').css({'color': 'red', 'display': 'block'});
                            }
                        });
                        return false;
                    },
                    errorPlacement: function (error, element)
                    {
                        error.insertAfter(element.parent());
                    }
                });
            });
            
            function external_alert()
            {
                var r = confirm("You are about to navigate to an external website");
                if (r == false)
                    return false;
            }
        </script>
    </body>
</html>
