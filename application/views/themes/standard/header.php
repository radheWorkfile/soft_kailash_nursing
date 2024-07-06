  <!-- Header --><?php $base_assets_url = base_url('backend/themes/standard/') ?>
<header id="header" class="header modern-header modern-header-theme-colored2">
    <div class="header-top bg-theme-colored2 sm-text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="widget text-white">
                        <i class="fa fa-clock-o text-theme-colored"></i> Opening Hours: 24/7
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="widget pull-right flip sm-pull-none">
                        <ul class="list-inline text-right flip sm-text-center">
                            <!-- <li>
                                <a class="text-white" href="<?php echo base_url()?>site/login">Admin Login & Staff Login</a>
                            </li> -->
                            <!-- <li class="text-white">|</li> -->
                            <li>
                                <a class="text-white" href="<?php echo base_url()?>site/userlogin">Patient Login</a>
                            </li>
                            <!-- <li class="text-white">|</li>
                            <li>
                                <a class="text-white" href="<?php echo base_url()?>site/agentlogin">Agent Login</a>
                            </li> -->
                            <li class="text-white">|</li>
                            <li>
                                <a class="text-white" href="<?php echo base_url()?>page/contact-us">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-middle p-0 bg-light xs-text-center pb-30">
        <div class="container pt-20 pb-20">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3">
                    <a class="menuzord-brand pull-left flip sm-pull-center mb-15" href="index-mp-layout1.html"><img src="<?php echo base_url($front_setting->logo); ?>" alt=""></a>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-7">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="widget no-border sm-text-center mt-10 mb-10 m-0">
                                <i class="fa fa-envelope text-theme-colored font-32 mt-5 mr-sm-0 sm-display-block pull-left flip sm-pull-none"></i>
                                <a href="#" class="font-12 text-gray text-uppercase">Mail Us Today</a>
                                <h5 class="font-13 text-black m-0"> <?php echo $school_setting->email; ?></h5>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="widget no-border sm-text-center mt-10 mb-10 m-0">
                                <i class="fa fa-phone-square text-theme-colored font-32 mt-5 mr-sm-0 sm-display-block pull-left flip sm-pull-none"></i>
                                <a href="#" class="font-12 text-gray text-uppercase">Call us </a>
                                <h5 class="font-13 text-black m-0"> <?php echo $school_setting->phone; ?></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-2 sm-text-center">
                    <div class="widget mt-10 mb-10 m-0">
                        <ul class="styled-icons icon-dark icon-sm mt-10">
                            <li class="wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".1s" data-wow-offset="10"><a href="<?php echo empty($front_setting->fb_url)?"javascript:void(0)":$front_setting->fb_url; ?>" data-bg-color="#3B5998"><i class="fa fa-facebook"></i></a></li>
                            <li class="wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".2s" data-wow-offset="10"><a href="<?php echo empty($front_setting->twitter_url)?"javascript:void(0)":$front_setting->twitter_url; ?>" data-bg-color="#02B0E8"><i class="fa fa-twitter"></i></a></li>
                            <li class="wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".3s" data-wow-offset="10"><a href="<?php echo empty($front_setting->linkedin_url)?"javascript:void(0)":$front_setting->linkedin_url; ?>" data-bg-color="#05A7E3"><i class="fa fa-linkedin"></i></a></li>
                            <li class="wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".3s" data-wow-offset="10"><a href="<?php echo empty($front_setting->instagram_url)?"javascript:void(0)":$front_setting->instagram_url; ?>" data-bg-color="radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%,#d6249f 60%,#285AEB 90%)"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-nav">
        <div class="header-nav-wrapper navbar-scrolltofixed">
            <div class="container">
                <nav id="menuzord" class="menuzord blue">
                    <ul class="menuzord-menu">
                        <li>
                            <a href="<?php echo base_url();?>">Home</a>
                        </li>
                        <li><a href="javascript:void(0)">About Us</a>
                            <div class="megamenu big-img none" style="width:50%">
                                <div class="megamenu-row">
                                    <div class="col6">
                                        <h4 class="megamenu-col-title"> <strong>Why Us ?</strong></h4>
                                        <div class="widget">
                                            <ul class="list-dashed list-icon">
                                                <li><a href="<?php echo base_url();?>page/who-we-are" style="text-decoration:none;">Who We Are</a></li>
                                                <li><a href="<?php echo base_url();?>page/mission-Vision" style="text-decoration:none;">Mission & Vision</a></li>
                                                <li><a href="<?php echo base_url();?>page/directors-message" style="text-decoration:none;">Director's Message</a></li>
                                                <li><a href="<?php echo base_url();?>page/management-team" style="text-decoration:none;">Management Team</a></li>
                                                <li><a href="<?php echo base_url();?>page/gallery" style="text-decoration:none;">Gallery</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col6">
                                        <h4 class="megamenu-col-title"><strong>For Emergency:</strong></h4>
                                        <ul class="list-icon">
                                            <li><a href="javascript:void(0)" style="font-size:15px;text-decoration:none;">+918546975282</a></li>
                                            <li><a href="javascript:void(0)" style="font-size:15px;text-decoration:none;">+918546975282</a></li>
                                            <li><a href="javascript:void(0)" style="font-size:15px;text-decoration:none;">+918546975282</a></li>
                                            <li><a href="javascript:void(0)" style="font-size:15px;text-decoration:none;">+918546975282</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <a href="javascript:void(0)">Our Specialist</a>
                            <div class="megamenu ">
                                <div class="megamenu-row">
                                    <div class="col3">
                                        <h4 class="megamenu-col-title"><strong>Department:</strong></h4>
                                        <div class="widget">
                                            <?php $department = $this->department_model->getDepartmentType(); ?>
                                            <ul class="list-icon">
                                                <li><a href="javascript:void(0)" style="text-decoration:none;"><?php echo $department[0]['department_name'] ?></a></li>
                                                <li><a href="javascript:void(0)" style="text-decoration:none;"><?php echo $department[1]['department_name'] ?></a></li>
                                                <li><a href="javascript:void(0)" style="text-decoration:none;"><?php echo $department[2]['department_name'] ?></a></li>
                                                <li><a href="javascript:void(0)" style="text-decoration:none;"><?php echo $department[3]['department_name'] ?></a></li>
                                                <li><a href="javascript:void(0)" style="text-decoration:none;"><?php echo $department[4]['department_name'] ?></a></li>
                                                <li><a href="javascript:void(0)" style="text-decoration:none;"><?php echo $department[5]['department_name'] ?></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col3">
                                        <br>
                                        <ul class="list-icon">
                                            <li><a href="javascript:void(0)" style="text-decoration:none;"><?php echo $department[6]['department_name'] ?></a></li>
                                            <li><a href="javascript:void(0)" style="text-decoration:none;"><?php echo $department[7]['department_name'] ?></a></li>
                                            <li><a href="javascript:void(0)" style="text-decoration:none;"><?php echo $department[8]['department_name'] ?></a></li>
                                            <li><a href="javascript:void(0)" style="text-decoration:none;"><?php echo $department[9]['department_name'] ?></a></li>
                                            <li><a href="javascript:void(0)" style="text-decoration:none;"><?php echo $department[10]['department_name'] ?></a></li>
                                            <li><a href="javascript:void(0)" style="text-decoration:none;"><?php echo $department[11]['department_name'] ?></a></li>
                                        </ul>
                                    </div>
                                    <div class="col3">
                                        <br>
                                        <ul class="list-icon">
                                            <li><a href="javascript:void(0)" style="text-decoration:none;"><?php echo $department[12]['department_name'] ?></a></li>
                                            <li><a href="javascript:void(0)" style="text-decoration:none;"><?php echo $department[13]['department_name'] ?></a></li>
                                            <li><a href="javascript:void(0)" style="text-decoration:none;"><?php echo $department[14]['department_name'] ?></a></li>
                                            <li><a href="javascript:void(0)" style="text-decoration:none;"><?php echo $department[15]['department_name'] ?></a></li>
                                            <li><a href="javascript:void(0)" style="text-decoration:none;"><?php echo $department[16]['department_name'] ?></a></li>
                                            <li><a href="javascript:void(0)" style="text-decoration:none;"><?php echo $department[17]['department_name'] ?></a></li>
                                        </ul>
                                    </div>
                                    <div class="col3">
                                        <br>
                                        <ul class="list-icon">
                                            <li><a href="javascript:void(0)" style="text-decoration:none;"><?php echo $department[18]['department_name'] ?></a></li>
                                            <li><a href="javascript:void(0)" style="text-decoration:none;"><?php echo $department[19]['department_name'] ?></a></li>
                                            <li><a href="javascript:void(0)" style="text-decoration:none;"><?php echo $department[20]['department_name'] ?></a></li>
                                            <li><a href="javascript:void(0)" style="text-decoration:none;"><?php echo $department[21]['department_name'] ?></a></li>
                                            <li><a href="javascript:void(0)" style="text-decoration:none;"><?php echo $department[22]['department_name'] ?></a></li>
                                            <li><a href="javascript:void(0)" style="text-decoration:none;"><?php echo $department[23]['department_name'] ?></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <a href="javascript:void(0)">Facilities & Services</a>
                            <div class="megamenu " style="width:50%;left:auto;">
                                <div class="megamenu-row">
                                    <div class="col6">
                                        <div class="widget">
                                            <ul class="list-icon">
                                                <li><a href="javascript:void(0)" style="text-decoration:none;">Emergency & Trauma Care</a></li>
                                                <li><a href="javascript:void(0)" style="text-decoration:none;">Ward & Rooms</a></li>
                                                <li><a href="javascript:void(0)" style="text-decoration:none;">Home Sample Collection</a></li>
                                                <li><a href="javascript:void(0)" style="text-decoration:none;">Critical Care Unit</a></li>
                                                <li><a href="javascript:void(0)" style="text-decoration:none;">Patient Supports Services</a></li>

                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col6">
                                        <br>
                                        <ul class="list-icon">
                                            <li><a href="javascript:void(0)" style="text-decoration:none;">Medical Delivery</a></li>
                                            <li><a href="javascript:void(0)" style="text-decoration:none;">Lab Test & Diagnostics</a></li>
                                            <li><a href="javascript:void(0)" style="text-decoration:none;">Day Care</a></li>
                                            <li><a href="javascript:void(0)" style="text-decoration:none;">ECG Services At Home</a></li>
                                        </ul>
                                    </div>
                        </li>
                        <li><a href="javascript:void(0)">Patient & Visitor Information</a>
                            <div class="megamenu" style="width:60% ;left:auto;">
                                <div class="megamenu-row">
                                    <div class="col4">
                                        <h4 class="megamenu-col-title"> <strong>For Patients</strong></h4>
                                        <div class="widget">
                                            <ul class="list-dashed list-icon">
                                                <li><a href="<?php echo base_url()?>site/userlogin" style="text-decoration:none;">Patient Login</a></li>
                                                <li><a href="#" style="text-decoration:none;">Admission Process</a></li>
                                                <li><a href="#" style="text-decoration:none;">Hospital Amenities</a></li>
                                                <li><a href="#" style="text-decoration:none;">TPA / Insurance</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col4">
                                        <h4 class="megamenu-col-title"><strong>For Visitors</strong></h4>
                                        <ul class="list-dashed list-icon">
                                            <li><a href="#" style="text-decoration:none;">General Information</a></li>
                                            <li><a href="#" style="text-decoration:none;">Visitor Guidelines</a></li>
                                            <li><a href="#" style="text-decoration:none;">Parking</a></li>
                                            <li><a href="#" style="text-decoration:none;">Accommondation</a></li>
                                        </ul>
                                    </div>
                                    <div class="col4">
                                        <img src="<?php echo $base_assets_url ?>images/hospital.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li><a href="javascript:void(0)">Location & Direction</a>
                            <div class="megamenu " style="width:65% ;left:auto;">
                                <div class="megamenu-row">
                                    <div class="col4">
                                    <iframe src="https://www.google.com/maps?q=<?php echo $school_setting->address;?>&amp;output=embed" width="100%" height="200px;"></iframe>
                                    </div>
                                    <div class="col4">
                                        <h4 class="megamenu-col-title"> <strong>Visiting Hours</strong></h4>
                                        <div class="widget">
                                            <ul class="list-icon">
                                                <li><a href="javascript:void(0)" style="text-decoration:none;">General Hours </a></li>
                                                <li><a href="javascript:void(0)" style="text-decoration:none;">Anytime, Day / Night </a></li>
                                                <li><a href="javascript:void(0)" style="text-decoration:none;">ICU HOURS</a></li>
                                                <li><a href="javascript:void(0)" style="text-decoration:none;">9:00AM TO 4:00 PM </a></li>
                                                <li><a href="javascript:void(0)" style="text-decoration:none;">6:00PM To 10:00PM</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col4">
                                        <h4 class="megamenu-col-title"><strong>Address:</strong></h4>
                                        <?php echo $school_setting->address; ?>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>




<!-- <?php
        foreach ($main_menus as $menu_key => $menu_value) {
            $submenus = false;
            $cls_menu_dropdown = "";
            $menu_selected = "";
            if ($menu_value['page_slug'] == $active_menu) {
                $menu_selected = ""; ///active
            }
            if (!empty($menu_value['submenus'])) {
                $submenus = true;
                $cls_menu_dropdown = "dropdown";
            }
            if ($menu_value['menu'] == $active_menu) {
                $menu_selected = "active";
            }
        ?>
                              <li class="<?php echo $menu_selected  ?>">
                                  <?php
                                    if (!$submenus) {
                                        $top_new_tab = '';
                                        $url = '#';
                                        if ($menu_value['open_new_tab']) {
                                            $top_new_tab = "target='_blank'";
                                        }
                                        if ($menu_value['ext_url']) {
                                            $url = $menu_value['ext_url_link'];
                                        } else {
                                            $url = site_url($menu_value['page_url']);
                                        }
                                    ?>

                                      <a href="<?php echo $url; ?>" <?php echo $top_new_tab; ?>>
                                          <?php echo $menu_value['menu']; ?>
                                      </a>
                                  <?php
                                    } else {
                                        $child_new_tab = '';
                                        $url = '#';
                                    ?>
                                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                          <?php echo $menu_value['menu']; ?>
                                      </a>
                                      <ul class="dropdown">
                                          <?php
                                            foreach ($menu_value['submenus'] as $submenu_key => $submenu_value) {
                                                if ($submenu_value['open_new_tab']) {
                                                    $child_new_tab = "target='_blank'";
                                                }
                                                if ($submenu_value['ext_url']) {
                                                    $url = $submenu_value['ext_url_link'];
                                                } else {
                                                    $url = site_url($submenu_value['page_url']);
                                                }
                                            ?>
                                              <li>
                                                  <a href="<?php echo $url; ?>" <?php echo $child_new_tab; ?>>
                                                      <?php echo $submenu_value['menu'] ?>
                                                  </a>
                                              </li>
                                          <?php } ?>
                                      </ul>
                                  <?php } ?>
                              </li>
                          <?php } ?> -->