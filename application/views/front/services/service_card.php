 
 <?php foreach($services as $service):?>

 <a href="<?=base_url()?>welcome/about_service/<?=$service->id?>">
 <div class="col-md-3 col-sm-6 col-xs-12 col-2">
                        <div class="service-wrap">
                            <i class="fa fa-building"></i>
                            <h3><?=$service->service_name?></h3>
                            <p><?=$service->about_service?></p>                           
                        </div>
                    </div>

</a>
<?php endforeach; ?>