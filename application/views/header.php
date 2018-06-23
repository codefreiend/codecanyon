<!DOCTYPE html>
<html dir="rtl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title> دورات بوك </title>
        <link href="<?php echo $this->config->item('accet_url') ?>css/plugins/select2/select2.min.css" rel="stylesheet">
        <script src="<?php echo $this->config->item('accet_url') ?>js/jquery-2.1.1.min.js"></script>
         <script src="<?php echo $this->config->item('accet_url') ?>js/plugins/slimscroll/jquery.slimscroll.min.js"></script> 
        <script src="<?php echo $this->config->item('accet_url') ?>js/app.js"></script>
        <script src="<?php echo $this->config->item('accet_url') ?>js/plugins/pace/pace.min.js"></script>
        <link href="<?php echo $this->config->item('accet_url') ?>css/plugins/chosen/chosen.css" rel="stylesheet">
        <link href="<?php echo $this->config->item('accet_url') ?>css/bootstrap.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap-rtl.css">
        <link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap-flipped.css">
		
        <link href="<?php echo $this->config->item('accet_url') ?>font-awesome/css/font-awesome.css" rel="stylesheet">
        <!-- Toastr style -->
        <link href="<?php echo $this->config->item('accet_url') ?>css/plugins/toastr/toastr.min.css" rel="stylesheet">
        <!-- Gritter -->
        <link href="<?php echo $this->config->item('accet_url') ?>js/plugins/gritter/jquery.gritter.css" rel="stylesheet">
        <link href="<?php echo $this->config->item('accet_url') ?>css/animate.css" rel="stylesheet">
        <link href="<?php echo $this->config->item('accet_url') ?>css/style.css" rel="stylesheet">
        <link href="<?php echo $this->config->item('accet_url') ?>css/plugins/dataTables/datatables.min.css" rel="stylesheet">
        <!-- Date Picker-->
        <link href="<?php echo base_url() ?>accets/datepicker/datepicker.css" rel="stylesheet">
        <script src="<?php echo base_url() ?>accets/datepicker/bootstrap-datepicker.js"></script>
        <link href="<?php echo $this->config->item('accet_url') ?>css/plugins/clockpicker/clockpicker.css" rel="stylesheet">
        <script src="<?php echo $this->config->item('accet_url') ?>js/recordDel.js"></script>
        <link href="<?php echo $this->config->item('accet_url') ?>css/bootstrap-datetimepicker.css" rel="stylesheet">
        <link rel="shortcut icon" type="image/png" href="<?php echo base_url()?>assets/image/favicon.png"/>
    </head>
    <body>
        <div id="wrapper">
            <nav class="navbar-default navbar-static-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav metismenu" id="side-menu" style="padding-right: 0;">
                        <li class="nav-header">
                            <div class="dropdown profile-element">
                                <span>
                                    <center>
                                        <h2 style="margin: 0px;">
                                            <b>
        <img src="<?php echo base_url()?>assets/images/logo12.png" class="img-responsive" alt="">
        <script>
            function set_common_delete(id, table_name)
            {
                $("#set_commondel_id").val(id);
                $("#table_name").val(table_name);
            }

            function delete_return()
            {
                del_id = $("#set_commondel_id").val();
                table_name = $("#table_name").val();
                $.ajax({
                    url: "<?php echo base_url(); ?>admin/" + table_name + "/delete/" + del_id,
                    data: "id=" + del_id + "&table_name=" + table_name+"&<?php echo $this->security->get_csrf_token_name(); ?>="+'<?php echo $this->security->get_csrf_hash(); ?>',
                    type: "post",
                    success: function (result)
                    {
                        if (result.trim() == "success")
                        {
                            $('#commonDelete').modal('toggle');
                            $("#hide" + del_id).hide();
                        }
                    },
                    error: function (output)
                    {
                    }
                });
            }
        </script>
                                            </b>
                                        </h2>
                                    </center>
                                </span>
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                    <span class="clear"> 
                                        <span class="block m-t-xs">
                                            <strong class="font-bold">
                                                <!-- TRADE TEAMS --> 
                                            </strong>
                                        </span>
                                </a>
                            </div>
                            <div class="logo-element">
                                DB
                            </div>
                        </li>
                <!-- BO : left nav  -->
                <?php
                $contr = $this->uri->segment(2);
                $action = $this->uri->segment(3);
                $actionNext = $this->uri->segment(4);
                if (!empty($action)) {
                    $module = $contr . '/' . $action;
                    if (!empty($actionNext)) {
                        $module = $contr . '/' . $action . '/' . $actionNext;
                    }
                } else {
                    $module = $contr;
                }
                $contrnew = $contr . '/' . $action;
                ?> 
                <!-- BO : dashboard -->
                <li  <?php if ($contr == '') { ?>class="active "<?php } ?>>
                    <a href="<?php echo base_url()  ?>"><i class="fa fa-home"></i><span class="title">الرئيسية</span>
                        <?php if ($module == '') { ?><span class="selected"></span><?php } ?>
                    </a>
                </li>
                <!-- EO : dashboard -->

                <!-- BO : Modules -->
             <?php if($ion_auth->in_group('admin1')){?>

                <li  <?php if ($contr == 'module') { ?>class="active "<?php } ?>  >
                    <a href="<?php echo base_url() ?>admin/module/add"><i class="fa fa-users"></i><span class="title">Generate Module</span>
                        <?php if ($contr == 'module') { ?><span class="selected"></span><?php } ?>   
                        <span class="arrow <?php if ($contr == 'module') { ?>open<?php } ?>"></span>
                    </a>
                </li>
                <!--  EO : Modules -->
                
             <?php } ?>   

            
             <?php if($ion_auth->in_group('admin1')){?>

				<!-- BO : Test -->

                <li <?php if($contr == 'test'){?>class="active "<?php } ?>  >

                    <a href="javascript:;"><i class="fa fa-users"></i><span class="title">Test</span>

                        <?php if($contr == 'test'){?><span class="selected"></span><?php } ?>

                      <span class="arrow <?php if($contr == 'test'){?>open<?php } ?>"></span>

                    </a>

                    <ul class="nav nav-second-level">

                      <li <?php if($contrnew == 'test/add'){?>class="active "<?php } ?>>

                        <a href="<?php echo base_url()?>admin/test/add"><i class="fa fa-angle-double-right">

                            </i>Add Test</a>

                      </li>

                      <li <?php if($contrnew == 'test/'){?>class="active"<?php } ?>>

                        <a href="<?php echo base_url()?>admin/test/index"><i class="fa fa-gear"></i>Manage Test</a>

                      </li>                       

                    </ul>

                </li>
             <?php } ?>
                <!--  EO : Test -->



               






               
              <?php if($ion_auth->in_group('admin')){?>


				<!-- BO : Userz -->

                <li <?php if($contr == 'userz'){?>class="active "<?php } ?>  >

                    <a href="javascript:;"><i class="fa fa-user"></i><span class="title">المستخدمين</span>

                        <?php if($contr == 'userz'){?><span class="selected"></span><?php } ?>

                      <span class="arrow <?php if($contr == 'userz'){?>open<?php } ?>"></span>

                    </a>

                    <ul class="nav nav-second-level">

                      <li <?php if($contrnew == 'userz/add'){?>class="active "<?php } ?>>

                        <a href="<?php echo base_url()?>admin/userz/add"><i class="fa fa-angle-double-right">

                            </i> اضافة مستخدم</a>

                      </li>

                      <li <?php if($contrnew == 'userz/'){?>class="active"<?php } ?>>

                        <a href="<?php echo base_url()?>admin/userz/index"><i class="fa fa-gear"></i>أصحاب المراكز</a>

                      </li> 
                      
                      
                      <li <?php if($contrnew == 'userz/'){?>class="active"<?php } ?>>

                        <a href="<?php echo base_url()?>admin/userz/index"><i class="fa fa-gear"></i> المدربين</a>

                      </li> 


                      <li <?php if($contrnew == 'userz/'){?>class="active"<?php } ?>>

                        <a href="<?php echo base_url()?>admin/userz/index"><i class="fa fa-gear"></i> المتدربين</a>

                      </li> 

                    </ul>

                </li>

             <?php } else {?> 
                       <li <?php if($contr == 'userz'){?>class="active "<?php } ?>  >

                    <a href="javascript:;"><i class="fa fa-user"></i><span class="title"> <?=$ion_auth->in_group('admin')?>  الملف الشخصي</span>

                        <?php if($contr == 'userz'){?><span class="selected"></span><?php } ?>

                      <span class="arrow <?php if($contr == 'userz'){?>open<?php } ?>"></span>

                    </a>

                    <ul class="nav nav-second-level">

                      <li <?php if($contrnew == 'userz/add'){?>class="active "<?php } ?>>

                        <a href="<?php echo base_url()?>admin/userz/view/<?php echo $ion_auth->get_user_id()?>"><i class="fa fa-angle-double-left">

                            </i>معاينة الملف الشخصي</a>

                      </li>

                      <li <?php if($contrnew == 'userz/'){?>class="active"<?php } ?>>

                        <a href="<?php echo base_url()?>admin/userz/edit/<?=$ion_auth->get_user_id()?>"><i class="fa fa-gear"></i> تعديل الملف الشخصي</a>

                      </li>                       

                    </ul>

                </li>
           
                <!--  EO : Userz -->

               


                <?php } if($ion_auth->in_group('admin') || $ion_auth->in_group('Instructor') ) {?>

				<!-- BO : Centers -->

                <li <?php if($contr == 'centers'){?>class="active "<?php } ?>  >

                    <a href="javascript:;"><i class="fa fa-building"></i><span class="title">المراكز التدريبية</span>

                        <?php if($contr == 'centers'){?><span class="selected"></span><?php } ?>

                      <span class="arrow <?php if($contr == 'centers'){?>open<?php } ?>"></span>

                    </a>

                    <ul class="nav nav-second-level">

                      <li <?php if($contrnew == 'centers/add'){?>class="active "<?php } ?>>

                        <a href="<?php echo base_url()?>admin/centers/add"><i class="fa fa-angle-double-left">

                            </i> اضافة مركز</a>

                      </li>

                      <li <?php if($contrnew == 'centers/'){?>class="active"<?php } ?>>

                        <a href="<?php echo base_url()?>admin/centers/index"><i class="fa fa-gear"></i> قائمة المراكز</a>

                      </li>                       

                    </ul>

                </li>
                <?php } ?> 
            <?php if($ion_auth->in_group("center")) { ?>
                <!--  EO : Centers -->

                  <li <?php if($contr == 'centers'){?>class="active "<?php } ?>  >

                    <a href="javascript:;"><i class="fa fa-building"></i><span class="title">المراكز التدريبية</span>

                        <?php if($contr == 'centers'){?><span class="selected"></span><?php } ?>

                      <span class="arrow <?php if($contr == 'centers'){?>open<?php } ?>"></span>

                    </a>

                    <ul class="nav nav-second-level">

                      <li <?php if($contrnew == 'centers/add'){?>class="active "<?php } ?>>

                        <a href="<?php echo base_url()?>admin/centers/add"><i class="fa fa-angle-double-right">

                            </i> اضافة مركز</a>

                      </li>

                      <li <?php if($contrnew == 'centers/'){?>class="active"<?php } ?>>

                        <a href="<?php echo base_url()?>admin/centers/index/1/<?=$ion_auth->get_user_id()?>"><i class="fa fa-gear"></i>قائمة المراكز</a>

                      </li>                       

                    </ul>

                </li>
            <?php }  ?>




				<!-- BO : Training_courses -->

                <li <?php if($contr == 'training_courses'){?>class="active "<?php } ?>  >
                    <a href="javascript:;"><i class="fa fa-graduation-cap"></i><span class="title">الدورات التدريبية</span>
                    <?php if($contr == 'training_courses'){?><span class="selected"></span><?php } ?>
                      <span class="arrow <?php if($contr == 'training_courses'){?>open<?php } ?>"></span>
                    </a>

                    <ul class="nav nav-second-level">

<!--                       <li <?php if($contrnew == 'training_courses/add'){?>class="active "<?php } ?>>
                            <a href="<?php echo base_url()?>admin/training_courses/add"><i class="fa fa-angle-double-left">
                            </i>اضافة دورة تدريبية </a>
                      </li> -->

                <li <?php if($contrnew == 'training_courses/coursesToApproved'){?>class="active "<?php } ?>>
                    <a href="<?php echo base_url()?>admin/training_courses/coursesToApproved"><i class="fa fa-angle-double-left">
                    </i>طلبات تنتظر الموافقة </a>
                </li>

                       <?php if($ion_auth->in_group('Trainee')){?>
                        <li <?php if($contrnew == 'training_courses/'){?>class="active"<?php } ?>>
                        <a href="<?php echo base_url()?>admin/training_courses/my_courses"><i class="fa fa-gear"></i>دوراتي</a>
                      </li> 
                        <?php } else{?>
                      <li>
                        <a href="<?php echo base_url()?>admin/training_courses/index"><i class="fa fa-gear"></i> الدورات التدريبية بالمركز</a>
                        
                      </li>
                        <?php }?>

                    </ul>

                </li>

                <!--  EO : Training_courses -->



                 <?php if($ion_auth->in_group('admin')){?>


				<!-- BO : Cities -->

                <li <?php if($contr == 'cities'){?>class="active "<?php } ?>  >

                    <a href="javascript:;"><i class="fa fa-map-marker"></i><span class="title">المدن</span>

                        <?php if($contr == 'cities'){?><span class="selected"></span><?php } ?>

                      <span class="arrow <?php if($contr == 'cities'){?>open<?php } ?>"></span>

                    </a>

                    <ul class="nav nav-second-level">

                      <li <?php if($contrnew == 'cities/add'){?>class="active "<?php } ?>>

                        <a href="<?php echo base_url()?>admin/cities/add"><i class="fa fa-angle-double-right">

                            </i>اضافة مدينة</a>

                      </li>

                      <li <?php if($contrnew == 'cities/'){?>class="active"<?php } ?>>

                        <a href="<?php echo base_url()?>admin/cities/index"><i class="fa fa-gear"></i>قائمة المدن</a>

                      </li>                       

                    </ul>

                </li>

                <!--  EO : Cities -->
            <?php }?> 



                <!-- BO : Services -->
                
            <?php if($ion_auth->in_group('admin')||$ion_auth->in_group('Instructor') || $ion_auth->in_group('center')){?>

                <li <?php if($contr == 'services'){?>class="active "<?php } ?>  >

                    <a href="javascript:;"><i class="fa fa-table"></i><span class="title">الخدمات</span>

                        <?php if($contr == 'services'){?><span class="selected"></span><?php } ?>

                      <span class="arrow <?php if($contr == 'services'){?>open<?php } ?>"></span>

                    </a>

                    <ul class="nav nav-second-level">

                    <?php if($ion_auth->in_group('admin')){ ?>

                      <li <?php if($contrnew == 'services/add'){?>class="active "<?php } ?>>

                        <a href="<?php echo base_url()?>admin/services/add"><i class="fa fa-angle-double-right">

                            </i>اضافة خدمة </a>

                      </li>
                    <?php }
                    ?>

                        <li <?php if($contrnew == 'services/'){?>class="active"<?php } ?>>
                            <a href="<?php echo base_url()?>admin/services/subscribed"><i class="fa fa-gear"></i> خدمات اشتركت بها</a>
                        </li>   

                        <li <?php if($contrnew == 'services/'){?>class="active"<?php } ?>>
                            <a href="<?php echo base_url()?>admin/services/index/1"><i class="fa fa-gear"></i>خدمات لم تشترك بها </a>
                        </li>                    

                    </ul>

                </li>
               <?php } ?>
                <!--  EO : Services -->



               



                <!-- BO : Service_subscriptions -->
                
            <?php if($ion_auth->in_group('admin')){?>

                <li <?php if($contr == 'service_subscriptions'){?>class="active "<?php } ?>  >

                    <a href="javascript:;"><i class="fa fa-users"></i><span class="title">اشتراكات الخدمات</span>

                        <?php if($contr == 'service_subscriptions'){?><span class="selected"></span><?php } ?>

                      <span class="arrow <?php if($contr == 'service_subscriptions'){?>open<?php } ?>"></span>

                    </a>

                    <ul class="nav nav-second-level">

                      <li <?php if($contrnew == 'service_subscriptions/add'){?>class="active "<?php } ?>>

                        <a href="<?php echo base_url()?>admin/service_subscriptions/add"><i class="fa fa-angle-double-right">

                            </i>اضافة اشتراك</a>

                      </li>

                      <li <?php if($contrnew == 'service_subscriptions/'){?>class="active"<?php } ?>>

                        <a href="<?php echo base_url()?>admin/service_subscriptions/index"><i class="fa fa-gear"></i> قائمة الاشتراكات</a>

                      </li>                       

                    </ul>

                </li>
            <?php } ?>
                <!--  EO : Service_subscriptions -->



               



                <!-- BO : Specialization -->
             <?php if($ion_auth->in_group('admin')){?>

                <li <?php if($contr == 'specialization'){?>class="active "<?php } ?>  >

                    <a href="javascript:;"><i class="fa fa-users"></i><span class="title">التخصص</span>

                        <?php if($contr == 'specialization'){?><span class="selected"></span><?php } ?>

                      <span class="arrow <?php if($contr == 'specialization'){?>open<?php } ?>"></span>

                    </a>

                    <ul class="nav nav-second-level">

                      <li <?php if($contrnew == 'specialization/add'){?>class="active "<?php } ?>>

                        <a href="<?php echo base_url()?>admin/specialization/add"><i class="fa fa-angle-double-right">

                            </i>اضافة التخصص </a>

                      </li>

                      <li <?php if($contrnew == 'specialization/'){?>class="active"<?php } ?>>

                        <a href="<?php echo base_url()?>admin/specialization/index"><i class="fa fa-gear"></i>قائمة التخصصات </a>

                      </li>                       

                    </ul>

                </li>
             <?php } ?>
                <!--  EO : Specialization -->



               



				<!-- BO : Countries -->
             <?php if($ion_auth->in_group('admin')){?>
                <li <?php if($contr == 'countries'){?>class="active "<?php } ?>  >

                    <a href="javascript:;"><i class="fa fa-users"></i><span class="title">الدول</span>

                        <?php if($contr == 'countries'){?><span class="selected"></span><?php } ?>

                      <span class="arrow <?php if($contr == 'countries'){?>open<?php } ?>"></span>

                    </a>

                    <ul class="nav nav-second-level">

                      <li <?php if($contrnew == 'countries/add'){?>class="active "<?php } ?>>

                        <a href="<?php echo base_url()?>admin/countries/add"><i class="fa fa-angle-double-right">

                            </i> اضافة دولة</a>

                      </li>

                      <li <?php if($contrnew == 'countries/'){?>class="active"<?php } ?>>

                        <a href="<?php echo base_url()?>admin/countries/index"><i class="fa fa-gear"></i> قائمة الدول</a>

                      </li>                       

                    </ul>

                </li>
             <?php } ?>
                <!--  EO : Countries -->



               



                <!--  EO : Vistorsdata -->



               <!--  @@@@@#####@@@@@ -->



                



                



                



                



                



                



                



                



                



                



                



                



                

                <li><a href="<?php echo $this->config->item('left_url') ?>password"><i class="fa fa-lock"></i><span class="title">تغيير كلمة المرور</span></a></li>
                <li><a href="<?php echo $this->config->item('left_url') ?>password"><i class="fa fa-user"></i><span class="title"> 
                    
                نوع الحساب:
                <?php 
                    if($ion_auth->in_group('admin')) echo "مدير النظام";
                    else if($ion_auth->in_group('Instructor')) echo "مدرب";
                    else if($ion_auth->in_group('Trainee')) echo "متدرب";
                    else if($ion_auth->in_group('center')) echo "مركز تدريبي";
                    else if($ion_auth->in_group('CenterOwnerAndInst')) echo "مالك مركز ومدرب";
                ?>
            
            </span></a></li>
                <li><a href="<?php echo $this->config->item('left_url') ?>auth/logout"><i class="fa fa-arrow-circle-right"></i><span class="title">خروج</span></a></li>
                    </ul>
                </div>
            </nav>
            <div id="page-wrapper" class="gray-bg dashbard-1">
                <div class="row border-bottom">
                    <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                        <div class="navbar-header">
                            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                        </div>
                        <ul class="nav navbar-top-links navbar-right">
                            <li>
                                <span class="m-r-sm text-muted welcome-message">مرحبا  <?php
                                    if (isset($username) and ! empty($username)) {
                                        echo $username;
                                    }
                                    ?> </span>
                            </li>
                            <li class="dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                    <span class="clear"> 
                                        <span class="text-muted text-xs block">
                                            <img src="<?php echo $this->config->item('accet_url') ?>img/user.png" class="img-circle" alt="User Image" width="20px">
                                        </span> 
                                    </span>
                                </a>
                                <span>
                                </span>
                                <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                   <!-- <li><a href="<?php echo $this->config->item('left_url') ?>admin/profile/edit">Profile</a></li> -->
                                    <li><a href="<?php echo $this->config->item('left_url') ?>password"> تغير كلمة المرور </a></li>
                                    <li class="divider"></li>
                                    <li><a href="<?php echo $this->config->item('left_url') ?>auth/logout">خروج</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
                <!-- Common Delete Popup  -->
                <div class="modal fade" id="commonDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <form action="<?php echo base_url() ?>welcome/delete_notification/" method="post">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <h4 class="modal-title" id="frm_title">Delete</h4>
                                </div>
                                <div class="modal-body" id="frm_body">
                                    Do you really want to delete?
                                    <input type="hidden" id="set_commondel_id">
                                    <input type="hidden" id="table_name">
                                </div>
                                <div class="modal-footer">
                                    <button style='margin-left:10px;' type="button" class="btn btn-primary col-sm-2 pull-right" id="frm_submit" onclick="delete_return();">Yes</button>
                                    <button type="button" class="btn btn-danger col-sm-2 pull-right" data-dismiss="modal" id="frm_cancel">No</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- ./ Common Delete Popup /. -->