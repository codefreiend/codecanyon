 
        <!-- breadcumb-area start -->
        <!--div class="breadcumb-area bg-img-5 black-opacity">
            <div class="container">
                <div class="row">
                    <div class="col-2 col-sm-6 col-xs-12">
                        <div class="breadcumb-wrap">
                            <h2>Service Three</h2>
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
        </div-->
        <!-- breadcumb-area end -->
        
        <!-- service-area start -->
        <div class="service-area service-area2 service-area3">
            <div class="container">
                <div class="row">                   

                    <div class="col-md-2 col-sm-6 col-2 col-xs-12">
                        <h2>الدورات التدريبية</h2>
                    </div>

                     <div class="col-md-9 col-sm-6 col-2 col-xs-12">
                    <form method="get" action="<?php echo base_url()?>welcome/courses_cards" class="form-inline">
                         <div class="form-group">                            
                            <input type="text" name="course_name" class="form-control" id="usr" placeholder="اسم الدورة">
                        </div>

                        <div class="form-group">
                            <select name="instructor" id="" class="form-control">
                                <option value="">اسم المدرب</option>
                                <?php foreach ($instructors as $instructor) { ?>
                                    <option value="<?php echo $instructor->id?>"><?php echo $instructor->full_name?></option>
                              <?php  }?>
                            </select>
                        </div>  
                        
                        <div class="form-group">                            
                            <input type="text" name="start_date" class="form-control date" id="start_date" placeholder="التاريخ"
                            style="width:180px;">
                        </div>
                            <input type="submit" class="btn btn-sm btn-success" value="بحث">
                    </form>
                    </div>
                </div>
                <div class="row">
                 
                    <?=$courses_cards?>
                    <div class="clearfix"></div>
                    <?=$courses_cards?>


                   
                </div>
            </div>
        </div>
        <!-- service-area end -->

        <!-- fanfact-area -->
         <!-- fanfact-area -->
         <?=$statistical_bar?>
       <!-- fanfact-area -->
        <!-- fanfact-area -->
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