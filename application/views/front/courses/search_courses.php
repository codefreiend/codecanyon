 <div class="row search-form" >                   

                    <div class="col-md-12 col-sm-6 col-2 col-xs-12">
                        
                    

                   
                    <form method="get" action="<?php echo base_url()?>welcome/courses_cards" class="form-inline">

                     <div class="form-group">
                            <select name="spec" id="" class="form-control">
                                <option value=""> المجال التدريبي</option>
                                <option value="">أمن المعلومات</option>
                                <option value="">الشبكات </option>
                            </select>
                        </div> 
                        
                         <div class="form-group">                            
                            <input type="text" name="course_name" class="form-control" id="usr" placeholder="اسم الدورة">
                        </div>

                        <div class="form-group">
                            <select name="instructor" id="" class="form-control">
                                <option value="">اسم المدرب</option>
                                <?php foreach ($instructors as $instructor) { ?>
                                    <option value="<?php echo $instructor->id?>"><?php echo $instructor->full_name?></option>
                              <?php  }?>
                            </select>
                        </div> 
                        
                         <div class="form-group">                            
                            <input type="text" name="start_date" class="form-control date" id="start_date" placeholder="التاريخ"
                            style="width:180px;">
                        </div>
                            <input type="submit" class="btn btn-sm btn-success" value="بحث">
                    </form>
                    </div>
                </div>