<?php $this->load->view('header'); ?>

<!--  BO :heading -->

<div class="row wrapper border-bottom white-bg page-heading">

   <div class="col-lg-10">

      <h2>الدورات التدريبية</h2>

      <ol class="breadcrumb">

         <li>

            <a href="<?php echo base_url().'admin/'?>">الداش يورد</a>

         </li>

         <li class="active">

            <strong>الدورات التدريبية</strong>

         </li>

      </ol>

   </div>

   <div class="col-lg-2">

   </div>

</div>

<div class="row">

   <div class="col-lg-12">

      <div class="ibox ">

         <br>

         <div class="ibox-title">

            <?php if($this->session->flashdata('message')): ?>

            <div class="alert alert-success">

               <button type="button" class="close" data-close="alert"></button>

               <?php echo $this->session->flashdata('message'); ?>

            </div>

            <?php endif; ?>
            <?php if($ion_auth->in_group('admin')|| $ion_auth->in_group('Instructor')){?>
              <a href="<?php echo base_url(); ?>admin/training_courses/add" class="btn btn-info">اضافة دورة تدريبية</a>
            <?php } ?>
            <div class="form-group pull-right">

               <a href="<?php echo $csvlink; ?>" class="btn btn-info">CSV</a>

               <a href="<?php echo $pdflink; ?>" class="btn btn-info">PDF</a>

            </div>

            <form method="GET" action="<?php echo base_url().'admin/training_courses/index'; ?>" class="form-inline ibox-content">

               <div class="form-group">

                  <select name="searchBy" class="form-control">

                  <option value="course_name" <?php echo $searchBy=="course_name"?'selected="selected"':""; ?>>اسم الدورة</option>
                  <option value="specialization.main_specialization" <?php echo $searchBy=="specialization.main_specialization"?'selected="selected"':""; ?>>Course_specilization</option>
                  <option value="about_course" <?php echo $searchBy=="about_course"?'selected="selected"':""; ?>>نبذة عن الدورة</option>
                  <option value="centers.center_name" <?php echo $searchBy=="centers.center_name"?'selected="selected"':""; ?>>المركز التدريبي</option>
                  <option value="userz.full_name" <?php echo $searchBy=="userz.full_name"?'selected="selected"':""; ?>>المدرب</option
                  ><option value="start_date" <?php echo $searchBy=="start_date"?'selected="selected"':""; ?>>تاريخ البداية</option>
                  <option value="end_date" <?php echo $searchBy=="end_date"?'selected="selected"':""; ?>>تاريخ النهاية</option>
                 
                  </select>

               </div>

               <div class="form-group">

                  <input type="text" name="searchValue" id="searchValue" class="form-control" value="<?php echo $searchValue; ?>">

               </div>

               <input type="submit" name="search" value="بحث" class="btn btn-info">

               <div class="form-group pull-right">

                  <select name="per_page" class="form-control" onchange="this.form.submit()">

                     <option value="5" <?php echo $per_page=="5"?'selected="selected"':""; ?>>5</option>

                     <option value="10" <?php echo $per_page=="10"?'selected="selected"':""; ?>>10</option>

                     <option value="20" <?php echo $per_page=="20"?'selected="selected"':""; ?>>20</option>

                     <option value="50" <?php echo $per_page=="50"?'selected="selected"':""; ?>>50</option>

                     <option value="100" <?php echo $per_page=="100"?'selected="selected"':""; ?>>100</option>

                  </select>

               </div>

            </form>

         </div>

         <div class="ibox-content">

         <div class="table table-responsive">

            <table class="table table-striped table-bordered table-hover Tax" >

               <thead>

                  <tr>

                     <th><input onclick="toggle(this,'cbgroup1')" id="foo[]" name="foo[]" type="checkbox" value="" /></th>

                     <th> Sr No. </th>

                     <?php $sortSym=isset($_GET["order"]) && $_GET["order"]=="asc" ? "up" : "down"; ?>

				<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="course_name"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links["course_name"]; ?>" class="link_css"> اسم الدورة <?php echo $symbol ?></a></th>

						

				<?php

				 $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="specialization.main_specialization"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>



				<th> <a href="<?php echo $fields_links["specialization.main_specialization"]; ?>" class="link_css"> التخصص <?php echo $symbol ?></a></th>

   						

				<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="about_course"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links["about_course"]; ?>" class="link_css"> نبذة عن الدورة <?php echo $symbol ?></a></th>

						

				<?php

				 $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="centers.center_name"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>



				<th> <a href="<?php echo $fields_links["centers.center_name"]; ?>" class="link_css"> المعهد <?php echo $symbol ?></a></th>

   						

				<?php

				 $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="userz.full_name"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>



				<th> <a href="<?php echo $fields_links["userz.full_name"]; ?>" class="link_css"> المدرب <?php echo $symbol ?></a></th>

   						

				<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="start_date"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links["start_date"]; ?>" class="link_css"> تاريخ البداية <?php echo $symbol ?></a></th>

						

				<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="end_date"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links["end_date"]; ?>" class="link_css"> تاريخ النهاية <?php echo $symbol ?></a></th>

						


                     <th>  </th>

                  </tr>

               </thead>

               <tbody>

                  <?php if(isset($results) and !empty($results))

                     {

                     

                       $count=1;

                     

                       ?>

                  <?php 

                     foreach ($results as $key => $value) {

                     

                      ?>

                  <tr  id="hide<?php echo $value->id; ?>" >

                  <th><input name='input' id='del' onclick="callme('show')"  type='checkbox' class='del' value='<?php echo $value->id; ?>'/></th>

                              

            <th><?php if(!empty($value->id)){ echo $count; $count++; }?></th><th><?php if(!empty($value->course_name)){ echo $value->course_name; }?></th>

                <th><?php if(!empty($value->course_specilization)){ echo $value->course_specilization; }?></th>

                <th><?php if(!empty($value->about_course)){ echo $value->about_course; }?></th>

                <th><?php if(!empty($value->tcenter)){ echo $value->tcenter; }?></th>

                <th><?php if(!empty($value->instructor)){ echo $value->instructor; }?></th>

                <th><?php if(!empty($value->start_date)){ echo $value->start_date; }?></th>

                <th><?php if(!empty($value->end_date)){ echo $value->end_date; }?></th>

               

                <th class="action-width">

		   <a href="<?php echo base_url()?>admin/training_courses/view/<?php echo $value->id; ?>" title="View">

            <span class="btn btn-info " ><i class="fa fa-eye"></i></span>

           </a>

            <a href="<?php echo base_url()?>admin/userz/index/1/envolved/<?php echo $value->id; ?>" title="View">

            <span class="btn btn-info " ><i class="fa fa-users"></i></span>

           </a>

            <?php if($ion_auth->in_group('admin') || $ion_auth->in_group('Instructor')){?>  
           <a href="<?php echo base_url()?>admin/training_courses/edit/<?php echo $value->id; ?>" title="Edit">

            <span class="btn btn-info " ><i class="fa fa-edit"></i></span>

           </a>

           <a  title="Delete" data-toggle="modal" data-target="#commonDelete" onclick="set_common_delete('<?php echo $value->id; ?>','training_courses');">

           <span class="btn btn-info " ><i class="fa fa-trash-o "></i></span>

           </a>
           <?php } ?>


              <?php if($ion_auth->in_group('Trainee')) {?>
                  <a  title="Delete" >
           <span class="btn btn-info " >سجل الان</span>

           </a>
              <?php }?>

            </th>

                  </tr>

                  <?php 

                     }

                     

                     

                     } else{

                     echo '<tr><td colspan="100"><h3 align="center" class="text-danger">No Record found!</center</td></tr>';

                     } ?>  

               </tbody>

            </table>

            </div>

            <?php echo $links; ?>

         </div>

      </div>

      <img onclick="callme('','item','')" src="<?php echo $this->config->item('accet_url')?>/img/mac-trashcan_full-new.png" id="recycle" style="width:90px;  display:none; position:fixed; bottom: 50px; right: 50px;"/>

   </div>

</div>

<script type="text/javascript">

   function delRow()

   {

   var confrm = confirm("Are you sure you want to delete?");

   if(confrm)

   {

   ids = values();

   $.ajax({

     type:"POST",

     url:'<?php echo base_url()."admin/training_courses/deleteAll"; ?>',

     data:{

       allIds : ids,

       '<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>'

     },

     success:function(){

       location.reload();

       },

     });

   }

   }

</script>

<?php $this->load->view('footer'); ?>