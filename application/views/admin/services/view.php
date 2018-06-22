<?php $this->load->view('header'); ?>

<!--  BO :heading -->

<div class="row wrapper border-bottom white-bg page-heading">

   <div class="col-sm-4">

      <h2>Services</h2>

      <ol class="breadcrumb">

         <li>

            <a href="<?php echo base_url().'admin/'?>">Dashboard</a>

         </li>

         <li class="active">

            <strong>Services</strong>

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

            <h5>View <small></small></h5>

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

	   <label for="service_name" class="col-sm-3 control-label"> Service_name </label>

	 </td>

	 <td> 

	   <?php echo set_value("service_name",html_entity_decode($services->service_name)); ?>

	 </td>

	</tr>


  

	



    <!-- About_service Start -->

	<tr>

	 <td>

	  <label for="about_service" class="col-sm-3 control-label"> About_service </label>

	 </td>

	 <td> 

	   <?php echo set_value("about_service",  html_entity_decode($services->about_service)); ?>

	 </td>

	</tr>

    <!-- About_service End -->



	
	<tr>

	 <td>

	   <label for="price" class="col-sm-3 control-label"> Price </label>

	 </td>

	 <td> 

	   <?php echo set_value("price",html_entity_decode($services->price)); ?>

	 </td>

	</tr>


    <!-- Currency Start -->

	<tr>

	 <td>

	  <label class="control-label col-md-3"> Currency </label>

	 </td>

	 <td> 

	   <?php 

	      if(isset($currency) && !empty($currency)):



	      foreach($currency as $key => $value): 

	       if($value->id==$services->currency)

	             echo $value->currency_desc;



	       endforeach; 

	       endif; ?>

	 </td>

	</tr>

    <!-- Currency End -->



	<tr><td colspan="2"><a type="reset" class="btn btn-info pull-right" onclick="history.back()">Back</a></td></tr></table>

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