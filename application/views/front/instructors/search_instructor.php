 <div class="row search-form">                   

                     <div class="col-md-3 col-sm-6 col-2 col-xs-12">
                         <div class="form-group">
                            <select name="spec" id="" class="form-control">
                                <option value=""> المجال التدريبي</option>
                                <option value="">أمن المعلومات</option>
                                <option value="">الشبكات </option>
                            </select>
                        </div> 
                    </div>

                     <div class="col-md-9 col-sm-6 col-2 col-xs-12">
                    <form method="get" action="<?php echo base_url()?>welcome/centers_list" class="form-inline">
                         <div class="form-group">                            
                            <input type="text" name="center_name" class="form-control" id="usr" placeholder="اسم المدرب">
                        </div>

                                            
                            <input type="submit" class="btn btn-sm btn-success" value="بحث">
                    </form>
                    </div>
                </div>