<?php

$currency_symbol = $this->customlib->getSchoolCurrencyFormat();

?>



<div class="content-wrapper">

    <section class="content">

        <div class="row">

            <div class="col-md-3">

                <div class="box box-primary" <?php echo ($agent_details["is_active"] == 0) ? "style='background-color:#f0dddd;'" : ""; ?>>

                    <div class="box-body box-profile">

                        <?php $image = $agent_details['image'];

                        if (!empty($image)) {



                            $file = $agent_details['image'];

                        } else {



                            $file = "no_image.png";

                        } ?>

                        <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url() . "uploads/agent_images/" . $file ?>" alt="User profile picture">

                        <h3 class="profile-username text-center"><?php echo $agent_details['name']; ?></h3>

                        <div class="editviewdelete-icon pt8 text-center">

                            <a href="#" class="change_password text-green" data-toggle="tooltip" title="<?php echo $this->lang->line('change_password'); ?>"></i> <i class="fa fa-key"></i></a>

                            <a href="<?php echo base_url('admin/agent/edit_agent/' . $id); ?>" data-toggle="tooltip" title="<?php echo $this->lang->line('edit'); ?>" class="text-light"><i class="fa fa-pencil"></i></a>

                            <?php if ($agent_details["is_active"] == 1) { ?>

                                <a href="<?php echo base_url('admin/agent/disableagent/' . $id); ?>" class="text-red" data-toggle="tooltip" title="<?php echo $this->lang->line('disable'); ?>" onclick="return confirm('Are you sure you want to Disable this Record?');"></i> <i class="fa fa-thumbs-o-down"></i></a>

                            <?php } else if ($agent_details["is_active"] == 0) { ?>

                                <a href="<?php echo base_url('admin/agent/enableagent/' . $id); ?>" class="text-green" data-toggle="tooltip" title="<?php echo $this->lang->line('enable'); ?>" onclick="return confirm('Are you sure you want to Enable this Record?');"><i class="fa fa-thumbs-o-up"></i></a>

                                <a href="<?php echo base_url('admin/agent/deleteagent/' . $id); ?>" class="text-red" data-toggle="tooltip" title="<?php echo $this->lang->line('delete'); ?>" onclick="return confirm('Are you sure you want to Delete this Record?');"></i><i class="fa fa-trash"></i></a>

                            <?php } ?>

                        </div>

                        <ul class="list-group list-group-unbordered">

                            <li class="list-group-item listnoback">

                                <b>

                                    <?php echo $this->lang->line('agent_id'); ?>

                                </b>

                                <a class="pull-right text-aqua">

                                    <?php echo $agent_details['agent_id']; ?>

                                </a>

                            </li>

                            <li class="list-group-item listnoback">

                                <b>

                                    <?php echo $this->lang->line('phone'); ?>

                                </b>

                                <a class="pull-right text-aqua">

                                    <?php echo $agent_details['contact_no']; ?>

                                </a>

                            </li>

                            <li class="list-group-item listnoback">

                                <b>

                                    <?php echo $this->lang->line('gender'); ?>

                                </b>

                                <a class="pull-right text-aqua">

                                    <?php echo $agent_details['gender']; ?>

                                </a>

                            </li>

                            <li class="list-group-item listnoback">

                                <b>

                                    <?php echo $this->lang->line('email'); ?>

                                </b>

                                <a class="pull-right text-aqua">

                                    <?php echo $agent_details['email']; ?>

                                </a>

                            </li>

                            <li class="list-group-item listnoback">

                                <b>

                                    <?php echo $this->lang->line('marital_status'); ?>

                                </b>

                                <a class="pull-right text-aqua">

                                    <?php echo $agent_details['marital_status']; ?>

                                </a>

                            </li>

                            <li class="list-group-item listnoback">

                                <b>

                                    <?php echo $this->lang->line('date_of_birth'); ?>

                                </b>

                                <a class="pull-right text-aqua">

                                    <?php echo date('d-M-Y', strtotime($agent_details['dob'])); ?>

                                </a>

                            </li>

                            <li class="list-group-item listnoback">

                                <b>

                                    <?php echo $this->lang->line('date_of_joining'); ?>

                                </b>

                                <a class="pull-right text-aqua">

                                    <?php echo date('d-M-Y', strtotime($agent_details['date_of_joining'])); ?>

                                </a>

                            </li>

                        </ul>

                    </div>

                </div>

            </div>

            <div class="col-md-9">

                <div class="nav-tabs-custom">

                    <ul class="nav nav-tabs">

                        <li class="active"><a href="#activity" data-toggle="tab" aria-expanded="true"><?php echo $this->lang->line('profile'); ?></a></li>

                        <li class=""><a href="#payroll" data-toggle="tab" aria-expanded="true"><?php echo $this->lang->line('commission'); ?></a></li>

                    </ul>

                    <div class="tab-content">

                        <div class="tab-pane active" id="activity">

                            <div class="tshadow mb25 bozero">

                                <div class="table-responsive around10 pt0">

                                    <table class="table table-hover table-striped tmb0">

                                        <tbody>

                                            <tr>

                                                <td><?php echo $this->lang->line('agent_type'); ?></td>

                                                <td><?php echo $cat['category_name'] ?></td>

                                            </tr>

                                            <tr>

                                                <td><?php echo $this->lang->line('commission'); ?></td>

                                                <td><?php echo $cat['commission'] ?>%</td>

                                            </tr>

                                            <tr>

                                                <td><?php echo $this->lang->line('blood_group'); ?></td>

                                                <td><?php echo $agent_details['blood_group']; ?></td>

                                            </tr>

                                            <tr>

                                                <td class="col-md-4"><?php echo $this->lang->line('guardian_name'); ?></td>

                                                <td class="col-md-5"><?php echo $agent_details['guardian_name']; ?></td>

                                            </tr>

                                            <tr>

                                                <td><?php echo $this->lang->line('qualification'); ?></td>

                                                <td><?php echo $agent_details['qualification']; ?></td>

                                            </tr>

                                        </tbody>

                                    </table>

                                </div>

                            </div>

                            <div class="tshadow mb25 bozero">

                                <h3 class="pagetitleh2"><?php echo $this->lang->line('address'); ?> <?php echo $this->lang->line('detail'); ?></h3>

                                <div class="table-responsive around10 pt0">

                                    <table class="table table-hover table-striped tmb0">

                                        <tbody>

                                            <tr>

                                                <td class="col-md-4"><?php echo $this->lang->line('current_address'); ?></td>

                                                <td class="col-md-5"><?php echo $agent_details['current_address']; ?></td>

                                            </tr>

                                            <tr>

                                                <td><?php echo $this->lang->line('permanent_address'); ?></td>

                                                <td><?php echo $agent_details['permanent_address']; ?></td>

                                            </tr>

                                        </tbody>

                                    </table>

                                </div>

                            </div>

                            <div class="tshadow mb25 bozero">

                                <h3 class="pagetitleh2"><?php echo $this->lang->line('bank_account_details'); ?> <?php echo $this->lang->line('detail'); ?></h3>

                                <div class="table-responsive around10 pt0">

                                    <table class="table table-hover table-striped tmb0">

                                        <tbody>

                                            <tr>

                                                <td class="col-md-4"><?php echo $this->lang->line('bank_name'); ?></td>

                                                <td class="col-md-5"><?php echo $agent_details['bank_name']; ?></td>

                                            </tr>

                                            <tr>

                                                <td><?php echo $this->lang->line('bank_branch_name'); ?></td>

                                                <td><?php echo $agent_details['branch_name']; ?></td>

                                            </tr>

                                            <tr>

                                                <td><?php echo $this->lang->line('account_holder_name'); ?></td>

                                                <td><?php echo $agent_details['account_holder_name']; ?></td>

                                            </tr>

                                            <tr>

                                                <td><?php echo $this->lang->line('bank_account_no'); ?></td>

                                                <td><?php echo $agent_details['account_no']; ?></td>

                                            </tr>



                                            <tr>

                                                <td><?php echo $this->lang->line('ifsc_code'); ?></td>

                                                <td><?php echo $agent_details['ifsc_code']; ?></td>

                                            </tr>

                                        </tbody>

                                    </table>

                                </div>

                            </div>

                        </div>

                        <div class="tab-pane" id="payroll">

                            <div class="row">

                                <div class="col-md-4 col-sm-6">

                                    <div class="staffprofile">

                                        <h5>

                                            <?php echo $this->lang->line('today').' '.$this->lang->line('commission'); ?> 

                                        </h5>

                                        <h4><?php

                                            if (!empty($com_today[0]["total"])) {

                                                echo $currency_symbol . $com_today[0]["total"];

                                            } else {

                                                echo $currency_symbol . "0";

                                            }

                                            ?></h4>

                                        <div class="icon mt12font40">

                                            <i class="fa fa-money"></i>

                                        </div>

                                    </div>

                                </div>

                                <!--./col-md-3-->



                                <div class="col-md-4 col-sm-6">

                                    <div class="staffprofile">



                                        <h5><?php echo $this->lang->line('paid').' '.$this->lang->line('commission'); ?></h5>

                                        <h4><?php

                                            if (!empty($com_paid[0]["total"])) {

                                                echo $currency_symbol . $com_paid[0]["total"];

                                            } else {

                                                echo $currency_symbol . "0";

                                            }

                                            ?></h4>

                                        <div class="icon mt12font40">

                                            <i class="fa fa-money"></i>

                                        </div>

                                    </div>

                                </div>

                                <!--./col-md-3-->



                                <div class="col-md-4 col-sm-6">

                                    <div class="staffprofile">



                                        <h5><?php echo $this->lang->line('total').' '.$this->lang->line('commission'); ?></h5>

                                        <h4><?php

                                            if (!empty($com_total[0]["total"])) {

                                                echo $currency_symbol . $com_total[0]["total"];

                                            } else {

                                                echo $currency_symbol . "0";

                                            }

                                            ?></h4>

                                        <div class="icon mt12font40">

                                            <i class="fa fa-money"></i>

                                        </div>

                                    </div>

                                </div>

                                <!--./col-md-3-->

                            </div>



                            <div class="download_label"><?php echo $this->lang->line('payroll_details_for'); ?> <?php echo $staff["name"] . " " . $staff["surname"]; ?></div>

                            <div class="table-responsive">

                                <table class="table table-hover table-striped example">



                                    <thead>

                                        <tr>

                                            <th class="text text-left"><?php echo $this->lang->line('payslip'); ?> #</th>

                                            <th class="text text-left"><?php echo $this->lang->line('month'); ?> - <?php echo $this->lang->line('year') ?><span></span></th>

                                            <th class="text text-left">
                                                <?php
                                                    if ($payroll_value['mode'] != 0) {
                                                        echo "Payment ".$this->lang->line('date');
                                                    }
                                                    else {
                                                        echo "Generated Date";
                                                    }
                                                ?>
                                            </th>





                                            <th class="text text-left"><?php echo $this->lang->line('mode'); ?></th>

											<th class="text text-left"><?php echo "Section"; ?></th>





                                            <th class="text text-left"><?php echo $this->lang->line('status'); ?></th>

                                            <th class=""><?php echo "Net ".$this->lang->line('commission'); ?> <span><?php echo "(" . $currency_symbol . ")"; ?></span></th>

                                            <th class="text-right no-print"><?php echo $this->lang->line('action'); ?></th>

                                        </tr>

                                    </thead>

                                    <tbody>

                                        <?php 

                                        foreach ($agent_payment as $key => $payroll_value) {



                                            if ($payroll_value["status"] == "paid") {

                                                $label = "class='label label-success'";

                                            } else if ($payroll_value["status"] == "generated") {

                                                $label = "class='label label-warning'";

                                            } else {

                                                $label = "class='label label-default'";

                                            }

                                        ?>

                                            <tr>

                                                <td>

                                                    <a data-toggle="popover" href="#" class="detail_popover" data-original-title="" title=""><?php echo $payroll_value['id'] ?></a>

                                                    <div class="fee_detail_popover" style="display: none"><?php echo $payroll_value['remark']; ?></div>

                                                </td>

                                                <td><?php echo $payroll_value['month'] . " - " . $payroll_value['year']; ?></td>

                                                <td>
                                                    <?php 
                                                    if ($payroll_value['mode'] != 0) {
                                                        echo date('d/m/Y', strtotime($payroll_value['payment_date']));
                                                    }else{
                                                        echo date('d/m/Y', strtotime($payroll_value['create_date']));
                                                    }
                                                    ?>
                                                </td>



                                                

                                                  <td><?php if($payroll_value['mode'] == 1){echo "Online".$this->lang->line('online');}elseif($payroll_value['mode'] == 2){echo $this->lang->line('cash');}else{ echo "Not Paid Yet";} ?></td>

                                              

                                              <td><?php echo $payroll_value['section'] ?></td>

                                              

                                                <td><?php if($payroll_value['status'] == 1){echo "Generated ! Waiting For Payment";}elseif($payroll_value['status'] == 2){echo "Paid";} ?></td>

                                                <td><?php echo $currency_symbol." ".$payroll_value['amount'] ?></td>

                                                <td class="text-right">

                                                    <?php if ($payroll_value["status"] == 2) { ?>

                                                        <a href="#" onclick="getPayslip('<?php echo $payroll_value['id']; ?>')" role="button" class="btn btn-primary btn-xs checkbox-toggle edit_setting" data-toggle="tooltip" title="<?php echo $this->lang->line('Payslip View'); ?>"><?php echo $this->lang->line('view'); ?> <?php echo $this->lang->line('payslip'); ?></a>

                                                    <?php }else{ echo " Not Paid Yet"; }?>

                                                </td>

                                            </tr>

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



<div id="payslipview" class="modal fade" role="dialog">



    <div class="modal-dialog modal-dialog2 modal-lg">

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal">&times;</button>

                <h4 class="modal-title"><?php echo $this->lang->line('details'); ?> <span id="print"></span></h4>

            </div>

            <div class="modal-body" id="testdata">





            </div>

        </div>

    </div>

</div>



<div id="changepwdmodal" class="modal fade">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                <h4 class="modal-title"><?php echo $this->lang->line('change_password') ?></h4>

            </div>

            <form method="post" id="changepass" action="">



                <div class="modal-body">

                    <div class="form-group">

                        <label for="email"><?php echo $this->lang->line('password') ?></label>

                        <input type="password" class="form-control" name="new_pass" id="pass">

                        <input type="hidden" class="form-control" name="agent_id" id="agent_id" value="<?php echo $agent_details['id'] ?>">

                    </div>

                    <div class="form-group">

                        <label for="pwd"><?php echo $this->lang->line('confirm_password') ?></label>

                        <input type="password" class="form-control" name="confirm_pass" id="pwd">

                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->lang->line('close') ?></button>

                    <button type="submit" id="changepassbtn" data-loading-text="<?php echo $this->lang->line('processing') ?>" class="btn btn-primary"><?php echo $this->lang->line('save') ?></button>

                </div>

            </form>

        </div>

    </div>

</div>



<script type="text/javascript">

    function holdModal(modalId) {

        $('#' + modalId).modal({

            backdrop: 'static',

            keyboard: false,

            show: true

        });

    }



    $(document).ready(function(e) {

        $("#changepass").on('submit', (function(e) {

            $("#changepassbtn").button('loading');

            var agent_id = $("#agent_id").val();



            e.preventDefault();

            $.ajax({

                url: "<?php echo site_url('admin/agent/change_password/') ?>" + agent_id,

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

                    $("#changepassbtn").button('reset');

                },

                error: function(e) {

                    alert("Fail");

                    console.log(e);

                }

            });





        }));

    });

</script>

<script>

    $(document).ready(function() {



        $(document).on('click', '.change_password', function() {

            $('#changepwdmodal').modal('show');

        });





        $('.detail_popover').popover({

            placement: 'right',

            title: '',

            trigger: 'hover',

            container: 'body',

            html: true,

            content: function() {

                return $(this).closest('td').find('.fee_detail_popover').html();

            }

        });



        var date_format = '<?php echo $result = strtr($this->customlib->getSchoolDateFormat(), ['d' => 'dd', 'm' => 'mm', 'Y' => 'yyyy',]) ?>';



    });





    function getPayslip(id) {







        var base_url = '<?php echo base_url() ?>';

        $.ajax({

            url: base_url + 'admin/agent/payslipView',

            type: 'POST',

            data: {

                payslipid: id

            },

            //dataType: "json",

            success: function(result) {

                $("#print").html("<a href='#' class='pull-right modal-title moprint' onclick='printData(" + id + ")'  title='Print'><i class='fa fa-print'></i></a>");

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

            data: {

                payslipid: id

            },

            //dataType: "json",

            success: function(result) {



                $("#testdata").html(result);

                popup(result);

            }

        });

    }



    function popup(data) {

        var base_url = '<?php echo base_url() ?>';

        var frame1 = $('<iframe />');

        frame1[0].name = "frame1";

        frame1.css({

            "position": "absolute",

            "top": "-1000000px"

        });

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

        setTimeout(function() {

            window.frames["frame1"].focus();

            window.frames["frame1"].print();

            frame1.remove();

        }, 500);





        return true;

    }

</script>