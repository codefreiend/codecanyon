<!DOCTYPE html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>دورات بوك</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="shortcut icon" type="image/png" href="<?php echo base_url()?>assets/images/favicon.png">
        <!-- Place favicon.ico in the root directory -->

		<!-- all css here -->
		<!-- bootstrap v3.3.7 css -->
        <link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.css">
         <link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap-rtl.css">
        <link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap-flipped.css">
		
		<!-- animate css -->
        <link rel="stylesheet" href="<?php echo base_url()?>assets/css/animate.css">
		<!-- owl.carousel.2.0.0-beta.2.4 css -->
        <link rel="stylesheet" href="<?php echo base_url()?>assets/css/owl.carousel.css">
		<!-- font-awesome v4.6.3 css -->
        <link rel="stylesheet" href="<?php echo base_url()?>assets/css/font-awesome.min.css">
		<!-- nivo-slider.css -->
        <link rel="stylesheet" href="<?php echo base_url()?>assets/css/nivo-slider.css">
		<!-- magnific-popup.css -->
        <link rel="stylesheet" href="<?php echo base_url()?>assets/css/magnific-popup.css">
		<!-- slicknav.min.css -->
        <link rel="stylesheet" href="<?php echo base_url()?>assets/css/slicknav.min.css">
		<!-- style css -->
		<link rel="stylesheet" href="<?php echo base_url()?>assets/css/styles.css">
		<!-- responsive css -->
        <link rel="stylesheet" href="<?php echo base_url()?>assets/css/responsive.css">
		<!-- modernizr css -->
        <script src="<?php echo base_url()?>assets/js/vendor/modernizr-2.8.3.min.js"></script>
		<link rel="stylesheet" href="<?=base_url()?>assets/css/custom.css">
        
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <!-- preloder-wrap -->
        <div id="cssLoader3" class="preloder-wrap">
            <div class="loader">
                <div class="child-common child4"></div>
                <div class="child-common child3"></div>
                <div class="child-common child2"></div>
                <div class="child-common child1"></div>
            </div>
        </div>
        <!-- preloder-wrap -->
        <!-- header-area start -->
        <header class="header-area">
            <div class="header-top-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-2 col-xs-12">
                            <div class="header-top-left">
                                <ul>
                                    <li><i class="fa fa-phone"></i> +1234567890</li>
                                    <li><i class="fa fa-envelope"></i> mail@domain.com</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-8 col-sm-6 col-2 col-xs-12">
                            <div class="header-top-right text-right">
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom-area" id="sticky-header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-3 col-xs-10">
                            <div class="logo">
                                <a href="<?php echo base_url();?>">
                                    <img src="<?=base_url()?>assets/images/logo.png" alt="">
                                    
                                </a>
                            </div>
                        </div>
                        <div class="col-md-9 col-sm-9 hidden-xs">
                            <div class="mainmenu text-right">
                                <ul id="navigation">
                                  
                                </ul>
                            </div>
                        </div>
                        <div class="hidden-sm clear col-xs-2 hidden-md hidden-lg">
                            <div class="responsive-menu-wrap floatright"></div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- header-area end -->
        
        <!-- breadcumb-area start -->
       <!--  <div class="breadcumb-area bg-img-5 black-opacity">
            <div class="container">
                <div class="row">
                    <div class="col-2 col-sm-6 col-xs-12">
                        <div class="breadcumb-wrap">
                            <h2>Contact Us</h2>
                        </div>
                    </div>
                    <div class="col-2 col-sm-6 col-xs-12">
                        <div class="breadcumb-wrap text-right">
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li>/</li>
                                <li class="active">Contact</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- breadcumb-area end -->

        <!-- contact-area start -->
        <div class="contact-area bg-1 ptb-120 mb-510">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-md-offset-0">
                        <div class="contact-form">
                             <h2> البريد الاكلتروني </h2>
                             <p>سيتم ارسال ارسال رسالة بها كود</p>
                             <?php if ($this->session->flashdata('message')): ?>
                               
                                <div class="alert alert-danger">
                                    <button type="button" class="close" data-close="alert"></button>
                                    <?php echo $this->session->flashdata('message'); ?>
                                </div>

                            <?php endif; ?>


                             <?php if ($this->session->flashdata('info_message')): ?>
                               
                                <div class="alert alert-info">
                                    <button type="button" class="close" data-close="alert">معلومة</button>
                                    <?php echo $this->session->flashdata('info_message'); ?>
                                </div>

                            <?php endif; ?>
                              
                            <div class="cf-msg"></div>
                            <form action="<?=base_url()?>admin/userz/validate_email" method="post" id="cf">
                                <div class="row">
                                   <!--  <div class="col-xs-12 col-sm-12">
                                        <input type="text" placeholder="Username" id="fname" name="fname">
                                    </div> -->
                                     <div class="col-md-12">
                                        <input type="text" placeholder="البريد الاكلتروني"  value="<?php echo set_value('identity'); ?>" name='identity' id='identity' required="">
                                        <?php echo form_error('identity', '<span class="err-msg">', '</span>') ?>
                                        
                                    </div>

                                  

                                    
                                     

                                  
                                    
                                   
                                   <!--  <div class="col-xs-12  col-xs-offset-6">
                                        <textarea class="contact-textarea" placeholder="Message" id="msg" name="msg"></textarea>
                                    </div> -->
                                    <div class="col-xs-4">
                                        <button id="submit" class="cont-submit btn-contact" name="submit">ارسال </button>
                                    </div>

                                     


                                   

                                    

                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="contact-wrap">
                            <ul>
                               <!--  <li>
                                    <i class="fa fa-home"></i>
                                    Address:
                                    <p>1234, Contrary to popular Sed ut perspiciatis unde 1234</p>
                                </li>
                                <li>
                                    <i class="fa fa-phone"></i>
                                    Email address:
                                    <p>
                                        <span>info@yoursite.com </span>
                                        <span>info@yoursite.com </span>
                                    </p>
                                </li>
                                <li>
                                    <i class="fa fa-envelope"></i>
                                    phone number:
                                    <p>
                                        <span>+0123456789</span>
                                        <span>+1234567890</span>
                                    </p>
                                </li> -->
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                       
                    </div>
                </div>
            </div>
        </div>
        <!-- contact-area end -->

        <!-- footer-area start -->
        <footer class="footer-area">
           
            <div class="footer-bottom-area">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 text-center">
                            <p>Copyright &copy; 2017 <span>Nirstruct</span>. All Rtights Reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer-area end -->

        <!-- jquery latest version -->
        <script src="<?php echo base_url()?>assets/js/vendor/jquery-1.12.4.min.js"></script>
        <!-- bootstrap js -->
        <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
        <!-- owl.carousel.2.0.0-beta.2.4 css -->
        <script src="<?php echo base_url()?>assets/js/owl.carousel.min.js"></script>
        <!-- jquery.nivo.slider.pack.js -->
        <script src="<?php echo base_url()?>assets/js/jquery.nivo.slider.pack.js"></script>
        <!-- plugins js -->
        <script src="<?php echo base_url()?>assets/js/plugins.js"></script>
        <!-- google map -->
       
        <!-- main js -->
        <script src="<?php echo base_url()?>assets/js/scripts.js"></script>
    </body>
</html>
