<?php

$currency_symbol = $this->customlib->getSchoolCurrencyFormat();

$genderList = $this->customlib->getGender();

//echo "<pre>";

//print_r($result);

//exit();

?>

<style type="text/css">

    @page {

        size: auto;

        /* auto is the initial value */

        margin-top: 2rem !important;
        margin-bottom: 2mm;

        /* this affects the margin in the printer settings */
    }

    

    .footer {

        position: fixed;

        bottom: 0;

    }



    .printablea4 {

        width: 100%;

    }



    .printablea4>tbody>tr>th,

    .printablea4>tbody>tr>td {

        padding: 2px 0;

        line-height: 1.42857143;

        vertical-align: top;

        font-size: 12px;

    }

</style>

<html lang="en">



<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <title><?php echo $this->lang->line('bill'); ?></title>

</head>

<div id="html-2-pdfwrapper">

    <div class="row">

        <!-- left column -->

        <div class="col-md-12">

            <div class="">

                <div class="pprinta4">

                    <?php if (!empty($print_details[0]['print_header'])) { ?>

                        <center><img style="height:100px;width:100%" class="img-responsive" src="<?php echo base_url() . $print_details[0]["print_header"] ?>"></center>

                    <?php } ?>

                    <div style="height: 10px; clear: both;"></div>

                </div>

                <table width="100%" class="printablea4">

                    <tr>

                        <td align="text-left">

                            <h5><?php echo $this->lang->line('bill') . " #" ?><?php echo $result["ipdid"] ?></h5>

                        </td>

                        <td align="right">

                            <h5><?php echo $this->lang->line('date') . " : " ?><?php

                                                                                if (!empty($result['date'])) {

                                                                                    echo date($this->customlib->getSchoolDateFormat(true, true), strtotime($result['date']));

                                                                                }

                                                                                ?></h5>

                        </td>

                    </tr>

                    <tr>

                        <td align="text-left">

                            <h5><?php echo $this->lang->line('patient') . " " . $this->lang->line('id') . " : "; ?><?php echo $result['patient_unique_id']; ?></h5>

                        </td>

                    </tr>

                </table>

                <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px">

                <table class="printablea4" cellspacing="0" width="100%">

                    <tr>

                        <th width="25%"><?php echo $this->lang->line('name'); ?></th>

                        <td width="25%"><?php echo $result["patient_name"]; ?></td>

                        <th width="25%"><?php echo $this->lang->line('mobile'); ?></th>

                        <td width="25%"><?php echo $result["mobileno"]; ?></td>

                    </tr>

                    <tr>

                        

                      	<th width="25%"><?php echo $this->lang->line('gender'); ?></th>

                        <td width="25%"><?php echo $result["gender"]; ?></td>

                        <th width="25%"><?php echo $this->lang->line('age'); ?></th>

                        <td width="25%"><?php echo $result["age"]." Years"; ?></td>

                    </tr>

                    <tr>

                        <!--<th width="25%"><?php echo $this->lang->line('email'); ?></th>

                        <td width="25%"><?php echo $result["email"]; ?></td>--->

                        <!--<th width="25%"><?php echo $this->lang->line('marital_status'); ?></th>

                        <td width="25%"><?php echo $result["marital_status"]; ?></td>--->

                    </tr>

                    <tr>

                        <th width="25%"><?php echo $this->lang->line('address'); ?></th>

                        <td width="25%"><?php echo $result["address"]; ?></td>

                        <th width="25%"><?php echo $this->lang->line('guardian_name'); ?></th>

                        <td width="25%"><?php echo $result["guardian_name"]; ?></td>

                    </tr>

                    <tr>

                        <th><?php echo $this->lang->line('blood_group'); ?></th>

                        <td><?php echo $result['blood_group']; ?></td>

                        <th width="25%"><?php echo $this->lang->line('doctor'); ?></th>

                        <td width="25%"><?php echo $result["name"] . " " . $result["surname"]; ?></td>

                    </tr>

                    <tr>

                        <th><?php echo $this->lang->line('ipd') . " " . $this->lang->line('no'); ?></th>

                        <td><?php echo $result['ipd_no']; ?></td>

                    </tr>
                    <tr>

                        <th><?php echo $this->lang->line('admission') . " " . $this->lang->line('date'); ?></th>

                        <td><?php echo date($this->customlib->getSchoolDateFormat(true, true), strtotime($result['date'])); ?></td>

                        <th width="25%"><?php echo $this->lang->line('bed'); ?></th>

                        <td width="25%"><?php echo $result['bed_name'] . " - " . $result['bedgroup_name'] . " - " . $result['floor_name'] ?></td>

                    </tr>

                    <tr>

                        <?php if (!empty($result['discharge_date'])) { ?>

                            <th><?php echo $this->lang->line('discharged') . " " . $this->lang->line('date'); ?></th>

                            <td><?php echo date($this->customlib->getSchoolDateFormat(), strtotime($result['discharge_date'])); ?></td>

                        <?php } ?>

                    </tr>
                    <tr>
                        <th>&nbsp;</th>   
                        <td>&nbsp;</td>                                                    
                        <th width="25%">BP</th>
                        <td width="25%">................................................</td>
                    </tr>              
                    <tr>
                        <th>&nbsp;</th>   
                        <td>&nbsp;</td>                                                    
                        <th width="25%">Pulse</th>
                        <td width="25%">................................................</td>
                    </tr> 
                    <tr>
                        <th>&nbsp;</th>   
                        <td>&nbsp;</td>                                                    
                        <th width="25%">Weight</th>
                        <td width="25%">................................................</td>
                    </tr> 

                </table>

                <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px">





                <table class="printablea4" width="100%">

                    <tr>

                      	<th width="15%"><?php echo $this->lang->line('date'); ?></th>

                        <th width="25%"><?php echo $this->lang->line('charges') . ' (' . $currency_symbol . ')'; ?> </th>

                        <!----<th width="25%"><?php echo $this->lang->line('category'); ?></th>--->

                        <th width="15%"><?php echo $this->lang->line('standard') . " " . $this->lang->line('charge'); ?></th>

                        <th width="15%"><?php echo $this->lang->line('applied') . " " . $this->lang->line('charge'); ?></th>

                        <th width="6%"><?php echo $this->lang->line('unit'); ?>/Days</th>

                        <th width="35%" class="pttright reborder text-right"><?php echo $this->lang->line('amount') . ' (' . $currency_symbol . ')'; ?> </th>

                    </tr>

                    <?php

                    $j = 0;

                    $total = 0;

                    foreach ($charges as $key => $charge) {

                        $amt = $charge["apply_charge"] * $charge["unit"];

                    ?>

                        <tr>

                            <!---<td><?php echo $charge["charge_type"]; ?></td>--->

                          	<td><?php echo date($this->customlib->getSchoolDateFormat(), strtotime($charge["date"])); ?></td>

                            <td><?php echo $charge["charge_category"]; ?></td>

                            <td><?php echo number_format($charge["standard_charge"],2); ?></td>

                            <td><?php echo number_format($charge["apply_charge"],2); ?></td>

                            <td><?php echo $charge["unit"]; ?></td>

                            <td align="right"><?php echo number_format($amt,2); ?></td>

                        </tr>





                        <?php

                        $total += $amt;

                        ?>



                    <?php

                        $j++;

                    }

                    ?>

                    <tr>

                        <td></td>

                        <td></td>

                        <td></td>

                        <td></td>

                        <td></td>

                        <td colspan="2" align="right"><?php echo $this->lang->line('total') . " : " ?> <?php echo $currency_symbol . number_format($total,2) ?></td>



                    </tr>

                </table>



                <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px">



                <table class="printablea4" width="100%">

                    <tr>

                        <th width="25%" class=""><?php echo $this->lang->line('payment') . " " . $this->lang->line('mode'); ?></th>

                        <th width="25%" class=""><?php echo $this->lang->line('payment') . " " . $this->lang->line('date'); ?></th>

                        <th width="50%" align="right" style="text-align: right;"><?php echo $this->lang->line('paid') . " " . $this->lang->line('amount') . ' (' . $currency_symbol . ')'; ?></th>

                    </tr>

                    <?php

                    $k = 0;

                    $total_paid = 0;

                    if ($result['status'] != 'paid') {

                        $status = $this->lang->line('unpaid');

                    } else {

                        $status = $this->lang->line('paid');

                    }

                    foreach ($payment_details as $key => $payment) {

                    ?>

                        <tr>

                            <td width="25%"><?php echo $payment["payment_mode"]; ?></td>

                            <td width="25%"><?php echo date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformat($payment['date'])); ?></td>

                            <td width="50%" align="right"><?php echo number_format($payment["paid_amount"],2); ?></td>

                        </tr>

                    <?php

                        $total_paid += $payment["paid_amount"];

                    }

                    ?>

                    <tr>

                        <td width="25%"></td>

                        <td width="25%"></td>

                        <td width="50%" align="right"><?php echo $this->lang->line('total') . " : " ?> <?php echo $currency_symbol . number_format($total_paid,2) ?></td>

                    </tr>

                </table>





                <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px">

                <table class="printablea4" width="100%">

                    <tr>

                        <th width="20%"><?php echo $this->lang->line('total') . " " . $this->lang->line('charges') . " (" . $currency_symbol . ")" ?> </th>

                        <td align="right"><?php echo $total; ?></td>

                    </tr>



                    <tr>

                        <th width="20%"><?php echo $this->lang->line('total') . " " . $this->lang->line('payment') . " (" . $currency_symbol . ")" ?> </th>

                        <td align="right" width=""><?php

                                                    if (empty($result['paid_amount'])) {

                                                        echo $paid_amount;

                                                    } else {

                                                        echo $result['paid_amount'];

                                                    }

                                                    ?></td>

                    </tr>

                    <tr>

                        <td colspan="2">

                            <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px">

                        </td>

                    </tr>

                    <tr>

                        <th width="20%"><?php echo $this->lang->line('gross') . " " . $this->lang->line('total') . " (" . $currency_symbol . ")" ?> </th>

                        <td align="right" width=""><?php

                                                    if (empty($result['gross_total'])) {

                                                        echo $gross_total;

                                                    } else {

                                                        echo $result['gross_total'];

                                                    }

                                                    ?></td>

                    </tr>

                    <tr>

                        <th width="20%"><?php echo $this->lang->line('discount') . " (" . $currency_symbol . ")"; ?></th>

                        <td align="right">

                            <input type="hidden" name="patient_id" value="<?php echo $result["id"] ?>">

                            <?php

                            if (!empty($result["discount"]) | $result["discount"] == 0) {

                                echo $result["discount"];

                            } else {

                                echo $discount;

                            }

                            ?>

                        </td>

                    </tr>



                    <tr>

                        <th width="30%"><?php echo $this->lang->line('any_other_charges') . " (" . $currency_symbol . ")"; ?></th>

                        <td align="right"><?php

                                            if (!empty($result["other_charge"]) | $result["other_charge"] == 0) {

                                                echo number_format($result["other_charge"],2);

                                            } else {

                                                echo number_format($other_charge,2);

                                            }

                                            ?></td>

                    </tr>

                    <tr>

                        <th width="20%"><?php echo $this->lang->line('tax') . " (" . $currency_symbol . ")" ?></th>

                        <td align="right"><?php

                                            if (!empty($result['tax']) | $result["tax"] == 0) {

                                                echo $result['tax'];

                                            } else {

                                                echo $tax;

                                            }

                                            ?></td>

                    </tr>

                    <tr>

                        <td colspan="2">

                            <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px">

                        </td>

                    </tr>

                    <tr>

                        <th width="50%"><?php echo $this->lang->line('net_payable') . " " . $this->lang->line('amount') . " (" . $status . ")" ?></th>

                        <td align="right"><?php

                                            if (empty($result['net_amount'])) {

                                                echo number_format($net_amount,2);

                                            } else {

                                                echo number_format($result['net_amount'],2);

                                            }

?></td>

                    </tr>



                </table>

                <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px">
                <div class="footer">
                    <p>
                        Valid For 20 Days
                        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                        Not For Medico Legal Purpose
                    </p>       
                </div>

                <?php if (!empty($print_details[0]['print_footer'])) { ?>

                    <div class="footer">

                        <center><img style="height:100px;width:95%" class="img-responsive" src="<?php echo base_url() . $print_details[0]["print_footer"] ?>"></center>

                    </div>

                <?php } ?>

            </div>



        </div>



    </div>



</div>





</html>