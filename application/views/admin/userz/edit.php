<?php $this->load->view('header'); ?>

<!--  BO :heading -->

<div class="row wrapper border-bottom white-bg page-heading">

  <div class="col-sm-4">

    <h2>تحديث الملف الشخصي</h2>

    <ol class="breadcrumb">

      <li>

        <a href="<?php echo base_url().'admin/'?>">الداش بورد</a>

      </li>

      <li class="active">

        <strong>تحديث الملف الشخصي</strong>

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

        <h5 class="pull-left"> تحديث الملف الشخصي <small></small></h5>

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

              <div class="alert alert-danger">

                <button type="button" class="close" data-close="alert"></button>

                <?php echo $this->session->flashdata('message'); ?>

              </div>

              <?php endif; ?> 


                <?php if($this->session->flashdata('inf_message')): ?>

              <div class="alert alert-success">

                <button type="button" class="close" data-close="alert"></button>

                <?php echo $this->session->flashdata('inf_message'); ?>

              </div>

              <?php endif; ?> 

              



<!-- Username Start -->

<div class="form-group">

  <label for="username" class="col-sm-3 control-label"> اسم المستخدم </label>

  <div class="col-sm-4">

    <input type="text" class="form-control" id="username" name="username" 

    

    value="<?php echo set_value("username",html_entity_decode($userz->username)); ?>"

    >

  </div>

  <div class="col-sm-5" >

 

    <?php echo form_error("username","<span class='label label-danger'>","</span>")?>

  </div>

</div> 

<!-- Username End -->







<!-- Password Start -->

<div class="form-group">

  <label for="password" class="col-sm-3 control-label"> كلمة المرور </label>

  <div class="col-sm-4">

    <input type="text" class="form-control" id="password" name="password" 

    

    value=""

    >

  </div>

  <div class="col-sm-5" >

 

    <?php echo form_error("password","<span class='label label-danger'>","</span>")?>

  </div>

</div> 

<!-- Password End -->







<!-- Full_name Start -->

<div class="form-group">

  <label for="full_name" class="col-sm-3 control-label"> الاسم كاملا </label>

  <div class="col-sm-4">

    <input type="text" class="form-control" id="full_name" name="full_name" 

    

    value="<?php echo set_value("full_name",html_entity_decode($userz->full_name)); ?>"

    >

  </div>

  <div class="col-sm-5" >

 

    <?php echo form_error("full_name","<span class='label label-danger'>","</span>")?>

  </div>

</div> 

<!-- Full_name End -->







<!-- Birth_date Start -->

<div class="form-group">

  <label for="birth_date" class="col-sm-3 control-label"> تاريخ الميلاد </label>

  <div class="col-sm-4">

    <input type="text" class="form-control span2 datepicker" id="birth_date" name="birth_date" 

    

    value="<?php echo set_value("birth_date",$userz->birth_date); ?>"

    >

  </div>

  <div class="col-sm-5" >

 

    <?php echo form_error("birth_date","<span class='label label-danger'>","</span>")?>

  </div>

</div> 

<!-- Birth_date End -->







	<!-- Gender Start -->

	<div class="form-group">

        <label class="control-label col-md-3"> النوع </label>

          <div class="col-md-4">

              <select class="form-control select2" name="gender" id="gender">

              <option value=""> اختر النوع</option>

      <?php 

      if(isset($gender) && !empty($gender)):

      foreach($gender as $key => $value): ?>

          <option value="<?php echo $value->id; ?>" <?php echo $value->id==$userz->gender?'selected="selected"':""; ?>>

            <?php echo $value->gender_desc; ?>

          </option>

      <?php endforeach; ?>

      <?php endif; ?>

      </select>

        </div>

    </div>

      <!-- Gender End -->

<?php if($ion_auth->in_group('Instructor')){?>



<!-- about Start -->

<div class="form-group">

  <label for="about" class="col-sm-3 control-label"> نبذة  </label>

  <div class="col-sm-4">

    <textarea class="form-control" id="about" name="about"><?php echo set_value("about",html_entity_decode($userz->about)); ?></textarea>

  </div>

  <div class="col-sm-5" >

 

    <?php echo form_error("about","<span class='label label-danger'>","</span>")?>

  </div>

</div> 

<!-- about End -->



 <!-- cv Start -->

    <div class="form-group">

      <label for="address" class="col-sm-3 control-label"> السيرة الذاتية </label>

      <div class="col-sm-6">

      <input type="file" name="cv" />

      <input type="hidden" name="old_cv" 

      value="<?php if (isset($cv) && $cv!=""){echo $cv; }?>" />  

        <?php if(isset($cv_err) && !empty($cv_err)) 

        {foreach($cv_err as $key => $error)

        {echo "<div class=\"error-msg\"></div>"; } }?>

        <?php if (isset($userz->cv) && $userz->cv!=""){?>

            <br>
          
          <a href="<?php echo $this->config->item("file_url").$userz->cv;?>"><?php echo $userz->cv; ?></a>

    <?php } ?>

      </div>

        <div class="col-sm-3" >

      </div>

    </div>

    <!-- cv End -->
 <?php }?>



<!-- Company Start -->

<div class="form-group">

  <label for="company" class="col-sm-3 control-label"> جهة العمل </label>

  <div class="col-sm-4">

    <input type="text" class="form-control" id="company" name="company" 

    

    value="<?php echo set_value("company",html_entity_decode($userz->company)); ?>"

    >

  </div>

  <div class="col-sm-5" >

 

    <?php echo form_error("company","<span class='label label-danger'>","</span>")?>

  </div>

</div> 

<!-- Company End -->







<!-- Mobile Start -->

<div class="form-group">

  <label for="mobile" class="col-sm-3 control-label"> رقم الجوال </label>

  <div class="col-sm-4">

    <input type="text" class="form-control" id="mobile" name="mobile" 

    

    value="<?php echo set_value("mobile",html_entity_decode($userz->mobile)); ?>"

    >

  </div>

  <div class="col-sm-5" >

 

    <?php echo form_error("mobile","<span class='label label-danger'>","</span>")?>

  </div>

</div> 

<!-- Mobile End -->







<!-- Phone Start -->

<div class="form-group">

  <label for="phone" class="col-sm-3 control-label"> رقم الهاتف </label>

  <div class="col-sm-4">

    <input type="text" class="form-control" id="phone" name="phone" 

    

    value="<?php echo set_value("phone",html_entity_decode($userz->phone)); ?>"

    >

  </div>

  <div class="col-sm-5" >

 

    <?php echo form_error("phone","<span class='label label-danger'>","</span>")?>

  </div>

</div> 

<!-- Phone End -->







    <!-- Photo Start -->

    <div class="form-group">

      <label for="address" class="col-sm-3 control-label"> صورة شخصية </label>

      <div class="col-sm-6">

      <input type="file" name="photo" />

      <input type="hidden" name="old_photo" 

      value="<?php if (isset($photo) && $photo!=""){echo $photo; }?>" />  

        <?php if(isset($photo_err) && !empty($photo_err)) 

        {foreach($photo_err as $key => $error)

        {echo "<div class=\"error-msg\"></div>"; } }?>

        <?php if (isset($userz->photo) && $userz->photo!=""){?>

            <br>

  <img src="<?php echo $this->config->item("photo_url");?><?php echo $userz->photo; ?>" alt="pic" width="50" height="50" />

    <?php } ?>

      </div>

        <div class="col-sm-3" >

      </div>

    </div>

    <!-- Photo End -->



    



	<!-- Country Start -->

	<div class="form-group">

        <label class="control-label col-md-3"> الدولة </label>

          <div class="col-md-4">

              <select class="form-control select2" name="country" id="country">

              <option value=""> اختر الدولة</option>

      <?php 

      if(isset($countries) && !empty($countries)):

      foreach($countries as $key => $value): ?>

          <option value="<?php echo $value->id; ?>" <?php echo $value->id==$userz->country?'selected="selected"':""; ?>>

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

        <label class="control-label col-md-3"> المدينة </label>

          <div class="col-md-4">

              <select class="form-control select2" name="city" id="city">

              <option value=""> اختر المدينة</option>

      <?php 

      if(isset($cities) && !empty($cities)):

      foreach($cities as $key => $value): ?>

          <option value="<?php echo $value->id; ?>" <?php echo $value->id==$userz->city?'selected="selected"':""; ?>>

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

  <label for="address" class="col-sm-3 control-label"> العنوان </label>

  <div class="col-sm-4">

    <input type="text" class="form-control" id="address" name="address" 

    

    value="<?php echo set_value("address",html_entity_decode($userz->address)); ?>"

    >

  </div>

  <div class="col-sm-5" >

 

    <?php echo form_error("address","<span class='label label-danger'>","</span>")?>

  </div>

</div> 

<!-- Address End -->





              <div class="form-group">

                <div class="col-sm-3" >                       

                </div>

                <div class="col-sm-6">

                  <button type="reset" class="btn btn-default ">جديد</button>

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