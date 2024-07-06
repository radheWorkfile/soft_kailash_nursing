<?php
$currency_symbol = $this->customlib->getSchoolCurrencyFormat();
?>
<style type="text/css">

</style>

<div class="content-wrapper" style="min-height: 946px;">

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"> <?php echo $this->lang->line('agent') . ' ' . $this->lang->line('details'); ?></h3>
                        <small class="pull-right">
                            <div class="btn-group" style="margin-left:4px;">
                                <a href="<?php echo site_url('admin/agent/add_agent'); ?>" style="border-radius:2px 0px 0px 2px" class="btn btn-primary btn-sm">
                                    <?php echo $this->lang->line('add') . ' ' . $this->lang->line('agent'); ?>
                                </a>
                                <button type="button" style="border-left: 1px solid #2e6da4;" class="btn btn-primary dropdown-toggle btn-sm" data-toggle="dropdown">
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="<?php echo base_url('admin/agent/disableagentlist'); ?>">
                                            <?php echo $this->lang->line('disabled') . ' ' . $this->lang->line('agent'); ?>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <a href="<?php echo base_url(); ?>admin/agent/pay_commission" class="btn btn-primary btn-sm">
                                <i class="fa fa-reorder"></i>
                                <?php echo $this->lang->line('agent').' '.$this->lang->line('payment'); ?>
                            </a>
                        </small>
                    </div>
                    <div class="box-body">
                        <?php if ($this->session->flashdata('msg')) { ?> <?php echo $this->session->flashdata('msg') ?> <?php } ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <form role="form" action="<?php echo site_url('admin/agent') ?>" method="post" class="">
                                        <?php echo $this->customlib->getCSRF(); ?>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>
                                                    <?php echo $this->lang->line("agent_type"); ?>
                                                </label>
                                                <small class="req"> *</small>
                                                <select class="form-control" name="agent_type">
                                                    <option value="">
                                                        <?php echo $this->lang->line('select'); ?>
                                                    </option>
                                                    <?php foreach ($agent_type as $agent) { ?>
                                                        <option value="<?php echo $agent['id'] ?>" <?php echo set_select('agent_type', $agent['category_name'], set_value('agent_type')); ?>>
                                                            <?php echo $agent['category_name']; ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                                <span class="text-danger"><?php echo form_error('agent_type'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <button type="submit" name="search" value="search_filter" class="btn btn-primary btn-sm pull-right checkbox-toggle"><i class="fa fa-search"></i> <?php echo $this->lang->line('search'); ?></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <form role="form" action="<?php echo site_url('admin/agent') ?>" method="post" class="">
                                        <?php echo $this->customlib->getCSRF(); ?>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>
                                                    <?php echo $this->lang->line('search_by_keyword'); ?>
                                                </label>
                                                <input type="text" name="search_text" class="form-control" placeholder="<?php echo $this->lang->line('search_by_agent'); ?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <button type="submit" name="search" value="search_full" class="btn btn-primary pull-right btn-sm checkbox-toggle"><i class="fa fa-search"></i> <?php echo $this->lang->line('search'); ?></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if (isset($agent_details)) { ?>
                        <div class="box border0">
                            <div class="box-header ptbnull"></div>
                            <div class="nav-tabs-custom border0">
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#tab_1" data-toggle="tab" aria-expanded="false">
                                            <i class="fa fa-newspaper-o"></i>
                                            <?php echo $this->lang->line('card'); ?>
                                            <?php echo $this->lang->line('view'); ?>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="#tab_2" data-toggle="tab" aria-expanded="true">
                                            <i class="fa fa-list"></i>
                                            <?php echo $this->lang->line('list'); ?>
                                            <?php echo $this->lang->line('view'); ?>
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="download_label"><?php echo $title; ?></div>
                                    <div class="tab-pane table-responsive no-padding" id="tab_2">
                                        <table class="table table-striped table-bordered table-hover" id="servertable" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th><?php echo $this->lang->line('agent_id'); ?></th>
                                                    <th><?php echo $this->lang->line('name'); ?></th>
                                                    <th><?php echo $this->lang->line('agent_type'); ?></th>
                                                    <th><?php echo $this->lang->line('date_of_birth'); ?></th>
                                                    <th><?php echo $this->lang->line('email'); ?></th>
                                                    <th><?php echo $this->lang->line('mobile_no'); ?></th>
                                                    <th><?php echo $this->lang->line('action'); ?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($agent_details as $key => $e) {  ?>
                                                    <tr>
                                                        <td><?php echo $e["agent_id"] ?></td>
                                                        <td><?php echo $e["name"] ?></td>
                                                        <td><?php echo $e['agent_type']; ?></td>
                                                        <td><?php echo $e["dob"] ?></td>
                                                        <td><?php echo $e["email"] ?></td>
                                                        <td><?php echo $e["contact_no"] ?></td>
                                                        <td>
                                                            <a href="<?php echo base_url() . "admin/agent/edit_agent/" . $e['id'] ?>" class="btn btn-default btn-xs" data-toggle="tooltip" title="<?php echo $this->lang->line('edit'); ?>">
                                                                <i class="fa fa-pencil"></i>
                                                            </a>
                                                            <a href="<?php echo base_url() . "admin/agent/agent_profile/" . $e['id'] ?>" class="btn btn-default btn-xs" data-toggle="tooltip" title="<?php echo $this->lang->line('show'); ?>">
                                                                <i class="fa fa-reorder"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane active" id="tab_1">
                                        <div class="mediarow">
                                            <div class="row">
                                                <?php if (empty($agent_details)) { ?>
                                                    <div class="alert alert-info"><?php echo $this->lang->line('no_record_found'); ?></div>
                                                    <?php } else {
                                                    $count = 1;
                                                    foreach ($agent_details as $s) { ?>
                                                        <div class="col-lg-3 col-md-4 col-sm-6 img_div_modal">
                                                            <div class="staffinfo-box">
                                                                <div class="staffleft-box">
                                                                    <?php
                                                                    if (!empty($s["image"])) {
                                                                        $image = $s["image"];
                                                                    } else {
                                                                        $image = "no_image.png";
                                                                    }
                                                                    ?>
                                                                    <img src="<?php echo base_url() . "uploads/agent_images/" . $image ?>" />
                                                                </div>
                                                                <div class="staffleft-content">
                                                                    <h5>
                                                                        <span data-toggle="tooltip" title="<?php echo $this->lang->line('name'); ?>" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing">
                                                                            <?php echo $s["name"]; ?>
                                                                        </span>
                                                                    </h5>
                                                                    <p>
                                                                        <font data-toggle="tooltip" title="<?php echo "Contact Number"; ?>" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing">
                                                                            <?php echo "Contact- " . $s["contact_no"] ?>
                                                                        </font>
                                                                    </p>
                                                                    <p>
                                                                        <font data-toggle="tooltip" title="<?php echo "Agent Id"; ?>" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing">
                                                                            <?php echo "ID- " . $s["agent_id"] ?>
                                                                        </font>
                                                                    </p>
                                                                    <p class="staffsub">
                                                                        <?php if (!empty($s['agent_type'])) { ?>
                                                                            <span data-toggle="tooltip" title="<?php echo 'Agent Type'; ?>" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing">
                                                                                <?php echo $s['agent_type'] ?>
                                                                            </span>
                                                                        <?php } ?>
                                                                    </p>
                                                                </div>
                                                                <div class="overlay3">
                                                                    <div class="stafficons">
                                                                        <?php if ($this->rbac->hasPrivilege('can_see_other_users_profile', 'can_view')) { ?>
                                                                            <a title="<?php echo $this->lang->line('show') ?>" href="<?php echo base_url() . "admin/agent/agent_profile/" . $s["id"] ?>"><i class="fa fa-navicon"></i></a>
                                                                        <?php } ?>
                                                                        <?php if ($this->rbac->hasPrivilege('staff', 'can_edit')) { ?>
                                                                            <a title="<?php echo $this->lang->line('edit') ?>" href="<?php echo base_url() . "admin/agent/edit_agent/" . $s["id"] ?>"><i class=" fa fa-pencil"></i></a>
                                                                        <?php } ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--./col-md-3-->
                                                    <?php }
                                                } ?>
                                            </div>
                                            <!--./col-md-3-->
                                        </div>
                                        <!--./row-->
                                    </div>
                                    <!--./mediarow-->
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
</div>