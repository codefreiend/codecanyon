<?php $this->load->view('header'); ?>

<!--  BO :heading -->

<div class="row wrapper border-bottom white-bg page-heading">

  <div class="col-sm-4">

    <h2>المراكز التدريبية</h2>

    <ol class="breadcrumb">

      <li>

        <a href="<?php echo base_url().'admin/'?>">الداش بورد</a>

      </li>

      <li class="active">

        <strong>المراكز التدريبية</strong>

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

        <h5 class="pull-left"> تعديل بيانات مركز تدريبي <small></small></h5>

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

              



<!-- Center_name Start -->

<div class="form-group">

  <label for="center_name" class="col-sm-3 control-label"> اسم المركز </label>

  <div class="col-sm-4">

    <input type="text" class="form-control" id="center_name" name="center_name" 

    

    value="<?php echo set_value("center_name",html_entity_decode($centers->center_name)); ?>"

    >

  </div>

  <div class="col-sm-5" >

 

    <?php echo form_error("center_name","<span class='label label-danger'>","</span>")?>

  </div>

</div> 

<!-- Center_name End -->







	<!-- Specialization Start -->

	<div class="form-group">

        <label class="control-label col-md-3"> التخصص </label>

          <div class="col-md-4">

              <select class="form-control select2" name="specialization" id="specialization">

              <option value="">اختر التخصص </option>

      <?php 

      if(isset($specialization) && !empty($specialization)):

      foreach($specialization as $key => $value): ?>

          <option value="<?php echo $value->id; ?>" <?php echo $value->id==$centers->specialization?'selected="selected"':""; ?>>

            <?php echo $value->main_specialization; ?>

          </option>

      <?php endforeach; ?>

      <?php endif; ?>

      </select>

        </div>

    </div>

      <!-- Specialization End -->







    <!-- Logo Start -->

    <div class="form-group">

      <label for="address" class="col-sm-3 control-label"> شعار المركز </label>

      <div class="col-sm-6">

      <input type="file" name="logo" />

      <input type="hidden" name="old_logo" 

      value="<?php if (isset($logo) && $logo!=""){echo $logo; }?>" />  

        <?php if(isset($logo_err) && !empty($logo_err)) 

        {foreach($logo_err as $key => $error)

        {echo "<div class=\"error-msg\"></div>"; } }?>

        <?php if (isset($centers->logo) && $centers->logo!=""){?>

            <br>

  <img src="<?php echo $this->config->item("photo_url");?><?php echo $centers->logo; ?>" alt="pic" width="50" height="50" />

    <?php } ?>

      </div>

        <div class="col-sm-3" >

      </div>

    </div>

    <!-- Logo End -->



    



	<!-- Center_type Start -->

	<div class="form-group">

        <label class="control-label col-md-3"> نوع المركز </label>

          <div class="col-md-4">

              <select class="form-control select2" name="center_type" id="center_type">

              <option value="">اختر شعار المركز </option>

      <?php 

      if(isset($center_type) && !empty($center_type)):

      foreach($center_type as $key => $value): ?>

          <option value="<?php echo $value->id; ?>" <?php echo $value->id==$centers->center_type?'selected="selected"':""; ?>>

            <?php echo $value->type_desc; ?>

          </option>

      <?php endforeach; ?>

      <?php endif; ?>

      </select>

        </div>

    </div>

      <!-- Center_type End -->







	<!-- Owner Start -->

	<div class="form-group">

        <label class="control-label col-md-3"> مالك المركز </label>

          <div class="col-md-4">

              <select class="form-control select2" name="owner" id="owner">

              <option value="">اختر المالك </option>

      <?php 

      if(isset($userz) && !empty($userz)):

      foreach($userz as $key => $value): ?>

          <option value="<?php echo $value->id; ?>" <?php echo $value->id==$centers->owner?'selected="selected"':""; ?>>

            <?php echo $value->full_name; ?>

          </option>

      <?php endforeach; ?>

      <?php endif; ?>

      </select>

        </div>

    </div>

      <!-- Owner End -->







	<!-- Center_country Start -->

	<div class="form-group">

        <label class="control-label col-md-3"> البلد </label>

          <div class="col-md-4">

              <select class="form-control select2" name="center_country" id="center_country">

              <option value="">اختر البلد </option>

      <?php 

      if(isset($countries) && !empty($countries)):

      foreach($countries as $key => $value): ?>

          <option value="<?php echo $value->id; ?>" <?php echo $value->id==$centers->center_country?'selected="selected"':""; ?>>

            <?php echo $value->country_name; ?>

          </option>

      <?php endforeach; ?>

      <?php endif; ?>

      </select>

        </div>

    </div>

      <!-- Center_country End -->







	<!-- Center_city Start -->

	<div class="form-group">

        <label class="control-label col-md-3"> المدينة </label>

          <div class="col-md-4">

              <select class="form-control select2" name="center_city" id="center_city">

              <option value="">اختر المدينة </option>

      <?php 

      if(isset($cities) && !empty($cities)):

      foreach($cities as $key => $value): ?>

          <option value="<?php echo $value->id; ?>" <?php echo $value->id==$centers->center_city?'selected="selected"':""; ?>>

            <?php echo $value->city_name; ?>

          </option>

      <?php endforeach; ?>

      <?php endif; ?>

      </select>

        </div>

    </div>

      <!-- Center_city End -->





<!-- About_center Start -->



<div class="form-group">

  <label for="about_center" class="col-sm-3 control-label"> عن المركز </label>

  <div class="col-sm-4">

    <textarea class="form-control" id="about_center" name="about_center"><?php echo set_value("about_center",html_entity_decode($centers->about_center)); ?></textarea>

  </div>

  <div class="col-sm-5" >

 

    <?php echo form_error("about_center","<span class='label label-danger'>","</span>")?>

  </div>

</div> 



<!-- About_center End -->





<!-- Center_address Start -->

<div class="form-group">

  <label for="center_address" class="col-sm-3 control-label"> عنوان المقر الرئيسي </label>

  <div class="col-sm-4">

    <input type="text" class="form-control" id="center_address" name="center_address" 

    

    value="<?php echo set_value("center_address",html_entity_decode($centers->center_address)); ?>"

    >

  </div>

  <div class="col-sm-5" >

 

    <?php echo form_error("center_address","<span class='label label-danger'>","</span>")?>

  </div>

</div> 

<!-- Center_address End -->







<!-- Center_branch Start -->

<div class="form-group">

  <label for="center_branch" class="col-sm-3 control-label"> عنوان الفرع </label>

  <div class="col-sm-4">

    <input type="text" class="form-control" id="center_branch" name="center_branch" 

    

    value="<?php echo set_value("center_branch",html_entity_decode($centers->center_branch)); ?>"

    >

  </div>

  <div class="col-sm-5" >

 

    <?php echo form_error("center_branch","<span class='label label-danger'>","</span>")?>

  </div>

</div> 

<!-- Center_branch End -->







<!-- Center_email Start -->

<div class="form-group">

  <label for="center_email" class="col-sm-3 control-label"> البريد الالكتروني </label>

  <div class="col-sm-4">

    <input type="text" class="form-control" id="center_email" name="center_email" 

    

    value="<?php echo set_value("center_email",html_entity_decode($centers->center_email)); ?>"

    >

  </div>

  <div class="col-sm-5" >

 

    <?php echo form_error("center_email","<span class='label label-danger'>","</span>")?>

  </div>

</div> 

<!-- Center_email End -->







<!-- Center_website Start -->

<div class="form-group">

  <label for="center_website" class="col-sm-3 control-label"> الموقع الالكتروني </label>

  <div class="col-sm-4">

    <input type="text" class="form-control" id="center_website" name="center_website" 

    

    value="<?php echo set_value("center_website",html_entity_decode($centers->center_website)); ?>"

    >

  </div>

  <div class="col-sm-5" >

 

    <?php echo form_error("center_website","<span class='label label-danger'>","</span>")?>

  </div>

</div> 

<!-- Center_website End -->







<!-- Center_phone Start -->

<div class="form-group">

  <label for="center_phone" class="col-sm-3 control-label"> رقم الهاتف </label>

  <div class="col-sm-4">

    <input type="text" class="form-control" id="center_phone" name="center_phone" 

    

    value="<?php echo set_value("center_phone",html_entity_decode($centers->center_phone)); ?>"

    >

  </div>

  <div class="col-sm-5" >

 

    <?php echo form_error("center_phone","<span class='label label-danger'>","</span>")?>

  </div>

</div> 

<!-- Center_phone End -->

<!-- cr Start -->

<div class="form-group">

  <label for="cr" class="col-sm-3 control-label"> رقم السجل التجاري  </label>

  <div class="col-sm-4">

    <input type="text" class="form-control" id="cr" name="cr" 

    

    value="<?php echo set_value("cr",html_entity_decode($centers->cr)); ?>"

    >

  </div>

  <div class="col-sm-5" >

 

    <?php echo form_error("cr","<span class='label label-danger'>","</span>")?>

  </div>

</div> 

<!-- cr End -->




<!-- Center_lat Start -->

<div class="form-group">

  <label for="center_lat" class="col-sm-3 control-label"> Center_lat </label>

  <div class="col-sm-4">

    <input type="text" class="form-control" id="center_lat" name="center_lat" 

    

    value="<?php echo set_value("center_lat",html_entity_decode($centers->center_lat)); ?>"

    >

  </div>

  <div class="col-sm-5" >

 

    <?php echo form_error("center_lat","<span class='label label-danger'>","</span>")?>

  </div>

</div> 

<!-- Center_lat End -->







<!-- Center_long Start -->

<div class="form-group">

  <label for="center_long" class="col-sm-3 control-label"> Center_long </label>

  <div class="col-sm-4">

    <input type="text" class="form-control" id="center_long" name="center_long" 

    

    value="<?php echo set_value("center_long",html_entity_decode($centers->center_long)); ?>"

    >

  </div>

  <div class="col-sm-5" >

 

    <?php echo form_error("center_long","<span class='label label-danger'>","</span>")?>

  </div>

</div> 

<!-- Center_long End -->





              <div class="form-group">

                <div class="col-sm-3" >                       

                </div>

                <div class="col-sm-6">

                  <button type="reset" class="btn btn-default ">اعادة ضبط</button>

                  <button type="submit" class="btn btn-info ">تحديث</button>

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