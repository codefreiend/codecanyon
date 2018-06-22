  <?php foreach($instructors as $instructor):?>
  <div class="col-md-3 col-sm-6 col-2 col-xs-12 item-tc">
             <a href="<?php echo base_url()?>admin/userz/about_instructor/<?php echo $instructor->id?>">                                                                
      
                        <div class="team-wrap">
                            <div class="team-img text-center zoom-container">
                                <img src="<?php echo base_url()?>uploads/photo/<?php echo $instructor->photo;?>" class="img-responsive" alt="">
                                <!-- <ul>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#"><i class="fa fa-vimeo"></i></a></li>
                                </ul> -->
                            </div>
                            <div class="team-content item-tc-content">
                                <h3> 
                                        <?php echo $serviceslib->get_first_last_name($instructor->full_name); ?>
                                        <i class="fa fa-star"></i>
                                   
                                <!-- <span>Designer</span> -->
                                </h3>

                               <div class="clearfix"></div>

                                <ul style="background-color:transparent;">
                                    <li>أمن المعلومات</li>
                                    <li>الشبكات </li>

                                </ul>

                                <!-- <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin.</p> -->
                            </div>
                        </div>
                     </a>
                </div>

            <?php endforeach;?>