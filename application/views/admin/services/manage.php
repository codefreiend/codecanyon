<?php $this->load->view('header'); ?>

<!--  BO :heading -->

<div class="row wrapper border-bottom white-bg page-heading">

   <div class="col-lg-10">

      <h2>الخدمات</h2>

      <ol class="breadcrumb">

         <li>

            <a href="<?php echo base_url().'index.php/welcome/login'?>">الداش بورد</a>

         </li>

         <li class="active">

            <strong>الخدمات</strong>

         </li>

      </ol>

   </div>

   <div class="col-lg-2">

   </div>

</div>

<div class="row">

   <div class="col-lg-12">

      <div class="ibox ">

         <br>

         <div class="ibox-title">

            <?php if($this->session->flashdata('message')): ?>

            <div class="alert alert-success">

               <button type="button" class="close" data-close="alert"></button>

               <?php echo $this->session->flashdata('message'); ?>

            </div>

            <?php endif; ?>

           <?php if($ion_auth->in_group('admin')):?>
            <a href="<?php echo base_url(); ?>admin/services/add" class="btn btn-info">اضافة خدمة</a>
           <?php endif;?>
            <div class="form-group pull-right">

               <a href="<?php echo $csvlink; ?>" class="btn btn-info">CSV</a>

               <a href="<?php echo $pdflink; ?>" class="btn btn-info">PDF</a>

            </div>

            <form method="GET" action="<?php echo base_url().'admin/services/index'; ?>" class="form-inline ibox-content">

               <div class="form-group">

                  <select name="searchBy" class="form-control">

                    <option value="service_name" <?php echo $searchBy=="service_name"?'selected="selected"':""; ?>>اسم الخدمة</option>
                    <option value="about_service" <?php echo $searchBy=="about_service"?'selected="selected"':""; ?>>نبذة عن الخدمة</option>
                    <option value="price" <?php echo $searchBy=="price"?'selected="selected"':""; ?>>سعر الخدمة</option>
                    <option value="currency.currency_desc" <?php echo $searchBy=="currency.currency_desc"?'selected="selected"':""; ?>>العملة</option>

                  </select>

               </div>

               <div class="form-group">

                  <input type="text" name="searchValue" id="searchValue" class="form-control" value="<?php echo $searchValue; ?>">

               </div>

               <input type="submit" name="search" value="بحث" class="btn btn-info">

               <div class="form-group pull-right">

                  <select name="per_page" class="form-control" onchange="this.form.submit()">

                     <option value="5" <?php echo $per_page=="5"?'selected="selected"':""; ?>>5</option>

                     <option value="10" <?php echo $per_page=="10"?'selected="selected"':""; ?>>10</option>

                     <option value="20" <?php echo $per_page=="20"?'selected="selected"':""; ?>>20</option>

                     <option value="50" <?php echo $per_page=="50"?'selected="selected"':""; ?>>50</option>

                     <option value="100" <?php echo $per_page=="100"?'selected="selected"':""; ?>>100</option>

                  </select>

               </div>

            </form>

         </div>

         <div class="ibox-content">

         <div class="table table-responsive">

            <table class="table table-striped table-bordered table-hover Tax" >

               <thead>

                  <tr>

                     <th><input onclick="toggle(this,'cbgroup1')" id="foo[]" name="foo[]" type="checkbox" value="" /></th>

                     <th> Sr No. </th>

                     <?php $sortSym=isset($_GET["order"]) && $_GET["order"]=="asc" ? "up" : "down"; ?>

				<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="service_name"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links["service_name"]; ?>" class="link_css"> اسم الخدمة <?php echo $symbol ?></a></th>

						

				<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="about_service"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links["about_service"]; ?>" class="link_css"> نبذة عن الخدمة <?php echo $symbol ?></a></th>


         	<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="price"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links["price"]; ?>" class="link_css"> السعر <?php echo $symbol ?></a></th>
 


				<?php  $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="currency.currency_desc"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>



				<th> <a href="<?php echo $fields_links["currency.currency_desc"]; ?>" class="link_css"> العملة <?php echo $symbol ?></a></th>

   			<th>حالة الاشتراك</th>			

                     <th>  </th>

                  </tr>

               </thead>

               <tbody>

                  <?php if(isset($results) and !empty($results))

                     {

                     

                       $count=1;

                     

                       ?>

                  <?php 

                     foreach ($results as $key => $value) {

                     

                      ?>

                  <tr  id="hide<?php echo $value->id; ?>" >

                  <th><input name='input' id='del' onclick="callme('show')"  type='checkbox' class='del' value='<?php echo $value->id; ?>'/></th>

                              

            <th><?php if(!empty($value->id)){ echo $count; $count++; }?></th>
            
            <th><?php if(!empty($value->service_name)){ echo $value->service_name; }?></th>

                <th><?php if(!empty($value->about_service)){ echo $value->about_service; }?></th>
           
             <th><?php if(!empty($value->price)){ echo $value->price; }?></th> 
                         <!-- <th><?php if(!empty($value->id)){ echo $count; $count++; }?></th> -->
                <th><?php if(!empty($value->currency)){ echo $value->currency; }?></th> 
                <th><?php if($serviceslib->isSubscribedToService($value->id, $ion_auth->get_user_id()))
                {
                  if($serviceslib->isSubscriptionValid($ion_auth->get_user_id())){
                    echo "تم الاشتراك";
                  }else {
                   echo '<a href="'.base_url().'admin/Service_subscriptions/renew_subscription/'.$ion_auth->get_user_id().'/'.$value->id.'">  جدد الاشتراك </a>';
                     
                  }
                }
                else {
                   echo '<a href="'.base_url().'admin/Service_subscriptions/subscribe/'.$ion_auth->get_user_id().'/'.$value->id.'"> اشترك الان </a>';
                }
                ?></th>
                <th class="action-width">

		   <a href="<?php echo base_url()?>admin/services/view/<?php echo $value->id; ?>" title="View">

            <span class="btn btn-info " ><i class="fa fa-eye"></i></span>

           </a>
        <?php if($ion_auth->in_group('admin')){?>
              <a href="<?php echo base_url()?>admin/services/edit/<?php echo $value->id; ?>" title="Edit">

                <span class="btn btn-info " ><i class="fa fa-edit"></i></span>

              </a>

              <a  title="Delete" data-toggle="modal" data-target="#commonDelete" onclick="set_common_delete('<?php echo $value->id; ?>','services');">

              <span class="btn btn-info " ><i class="fa fa-trash-o "></i></span>

              </a>
        <?php }?>
            </th>

                  </tr>

                  <?php 

                     }

                     

                     

                     } else{

                     echo '<tr><td colspan="100"><h3 align="center" class="text-danger">No Record found!</center</td></tr>';

                     } ?>  

               </tbody>

            </table>

            </div>

            <?php echo $links; ?>

         </div>

      </div>

      <img onclick="callme('','item','')" src="<?php echo $this->config->item('accet_url')?>/img/mac-trashcan_full-new.png" id="recycle" style="width:90px;  display:none; position:fixed; bottom: 50px; right: 50px;"/>

   </div>

</div>

<script type="text/javascript">

   function delRow()

   {

   var confrm = confirm("Are you sure you want to delete?");

   if(confrm)

   {

   ids = values();

   $.ajax({

     type:"POST",

     url:'<?php echo base_url()."admin/services/deleteAll"; ?>',

     data:{

       allIds : ids,

       '<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>'

     },

     success:function(){

       location.reload();

       },

     });

   }

   }

</script>

<?php $this->load->view('footer'); ?>