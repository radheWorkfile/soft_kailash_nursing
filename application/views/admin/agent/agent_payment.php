<?php
$currency_symbol = $this->customlib->getSchoolCurrencyFormat();
?>
<div class="content-wrapper" style="min-height: 946px;">   

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?php echo $this->lang->line('agent').' '.$this->lang->line('payment'); ?></h3>             
                    </div>
                    <form id='form1' action="<?php echo site_url('admin/agent/pay_commission ') ?>"  method="post" accept-charset="utf-8">
                        <div class="box-body">
                            <div class="row">
                                <?php if ($this->session->flashdata('msg')) {
                                    echo $this->session->flashdata('msg');
                                } ?>
                                <?php echo $this->customlib->getCSRF(); ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="agent_type">
                                            <?php echo $this->lang->line("agent_type"); ?>
                                        </label>
                                        <select  onchange="getEmployeeName(this.value)" id="agent_type" name="agent_type" class="form-control" >
                                            <option value=""><?php echo $this->lang->line('select'); ?></option>
                                            <?php foreach ($agent_type as $key => $agent) { (isset($_POST["agent_type"])) ? $role_selected = $_POST["agent_type"] : $role_selected = '';?>
                                                <option value="<?php echo $agent["id"] ?>" <?echo ($agent["id"] == $role_selected)? "selected" :" "?>>
                                                    <?php print_r($agent["category_name"]) ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                        <span class="text-danger"><?php echo form_error('agent_type'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="month"><?php echo $this->lang->line('month') ?></label>
                                        <select autofocus="" id="class_id" name="month" class="form-control" >
                                            <option value="select"><?php echo $this->lang->line('select'); ?></option>
                                            <?php (isset($month)) ? $month_selected = date("F", strtotime($month)) : $month_selected = date("F", strtotime("-1 month"));
                                                foreach ($monthlist as $m_key => $month_value) {
                                            ?>
                                                <option value="<?php echo $m_key ?>" <?php echo ($month_selected == $m_key) ? "selected =selected" : " ";?>>
                                                    <?php echo $this->lang->line(strtolower($month_value)); ?>
                                                </option>
                                            <?php } ?>    

                                        </select>
                                        <span class="text-danger"><?php echo form_error('month'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="year"><?php echo $this->lang->line('year'); ?></label>
                                        <?php (isset($year)) ? $selected_year = $year : $selected_year = date('Y');?>
                                        <select autofocus="" id="class_id" name="year" class="form-control" >
                                            <option value="select">
                                                <?php echo $this->lang->line('select'); ?>
                                            </option>
                                            <option value="<?php echo date("Y", strtotime("-1 year")) ?>"  <?php echo (date("Y", strtotime("-1 year")) == $selected_year) ? "selected" : ""; ?> >
                                                <?php echo date("Y", strtotime("-1 year")) ?>
                                            </option>
                                            <option value="<?php echo date("Y") ?>" <?php echo (date("Y") == $selected_year) ? "selected" : ""; ?> >
                                                <?php echo date("Y") ?>
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" name="search" value="search" class="btn btn-primary btn-sm pull-right checkbox-toggle"><i class="fa fa-search"></i> <?php echo $this->lang->line('search'); ?></button>
                        </div>
                    </form>

                    <?php if (isset($agent_pay)) {?>
                        <div class="ptbnull"></div>  
                        <div class="box border0 clear">
                            <div class="box-body table-responsive">
                                <table class="table table-striped table-bordered table-hover example">
                                    <thead>
                                        <tr>
                                            <th><?php echo $this->lang->line('agent_id'); ?></th>
                                            <th><?php echo $this->lang->line('name'); ?></th>
                                            <th><?php echo $this->lang->line('agent_type'); ?></th>
                                            <th><?php echo $this->lang->line('phone'); ?></th>
                                            <th><?php echo $this->lang->line('patient').' '.$this->lang->line('name').' & Id'; ?></th>                                            											  <th><?php echo "Section"; ?></th>
                                            <th><?php echo $this->lang->line('mode'); ?></th>
                                            <th><?php echo $this->lang->line('status'); ?></th>
                                            <th class="text-right no-print"><?php echo $this->lang->line('action'); ?></th>
                                        </tr>
                                    </thead>            
                                    <tbody>    
                                        <?php foreach($agent_pay as $pay) { ?>
                                            <tr>
                                                <td><?php echo $pay['agent_id']; ?></td>
                                                <td><?php echo $pay['name']; ?></td>
                                                <td><?php echo $pay['agent_type']; ?></td>
                                                <td><?php echo $pay['contact_no']; ?></td>
                                                <td><?php echo $pay['patient_name']."(".$pay['patient_id'].")"; ?></td>                                                															<td><?php echo $pay['section']; ?></td>
                                                <td><?php if($pay['mode'] == 1){echo "Online".$this->lang->line('online');}elseif($pay['mode'] == 2){echo $this->lang->line('cash');}else{ echo "Not Paid Yet";} ?></td>
                                                <td><?php if($pay['status'] == 1){echo "Generated ! Waiting For Payment";}elseif($pay['status'] == 2){echo "Paid";} ?></td>
                                                <?php if($pay['status'] == 2){ ?>
                                                    <td class="pull-right no-print">
                                                        <a href="#" onclick="getPayslip('<?php echo $pay['agent_uq_id'] ?>')"  role="button" class="btn btn-primary btn-xs checkbox-toggle edit_setting" data-toggle="tooltip" title="<?php echo $this->lang->line('Payslip View'); ?>" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing"><?php echo $this->lang->line('view'); ?> <?php echo $this->lang->line('payslip'); ?></a>
                                                    </td>
                                                <?php }else{ ?>
                                                    <td class="pull-right no-print">
                                                        <a href="#" onclick="getRecord('<?php echo $pay['agent_uq_id'] ?>', '<?php echo $year ?>')" role="button" class="btn btn-primary btn-xs checkbox-toggle edit_setting" data-toggle="tooltip" title="<?php echo $this->lang->line('Proceed to payment'); ?>" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing"><?php echo $this->lang->line('proceed_to_pay'); ?></a>
                                                    </td>
                                                <?php } ?>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <?php } ?>
                </div>  
            </div>
        </div> 
    </section>
</div>

<div id="payslipview"  class="modal fade" role="dialog">

    <div class="modal-dialog modal-dialog2 modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><?php echo $this->lang->line('details'); ?>   <span id="print"></span></h4>
            </div>
            <div class="modal-body" id="testdata">


            </div>
        </div>
    </div>
</div>


<div id="proceedtopay" class="modal fade " role="dialog">
    <div class="modal-dialog modal-dialog2 modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><?php echo $this->lang->line('proceed_to_pay'); ?></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form role="form" id="payment_form" method="post">
                        <div class="form-group  col-xs-12 col-sm-12 col-md-12 col-lg-6">
                            <label for="agent name">
                                <?php echo $this->lang->line('agent'); ?> <?php echo $this->lang->line('name'); ?>
                            </label>
                            <input type="text" name="agent_name" readonly class="form-control" id="agent_name">
                            <input type="hidden" name="pay_id" readonly class="form-control" id="pay_id">
                        </div>
                        <div class="form-group  col-xs-12 col-sm-12 col-md-12 col-lg-6">
                            <label for="amount">
                                <?php echo $this->lang->line('payment'); ?> 
                                <?php echo $this->lang->line('amount'); ?>
                            </label>
                            <input type="text" name="amount" readonly class="form-control" id="amount">
                        </div>
                        <div class="form-group  col-xs-12 col-sm-12 col-md-12 col-lg-6">
                            <label for="year">
                                <?php echo $this->lang->line("month") ?> 
                                <?php echo $this->lang->line('year'); ?>
                            </label> 
                            <input id="monthid" name="month" readonly placeholder="" type="text" class="form-control" />
                        </div>
                        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-6">
                            <label for="payment mode">
                                <?php echo $this->lang->line('payment'); ?> 
                                <?php echo $this->lang->line('mode'); ?>
                            </label>
                            <span class="req"> *</span><br/>
                            <span id="remark"> </span>
                            <select name="payment_mode" id="payment_mode"  class="form-control">
                                <option value=""><?php echo $this->lang->line('select'); ?></option>
                                <option value="1"><?php echo "Online ".$this->lang->line('online'); ?></option>
                                <option value="2"><?php echo $this->lang->line('cash'); ?></option>
                            </select>
                            <span class="text-danger"><?php echo form_error('payment_mode'); ?></span>
                        </div>
                        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-6">
                            <label for="payment date">
                                <?php echo $this->lang->line('payment'); ?> 
                                <?php echo $this->lang->line('date'); ?>
                            </label><br/>
                            <span id="remark"> </span>
                            <input type="date" name="payment_date" id="payment_date" class="form-control" value="<?php echo date('Y-m-d') ?>">
                        </div>

                        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-6">
                            <label for="transaction details">
                                <?php echo $this->lang->line('note'); ?>
                            </label><br/>
                            <span id="remark"> </span>
                            <textarea name="remarks" class="form-control" ></textarea>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <button type="button" class="btn btn-primary submit_payment pull-right" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing"> <?php echo $this->lang->line('save'); ?></button>
                        </div>
                    </form>                  
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">


    function getRecord(id, year) {

        $('input[name="amount"]').val('');
        $('input[name="agent_name"]').val('');
        $('input[name="pay_id"]').val('');
        $('#monthid').val('');

        var month = '<?php echo $month_selected ?>';
        //var year = '<?php echo date('Y'); ?>';

        var base_url = '<?php echo base_url() ?>';
        $.ajax({
            url: base_url + 'admin/agent/paymentRecord',
            type: 'POST',
            data: {agent_id: id, month: month, year: year},
            dataType: "json",
            success: function (result) {

                console.log(result);
                $('input[name="amount"]').val(result.result.amount);
                $('input[name="pay_id"]').val(result.result.pay_id);
                $('input[name="agent_name"]').val(result.result.name + ' ' + ' (' + result.result.agent_id + ')');
                $('#monthid').val(month + '-' + year);
            }
        });


        $('#proceedtopay').modal({
            show: true,
            backdrop: 'static',
            keyboard: false
        });

    }
    ;


    function popup(data)
    {
        var base_url = '<?php echo base_url() ?>';
        var frame1 = $('<iframe />');
        frame1[0].name = "frame1";
        frame1.css({"position": "absolute", "top": "-1000000px"});
        $("body").append(frame1);
        var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
        frameDoc.document.open();
        //Create a new HTML document.
        frameDoc.document.write('<html>');
        frameDoc.document.write('<head>');
        frameDoc.document.write('<title></title>');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/bootstrap/css/bootstrap.min.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/dist/css/font-awesome.min.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/dist/css/ionicons.min.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/dist/css/AdminLTE.min.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/dist/css/skins/_all-skins.min.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/plugins/iCheck/flat/blue.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/plugins/morris/morris.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/plugins/jvectormap/jquery-jvectormap-1.2.2.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/plugins/datepicker/datepicker3.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/plugins/daterangepicker/daterangepicker-bs3.css">');
        frameDoc.document.write('</head>');
        frameDoc.document.write('<body>');
        frameDoc.document.write(data);
        frameDoc.document.write('</body>');
        frameDoc.document.write('</html>');
        frameDoc.document.close();
        setTimeout(function () {
            window.frames["frame1"].focus();
            window.frames["frame1"].print();
            frame1.remove();
        }, 500);


        return true;
    }

    function getPayslip(id) {

        var base_url = '<?php echo base_url() ?>';
        $.ajax({
            url: base_url + 'admin/agent/payslipView',
            type: 'POST',
            data: {payslipid: id},
            //dataType: "json",
            success: function (result) {
                $("#print").html("<a href='#' data-toggle='tooltip' class='pull-right modal-title moprint' onclick='printData(" + id + ")'  title='<?php echo $this->lang->line('print') ?>'><i class='fa fa-print'></i></a>");
                $("#testdata").html(result);

            }
        });

        $('#payslipview').modal({
            show: true,
            backdrop: 'static',
            keyboard: false
        });

    };

    function printData(id) {
        var base_url = '<?php echo base_url() ?>';
        $.ajax({
            url: base_url + 'admin/agent/payslipView',
            type: 'POST',
            data: {payslipid: id},
            //dataType: "json",
            success: function (result) {

                $("#testdata").html(result);
                popup(result);
            }
        });
    }

    $(document).on('click', '.submit_payment', function (e) {
    var $this = $(this);
    $this.button('loading');
    $.ajax({
        url: '<?php echo site_url("admin/agent/paymentSuccess") ?>',
        type: 'post',
        data: $('#payment_form').serialize(),
        dataType: 'json',
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

            $this.button('reset');
        }
    });
    });
</script>