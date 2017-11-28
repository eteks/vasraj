<?php include_once 'admin/config.php'; 

if(isset($_REQUEST['id']) && !empty($_REQUEST['id']))
{
    $id = base64_decode($_REQUEST['id']);
    $stmt = $db->prepare("select subcat_name from subcategory where id=?");
    $stmt->bind_param('s', $id);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($c_name);
    if ($stmt->num_rows >= 0) {
        $stmt->fetch();
    } else
        header('location: gallery.php');
} else
    header('location: gallery.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>LG Secretariat - Lt.Governor's Profile</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-Frame-Options" content="deny" />
        <!--meta http-equiv="X-UA-Compatible" content="IE=edge" /-->
        <meta name="description" content="">
        <meta name="author" content="">
        <link href="css/bootstrap.css" rel="stylesheet">
        <script type="text/javascript" src="js/jquery.js"></script>
        <link rel="stylesheet" type="text/css" href="js/rs-plugin/css/settings.css" media="screen" />
        <script type="text/javascript" src="js/jquery.js"></script>
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="css/type/fontello.css">
        <link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css">
        <link rel="stylesheet" href="css/gallery.css">
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">
        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <link rel="shortcut icon" href="assets/ico/favicon.html">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.html">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.html">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.html">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.html">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800,400italic' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,800,900,400italic' rel='stylesheet' type='text/css'>
        <script type="text/javascript">
            if(top != window) {
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
					<li class="rev-toplevel"><a href="http://lgpgrs.py.gov.in/" style="padding-right: 42px;" target="_blank">Public Grievances</a></li>
                    <li class="rev-toplevel"><a href="contact.html" style="padding-right: 42px;">Contact Us</a></li>
                </ul>
            </div>
        </div>

        <section class="boxed-wrapper page">
            <header class="header">
                <section class="header_wrapper">
                    <div class="home-container">
                        <div class="row">
                            <div class="divide5"></div>
                            <div class="span4">
                                <div class="logoholder">
                                    <a href="index.php"><img src="images/logo.png" alt=""></a>
                                </div>
                            </div>
                            <div class="span8 rightfloat">
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
                                        <a href="javascript:void(0);" class="reset">Reset</a>
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
                                                <!--li><a href="organizationchart.html">Organization Chart</a></li-->
                                                <li><a href="office.html">Lt. Governor's Secretariat</a></li>
                                                <li><a href="previous_governors.html">Past Lt. Governors</a></li>
                                                <li><a href="previous_commissioners.html">Past High Commissioners</a></li>
                                                <li><a href="welfarefunds.html">Lt. Governor's Grants/Welfare funds</a></li>
                                                <li><a href="act_rules.html">Act & Rules</a></li>
                                                <li><a href="recruitment.html">Recruitment</a></li>
                                                <li><a href="gos_notification.html">GO's / Notification</a></li>
                                                <!--li><a href="administrativesetup.html">Administrative Setup</a></li-->
                                            </ul>
                                        </li>
                                        <li><span class="hassubmenu toplevel">Gallery</span>
                                            <ul>
                                                <li><a href="gallery.php" class="">Photo Gallery</a></li>
                                                <li><a href="video.html" class="">Video Gallery</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="rti.html" class="">RTI</a></li>
                                        <li><a href="http://lgpgrs.py.gov.in/" target="_blank">Public Grievances</a></li>
                                        <li><a href="contact.html" class="">Contact Us</a></li>
                                    </ul>
                                    <div class="clear"></div>
                                </div>
                                <div class="resp-navigator reversefadeitem"><i class="icon-menu medium gray"></i></div>
                            </div><!-- END OF NAVIGTION HOLDER -->
                        </div> <!-- END OF ROW -->
                    </div> <!-- END OF CONTAINER -->
                </section> <!-- END OF HEADER WRAPPER  -->
            </header>
            <section class="maincontent" id="maincontent">
                <article class="fullwidth_img_container_small">
                    <img src="images/gallery.jpg" alt="" style="width:100%">
                </article>
                <div class="divide10"></div>
                <section class="container" id="maincontentbelow">
                    <div class="row">
                        <div class="divide10"></div>
                        <div class="span10"><h3 class="article-title">Photo Gallery - <?= $c_name; ?></h3></div>
                        <div class="span2"><h4><a href="gallerysub.php?id=<?= $_REQUEST['cid'] ;?>"><< Back to Gallery</a></h4></div>
                        <div class="divide10"></div>
                    </div>
                    <div class="row">
                        <article>
                            <div class="span12 gallery">
                                <section class="portfolio-section port-col">
                                    <div class="row">
                                        <div class="isotopeContainer">
                                            <?php
                                            $stmt = $db->prepare("select image_name, image, image_date from gallery where category_id=? ORDER BY date(image_date) DESC");
                                            $stmt->bind_param('s', $id);
                                            $stmt->execute();
                                            $stmt->store_result();
                                            $stmt->bind_result($i_name, $image, $i_date);
                                            if ($stmt->num_rows >= 0) {
                                                while ($stmt->fetch()) {
                                                    ?>          
                                                    <div class="span3 isotopeSelector">
                                                        <article class="">
                                                            <figure>
                                                                <img src="admin/gallery/<?php echo $image; ?>" alt="">
                                                                <div class="overlay-background">
                                                                    <div class="inner"></div>
                                                                </div>
                                                                <div class="overlay">
                                                                    <div class="inner-overlay">
                                                                        <div class="inner-overlay-content with-icons">
                                                                            <a title="<?php echo $i_name; ?>" class="fancybox-pop" rel="portfolio-1" href="admin/gallery/<?php echo $image; ?>"><i class="fa fa-search"></i></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </figure>
                                                            <div class="article-title"><a href="#" style="font-size:18px !important;"><?php echo $i_name; ?></a></div>
                                                            <div class="article-title"><?php echo date('d-m-Y', strtotime($i_date)); ?></div>
                                                        </article>
                                                    </div>
                                                <?php }
                                            }
                                            $stmt->free_result();
                                            $stmt->close();
                                            ?>         
                                        </div>
                                    </div>
                                </section>
                            </div>			
                        </article>
                    </div>            
                </section>
                <div class="divide60"></div>
                <div class="referals negativehover">
                    <a href="http://presidentofindia.nic.in/" target="_blank"><div class="refitem one_fifth nhitem"><img src="images/companies/1.png" alt=""></div></a>
                    <a href="http://www.pmindia.gov.in/en/" target="_blank"><div class="refitem one_fifth nhitem"><img src="images/companies/2.png" alt=""></div></a>
                    <a href="http://india.gov.in/" target="_blank"><div class="refitem one_fifth nhitem"><img src="images/companies/3.png" alt=""></div></a>
                    <a href="https://swachhbharat.mygov.in/" target="_blank"><div class="refitem one_fifth nhitem"><img src="images/companies/6.png" alt=""></div></a>
                    <a href="http://digitalindia.gov.in/" target="_blank"><div class="refitem one_fifth nhitem"><img src="images/companies/7.png" alt=""></div></a>
                    <a href="https://www.py.gov.in/" target="_blank"><div class="refitem one_fifth nhitem"><img src="images/companies/4.png" alt=""></div></a>
                    <a href="http://www.karaikal.gov.in/" target="_blank"><div class="refitem one_fifth nhitem"><img src="images/companies/8.png" alt=""></div></a>
                    <a href="http://mahe.gov.in/" target="_blank"><div class="refitem one_fifth nhitem"><img src="images/companies/9.png" alt=""></div></a>
                    <a href="http://yanam.gov.in/" target="_blank"><div class="refitem one_fifth lastcolumn nhitem"><img src="images/companies/10.png" alt=""></div></a>
                    <a href="http://tourism.pondicherry.gov.in/" target="_blank"><div class="refitem one_fifth nhitem"><img src="images/companies/5.png" alt=""></div></a>
                    <div class="clear"></div>
                </div>
            </section>
            <footer>
                <section class="subfooter">
                    <div class="container">
                        <div class="one_fifth">
                            <p class="small">Content managed by <br>Governor's Office</p>
                        </div>
                        <div class="one_fifth">
                            <p class="small">Hosted by <br>National Informatics Centre</p>
                        </div>
                        <div class="one_third">
                            <p class="small"><a href="spotlight.html">Website Policies</a>&nbsp;&nbsp;&nbsp;
                                <a href="faq.html">FAQ</a>&nbsp;&nbsp;&nbsp;
                                <a href="site_map.html">Site Map</a></p>
                        </div>
                        <div class="one_fourth">
                            <p class="small"></p>
                        </div>
                        <div class="clear"></div>
                    </div>
                </section>
            </footer>
        </section><!-- THE END OF THE BOXED WRAPPER -->
        <a href="#" class="scrollToTop"></a>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/jquery.overscroll.min.js"></script>
        <script type="text/javascript" src="js/jquery.themepunch.plugins.min.js"></script>
        <script type="text/javascript" src="js/isotope.min.js"></script>
        <script type="text/javascript" src="js/jquery.fancybox.pack.js"></script>
        <script type="text/javascript" src="js/gallery.js"></script>
        <script type="text/javascript" src="js/jquery.themepunch.showbizpro.js"></script>
        <script type="text/javascript" src="js/twitter.min.js"></script>
        <script type="text/javascript" src="js/jquery.jscrollpane.min.js"></script>
        <script type="text/javascript" src="js/jquery.mousewheel.js"></script>
        <!--<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>-->
        <script type="text/javascript" src="js/jquery.gmap.js"></script>
        <script type="text/javascript" src="js/retina.js" ></script>
        <script type='text/javascript' src='js/mediaelement-and-player.min.js'></script>
        <script type='text/javascript' src='js/FitVids.js'></script>
        <script type="text/javascript" src="js/jquery.jribbble-0.11.0.ugly.js" ></script>
        <script type="text/javascript" src="js/jquery.dcflickr.1.0.js" ></script>
        <script type="text/javascript" src="js/forms.js" ></script>
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
                });
				jQuery(".reset").click(function(){ location.reload(); });
            });

        </script>
    </body>
</html>
