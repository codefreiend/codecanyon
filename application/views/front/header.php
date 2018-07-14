<!doctype html>
<html class="no-js" lang="" >
    <head >
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>دورات بوك</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="shortcut icon" type="image/png" href="<?=base_url()?>assets/images/favicon.png">
        <!-- Place favicon.ico in the root directory -->

		<!-- all css here -->
		<!-- bootstrap v3.3.7 css -->
        <link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.css">
        <link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap-rtl.css">
        <link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap-flipped.css">
		<!-- animate css -->
        <link rel="stylesheet" href="<?=base_url()?>assets/css/animate.css">
		<!-- owl.carousel.2.0.0-beta.2.4 css -->
        <link rel="stylesheet" href="<?=base_url()?>assets/css/owl.carousel.css">
		<!-- font-awesome v4.6.3 css -->
        <link rel="stylesheet" href="<?=base_url()?>assets/css/font-awesome.min.css">
		<!-- nivo-slider.css -->
        <link rel="stylesheet" href="<?=base_url()?>assets/css/nivo-slider.css">
		<!-- magnific-popup.css -->
        <link rel="stylesheet" href="<?=base_url()?>assets/css/magnific-popup.css">
		<!-- slicknav.min.css -->
        <link rel="stylesheet" href="<?=base_url()?>assets/css/slicknav.min.css">
        <!-- star rating -->
        <link rel="stylesheet" href="<?=base_url()?>assets/css/star-rating.css">
        <link rel="stylesheet" href="<?=base_url()?>assets/krajee-svg/theme.css">

		<!-- style css -->
        <link rel="stylesheet" href="<?=base_url()?>assets/css/styles.css">
		<link rel="stylesheet" href="<?=base_url()?>assets/css/newsbar.css">
		<link rel="stylesheet" href="<?=base_url()?>assets/css/jquery-ui.min.css">
		<link rel="stylesheet" href="<?=base_url()?>assets/css/jquery-ui.theme.min.css">
		<link rel="stylesheet" href="<?=base_url()?>assets/css/star-rating-svg.css">
        
		<link rel="stylesheet" href="<?=base_url()?>assets/css/custom.css">
		<!-- responsive css -->
        <link rel="stylesheet" href="<?=base_url()?>assets/css/responsive.css">
		<!-- modernizr css -->
        <script src="<?=base_url()?>assets/js/vendor/modernizr-2.8.3.min.js"></script>
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
        <!-- -area start -->
        <header class="header-area">
            <div class="header-top-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-2 col-xs-12">
                            <div class="header-top-left">
                                <ul>
                                    <li>011443322<i class="fa fa-phone"></i></li>
                                    <li>info@dawratbook.com<i class="fa fa-envelope"></i></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-8 col-sm-6 col-2 col-xs-12">
                            <div class="header-top-right text-right">
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



<div class="slideUp" id="news-bar">


    <?php 

if(isset($courses_data))
        echo $courses_data;

    if(isset($instructors_data))
        echo $instructors_data;

   
    ?>
    
</div>





            <div class="header-bottom-area" id="sticky-header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-3 col-xs-10">
                            <div class="logo">
                                <a href="<?=base_url()?>">
                                    <img src="<?=base_url()?>assets/images/logo.png" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-9 col-sm-9 hidden-xs">
                            <div class="mainmenu text-right">
                                <ul id="navigation">
                                    <li <?=isset($active) && $active=="home" ? "class=\"active\"":""?>><a href="<?=base_url();?>">الرئيسية</i></a>
                                       
                                    </li>
                                    <li <?=isset($active) && $active=="courses_cards" ? "class=\"active\"":""?>><a href="<?=base_url()?>welcome/courses_cards">الدورات التدريبية</i></a>
                                       <!--  <ul>
                                            <li><a href="<?=base_url()?>welcome/courses_cards">الدورات التدريبية</a></li>
                                            <li><a href="<?=base_url()?>welcome/courses_list"> ورش العمل</a></li>
                                            <li class="active"><a href="service3.html"> السمنارات</a></li>
                                        </ul> -->
                                    </li>
                                    <li <?=isset($active) && $active=="instructors" ? "class=\"active\"":""?>><a href="<?=base_url()?>admin/userz/instructors">المدربين</i></a>
                                      <!--   <ul>
                                            <li><a href="<?=base_url()?>admin/userz/instructors">المدربين المتميزين</a></li>
                                            <li><a href="project2.html">Project Two</a></li>
                                            <li><a href="project3.html">Project Three</a></li>
                                            <li><a href="project3.html">Project Fout</a></li>
                                        </ul> -->
                                    </li>
                                    <li <?=isset($active) && $active=="training_centers" ? "class=\"active\"":""?>><a href="<?=base_url()?>welcome/centers_list">المراكز التدريبية</i></a>
                                        <!-- <ul>
                                            <li><a href="<?=base_url()?>welcome/centers_list">المعاهد التدريبية</a></li>
                                            <li><a href="news2.html">news 2 Column</a></li>
                                            <li><a href="news-left.html">news Left</a></li>
                                            <li><a href="news-right.html">news Right</a></li>
                                            <li><a href="news-details.html">news Detsils</a></li>
                                        </ul> -->
                                    </li>
                                    <li <?=isset($active) && $active=="services" ? "class=\"active\"":""?>><a href="<?=base_url()?>welcome/services_cards">الخدمات</a></li>
                                    <li <?=isset($active) && $active=="aboutus" ? "class=\"active\"":""?>><a href="javascript:void(0);">من نحن <i class="fa fa-angle-down"></i></a>
                                        <ul class="right">
                                            <li><a href="about.html"> الرؤية والرسالة</a></li>
                                            <li><a href="about2.html"> عن دوارت بوك</a></li>
                                            <li><a href="team.html"> اتصل بنا</a></li>
                                           
                                        </ul>
                                    </li>

                          

        
                                     <?php if($ion_auth->logged_in()){?>
                                     <li>
                                         <a href="<?=base_url()?>index.php/welcome/login">الداشبورد</a>                                       
                                    </li>
                                     <?php } else {?>
                                         <li><a href="javascript:void(0);">تسجيل الدخول <i class="fa fa-angle-down"></i></a>
                                            <ul class="right">
                                                <li><a href="<?=base_url()?>index.php/welcome/login">تسجيل الدخول</a></li>
                                                <li><a href="<?=base_url()?>index.php/admin/userz/register">التسجيل</a></li>
                                            
                                            </ul>
                                    </li>
                                     <?php }?>
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
        