<?php $this->load->view('header'); ?>

<!--  BO :heading -->

<div class="row wrapper border-bottom white-bg page-heading">

  <div class="col-sm-4">

    <h2>الدورت التدريبية</h2>

    <ol class="breadcrumb">

      <li>

        <a href="<?php echo base_url().'admin/'?>">الداش بورد</a>

      </li>

      <li class="active">

        <strong>الدورات التدريبية</strong>

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

        <h5>اضافة دورة تدريبية <small></small></h5>

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

              





	<!-- Course_name Start -->

	<div class="form-group">

	  <label for="course_name" class="col-sm-3 control-label"> اسم الدورة </label>

	  <div class="col-sm-4">

	    <input type="text" class="form-control" id="course_name" name="course_name" 

	    

	    value="<?php echo set_value("course_name"); ?>"

	    >

	  </div>

	  <div class="col-sm-5" >

	 

	    <?php echo form_error("course_name","<span class='label label-danger'>","</span>")?>

	  </div>

	</div> 

	<!-- Course_name End -->





	



	<!-- Course_specilization Start -->

	<div class="form-group">

        <label class="control-label col-md-3"> مجال الدورة </label>

          <div class="col-md-4">

              <select class="form-control select2" name="course_specilization" id="course_specilization">

              <option value="">اختر مجال الدورة </option>

      <?php 

      if(isset($specialization) && !empty($specialization)):

      foreach($specialization as $key => $value): ?>

          <option value="<?php echo $value->id; ?>">

            <?php echo $value->main_specialization; ?>

          </option>

      <?php endforeach; ?>

      <?php endif; ?>

      </select>

        </div>

    </div>

      <!-- Course_specilization End -->







				<!-- About_course Start -->

			<div class="form-group">

			  <label for="about_course" class="col-sm-3 control-label"> نبذة عن الدورة </label>

			  <div class="col-sm-4">

			    <textarea class="form-control" id="about_course" name="about_course"><?php echo set_value("about_course"); ?></textarea>

			  </div>

			  <div class="col-sm-5" >

			 

			    <?php echo form_error("about_course","<span class='label label-danger'>","</span>")?>

			  </div>

			</div> 

			<!-- About_course End -->



			



	<!-- Tcenter Start -->

	<div class="form-group">

        <label class="control-label col-md-3"> المركز التدريبي </label>

          <div class="col-md-4">

              <select class="form-control select2" name="tcenter" id="tcenter">

              <option value=""> اختر المركز التدريبي</option>

      <?php 

      if(isset($centers) && !empty($centers)):

      foreach($centers as $key => $value): ?>

          <option value="<?php echo $value->id; ?>">

            <?php echo $value->center_name; ?>

          </option>

      <?php endforeach; ?>

      <?php endif; ?>

      </select>

        </div>

    </div>

      <!-- Tcenter End -->







	<!-- Instructor Start -->

	<div class="form-group">

        <label class="control-label col-md-3"> المدرب </label>

          <div class="col-md-4">

              <select class="form-control select2" name="instructor" id="instructor">

              <option value=""> اختر المدرب</option>

      <?php 

      if(isset($userz) && !empty($userz)):

      foreach($userz as $key => $value): ?>

          <option value="<?php echo $value->id; ?>">

            <?php echo $value->full_name; ?>

          </option>

      <?php endforeach; ?>

      <?php endif; ?>

      </select>

        </div>

    </div>

      <!-- Instructor End -->







	<!-- Start_date Start -->

	<div class="form-group">

	  <label for="start_date" class="col-sm-3 control-label"> تاريخ بداية الدورة </label>

	  <div class="col-sm-4">

	    <input type="text" class="form-control datetimepicker" id="start_date"  name="start_date"/>

	  </div>

	  <div class="col-sm-5" >

	    <?php echo form_error("start_date","<span class='label label-danger'>","</span>")?>

	  </div>

	</div>

	<!-- Start_date End -->



	



	<!-- End_date Start -->

	<div class="form-group">

	  <label for="end_date" class="col-sm-3 control-label"> تاريخ نهاية الدورة </label>

	  <div class="col-sm-4">

	    <input type="text" class="form-control datetimepicker" id="end_date"  name="end_date"/>

	  </div>

	  <div class="col-sm-5" >

	    <?php echo form_error("end_date","<span class='label label-danger'>","</span>")?>

	  </div>

	</div>

	<!-- End_date End -->



	





	<!-- Time_from Start -->

	<div class="form-group">

	  <label for="time_from" class="col-sm-3 control-label"> بداية وقت الدورة </label>

	  <div class="col-sm-4">

	    <input type="text" class="form-control" id="time_from" name="time_from" 

	    

	    value="<?php echo set_value("time_from"); ?>"

	    >

	  </div>

	  <div class="col-sm-5" >

	 

	    <?php echo form_error("time_from","<span class='label label-danger'>","</span>")?>

	  </div>

	</div> 

	<!-- Time_from End -->





	





	<!-- Time_to Start -->

	<div class="form-group">

	  <label for="time_to" class="col-sm-3 control-label"> نهاية وقت الدورة </label>

	  <div class="col-sm-4">

	    <input type="text" class="form-control" id="time_to" name="time_to" 

	    

	    value="<?php echo set_value("time_to"); ?>"

	    >

	  </div>

	  <div class="col-sm-5" >

	 

	    <?php echo form_error("time_to","<span class='label label-danger'>","</span>")?>

	  </div>

	</div> 

	<!-- Time_to End -->





	





	<!-- No_of_seats Start -->

	<div class="form-group">

	  <label for="no_of_seats" class="col-sm-3 control-label"> عدد المقاعد </label>

	  <div class="col-sm-4">

	    <input type="text" class="form-control" id="no_of_seats" name="no_of_seats" 

	    

	    value="<?php echo set_value("no_of_seats"); ?>"

	    >

	  </div>

	  <div class="col-sm-5" >

	 

	    <?php echo form_error("no_of_seats","<span class='label label-danger'>","</span>")?>

	  </div>

	</div> 

	<!-- No_of_seats End -->





	
	<!-- price Start -->

	<div class="form-group">

	  <label for="price" class="col-sm-3 control-label"> سعر الدورة </label>

	  <div class="col-sm-4">

	    <input type="text" class="form-control" id="price" name="price" 

	    

	    value="<?php echo set_value("price"); ?>"

	    >

	  </div>

	  <div class="col-sm-5" >

	 

	    <?php echo form_error("price","<span class='label label-danger'>","</span>")?>

	  </div>

	</div> 

	<!-- price End -->



	<!-- Currency Start -->

	<div class="form-group">

        <label class="control-label col-md-3"> العملة </label>

          <div class="col-md-4">

              <select class="form-control select2" name="currency" id="currency">

              <option value=""> اختر العملة</option>

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

                  <button type="reset" class="btn btn-default ">جديد</button>

                  <button type="submit" class="btn btn-info ">موافق</button>

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