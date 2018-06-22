<?php $this->load->view('header'); ?>

<!--  BO :heading -->

<div class="row wrapper border-bottom white-bg page-heading">

   <div class="col-sm-4">

      <h2>تفاصيل الدورة</h2>

      <ol class="breadcrumb">

         <li>

            <a href="<?php echo base_url().'admin/'?>">الداش بورد</a>

         </li>

         <li class="active">

            <strong>تفاصيل الدورة</strong>

         </li>

      </ol>

   </div>

   <div class="col-sm-8">

      <div class="title-action">

      </div>

   </div>

</div>

<!--  EO :heading -->

<div class="row">

   <div class="col-lg-12 row wrapper ">

      <div class="ibox ">

         <div class="ibox-title" >

            <h5 class="pull-left">تفاصيل الدورة <small></small></h5>

            <div class="ibox-tools">                           

            </div>

         </div>

         <!-- ............................................................. -->

         <!-- BO : content  -->

         <div class="col-sm-12 white-bg ">

            <div class="box box-info">

               <div class="box-header with-border">

                  <h3 class="box-title">  </h3>

               </div>

               <!-- /.box-header -->

               <!-- form start -->

               <form action="" id="" class="form-horizontal " method="post" enctype="multipart/form-data">

                  <div class="box-body">

                     <?php if($this->session->flashdata('message')): ?>

                     <div class="alert alert-success">

                        <button type="button" class="close" data-close="alert"></button>

                        <?php echo $this->session->flashdata('message'); ?>

                     </div>

                     <?php endif; ?> 

                     

<table class='table table-bordered' style='width:70%;' align='center'>

	<tr>

	 <td>

	   <label for="course_name" class="col-sm-12 control-label"> اسم الدورة </label>

	 </td>

	 <td> 

	   <?php echo set_value("course_name",html_entity_decode($training_courses->course_name)); ?>

	 </td>

	</tr>

	



    <!-- Course_specilization Start -->

	<tr>

	 <td>

	  <label class="control-label col-md-12"> التخصص </label>

	 </td>

	 <td> 

	   <?php 

	      if(isset($specialization) && !empty($specialization)):



	      foreach($specialization as $key => $value): 

	       if($value->id==$training_courses->course_specilization)

	             echo $value->main_specialization;



	       endforeach; 

	       endif; ?>

	 </td>

	</tr>

    <!-- Course_specilization End -->



	



    <!-- About_course Start -->

	<tr>

	 <td>

	  <label for="about_course" class="col-sm-12 control-label"> نبذة عن الدورة </label>

	 </td>

	 <td> 

	   <?php echo set_value("about_course",  html_entity_decode($training_courses->about_course)); ?>

	 </td>

	</tr>

    <!-- About_course End -->



	



    <!-- Tcenter Start -->

	<tr>

	 <td>

	  <label class="control-label col-md-12"> المركز التدريبي </label>

	 </td>

	 <td> 

	   <?php 

	      if(isset($centers) && !empty($centers)):



	      foreach($centers as $key => $value): 

	       if($value->id==$training_courses->tcenter)

	             echo $value->center_name;



	       endforeach; 

	       endif; ?>

	 </td>

	</tr>

    <!-- Tcenter End -->



	



    <!-- Instructor Start -->

	<tr>

	 <td>

	  <label class="control-label col-md-12"> المدرب </label>

	 </td>

	 <td> 

	   <?php 

	      if(isset($userz) && !empty($userz)):



	      foreach($userz as $key => $value): 

	       if($value->id==$training_courses->instructor)

	             echo $value->full_name;



	       endforeach; 

	       endif; ?>

	 </td>

	</tr>

    <!-- Instructor End -->



	



    <!-- Start_date Start -->

	<tr>

	 <td>

	  <label for="start_date" class="col-sm-12 control-label"> تاريخ البداية </label>

	 </td>

	 <td> 

	   <?php echo set_value("start_date", html_entity_decode($training_courses->start_date)); ?>

	 </td>

	</tr>

    <!-- Start_date End -->



	



    <!-- End_date Start -->

	<tr>

	 <td>

	  <label for="end_date" class="col-sm-12 control-label"> تاريخ النهاية </label>

	 </td>

	 <td> 

	   <?php echo set_value("end_date", html_entity_decode($training_courses->end_date)); ?>

	 </td>

	</tr>

    <!-- End_date End -->



	

	<tr>

	 <td>

	   <label for="time_from" class="col-sm-12 control-label"> الوقت من </label>

	 </td>

	 <td> 

	   <?php echo set_value("time_from",html_entity_decode($training_courses->time_from)); ?>

	 </td>

	</tr>

	

	<tr>

	 <td>

	   <label for="time_to" class="col-sm-12 control-label"> الوقت الى </label>

	 </td>

	 <td> 

	   <?php echo set_value("time_to",html_entity_decode($training_courses->time_to)); ?>

	 </td>

	</tr>

	

	<tr>

	 <td>

	   <label for="no_of_seats" class="col-sm-12 control-label"> عدد المقاعد </label>

	 </td>

	 <td> 

	   <?php echo set_value("no_of_seats",html_entity_decode($training_courses->no_of_seats)); ?>

	 </td>

	</tr>


	<tr>

	 <td>

	   <label for="price" class="col-sm-12 control-label"> السعر  </label>

	 </td>

	 <td> 

	   <?php echo set_value("price",html_entity_decode($training_courses->price)); ?>

	 </td>

	</tr>

	



    <!-- Currency Start -->

	<tr>

	 <td>

	  <label class="control-label col-md-12"> العملة </label>

	 </td>

	 <td> 

	   <?php 

	      if(isset($currency) && !empty($currency)):



	      foreach($currency as $key => $value): 

	       if($value->id==$training_courses->currency)

	             echo $value->currency_desc;



	       endforeach; 

	       endif; ?>

	 </td>

	</tr>

    <!-- Currency End -->



	<tr><td colspan="2"><a type="reset" class="btn btn-info pull-right" onclick="history.back()">عودة</a></td></tr></table>

                     <div class="form-group">

                        <div class="col-sm-3" >                       

                        </div>

                        <div class="col-sm-6">

                        </div>

                        <div class="col-sm-3" >                       

                        </div>

                     </div>

                  </div>

                  <!-- /.box-body -->

                  <div class="box-footer">

                  </div>

                  <!-- /.box-footer -->

               </form>

            </div>

            <!-- /.box -->

            <br><br><br><br>

         </div>

         <!-- EO : content  -->

         <!-- ...................................................................... -->

      </div>

   </div>

</div>

<?php $this->load->view('footer'); ?>