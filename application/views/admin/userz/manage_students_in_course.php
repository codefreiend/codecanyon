<?php $this->load->view('header'); ?>

<!--  BO :heading -->

<div class="row wrapper border-bottom white-bg page-heading">

   <div class="col-lg-10">

      <h3>المتدربين المسجلين في الدورة</h3>

      <ol class="breadcrumb">

         <li>

            <a href="<?php echo base_url().'admin/'?>">الداشبورد</a>

         </li>

         <li class="active">

            <strong>المتدربين المسجلين في الدورة</strong>

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

            <a href="<?php echo base_url(); ?>admin/userz/add" class="btn btn-info">ADD NEW</a>

            <div class="form-group pull-right">

               <a href="<?php echo $csvlink; ?>" class="btn btn-info">CSV</a>

               <a href="<?php echo $pdflink; ?>" class="btn btn-info">PDF</a>

            </div>

            <form method="GET" action="<?php echo base_url().'admin/userz/index'; ?>" class="form-inline ibox-content">

               <div class="form-group">

                  <select name="searchBy" class="form-control">

                  <option value="username" <?php echo $searchBy=="username"?'selected="selected"':""; ?>>Username</option><option value="full_name" <?php echo $searchBy=="full_name"?'selected="selected"':""; ?>>Full_name</option><option value="birth_date" <?php echo $searchBy=="birth_date"?'selected="selected"':""; ?>>Birth_date</option><option value="gender.gender_desc" <?php echo $searchBy=="gender.gender_desc"?'selected="selected"':""; ?>>Gender</option><option value="company" <?php echo $searchBy=="company"?'selected="selected"':""; ?>>Company</option><option value="mobile" <?php echo $searchBy=="mobile"?'selected="selected"':""; ?>>Mobile</option><option value="phone" <?php echo $searchBy=="phone"?'selected="selected"':""; ?>>Phone</option><option value="photo" <?php echo $searchBy=="photo"?'selected="selected"':""; ?>>Photo</option><option value="countries.name" <?php echo $searchBy=="countries.name"?'selected="selected"':""; ?>>Country</option><option value="cities.name" <?php echo $searchBy=="cities.name"?'selected="selected"':""; ?>>City</option><option value="address" <?php echo $searchBy=="address"?'selected="selected"':""; ?>>Address</option>

                  </select>

               </div>

               <div class="form-group">

                  <input type="text" name="searchValue" id="searchValue" class="form-control" value="<?php echo $searchValue; ?>">

               </div>

               <input type="submit" name="search" value="Search" class="btn btn-info">

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



						

						

				<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="full_name"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links["full_name"]; ?>" class="link_css"> اسم المتدرب <?php echo $symbol ?></a></th>

						

						

   						

				<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="company"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links["company"]; ?>" class="link_css"> جهة العمل <?php echo $symbol ?></a></th>

						

				<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="mobile"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links["mobile"]; ?>" class="link_css"> رقم الجوال <?php echo $symbol ?></a></th>

						

						

				<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="photo"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links["photo"]; ?>" class="link_css"> Photo <?php echo $symbol ?></a></th>

						

				<?php

				 $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="countries.name"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>



				<th> <a href="<?php echo $fields_links["countries.name"]; ?>" class="link_css"> الدولة <?php echo $symbol ?></a></th>

   						

				<?php

				 $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="cities.name"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>



				<th> <a href="<?php echo $fields_links["cities.name"]; ?>" class="link_css"> المدينة <?php echo $symbol ?></a></th>

   						

				<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="address"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links["address"]; ?>" class="link_css"> العنوان <?php echo $symbol ?></a></th>

						

                     <th> Action </th>

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
            


                <th><?php if(!empty($value->full_name)){ echo $value->full_name; }?></th>



                <th><?php if(!empty($value->company)){ echo $value->company; }?></th>

                <th><?php if(!empty($value->mobile)){ echo $value->mobile; }?></th>


                <th><?php if(!empty($value->photo)){ ?> 

                        <img src="<?php echo $this->config->item('photo_url');?><?php echo $value->photo; ?>" alt="pic" width="50" height="50" />

                         <?php }?></th><th><?php if(!empty($value->country)){ echo $value->country; }?></th>

                <th><?php if(!empty($value->city)){ echo $value->city; }?></th>

                <th><?php if(!empty($value->address)){ echo $value->address; }?></th>

                <th class="action-width">

		   <a href="<?php echo base_url()?>admin/userz/view/<?php echo $value->id; ?>" title="View">

            <span class="btn btn-info " ><i class="fa fa-eye"></i></span>

           </a>

           <a href="<?php echo base_url()?>admin/userz/edit/<?php echo $value->id; ?>" title="Edit">

            <span class="btn btn-info " ><i class="fa fa-edit"></i></span>

           </a>

           <a  title="Delete" data-toggle="modal" data-target="#commonDelete" onclick="set_common_delete('<?php echo $value->id; ?>','userz');">

           <span class="btn btn-info " ><i class="fa fa-trash-o "></i></span>

           </a>

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

     url:'<?php echo base_url()."admin/userz/deleteAll"; ?>',

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