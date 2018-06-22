 
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
                <div class="col-md-3 col-sm-6 col-2 col-xs-12">
                    <h2>المراكز التدريبية</h2>
                </div>

                <div class="col-md-9 col-sm-6 col-2 col-xs-12">
                    <form action="<?php echo base_url()?>welcome/courses_cards" class="form-inline">
                        <div class="form-group">                            
                            <input type="text" class="form-control" name="center_name" placeholder="اسم المركز">
                        </div>                          
                            <input type="text" class="btn btn-sm btn-success" value="بحث">
                    </form>
                </div>
            </div>

            <div class="row">
                <?=$center_blocks?>                   
            </div>
            </div>
        </div>
        <!-- service-area end -->

        <!-- fanfact-area -->
       <?=$statistical_bar?>
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