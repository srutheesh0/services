<!DOCTYPE html>
<html>
    <head>
        
        <!-- Title -->
        <title>Modern | Login - Sign in</title>
        
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta charset="UTF-8">
        <meta name="description" content="Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
        
        <!-- Styles -->
        <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700' rel='stylesheet' type='text/css'>
        <link href="<?php echo base_url();?>assets/plugins/pace-master/themes/blue/pace-theme-flash.css" rel="stylesheet"/>
        <link href="<?php echo base_url();?>assets/plugins/uniform/css/uniform.default.min.css" rel="stylesheet"/>
        <link href="<?php echo base_url();?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url();?>assets/plugins/fontawesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url();?>assets/plugins/line-icons/simple-line-icons.css" rel="stylesheet" type="text/css"/>	
        <link href="<?php echo base_url();?>assets/plugins/waves/waves.min.css" rel="stylesheet" type="text/css"/>	
        <link href="<?php echo base_url();?>assets/plugins/switchery/switchery.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url();?>assets/plugins/3d-bold-navigation/css/style.css" rel="stylesheet" type="text/css"/>	
        
        <!-- Theme Styles -->
        <link href="<?php echo base_url();?>assets/css/modern.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url();?>assets/css/custom.css" rel="stylesheet" type="text/css"/>
        
        <script src="<?php echo base_url();?>assets/plugins/3d-bold-navigation/js/modernizr.js"></script>
        <script type="text/javascript">  base_url=" <?=base_url();?>" </script>
        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        
    </head>
    <body class="page-login">
        <main class="page-content">
            <div class="page-inner">
                <div id="main-wrapper">
                    <div class="row">
                        <div class="col-md-3 center">
                            <div class="login-box">
                                <a href="index.html" class="logo-name text-lg text-center">Services</a>
                                <p class="text-center m-t-md">Please login into your account.</p>
                                <form class="m-t-md login-form">
                                    <div class="form-group">
                                        <input type="email" class="form-control username" name="usename" placeholder="Username" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control password" name="passsword" placeholder="Password" required>
                                    </div>
                                    <button type="button" class="btn btn-success btn-block login">Login</button>
<!--                                    <a class="btn btn-block btn-social btn-twitter" href="<?php echo base_url();?>hauth/login/Twitter"><span class="fa fa-twitter"> </span> Log in with Twitter</a><br />
                                    <a class="btn btn-block btn-social btn btn-facebook" href="<?php echo base_url();?>hauth/login/Facebook"><span class="fa fa-facebook"> </span> Log in with Facebook</a><br />
                                    <a class="btn btn-block btn-social btn btn-google" href="<?php echo base_url();?>hauth/login/Google"><span class="fa fa-google"> </span> Log in with Google</a>-->
                                    <?php
                                    $this->load->helper('url');
                                    ?><a class="btn btn-block btn-social btn-twitter" href="<?php echo base_url();?>index.php/hauth/login/Twitter"><span class="fa fa-twitter"> </span> Log in with Twitter</a><br />

                                    <a class="btn btn-block btn-social btn-facebook" href="<?php echo base_url();?>index.php/hauth/login/Facebook"><span class="fa fa-facebook"> </span> Log in with Facebook</a><br />

                                    <a class="btn btn-block btn-social btn-google" href="<?php echo base_url();?>index.php/hauth/login/Google"><span class="fa fa-google"> </span>  Log in with Google</a><br />

                                  
                                    <a  class="display-block text-center m-t-md text-sm forgot">Forgot Password?</a>
                                    <p class="text-center m-t-xs text-sm">Do not have an account?</p>
                                    <a href="register.html" class="btn btn-default btn-block m-t-md ">Create an account</a>

                                </form>
                                <p class="text-center m-t-xs text-sm">2017 &copy; Services by FSHDesign.</p>
                            </div>
                            <div class="m-t-md forgot-box hidden">
                                <a href="index.html" class="logo-name text-lg text-center">Services</a>
                                <p class="text-center m-t-md">Please enter your email id to reset password.</p> 
                                <div class="forgot-form">
                                    <form class="m-t-md">
                                        <legend>Reset password</legend>
                                        <div class="form-group">
                                            <input type="email" class="form-control email-p" name="email" placeholder="Email" required>
                                        </div>
                                        <button type="button" class="btn btn-success btn-block reset_password">Reset</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div><!-- Row -->
                </div><!-- Main Wrapper -->
            </div><!-- Page Inner -->
        </main><!-- Page Content -->
	
        
       
    </body>
    <script src="<?php echo base_url();?>assets/plugins/jquery/jquery-2.1.3.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/custom.js"></script>
    <script> $(function(){
            Pagehandler.loginpage();
        });
        </script>
</html>