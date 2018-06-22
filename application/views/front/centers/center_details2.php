<div class="about-area ptb-120 about-area2">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-5 hidden-xs">
                        <div class="about-img" style="background-image: url(&quot;assets/images/about/4.jpg&quot;); background-size: cover; background-position: center center; height: 339px;">
                            <img src="<?=base_url()?>/uploads/photo/<?=$centers->logo?>" alt="">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-7 col-xs-12">
                        <div class="about-wrap">
                            <h3><?=$centers->center_name?></h3>
                            <p><?=$centers->about_center?></p>

                            <dl class="dl-horizontal">
                            <dt> نوع المركز</dt>
                            <dd>
                             <?php
                                if(isset($center_type) && !empty($center_type)):
                                        foreach($center_type as $key => $value): 
                                            if($value->id==$centers->center_type)
                                                echo $value->type_desc;
                                        endforeach; 
                                endif; ?>
                            </dd>
                            <dt> مجال عمل المركز</dt>
                            <dd> <?php
                                if(isset($specialization) && !empty($specialization)):
                                        foreach($specialization as $key => $value): 
                                            if($value->id==$centers->specialization)
                                                echo $value->main_specialization."-". $value->branch_specialization."-";
                                        endforeach; 
                                endif; ?></dd>
                            <dt>Job</dt>
                            <dd></dd>
                            </dl>
                          <!--   <ul>
                                <li> All the Lorem Ipsum generators on the Internet tend to repeat predefined.</li>
                                <li>Lorem Ipsum is therefore always free from repetition.</li>
                                <li>Ipsum is therefore always free from repetition.</li>
                                <li>Accompanied by English versions from the 1914 translation by H. Rackham.</li>
                                <li>English versions from the 1914 translation by H. Rackham.</li>
                            </ul> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>