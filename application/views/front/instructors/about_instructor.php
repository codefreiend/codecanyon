<div class="about-area ptb-120 about-area2">
            <div class="container">

                <div class="row">
                    <div class="col-md-4 col-sm-5">

                        <h2 style="display:inline-block;">
                            <?=$instructor->full_name?>
                            
                        </h2>
                    </div>
                    <div class="col-md-3 col-sm-5">
                       <!--  <div style="width:200px;">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                        </div> -->
                    </div>    
                </div>

                <div class="row">
                   

                        

                    <div class="col-md-3 col-sm-5 hidden-xs">
                            <img src="<?=base_url()?>uploads/photo/<?php echo $instructor->photo?>" alt="">
                           <div class="col-md-12 col-sm-12">
                           <div class="trainer-rating"></div> 
                            <br>

                             

                           </div>
                           <div class="col-md-12 col-sm-12">
                        <?php if($ion_auth->logged_in()):?>
                            <?php if($hasCoursesWithThisInstructor):?>                              
                                <span><button class="btn btn-primary btn-sm add-rating">أضف تقييمك</button> </span>
                                <div class="rate-trainer review_trainer" style="margin: 5px 0 0 0;"></div>                                    
                                <textarea name="content" id="content" class="review_trainer form-control" cols="17" rows="3" style="margin: 0x 0 5px 0;"></textarea>
                                <input type="hidden" id="instructors_review_id" name="instructors_review_id">
                                <button class="btn btn-success btn-sm review_trainer" id="send_instructor_content">أرسل</button>
                            <?php endif;?>
                        <?php endif;?>
                           </div>

                      <!--   <div class="about-img" style="background-image: url(&quot;assets/images/about/4.jpg&quot;); background-size: cover; background-position: center center; height: 339px;">
                        </div> -->
                    </div>
                    <div class="col-md-9 col-sm-7 col-xs-12" style="border:2px solid #04fa0a;border-radius:10px;">
                        <div class="about-wrap">
                            <h3></h3>
                            <!-- <p>about instrucot=r goes here</p> -->

                        <dl class="dl-horizontal">
                         <dt> 
                        
                        
                        </dt>
                            <dd>
                                <h4>نبذة عن المدرب  </h4>
                                <p class="about-ins"><?php echo $instructor->about?></p>
                            </dd>
                        <?php if(isset($courses)):?>
                            <dt>  </dt>
                            <dd>
                            <h4>الكورسات التي يقدمهاالمدرب</h4>
                            
                                <ul>
                                     <?php foreach($courses as $course):?>
                                     <li>
                                    <a href="<?php echo base_url()."welcome/course_details/".$course->id?>" class="a-ins"><?php echo $course->course_name?></a>
                                         
                                     </li>
                                    <?php endforeach;?>
                                </ul>
                           
                            </dd>
                        <?php endif;?> 
                            <dt>  </dt>
                            <dd>
                                <h4>المجال التدريبي</h4>

                                <ul>
                                    <li>أمن المعلومات</li>
                                    <li>الشبكات </li>

                                </ul>

                            </dd>

                            <dt>  </dt>
                            <dd>
                                <h4> </h4>

                                <ul>
                                   <a href="<?php echo base_url()?>"."uploads/file/".<?php echo $instructor->cv?> class="btn btn-success">حمل السيرة الذاتية</a>

                                </ul>

                            </dd>
                            <dt>  </dt>
                            <dd>
                                <a href="mailto:<?php echo $instructor->email?>" id="anchorMail"><i class="fa fa-envelope"></i></a>
                            </dd>

                            <dt>  </dt>
                            <dd>
                                <h4>تواصل مع المدرب</h4>
                                <textarea name="" id="" cols="30" rows="5"></textarea>
                                <br>
                                <button class="btn btn-success">ارسل</button>
                            </dd>
                       </dl>
                          <!--   <ul>
                                <li> All the Lorem Ipsum generators on the Internet tend to repeat predefined.</li>
                                <li>Lorem Ipsum is therefore always free from repetition.</li>
                                <li>Ipsum is therefore always free from repetition.</li>
                                <li>Accompanied by English versions from the 1914 translation by H. Rackham.</li>
                                <li>English versions from the 1914 translation by H. Rackham.</li>
                            </ul> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>