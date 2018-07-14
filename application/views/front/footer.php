 
 <!-- brand-area end -->
        <!-- footer-area start -->
        <footer class="footer-area">
          <!--   <div class="footer-top-area black-opacity bg-img-4">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-xs-12 col-2">
                            <div class="footer-widget footer-logo">
                                <img src="assets/images/footer-logo.png" alt="">
                                <p>It is a long established fact that a reader will be distracted by the readable content of a page when </p>
                                <form action="#">
                                    <input type="text" placeholder="Email here">
                                    <button type="button" name="button"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12 col-2">
                            <div class="footer-widget footer-contact">
                                <h2>contact us</h2>
                                <ul>
                                    <li><i class="fa fa-map-marker"></i> 123, Street Name, Address</li>
                                    <li><i class="fa fa-phone"></i> +012345678910</li>
                                    <li><i class="fa fa-fax"></i> +012345678910</li>
                                    <li><i class="fa fa-envelope"></i> email@example.com</li>
                                </ul>
                                <ul class="socil-media">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12 col-2">
                            <div class="footer-widget footer-menu">
                                <h2>latest news</h2>
                                <ul>
                                    <li><a href="#">Contrary to popular belief</a></li>
                                    <li><a href="#">Lorem Ipsum generators on</a></li>
                                    <li><a href="#">Various versions have evolved </a></li>
                                    <li><a href="#">It has survived not only</a></li>
                                    <li><a href="#">If you use this site regularly</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12 col-2">
                            <div class="footer-widget footer-menu">
                                <h2>ourProjects</h2>
                                <ul>
                                    <li><a href="#">Contrary to popular belief</a></li>
                                    <li><a href="#">Lorem Ipsum generators on</a></li>
                                    <li><a href="#">Various versions have evolved </a></li>
                                    <li><a href="#">It has survived not only</a></li>
                                    <li><a href="#">If you use this site regularly</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="footer-bottom-area">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 text-center">
                            <p> &copy; 2018 <span>دورات بوك</span>.جميع الحقوق محفوظة.</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer-area end -->

        <!-- jquery latest version -->
        <script src="<?=base_url()?>assets/js/vendor/jquery-1.12.4.min.js"></script>
        <script src="<?=base_url()?>assets/js/vendor/jquery-ui.min.js"></script>
        <script src="<?=base_url()?>assets/js/jquery.star-rating-svg.js"></script>
        <!-- bootstrap js -->
        <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
        <!-- owl.carousel.2.0.0-beta.2.4 css -->
        <script src="<?=base_url()?>assets/js/owl.carousel.min.js"></script>
        <!-- jquery.nivo.slider.pack.js -->
        <script src="<?=base_url()?>assets/js/jquery.nivo.slider.pack.js"></script>
         <!-- star rating -->
        <script src="<?=base_url()?>assets/js/star-rating.js"></script>
        <script src="<?=base_url()?>assets/krajee-svg/theme.js"></script>
        <script src="<?=base_url()?>assets/js/locales/ar.js"></script>
        <!-- plugins js -->
        <script src="<?=base_url()?>assets/js/plugins.js"></script>
        <!-- main js -->
        <script src="<?=base_url()?>assets/js/scripts.js"></script>
        <script src="<?=base_url()?>assets/js/jquery.vticker.min.js?v=1.21"></script>
       
                                    <script>
                                        $(document).on('ready', function(){
                                            $('.kv-rtl-theme-default-star').rating({
                                                displayOnly: true,
                                                starCaptions: '',
                                                clearCaption: '',
                                                hoverOnClear: false,
                                                containerClass: 'is-star'
                                            });

                                            $('.caption').hide();


                                        /*  $('#myTabs a').click(function (e) {
                                                e.preventDefault()
                                                $(this).tab('show')
                                                }) */
                                            $(".date").datepicker({
                                                changeMonth: true,
                                                changeYear: true,
                                                dateFormat: 'yy-mm-dd'
                                            
                                            });


                                            $(".rate-trainer").starRating({
                                                starSize: 20,
                                                activeColor: '#5cb85c',
                                                baseUrl: true,
                                                callback: function(currentRating, $el){
                                                    var baseUrl =location.href;                                                    
                                                    var baseUrl = baseUrl.replace("about_instructor", "rate_instructor");
                                                    console.log(baseUrl);
                                                    var data = {};

                                                    // throw some data into the object
                                                        data.rating = currentRating;
                                                
                                                    // convert the object into a json string
                                                    var data_json = JSON.stringify(data);
                                                    // alert(data_json);
                                                    $.ajax({
                                                        type: 'post',
                                                        //url: '<?php echo base_url()?>admin/userz/rate_instructor',
                                                        url: baseUrl,
                                                        data: data_json,
                                                        success: function(result) {
                                                            // check result object for what you returned
                                                        console.log(result);
                                                        $("#instructors_review_id").val(result);
                                                        
                                                        },
                                                        error: function(error) {
                                                            // check error object or return error
                                                        }
                                                    });

                                                    // make a server call here
                                                }
                                            });

                                              $(".trainer1-rating").starRating({
                                                starSize: 30,
                                                useFullStars: true,
                                                callback: function(currentRating, $el){
                                                    // make a server call here
                                                }
                                            });

                                            <?php if(isset($calculated_rating)):?>
                                                $(".trainer-rating").starRating({
                                                        totalStars: 5,
                                                        emptyColor: 'lightgray',
                                                        hoverColor: 'salmon',
                                                        activeColor: '#5cb85c',
                                                        initialRating: <?php echo $calculated_rating?>, // 2.5,
                                                        strokeWidth: 0,
                                                        readOnly: true,
                                                        useGradient: false,
                                                        callback: function(currentRating, $el){
                                                            alert('rated ' + currentRating);
                                                            console.log('DOM element ', $el);
                                                        }
                                                        });
                                                    <?php endif;?>

                                                $(function(){
                                                   $(".add-rating").on("click", function(){
                                                      //  $(this).toggleClass("expander expanded");
                                                         $('.review_trainer').toggle();
                                                        
                                                      //  .parent().next().slideToggle();
                                                    });
                                                });

                                        });

                                        $(document).on('click', '.rstar', function () {
                                            rating_val = $(this).attr("rval");
                                            $("#selected-stars").text(rating_val + " نجوم");
                                            $("#hidden-stars").text(rating_val);
                                            alert(rating_val);
                                        });

                                          $(document).on('click', '#send_instructor_content', function () {
                                              var data = {};
                                              data.instructors_review_id = $("#instructors_review_id").val();
                                              data.content = $("#content").val();
                                              var data_json = JSON.stringify(data);
                                           $.ajax({
                                                type: 'post',
                                                url: '<?php echo base_url()?>admin/userz/update_rate_instructor',
                                               
                                                data: data_json,
                                                success: function(result) {
                                                    // check result object for what you returned
                                                console.log(result);
                                                $("#instructors_review_id").val(result);
                                                
                                                },
                                                error: function(error) {
                                                    // check error object or return error
                                                }
                                            });
                                        });

                                       
                                    $('#instructors-bar').vTicker();

                            </script>


                          
    </body>
</html>
