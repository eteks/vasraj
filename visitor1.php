<?php
@session_start();
include("captcha.php");
$_SESSION['captcha'] = simple_php_captcha();
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

        <!-- Le styles -->
        <link href="css/bootstrap.css" rel="stylesheet">
        <!-- get jQuery from the google apis -->
        <script type="text/javascript" src="js/jquery.js"></script>

        <!-- REVOLUTION SLIDER STYLE SETTINGS-->
        <link rel="stylesheet" type="text/css" href="js/rs-plugin/css/settings.css" media="screen" />


        <!-- get jQuery from the google apis -->
        <script type="text/javascript" src="js/jquery.js"></script>

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
        <link rel="stylesheet" href="js/form/sky-forms.css" type="text/css" media="all">

        <!-- LOAD THE GOOGLE FONT -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800,400italic' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,800,900,400italic' rel='stylesheet' type='text/css'>
        <script type="text/javascript">
            if(top != window) {
                top.location = window.location
            }
        </script>
    </head>


    <!-- ADD class="boxedlayout" IN CASE THE SITE SHOULD BE BOXED -->
    <body class="boxedlayout">
        <!-- THIS IS THE WRAPPER FOR THE FULL TEMPLAGE -->
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
                    <li class="rev-toplevel">Gallery</li>
                    <li class="rev-toplevel"><a href="gallery.php" style="padding-right: 42px;">Photo Gallery</a></li>
					<li class="rev-toplevel"><a href="video.html" style="padding-right: 42px;">Video Gallery</a></li>
                    <li class="rev-toplevel"><a href="rti.html" style="padding-right: 42px;">RTI</a></li>
					<li class="rev-toplevel"><a href="http://lgpgrs.py.gov.in/" style="padding-right: 42px;" target="_blank">Public Grievances</a></li>
                    <li class="rev-toplevel"><a href="contact.html" style="padding-right: 42px;">Contact Us</a></li>
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
                            <div class="span4">
                                <div class="logoholder">
                                    <a href="index.php"><img src="images/logo.png" alt=""></a>
                                </div>
                            </div>
                            <!-- END OF LOGO HOLDER -->

                            <!-- THE NAVIGATION HOLDER -->
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
                    <img src="images/raj-nivas-visit.jpg" alt="" style="width:100%">
                </article>

                <div class="divide10"></div>

                <!-- 7 to 5 ROW -->
                <section class="container" id="maincontentbelow">
                    <div class="row">
                        <div class="divide10"></div>
                        <div class="span12">
                            <h3 class="article-title">Raj Nivas Visitor Form</h3>
                        </div>
                        <div class="divide5"></div>
                    </div>
                    <div class="row">
                        <article>
                            <div class="span6 share-your-ideas" >
                                <form name="shareideas" id="shareideas" class="shareideas sky-form" action="#" method="POST">
                                    <label>Group Type <span style="color:red;">*</span></label>
                                    <label class="input" style="display: inline-block; float:left;width:100%;">
                                        <div style="display: inline-block; float:left;width:50%;"><input type="radio" name="radGroup" value="Individual" class="radio" style="display:inline;" /> Individual &nbsp; </div>
                                        <div style="display: inline-block; float:right;width:50%;"><input type="radio" name="radGroup" value="Small Group(Max 5)" class="radio" style="display:inline;" /> Small Group(Max 5)</div>
                                    </label>
                                    <div class="divide10"></div>
                                    <label>Date of Visit:</label>
                                    <label class="input"><input type="date" name="txtdov" id="txtdov"/></label>
                                    <div class="divide10"></div>
                                    <div>
                                        <div style="display: inline-block; float:left;width:50%">
                                            Number of Adults <br />
                                            <input type="text" name="txtnoadult" id="txtnoadult" style=" width:80%;" />
                                        </div>
                                        <div style="display: inline-block; float:right;width:50%;">
                                            Number of Children <br />
                                            <input type="text" name="txtnochild" id="txtnochild" style=" width:80%;" />
                                        </div>
                                    </div><br /><br /><br />
                                    <div class="divide10"></div>
                                    <label>Visitor's Name <span style="color:red;">*</span></label>
                                    <label class="input"><input type="text" name="name" id="name"/></label>
                                    <div class="divide10"></div>
                                    <label>Gender</label>
                                    <label class="input">
                                        <select name="cmbGender"><option value="Male">Male</option><option value="Female">Female</option></select>
                                    </label>
                                    <div class="divide10"></div>
                                    <label>Nationality</label>
                                    <label class="input" style="display: inline-block; float:left;width:100%;">
                                        <div style="display: inline-block; float:left;width:30%;"><input type="radio" name="radNationality" class="radio" value="Indian" style="display:inline;" /> Indian &nbsp; </div>
                                        <div style="display: inline-block; float:left;width:30%;"><input type="radio" class="radio" name="radNationality" value="Other" style="display:inline;" /> Other</div>
                                    </label>
                                    <div class="divide10"></div>
                                    <label>Date of Birth</label>
                                    <label class="input"><input type="date" name="txtdob" id="txtdob"/></label>
                                    <div class="divide10"></div>
                                    <label>Address<span style="color:red;">*</span></label>
                                    <label class="input"><textarea rows="2" name="address" id="address"></textarea></label>
                                    <div class="divide10"></div>
                                    <label>Mobile No <span style="color:red;">*</span></label>
                                    <label class="input"><input type="text" name="mobile" id="mobile"/></label>
                                    <div class="divide10"></div>
                                    <label>Email ID<span style="color:red;">*</span></label>
                                    <label class="input"><input type="text" name="email" id="email"/></label>
                                    <div class="divide10"></div>
                                    <label>State<span style="color:red;">*</span></label>
                                    <label class="input"><input type="text" name="txtstate" id="txtstate"/></label>
                                    <div class="divide10"></div>
                                    <label>ID Type<span style="color:red;">*</span></label>
                                    <label class="input">
                                        <input type="radio" name="radID" class="radio" value="Driving License" style="display:inline;" /> Driving License 
                                        <input type="radio" class="radio" name="radID" value="Passport" style="display:inline;" /> Passport
                                        <input type="radio" class="radio" name="radID" value="PAN Card" style="display:inline;" /> PAN Card
                                        <input type="radio" class="radio" name="radID" value="Voter ID-Card" style="display:inline;" /> Voter ID-Card
                                        <input type="radio" class="radio" name="radID" value="Govt.Issued ID-Card" style="display:inline;" /> Govt.Issued ID-Card
                                        <input type="radio" class="radio" name="radID" value="Student ID-Card" style="display:inline;" /> Student ID-Card
                                        <input type="radio" class="radio" name="radID" value="Bank Passbook" style="display:inline;" /> Bank Passbook
                                        <input type="radio" class="radio" name="radID" value="Others" style="display:inline;" /> Others
                                    </label>
                                    <div class="divide10"></div>
                                    <label>ID Number<span style="color:red;">*</span></label>
                                    <label class="input"><input type="text" name="txtIDNo" id="txtIDNo" /></label>
                                    <div class="divide10"></div>
                                    <label>If you are an individual visitor, please enter Not Applicable in the fields below</label>
                                    <label class="input"><input type="text" name="txtIndividual" id="txtIndividual" /></label>
                                    <div class="divide10"></div>
                                    <label>1. Accompanied Person’s Name</label>
                                    <label class="input"><input type="text" name="txtperson1" id="txtperson1" /></label>
                                    <div class="divide10"></div>
                                    <label>2. Accompanied Person’s Name</label>
                                    <label class="input"><input type="text" name="txtperson2" id="txtperson2" /></label>
                                    <div class="divide10"></div>
                                    <label>3. Accompanied Person’s Name</label>
                                    <label class="input"><input type="text" name="txtperson3" id="txtperson3" /></label>
                                    <div class="divide10"></div>
                                    <label>4. Accompanied Person’s Name</label>
                                    <label class="input"><input type="text" name="txtperson4" id="txtperson4" /></label>
                                    <div class="divide10"></div>
                                    <label style="color:red; font-size: 12px;"><b>NOTE:</b> All Visitors accompanying the applicant MUST carry original Government issued ID proof as listed in the Instructions.</label>
                                    <div class="divide10"></div>
                                    
                                    <label>Captcha</label><img src="<?php echo $_SESSION['captcha']['image_src']; ?>" alt="CAPTCHA code">
                                    <label class="input"><input type="text" name="txtCaptcha" id="txtCaptcha" /></label>
                                    <div class="divide10"></div>
                                    <input type="submit" name="submit" value="Submit" id="submit"/>
                                    <div class="message"></div>
                                </form>
                            </div>
							
                            <div class="span6"><div class="clear"></div>
                                <h4 class="article-title" style="font-size: 25px; margin-top:10px;">Instructions</h4>
                                <ul style="font-size: 15px;list-style-type: disc;">
                                    <li>Visitors' Hour is from 12 p.m. to 1.30 p.m. - Monday to Saturday</li>
                                    <li>Online Registration is Mandatory</li>
                                    <li>Children below 5 years are not allowed</li>
                                    <li>Online booking is subject to confirmation through email / sms.</li>
                                    <li>All visitors are required to carry original Government Issued Photo ID cards.</li>
                                    <li>Foreign visitors should carry their original passports.</li>

                                    <li>For security reasons, Lieutenant Governor's Secretariat reserves the right to approve / regret the permission to visit Raj Nivas</li>
                                    <li>The permission to visit Raj Nivas is subject to cancellation, if circumstances render it necessary.</li>
                                    <li>For groups of more than 5 persons, please send complete group details via email for processing of request to chhrajnivas.py@gov.in</li>
                                    <li>For any query and assistance related to the visit, please contact the  Helpdesk: +91 413 2334050 </li>
                                </ul>
                                <div class="divide10"></div>
                                <h4 class="article-title" style="font-size: 25px;">Security Instructions:</h4>
                                <ul style="font-size: 15px;list-style-type: disc;">
                                    <li>Each visitor shall carry their Original Photo ID on the tour.</li>
                                    <li>Bags, Mobiles and Eatables are strictly not allowed on the Guided Tour.</li>
                                    <li>Rights of Admission are reserved and could be regretted at any time.</li>
                                </ul>
                            </div>
                        </article>
                    </div>            
                </section>
                <div class="divide60"></div>
                <div class="referals negativehover">
                    <a href="http://presidentofindia.nic.in/" onClick="return external_alert()" target="_blank"><div class="refitem one_fifth nhitem"><img src="images/companies/1.png" alt=""></div></a>
                    <a href="http://www.pmindia.gov.in/en/" onClick="return external_alert()" target="_blank"><div class="refitem one_fifth nhitem"><img src="images/companies/2.png" alt=""></div></a>
                    <a href="http://india.gov.in/" onClick="return external_alert()" target="_blank"><div class="refitem one_fifth nhitem"><img src="images/companies/3.png" alt=""></div></a>
                    <a href="https://swachhbharat.mygov.in/" onClick="return external_alert()" target="_blank"><div class="refitem one_fifth nhitem"><img src="images/companies/6.png" alt=""></div></a>
                    <a href="http://digitalindia.gov.in/" onClick="return external_alert()" target="_blank"><div class="refitem one_fifth nhitem"><img src="images/companies/7.png" alt=""></div></a>
                    <a href="https://www.py.gov.in/" onClick="return external_alert()" target="_blank"><div class="refitem one_fifth nhitem"><img src="images/companies/4.png" alt=""></div></a>
                    <a href="http://www.karaikal.gov.in/" onClick="return external_alert()" target="_blank"><div class="refitem one_fifth nhitem"><img src="images/companies/8.png" alt=""></div></a>
                    <a href="http://mahe.gov.in/" onClick="return external_alert()" target="_blank"><div class="refitem one_fifth nhitem"><img src="images/companies/9.png" alt=""></div></a>
                    <a href="http://yanam.gov.in/" onClick="return external_alert()" target="_blank"><div class="refitem one_fifth lastcolumn nhitem"><img src="images/companies/10.png" alt=""></div></a>
                    <a href="http://tourism.pondicherry.gov.in/" onClick="return external_alert()" target="_blank"><div class="refitem one_fifth nhitem"><img src="images/companies/5.png" alt=""></div></a>
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
                            <p class="small"></p>
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
        <!--<script type="text/javascript" src="js/retina.js" ></script>-->

        <!-- MEDIA RESIZERS -->
        <script type='text/javascript' src='js/mediaelement-and-player.min.js'></script>
        <script type='text/javascript' src='js/FitVids.js'></script>

        <!-- SOCIAL HELPERS -->
        <script type="text/javascript" src="js/jquery.jribbble-0.11.0.ugly.js" ></script>
        <script type="text/javascript" src="js/jquery.dcflickr.1.0.js" ></script>

        <!-- FORMS FOR CONTACT -->
        <script src="js/form/jquery.form.min.js"></script>
        <script src="js/form/jquery.validate.min.js"></script>

        <!-- MAIN FUNCTIONS FOR THEME -->
        <script type="text/javascript" src="js/screen.js" ></script>

        <script type='text/javascript'>
            jQuery(document).ready(function ()
            {
                jQuery("a#skip").click(function () {
                    jQuery('html, body').animate({scrollTop: jQuery('#maincontentbelow').offset().top - 10}, 'slow');
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
                $("#shareideas").validate(
                {
                    rules:
                    {
                        name:{required: true},
                        address:{required: true},
                        mobile:{required: true,minlength: 10},
                        email:{required: true,email: true},
                        txtstate:{required: true,},
                        txtIDNo:{required: true,},
                        txtCaptcha:{required: true,},
                    },
                    messages:
                    {
                        txtIDNo:
                        {
                            required: 'Please enter ID Number',
                        },
                        txtstate:
                        {
                            required: 'Please enter your State',
                        },
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
                        txtCaptcha:
                        {
                            required: 'Please enter Captcha'
                        },
                    },
                    submitHandler: function (form)
                    {
                        $.ajax({
                            url : 'visitormmail.php',
                            type : 'POST',
                            data : $('#shareideas').serialize(),
                            success : function(data) {
                                if(data=='1')
                                {
                                    $('div.message').html('Your message was successfully sent!').css({'color':'#6fb679', 'display':'block'});
                                    $(form).reset();
                                }
                                else if(data=='00')
                                    $('div.message').html('Enter correct Captcha!').css({'color':'red', 'display':'block'});
                                else
                                    $('div.message').html('Server Not Available. Please try again later!').css({'color':'red', 'display':'block'});
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
        </script>
        <script type="text/javascript">
            function external_alert()
            {
                var r = confirm("You are about to navigate to an external website");
                if (r == false)
                {
                    return false;
                }
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
