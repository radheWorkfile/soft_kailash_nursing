<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- Custom Tabs (Pulled to the right) -->
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#"><?php echo $this->lang->line('edit')." ".$this->lang->line('profile'); ?></a></li>
                        <li><a href="<?php echo site_url('agent/agent/changepass') ?>"><?php echo $this->lang->line('change_password'); ?></a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1-1">
                            <form action="<?php echo site_url('agent/agent/edit_profile') ?>"  id="passwordform" name="passwordform" method="post" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
                                <?php if ($this->session->flashdata('msg')) { ?>
                                    <?php echo $this->session->flashdata('msg') ?>
                                <?php } ?>                       
                                <?php if (isset($error_message)) { echo $error_message; } ?>
                                <?php echo $this->customlib->getCSRF(); ?>
                                <div class="form-group  <?php if (form_error('name')) {  echo 'has-error';  } ?>">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Name">
                                        <?php echo $this->lang->line('name'); ?>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  name="name" class="form-control col-md-7 col-xs-12" type="text"  value="<?php echo $value['name']; ?>">
                                    </div>
                                </div>
                                <div class="form-group  <?php if (form_error('dob')) { echo 'has-error'; } ?>">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dob">
                                        <?php echo $this->lang->line('date_of_birth'); ?>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input   required="required" class="form-control col-md-7 col-xs-12" name="dob" placeholder="" type="date"  value="<?php echo $value['dob']; ?>">
                                    </div>
                                </div>
                                <div class="form-group  <?php if (form_error('guardian')) { echo 'has-error'; } ?>">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="guardian">
                                        <?php echo $this->lang->line('guardian_name'); ?>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="guardian" name="guardian" placeholder="" type="text"  value="<?php echo $value['guardian_name']; ?>" class="form-control col-md-7 col-xs-12" >
                                    </div>
                                </div>
                                <div class="form-group  <?php if (form_error('marital')) { echo 'has-error';} ?>">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="martial">
                                        <?php echo $this->lang->line('marital_status'); ?>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="marital" name="marital" placeholder="" type="text"  value="<?php echo $value['marital_status']; ?>" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group  <?php if (form_error('contact')) { echo 'has-error'; } ?>">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="contact">
                                        <?php echo $this->lang->line('contact'); ?>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="contact" name="contact" placeholder="" type="text"  value="<?php echo $value['contact_no']; ?>" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group  <?php if (form_error('email')) { echo 'has-error'; } ?>">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">
                                        <?php echo $this->lang->line('email'); ?>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="email" name="email" placeholder="" type="text"  value="<?php echo $value['email']; ?>" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group  <?php if (form_error('qualification')) { echo 'has-error'; } ?>">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="qualification">
                                        <?php echo $this->lang->line('qualification'); ?>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="qualification" name="qualification" placeholder="" type="text"  value="<?php echo $value['qualification']; ?>" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group  <?php if (form_error('caddress')) { echo 'has-error'; } ?>">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="caddress">
                                        <?php echo $this->lang->line('current')." ".$this->lang->line('address'); ?>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="caddress" name="caddress" placeholder="" type="text"  value="<?php echo $value['current_address']; ?>" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group  <?php if (form_error('bank_name')) { echo 'has-error'; } ?>">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="bank_name">
                                        <?php echo $this->lang->line('bank_name'); ?>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="bank_name" name="bank_name" placeholder="" type="text"  value="<?php echo $value['bank_name']; ?>" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group  <?php if (form_error('bank_branch_name')) { echo 'has-error'; } ?>">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="bank_branch_name">
                                        <?php echo $this->lang->line('bank_branch_name'); ?>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="bank_branch_name" name="bank_branch_name" placeholder="" type="text"  value="<?php echo $value['branch_name']; ?>" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group  <?php if (form_error('account_holder_name')) { echo 'has-error'; } ?>">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="account_holder_name">
                                        <?php echo $this->lang->line('account_holder_name'); ?>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="account_holder_name" name="account_holder_name" placeholder="" type="text"  value="<?php echo $value['account_holder_name']; ?>" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group  <?php if (form_error('bank_account_no')) { echo 'has-error'; } ?>">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="bank_account_no">
                                        <?php echo $this->lang->line('bank_account_no'); ?>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="bank_account_no" name="bank_account_no" placeholder="" type="text"  value="<?php echo $value['account_no']; ?>" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group  <?php if (form_error('ifsc_code')) { echo 'has-error'; } ?>">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ifsc_code">
                                        <?php echo $this->lang->line('ifsc_code'); ?>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="ifsc_code" name="ifsc_code" placeholder="" type="text"  value="<?php echo $value['ifsc_code']; ?>" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="box-footer">
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                            <button type="submit" class="btn btn-info"><?php echo $this->lang->line('save'); ?></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
    </section>
</div>