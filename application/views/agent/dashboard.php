

<!-- Theme Styles -->

<link href="<?php echo base_url(); ?>backend/css/theme_style.css" rel="stylesheet" id="rt_style_components" type="text/css" />

<link href="<?php echo base_url(); ?>backend/css/plugins.min.css" rel="stylesheet" type="text/css" />

<link href="<?php echo base_url(); ?>backend/css/style.css" rel="stylesheet" type="text/css" />

<link href="<?php echo base_url(); ?>backend/css/responsive.css" rel="stylesheet" type="text/css" />

<link href="<?php echo base_url(); ?>backend/css/theme-color.css" rel="stylesheet" type="text/css" />



<div class="content-wrapper">

   <section class="content">

        <!-- start widget -->

        <div class="state-overview">

            <div class="row">

                <div class="col-xl-3 col-md-3 col-12">

                    <div class="info-box bg-aqua">

                        <a href="<?php echo site_url('admin/patient/search') ?>">

                            <span class="info-box-icon push-bottom">

                                <i class="fas fa-procedures"></i>

                            </span>

                            <div class="info-box-content">

                                <span class="info-box-text">

                                    <?php echo $this->lang->line('patient')." Referred "; ?>

                                </span>

                                <span class="info-box-number">

                                        <?php

                                            if (!empty($count_patient)) {

                                                echo  $count_patient[0]['count'];

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

                <div class="col-xl-3 col-md-3 col-12">

                    <div class="info-box bg-green">

                        <a href="<?php echo site_url('admin/patient/ipdsearch') ?>">

                            <span class="info-box-icon push-bottom">

                                <i class="fas fa-money-bill-alt"></i>

                            </span>

                            <div class="info-box-content">

                                <span class="info-box-text">

                                    <?php echo "Earn " . $this->lang->line('commission'); ?>

                                </span>

                                <span class="info-box-number">

                                    <i class="fas fa-inr">

                                        <?php

                                            if (!empty($com_total[0])) {

                                                echo  number_format($com_total[0]['total'],2);

                                            } else {

                                                echo "0.00";

                                            }

                                        ?>

                                    </i>

                                </span>

                            </div>

                        </a>

                    </div>

                </div>

                <div class="col-xl-3 col-md-3 col-12">

                    <div class="info-box" style="background:yellow !important;">

                        <a href="<?php echo site_url('admin/pharmacy/bill') ?>">

                            <span class="info-box-icon push-bottom">

                                <i class="fas fa-money-bill-wave"></i>

                            </span>

                            <div class="info-box-content">

                                <span class="info-box-text">

                                    <?php echo $this->lang->line('paid')." ".$this->lang->line('commission'); ?>

                                </span>

                                <span class="info-box-number">

                                    <i class="fas fa-inr">

                                        <?php

                                            if (!empty($com_paid[0])) {

                                                echo  number_format($com_paid[0]['total'],2);

                                            } else {

                                                echo "0.00";

                                            }

                                        ?>

                                    </i>

                                </span>

                            </div>

                        </a>

                    </div>

                </div>

                <div class="col-xl-3 col-md-3 col-12">

                    <div class="info-box bg-orange">

                        <a href="<?php echo site_url('admin/pathology/search') ?>">

                            <span class="info-box-icon push-bottom">

                                <i class="fas fa-money-bill"></i>

                            </span>

                            <div class="info-box-content">

                                <span class="info-box-text">

                                    <?php echo $this->lang->line('unpaid')." ".$this->lang->line('commission'); ?>

                                </span>

                                <span class="info-box-number">

                                    <i class="fas fa-inr">

                                        <?php

                                            if (!empty($com_unpaid[0])) {

                                                echo  number_format($com_unpaid[0]['total'],2);

                                            } else {

                                                echo "0.00";

                                            }

                                        ?>

                                    </i>

                                </span>

                            </div>

                        </a>

                    </div>

                </div>

            </div>

        </div>

        <!-- end widget -->

        <div class="row">

            <div class="col-md-12 col-sm-12">

                <div class="card  card-box">

                    <div class="card-head">

                        <header><?php echo "Latest Referred " . $this->lang->line('patient'); ?></header>

                    </div>

                    <div class="card-body ">

                        <div class="table-responsive">

                            <table

                                class="table table-striped table-bordered table-hover table-checkable order-column"

                                id="example4">

                                <thead>

                                    <tr>

                                        <th>Sn.No.</th>

                                        <th><?php echo $this->lang->line('patient') . " " . $this->lang->line('name'); ?></th>

                                        <th><?php echo $this->lang->line('gender'); ?></th>

                                        <th><?php echo $this->lang->line('phone'); ?></th>

                                        <th><?php echo $this->lang->line('email'); ?></th>

                                        <th><?php echo $this->lang->line('address'); ?></th>

                                        <th><?php echo $this->lang->line('status'); ?></th>

                                    </tr>

                                </thead>

                                <tbody>

                                    <?php if (empty($patient)) {?>

                                        <?php } else { $count = 1;foreach ($patient as $p) { ?>

                                            <tr class="odd gradeX">

                                                <td><?php echo $count++; ?></td>

                                                <td><?php echo $p['patient_name']."(".$p['patient_unique_id'].")"; ?></td>

                                                <td><?php echo $p['gender']; ?></td>

                                                <td><?php echo $p['mobileno']; ?></td>

                                                <td><?php echo $p['email']; ?></td>

                                                <td><?php echo $p['address']; ?></td>

                                                <td><?php echo ($p['discharged'] == "no")? "Not Discharged" : "Discharged"; ?></td>

                                            </tr>

                                        <?php } ?>

                                    <?php } ?>

                                </tbody>

                            </table>

                        </div>

                    </div>

                </div>

            </div>

        </div>

   </section>

</div>

