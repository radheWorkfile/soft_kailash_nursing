<?php $currency_symbol = $this->customlib->getSchoolCurrencyFormat(); ?>
<form id="edit_catdata" class="ptt10" accept-charset="utf-8" enctype="multipart/form-data">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <form id="add_cat" class="ptt10" accept-charset="utf-8" enctype="multipart/form-data">
                <div class="row">
                    <?php if ($this->session->flashdata('msg')) { ?>
                        <?php echo $this->session->flashdata('msg') ?>
                    <?php } ?>
                    <?php
                    if (isset($error_message)) {
                        echo "<div class='alert alert-danger'>" . $error_message . "</div>";
                    }
                    ?>
                    <?php echo $this->customlib->getCSRF(); ?>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="category_name"><?php echo $this->lang->line('category') . " " . $this->lang->line('name'); ?><small class="req"> *</small></label>
                            <input id="category_name" name="category_name" placeholder="" type="text" class="form-control" value="<?php echo set_value('category_name', $category['category_name']); ?>" />
                            <input id="id" name="id" placeholder="" type="hidden" class="form-control" value="<?php echo $category['id']; ?>" />
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="commission"><?php echo $this->lang->line('commission'), "(%)"; ?></label>
                            <input id="commission" name="commission" placeholder="" type="text" class="form-control" value="<?php echo set_value('commission', $category['commission']); ?>" />

                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="discription"><?php echo $this->lang->line('description'); ?></label>
                            <textarea class="form-control" id="description" name="description" placeholder="" rows="3" placeholder="Enter ..."><?php echo set_value('description', $category['description']); ?></textarea>
                            <span class="text-danger"></span>
                        </div>
                    </div>

                    <div class="box-footer clear">
                        <div class="pull-right">
                            <button type="submit" id="edit_catdatabtn" data-loading-text="<?php echo $this->lang->line('processing') ?>" class="btn btn-info pull-right"><?php echo $this->lang->line('save'); ?></button>
                        </div>
                    </div>
                </div><!-- /.box-body -->
            </form>
        </div>
    </div>
</form>

<script type="text/javascript">
    $(document).ready(function() {
        $('.filestyle').dropify();
    });
</script>
<script type="text/javascript">
    $(document).ready(function(e) {
        $("#edit_catdata").on('submit', (function(e) {
            $("#edit_catdatabtn").button('loading');
            var id = $("#id").val();
            e.preventDefault();
            $.ajax({
                url: '<?php echo base_url(); ?>admin/agent/edit_cat/' + id,
                type: "POST",
                data: new FormData(this),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    if (data.status == "fail") {
                        var message = "";
                        $.each(data.error, function(index, value) {
                            message += value;
                        });
                        errorMsg(message);
                    } else {
                        successMsg(data.message);
                        window.location.reload(true);
                    }
                    $("#edit_catdatabtn").button('reset');
                },
                error: function() {
                    alert("Fail")
                }
            });
        }));
    });
    $(document).ready(function() {
        var date_format = '<?php echo $result = strtr($this->customlib->getSchoolDateFormat(), ['d' => 'dd', 'm' => 'mm', 'Y' => 'yyyy',]) ?>';
        $('#editdate').datepicker({

            format: date_format,
            endDate: '+0d',
            autoclose: true
        });
    });
</script>