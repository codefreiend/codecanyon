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
              





	<!-- Name Start -->

	<div class="form-group">

	  <label for="name" class="col-sm-3 control-label"> Name </label>

	  <div class="col-sm-4">

	    <input type="text" class="form-control" id="name" name="name" 

	    

	    value="<?php echo set_value("name"); ?>"

	    >

	  </div>

	  <div class="col-sm-5" >

	 

	    <?php echo form_error("name","<span class='label label-danger'>","</span>")?>

	  </div>

	</div> 

	<!-- Name End -->





	





	<!-- Phone Start -->

	<div class="form-group">

	  <label for="phone" class="col-sm-3 control-label"> Phone </label>

	  <div class="col-sm-4">

	    <input type="text" class="form-control" id="phone" name="phone" 

	    

	    value="<?php echo set_value("phone"); ?>"

	    >

	  </div>

	  <div class="col-sm-5" >

	 

	    <?php echo form_error("phone","<span class='label label-danger'>","</span>")?>

	  </div>

	</div> 

	<!-- Phone End -->





	





	<!-- Email Start -->

	<div class="form-group">

	  <label for="email" class="col-sm-3 control-label"> Email </label>

	  <div class="col-sm-4">

	    <input type="text" class="form-control" id="email" name="email" 

	    

	    value="<?php echo set_value("email"); ?>"

	    >

	  </div>

	  <div class="col-sm-5" >

	 

	    <?php echo form_error("email","<span class='label label-danger'>","</span>")?>

	  </div>

	</div> 

	<!-- Email End -->





	





	<!-- Organization Start -->

	<div class="form-group">

	  <label for="organization" class="col-sm-3 control-label"> Organization </label>

	  <div class="col-sm-4">

	    <input type="text" class="form-control" id="organization" name="organization" 

	    

	    value="<?php echo set_value("organization"); ?>"

	    >

	  </div>

	  <div class="col-sm-5" >

	 

	    <?php echo form_error("organization","<span class='label label-danger'>","</span>")?>

	  </div>

	</div> 

	<!-- Organization End -->





	





	<!-- Job Start -->

	<div class="form-group">

	  <label for="job" class="col-sm-3 control-label"> Job </label>

	  <div class="col-sm-4">

	    <input type="text" class="form-control" id="job" name="job" 

	    

	    value="<?php echo set_value("job"); ?>"

	    >

	  </div>

	  <div class="col-sm-5" >

	 

	    <?php echo form_error("job","<span class='label label-danger'>","</span>")?>

	  </div>

	</div> 

	<!-- Job End -->





	



	<!-- Degree Start -->

	<div class="form-group">

        <label class="control-label col-md-3"> Degree </label>

          <div class="col-md-4">

              <select class="form-control select2" name="degree" id="degree">

              <option value="">Select Degree</option>

      <?php 

      if(isset($degree) && !empty($degree)):

      foreach($degree as $key => $value): ?>

          <option value="<?php echo $value->id; ?>">

            <?php echo $value->degreeName; ?>

          </option>

      <?php endforeach; ?>

      <?php endif; ?>

      </select>

        </div>

    </div>

      <!-- Degree End -->




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