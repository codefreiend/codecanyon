 <div class="col-md-3 col-sm-6 col-xs-12 col-2 block_optimizer1 item-tc" 
 style="padding: 5px;">

    <a href="<?=base_url()?>welcome/course_details/<?=$id?>">
        <div class="service-wrap card-href">
           <!--  <div class="service-img">
                <img src="<?=base_url()?>uploads/photo/" alt="">
            </div> -->
            <div class="service-content item-tc-content">
                <h3 class="about-course" style="font-size: 12px;"><?=$course_name?></h3>
               <p>
                     <?php 

                        if(isset($userz) && !empty($userz)):
                       foreach($userz as $key => $value):
	                        if($value->id==$instructor)
	                            echo $value->full_name;
                            endforeach; 
                        endif; ?>
               </p>
                <p><?php echo $course_date;?></p>
                <p>أمن المعلومات</p>

                <?php if($serviceslib->courseIsValidDate($id)):?>
                    <button class="btn btn-success" style="position:absolute;bottom:10px;" >سجل الان</button>
                <?php endif;?>
            </div>
        </div>
    </a>
</div>