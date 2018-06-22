<?php foreach($courses as $course):?>
 <div class="card">
    <div class="card-header" id="heading<?php echo $course->id?>">
      <h5 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapse<?php echo $course->id?>" aria-expanded="false" aria-controls="collapse<?php echo $course->id?>">
         <?php echo $course->course_name?>
        </button>
      </h5>

     <div class="row">
      <div class="col-md-6 col-sm-6 col-xs-12 col-2">
        <div class="dl-horizontal">
        
         <dt class="col-1">المكان </dt>
        <dd class="col-1"><div>
          <?php
                                      if(isset($centers) && !empty($centers)):
                                              foreach($centers as $key => $value): 
                                                  if($value->id==$course->tcenter)
                                                      echo $value->center_name;
                                              endforeach; 
                                      endif; ?>
        </div></dd>
        <dt class="col-2 reset">التاريخ</dt>
        <dd class="col-2"><div> <?php echo $course->start_date?></div></dd>
        
        </div>
      </div>

<!--second start-->

 <div class="col-md-6 col-sm-6 col-xs-12 col-2">
        <div class="dl-horizontal">
        
         <dt class="col-1">المدرب </dt>
        <dd class="col-1"><div>
          <?php
                                      if(isset($userz) && !empty($userz)):
                                              foreach($userz as $key => $value): 
                                                  if($value->id==$course->instructor)
                                                      echo $value->full_name;
                                              endforeach; 
                                      endif; ?>
        </div></dd>
        <dt class="col-2 reset">التاريخ</dt>
        <dd class="col-2"><div> <?php echo $course->start_date?></div></dd>
        
        </div>
      </div>
<!--second end-->
    </div> 

    </div>

    <div id="collapse<?php echo $course->id?>" class="collapse" aria-labelledby="heading<?php echo $course->id?>" data-parent="#accordion">
      <div class="card-body">
         <?php echo $course->about_course?>
        
      </div>
    </div>
  </div> 
<?php endforeach;?>