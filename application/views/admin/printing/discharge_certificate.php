<?php
$currency_symbol = $this->customlib->getSchoolCurrencyFormat();
//echo "<pre>";
//print_r($result);
//exit();
?>
<style type="text/css">

    .printablea4{width: 100%;}
    .printablea4>tbody>tr>th,
    .printablea4>tbody>tr>td{padding:2px 0; line-height: 1.42857143;vertical-align: top; font-size: 12px;}
</style>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Certificate</title>
        <style>
    .line{
        border: 1px solid black;
        position:absolute;
    }
    p{
       font-size: 20px;
    }
    @page {
        size: landscape;
        margin:25px;
    }
    </style>
    </head>
    <div id="html-2-pdfwrapper">
        <?php //print_r($diagnosis);?>
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <div>
                        <div class="pprinta4">
                            <h1 align="center"><?php echo ucfirst($bill_info['name'])?></h1>
                            <p style="text-align:center;"><b>Address: <?php echo ucfirst($hospital[0]['address']); ?><br>Phone: <?php echo ucfirst($hospital[0]['phone']); ?><br>Email: <?php echo ucfirst($hospital[0]['email']); ?> </b><br><br>
                            <img src="<?php echo base_url('backend/images/certificate.png');?>" alt="" width="45%"></p>
                            <br>
                            <p>
                                <b>
                                    This is to certify that 
                                    <span class="line" style="margin: 1.5% 0;width:200px;"></span>
                                    &emsp;&emsp;<?php echo $ipd['patient_name'];?>
                                    &emsp;&emsp; of &nbsp;
                                    <span class="line" style="margin: 1.5% 0;width:870px;"></span>
                                    <?php echo $ipd['address'];?>
                                </b>
                            </p>
                            <p>
                                &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;(Name Of Patient)
                                &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;(Address Of Patient)
                            </p>
                            <p>
                                <b>
                                    was examined and treated at the CITY HOSPITAL on 
                                    <span class="line" style="margin: 1.5% 0;width:340px;"></span>
                                    &emsp;&emsp;<?php echo date('d-m-Y',strtotime($ipd['admission_date']));?>
                                    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;,To 
                                    <span class="line" style="margin: 1.5% 0;width:200px;"></span>
                                    &emsp;<?php echo date('d-m-Y',strtotime($ipd['discharge_date']));?>
                                    &emsp;&emsp;&emsp;&emsp;&nbsp;with the following diagnosis
                                </b>
                            </p>
                            <br>
                            <span class="line" style="margin: 1.5% 0;width:1300px;"></span>
                            <?php echo $diagnosis[0]['report_type'];?>
                            <br><br><br>
                            <span class="line" style="margin: 1.5% 0;width:1300px;"></span>
                            <?php echo $diagnosis[0]['description'];?>
                            <br><br><br>
                            <span class="line" style="margin: 1.5% 0;width:1300px;"></span>
                            <br><br>
                            <p>
                                <b>
                                    and would medical attention for
                                    <span class="line" style="margin: 1.5% 0;width:540px;"></span>
                                    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<?php echo $doctor[0]["name"] . " " . $doctor[0]["surname"] ?>
                                    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;days barring complication.
                                </b>
                            </p>
                            <p>
                                &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                                &emsp;&emsp;&emsp;&emsp;&emsp;(Attending Doctor)
                            </p>
                            <br><br><br><br><br><br><br><br>
                            <p>
                                <span class="line" style="margin: 1.5% 0;width:340px;"></span>
                                &emsp;&emsp;&emsp;&emsp;&emsp;<?php echo date('d-m-Y')?>
                                &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                                &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                                &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                                <span class="line" style="margin: 1.5% 0;width:400px;"></span>
                                &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                                &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;(Date)
                                &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                                &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                                &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;(Authorized Signature)
                                
                            </p>
                        </div>
                        
                        
                    </div>
                </div>
            </div>
        
    </div>
    <script type="text/javascript">
      window.onload = function() { window.print(); }
 </script>
</html>