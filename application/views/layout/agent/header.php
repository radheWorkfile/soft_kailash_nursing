<!DOCTYPE html>
<html <?php echo $this->customlib->getRTL(); ?>>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $this->lang->line('agent')." Panel"; ?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="theme-color" content="#424242" />
    <link href="<?php echo base_url(); ?>backend/images/s-favican.png" rel="shortcut icon" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo base_url(); ?>backend/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>backend/dist/css/style-main.css">

    <?php
        $this->load->view('layout/theme');
    ?>
    <?php
    if ($this->customlib->getRTL() != "") {
    ?>
        <!-- Bootstrap 3.3.5 RTL -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>backend/rtl/bootstrap-rtl/css/bootstrap-rtl.min.css" />
        <!-- Theme RTL style -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>backend/rtl/dist/css/AdminLTE-rtl.min.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>backend/rtl/dist/css/ss-rtlmain.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>backend/rtl/dist/css/skins/_all-skins-rtl.min.css" />

    <?php
    } else {
    }
    ?>
    <link rel="stylesheet" href="<?php echo base_url(); ?>backend/dist/css/all.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>backend/dist/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>backend/dist/css/ionicons.min.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>backend/plugins/iCheck/flat/blue.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>backend/plugins/morris/morris.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>backend/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>backend/plugins/datepicker/datepicker3.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>backend/plugins/daterangepicker/daterangepicker-bs3.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>backend/sweet-alert/sweetalert2.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>backend/dist/css/custom_style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>backend/datepicker/css/bootstrap-datetimepicker.css">
    <!--file dropify-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>backend/dist/css/dropify.min.css">
    <!--file nprogress-->
    <link href="<?php echo base_url(); ?>backend/dist/css/nprogress.css" rel="stylesheet">
    <!--print table-->
    <link href="<?php echo base_url(); ?>backend/dist/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>backend/dist/datatables/css/buttons.dataTables.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>backend/dist/datatables/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <!--print table mobile support-->
    <link href="<?php echo base_url(); ?>backend/dist/datatables/css/responsive.dataTables.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>backend/dist/datatables/css/rowReorder.dataTables.min.css" rel="stylesheet">
    <script src="<?php echo base_url(); ?>backend/custom/jquery.min.js"></script>

    <script src="<?php echo base_url(); ?>backend/datepicker/date.js"></script>
    <script src="<?php echo base_url(); ?>backend/dist/js/jquery-ui.min.js"></script>
    <script src="<?php echo base_url(); ?>backend/js/school-custom.js"></script>
    <script src="<?php echo base_url(); ?>backend/dist/js/moment.min.js"></script>
    <!-- fullCalendar -->
    <link rel="stylesheet" href="<?php echo base_url() ?>backend/fullcalendar/dist/fullcalendar.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>backend/fullcalendar/dist/fullcalendar.print.min.css" media="print">

    <script type="text/javascript">
        var baseurl = "<?php echo base_url(); ?>";
        var chk_validate = "";
    </script>

</head>

<body class="hold-transition skin-blue fixed sidebar-mini ">
    <script type="text/javascript">
        function collapseSidebar() {

            if (Boolean(sessionStorage.getItem('sidebar-toggle-collapsed'))) {
                sessionStorage.setItem('sidebar-toggle-collapsed', '');
            } else {
                sessionStorage.setItem('sidebar-toggle-collapsed', '1');
            }

        }

        function checksidebar() {
            if (Boolean(sessionStorage.getItem('sidebar-toggle-collapsed'))) {
                var body = document.getElementsByTagName('body')[0];
                body.className = body.className + ' sidebar-collapse';
            }
        }
        checksidebar();
    </script>
    <div class="wrapper">
        <header class="main-header" id="alert">
            <?php $url = 'agent/dashboard'; ?>
            <?php
            $logoresult = $this->customlib->getLogoImage();
            if (!empty($logoresult["image"])) {
                $logo_image = base_url() . "uploads/hospital_content/logo/" . $logoresult["image"];
            } else {
                $logo_image = base_url() . "uploads/hospital_content/logo/s_logo.png";
            }
            if (!empty($logoresult["mini_logo"])) {
                $mini_logo = base_url() . "uploads/hospital_content/logo/" . $logoresult["mini_logo"];
            } else {
                $mini_logo = base_url() . "uploads/hospital_content/logo/smalllogo.png";
            }
            ?>

            <a href="<?php echo base_url() . $url; ?>" class="logo">
                <span class="logo-mini"><img width="31" height="19" src="<?php echo $mini_logo; ?>" alt="<?php echo $this->customlib->getAppName() ?>" /></span>
                <span class="logo-lg"><img src="<?php echo $logo_image; ?>" alt="<?php echo $this->customlib->getAppName() ?>" /></span>
            </a>
            <nav class="navbar navbar-static-top" role="navigation">
                <a href="#" class="sidebar-toggle" onclick="collapseSidebar()" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="col-md-5 col-sm-3 col-xs-5">
                    <span href="#" class="sidebar-session">
                        <?php echo $this->setting_model->getCurrentSchoolName(); ?>
                    </span>
                </div>
                <div class="col-md-7 col-sm-9 col-xs-7">
                    <div class="pull-right">
                        <div class="navbar-custom-menu">
                            <ul class="nav navbar-nav headertopmenu">
                                <!-- <li class="cal15"><a href="<?php echo base_url() . "patient/systemnotifications" ?>"><i class="fa fa-bell-o"></i>
                                        <?php $systemnotifications = $this->notification_model->getPatientUnreadNotification();
                                        ?>
                                        <span class="label label-warning"><?php echo sizeof($systemnotifications); ?></span></a></li>
                                <li class="cal15"><a href="<?php echo base_url() ?>user/calendar/"><i class="fa fa fa-calendar"></i></a></li> -->


                                <?php
                                $image = $this->agent_data["image"];
                                if (!empty($image)) {

                                    $file = "uploads/agent_images/" . $image;
                                } else {

                                    $file = "uploads/agent_images/no_image.png";
                                }
                                ?>
                                <li class="dropdown user-menu">
                                    <a class="dropdown-toggle" style="padding: 15px 13px;" data-toggle="dropdown" href="#" aria-expanded="false">
                                        <img src="<?php echo base_url() . $file; ?>" class="topuser-image" alt="User Image">
                                    </a>
                                    <ul class="dropdown-menu dropdown-user menuboxshadow">

                                        <li>
                                            <div class="sstopuser">
                                                <div class="ssuserleft">
                                                    <img src="<?php echo base_url() . $file; ?>" alt="User Image">
                                                </div>

                                                <div class="sstopuser-test">
                                                    <h5 style="text-transform: capitalize;"><?php echo $this->agent_data["name"]."(".$this->agent_data["agent_id"].")"; ?></h5>
                                                    <h6><?php echo $this->lang->line('agent'); ?></h6>
                                                    <!--p>demo</p-->
                                                </div>
                                                <div class="divider"></div>
                                                <div class="sspass">
                                                    <a class="" href="<?php echo base_url(); ?>agent/agent/edit_profile">
                                                        <i class="fas fa-user-edit"></i> 
                                                        <?php echo $this->lang->line('edit')." ".$this->lang->line('profile'); ?>
                                                    </a> 
                                                    <a class="pull-right" href="<?php echo base_url(); ?>site/logout">
                                                        <i class="fa fa-sign-out fa-fw"></i> 
                                                        <?php echo $this->lang->line('logout'); ?>
                                                    </a>
                                                </div>
                                            </div>
                                            <!--./sstopuser-->
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
        <aside class="main-sidebar" id="alert2">
            <section class="sidebar" id="sibe-box">
                <ul class="sidebar-menu verttop">
                    <?php if ($_SESSION['agent'] == true) { ?>
                        <li class="treeview">
                            <a href="<?php echo base_url(); ?>agent/agent/appointment">
                                <i class="fas fa-hospital-alt"></i>
                                <span><?php echo $this->lang->line('book_appointment'); ?></span>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="<?php echo base_url(); ?>agent/agent/patient_list">
                                <i class="fas fa-user"></i>
                                <span>Refered <?php echo $this->lang->line('patient'); ?> List</span>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="<?php echo base_url(); ?>agent/agent/commission_list">
                                <i class="fas fa-money-bill-wave"></i>
                                <span><?php echo $this->lang->line('commission')." ".$this->lang->line('details'); ?></span>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </section>
        </aside>