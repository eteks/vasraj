<?php include_once 'admin/config.php'; ?>
<!DOCTYPE html>
<html lang="en">
    <head>

        <title>LG Secretariat - Lt.Governor's Profile</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <!--meta http-equiv="X-UA-Compatible" content="IE=edge" /-->

        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Le styles -->
        <link href="css/bootstrap.css" rel="stylesheet">
        <!-- get jQuery from the google apis -->
        <script type="text/javascript" src="js/jquery.js"></script>

        <!-- REVOLUTION SLIDER STYLE SETTINGS-->
        <link rel="stylesheet" type="text/css" href="js/rs-plugin/css/settings.css" media="screen" />


        <!-- get jQuery from the google apis -->
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.js"></script>

        <!-- THE FANYCYBOX ASSETS -->
        <!--<link rel="stylesheet" href="megafolio/fancybox/jquery.fancybox.css?v=2.1.3" type="text/css" media="screen" />-->

        <!-- MEGAFOLIO STYLE SETTINGS-->
        <!--<link href="megafolio/css/settings.css" rel="stylesheet" type="text/css">-->

        <!-- Modifications of StyleSheet  -->
        <link href="css/style.css" rel="stylesheet" type="text/css">

        <!-- THE ICON FONTS -->
        <link rel="stylesheet" href="css/type/fontello.css">

        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->


        <!-- Le fav and touch icons -->
        <link rel="icon" type="image/png" href="images/favicon-16x16.png" sizes="16x16">

        <!-- LOAD THE GOOGLE FONT -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800,400italic' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,800,900,400italic' rel='stylesheet' type='text/css'>

        <link href="css/jstree/style.css" rel="stylesheet" type="text/css" />

    </head>


    <!-- ADD class="boxedlayout" IN CASE THE SITE SHOULD BE BOXED -->
    <body class="boxedlayout">
        <!-- THIS IS THE WRAPPER FOR THE FULL TEMPLAGE -->
        <div class="responsive_wrapper">
            <div id="responsive-menu">
                <div class="resp-closer"><i class="txt-center icon-cancel-1 white medium lm10 tm10"></i></div>
                <div class="resp-menuheader">LG</div>
                <ul>
                </ul>
            </div>
        </div>

        <section class="boxed-wrapper page">

            <!-- THE STICKY MENU AT THE TOP  -->
            <header class="header">
                <!-- THE HEADER WRAP -->
                <section class="header_wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="divide5"></div>
                            <!-- THE LOGO HOLDER -->
                            <div class="span5">
                                <div class="logoholder">
                                    <a href="index.html"><img src="images/logo.png" alt=""></a>
                                </div>
                            </div>
                            <!-- END OF LOGO HOLDER -->

                            <!-- THE NAVIGATION HOLDER -->
                            <div class="span7 rightfloat">
                                <div class="divide30">
                                    <div class="rightfloat social-div">
                                        <a href="https://www.facebook.com/LtGov.Puducherry" target="_blank"><img src="images/facebook.png" alt="" style="width:28px"/></a>
                                        <a href="https://twitter.com/lgov_puducherry" target="_blank"><img src="images/twit.png" alt="" style="width:28px"/></a>
                                        <a href="https://www.tumblr.com/blog/lgov-puducherry" target="_blank"><img src="images/tumbler.png" alt="" style="width:28px"/></a>
                                        <a href="https://www.youtube.com/c/LtGovernorPuducherry" target="_blank"><img src="images/you-tube.png" alt="" style="width:28px"/></a>
                                        <a href="https://www.instagram.com/lgov_puducherry" target="_blank"><img src="images/instagram.png" alt="" style="width:28px"/></a>
                                        &nbsp;&nbsp;&nbsp;&nbsp; <img src="images/wap.png" style="width:28px;"/> <span class="white mr20">9500560001</span>
                                    </div>
                                    <div class="rightfloat">
                                        <a href="#maincontent" class="skip" id="skip">Skip to Main Content</a>
                                        <a href="javascript:void(0);" class="font-small" id="decfont">A-</a>
                                        <a href="javascript:void(0);" class="font-normal" id="norfont">A</a>
                                        <a href="javascript:void(0);" class="font-big" id="incfont">A+</a><a href="screenreader.html" class="sr">SCREENREADER</a>
                                        <!--form id="searchallform" name="searchallform">
                                                <div class="search-div">
                                                        <span><input type="text" name="searchall" id="searchall"/></span>
                                                        <span><input type="submit" name="searchallbtn" id="searchallbtn" value=""/></span>
                                                </div>
                                        </form-->
                                    </div> 
                                </div>
                                <div id="nav" class="hidden-phone">
                                    <ul>
                                        <li><a href="index.html">Home</a></li>


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
                                                <li><a href="previous_commissioners.html">Past Chief Commissioners</a></li>
                                                <li><a href="welfarefunds.html">Lt. Governor's Grants/Welfare funds</a></li>
                                                <li><a href="act_rules.html">Act & Rules</a></li>
                                                <li><a href="recruitment.html">Recruitment</a></li>
                                                <li><a href="gos_notification.html">G.O.S / Notification</a></li>
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
                <!-- HORIZONTAL DIVIDER WITH ICON AND TEXT -->


                <article class="fullwidth_img_container_small">
                    <img src="images/news.jpg" alt="" style="width:100%">
                </article>

                <div class="divide10"></div>

                <!-- 7 to 5 ROW -->
                <section class="container"  id="maincontentbelow">
                    <div class="row">
                        <div class="divide10"></div>
                        <div class="span12">
                            <h3 class="article-title">Archives</h3>
                        </div>
                        <div class="divide5"></div>
                        <div class="span12">
                            <ul class="newroomlist">
                                <li><a href="newsroom.php"><img src='images/news.png' style="width:32px;"/> News Stream</a></li>
                                <li><a href="press.php"><img src='images/press-releas.png' style="width:32px;"/> Press Release</a></li>
                                <li><a href="meeting.php"><img src='images/meeting.png' style="width:32px;"/> Meeting minutes</a></li>
                                <li><a href="speechs.php"><img src='images/speechs.png' style="width:32px;"/> Speeches</a></li>
                                <li><a href="presentations.php"><img src='images/presentations.png' style="width:32px;"/> Presentations</a></li>
                                <li><a href="reports.php"><img src='images/reports.png' style="width:32px;"/> Reports</a></li>
                                <li><a href="javacsript:void(0);" class="active"><img src='images/archive.png' style="width:32px;"/> Archives</a></li>
                            </ul>
                        </div>
                        <div class="span12">
                            <h4 class="article-title" style="font-size:22px;">Archives</h4>
                        </div>
                    </div>
                    <div class="row">
                        <article>
                            <div class="span8">
                                <div class="rti-table" id="archives">
                                    
                                </div>
                                <div class="loader"></div>
                            </div>

                            <div class="span4">
                                <div class="gray-boxed leftfloat row-fluid">
                                    <h4>Archives Tree View &nbsp;&nbsp;&nbsp;<a href="javascript:void(0)" id="reset-tree"><img src="./images/reset.png" width="16px;" title="Reset" /></a></h4>
                                    <div id="basicTree" data-month="" data-year="">
                                        <?php
                                        $govpk = base64_decode($_REQUEST['id']);
                                        $stmt = $db->prepare("select id, rti_date from rti where governormst_fk=? and category='archives' GROUP BY YEAR(rti_date) order by YEAR(rti_date) desc");
                                        $stmt->bind_param('s', $govpk);
                                        $stmt->execute();
                                        $stmt->store_result();
                                        $stmt->bind_result($archpk1, $arch_date1);
                                        if($stmt->num_rows > 0) {
                                            $FetChedYear = '';
                                            $lable = "";
                                            while ($stmt->fetch()) {
                                            $time = strtotime($arch_date1);
                                            $FetChedYear = date("Y", $time);
                                            $stmtcnt = $db->prepare("select count(id) from rti where governormst_fk=? and category='archives' and YEAR(rti_date)='$FetChedYear'");
                                            $stmtcnt->bind_param('s', $govpk);
                                            $stmtcnt->execute();
                                            $stmtcnt->store_result();
                                            $stmtcnt->bind_result($NewsYearCount);
                                            $stmtcnt->fetch();
                                            $lable = "<span for='2016' data-type='N' data-month='' data-year='$FetChedYear' data-Ycnt='$NewsYearCount' > {$FetChedYear} ($NewsYearCount)</span>";
                                            ?>
                                            <ul>
                                                <li data-jstree='{"opened":true}'><?php echo $lable ?>
                                                    <ul>
                                                        <?php
                                                        $stmtmonth = $db->prepare("select id, rti_date from rti where governormst_fk=? and category='archives' AND YEAR(rti_date)='$FetChedYear' GROUP BY MONTH(rti_date) order by MONTH(rti_date) ASC");
                                                        $stmtmonth->bind_param('s', $govpk);
                                                        $stmtmonth->execute();
                                                        $stmtmonth->store_result();
                                                        $stmtmonth->bind_result($archpk2, $arch_date2);
                                                        $month = '';
                                                        while($stmtmonth->fetch()) {
                                                            $FetChedMonth = "";
                                                            $time = strtotime($arch_date2);
                                                            $FetChedMonth = date("M", $time);
                                                            $FetChedMonth1 = date("m", $time);
                                                            $stmtmonthcnt = $db->prepare("select count(id) from rti where governormst_fk=? and category='archives' AND (YEAR(rti_date)='$FetChedYear' AND MONTH(rti_date)='$FetChedMonth1')");
                                                            $stmtmonthcnt->bind_param('s', $govpk);
                                                            $stmtmonthcnt->execute();
                                                            $stmtmonthcnt->store_result();
                                                            $stmtmonthcnt->bind_result($NewsMonthCount);
                                                            $stmtmonthcnt->fetch();
                                                            $month.="<li data-jstree='{\"icon\":\"md md-my-library-books\"}' data-type='N'><span data-month='$FetChedMonth1' data-year='$FetChedYear'>$FetChedMonth ($NewsMonthCount)</span></li>";
                                                        }
                                                        echo $month;
                                                        ?>
                                                    </ul>
                                                </li>
                                            </ul>
                                            <?php }
                                            } ?>
                                    </div>

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
                                State Data Center,Puducherry</p>
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
        <!-- javascript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->

        <!-- Load the Bootstrap JS files -->
        <script type="text/javascript" src="js/bootstrap.min.js"></script>

        <!-- Swipe Function on the 2nd Gallery in Home.html -->
        <script type="text/javascript" src="js/jquery.overscroll.min.js"></script>

        <!-- Basic ThemePunch Plugin Helpers -->
        <script type="text/javascript" src="js/jquery.themepunch.plugins.min.js"></script>

        <!-- INCLUDE THE MEGAFOLIO BANNER -->
        <!--<script type="text/javascript" src="megafolio/js/jquery.themepunch.megafoliopro.js"></script>-->

        <!-- FANCYBOX FOR MEGAFOLIO -->
        <!--	<script type="text/javascript" src="megafolio/fancybox/jquery.fancybox.pack.js?v=2.1.3"></script>-->

        <!-- Optionally add helpers - button, thumbnail and/or media ONLY FOR ADVANCED USAGE-->
        <!--	<script type="text/javascript" src="megafolio/fancybox/helpers/jquery.fancybox-media.js?v=1.0.5"></script>-->

        <!-- INCLUDE THE SHOWBIZ SCRIPT HERE -->
        <script type="text/javascript" src="js/jquery.themepunch.showbizpro.js"></script>

        <!-- INCLUDE THE REVOLUTION SLIDER -->
        <script type="text/javascript" src="js/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

        <!-- TWITTER INCLUDS -->
        <script type="text/javascript" src="js/twitter.min.js"></script>

        <!-- SCROLLPLANE IMPORT -->
        <script type="text/javascript" src="js/jquery.jscrollpane.min.js"></script>

        <!-- the mousewheel plugin - optional to provide mousewheel support -->
        <script type="text/javascript" src="js/jquery.mousewheel.js"></script>

        <script type="text/javascript" src="js/jquery.fh.portfolio.js"></script>

        <!-- GOOGLE MAP -->
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
        <script type="text/javascript" src="js/jquery.gmap.js"></script>

        <!-- RETINA READY FUNCTIONS IN HTML DOCUMENTS -->
        <script type="text/javascript" src="js/retina.js" ></script>

        <!-- MEDIA RESIZERS -->
        <script type='text/javascript' src='js/mediaelement-and-player.min.js'></script>
        <script type='text/javascript' src='js/FitVids.js'></script>

        <!-- SOCIAL HELPERS -->
        <script type="text/javascript" src="js/jquery.jribbble-0.11.0.ugly.js" ></script>
        <script type="text/javascript" src="js/jquery.dcflickr.1.0.js" ></script>

        <!-- FORMS FOR CONTACT -->
        <script type="text/javascript" src="js/forms.js" ></script>

        <!-- MAIN FUNCTIONS FOR THEME -->
        <script type="text/javascript" src="js/screen.js" ></script>

        <script src="js/jstree/jstree.min.js"></script>
        <script src="js/jstree/jquery.tree.js"></script>

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
                
                jQuery('#reset-tree').on('click', function(){
                    $('#basicTree').attr('data-year', '');
                    $('#basicTree').attr('data-month', '');
                    displayRecords(1);
                });
                jQuery('a.jstree-anchor').on('click', function(){
                    $('#basicTree').attr('data-year', $(this).find('span').attr('data-year'));
                    $('#basicTree').attr('data-month', $(this).find('span').attr('data-month'));
                    displayRecords(1);
                });
                displayRecords(1);
            });

            function external_alert()
            {
                var r = confirm("You are about to navigate to an external website");
                if (r == false)
                {
                    return false;
                }
            }
            
            function displayRecords(pageNum) {
                var datayear = $('#basicTree').attr('data-year');
                var datamonth = $('#basicTree').attr('data-month');
                $.ajax({
                    type: "POST",
                    url: "mediacenter.php",
                    data: "media=archives-details&pageno=" + pageNum + '&id=<?= $_REQUEST['id']?>&m='+datamonth+'&y='+datayear,
                    cache: false,
                    beforeSend: function() {
                        $('.loader').html('<img src="images/fancybox_loading@2x.gif" alt="" width="48" height="48" style="padding-left: 400px; margin-top:10px;" >');
                    },
                    success: function(html) {
                        $("#archives").html(html);
                        $('.loader').html('');
                    }
                });
            }
        </script>
		<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-97471949-1', 'auto');
  ga('send', 'pageview');

</script>
    </body>
</html>

