<marquee direction="right" scrollamount="3" behavior="scroll" onmouseover="this.stop()" onmouseout="this.start()" class="marq1">

        <?php foreach($courses as $course):?>
            <a href="<?php echo base_url()?>welcome/course_details/<?php echo $id?>" class="hvr-pop"><?php echo $course->course_name;?></a>
            <a> - </a>
        <?php endforeach;?>
    </marquee>