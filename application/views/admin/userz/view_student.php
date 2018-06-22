<?php $this->load->view('header'); ?>

<!--  BO :heading -->

<div class="row wrapper border-bottom white-bg page-heading">

   <div class="col-sm-4">

      <h2>معلومات عن المتدرب </h2>

      <ol class="breadcrumb">

         <li>

            <a href="<?php echo base_url().'admin/'?>">الداش بورد</a>

         </li>

         <li class="active">

            <strong>المتدربين</strong>

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

            <h5 class="pull-right">الملف الشخصي <small></small></h5>

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

	   <label for="username" class="col-sm-3 control-label"> اسم المستخدم </label>

	 </td>

	 <td> 

	   <?php echo set_value("username",html_entity_decode($userz->username)); ?>

	 </td>

	</tr>

	


	

	<tr>

	 <td>

	   <label for="full_name" class="col-sm-3 control-label"> الاسم بالكامل </label>

	 </td>

	 <td> 

	   <?php echo set_value("full_name",html_entity_decode($userz->full_name)); ?>

	 </td>

	</tr>

	



    <!-- Birth_date Start -->

	<tr>

	 <td>

	  <label for="birth_date" class="col-sm-3 control-label"> تاريخ الميلاد </label>

	 </td>

	 <td> 

	   <?php echo set_value("birth_date", html_entity_decode($userz->birth_date)); ?>

	 </td>

	</tr>

    <!-- Birth_date End -->



	



    <!-- Gender Start -->

	<tr>

	 <td>

	  <label class="control-label col-md-3"> النوع </label>

	 </td>

	 <td> 

	   <?php 

	      if(isset($gender) && !empty($gender)):



	      foreach($gender as $key => $value): 

	       if($value->id==$userz->gender)

	             echo $value->gender_desc;



	       endforeach; 

	       endif; ?>

	 </td>

	</tr>
<?php if($ion_auth->in_group('Instructor')){?>
    <!-- Gender End -->
  <!-- about Start -->

	<tr>

	 <td>

	  <label for="about" class="col-sm-12 control-label"> نبذة   </label>

	 </td>

	 <td> 

	   <?php echo set_value("about",  html_entity_decode($userz->about)); ?>

	 </td>

	</tr>

    <!-- about End -->
 <!-- cv Start -->

	<tr>

	 <td>

	  <label for="cv" class="col-sm-3 control-label"> السيرة الذاتية  </label>

	 </td>

	 <td>

	 <?php if (isset($userz->cv) && $userz->cv!=""){?>

	            <br>
          <a href="<?php echo $this->config->item("file_url").$userz->cv;?>"><?php echo $userz->cv; ?></a>


	    <?php } ?>

	 </td>

	</tr>

    <!-- cv End -->
	 <?php }?>

	

	<tr>

	 <td>

	   <label for="company" class="col-sm-3 control-label"> جهة العمل </label>

	 </td>

	 <td> 

	   <?php echo set_value("company",html_entity_decode($userz->company)); ?>

	 </td>

	</tr>

	

	<tr>

	 <td>

	   <label for="mobile" class="col-sm-3 control-label"> رقم الجوال </label>

	 </td>

	 <td> 

	   <?php echo set_value("mobile",html_entity_decode($userz->mobile)); ?>

	 </td>

	</tr>

	

	<tr>

	 <td>

	   <label for="phone" class="col-sm-3 control-label"> رقم الهاتف </label>

	 </td>

	 <td> 

	   <?php echo set_value("phone",html_entity_decode($userz->phone)); ?>

	 </td>

	</tr>

	



    <!-- Photo Start -->

	<tr>

	 <td>

	  <label for="address" class="col-sm-3 control-label"> صورة شخصية </label>

	 </td>

	 <td>

	 <?php if (isset($userz->photo) && $userz->photo!=""){?>

	            <br>

	    <img src="<?php echo $this->config->item("photo_url");?><?php echo $userz->photo; ?>" alt="pic" width="50" height="50" />

	    <?php } ?>

	 </td>

	</tr>

    <!-- Photo End -->



	



    <!-- Country Start -->

	<tr>

	 <td>

	  <label class="control-label col-md-3"> الدولة </label>

	 </td>

	 <td> 

	   <?php 

	      if(isset($countries) && !empty($countries)):



	      foreach($countries as $key => $value): 

	       if($value->id==$userz->country)

	             echo $value->country_name;



	       endforeach; 

	       endif; ?>

	 </td>

	</tr>

    <!-- Country End -->



	



    <!-- City Start -->

	<tr>

	 <td>

	  <label class="control-label col-md-3"> المدينة </label>

	 </td>

	 <td> 

	   <?php 

	      if(isset($cities) && !empty($cities)):



	      foreach($cities as $key => $value): 

	       if($value->id==$userz->city)

	             echo $value->city_name;



	       endforeach; 

	       endif; ?>

	 </td>

	</tr>

    <!-- City End -->



	

	<tr>

	 <td>

	   <label for="address" class="col-sm-3 control-label"> العنوان </label>

	 </td>

	 <td> 

	   <?php echo set_value("address",html_entity_decode($userz->address)); ?>

	 </td>

	</tr>

	<tr><td colspan="2">
		<a type="reset" class="btn btn-info pull-right" onclick="history.back()">العودة</a>
		</td></tr></table>

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