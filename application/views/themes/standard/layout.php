<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>

    <!-- Meta Tags -->
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta name="description" content="MediPress - Health & Medical HTML Template" />
    <meta name="keywords" content="keyword1,keyword2,keyword3,keyword4,keyword5" />
    <meta name="author" content="ThemeMascot" />

    <!-- Page Title -->
    <title><?php echo $school_setting->name; ?></title>

    <!--<link href="<?php echo base_url(); ?>backend/images/s-favican.png" rel="shortcut icon" type="image/x-icon">-->
  	<link href="<?php echo base_url($front_setting->fav_icon); ?>" rel="shortcut icon" type="image/png">

    <!-- Stylesheet -->
    <link href="<?php echo $base_assets_url; ?>css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo $base_assets_url; ?>css/jquery-ui.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo $base_assets_url; ?>css/animate.css" rel="stylesheet" type="text/css">
    <link href="<?php echo $base_assets_url; ?>css/css-plugin-collections.css" rel="stylesheet" />
    <!-- CSS | menuzord megamenu skins -->
    <link href="<?php echo $base_assets_url; ?>css/menuzord-megamenu.css" rel="stylesheet" />
    <link id="menuzord-menu-skins" href="<?php echo $base_assets_url; ?>css/menuzord-skins/menuzord-boxed.css" rel="stylesheet" />
    <!-- CSS | Main style file -->
    <link href="<?php echo $base_assets_url; ?>css/style-main.css" rel="stylesheet" type="text/css">
    <!-- CSS | Preloader Styles -->
    <link href="<?php echo $base_assets_url; ?>css/preloader.css" rel="stylesheet" type="text/css">
    <!-- CSS | Custom Margin Padding Collection -->
    <link href="<?php echo $base_assets_url; ?>css/custom-bootstrap-margin-padding.css" rel="stylesheet" type="text/css">
    <!-- CSS | Responsive media queries -->
    <link href="<?php echo $base_assets_url; ?>css/responsive.css" rel="stylesheet" type="text/css">
    <!-- CSS | Style css. This is the file where you can place your own custom css code. Just uncomment it and use it. -->
    <!-- <link href="css/style.css" rel="stylesheet" type="text/css"> -->

    <!-- CSS | Theme Color -->
    <link href="<?php echo $base_assets_url; ?>css/colors/theme-skin-color-set2.css" rel="stylesheet" type="text/css">

    <!-- external javascripts -->
    <script src="<?php echo $base_assets_url; ?>js/jquery-2.2.4.min.js"></script>
    <script src="<?php echo $base_assets_url; ?>js/jquery-ui.min.js"></script>
    <script src="<?php echo $base_assets_url; ?>js/bootstrap.min.js"></script>
    <!-- JS | jquery plugin collection for this theme -->
    <script src="<?php echo $base_assets_url; ?>js/jquery-plugin-collection.js"></script>

    <style>
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


        .bg-btn {
            background: #005b88;
            color: #fff;
        }

        .bg-form {
            background: #005b88;
            background: -webkit-linear-gradient(to right, #005b88, #337ab7);
            background: linear-gradient(to right, #005b88, #337ab7);

        }


        /* modal Form*/
        .side-contact {
            position: fixed;
            right: -320px;
            top: 17%;
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
            left: -14.6rem;
            align-items: center;
            transform: rotate(270deg);
            font-family:'Open Sans', sans-serif;
            font-weight: bold;
            letter-spacing: 1.5px;
            font-size:15px;
            padding:  15px ;
            
        }
    </style>

</head>

<body class="">
    <div id="wrapper">
        <!-- preloader -->
        <!-- <div id="preloader">
            <div id="spinner">
                <div class="preloader-dot-loading">
                    <div class="cssload-loading"><i></i><i></i><i></i><i></i></div>
                </div>
            </div>
            <div id="disable-preloader" class="btn btn-default btn-sm">Disable Preloader</div>
        </div>  -->
        <?php echo $header; ?>





        <!-- Start main-content -->
        <div class="main-content">
            <!-- Section: home -->
            <?php echo $slider; ?>
            <!-- Section: home-box -->
            <?php echo $content; ?>
        </div>
        <!-- end main-content -->

        <?php
        $n1 = rand(0, 9);
        $n2 = rand(0, 9);
        $answer = $n1 + $n2;
        $_SESSION["auto_sum"] = $answer;
        ?>
        <div class="container-fluid">
            <div class="row">
                <div class="side-contact bg-form">
                    <!-- Form Opening Button -->
                    <div onclick="openForm()" class=" fbtn bg-btn   px-4 py-2">Book Your Appointment</div>
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
                            <div class="col-md-12"><?php $genderList = $this->customlib->getGender(); ?>
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
                                    <?php $doctors = $this->staff_model->getStaffbyrole(3); ?>
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
                                    <input type="text" class="form-control bg-dark text-center" id="disabledInput" type="number" value=" <?php echo $n1; ?> + <?php echo $n2; ?> =" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="number" name="uanswer" class="form-control" placeholder="?" required="required" data-error="Answer is required.">

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
        <?php echo $footer;?>
       
    </div>
    <!-- end wrapper -->

    <!-- Footer Scripts -->
    <!-- JS | Custom script for all pages -->
    <script src="<?php echo $base_assets_url; ?>js/custom.js"></script>
    <script type="text/javascript">
        /**
         *******Side-Contact Form*******
         **/
        function openForm() {
            let f = document.querySelector('.side-contact');
            if (f.style.right == "0px") {
                f.style.right = "-320px";
            } else {
                f.style.right = "0px";
            }
        }

        function closeForm() {
            document.querySelector('.side-contact').style.right = "-320px";
        }
    </script>

</body>

</html>