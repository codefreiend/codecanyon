<?php $this->load->view('header'); ?>
<!--  BO :heading -->
<div class="row wrapper border-bottom white-bg page-heading">
  <div class="col-sm-4">
    <h2>Countries</h2>
    <ol class="breadcrumb">
      <li>
        <a href="<?php echo base_url().'admin/'?>">Dashboard</a>
      </li>
      <li class="active">
        <strong>Countries</strong>
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
        <h5> Edit <small></small></h5>
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
              



<!-- Country_name Start -->

<div class="form-group">

  <label for="country_name" class="col-sm-3 control-label"> Country_name </label>

  <div class="col-sm-4">

    <input type="text" class="form-control" id="country_name" name="country_name" 

    

    value="<?php echo set_value("country_name",html_entity_decode($countries->country_name)); ?>"

    >

  </div>

  <div class="col-sm-5" >

 

    <?php echo form_error("country_name","<span class='label label-danger'>","</span>")?>

  </div>

</div> 

<!-- Country_name End -->







<!-- Country_code Start -->

<div class="form-group">

  <label for="country_code" class="col-sm-3 control-label"> Country_code </label>

  <div class="col-sm-4">

    <input type="text" class="form-control" id="country_code" name="country_code" 

    

    value="<?php echo set_value("country_code",html_entity_decode($countries->country_code)); ?>"

    >

  </div>

  <div class="col-sm-5" >

 

    <?php echo form_error("country_code","<span class='label label-danger'>","</span>")?>

  </div>

</div> 

<!-- Country_code End -->







	 <!-- Country_status Start -->

	 <div class="form-group">

	          <label class="col-sm-3 control-label">Select Country_status</label>

	          <div class="col-sm-4">

	            <span style="margin-right:20px;"><input type="radio" style="width:20px; height:20px;" <?php echo $countries->country_status=="Enabled"?'checked="checked"':""; ?> name="country_status" value="Enabled"> Enabled </span>

	            <span style="margin-right:20px;"><input type="radio" style="width:20px; height:20px;" <?php echo $countries->country_status=="Disabled"?'checked="checked"':""; ?> name="country_status" value="Disabled"> Disabled </span>

	        </div>

	    </div>

	      <!-- Country_status End -->



	
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
<?php $this->load->view('footer'); 