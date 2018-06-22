<!-- <marquee direction="right" scrollamount="3" behavior="scroll" onmouseover="this.stop()" onmouseout="this.start()">

        <?php foreach($instructors as $instructor):?>
            <a href="<?php echo base_url()?>admin/userz/about_instructor/<?php echo $id?>" class="hvr-pop"><?php echo $instructor->full_name;?></a>
            <a> - </a>
        <?php endforeach;?>
    </marquee> -->

    <div id="instructors-bar">
	<ul>

        <?php 
        $max = sizeof($instructors);
         for($i=0; $i<($max-2); $i +=3){
            echo '<li>'.$instructors[$i]->full_name .' - '. $instructors[$i+1]->full_name .' - '. $instructors[$i+2]->full_name.'</li>';
        } 
        
        ?>


		<!-- <li>Triangles can be made easily using CSS also without any images. This trick requires only div tags and some CSS works. To get this trick, just use the code below.</li> -->
		<!-- <li>List 2</li>
		<li>List 3</li>
		<li>List 4</li>
		<li>List 5 </li> -->
		<!-- <li class="ww">Hey... Triangles can be made easily using CSS also without any images. This trick requires only div tags and some CSS works. To get this trick, just use the code below.</li> -->
	</ul>
</div>