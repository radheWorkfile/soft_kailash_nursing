<?php
$currency_symbol = $this->customlib->getSchoolCurrencyFormat();
//echo "<pre>";
//print_r($result);
//exit();
?>
<style type="text/css">
    @page {
        size: auto;
        /* auto is the initial value */
        margin: 5mm;
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
                        <img style="height:100px" class="img-responsive" src="<?php echo base_url() . $print_details[0]["print_header"] ?>">
                    <?php } ?>
                    <div style="height: 10px; clear: both;"></div>
                </div>
                <table width="100%" class="printablea4">
                    <tr>
                        <td align="text-left">
                            <h5><?php echo $this->lang->line('bill') . " #" ?><?php echo $result["opdid"] ?></h5>
                        </td>
                        <td align="right">
                            <h5><?php echo $this->lang->line('date') . " : " ?><?php
                                                                                if (!empty($result['appointment_date'])) {
                                                                                    echo date($this->customlib->getSchoolDateFormat(true, true), strtotime($result['appointment_date']));
                                                                                }
                                                                                ?></h5>
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
                        <th width="25%"><?php echo $this->lang->line('email'); ?></th>
                        <td width="25%"><?php echo $result["email"]; ?></td>
                        <th width="25%"><?php echo $this->lang->line('date_of_birth'); ?></th>
                        <td width="25%"><?php echo date('d/m/Y', strtotime($result["dob"])); ?></td>
                    </tr>
                    <tr>
                        <th width="25%"><?php echo $this->lang->line('gender'); ?></th>
                        <td width="25%"><?php echo $result["gender"]; ?></td>
                        <th width="25%"><?php echo $this->lang->line('marital_status'); ?></th>
                        <td width="25%"><?php echo $result["marital_status"]; ?></td>
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
                        <th><?php echo $this->lang->line('opd') . " " . $this->lang->line('no'); ?></th>
                        <td><?php echo $result['opd_no']; ?></td>
                    </tr>
                    <tr>
                        <!-- th><?php echo $this->lang->line('admission') . " " . $this->lang->line('date'); ?></th>
                           <td><?php echo date($this->customlib->getSchoolDateFormat(true, true), strtotime($result['date'])); ?></td>  -->
                        <?php if (!empty($result['discharge_date'])) { ?>
                            <!--  <th><?php echo $this->lang->line('discharged') . " " . $this->lang->line('date'); ?></th>
                                   <td align="right"><?php echo date($this->customlib->getSchoolDateFormat(), strtotime($result['discharge_date'])); ?></td>  -->
                        <?php } ?>
                    </tr>
                </table>
                <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px">


                <table class="printablea4" width="100%">
                    <tr>
                        <th width="25%"><?php echo $this->lang->line('case') ?></th>
                        <td width="25%"><?php echo $result['case_type'] ?></td>

                        <th width="25%"><?php echo $this->lang->line('casualty') ?></th>
                        <td width="25%"><?php echo $result['casualty'] ?></td>
                    </tr>
                    <tr>
                        <th width="25%"><?php echo $this->lang->line('symptoms') ?></th>
                        <td width="25%"><?php echo $result['symptoms'] ?></td>
                        <th width="25%"><?php echo $this->lang->line('note') ?></th>
                        <td width="25%"><?php echo $result["note"] ?></td>
                    </tr>
                </table>


                <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px">
                <table class="printablea4" width="100%">

                    <tr>
                        <!--          <th width="25%" class=""><?php echo $this->lang->line('payment') . " " . $this->lang->line('mode'); ?></th>
                          <th width="25%" class=""><?php echo $this->lang->line('payment') . " " . $this->lang->line('date'); ?></th> -->
                        <th width="25%"><?php echo $this->lang->line('paid') . " " . $this->lang->line('amount') . ' (' . $currency_symbol . ')'; ?></th>

                        <td width="25%"><?php echo $result["apply_charge"] ?></td>
                        <th width="25%"></th>
                        <td width="25%"></td>
                    </tr>
                </table>
                <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px">
                <?php if (!empty($print_details[0]['print_footer'])) { ?>
                    <div class="footer">
                        <center><img style="height:100px;width:95%" class="img-responsive" src="<?php echo base_url() . $print_details[0]["print_footer"] ?>"></center>
                    </div>
                <?php } ?>
                <!--  -->
                <!-- <?php if (!empty($print_details[0]['print_footer'])) { ?>    
                        <p class="ptt10"><?php echo $print_details[0]['print_footer']; ?></p>
                    <?php } ?> -->
            </div>
        </div>
    </div>
</div>

</html>