<footer id="footer" class="footer bg-black-111"><?php $base_assets_url = base_url('backend/themes/standard/') ?>
    <div class="container pt-70 pb-40">
        <div class="row border-bottom-black">
            <div class="col-sm-6 col-md-3">
                <div class="widget dark">
                    <img class="mt-10 mb-20" alt="" src="images/logo-wide-white.png">
                    <p>Lorem ipsum dolor adipisicing amet, consectetur sit elit. Aspernatur incidihil quo officia.</p>
                    <ul class="list-inline mt-5">
                        <li class="m-0 pl-10 pr-10"> <i class="fa fa-map-marker text-theme-colored mr-5"></i> <a class="text-gray" href="#"><?php echo $school_setting->address; ?></a> </li>
                        <li class="m-0 pl-10 pr-10"> <i class="fa fa-phone text-theme-colored mr-5"></i> <a class="text-gray" href="#"><?php echo $school_setting->phone; ?></a> </li>
                        <li class="m-0 pl-10 pr-10"> <i class="fa fa-envelope-o text-theme-colored mr-5"></i> <a class="text-gray" href="#"><?php echo $school_setting->email; ?></a> </li>
                        <li class="m-0 pl-10 pr-10"> <i class="fa fa-globe text-theme-colored mr-5"></i> <a class="text-gray" href="#"><?php echo base_url() ?></a> </li>
                    </ul>
                </div>
                <div class="widget dark">
                    <h5 class="widget-title mb-10">Connect With Us</h5>
                    <ul class="styled-icons icon-dark icon-circled icon-sm">
                        <li><a href="<?php echo empty($front_setting->fb_url)?"javascript:void(0)":$front_setting->fb_url; ?>"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="<?php echo empty($front_setting->twitter_url)?"javascript:void(0)":$front_setting->twitter_url; ?>"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="<?php echo empty($front_setting->linkedin_url)?"javascript:void(0)":$front_setting->linkedin_url; ?>"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="<?php echo empty($front_setting->youtube_url)?"javascript:void(0)":$front_setting->youtube_url; ?>"><i class="fa fa-youtube"></i></a></li>
                        <li><a href="<?php echo empty($front_setting->instagram_url)?"javascript:void(0)":$front_setting->instagram_url; ?>"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="<?php echo empty($front_setting->pinterest_url)?"javascript:void(0)":$front_setting->pinterest_url; ?>"><i class="fa fa-pinterest"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
            <div class="widget dark">
                    <h5 class="widget-title line-bottom">Call Us Now</h5>
                    <div class="text-gray">
                    +91- <?php echo $school_setting->phone;?>
                    </div>
                </div>
                <div class="widget dark">
                    <h5 class="widget-title line-bottom">Useful Links</h5>
                    <ul class="list-border">
                        <li><a href="<?php echo base_url();?>">Home</a></li>
                        <li><a href="<?php echo base_url();?>page/contact-us">Contact</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="widget dark">
                    <h5 class="widget-title line-bottom">Opening Hours</h5>
                    <div class="opening-hours">
                        <ul class="list-border">
                            <li class="clearfix <?php echo (date('D')=="Mon")?"text-white" : "";?>"> <span> Mon : </span>
                                <div class="value pull-right flip"> 6.00 am - 10.00 pm </div>
                            </li>
                            <li class="clearfix <?php echo (date('D')=="Tue")?"text-white" : "";?>"> <span> Tues : </span>
                                <div class="value pull-right flip"> 6.00 am - 10.00 pm </div>
                            </li>
                            <li class="clearfix <?php echo (date('D')=="Wed")?"text-white" : "";?>"> <span> Wednes : </span>
                                <div class="value pull-right flip"> 8.00 am - 6.00 pm </div>
                            </li>
                            <li class="clearfix <?php echo (date('D')=="Thu")?"text-white" : "";?>"> <span>Thurs : </span>
                                <div class="value pull-right flip"> 8.00 am - 6.00 pm </div>
                            </li>
                            <li class="clearfix <?php echo (date('D')=="Fri")?"text-white" : "";?>"> <span> Fri : </span>
                                <div class="value pull-right flip"> 3.00 pm - 8.00 pm </div>
                            </li>
                            <li class="clearfix <?php echo (date('D')=="Sat")?"text-white" : "";?>"> <span> Sat : </span>
                                <div class="value pull-right flip"> 10.00 am - 2.00 pm </div>
                            </li>
                            <li class="clearfix <?php echo (date('D')=="Sun")?"text-white" : "";?>"> <span> Sun : </span>
                                <div class="value pull-right flip"> Closed </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="widget dark">
                    <h5 class="widget-title line-bottom"><?php echo $this->lang->line('latest_news'); ?></h5>
                    <div class="text-gray">
                        <?php foreach ($banner_notices as $banner_notice_key => $banner_notice_value) { ?>
                            <li style="list-style:none;">
                                <a href="<?php echo site_url('read/' . $banner_notice_value['slug']) ?>">
                                    <div class="date">
                                    <?php echo $banner_notice_key + 1; ?>&emsp;
                                    <span>
                                        <?php echo date('d-M-Y', strtotime($banner_notice_value['date'])); ?>
                                    </span>&emsp;
                                    <?php echo $banner_notice_value['title']; ?>
                                </a>
                            </li>
                        <?php } ?>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <div class="footer-bottom bg-black-222">
        <div class="container pt-10 pb-0">
            <div class="row">
                <div class="col-md-6 sm-text-center">
                    <p class="font-13 text-black-777 m-0">Copyright &copy;<?php echo date('Y')?> All Rights Reserved By <?php echo $school_setting->name?></p>
                </div>
                <div class="col-md-6 text-right flip sm-text-center">
                    <div class="widget no-border m-0">
                        <a href="https://www.camwel.com/" target="blank"> Designed By Camwel Solution LLP</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>