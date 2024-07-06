<?php
$currency_symbol = $this->customlib->getSchoolCurrencyFormat();
$genderList = $this->customlib->getGender();
//print_r($result['id']);die;
?>
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title titlefix"><?php echo $this->lang->line('appointment'); ?></h3>
                        <div class="box-tools pull-right">
                            <a href="#" onclick="getRecord('<?php echo $result['id'] ?>', '<?php echo $result['is_active'] ?>')" class="btn btn-primary btn-sm" data-target="#myModal" data-toggle="modal" >
                                <i class="fa fa-plus"></i> <?php echo $this->lang->line('add') . " " . $this->lang->line('appointment'); ?>
                            </a>   
                        </div>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <div class="download_label"><?php echo $this->lang->line('appointed_patient_list'); ?></div>
                        <table class="table table-striped table-bordered table-hover example" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th><?php echo $this->lang->line('name'); ?></th>
                                    <th><?php echo $this->lang->line('date'); ?></th>
                                    <th><?php echo $this->lang->line('gender'); ?></th>
                                    <th><?php echo $this->lang->line('email'); ?></th>
                                    <th><?php echo $this->lang->line('mobile'); ?></th>
                                    <th><?php echo $this->lang->line('doctor'); ?></th>
                                    <th><?php echo $this->lang->line('message'); ?></th>
                                    <th><?php echo $this->lang->line('status'); ?></th> 
                                </tr>
                            </thead>
                            <tbody>
                                <?php  
                                    $count = 1; foreach ($result as $appointment) {
                                    if ($appointment["appointment_status"] == "approved") {
                                        $label = "class='label label-success'";
                                    } else if ($appointment["appointment_status"] == "pending") {
                                        $label = "class='label label-warning'";
                                    } else if ($appointment["appointment_status"] == "cancel") {
                                        $label = "class='label label-danger'";
                                    }
                                ?>
                                    <tr>
                                        <td><?php echo ucfirst($appointment['patient_name']); ?></td>
                                        <td><?php echo date('d-M-Y', strtotime($appointment['date'])); ?></td>
                                        <td><?php echo $appointment['gender']; ?></td>
                                        <td><?php echo $appointment['email']; ?></td>
                                        <td><?php echo $appointment['mobileno']; ?></td>
                                        <td>Dr. <?php echo $appointment['doctor_name']." ".$appointment['doctor_surname']; ?></td>
                                        <td><?php echo $appointment['message']; ?></td>
                                        <td><small <?php echo $label ?>><?php echo $this->lang->line($appointment['appointment_status']); ?></small></td> 
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>                                                    
            </div>  
        </div>
    </section>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content modal-media-content">
            <div class="modal-header modal-media-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="box-title"><?php echo $this->lang->line('appointment') . " " . $this->lang->line('information'); ?></h4> 
            </div>
            <form id="formadd" accept-charset="utf-8"  method="post" class="ptt10">
                <div class="modal-body pt0 pb0">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 paddlr">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="exampleInputFile">
                                            <?php echo $this->lang->line('name'); ?><small class="req"> *</small>
                                        </label>
                                        <input type="text" name="name" id="name" class="form-control" value="<?php echo set_value('name'); ?>">
                                        <span class="text-danger"><?php echo form_error('name'); ?></span>
                                        <input type="hidden" name="agent" id="agent" class="form-control" value="<?php echo $agent; ?>">
                                    </div>
                                </div> 
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>
                                            <?php echo $this->lang->line('date'); ?><small class="req"> *</small> 
                                        </label>
                                        <input type="date" id="date" name="date" class="form-control" value="<?php echo set_value('dates'); ?>">
                                        <span class="text-danger"><?php echo form_error('date'); ?></span>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="exampleInputFile">
                                            <?php echo $this->lang->line('gender'); ?><small class="req"> *</small> 
                                        </label>
                                        <select name="gender" class="form-control" id="gender">
                                            <?php foreach ($genderList as $gender_key => $gender_value) { ?>
                                                <option value="<?php echo $gender_key; ?>"><?php echo $gender_value; ?></option>
                                            <?php } ?>
                                        </select>
                                        <span class="text-danger"><?php echo form_error('gender'); ?></span>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="exampleInputFile">
                                            <?php echo $this->lang->line('doctor'); ?><small class="req"> *</small> 
                                        </label>
                                        <select class="form-control" name='doctor' id="doctor" >
                                            <option value="<?php echo set_value('doctor'); ?>"><?php echo $this->lang->line('select') ?></option>
                                            <?php foreach ($doctors as $dkey => $dvalue) {
                                                ?>
                                                <option value="<?php echo $dvalue["id"]; ?>"><?php echo $dvalue["name"] . " " . $dvalue["surname"] ?></option>   
                                            <?php } ?>
                                        </select>
                                        <span class="text-danger"><?php echo form_error('doctor'); ?></span>
                                    </div>
                                </div> 
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>
                                            <?php echo $this->lang->line('mobile'); ?><small class="req"> *</small> 
                                        </label>
                                        <input type="text" id="mobile" name="mobile" class="form-control datetime" value="<?php echo set_value('mobile'); ?>">
                                        <span class="text-danger"><?php echo form_error('mobile'); ?></span>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>
                                            <?php echo $this->lang->line('email'); ?><small class="req"> *</small>
                                        </label>
                                        <input type="email" id="email" name="email" class="form-control datetime" value="<?php echo set_value('email'); ?>">
                                        <span class="text-danger"><?php echo form_error('email'); ?></span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="message">
                                            <?php echo $this->lang->line('message'); ?><small class="req"> *</small>
                                        </label> 
                                        <textarea name="message" id="message" class="form-control" ><?php echo set_value('message'); ?></textarea>
                                        <span class="text-danger"><?php echo form_error('message'); ?></span>
                                    </div> 
                                </div>
                            </div><!--./row-->   
                        </div><!--./col-md-12-->       
                    </div><!--./row--> 
                </div>
                <div class="box-footer">
                    <div class="" style="padding-right:5px;">
                        <button type="submit" class="btn btn-info pull-right"><?php echo $this->lang->line('save'); ?></button>
                    </div>
                </div>
            </form>  
        </div>
    </div>    
</div>
<script type="text/javascript">
    $(document).ready(function (e) {
        $("#formadd").on('submit', (function (e) {
            e.preventDefault();
            $.ajax({
                url: '<?php echo base_url(); ?>agent/agent/bookAppointment',
                type: "POST",
                data: new FormData(this),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    if (data.status == "fail") {
                        var message = "";
                        $.each(data.error, function (index, value) {
                            message += value;
                        });
                        errorMsg(message);
                    } else {
                        successMsg(data.message);
                        window.location.reload(true);
                    }
                },
                error: function () {
                    //  alert("Fail")
                }
            });
        }));
    });
</script>