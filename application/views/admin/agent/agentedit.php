<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <form id="form1" action="<?php echo site_url('admin/agent/edit_agent/' . $agent_details["id"]) ?>" id="agent_edit" name="agent_edit" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="tshadow mb25 bozero">
                                <h4 class="pagetitleh2"><?php echo $this->lang->line('edit') . ' ' . $this->lang->line('basic_information'); ?> </h4>
                                <div class="around10">
                                    <?php if ($this->session->flashdata('msg')) { ?>
                                        <?php echo $this->session->flashdata('msg') ?>
                                    <?php } ?>
                                    <?php echo $this->customlib->getCSRF(); ?>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="firstname"><?php echo $this->lang->line('name'); ?></label><small class="req"> *</small>
                                                <input id="name" name="name" placeholder="" type="text" class="form-control" value="<?php echo $agent_details['name'] ?>" />
                                                <span class="text-danger"><?php echo form_error('name'); ?></span>
                                                <input id="agent_id" name="agent_id" placeholder="" type="hidden" class="form-control" value="<?php echo $agent_details['agent_id'] ?>" />
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="dob"><?php echo $this->lang->line('date_of_birth'); ?></label><small class="req"> *</small>
                                                <input id="dob" name="dob" placeholder="" type="date" class="form-control" value="<?php echo $agent_details['dob'] ?>" />
                                                <span class="text-danger"><?php echo form_error('dob'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="gender"> <?php echo $this->lang->line('gender'); ?></label><small class="req"> *</small>
                                                <select class="form-control" name="gender">
                                                    <option value="<?php echo $agent_details['gender']; ?>"><?php echo $agent_details['gender']; ?></option>
                                                    <?php foreach ($genderList as $key => $value) { ?>
                                                        <option value="<?php echo $agent_details['agent_id']; ?>" <?php echo set_select('gender', $key, set_value('gender')); ?>><?php echo $value; ?></option>
                                                    <?php } ?>
                                                </select>
                                                <span class="text-danger"><?php echo form_error('gender'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="guardian"><?php echo $this->lang->line('guardian_name'); ?></label>
                                                <input id="guardian_name" name="guardian_name" placeholder="" type="text" class="form-control" value="<?php echo $agent_details['guardian_name']; ?>" />
                                                <span class="text-danger"><?php echo form_error('guardian_name'); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="blood"><?php echo $this->lang->line('blood_group'); ?></label><small class="req"> *</small>
                                                <select class="form-control" name="blood_group">
                                                    <option value="<?php echo $agent_details['blood_group']; ?>"><?php echo $agent_details['blood_group']; ?></option>
                                                    <?php foreach ($bloodgroup as $bgkey => $bgvalue) {
                                                    ?>
                                                        <option value="<?php echo $bgvalue ?>" <?php echo set_select('blood_group', $bgvalue, set_value('blood_group')); ?>><?php echo $bgvalue ?></option>

                                                    <?php } ?>

                                                </select>
                                                <span class="text-danger"><?php echo form_error('blood_group'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="marital"><?php echo $this->lang->line('marital_status'); ?></label>
                                                <select class="form-control" name="marital_status">
                                                    <option value="<?php echo $agent_details['marital_status']; ?>"><?php echo $agent_details['marital_status']; ?></option>
                                                    <?php foreach ($marital_status as $makey => $mavalue) {
                                                    ?>
                                                        <option value="<?php echo $mavalue ?>" <?php echo set_select('marital_status', $mavalue, set_value('marital_status')); ?>><?php echo $mavalue; ?></option>

                                                    <?php } ?>

                                                </select>
                                                <span class="text-danger"><?php echo form_error('marital_status'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="Mobile"><?php echo $this->lang->line('mobile_no'); ?></label><small class="req"> *</small>
                                                <input id="mobileno" name="mobileno" placeholder="" type="number" onKeyPress="if(this.value.length==10) return false;" class="form-control" value="<?php echo $agent_details['contact_no'] ?>" />
                                                <span class="text-danger"><?php echo form_error('mobileno'); ?></span>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="email"><?php echo $this->lang->line('email'); ?></label><small class="req"> *</small>
                                                <input id="email" name="email" placeholder="" type="email" class="form-control" value="<?php echo $agent_details['email'] ?>" />
                                                <span class="text-danger"><?php echo form_error('email'); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="quallification"><?php echo $this->lang->line('qualification'); ?></label>
                                                <input type="text" id="qualification" name="qualification" placeholder="" class="form-control" value="<?php echo $agent_details['qualification'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="addhar"><?php echo $this->lang->line('addhar_no'); ?></label><small class="req"> *</small>
                                                <input type="number" id="addhar" name="addhar" placeholder="" class="form-control" value="<?php echo $agent_details['addhar'] ?>"> <span class="text-danger"><?php echo form_error('work_exp'); ?></span>
                                                <span class="text-danger"><?php echo form_error('addhar'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="pan"><?php echo $this->lang->line('pan_no'); ?></label><small class="req"> *</small>
                                                <input type="text" name="pan" class="form-control" value="<?php echo $agent_details['pan']; ?>">
                                                <span class="text-danger"><?php echo form_error('pan'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="agent_type"><?php echo $this->lang->line('agent_type'); ?></label><small class="req"> *</small>
                                                <select class="form-control" name="agent_type">
                                                    <option value="<?php echo $agent_details["agent_cat"]; ?>"><?php $agent = $this->agent_model->get_cat($agent_details["agent_cat"]);
                                                                                                                echo $agent['category_name']; ?></option>
                                                    <?php foreach ($agent_type as $agent) {
                                                    ?>
                                                        <option value="<?php echo $agent['id'] ?>" <?php echo set_select('agent_type', $agent['category_name'], set_value('agent_type')); ?>><?php echo $agent['category_name']; ?></option>

                                                    <?php } ?>

                                                </select>
                                                <span class="text-danger"><?php echo form_error('agent_type'); ?></span>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="photo"><?php echo $this->lang->line('photo') . " ( " . $this->lang->line('jpg_jpeg_png') . " )"; ?></label>
                                                <input class="filestyle form-control" type='file' name='file' id="file" size='20' />
                                                <input type="hidden" name="img" id="img" value="<?php echo $agent_details['image']; ?>">
                                                <span class="text-danger"><?php echo form_error('file'); ?></span>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="current_add"><?php echo $this->lang->line('current'); ?> <?php echo $this->lang->line('address'); ?></label>
                                                <textarea name=" address" class="form-control"><?php echo $agent_details['current_address']; ?></textarea>
                                            </div>
                                            <span class="text-danger"></span>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="permanent_add"><?php echo $this->lang->line('permanent_address'); ?></label><small class="req"> *</small>
                                                <textarea name="permanent_address" class="form-control"><?php echo $agent_details['permanent_address']; ?></textarea>

                                                <span class="text-danger"><?php echo form_error('permanent_address'); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="bank_name"><?php echo $this->lang->line('bank_name'); ?></label>
                                                <input type="text" id="bank_name" name="bank_name" placeholder="" class="form-control" value="<?php echo $agent_details['bank_name']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="branch_name"><?php echo $this->lang->line('bank_branch_name'); ?></label>
                                                <input type="text" id="branch_name" name="branch_name" placeholder="" class="form-control" value="<?php echo $agent_details['branch_name']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="branch_name"><?php echo $this->lang->line('account_holder_name'); ?></label>
                                                <input type="text" id="account_holder_name" name="account_holder_name" placeholder="" class="form-control" value="<?php echo $agent_details['account_holder_name']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="account_no"><?php echo $this->lang->line('bank_account_no'); ?></label>
                                                <input type="text" id="acc_no" name="acc_no" placeholder="" class="form-control" value="<?php echo $agent_details['account_no']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="ifsc_code"><?php echo $this->lang->line('ifsc_code'); ?></label>
                                                <input type="text" id="ifsc" name="ifsc" placeholder="" class="form-control" value="<?php echo $agent_details['ifsc_code']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-info pull-right"><?php echo $this->lang->line('update'); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>backend/dist/js/savemode.js"></script>