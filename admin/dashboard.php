<?php require_once('authenticate.php'); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="assets/images/favicon_1.ico">

        <title>Raj Nivas - Admin Dashboard</title>

        <!--Morris Chart CSS -->
        <link rel="stylesheet" href="assets/plugins/morris/morris.css">
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
        <div id="wrapper">
            <?php include'includes/header.php' ?>
            <?php include'includes/left_menu.php' ?>
            <div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="page-title">Dashboard</h4>
                                <p class="text-muted page-title-alt">Welcome to Rajnivas Admin Panel !</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="page-header  header-title">Media Center</h4>
                            </div>
                        </div>
                        <div class="row">
                            <?php
                                $stmtmc = $db->prepare("select case when category='press' then 'Press Release' when category='meeting' then 'Meeting Minutes' when category='speeches' then 'Speeches' when category='presentation' then 'Presentation' when category='reports' then 'Reports' when category='archives' then 'Archives' end, count(id) from rti group by category");
                                $stmtmc->execute();
                                $stmtmc->store_result();
                                $stmtmc->bind_result($category, $mccnt);
                                if ($stmtmc->num_rows > 0) {
                                    while ($stmtmc->fetch()) { ?>
                                        <div class="col-sm-6 col-md-6 col-lg-2">
                                            <div class="widget-bg-color-icon card-box">
                                                <div class="text-right">
                                                    <h3 class="text-dark"><b data-plugin="counterup"><?= $mccnt; ?></b></h3>
                                                    <p class="text-muted"><?= strtoupper($category); ?></p>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                            <?php }
                                }
                                $stmtmc->free_result();
                                $stmtmc->close();
                            ?>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="col-sm-12">
                                    <h4 class="page-header  header-title">Swachh Puducherry</h4>
                                </div>
                                <?php
                                $stmtsp = $db->prepare("select count(*) from eventdtls_tbl where ed_eventstatus='S'");
                                $stmtsp->execute();
                                $stmtsp->store_result();
                                $stmtsp->bind_result($spcount);
                                $stmtsp->fetch(); ?>
                                <div class="col-md-12 col-lg-12">
                                    <div class="widget-bg-color-icon card-box fadeInDown animated">
                                        <div class="text-right">
                                            <h3 class="text-dark"><b class="counter"><?= $spcount; ?></b></h3>
                                            <p class="text-muted">Total Swachh Puducherry</p>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <?php
                                $stmtsp->free_result();
                                $stmtsp->close(); ?>
                            </div>
                            <div class="col-sm-4">
                                <div class="col-sm-12">
                                    <h4 class="page-header  header-title">News Stream</h4>
                                </div>
                                <?php
                                $stmtns = $db->prepare("select count(id) from newsroom");
                                $stmtns->execute();
                                $stmtns->store_result();
                                $stmtns->bind_result($nscnt);
                                $stmtns->fetch(); ?>
                                <div class="col-md-12 col-lg-12">
                                    <div class="widget-bg-color-icon card-box fadeInDown animated">
                                        <div class="text-right">
                                            <h3 class="text-dark"><b class="counter"><?= $nscnt; ?></b></h3>
                                            <p class="text-muted">Total News Stream</p>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <?php
                                $stmtns->free_result();
                                $stmtns->close(); ?>
                            </div>
                            <div class="col-sm-4">
                                <div class="col-sm-12">
                                    <h4 class="page-header  header-title">Archives</h4>
                                </div>
                            <?php
                                $stmtarch = $db->prepare("select count(id) from rti where category='archives'");
                                $stmtarch->execute();
                                $stmtarch->store_result();
                                $stmtarch->bind_result($archcnt);
                                $stmtarch->fetch(); ?>
                                <div class="col-md-12 col-lg-12">
                                    <div class="widget-bg-color-icon card-box fadeInDown animated">
                                        <div class="text-right">
                                            <h3 class="text-dark"><b class="counter"><?= $archcnt; ?></b></h3>
                                            <p class="text-muted">Total Archives</p>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <?php
                                $stmtarch->free_result();
                                $stmtarch->close(); ?>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="page-header  header-title">Gallery</h4>
                            </div>
                        </div>
                        <?php
                        $stmt = $db->prepare("select count(distinct a.id), count(b.id) from category a left join gallery b on a.id=b.category_id");
                        $stmt->execute();
                        $stmt->store_result();
                        $stmt->bind_result($category, $imgGallery);
                        if ($stmt->num_rows > 0) {
                            $result = $stmt->fetch();
                        }
                        ?>
                        <div class="row">
                            <div class="col-md-6 col-lg-3">
                                <div class="widget-bg-color-icon card-box fadeInDown animated">
                                    <div class="text-right">
                                        <h3 class="text-dark"><b class="counter"><?= $category; ?></b></h3>
                                        <p class="text-muted">Total Categories Created</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-3">
                                <div class="widget-bg-color-icon card-box">
                                    <div class="text-right">
                                        <h3 class="text-dark"><b class="counter"><?= $imgGallery; ?></b></h3>
                                        <p class="text-muted">Today Images Uploaded</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="page-header  header-title">Events</h4>
                            </div>
                        </div>
                        <?php
                        $stmt = $db->prepare("select (select count(*) from eventdtls_tbl where ed_eventstatus='P') as pEvent, (select count(*) from eventdtls_tbl where ed_eventstatus='U') as uEvent, (select count(eventgallery_pk) from eventdtls_tbl left join eventgallery_tbl on eventdtls_pk = eg_eventdtls_fk where ed_eventstatus='P') as pMedia, (select count(eventgallery_pk) from eventdtls_tbl left join eventgallery_tbl on eventdtls_pk = eg_eventdtls_fk where ed_eventstatus='U') as uMedia");
                        $stmt->execute();
                        $stmt->store_result();
                        $stmt->bind_result($pEvent, $uEvent, $pMedia, $uMedia);
                        if ($stmt->num_rows > 0) {
                            $result = $stmt->fetch();
                        }
                        ?>
                        <div class="row">
                            <div class="col-md-6 col-lg-3">
                                <div class="widget-bg-color-icon card-box fadeInDown animated">
                                    <div class="text-right">
                                        <h3 class="text-dark"><b class="counter"><?= $pEvent; ?></b></h3>
                                        <p class="text-muted">Total Past Events</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-3">
                                <div class="widget-bg-color-icon card-box">
                                    <div class="text-right">
                                        <h3 class="text-dark"><b class="counter"><?= $pMedia; ?></b></h3>
                                        <p class="text-muted">Total Past Event Medias</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="widget-bg-color-icon card-box fadeInDown animated">
                                    <div class="text-right">
                                        <h3 class="text-dark"><b class="counter"><?= $uEvent; ?></b></h3>
                                        <p class="text-muted">Total Upcoming Events</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-3">
                                <div class="widget-bg-color-icon card-box">
                                    <div class="text-right">
                                        <h3 class="text-dark"><b class="counter"><?= $uMedia; ?></b></h3>
                                        <p class="text-muted">Total Upcoming Event Medias</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="page-header  header-title">Notifications</h4>
                            </div>
                        </div>
                        <?php
                        $stmt = $db->prepare("SELECT (SELECT count(tourdtls_pk) FROM tourdtls_tbl), (SELECT count(shramdaandtls_Pk) from shramdaandtls_tbl), (SELECT count(shrurideasdtls_pk) from shrurideasdtls_tbl), (SELECT count(feedbackdtls_pk) from feedbackdtls_tbl)");
                        $stmt->execute();
                        $stmt->store_result();
                        $stmt->bind_result($tours, $shramdaan, $ideas, $feedback);
                        if ($stmt->num_rows > 0) {
                            $result = $stmt->fetch();
                        }
                        ?>
                        <div class="row">
                            <div class="col-md-6 col-lg-3">
                                <div class="widget-bg-color-icon card-box fadeInDown animated">
                                    <div class="text-right">
                                        <h3 class="text-dark"><b class="counter"><?= $tours; ?></b></h3>
                                        <p class="text-muted">Total Raj Nivas Tours</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-3">
                                <div class="widget-bg-color-icon card-box">
                                    <div class="text-right">
                                        <h3 class="text-dark"><b class="counter"><?= $shramdaan; ?></b></h3>
                                        <p class="text-muted">Total Shramdaan Requests</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="widget-bg-color-icon card-box fadeInDown animated">
                                    <div class="text-right">
                                        <h3 class="text-dark"><b class="counter"><?= $ideas; ?></b></h3>
                                        <p class="text-muted">Total Share your Ideas</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-3">
                                <div class="widget-bg-color-icon card-box">
                                    <div class="text-right">
                                        <h3 class="text-dark"><b class="counter"><?= $feedback; ?></b></h3>
                                        <p class="text-muted">Total Feedbacks</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
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

        <script src="assets/plugins/peity/jquery.peity.min.js"></script>

        <!-- jQuery  -->
        <script src="assets/plugins/waypoints/lib/jquery.waypoints.js"></script>
        <script src="assets/plugins/counterup/jquery.counterup.min.js"></script>

        <script src="assets/plugins/morris/morris.min.js"></script>
        <script src="assets/plugins/raphael/raphael-min.js"></script>
        <script src="assets/plugins/jquery-knob/jquery.knob.js"></script>
        <script src="assets/pages/jquery.dashboard.js"></script>
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });

                $(".knob").knob();

            });
        </script>
    </body>
</html>