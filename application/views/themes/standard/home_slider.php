<!-- Section: home -->
<?php if (isset($banner_images) && !empty($banner_images)) { ?>
    <section id="home" class="divider parallax">
        <div class="fullwidth-carousel" data-nav="true" data-duration="6000">
            <?php $banner_first = TRUE; foreach ($banner_images as $banner_img_key => $banner_img_value) { ?>
                <div class="carousel-item bg-img-cover layer-overlay overlay-white-4" data-bg-img="<?php echo base_url($banner_img_value->dir_path . $banner_img_value->img_name); ?>">
                    <div class="display-table">
                        <div class="display-table-cell">
                            <div class="container pt-100 pb-100">
                                <div class="row">
                                    <div class="col-md-8 col-md-offset-2">
                                        <div class="bg-white-transparent text-center pt-20 pb-50 outline-border">
                                            <h1 class="text-black-222 text-uppercase font-weight-800 font-54">Welcome<br>To <span class="text-theme-colored"><?php echo $school_setting->name;?></span></h1>
                                            <p class="lead">Every day we bring hope to millions of children in the world's hardest places as a sign of God's unconditional love.</p>
                                            <a class="btn btn-colored btn-theme-colored btn-lg smooth-scroll-to-target mt-15" href="<?php echo base_url()?>page/contact-us">Contact us</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php $banner_first = FALSE; } ?>
        </div>
    </section>
<?php }?>




    








   