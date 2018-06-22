<?php $this->load->view('header'); ?>
<!--  BO :heading -->
<div class="row wrapper border-bottom white-bg page-heading">
   <div class="col-sm-4">
      <h2>Vistorsdata</h2>
      <ol class="breadcrumb">
         <li>
            <a href="<?php echo base_url().'admin/'?>">Dashboard</a>
         </li>
         <li class="active">
            <strong>Vistorsdata</strong>
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

	   <label for="name" class="col-sm-3 control-label"> Name </label>

	 </td>

	 <td> 

	   <?php echo set_value("name",html_entity_decode($vistorsdata->name)); ?>

	 </td>

	</tr>

	

	<tr>

	 <td>

	   <label for="phone" class="col-sm-3 control-label"> Phone </label>

	 </td>

	 <td> 

	   <?php echo set_value("phone",html_entity_decode($vistorsdata->phone)); ?>

	 </td>

	</tr>

	

	<tr>

	 <td>

	   <label for="email" class="col-sm-3 control-label"> Email </label>

	 </td>

	 <td> 

	   <?php echo set_value("email",html_entity_decode($vistorsdata->email)); ?>

	 </td>

	</tr>

	

	<tr>

	 <td>

	   <label for="organization" class="col-sm-3 control-label"> Organization </label>

	 </td>

	 <td> 

	   <?php echo set_value("organization",html_entity_decode($vistorsdata->organization)); ?>

	 </td>

	</tr>

	

	<tr>

	 <td>

	   <label for="job" class="col-sm-3 control-label"> Job </label>

	 </td>

	 <td> 

	   <?php echo set_value("job",html_entity_decode($vistorsdata->job)); ?>

	 </td>

	</tr>

	



    <!-- Degree Start -->

	<tr>

	 <td>

	  <label class="control-label col-md-3"> Degree </label>

	 </td>

	 <td> 

	   <?php 

	      if(isset($degree) && !empty($degree)):



	      foreach($degree as $key => $value): 

	       if($value->id==$vistorsdata->degree)

	             echo $value->degreeName;



	       endforeach; 

	       endif; ?>

	 </td>

	</tr>

    <!-- Degree End -->



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