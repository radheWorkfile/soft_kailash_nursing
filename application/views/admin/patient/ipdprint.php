<?php

$currency_symbol = $this->customlib->getSchoolCurrencyFormat();

?>

<style type="text/css">

    @media print {



        .col-sm-1,

        .col-sm-2,

        .col-sm-3,

        .col-sm-4,

        .col-sm-5,

        .col-sm-6,

        .col-sm-7,

        .col-sm-8,

        .col-sm-9,

        .col-sm-10,

        .col-sm-11,

        .col-sm-12 {

            float: left;

        }



        .col-sm-12 {

            width: 100%;

        }



        .col-sm-11 {

            width: 91.66666667%;

        }



        .col-sm-10 {

            width: 83.33333333%;

        }



        .col-sm-9 {

            width: 75%;

        }



        .col-sm-8 {

            width: 66.66666667%;

        }



        .col-sm-7 {

            width: 58.33333333%;

        }



        .col-sm-6 {

            width: 50%;

        }



        .col-sm-5 {

            width: 41.66666667%;

        }



        .col-sm-4 {

            width: 33.33333333%;

        }



        .col-sm-3 {

            width: 25%;

        }



        .col-sm-2 {

            width: 16.66666667%;

        }



        .col-sm-1 {

            width: 8.33333333%;

        }



        .col-sm-pull-12 {

            right: 100%;

        }



        .col-sm-pull-11 {

            right: 91.66666667%;

        }



        .col-sm-pull-10 {

            right: 83.33333333%;

        }



        .col-sm-pull-9 {

            right: 75%;

        }



        .col-sm-pull-8 {

            right: 66.66666667%;

        }



        .col-sm-pull-7 {

            right: 58.33333333%;

        }



        .col-sm-pull-6 {

            right: 50%;

        }



        .col-sm-pull-5 {

            right: 41.66666667%;

        }



        .col-sm-pull-4 {

            right: 33.33333333%;

        }



        .col-sm-pull-3 {

            right: 25%;

        }



        .col-sm-pull-2 {

            right: 16.66666667%;

        }



        .col-sm-pull-1 {

            right: 8.33333333%;

        }



        .col-sm-pull-0 {

            right: auto;

        }



        .col-sm-push-12 {

            left: 100%;

        }



        .col-sm-push-11 {

            left: 91.66666667%;

        }



        .col-sm-push-10 {

            left: 83.33333333%;

        }



        .col-sm-push-9 {

            left: 75%;

        }



        .col-sm-push-8 {

            left: 66.66666667%;

        }



        .col-sm-push-7 {

            left: 58.33333333%;

        }



        .col-sm-push-6 {

            left: 50%;

        }



        .col-sm-push-5 {

            left: 41.66666667%;

        }



        .col-sm-push-4 {

            left: 33.33333333%;

        }



        .col-sm-push-3 {

            left: 25%;

        }



        .col-sm-push-2 {

            left: 16.66666667%;

        }



        .col-sm-push-1 {

            left: 8.33333333%;

        }



        .col-sm-push-0 {

            left: auto;

        }



        .col-sm-offset-12 {

            margin-left: 100%;

        }



        .col-sm-offset-11 {

            margin-left: 91.66666667%;

        }



        .col-sm-offset-10 {

            margin-left: 83.33333333%;

        }



        .col-sm-offset-9 {

            margin-left: 75%;

        }



        .col-sm-offset-8 {

            margin-left: 66.66666667%;

        }



        .col-sm-offset-7 {

            margin-left: 58.33333333%;

        }



        .col-sm-offset-6 {

            margin-left: 50%;

        }



        .col-sm-offset-5 {

            margin-left: 41.66666667%;

        }



        .col-sm-offset-4 {

            margin-left: 33.33333333%;

        }



        .col-sm-offset-3 {

            margin-left: 25%;

        }



        .col-sm-offset-2 {

            margin-left: 16.66666667%;

        }



        .col-sm-offset-1 {

            margin-left: 8.33333333%;

        }



        .col-sm-offset-0 {

            margin-left: 0%;

        }



        .visible-xs {

            display: none !important;

        }



        .hidden-xs {

            display: block !important;

        }



        table.hidden-xs {

            display: table;

        }



        tr.hidden-xs {

            display: table-row !important;

        }



        th.hidden-xs,

        td.hidden-xs {

            display: table-cell !important;

        }



        .hidden-xs.hidden-print {

            display: none !important;

        }



        .hidden-sm {

            display: none !important;

        }



        .visible-sm {

            display: block !important;

        }



        table.visible-sm {

            display: table;

        }



        tr.visible-sm {

            display: table-row !important;

        }



        th.visible-sm,

        td.visible-sm {

            display: table-cell !important;

        }

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

    <title>Patients Details</title>

</head>



<div id="html-2-pdfwrapper">



    <div class="row">

        <!-- left column -->

        <div class="col-md-12">

            <div class="pprinta4">

                <img src="<?php

                            if (!empty($print_details[0]['print_header'])) {

                                echo base_url() . $print_details[0]['print_header'];

                            }

                            ?>" class="img-responsive">

                <div style="height: 10px; clear: both;"></div>

            </div>

            <div class="">

                <?php

                $date = $result["date"];

                $appointment_date = date("Y-m-d", strtotime($date));

                ?>

                <h4 align="center">Patients Details</h4>



                <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px" />

                <table width="100%" class="printablea4">

                    <tr>

                        <th width="15%"><?php echo $this->lang->line('patient') . " " . $this->lang->line('name'); ?></th>

                        <td width="35%"><?php echo $result["patient_name"] ?>(<?php echo $result["patient_unique_id"] ?>)</td>

                        <th width="15%"><?php echo "Registration ID"; ?></th>

                        <td width="35%"><?php echo  $result["patient_unique_id"]; ?></td>

                        <!-- <th width="15%"><?php echo $this->lang->line('agent'); ?></th>

                        <td width="35%"><?php echo $result['agent_name'] . "(" . $result['agent_id'] . ")"; ?></td> -->

                    </tr>

                    <tr>

                        <th width="15%"><?php echo $this->lang->line('guardian_name'); ?></th>

                        <td width="35%"><?php echo $result["guardian_name"] ?></td>

                        <th width="15%"><?php echo $this->lang->line('gender'); ?></th>

                        <td width="35%"><?php echo $result["gender"] ?></td>

                    </tr>

                    <tr>

                        <th width="15%"><?php echo $this->lang->line('marital_status'); ?></th>

                        <td width="35%"><?php echo $result["marital_status"] ?></span>

                        </td>



                        <th width="15%"><?php echo $this->lang->line('phone'); ?></th>

                        <td width="35%"><?php echo $result["mobileno"] ?></td>



                    </tr>

                    <tr>

                        <th width="15%"><?php echo $this->lang->line('email'); ?></th>

                        <td width="35%"><?php echo $result["email"] ?></td>

                        <th width="15%"><?php echo $this->lang->line('address'); ?></th>

                        <td width="35%"><?php echo $result["address"] ?></td>

                    </tr>

                    <tr>

                        <th width="15%"><?php echo $this->lang->line('age'); ?></th>

                        <td width="35%"><?php echo $result["age"] . " Year " . $result["month"] . " Month "  ?></td>

                        <th width="15%"><?php echo $this->lang->line('blood_group'); ?></th>

                        <td width="35%"><?php echo $result["blood_group"] ?></td>



                    </tr>

                    <tr>

                        <th width="15%"><?php echo $this->lang->line('height'); ?></th>

                        <td width="35%"><?php echo $result["height"] ?></td>

                        <th width="15%"><?php echo $this->lang->line('weight'); ?></th>

                        <td width="35%"><?php echo $result["weight"] ?></td>



                    </tr>



                    <tr>

                        <th width="15%"><?php echo $this->lang->line('bp'); ?></th>

                        <td width="35%"><?php echo $result["bp"] ?></td>

                        <th width="15%"><?php echo $this->lang->line('symptoms'); ?></th>

                        <td width="35%"><?php echo $result["symptoms"] ?></td>

                    </tr>

                    <tr>

                        <th width="15%"><?php echo $this->lang->line('known_allergies'); ?></th>

                        <td width="35%"><?php echo $result["known_allergies"] ?></td>

                        <th width="15%"><?php echo $this->lang->line('admission') . " " . $this->lang->line('date'); ?></th>

                        <td width="35%"><?php echo $result["date"] ?></td>

                    </tr>

                    <tr>

                        <th width="15%"><?php echo $this->lang->line('case'); ?></th>

                        <td width="35%"><?php echo $result["case_type"] ?></td>

                        <th width="15%"><?php echo $this->lang->line('casualty'); ?></th>

                        <td width="35%"><?php echo $result["casualty"] ?></td>

                    </tr>

                    <tr>

                        <th width="15%"><?php echo $this->lang->line('old') . " " . $this->lang->line('patient'); ?></th>

                        <td width="35%"><?php echo $result["old_patient"] ?></td>

                        <th width="15%"><?php echo $this->lang->line('organisation'); ?></th>

                        <td width="35%"><?php echo $result["organisation_name"] ?></td>

                    </tr>

                    <tr>

                        <th width="15%"><?php echo $this->lang->line('refference'); ?></th>

                        <td width="35%"><?php echo $result["refference"] ?></td>

                        <th width="15%"><?php echo $this->lang->line('consultant') . " " . $this->lang->line('doctor'); ?></th>

                        <td width="35%"><?php echo $result["name"] . " " . $result["surname"] ?></td>

                    </tr>

                    <tr>

                        <th width="15%"><?php echo $this->lang->line('bed') . " " . $this->lang->line('group'); ?></th>

                        <td width="35%"><?php echo $result["bedgroup_name"] . " " . $result["floor_name"] ?></td>

                        <th width="15%"><?php echo $this->lang->line('bed') . " " . $this->lang->line('number'); ?></th>

                        <td width="35%"><?php echo $result["bed_name"] ?></td>

                    </tr>

                </table>

                <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top: 10px" />

                <table width="100%" class="printablea4">

                    <tr>

                        <td style="margin-bottom: 0;"><?php echo $result["header_note"] ?></td>

                    </tr>

                </table>

                <table width="100%" class="printablea4">

                    <tr>

                        <td><?php echo $result["footer_note"] ?></td>

                        <!--  <td><?php //echo $result["header_note"]     

                                    ?></td> -->

                    </tr>

                </table>



                <hr style="height: 1px; clear: both;margin-bottom: 10px; margin-top:0px" />



                <table width="100%" class="printablea4">

                    <tr>

                        <td><?php

                            if (!empty($print_details[0]['print_footer'])) {

                                echo $print_details[0]['print_footer'];

                            }

                            ?></td>

                    </tr>

                </table>

                <p class="ptt10"><?php //echo $this->lang->line('computer_generated_payslip');     

                                    ?></p>

            </div>

        </div>

        <!--/.col (left) -->



    </div>

</div>



</html>