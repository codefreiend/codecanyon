

        <!-- contact-area start -->
        <div class="contact-area bg-1 ptb-120 mb-510">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-md-offset-0">
                        <div class="contact-form">
                             <h2>اعادة ضبط كلمة المرور </h2>
                             <?php if ($this->session->flashdata('message')): ?>
                               
                                <div class="alert alert-danger">
                                    <button type="button" class="close" data-close="alert"></button>
                                    <?php echo $this->session->flashdata('message'); ?>
                                </div>

                            <?php endif; ?>


                             <?php if ($this->session->flashdata('info_message')): ?>
                               
                                <div class="alert alert-info">
                                    <button type="button" class="close" data-close="alert">معلومة</button>
                                    <?php echo $this->session->flashdata('info_message'); ?>
                                </div>

                            <?php endif; ?>
                              
                            <div class="cf-msg"></div>
                            <form action="" method="post" id="cf">
                                <div class="row">
                                   

                                     <div class="col-md-12">
                                        <input type="password" placeholder="كلمة المرور" name='password' value="<?php echo set_value('password'); ?>" required="">
                                        <?php echo form_error('password', '<span class="text-danger">', '</span>') ?>
                                       
                                    </div>

                                     <div class="col-md-12">
                                        <input type="password" placeholder="كلمة المرور مرة أخرى" name='confirm_password' value="<?php echo set_value('confirm_password'); ?>" required="">
                                        <!-- <?php echo form_error('confirm_password', '<span class="text-danger">', '</span>') ?> -->
                                       
                                    </div>

                                    
                                    

                                    <div class="col-xs-4">
                                        <button id="submit" class="cont-submit btn-contact" name="submit">موافق</button>
                                    </div>

                                   

                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="contact-wrap">
                            <ul>
                               
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                       
                    </div>
                </div>
            </div>
        </div>
        <!-- contact-area end -->

       