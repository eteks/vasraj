<?php 
@session_start();
include("captcha.php");
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = base64_encode(openssl_random_pseudo_bytes(32));
}
$msg = '';
if (isset($_POST['submit'])) {
    if (isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
        if($_POST['captcha'] == $_SESSION['captcha']['code'])
        {
            $username = 'admin';
            $key = $_POST['captcha'];
            $password = hash('sha512', 'Rajnivas@2017'.$key);
            $pwd = $_POST['txtpassword'];
            if($username == $_POST['txtuname'] && $pwd == $password)
            {
                session_regenerate_id();
                $_SESSION['authenticated'] = 'yes';
                header("location:dashboard.php");                
            } else
                $msg = "Invalid credentails!!";
        } else {
            $msg = "Enter correct Captcha";
        }
    } else
        header('location:index.php');
}
    $_SESSION['captcha'] = simple_php_captcha();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="assets/images/favicon_1.ico">

        <title>Rajnivas - Login</title>

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
    <body>

        <div class="account-pages"></div>
        <div class="clearfix"></div>
        <div class="wrapper-page">
            <div class=" card-box">
                <div class="panel-heading"> 
                    <h3 class="text-center"> Sign In to <strong class="text-custom">Rajnivas</strong> Admin Panel</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal m-t-20" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <span class="help-block text-danger"><?php echo $msg; ?></span>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" required="" placeholder="Username" name="txtuname">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" type="password" required="" placeholder="Password" name="txtpassword">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <img src="<?php echo $_SESSION['captcha']['image_src']; ?>" alt="CAPTCHA code" />
                                <input class="form-control" type="text" name="captcha" id="captcha" placeholder="Enter Captcha" autocomplete="off" />
                            </div>
                        </div>
                        <div class="form-group text-center m-t-40">
                            <div class="col-xs-12">
                                <button class="btn btn-primary btn-block text-uppercase waves-effect waves-light" type="submit" name="submit">Log In</button>
                                <input type="hidden" name="csrf_token" id="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>" />
                            </div>
                        </div>
                    </form> 
                </div>   
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


        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>
        <script src="assets/js/login.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('form').on('submit', function(){
                    $('input[name=txtpassword]').val(encrpt($('input[name=txtpassword]').val()+$('#captcha').val()));
                });
            });
        </script>
    </body>
</html>