<?php $this->load->view('header'); ?>

<!--  BO :heading -->

<div class="row wrapper border-bottom white-bg page-heading">

   <div class="col-sm-4">

      <h2>Centers</h2>

      <ol class="breadcrumb">

         <li>

            <a href="<?php echo base_url().'admin/'?>">الداشبورد</a>

         </li>

         <li class="active">

            <strong>المراكز التدريبية</strong>

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

            <h5 class="pull-left">تفاصيل المركز <small></small></h5>

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

	   <label for="center_name" class="col-sm-3 control-label"> اسم المركز </label>

	 </td>

	 <td> 

	   <?php echo set_value("center_name",html_entity_decode($centers->center_name)); ?>

	 </td>

	</tr>

	



    <!-- Specialization Start -->

	<tr>

	 <td>

	  <label class="control-label col-md-3"> التخصص </label>

	 </td>

	 <td> 

	   <?php 

	      if(isset($specialization) && !empty($specialization)):



	      foreach($specialization as $key => $value): 

	       if($value->id==$centers->specialization)

	             echo $value->main_specialization;



	       endforeach; 

	       endif; ?>

	 </td>

	</tr>

    <!-- Specialization End -->



	



    <!-- Logo Start -->

	<tr>

	 <td>

	  <label for="address" class="col-sm-3 control-label"> الشعار </label>

	 </td>

	 <td>

	 <?php if (isset($centers->logo) && $centers->logo!=""){?>

	            <br>

	    <img src="<?php echo $this->config->item("photo_url");?><?php echo $centers->logo; ?>" alt="pic" width="50" height="50" />

	    <?php } ?>

	 </td>

	</tr>

    <!-- Logo End -->



	



    <!-- Center_type Start -->

	<tr>

	 <td>

	  <label class="control-label col-md-3"> نوع المركز </label>

	 </td>

	 <td> 

	   <?php 

	      if(isset($center_type) && !empty($center_type)):



	      foreach($center_type as $key => $value): 

	       if($value->id==$centers->center_type)

	             echo $value->type_desc;



	       endforeach; 

	       endif; ?>

	 </td>

	</tr>

    <!-- Center_type End -->



	



    <!-- Owner Start -->

	<tr>

	 <td>

	  <label class="control-label col-md-3"> المالك </label>

	 </td>

	 <td> 

	   <?php 

	      if(isset($userz) && !empty($userz)):



	      foreach($userz as $key => $value): 

	       if($value->id==$centers->owner)

	             echo $value->full_name;



	       endforeach; 

	       endif; ?>

	 </td>

	</tr>

    <!-- Owner End -->



	



    <!-- Center_country Start -->

	<tr>

	 <td>

	  <label class="control-label col-md-3"> الدولة </label>

	 </td>

	 <td> 

	   <?php 

	      if(isset($countries) && !empty($countries)):



	      foreach($countries as $key => $value): 

	       if($value->id==$centers->center_country)

	             echo $value->country_name;



	       endforeach; 

	       endif; ?>

	 </td>

	</tr>

    <!-- Center_country End -->



	



    <!-- Center_city Start -->

	<tr>

	 <td>

	  <label class="control-label col-md-3"> المدينة </label>

	 </td>

	 <td> 

	   <?php 

	      if(isset($cities) && !empty($cities)):



	      foreach($cities as $key => $value): 

	       if($value->id==$centers->center_city)

	             echo $value->city_name;



	       endforeach; 

	       endif; ?>

	 </td>

	</tr>

    <!-- Center_city End -->



	



    <!-- About_center Start -->

	<tr>

	 <td>

	  <label for="about_center" class="col-sm-3 control-label"> نبذة عن المراكز </label>

	 </td>

	 <td> 

	   <?php echo set_value("about_center",  html_entity_decode($centers->about_center)); ?>

	 </td>

	</tr>

    <!-- About_center End -->



	

	<tr>

	 <td>

	   <label for="center_address" class="col-sm-3 control-label"> عنوان المركز </label>

	 </td>

	 <td> 

	   <?php echo set_value("center_address",html_entity_decode($centers->center_address)); ?>

	 </td>

	</tr>

	

	<tr>

	 <td>

	   <label for="center_branch" class="col-sm-3 control-label"> عنوان الفرع </label>

	 </td>

	 <td> 

	   <?php echo set_value("center_branch",html_entity_decode($centers->center_branch)); ?>

	 </td>

	</tr>

	

	<tr>

	 <td>

	   <label for="center_email" class="col-sm-3 control-label"> البريد الالكتروني </label>

	 </td>

	 <td> 

	   <?php echo set_value("center_email",html_entity_decode($centers->center_email)); ?>

	 </td>

	</tr>

	

	<tr>

	 <td>

	   <label for="center_website" class="col-sm-3 control-label"> الموقع الالكتروني </label>

	 </td>

	 <td> 

	   <?php echo set_value("center_website",html_entity_decode($centers->center_website)); ?>

	 </td>

	</tr>

	

	<tr>

	 <td>

	   <label for="center_phone" class="col-sm-3 control-label"> رقم الهاتف </label>

	 </td>

	 <td> 

	   <?php echo set_value("center_phone",html_entity_decode($centers->center_phone)); ?>

	 </td>

	</tr>

<tr>

	 <td>

	   <label for="cr" class="col-sm-3 control-label"> رقم السجل التجاري </label>

	 </td>

	 <td> 

	   <?php echo set_value("cr",html_entity_decode($centers->cr)); ?>

	 </td>

	</tr>


	<tr>

	 <td>

	   <label for="center_lat" class="col-sm-3 control-label"> Center_lat </label>

	 </td>

	 <td> 

	   <?php echo set_value("center_lat",html_entity_decode($centers->center_lat)); ?>

	 </td>

	</tr>

	

	<tr>

	 <td>

	   <label for="center_long" class="col-sm-3 control-label"> Center_long </label>

	 </td>

	 <td> 

	   <?php echo set_value("center_long",html_entity_decode($centers->center_long)); ?>

	 </td>

	</tr>

	<tr><td colspan="2"><a type="reset" class="btn btn-info pull-right" onclick="history.back()">العودة</a></td></tr></table>

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