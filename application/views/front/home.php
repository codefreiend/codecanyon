
        <!-- breadcumb-area start -->
       <!--  <div class="breadcumb-area bg-img-5 black-opacity">
            <div class="container">
                <div class="row">
                    <div class="col-2 col-sm-6 col-xs-12">
                        <div class="breadcumb-wrap">
                            <h2>أهلا بك في دورات بوك</h2>
                        </div>
                    </div>
                    <div class="col-2 col-sm-6 col-xs-12">
                        <div class="breadcumb-wrap text-right">
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li>/</li>
                                <li class="active">Service</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- breadcumb-area end -->
        
        <!-- service-area start -->
        <div class="service-area service-area2 service-area3">
            <div class="container">
                 
        
        <div id="myTabs">

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">الدورات التدريبية</a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">المراكز التدريبية</a></li>
    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">المدربين</a></li>
    <!-- <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li> -->
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">
        <?=$search_courses?>
        <div class="row margin-class">
           
            <div class="clearfix"></div>
            
                <div class="col-md-8 col-sm-6 col-xs-12 col-2 block_optimizer1 content-tc box-1">                 
                    <?=$courses_cards?>
                </div>

              <div class="col-md-4 col-sm-6 col-xs-12 col-2 block_optimizer1">
               <div style="background-color:yellow;width:100%">
                  <!-- carousel start -->
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                <!-- Indicators -->
                                <ol class="carousel-indicators">

                                     <?php if(isset($course_logos)){


                                         $i = 0;
                                        for($i=0;$i<count($course_logos);$i++){
                                         ?>
                                            <li data-target="#myCarousel" data-slide-to="$i" class="<?php if($i==0) echo"active";?>"></li>
                                        <?php }

                                        } else {?>


                                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                            <li data-target="#myCarousel" data-slide-to="1"></li>
                                            <li data-target="#myCarousel" data-slide-to="2"></li>
                                            <li data-target="#myCarousel" data-slide-to="3"></li>
                                            <li data-target="#myCarousel" data-slide-to="4"></li>
                                        <?php }?>
                                </ol>

                                <!-- Wrapper for slides -->
                                <div class="carousel-inner">

                                    <?php if(isset($course_logos)){$i = 0;?>
                                        
                                        <?php foreach($course_logos as $course_logo){?>

                                             <div class="item <?php if($i==0) echo"active";?>">
                                                <img src="<?php echo base_url()?>uploads/photo/<?php echo $course_logo->logo;?>" alt="Chicago">
                                            </div>
                                        <?php $i++; }?>
                                    <?php } else {?>
                                    <div class="item active">
                                    <img src="<?php echo base_url()?>assets/images/slider/img1.jpg" alt="Los Angeles">
                                    </div>

                                    <div class="item">
                                    <img src="<?php echo base_url()?>assets/images/slider/img2.jpg" alt="Chicago">
                                    </div>

                                    <div class="item">
                                    <img src="<?php echo base_url()?>assets/images/slider/img3.jpg" alt="New York">
                                    </div>

                                    <div class="item">
                                    <img src="<?php echo base_url()?>assets/images/slider/img4.jpg" alt="New York">
                                    </div>
                                    <?php }?>
                                </div>

                                <!-- Left and right controls -->
                                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                                </div>
                  <!-- carousel end -->
               </div>
             </div>

            
        </div>
    </div>
    <div role="tabpanel" class="tab-pane" id="profile">
          <?=$search_centers?>
            <div class="row margin-class">                
               
                <div class="clearfix"></div>
                 <div class="col-md-8 col-sm-6 col-xs-12 col-2 block_optimizer1 content-tc box-1">                 
                 <?=$center_blocks?>
             </div>

              <div class="col-md-4 col-sm-6 col-xs-12 col-2 block_optimizer1">
               <div style="background-color:yellow;width:100%">
                  <!-- carousel start -->
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                <!-- Indicators -->
                                <ol class="carousel-indicators">
                                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                    <li data-target="#myCarousel" data-slide-to="1"></li>
                                    <li data-target="#myCarousel" data-slide-to="2"></li>
                                    <li data-target="#myCarousel" data-slide-to="3"></li>
                                </ol>

                                <!-- Wrapper for slides -->
                                <div class="carousel-inner">
                                    <div class="item active">
                                    <img src="<?php echo base_url()?>assets/images/slider/img1.jpg" alt="Los Angeles">
                                    </div>

                                    <div class="item">
                                    <img src="<?php echo base_url()?>assets/images/slider/img2.jpg" alt="Chicago">
                                    </div>

                                    <div class="item">
                                    <img src="<?php echo base_url()?>assets/images/slider/img3.jpg" alt="New York">
                                    </div>

                                    <div class="item">
                                    <img src="<?php echo base_url()?>assets/images/slider/img4.jpg" alt="New York">
                                    </div>
                                </div>

                                <!-- Left and right controls -->
                                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                                </div>
                  <!-- carousel end -->
               </div>
             </div>
            </div>
    </div>
    <div role="tabpanel" class="tab-pane" id="messages">
        <?=$search_instructor?>
            <div class="row margin-class">                
               
                <div class="clearfix"></div>
                 <div class="col-md-8 col-sm-6 col-xs-12 col-2 block_optimizer1 content-tc box-1">                 
                 <?=$instructor_cards?>
             </div>

              <div class="col-md-4 col-sm-6 col-xs-12 col-2 block_optimizer1">
               <div style="background-color:yellow;width:100%">
                  <!-- carousel start -->
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                <!-- Indicators -->
                                <ol class="carousel-indicators">
                                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                    <li data-target="#myCarousel" data-slide-to="1"></li>
                                    <li data-target="#myCarousel" data-slide-to="2"></li>
                                    <li data-target="#myCarousel" data-slide-to="3"></li>
                                </ol>

                                <!-- Wrapper for slides -->
                                <div class="carousel-inner">
                                    <div class="item active">
                                    <img src="<?php echo base_url()?>assets/images/slider/img1.jpg" alt="Los Angeles">
                                    </div>

                                    <div class="item">
                                    <img src="<?php echo base_url()?>assets/images/slider/img2.jpg" alt="Chicago">
                                    </div>

                                    <div class="item">
                                    <img src="<?php echo base_url()?>assets/images/slider/img3.jpg" alt="New York">
                                    </div>

                                    <div class="item">
                                    <img src="<?php echo base_url()?>assets/images/slider/img4.jpg" alt="New York">
                                    </div>
                                </div>

                                <!-- Left and right controls -->
                                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                                </div>
                  <!-- carousel end -->
               </div>
             </div>
            </div>
    </div>
    <!-- <div role="tabpanel" class="tab-pane" id="settings">...</div> -->
  </div>

</div>
                

              

            </div>
        </div>
        <!-- service-area end -->

      <?=$statistical_bar?>
        <!-- brand-area start -->
        <div class="brand-area mb-510" style="direction:ltr;">
            <div class="container">
                <div class="row">
                    <div class="brand-active">                       
                        <?php echo $center_carousel_items;?>
                    </div>
                </div>
            </div>
        </div>
        <!-- brand-area end -->