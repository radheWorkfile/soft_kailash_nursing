<!DOCTYPE html>
<html dir="<?php echo ($front_setting->is_active_rtl) ? "rtl" : "ltr"; ?>" lang="<?php echo ($front_setting->is_active_rtl) ? "ar" : "en"; ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $page['title']; ?></title>
        <meta name="title" content="<?php echo $page['meta_title']; ?>">
        <meta name="keywords" content="<?php echo $page['meta_keyword']; ?>">
        <meta name="description" content="<?php echo $page['meta_description']; ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="<?php echo base_url($front_setting->fav_icon); ?>" type="image/x-icon">
        <link href="<?php echo $base_assets_url; ?>css/all.css" rel="stylesheet">
        <link href="<?php echo $base_assets_url; ?>css/font-awesome.min.css" rel="stylesheet">
        <link href="<?php echo $base_assets_url; ?>css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo $base_assets_url; ?>css/style.css" rel="stylesheet">
        <style>
         .right {
         position: fixed;
         top: 0;
         bottom: 0;
         height: 2.5em;
         margin: auto;
         background: red;
         color:#fff;
         z-index: 100;
         }
         .right {
         right: 0;
         -webkit-transform-origin: 100% 50%;
         -moz-transform-origin: 100% 50%;
         -ms-transform-origin: 100% 50%;
         -o-transform-origin: 100% 50%;
         transform-origin: 100% 50%;
         -webkit-transform: rotate(90deg) translate(50%, 50%);
         -moz-transform: rotate(90deg) translate(50%, 50%);
         -ms-transform: rotate(90deg) translate(50%, 50%);
         -o-transform: rotate(90deg) translate(50%, 50%);
         transform: rotate(90deg) translate(50%, 50%);
         }
		 .blink{
	    background-color: #900d0d;
		padding: 5px;	
		border-radius:20px;
		text-align: center;
		margin: -3.5% 0px 0px 25%;
		position: absolute;
		}
		.f{
		font-size: 15px;
		font-weight:bold;
		font-family: cursive;
		color: white;
		animation: blink 1s linear infinite;
		cursor:pointer;
		}
		@keyframes blink{
		0%{opacity: 0;}
		50%{opacity: .5;}
		100%{opacity: 1;}
		}

      .bg-btn {
   background: #900d0d;
   color:#fff;
   }
   .bg-strip2{
   background: #FF8008;
   background: -webkit-linear-gradient(to right, #FFC837, #FF8008);
   background: linear-gradient(to right, #FFC837, #FF8008); 
   }

   .bg-form {
   background: #200122;
   background: -webkit-linear-gradient(to right, #6f0000, #200122);
   background: linear-gradient(to right, #6f0000, #200122);

   }
   .text-match{
   color:#061161!important;
   }

   .fix-btn {
   position: fixed;
   right: -3rem;
   top: 40%;
   z-index: 99999;
   }

   .rotate {
   transform: rotate(270deg);
   -webkit-transform: rotate(270deg);
   -moz-transform: rotate(270deg);
   -ms-transform: rotate(270deg);
   -o-transform: rotate(270deg);

   }

   header a {
   font-family: var(--Sniglet-font);
   font-size: 0.9em;
   color: #061161;
   }

   a.active {
   color: #fff !important;
   }

   .center {
   margin-left: auto;
   margin-right: auto;


   }

   /* modal Form*/
   .side-contact {
   position: fixed;
   right: -320px;
   top: 18%;
   width: 320px;
   box-sizing: border-box;
   padding: 25px 25px;
   display: flex;
   align-items: center;
   transition: 0.5s;
   z-index: 9999999;
   }

   .fbtn {
   position: absolute;
   left: -11.7rem;
   align-items: center;
   transform: rotate(270deg);
   font-family: var(--Rubik);
   font-weight: bold;
   letter-spacing: 1.5px;
   padding:8px;
   }
      

      </style>
        <script src="<?php echo $base_assets_url; ?>js/jquery.min.js"></script>
        <link rel="stylesheet" href="<?php echo $base_assets_url; ?>front/bootstrap-datetimepicker.min.css" />
        <script src="<?php echo $base_assets_url; ?>front/moment.min.js"></script>
        <script src="<?php echo $base_assets_url; ?>front/jquery.min.js"></script>
        <script src="<?php echo $base_assets_url; ?>front/bootstrap-datetimepicker.min.js"></script>
        <?php
        $this->load->view('layout/theme');

        if ($front_setting->is_active_rtl) {
            ?>
            <link href="<?php echo $base_assets_url; ?>rtl/bootstrap-rtl.min.css" rel="stylesheet">
            <link href="<?php echo $base_assets_url; ?>rtl/style-rtl.css" rel="stylesheet">
            <?php
        }
        ?>


        <?php echo $front_setting->google_analytics; ?> 
    </head>
    <body>


        <?php echo $header; ?>

        <?php echo $slider; ?>

        <?php if (isset($featured_image) && $featured_image != "") {
            ?>

            <!--  <div class="background-opacity about-title">
                 <div class="container">
                     <div class="page-title-wrapper"><h2 class="captions">Event</h2>
                         <ol class="breadcrumb">
                             <li><a href="#">Home</a></li>
                             <li class="active"><a href="#">Event</a></li>
                         </ol>
                     </div>
                 </div>
             </div> -->
            <?php
        }
        ?> 

        <div class="container spacet50 spaceb50">
            <div class="row"> 
                <?php
                $page_colomn = "col-md-12";

                if ($page_side_bar) {

                    $page_colomn = "col-md-12 col-sm-12";
                }
                ?>
                <div class="<?php echo $page_colomn; ?>">
                    <?php echo $content; ?> 
                </div>  
                <?php
                if ($page_side_bar) {
                    ?>


                    <?php
                }
                ?>


            </div><!--./row-->
        </div><!--./container-->  
        <?php 
         $n1=rand(0,9);
         $n2=rand(0,9); 
         $answer=$n1+$n2;
         $_SESSION["auto_sum"]=$answer;
         ?>
        <div class="container-fluid">
        <div class="row">
            <div class="side-contact bg-form">
                <!-- Form Opening Button -->
                    <div  onclick="openForm()" class=" fbtn bg-btn   px-4 py-2" >Book Your Appointment</div>
                    <?php echo form_open_multipart('site/app_add') ?>
                  <form action="formhandler.php" method="POST" name="modal_form">
                    <div class="row">
                        <div class="col-md-12 text-center py-2">
                            <h5 style="color:#fff;">Fill This Form For Appointment Request</h5>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="hidden" name="patient_id" id="patientid" class="form-control">
                                <input id="form_name" type="text" name="patient_name" class="form-control" placeholder="Patient Name *" required="required" data-error="Name is required.">
                            </div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input id="form_name" type="number" name="mobileno" class="form-control" placeholder="Mobile No *" required="required" data-error="Firstname is required.">
                                   
                                </div>
                            </div>
                            <div class="col-md-12"><?php $genderList = $this->customlib->getGender();?>
                                <div class="form-group">
                                <select class="form-control" id="gender" name="gender">
                                    <option value="<?php echo set_value('gender'); ?>"><?php echo $this->lang->line('select'); ?></option>
                                    <?php
                                        foreach ($genderList as $key => $value) {
                                            ?>
                                    <option value="<?php echo $key; ?>" <?php if (set_value('gender') == $key) echo "selected"; ?>><?php echo $value; ?></option>
                                    <?php
                                        }
                                        ?>
                                </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input id="form_email" type="email" name="email" class="form-control" placeholder="Email *" required="required" data-error="Valid email is required.">
                                    <input id="form_status" type="text" name="appointment_status" class="form-control" value="pending" style="display:none;">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                <?php $doctors = $this->staff_model->getStaffbyrole(3);?>
                                <select class="form-control" name='doctor'>
                                    <option value="<?php echo set_value('doctor'); ?>"><?php echo $this->lang->line('select') ?></option>
                                    <?php foreach ($doctors as $dkey => $dvalue) {
                                        ?>
                                    <option value="<?php echo $dvalue["id"]; ?>" <?php
                                        if ($doctor_select == $dvalue['id']) {
                                            echo 'selected';
                                        }
                                        ?>><?php echo $dvalue["name"] . " " . $dvalue["surname"] ?></option>
                                    <?php } ?>
                                </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input id="form_date" type="date" name="date" class="form-control" placeholder="Appointment Date*" required="required">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea id="form_message" name="message" class="form-control" placeholder="Message for us..." rows="3" required="required" data-error="Please, leave us a message."></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control bg-dark text-center"  id="disabledInput" type="number" value=" <?php echo $n1; ?> + <?php echo $n2; ?> =" disabled> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input  type="number" name="uanswer" class="form-control" placeholder="?" required="required" data-error="Answer is required.">
                                   
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                    <button type="button" onclick="closeForm()" class="btn-primary rounded px-4 py-2">Cancel</button>
                                    <input type="submit" name="submit_modal" id="submit_modal " class="btn-warning rounded  px-3 py-2 float-right text-dark" value="Send Request">
                            </div>
                        </div>
                </form>
            </div>
        </div>
      </div>
        <?php echo $footer; ?>

        <script src="<?php echo $base_assets_url; ?>js/bootstrap.min.js"></script>
        <script src="<?php echo $base_assets_url; ?>js/ss-lightbox.js"></script>
        <script src="<?php echo $base_assets_url; ?>js/custom.js"></script>
        <script type="text/javascript">
    /**
    *******Side-Contact Form*******
    **/
    function openForm() {
        let f = document.querySelector('.side-contact');
        if(f.style.right == "0px" ){
            f.style.right = "-320px";
        }else{
            f.style.right = "0px";
        }
    }

    function closeForm() {
        document.querySelector('.side-contact').style.right = "-320px";
    }
   </script>
   <?php  
    if(!empty($this->session->userdata('success'))) 
    {
        echo "<script>
                alert('Appointment Request Submitted Successfull!')
                </script>";
        $this->session->unset_userdata('success');
    }
    ?>
    <?php  
        if(!empty($this->session->userdata('error'))) 
        {
            echo "<script>
                    alert('Please Check Captcha')
                    </script>";
                    $this->session->unset_userdata('error');
        }
    ?>
    </body>
</html>