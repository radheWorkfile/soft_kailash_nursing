<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title titlefix"> <?php echo $this->lang->line('commission')." ".$this->lang->line('list'); ?></h3>

                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-striped table-bordered table-hover example" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th><?php echo $this->lang->line('patient').' '.$this->lang->line('name').' & Id'; ?></th>
                                    <th><?php echo $this->lang->line('amount');?></th> 																								                                     <th><?php echo "Section";?></th>
                                    <th><?php echo $this->lang->line('mode'); ?></th>
                                    <th><?php echo $this->lang->line('status'); ?></th>
                                </tr>
                            </thead>            
                            <tbody>    
                                <?php foreach($commission as $pay) { ?>
                                    <tr>
                                        <td><?php echo $pay['patient_name']."(".$pay['patient_id'].")"; ?></td>
                                        <td> ₹ <?php echo $pay['amount']; ?></td>                                        																									<td> <?php echo $pay['section']; ?></td>

                                        <td><?php if($pay['mode'] == 1){echo "Online".$this->lang->line('online');}elseif($pay['mode'] == 2){echo $this->lang->line('cash');}else{ echo "Not Paid Yet";} ?></td>
                                        <td><?php if($pay['status'] == 1){echo "Generated ! Waiting For Payment";}elseif($pay['status'] == 2){echo "Paid";} ?></td>
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
