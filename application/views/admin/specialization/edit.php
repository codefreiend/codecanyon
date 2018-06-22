<?php $this->load->view('header'); ?>
<!--  BO :heading -->
<div class="row wrapper border-bottom white-bg page-heading">
  <div class="col-sm-4">
    <h2>Specialization</h2>
    <ol class="breadcrumb">
      <li>
        <a href="<?php echo base_url().'admin/'?>">Dashboard</a>
      </li>
      <li class="active">
        <strong>Specialization</strong>
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
              



<!-- Main_specialization Start -->

<div class="form-group">

  <label for="main_specialization" class="col-sm-3 control-label"> Main_specialization </label>

  <div class="col-sm-4">

    <input type="text" class="form-control" id="main_specialization" name="main_specialization" 

    

    value="<?php echo set_value("main_specialization",html_entity_decode($specialization->main_specialization)); ?>"

    >

  </div>

  <div class="col-sm-5" >

 

    <?php echo form_error("main_specialization","<span class='label label-danger'>","</span>")?>

  </div>

</div> 

<!-- Main_specialization End -->







<!-- Branch_specialization Start -->

<div class="form-group">

  <label for="branch_specialization" class="col-sm-3 control-label"> Branch_specialization </label>

  <div class="col-sm-4">

    <input type="text" class="form-control" id="branch_specialization" name="branch_specialization" 

    

    value="<?php echo set_value("branch_specialization",html_entity_decode($specialization->branch_specialization)); ?>"

    >

  </div>

  <div class="col-sm-5" >

 

    <?php echo form_error("branch_specialization","<span class='label label-danger'>","</span>")?>

  </div>

</div> 

<!-- Branch_specialization End -->




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