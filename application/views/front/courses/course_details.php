  <!-- about-area start -->
        <div class="about-area ptb-120 about-area2">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-5 hidden-xs">
                        <div class="about-img">
                            <img src="<?php echo base_url()?>assets/images/course_icon.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-7 col-xs-12">
                        <div class="about-wrap">
                            <h3><?php echo $courses->course_name?></h3>
                            <p><?php echo $courses->about_course?></p>
                            <ul>
                                <li>المدرب: <a href="<?php echo base_url().'admin/userz/about_instructor/'.$courses->instructor ?>"><?php echo $courses->instructor_name?></a></li>
                                <li>المركز التدريبي: <a href="<?php echo base_url()."welcome/center_details/".$courses->tcenter?>"><?php echo $courses->center_name?></a></li>
                                <li>في الفترة: <?php echo $courses->start_date?> - <?php echo $courses->end_date?></li>
                                <li>الوقت: <?php echo $courses->time_from?> - <?php echo $courses->time_to?></li>
                                <li>عدد المقاعد: <?php echo $courses->no_of_seats?></li>
                                <li>السعر: <?php echo $courses->price." ".$courses->currency_desc?></li>
                               
                             </ul>
                            <!--   <button class="btn btn-block btn-primary">التسجيل</button> -->
                            
                                <?php if($ion_auth->in_group('Trainee')) {  ?>                                
                                    <?php if(!$serviceslib->isAlreadyRegistered($ion_auth->get_user_id(),$courses->id)) { ?>
                                    <a href="<?php echo base_url()?>welcome/register/<?php echo $courses->id?>" class="btn btn-block btn-primary">التسجيل</a>
                                <?php }
                                }
                            
                                
                            else
                                {?>
                                    <a href="<?php echo base_url()?>welcome/register/<?=$courses->id?>" class="btn btn-block btn-primary">التسجيل</a>
                            <?php }?>                                
                        </div>
                        
                    
                        <?php echo $rating;?>


                        <div class="row">
                    <div class="col-25">أضف تقييمك  </div>
                        <div class="col-75" id="your_rating">

                            <div class="rating">
                                <span rval="5" userid="<?php echo "yyy"?>" class="rstar">☆</span>
                                <span rval="4" class="rstar">☆</span>
                                <span rval="3" class="rstar">☆</span>
                                <span rval="2" class="rstar">☆</span>
                                <span rval="1" class="rstar">☆</span>
                            </div>

                        </div>
                    </div>

                        <div class="row">
                           <!--   <input id="input-1-rtl-star-xs" name="input-1-rtl-star-xs" class="kv-rtl-theme-default-star rating-loading" value="" dir="rtl" data-size="xs">
 -->
                          <!--  <input id="input-id" type="text" class="rating" data-size="lg" -->
                          <!--   <br/>
                            <div class='clearfix'>
                            </div>
                            <input id="input-2-rtl-star-sm" name="input-2-rtl-star-sm" class="kv-rtl-theme-default-star rating-loading" value="2" dir="rtl" data-size="sm">
                            <br/>
                            <div class='clearfix'></div>
                            <input id="input-3-rtl-star-md" name="input-3-rtl-star-md" class="kv-rtl-theme-default-star rating-loading" value="3" dir="rtl" data-size="md">
                            <br/>
                            <div class='clearfix'></div>
                            <input id="input-4-rtl-star-lg" name="input-4-rtl-star-lg" class="kv-rtl-theme-default-star rating-loading" value="4" dir="rtl" data-size="lg">
                            <br/>
                            <div class='clearfix'></div>
                            <input id="input-5-rtl-star-xl" name="input-5-rtl-star-xl" class="kv-rtl-theme-default-star rating-loading" value="5" dir="rtl" data-size="xl">
                            <br/>
                            <div class='clearfix'></div> -->

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- about-area end -->