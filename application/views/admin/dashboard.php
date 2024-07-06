<!-- Material Design Lite CSS -->
<link rel="stylesheet" href="<?php echo base_url(); ?>backend/assets/bundles/material/material.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>backend/css/material_style.css">
<!-- Theme Styles -->
<link href="<?php echo base_url(); ?>backend/css/theme_style.css" rel="stylesheet" id="rt_style_components" type="text/css" />
<link href="<?php echo base_url(); ?>backend/css/plugins.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>backend/css/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>backend/css/responsive.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>backend/css/theme-color.css" rel="stylesheet" type="text/css" />
<style>
    .product-grid{font-family:Raleway,sans-serif;text-align:center;padding:0 0 72px;border:1px solid rgba(0,0,0,.1);overflow:hidden;position:relative;z-index:1}
    .product-grid .product-image{position:relative;transition:all .3s ease 0s}
    .product-grid .product-image a{display:block}
    .product-grid .product-image img{width:100%;height:auto}
    .product-grid .pic-1{opacity:1;transition:all .3s ease-out 0s}
    .product-grid:hover .pic-1{opacity:1}
    .product-grid .pic-2{opacity:0;position:absolute;top:0;left:0;transition:all .3s ease-out 0s}
    .product-grid:hover .pic-2{opacity:1}
    .product-grid .social{width:150px;padding:0;margin:0;list-style:none;opacity:0;transform:translateY(-50%) translateX(-50%);position:absolute;top:60%;left:50%;z-index:1;transition:all .3s ease 0s}
    .product-grid:hover .social{opacity:1;top:50%}
    .product-grid .social li{display:inline-block}
    .product-grid .social li a{color:#fff;background-color:#333;font-size:16px;line-height:40px;text-align:center;height:40px;width:40px;margin:0 2px;display:block;position:relative;transition:all .3s ease-in-out}
    .product-grid .social li a:hover{color:#fff;background-color:#ef5777}
    .product-grid .social li a:after,.product-grid .social li a:before{content:attr(data-tip);color:#fff;background-color:#000;font-size:12px;letter-spacing:1px;line-height:20px;padding:1px 5px;white-space:nowrap;opacity:0;transform:translateX(-50%);position:absolute;left:50%;top:-30px}
    .product-grid .social li a:after{content:'';height:15px;width:15px;border-radius:0;transform:translateX(-50%) rotate(45deg);top:-20px;z-index:-1}
    .product-grid .social li a:hover:after,.product-grid .social li a:hover:before{opacity:1}
    .product-grid .product-discount-label,.product-grid .product-new-label{color:#fff;background-color:#ef5777;font-size:12px;text-transform:uppercase;padding:2px 7px;display:block;position:absolute;top:10px;left:0}
    .product-grid .product-discount-label{background-color:#333;left:auto;right:0}
    .product-grid .rating{color:#FFD200;font-size:12px;padding:12px 0 0;margin:0;list-style:none;position:relative;z-index:-1}
    .product-grid .rating li.disable{color:rgba(0,0,0,.2)}
    .product-grid .product-content{background-color:#fff;text-align:center;padding:12px 0;margin:0 auto;position:absolute;left:0;right:0;bottom:-27px;z-index:1;transition:all .3s}
    .product-grid:hover .product-content{bottom:0}
    .product-grid .title{font-size:13px;font-weight:400;text-transform:capitalize;margin:0 0 10px;transition:all .3s ease 0s}
    .product-grid .title a{color:#828282}
    .product-grid .title a:hover,.product-grid:hover .title a{color:#ef5777}
    .product-grid .price{color:#333;font-size:17px;font-family:Montserrat,sans-serif;font-weight:700;letter-spacing:.6px;margin-bottom:8px;text-align:center;transition:all .3s}
    .product-grid .price span{color:#999;font-size:13px;font-weight:400;text-decoration:line-through;margin-left:3px;display:inline-block}
    .product-grid .add-to-cart{color:#000;font-size:13px;font-weight:600}
    @media only screen and (max-width:990px){.product-grid{margin-bottom:30px}
    }
</style>
<div class="content-wrapper">
   <section class="content">
      <div class="row">
         <div class="col-md-12">
            <?php
               $bar_chart = true;
               $line_chart = true;
               foreach ($notifications as $notice_key => $notice_value) {
                   ?>
            <div class="dashalert alert alert-success alert-dismissible" role="alert">
               <button type="button" class="alertclose close close_notice" data-dismiss="alert" aria-label="Close" data-noticeid="<?php echo $notice_value->id; ?>"><span aria-hidden="true">&times;</span></button>
               <a href="<?php echo site_url('admin/notification') ?>"><?php echo $notice_value->title; ?></a>
            </div>
            <?php
               }
               ?>
            <!--  <?php
               if ($systemnotifications) {
                   foreach ($systemnotifications as $key => $systemnotification) {
                       ?>
               <div class="dashalert alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="alertclose close close_notice" data-dismiss="alert" aria-label="Close" data-noticeid="<?php echo $systemnotification['id']; ?>"><span aria-hidden="true">&times;</span></button>
                    <a href="<?php echo site_url('admin/systemnotification') ?>"><?php echo $systemnotification["notification_title"]; ?></a>
                </div>   
               <?php
                  }
                  }
                  ?> -->
         </div>
         <?php
             $this->customlib->getSchoolCurrencyFormat();
            ?>  
         <?php
            $div_col = 12;
            $div_rol = 12;
            
            if ($this->rbac->hasPrivilege('staff_role_count_widget', 'can_view')) {
                $div_col = 9;
                $div_rol = 12;
            }
            
            $widget_col = array();
            if ($this->rbac->hasPrivilege('Monthly fees_collection_widget', 'can_view')) {
                $widget_col[0] = 1;
                $div_rol = 3;
            }
            
            if ($this->rbac->hasPrivilege('monthly_expense_widget', 'can_view')) {
                $widget_col[1] = 2;
                $div_rol = 3;
            }
            
            if ($this->rbac->hasPrivilege('student_count_widget', 'can_view')) {
                $widget_col[2] = 3;
                $div_rol = 3;
            }
            $div = sizeof($widget_col);
            
            if (!empty($widget_col)) {
                $widget = 12 / $div;
            } else {
                $widget = 12;
            }
            ?>          
      </div>
     <!-- start widget -->
        <div class="state-overview">
            <div class="row">
                <?php
                if ($this->module_lib->hasActive('OPD')) {
                    if ($this->rbac->hasPrivilege('opd_income_widget', 'can_view')) {?>
                    <div class="col-xl-3 col-md-3 col-12">
                        <div class="info-box bg-green">
                            <a href="<?php echo site_url('admin/patient/search') ?>">
                                <span class="info-box-icon push-bottom">
                                    <i class="fas fa-stethoscope"></i>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">
                                        <?php echo $this->lang->line('opd') . " " . $this->lang->line('income'); ?>
                                    </span>
                                    <span class="info-box-number">
                                        <i class="fas fa-inr">
                                            <?php
                                            //print_r($opd_income);die;
                                                if (!empty($opd_income)) {
                                                    echo  $opd_income;
                                                } else {
                                                    echo "0";
                                                }
                                            ?>
                                        </i>
                                    </span>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php } } ?>

                <?php if ($this->module_lib->hasActive('IPD')) {
                    if ($this->rbac->hasPrivilege('ipd_income_widget', 'can_view')) {?>
                    <div class="col-xl-3 col-md-3 col-12">
                        <div class="info-box bg-orange">
                            <a href="<?php echo site_url('admin/patient/ipdsearch') ?>">
                                <span class="info-box-icon push-bottom">
                                    <i class="fas fa-procedures"></i>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">
                                        <?php echo $this->lang->line('ipd') . " " . $this->lang->line('income'); ?>
                                    </span>
                                    <span class="info-box-number">
                                        <i class="fas fa-inr">
                                            <?php
                                                if (!empty($ipd_income)) {
                                                    echo  $ipd_income;
                                                } else {
                                                    echo "0";
                                                }
                                            ?>
                                        </i>
                                    </span>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php } } ?>

                <?php if ($this->module_lib->hasActive('pharmacy')) {
                    if ($this->rbac->hasPrivilege('pharmacy_income_widget', 'can_view')) {?>
                    <div class="col-xl-3 col-md-3 col-12">
                        <div class="info-box" style="background:yellow !important;">
                            <a href="<?php echo site_url('admin/pharmacy/bill') ?>">
                                <span class="info-box-icon push-bottom">
                                    <i class="fas fa-mortar-pestle"></i>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">
                                        <?php echo $this->lang->line('pharmacy') . " " . $this->lang->line('income'); ?>
                                    </span>
                                    <span class="info-box-number">
                                        <i class="fas fa-inr">
                                            <?php
                                                if (!empty($pharmacy_income)) {
                                                    echo  $pharmacy_income;
                                                } else {
                                                    echo "0";
                                                }
                                            ?>
                                        </i>
                                    </span>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php } } ?>

                <?php if ($this->module_lib->hasActive('pathology')) {
                    if ($this->rbac->hasPrivilege('pathology_income_widget', 'can_view')) {?>
                    <div class="col-xl-3 col-md-3 col-12">
                        <div class="info-box bg-aqua">
                            <a href="<?php echo site_url('admin/pathology/search') ?>">
                                <span class="info-box-icon push-bottom">
                                    <i class="fas fa-flask"></i>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">
                                        <?php echo $this->lang->line('pathology') . " " . $this->lang->line('income'); ?>
                                    </span>
                                    <span class="info-box-number">
                                        <i class="fas fa-inr">
                                            <?php
                                                if (!empty($pathology_income)) {
                                                    echo  $pathology_income;
                                                } else {
                                                    echo "0";
                                                }
                                            ?>
                                        </i>
                                    </span>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php } } ?>
            </div>
            <div class="row">
                <?php if ($this->module_lib->hasActive('radiology')) {
                    if ($this->rbac->hasPrivilege('radiology_income_widget', 'can_view')) {?>
                    <div class="col-xl-3 col-md-3 col-12">
                        <div class="info-box bg-green">
                            <a href="<?php echo site_url('admin/radio/search') ?>">
                                <span class="info-box-icon push-bottom">
                                    <i class="fas fa-microscope"></i>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">
                                        <?php echo $this->lang->line('radiology') . " " . $this->lang->line('income'); ?>
                                    </span>
                                    <span class="info-box-number">
                                        <i class="fas fa-inr">
                                            <?php
                                                if (!empty($radiology_income)) {
                                                    echo  $radiology_income;
                                                } else {
                                                    echo "0";
                                                }
                                            ?>
                                        </i>
                                    </span>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php } } ?>

                <?php if ($this->module_lib->hasActive('operation_theatre')) {
                    if ($this->rbac->hasPrivilege('ot_income_widget', 'can_view')) { ?>
                    <div class="col-xl-3 col-md-3 col-12">
                        <div class="info-box bg-orange">
                            <a href="<?php echo site_url('admin/operationtheatre/otsearch') ?>">
                                <span class="info-box-icon push-bottom">
                                    <i class="fas fa-scissors"></i>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">
                                        <?php echo $this->lang->line('operation_theatre') . " " . $this->lang->line('income'); ?>
                                    </span>
                                    <span class="info-box-number">
                                        <i class="fas fa-inr">
                                            <?php
                                                if (!empty($operation_theatre_income)) {
                                                    echo  $operation_theatre_income;
                                                } else {
                                                    echo "0";
                                                }
                                            ?>
                                        </i>
                                    </span>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php } } ?>

                <?php if ($this->module_lib->hasActive('blood_bank')) {
                    if ($this->rbac->hasPrivilege('blood_bank_income_widget', 'can_view')) {?>
                    <div class="col-xl-3 col-md-3 col-12">
                        <div class="info-box" style="background:yellow !important;">
                            <a href="<?php echo site_url('admin/bloodbank/issue') ?>">
                                <span class="info-box-icon push-bottom">
                                    <i class="fas fa-tint"></i>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">
                                        <?php echo $this->lang->line('blood_bank') . " " . $this->lang->line('income'); ?>
                                    </span>
                                    <span class="info-box-number">
                                        <i class="fas fa-inr">
                                            <?php
                                                if (!empty($blood_bank_income)) {
                                                    echo  $blood_bank_income;
                                                } else {
                                                    echo "0";
                                                }
                                            ?>
                                        </i>
                                    </span>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php } } ?>

                <?php if ($this->module_lib->hasActive('ambulance')) {
                    if ($this->rbac->hasPrivilege('ambulance_income_widget', 'can_view')) {?>
                    <div class="col-xl-3 col-md-3 col-12">
                        <div class="info-box bg-aqua">
                            <a href="<?php echo site_url('admin/vehicle/search') ?>">
                                <span class="info-box-icon push-bottom">
                                    <i class="fas fa-ambulance"></i>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">
                                        <?php echo $this->lang->line('ambulance') . " " . $this->lang->line('income'); ?>
                                    </span>
                                    <span class="info-box-number">
                                        <i class="fas fa-inr">
                                            <?php
                                                if (!empty($ambulance_income)) {
                                                    echo  $ambulance_income;
                                                } else {
                                                    echo "0";
                                                }
                                            ?>
                                        </i>
                                    </span>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php } } ?>
            </div>
            <div class="row">
                <?php if ($this->module_lib->hasActive('income')) {?>
                    <div class="col-xl-3 col-md-3 col-12">
                        <div class="info-box bg-green">
                            <a href="<?php echo site_url('admin/income') ?>">
                                <span class="info-box-icon push-bottom">
                                    <i class="fas fa-money-bill-wave"></i>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">
                                        <?php echo $this->lang->line('general') . " " . $this->lang->line('income'); ?>
                                    </span>
                                    <span class="info-box-number">
                                        <i class="fas fa-inr">
                                            <?php
                                                if (!empty($general_income)) {
                                                    echo  $general_income;
                                                } else {
                                                    echo "0";
                                                }
                                            ?>
                                        </i>
                                    </span>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php } ?>

                <?php if ($this->module_lib->hasActive('expense')) { ?>
                    <div class="col-xl-3 col-md-3 col-12">
                        <div class="info-box bg-orange">
                            <a href="<?php echo site_url('admin/expense') ?>">
                                <span class="info-box-icon push-bottom">
                                    <i class="fas fa-inr"></i>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">
                                        <?php echo $this->lang->line('expenses'); ?>
                                    </span>
                                    <span class="info-box-number">
                                        <i class="fas fa-inr">
                                            <?php
                                                if (!empty($expense->amount)) {
                                                    echo  number_format($expense->amount, 2);
                                                } else {
                                                    echo "0";
                                                }
                                            ?>
                                        </i>
                                    </span>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php } ?>


                <?php if ($this->module_lib->hasActive('expense')) { ?>
                    <div class="col-xl-6 col-md-6 col-12">
                        <div class="info-box bg-green">
                            <a href="<?php echo site_url('admin/pharmacy/search') ?>">
                                <span class="info-box-icon push-bottom">
                                    <i class="fas fa-inr"></i>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">
                                        <?php echo "Available Pharmacy Stock Price" ?>
                                    </span>
                                    <span class="info-box-number">
                                        <i class="fas fa-inr">
                                            <?php
                                                if (!empty($avl_stock_price)) {
                                                    echo  number_format($avl_stock_price, 2);
                                                } else {
                                                    echo "0";
                                                }
                                            ?>
                                        </i>
                                    </span>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php } ?>


            </div>
        </div>
        <!-- end widget -->
        <!-- chart start -->
        <div class="row">
            <?php if ($this->rbac->hasPrivilege('yearly_income_expense_chart', 'can_view')) {?>
                <div class="col-md-8">
                    <div class="card card-box">
                        <div class="card-head">
                            <header><?php echo $this->lang->line('yearly_income_expense'); ?></header>
                            <div class="tools">
                                <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                                <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                                <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                            </div>
                        </div>
                        <div class="card-body height-9">
                            <div class="row">
                                <canvas id="lineChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <?php if ($this->rbac->hasPrivilege('monthly_income_expense_chart', 'can_view')) {?>
                <div class="col-md-4">
                    <div class="card card-box">
                        <div class="card-head">
                            <header><?php echo $this->lang->line('monthly_income_overview'); ?></header>
                            <div class="tools">
                                <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                                <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                                <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                            </div>
                        </div>
                        <div class="card-body height-9">
                            <div class="row">
                                <canvas id="pieChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }?>
        </div>
        <!-- Chart end -->
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card  card-box">
                    <div class="card-head">
                        <header><?php echo $this->lang->line('appointment') . " " . $this->lang->line('report'); ?></header>
                        <div class="tools">
                            <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                            <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                            <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                        </div>
                    </div>
                    <div class="card-body ">
                        <div class="table-responsive">
                            <table
                                class="table table-striped table-bordered table-hover table-checkable order-column"
                                id="example4">
                                <thead>
                                    <tr>
                                        <th><?php echo $this->lang->line('patient') . " " . $this->lang->line('name'); ?></th>
                                        <th><?php echo $this->lang->line('date'); ?></th>
                                        <th><?php echo $this->lang->line('phone'); ?></th>
                                        <th><?php echo $this->lang->line('gender'); ?></th>
                                        <th><?php echo $this->lang->line('doctor'); ?></th>
                                        <th><?php echo $this->lang->line('source'); ?></th>
                                        <th><?php echo $this->lang->line('status'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                if (empty($resultlist)) {
                                    ?>

                                    <?php
                                } else {
                                    $count = 1;
                                    $total = 0;
                                    foreach ($resultlist as $appointment) {
                                        if ($appointment["appointment_status"] == "approve") {
                                            $label = "class='label label-success'";
                                        } else if ($appointment["appointment_status"] == "pending") {
                                            $label = "class='label label-warning'";
                                        } else if ($appointment["appointment_status"] == "cancel") {
                                            $label = "class='label label-danger'";
                                        }
                                        ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $appointment['patient_name']; ?></td>
                                            <td><?php echo date($this->customlib->getSchoolDateFormat(true, true), strtotime($appointment['date'])) ?></td>
                                            <td><?php echo $appointment['mobileno']; ?></td>
                                            <td><?php echo $appointment['gender']; ?></td>
                                            <td><?php echo $appointment['name'] . " " . $appointment['surname']; ?></td>
                                            <td><?php echo $appointment['source']; ?></td>
                                            <td><small <?php echo $label ?> ><?php echo $this->lang->line($appointment['appointment_status']); ?></small></td>
                                        </tr>
                                        <?php
                                        $count++;
                                    }
                                    ?>
                                </tbody>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-sm-12">
                <div class="card  card-box">
                    <div class="card-head">
                        <header>DOCTORS LIST</header>
                        <div class="tools">
                            <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                            <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                            <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                        </div>
                    </div>
                    <div class="row">
                        <?php
                        if(!empty($doc)){
                            foreach($doc as $doctor){
                                if (!empty($doctor["image"])) {
                                    $image = $doctor['image'];
                                } else {
                                    $image = "no_image.png";
                                }
                                ?>
                                <div class="col-md-3 col-sm-6" style="margin-bottom: 20px;">
                                    <div class="product-grid">
                                        <div class="product-image">
                                            <img class="pic-1" src="<?php echo base_url() . "uploads/staff_images/" . $image; ?>">
                                        </div>
                                        <div class="product-content">
                                            <h3 class="title"><a style="font-size: 21px;" href="<?php echo base_url() . "admin/staff/profile/".$doctor['id'] ?>">Dr.<?php echo $doctor['name']?></a></h3>
                                            <div class="price"><?=($doctor['qualification']!='')?$doctor['qualification']:'N/A';?></div>
                                        </div>
                                    </div>
                                </div>
                            <?php } } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <?php if ($this->rbac->hasPrivilege('staff_role_count_widget', 'can_view')) {?>
                    <?php foreach ($roles as $key => $value) {?>
                        <div class="col-lg-3 col-md-3 col-sm-12 col20">    
                            <div class="info-box">
                                <a href="<?php echo base_url() . "admin/staff" ?>">
                                    <span class="info-box-icon bg-yellow">
                                        <i class="fas fa-user-secret"></i>
                                    </span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">
                                            <?php echo $key; ?>
                                        </span>
                                        <span class="info-box-number">
                                            <?php echo $value; ?>
                                        </span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php } ?>
            <?php } ?>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-10">
                <?php if ($this->rbac->hasPrivilege('calendar_to_do_list', 'can_view')) {?>
                    <div class="card  card-box">
                        <div class="card-head">
                            <header>
                                <?php echo $this->lang->line('calendar'); ?>
                            </header>
                            <div class="tools">
                                <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                                <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                                <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                                <div id="calendar" ></div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div> 
   </section>
</div>
<div id="newEventModal" class="modal fade " role="dialog">
   <div class="modal-dialog modal-dialog2 modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><?php echo "Add New Event"; ?></h4>
         </div>
         <div class="modal-body">
            <div class="row">
               <form role="form"  id="addevent_form" method="post" enctype="multipart/form-data" action="">
                  <div class="form-group col-md-12">
                     <label for="exampleInputEmail1"><?php echo $this->lang->line('event'); ?> <?php echo $this->lang->line('title'); ?></label>
                     <input class="form-control" name="title" id="input-field"> 
                     <span class="text-danger"><?php echo form_error('title'); ?></span>
                  </div>
                  <div class="form-group col-md-12">
                     <label for="exampleInputEmail1"><?php echo $this->lang->line('description'); ?></label>
                     <textarea name="description" class="form-control" id="desc-field"></textarea>
                  </div>
                  <div class="form-group col-md-12">
                     <label for="exampleInputEmail1"><?php echo $this->lang->line('event'); ?> <?php echo $this->lang->line('date'); ?></label>
                     <div class="input-group">
                        <div class="input-group-addon">
                           <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" autocomplete="off" name="event_dates" class="form-control pull-right" id="date-field">
                     </div>
                  </div>
                  <div class="form-group col-md-12">
                     <label for="exampleInputEmail1"><?php echo $this->lang->line('event'); ?> <?php echo $this->lang->line('color'); ?></label>
                     <input type="hidden" name="eventcolor" autocomplete="off" id="eventcolor" class="form-control">
                  </div>
                  <div class="form-group col-md-12">
                     <?php
                        $i = 0;
                        $colors = '';
                        foreach ($event_colors as $color) {
                            $color_selected_class = 'cpicker-small';
                            if ($i == 0) {
                                $color_selected_class = 'cpicker-big';
                            }
                            $colors .= "<div class='calendar-cpicker cpicker " . $color_selected_class . "' data-color='" . $color . "' style='background:" . $color . ";border:1px solid " . $color . "; border-radius:100px'></div>";
                        
                            $i++;
                        }
                        echo '<div class="cpicker-wrapper">';
                        echo $colors;
                        echo '</div>';
                        ?>
                  </div>
                  <div class="form-group col-md-12">
                     <label for="exampleInputEmail1"><?php echo $this->lang->line('event'); ?> <?php echo $this->lang->line('type'); ?></label>
                     <br/>
                     <label class="radio-inline">
                     <input type="radio" name="event_type" value="public" id="public"><?php echo $this->lang->line('public'); ?>
                     </label>
                     <label class="radio-inline">
                     <input type="radio" name="event_type" value="private" checked id="private"><?php echo $this->lang->line('private'); ?>
                     </label>
                     <label class="radio-inline">
                     <input type="radio" name="event_type" value="sameforall" id="public"><?php echo $this->lang->line('all'); ?> <?php echo $role ?>
                     </label>
                     <label class="radio-inline">
                     <input type="radio" name="event_type" value="protected" id="public"><?php echo $this->lang->line('protected'); ?>
                     </label> 
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                     <input type="submit" class="btn btn-primary submit_addevent pull-right" value="<?php echo $this->lang->line('save'); ?>">
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
<div id="viewEventModal" class="modal fade " role="dialog">
   <div class="modal-dialog modal-dialog2 modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><?php echo "View Event"; ?></h4>
         </div>
         <div class="modal-body">
            <div class="row">
               <form role="form"   method="post" id="updateevent_form"  enctype="multipart/form-data" action="" >
                  <div class="form-group col-md-12">
                     <label for="exampleInputEmail1"><?php echo $this->lang->line('event') ?><?php echo $this->lang->line('title') ?></label>
                     <input class="form-control" name="title" placeholder="Event Title" id="event_title"> 
                  </div>
                  <div class="form-group col-md-12">
                     <label for="exampleInputEmail1"><?php echo $this->lang->line('description') ?></label>
                     <textarea name="description" class="form-control" placeholder="Event Description" id="event_desc"></textarea>
                  </div>
                  <div class="form-group col-md-12">
                     <label for="exampleInputEmail1"><?php echo $this->lang->line('event') ?><?php echo $this->lang->line('date') ?></label>
                     <div class="input-group">
                        <div class="input-group-addon">
                           <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" autocomplete="off" name="eventdates" class="form-control pull-right" id="eventdates">
                     </div>
                  </div>
                  <input type="hidden" name="eventid" id="eventid">
                  <div class="form-group col-md-12">
                     <label for="exampleInputEmail1"><?php echo $this->lang->line('event') ?><?php echo $this->lang->line('color') ?></label>
                     <input type="hidden" name="eventcolor" autocomplete="off" placeholder="Event Color" id="event_color" class="form-control">
                  </div>
                  <div class="form-group col-md-12">
                     <?php
                        $i = 0;
                        $colors = '';
                        foreach ($event_colors as $color) {
                            $colorid = trim($color, "#");
                            $color_selected_class = 'cpicker-small';
                            if ($i == 0) {
                                $color_selected_class = 'cpicker-big';
                            }
                            $colors .= "<div id=" . $colorid . " class='calendar-cpicker cpicker " . $color_selected_class . "' data-color='" . $color . "' style='background:" . $color . ";border:1px solid " . $color . "; border-radius:100px'></div>";
                            $i++;
                        }
                        echo '<div class="cpicker-wrapper selectevent">';
                        echo $colors;
                        echo '</div>';
                        ?>
                  </div>
                  <div class="form-group col-md-12">
                     <label for="exampleInputEmail1"><?php echo $this->lang->line('event') ?><?php echo $this->lang->line('type') ?></label>
                     <label class="radio-inline">
                     <input type="radio" name="eventtype" value="public" id="public"><?php echo $this->lang->line('public') ?>
                     </label>
                     <label class="radio-inline">
                     <input type="radio" name="eventtype" value="private" id="private"><?php echo $this->lang->line('private') ?> 
                     </label>
                     <label class="radio-inline">
                     <input type="radio" name="eventtype" value="sameforall" id="public"><?php echo $this->lang->line('all') ?> <?php echo $role ?>
                     </label>
                     <label class="radio-inline">
                     <input type="radio" name="eventtype" value="protected" id="public"><?php echo $this->lang->line('protected') ?> 
                     </label>
                  </div>
                  <div class="col-xs-11 col-sm-11 col-md-11 col-lg-11">
                     <input type="submit" class="btn btn-primary submit_update pull-right" value="<?php echo $this->lang->line('save'); ?>">
                  </div>
                  <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                     <?php if ($this->rbac->hasPrivilege('calendar_to_do_list', 'can_delete')) { ?>
                     <input type="button" id="delete_event" class="btn btn-primary submit_delete pull-right" value="<?php echo $this->lang->line('delete'); ?>">
                     <?php } ?>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
<script src="<?php echo base_url() ?>backend/js/Chart.bundle.js"></script>
<script src="<?php echo base_url() ?>backend/js/utils.js"></script>
<script type="text/javascript">
   window.onload = function () {
       var dataPointss = [];
       console.log(dataPointss);
   
   
       var yearly_collection_array = <?php echo json_encode($yearly_collection) ?>;
       var yearly_expense_array = <?php echo json_encode($yearly_expense) ?>;
       var MONTHS = <?php echo json_encode($total_month) ?>;
       console.log(yearly_collection_array);
       console.log(yearly_expense_array);
   
   
       var config = {
           type: 'line',
           data: {
               labels: MONTHS,
               datasets: [
   
                   {
                       label: '<?php echo $this->lang->line('income') ?>',
                       fill: false,
                       backgroundColor: '#66aa18',
                       borderColor: '#66aa18',
                       data: yearly_collection_array,
                   },
   
                   {
                       label: '<?php echo $this->lang->line('expense') ?>',
                       backgroundColor: window.chartColors.red,
                       borderColor: window.chartColors.red,
                       data: yearly_expense_array,
                       fill: false,
                   }
               ]
           },
           options: {
               responsive: true,
               title: {
                   display: false,
                   text: 'Chart Data'
               },
               tooltips: {
                   mode: 'index',
                   intersect: false,
               },
               hover: {
                   mode: 'nearest',
                   intersect: true
               },
               scales: {
                   xAxes: [{
                           display: true,
                           scaleLabel: {
                               display: false,
                               labelString: 'Month'
                           }
                       }],
                   yAxes: [{
                           display: true,
                           scaleLabel: {
                               display: false,
                               labelString: 'Value'
                           },
   
                       }]
               }
           }
       };
   
       var ctx = document.getElementById('lineChart').getContext('2d');
       window.myLine = new Chart(ctx, config);
   
       /* Pie chart */
       var ph = "pharmacy";
   
       var dataPointss = [];
       var color = ['#f56954', '#00a65a', '#f39c12', '#2f4074', '#00c0ef', '#3c8dbc', '#d2d6de', '#b7b83f'];
       var datas = <?php echo json_encode($jsonarr) ?>;
   //console.log(datas);
   
       function addData(datap) {
           for (var i = 0; i < datap.value.length; i++) {
               lb = datap.label[i];
   
               console.log(lb);
               dataPointss.push({
                   label: lb,
                   value: datap.value[i],
                   color: color[i],
                   highlight: color[i]
               });
           }
           //chart.render();
       }
       addData(datas);
       var labe = ['<?php echo $this->lang->line('opd') ?>', '<?php echo $this->lang->line('ipd') ?>', '<?php echo $this->lang->line('pharmacy') ?>', '<?php echo $this->lang->line('pathology') ?>', '<?php echo $this->lang->line('radiology') ?>', '<?php echo $this->lang->line('operation_theatre') ?>', '<?php echo $this->lang->line('blood_bank') ?>', '<?php echo $this->lang->line('ambulance') ?>', '<?php echo $this->lang->line('income') ?>'];
       /* donut chart */
       var config2 = {
           type: 'doughnut',
           data: {
               datasets: [{
                       data: datas.value,
                       backgroundColor: [
                           '#715d20',
                           window.chartColors.orange,
                           window.chartColors.yellow,
                           window.chartColors.green,
                           window.chartColors.purple,
                           window.chartColors.blue,
                           window.chartColors.grey,
                           '#42b782',
                           '#66aa18',
                       ],
                       label: 'Dataset 1'
                   }],
               labels: labe,
           },
           options: {
               responsive: true,
               circumference: Math.PI,
               rotation: -Math.PI,
               legend: {
                   position: 'top',
               },
               title: {
                   display: false,
                   text: 'Chart.js Doughnut Chart'
               },
               animation: {
                   animateScale: true,
                   animateRotate: true
               }
           }
       };
   
   
       var ctx2 = document.getElementById('pieChart').getContext('2d');
   
       window.myDoughnut = new Chart(ctx2, config2);
   
   
   }
   
   $(document).ready(function () {
   
       $(document).on('click', '.close_notice', function () {
           var data = $(this).data();
           $.ajax({
               type: "POST",
               url: base_url + "admin/notification/read",
               data: {'notice': data.noticeid},
               dataType: "json",
               success: function (data) {
                   if (data.status == "fail") {
   
                       errorMsg(data.msg);
                   } else {
                       successMsg(data.msg);
                   }
   
               }
           });
       });
   });
</script>
<!-- Common js-->
<script src="<?php echo base_url(); ?>backend/assets/app.js"></script>
<script src="<?php echo base_url(); ?>backend/assets/layout.js"></script>
<script src="<?php echo base_url(); ?>backend/assets/theme-color.js"></script>
<!-- material -->
<script src="<?php echo base_url(); ?>backend/assets/bundles/material/material.min.js"></script>
