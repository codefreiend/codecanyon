<?php $this->load->view('header'); ?>

<!--  BO :heading -->

<div class="row wrapper border-bottom white-bg page-heading">

  <div class="col-sm-4">

    <h2>Userz</h2>

    <ol class="breadcrumb">

      <li>

        <a href="<?php echo base_url().'admin/'?>">Dashboard</a>

      </li>

      <li class="active">

        <strong>Userz</strong>

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

              





	<!-- Username Start -->

	<div class="form-group">

	  <label for="username" class="col-sm-3 control-label"> Username </label>

	  <div class="col-sm-4">

	    <input type="text" class="form-control" id="username" name="username" 

	    

	    value="<?php echo set_value("username"); ?>"

	    >

	  </div>

	  <div class="col-sm-5" >

	 

	    <?php echo form_error("username","<span class='label label-danger'>","</span>")?>

	  </div>

	</div> 

	<!-- Username End -->





	





	<!-- Password Start -->

	<div class="form-group">

	  <label for="password" class="col-sm-3 control-label"> Password </label>

	  <div class="col-sm-4">

	    <input type="password" class="form-control" id="password" name="password" 

	    

	    value="<?php echo set_value("password"); ?>"

	    >

	  </div>

	  <div class="col-sm-5" >

	 

	    <?php echo form_error("password","<span class='label label-danger'>","</span>")?>

	  </div>

	</div> 

	<!-- Password End -->





	





	<!-- Full_name Start -->

	<div class="form-group">

	  <label for="full_name" class="col-sm-3 control-label"> Full_name </label>

	  <div class="col-sm-4">

	    <input type="text" class="form-control" id="full_name" name="full_name" 

	    

	    value="<?php echo set_value("full_name"); ?>"

	    >

	  </div>

	  <div class="col-sm-5" >

	 

	    <?php echo form_error("full_name","<span class='label label-danger'>","</span>")?>

	  </div>

	</div> 

	<!-- Full_name End -->





	



	<!-- Birth_date Start -->

	<div class="form-group">

	  <label for="birth_date" class="col-sm-3 control-label"> Birth_date </label>

	  <div class="col-sm-4">

	    <input type="text" class="form-control span2 datepicker" id="birth_date" name="birth_date" value="<?php echo set_value("birth_date","2018-03-05"); ?>"	    >

	  </div>

	  <div class="col-sm-5" >

	 

	    <?php echo form_error("birth_date","<span class='label label-danger'>","</span>")?>

	  </div>

	</div> 

	<!-- Birth_date End -->



	



	<!-- Gender Start -->

	<div class="form-group">

        <label class="control-label col-md-3"> Gender </label>

          <div class="col-md-4">

              <select class="form-control select2" name="gender" id="gender">

              <option value="">Select Gender</option>

      <?php 

      if(isset($gender) && !empty($gender)):

      foreach($gender as $key => $value): ?>

          <option value="<?php echo $value->id; ?>">

            <?php echo $value->gender_desc; ?>

          </option>

      <?php endforeach; ?>

      <?php endif; ?>

      </select>

        </div>

    </div>

      <!-- Gender End -->









	<!-- Company Start -->

	<div class="form-group">

	  <label for="company" class="col-sm-3 control-label"> Company </label>

	  <div class="col-sm-4">

	    <input type="text" class="form-control" id="company" name="company" 

	    

	    value="<?php echo set_value("company"); ?>"

	    >

	  </div>

	  <div class="col-sm-5" >

	 

	    <?php echo form_error("company","<span class='label label-danger'>","</span>")?>

	  </div>

	</div> 

	<!-- Company End -->





	





	<!-- Mobile Start -->

	<div class="form-group">

	  <label for="mobile" class="col-sm-3 control-label"> Mobile </label>

	  <div class="col-sm-4">

	    <input type="text" class="form-control" id="mobile" name="mobile" 

	    

	    value="<?php echo set_value("mobile"); ?>"

	    >

	  </div>

	  <div class="col-sm-5" >

	 

	    <?php echo form_error("mobile","<span class='label label-danger'>","</span>")?>

	  </div>

	</div> 

	<!-- Mobile End -->





	





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





	



    <!-- Photo Start -->

    <div class="form-group">

      <label for="address" class="col-sm-3 control-label"> Photo </label>

      <div class="col-sm-6">

      <input type="file" name="photo" />

      <input type="hidden" name="old_photo" value="<?php if (isset($photo) && $photo!=""){echo $photo; } ?>" />

        <?php if(isset($photo_err) && !empty($photo_err)) 

        { foreach($photo_err as $key => $error)

        { echo "<div class=\"error-msg\"></div>"; } }?>

      </div>

        <div class="col-sm-3" >

      </div>

    </div>

    <!-- Photo End -->



    



	<!-- Country Start -->

	<div class="form-group">

        <label class="control-label col-md-3"> Country </label>

          <div class="col-md-4">

              <select class="form-control select2" name="country" id="country">

              <option value="">Select Country</option>

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

      <!-- Country End -->







	<!-- City Start -->

	<div class="form-group">

        <label class="control-label col-md-3"> City </label>

          <div class="col-md-4">

              <select class="form-control select2" name="city" id="city">

              <option value="">Select City</option>

      <?php 

      if(isset($cities) && !empty($cities)):

      foreach($cities as $key => $value): ?>

          <option value="<?php echo $value->id; ?>">

            <?php echo $value->city_name; ?>

          </option>

      <?php endforeach; ?>

      <?php endif; ?>

      </select>

        </div>

    </div>

      <!-- City End -->









	<!-- Address Start -->

	<div class="form-group">

	  <label for="address" class="col-sm-3 control-label"> Address </label>

	  <div class="col-sm-4">

	    <input type="text" class="form-control" id="address" name="address" 

	    

	    value="<?php echo set_value("address"); ?>"

	    >

	  </div>

	  <div class="col-sm-5" >

	 

	    <?php echo form_error("address","<span class='label label-danger'>","</span>")?>

	  </div>

	</div> 

	<!-- Address End -->


	<!-- User Role Start -->

	<div class="form-group">

        <label class="control-label col-md-3"> User Role </label>

          <div class="col-md-4">

              <select class="form-control select2" name="role" id="role">

              <option value="">Select User Type</option>

      <?php if(isset($groups) && !empty($groups)):

      foreach($groups as $key => $value): ?>

          <option value="<?php echo $value->id; ?>">

            <?php echo $value->name; ?>

          </option>

      <?php endforeach; ?>

      <?php endif; ?>

      </select>

        </div>

    </div>

      <!-- User Role End -->




	

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