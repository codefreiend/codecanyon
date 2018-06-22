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

              





	<!-- Service_name Start -->

	<div class="form-group">

	  <label for="service_name" class="col-sm-3 control-label"> Service_name </label>

	  <div class="col-sm-4">

	    <input type="text" class="form-control" id="service_name" name="service_name" 

	    

	    value="<?php echo set_value("service_name"); ?>"

	    >

	  </div>

	  <div class="col-sm-5" >

	 

	    <?php echo form_error("service_name","<span class='label label-danger'>","</span>")?>

	  </div>

	</div> 

	<!-- Service_name End -->





	



				<!-- About_service Start -->

			<div class="form-group">

			  <label for="about_service" class="col-sm-3 control-label"> About_service </label>

			  <div class="col-sm-4">

			    <textarea class="form-control" id="about_service" name="about_service"><?php echo set_value("about_service"); ?></textarea>

			  </div>

			  <div class="col-sm-5" >

			 

			    <?php echo form_error("about_service","<span class='label label-danger'>","</span>")?>

			  </div>

			</div> 

			<!-- About_service End -->


  
	<div class="form-group">

	  <label for="price" class="col-sm-3 control-label"> Price </label>

	  <div class="col-sm-4">

	    <input type="text" class="form-control" id="price" name="price" 

	    

	    value="<?php echo set_value("price"); ?>"

	    >

	  </div>

	  <div class="col-sm-5" >

	 

	    <?php echo form_error("price","<span class='label label-danger'>","</span>")?>

	  </div>

	</div> 
			



	<!-- Currency Start -->

	<div class="form-group">

        <label class="control-label col-md-3"> Currency </label>

          <div class="col-md-4">

              <select class="form-control select2" name="currency" id="currency">

              <option value="">Select Currency</option>

      <?php 

      if(isset($currency) && !empty($currency)):

      foreach($currency as $key => $value): ?>

          <option value="<?php echo $value->id; ?>">

            <?php echo $value->currency_desc; ?>

          </option>

      <?php endforeach; ?>

      <?php endif; ?>

      </select>

        </div>

    </div>

      <!-- Currency End -->





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