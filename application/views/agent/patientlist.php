<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title titlefix"> <?php echo $this->lang->line('patient')." ".$this->lang->line('list'); ?></h3>

                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-striped table-bordered table-hover example" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>SN.No.</th>
                                    <th><?php echo $this->lang->line('patient')." ".$this->lang->line('name'); ?></th>
                                    <th><?php echo $this->lang->line('gender'); ?></th>
                                    <th><?php echo $this->lang->line('phone'); ?></th>
                                    <th><?php echo $this->lang->line('email'); ?></th>
                                    <th><?php echo $this->lang->line('address'); ?></th>
                                    <th><?php echo $this->lang->line('date')?></th>
                                    <th><?php echo $this->lang->line('status'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $count = 1; foreach ($patient as $p) { ?>
                                    <tr>
                                        <td><?php echo $count++; ?></td>
                                        <td><?php echo $p['patient_name']."(".$p['patient_unique_id'].")"; ?></td>
                                        <td><?php echo $p['gender']; ?></td>
                                        <td><?php echo $p['mobileno']; ?></td>
                                        <td><?php echo $p['email']; ?></td>
                                        <td><?php echo $p['address']; ?></td>
                                        <td><?php echo date('d-M-Y',strtotime($p['created_at']))?></td>
                                        <td><?php echo ($p['discharged'] == "no")? "Not Discharged" : "Discharged"; ?></td>
                                    </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>                                                    
            </div>
        </div>  
    </section>
</div>
