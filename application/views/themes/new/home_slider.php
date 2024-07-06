<?php if (isset($banner_images) && !empty($banner_images)) { ?>
<!--Start rev slider wrapper-->     
<section class="rev_slider_wrapper" style="overflow: visible;height: 250px ! important;">
    <div id="slider1" class="rev_slider"  data-version="5.0">
        <ul>
        <?php $banner_first = TRUE;
            foreach ($banner_images as $banner_img_key => $banner_img_value) { ?>
            <li data-transition="rs-20">
                <img src="<?php echo base_url($banner_img_value->dir_path . $banner_img_value->img_name); ?>"  alt=""  width="1920" height="700" data-bgposition="top center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="1" style="height:200px !important;">
                
                <div class="tp-caption  tp-resizeme" 
                    data-x="left" data-hoffset="0" 
                    data-y="top" data-voffset="220" 
                    data-transform_idle="o:1;"         
                    data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;" 
                    data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" 
                    data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" 
                    data-splitin="none" 
                    data-splitout="none"
                    data-responsive_offset="on"
                    data-start="1500">
                    <div class="slide-content-box mar-lft">
                        <h1>Hospitals providing total<br> healthcare <span>Solutions.</span></h1>
                        <p>Denouncing pleasure and praising pain was born and we will <br>give you a complete account of the system.</p>
                        <div class="button">
                            <a class="#" href="#">Read More</a>
                            <a class="btn-style-two" href="#">Departments</a>           
                        </div>  
                    </div>
                </div>
               
            </li>
            <?php $banner_first = FALSE; } ?>
        </ul>
        <?php } ?>
    </div>
</section>
<!--End rev slider wrapper-->
