<?php $this->load->view('header'); ?>
<!--  BO :heading -->
<div class="row wrapper border-bottom white-bg page-heading">
  <div class="col-sm-4">
    <h2>Cities</h2>
    <ol class="breadcrumb">
      <li>
        <a href="<?php echo base_url().'admin/'?>">Dashboard</a>
      </li>
      <li class="active">
        <strong>Cities</strong>
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
  <div class="wrapper wrapper-content animated fadeInRight">
    <div class="ibox ">
      <div class="ibox-title" >
        <h5>Add <small></small></h5>
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
          <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
            <div class="box-body">
              <?php if($this->session->flashdata('message')): ?>
              <div class="alert alert-success">
                <button type="button" class="close" data-close="alert"></button>
                <?php echo $this->session->flashdata('message'); ?>
              </div>
              <?php endif; ?> 
              





	<!-- City_name Start -->

	<div class="form-group">

	  <label for="city_name" class="col-sm-3 control-label"> City_name </label>

	  <div class="col-sm-4">

	    <input type="text" class="form-control" id="city_name" name="city_name" 

	    

	    value="<?php echo set_value("city_name"); ?>"

	    >

	  </div>

	  <div class="col-sm-5" >

	 

	    <?php echo form_error("city_name","<span class='label label-danger'>","</span>")?>

	  </div>

	</div> 

	<!-- City_name End -->





	



	<!-- Country_id Start -->

	<div class="form-group">

        <label class="control-label col-md-3"> Country_id </label>

          <div class="col-md-4">

              <select class="form-control select2" name="country_id" id="country_id">

              <option value="">Select Country_id</option>

      <?php 

      if(isset($countries) && !empty($countries)):

      foreach($countries as $key => $value): ?>

          <option value="<?php echo $value->id; ?>">

            <?php echo $value->country_name; ?>

          </option>

      <?php endforeach; ?>

      <?php endif; ?>

      </select>

        </div>

    </div>

      <!-- Country_id End -->









	<!-- City_code Start -->

	<div class="form-group">

	  <label for="city_code" class="col-sm-3 control-label"> City_code </label>

	  <div class="col-sm-4">

	    <input type="text" class="form-control" id="city_code" name="city_code" 

	    

	    value="<?php echo set_value("city_code"); ?>"

	    >

	  </div>

	  <div class="col-sm-5" >

	 

	    <?php echo form_error("city_code","<span class='label label-danger'>","</span>")?>

	  </div>

	</div> 

	<!-- City_code End -->





	



 <!-- City_status Start -->

 <div class="form-group">

          <label class="col-sm-3 control-label">Select City_status</label>

          <div class="col-sm-4">

            <span style="margin-right:20px;"><input type="radio" style="width:20px; height:20px;" name="city_status" value="1"> Enabled </span>

            <span style="margin-right:20px;"><input type="radio" style="width:20px; height:20px;" name="city_status" value="0"> Disabled </span>

        </div>

    </div>

      <!-- City_status End -->




              <div class="form-group">
                <div class="col-sm-3" >                       
                </div>
                <div class="col-sm-6">
                  <button type="reset" class="btn btn-default ">Reset</button>
                  <button type="submit" class="btn btn-info ">Submit</button>
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