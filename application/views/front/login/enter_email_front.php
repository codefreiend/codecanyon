   <div class="contact-area bg-1 ptb-120 mb-510">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-md-offset-0">
                        <div class="contact-form">
                             <h2> البريد الالكتروني </h2>
                             <p>سيتم ارسال ارسال رسالة بها كود</p>
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
                                   <!--  <div class="col-xs-12 col-sm-12">
                                        <input type="text" placeholder="Username" id="fname" name="fname">
                                    </div> -->
                                     <div class="col-md-12">
                                        <input type="email" placeholder="البريد الالكتروني"  value="<?php echo set_value('email'); ?>" name='email' id='email' required="">
                                        <?php echo form_error('email', '<span class="err-msg">', '</span>') ?>
                                        
                                    </div>

                                    <div class="col-xs-4">
                                        <button id="submit" class="cont-submit btn-contact" name="submit">ارسال </button>
                                    </div>

                                     


                                   

                                    

                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="contact-wrap">
                            <ul>
                               <!--  <li>
                                    <i class="fa fa-home"></i>
                                    Address:
                                    <p>1234, Contrary to popular Sed ut perspiciatis unde 1234</p>
                                </li>
                                <li>
                                    <i class="fa fa-phone"></i>
                                    Email address:
                                    <p>
                                        <span>info@yoursite.com </span>
                                        <span>info@yoursite.com </span>
                                    </p>
                                </li>
                                <li>
                                    <i class="fa fa-envelope"></i>
                                    phone number:
                                    <p>
                                        <span>+0123456789</span>
                                        <span>+1234567890</span>
                                    </p>
                                </li> -->
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