<?php $this->load->view('header'); ?>

<!--  BO :heading -->

<div class="row wrapper border-bottom white-bg page-heading">

  <div class="col-sm-4">

    <h2>الاشتراك في خدمة</h2>

    <ol class="breadcrumb">

      <li>

        <a href="<?php echo base_url().'admin/'?>">الداشبورد</a>

      </li>

      <li class="active">

        <strong>الاشتراك في خدمة جديدة</strong>

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

        <h5 class="pull-left">الاشتراك في خدمة <small></small></h5>

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

              



	<!-- service name Start -->

	<div class="form-group">

        <label class="control-label col-md-3"> اسم الخدمة </label>

          <div class="col-md-4">

          <p><?=$service_record->service_name?></p>


        </div>

    </div>

      <!-- service name End -->

	<!--  about service Start -->

	<div class="form-group">

        <label class="control-label col-md-3"> نبذة عن الخدمة </label>

          <div class="col-md-4">

          <p><?=$service_record->about_service?></p>

        </div>

    </div>

      <!-- about serrvice End -->

	<!-- service price Start -->

	<div class="form-group">

        <label class="control-label col-md-3"> سعر الخدمة </label>

          <div class="col-md-4">

          <p><?=$service_record->price?>
          
            <?php 

	      if(isset($currency) && !empty($currency)):
          foreach($currency as $key => $value): 
            if($value->id==$service->currency)
                  echo $value->currency_desc;  
          endforeach; 
	       endif; ?>
          
          </p>

        </div>

    </div>

      <!-- service price End -->
          <input type="hidden" name="service_id" value="<?php echo set_value("service_id",html_entity_decode($service_record->id)); ?>">

	<!-- service price Start -->

	<div class="form-group">
        <label class="control-label col-md-3"> عدد سنوات الاشتراك  </label>
          <div class="col-md-4">
	          <input type="number" class="form-control" id="num_of_years" name="num_of_years" value="1" />
        </div>
    </div>

      <!-- service price End -->



              <div class="form-group">

                <div class="col-sm-3" >                       

                </div>

                <div class="col-sm-6">

                  <!-- <button type="reset" class="btn btn-default ">Reset</button> -->

                  <button type="submit" class="btn btn-info ">اكمال السداد</button>

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