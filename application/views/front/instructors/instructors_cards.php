  <div class="team-area team-area2">
            <div class="container">

                <div class="row">                   

                    <div class="col-md-3 col-sm-6 col-2 col-xs-12">
                        <h2>المدربين </h2>
                    </div>

                     <div class="col-md-9 col-sm-6 col-2 col-xs-12">
                    <form method="get" action="<?php echo base_url()?>admin/userz/instructors" class="form-inline">

                         <div class="form-group">
                            
                            <input type="text" class="form-control" name="full_name" placeholder="اسم المدرب">
                        </div>

                        
                           
                            <input type="submit" class="btn btn-sm btn-success" value="بحث">
                        </form>
                    </div>
                </div>


                
                <div class="row">
                 <?php echo $instructors_cards;?>
                </div>
            </div>
        </div>