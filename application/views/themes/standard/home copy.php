<div class="container spacet50 spaceb50">
<?php if ($page['description'] != ""): ?>
    <?php echo $page['description']; ?>
<?php endif; ?></div>
<!--Start facilities Appointment area-->
<section class="facilities-appointment-area">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="facilities-content-box">
                    <div class="sec-title">
                        <h1>Our Facilities</h1>
                        <span class="border"></span>
                    </div>
                    <!--Start facilities carousel-->
                    <div class="facilities-carousel">
                       
                        <!------Start single facilities item------->
                        <div class="single-facilities-item">
                            <div class="row">
                                <!--Start single item-->
                                <div class="col-md-6">
                                    <div class="single-item">
                                        <div class="icon-holder">
                                            <div class="icon-box">
                                                <div class="icon">
                                                    <span class="flaticon-transport"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-holder">
                                            <h3>24 Hrs Ambulance</h3>
                                            <p>How all this mistaken idea denoucing pleasure and praisings pain was born complete account expound.</p>
                                        </div>
                                    </div>
                                </div>
                                <!--End single item-->
                                <!--Start single item-->
                                <div class="col-md-6">
                                    <div class="single-item">
                                        <div class="icon-holder">
                                            <div class="icon-box">
                                                <div class="icon">
                                                    <span class="flaticon-drink"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-holder">
                                            <h3>Food & Dietary</h3>
                                            <p>The Dietitian plans the diet based on the therapeutic needs of the patient, Local specialties, Continental.</p>
                                        </div>
                                    </div>
                                </div>
                                <!--End single item-->
                            </div>
                            <div class="row">
                                <!--Start single item-->
                                <div class="col-md-6">
                                    <div class="single-item">
                                        <div class="icon-holder">
                                            <div class="icon-box">
                                                <div class="icon">
                                                    <span class="flaticon-avatar"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-holder">
                                            <h3>Special Nurses</h3>
                                            <p>Special nurse services can be arranged through Nursing , master of human happiness.</p>
                                        </div>
                                    </div>
                                </div>
                                <!--End single item-->
                                <!--Start single item-->
                                <div class="col-md-6">
                                    <div class="single-item">
                                        <div class="icon-holder">
                                            <div class="icon-box">
                                                <div class="icon">
                                                    <span class="flaticon-church"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-holder">
                                            <h3>Places of Worship</h3>
                                            <p>There is a temple of Goddess Krishna mariamman in the hospital premises, a Namaz room & Prayer</p>
                                        </div>
                                    </div>
                                </div>
                                <!--End single item-->
                            </div>
                        </div>
                        <!-------End single facilities item------>
                        
                        <!------Start single facilities item------->
                        <div class="single-facilities-item">
                            <div class="row">
                                <!--Start single item-->
                                <div class="col-md-6">
                                    <div class="single-item">
                                        <div class="icon-holder">
                                            <div class="icon-box">
                                                <div class="icon">
                                                    <span class="flaticon-transport"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-holder">
                                            <h3>24 Hrs Ambulance</h3>
                                            <p>How all this mistaken idea denoucing pleasure and praisings pain was born complete account expound.</p>
                                        </div>
                                    </div>
                                </div>
                                <!--End single item-->
                                <!--Start single item-->
                                <div class="col-md-6">
                                    <div class="single-item">
                                        <div class="icon-holder">
                                            <div class="icon-box">
                                                <div class="icon">
                                                    <span class="flaticon-drink"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-holder">
                                            <h3>Food & Dietary</h3>
                                            <p>The Dietitian plans the diet based on the therapeutic needs of the patient, Local specialties, Continental.</p>
                                        </div>
                                    </div>
                                </div>
                                <!--End single item-->
                            </div>
                            <div class="row">
                                <!--Start single item-->
                                <div class="col-md-6">
                                    <div class="single-item">
                                        <div class="icon-holder">
                                            <div class="icon-box">
                                                <div class="icon">
                                                    <span class="flaticon-avatar"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-holder">
                                            <h3>Special Nurses</h3>
                                            <p>Special nurse services can be arranged through Nursing , master of human happiness.</p>
                                        </div>
                                    </div>
                                </div>
                                <!--End single item-->
                                <!--Start single item-->
                                <div class="col-md-6">
                                    <div class="single-item">
                                        <div class="icon-holder">
                                            <div class="icon-box">
                                                <div class="icon">
                                                    <span class="flaticon-church"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-holder">
                                            <h3>Places of Worship</h3>
                                            <p>There is a temple of Goddess Krishna mariamman in the hospital premises, a Namaz room & Prayer</p>
                                        </div>
                                    </div>
                                </div>
                                <!--End single item-->
                            </div>
                        </div>
                        <!-------End single facilities item------>
                        
                     
                        
                    </div>
                    <!--End facilities carousel-->    
                </div>
            </div>
            <div class="col-md-4">
                <div class="single-sidebar wow fadeInUp" data-wow-delay="0s" data-wow-duration="1s" data-wow-offset="0">
                    <div class="sec-title">
                        <h3><?php echo $this->lang->line('latest_news'); ?></h3>
                    </div>
                    <ul class="categories clearfix">
                        <?php if (in_array('news', json_decode($front_setting->sidebar_options))) { ?>
                            <?php foreach ($banner_notices as $banner_notice_key => $banner_notice_value) { ?>
                                <li>
                                    <a href="<?php echo site_url('read/' . $banner_notice_value['slug']) ?>"><div class="date">
                                        <?php echo date('d', strtotime($banner_notice_value['publish_date'])); ?>
                                            <span>
                                                <?php echo date('F', strtotime($banner_notice_value['publish_date'])); ?>
                                            </span>
                                        <?php echo $banner_notice_value['title']; ?>
                                    </a>
                                </li>
                            <?php } ?>
                        <?php } ?>
                    </ul>
                </div>
                <!-- <div class="appointment">
                    <div class="sec-title">
                        <h1>Make an Appointment</h1>
                        <span class="border"></span>
                    </div>
                    <form id="appointment-form" name="appointment-form" action="http://st.ourhtmldemo.com/new/Hospitals/inc/sendmail.php" method="post">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-box">
                                    <input type="text" name="form_name" value="" placeholder="Your Name" required="">
                                </div>
                                <div class="input-box">
                                    <input type="email" name="form_email" value="" placeholder="Your Email" required="">
                                </div>
                                <div class="input-box">
                                    <select class="selectmenu">
                                        <option selected="selected">Select Department</option>
                                        <option>Cardiology</option>
                                        <option>Pulmonology</option>
                                        <option>Gynecology</option>
                                        <option>Neurology</option>
                                        <option>Urology</option>
                                        <option>Gastrology</option>
                                        <option>Pediatrician</option>
                                        <option>Laboratory</option>
                                    </select>
                                </div>
                                <div class="input-box">   
                                    <select class="selectmenu">
                                        <option selected="selected">Select Doctor</option>
                                        <option>Balance Body Mind</option>
                                        <option>Physical Activity</option>
                                        <option>Support & Motivation</option>
                                        <option>Exercise Program</option>
                                        <option>Healthy Daily Life</option>
                                        <option>First Hand Advice</option>
                                    </select>
                                </div>
                                <button class="thm-btn bgclr-1" type="submit">submit</button>        
                            </div>
                        </div>
                    </form>        
                </div> -->
            </div>
        </div>
    </div>    
</section>
<!--End facilities Appointment area-->
<!--Start fact counter area-->
<section class="fact-counter-area" style="background-image:url(<?php echo base_url(); ?>backend/themes/new/images/resources/fact-counter-bg.jpg);">
    <div class="container-fluid">
        <div class="sec-title text-center">
            <h1>Keep your headup & be patient</h1>
            <p>How all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the<br> system and expound the actual teachings of the great.</p>
        </div>
        <div class="row">
            <!--Start single item-->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ul>
                    <li>
                        <div class="single-item text-center">
                            <div class="icon-holder">
                                <span class="flaticon-medical"></span> 
                            </div>
                            <h1><span class="timer" data-from="1" data-to="25" data-speed="5000" data-refresh-interval="50">25</span></h1>
                            <h3>Years of Experience</h3>
                        </div>
                    </li>
                    <li>
                        <div class="single-item text-center">
                            <div class="icon-holder">
                                <span class="flaticon-smile"></span> 
                            </div>
                            <h1><span class="timer" data-from="1" data-to="284" data-speed="5000" data-refresh-interval="50">284</span></h1>
                            <h3>Well Smiley Faces</h3>
                        </div>
                    </li>
                    <li>
                        <div class="single-item text-center">
                            <div class="icon-holder">
                                <span class="flaticon-medical-1"></span> 
                            </div>
                            <h1><span class="timer" data-from="1" data-to="176" data-speed="5000" data-refresh-interval="50">176</span></h1>
                            <h3>Heart Transplant</h3>
                        </div>
                    </li>
                    <li>
                        <div class="single-item text-center">
                            <div class="icon-holder">
                                <span class="flaticon-ribbon"></span> 
                            </div>
                            <h1><span class="timer" data-from="1" data-to="142" data-speed="5000" data-refresh-interval="50">142</span></h1>
                            <h3>Awards Holded</h3>
                        </div>
                    </li>
                </ul>
            </div>
            <!--End single item-->
        </div>
    </div>
</section>
<!--End fact counter area-->