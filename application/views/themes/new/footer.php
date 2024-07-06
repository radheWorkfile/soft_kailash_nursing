<!--Start footer area-->  
<footer class="footer-area">
    <div class="container">
        <div class="row">
            <!--Start single footer widget-->
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <div class="single-footer-widget pd-bottom50">
                    <div class="title">
                        <h3>About Hospitals</h3>
                        <span class="border"></span>
                    </div>
                    <div class="our-info">
                        <p>Our healthcare offerings are supported by a team of compassionate and dedicated medical professionals who have rich knowledge and experience in their respective domains.</p>
                        <a href="<?php echo base_url('page/about-us')?>">Know More<i class="fa fa-caret-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
            <!--End single footer widget-->
            <!--Start single footer widget-->
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <div class="single-footer-widget pd-bottom50">
                    <div class="title">
                        <h3><?php echo $this->lang->line('links'); ?></h3>
                        <span class="border"></span>
                    </div>
                    <ul class="usefull-links">
                    <?php foreach ($footer_menus as $footer_menu_key => $footer_menu_value) {?>
                        <li>
                            <?php  $top_new_tab = '';
                                $url = '#';
                                if ($footer_menu_value['open_new_tab']) {
                                    $top_new_tab = "target='_blank'";
                                }
                                if ($footer_menu_value['ext_url']) {
                                    $url = $footer_menu_value['ext_url_link'];
                                } else {
                                    $url = site_url($footer_menu_value['page_url']);
                                }
                            ?>
                            <a href="<?php echo $url; ?>" <?php echo $top_new_tab; ?>><?php echo $footer_menu_value['menu']; ?></a>
                        </li>
                    <?php } ?>
                    </ul>
                </div>
            </div>
            <!--End single footer widget-->
            <!--Start single footer widget-->
            <div class="offset-1 col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <div class="single-footer-widget mar-bottom">
                    <div class="title">
                        <h3><?php echo $this->lang->line('contact'); ?> Details</h3>
                        <span class="border"></span>
                    </div>
                    <ul class="footer-contact-info">
                        <li>
                            <div class="icon-holder">
                                <span class="flaticon-pin"></span>
                            </div>
                            <div class="text-holder">
                                <h5><?php echo $school_setting->address; ?></h5>
                            </div>
                        </li>
                        <li>
                            <div class="icon-holder">
                                <span class="flaticon-interface"></span>
                            </div>
                            <div class="text-holder">
                                <h5><?php echo $school_setting->email; ?></h5>
                            </div>
                        </li>
                        <li>
                            <div class="icon-holder">
                                <span class="flaticon-technology-1"></span>
                            </div>
                            <div class="text-holder">
                                <h5><?php echo $school_setting->phone; ?></h5>
                            </div>
                        </li>
                        <li>
                            <div class="icon-holder">
                                <span class="flaticon-clock"></span>
                            </div>
                            <div class="text-holder">
                                <h5>Mon-Satday: 9am to 18pm</h5>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!--Start single footer widget-->
            
        </div>
    </div>
</footer>   
<!--End footer area-->

<!--Start footer bottom area-->
<section class="footer-bottom-area">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="copyright-text">
                    <p>Copyrights © 2017 All Rights Reserved, Powered by <a href="#"><?php echo $front_setting->footer_text; ?></a></p> 
                </div>
            </div>
            <div class="col-md-4">
                <ul class="footer-social-links">
                <?php $this->view('/themes/default/social_media'); ?>
                </ul>
            </div>
        </div>
    </div>
</section>
<!--End footer bottom area-->