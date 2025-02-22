<style>
    .userlogin{
    background-color: #39f; /* Green */
    border: none;
    color: white !important;
    padding: 15px 30px;
    text-align: center;
    text-decoration: none !important;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    }
    .userlogin:hover{
        box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
    }
</style>
<header>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <a class="logo" href="<?php echo base_url(); ?>"><img src="<?php echo base_url($front_setting->logo); ?>" alt="" style="width:100%"></a>
            </div><!--./col-md-4-->
            <div class="col-md-9">
                <ul class="header-extras">
                    <li><i class="fa fa-envelope-o i-plain"></i><div class="he-text"><?php echo $this->lang->line('email_us'); ?><span><a href="mailto:<?php echo $school_setting->email; ?>"><?php echo $school_setting->email; ?></a></span></div></li>
                    <li><i class="fa fa-phone i-plain"></i><div class="he-text"><?php echo $this->lang->line('call_us'); ?><span><?php echo $school_setting->phone; ?></span></div></li>
                    <li><i class="fa fa-pencil-square-o i-plain"></i>
                        <div class="he-text"><?php echo $this->lang->line('feedback'); ?><span><a href="<?php echo site_url('page/complain') ?>"><?php echo $this->lang->line('complain'); ?></a></span>
                        </div>
                    </li>
                    <li><a href="<?php echo base_url(); ?>site/userlogin" class="userlogin">Login</a></li>
                </ul>
            </div><!--./col-md-8-->
        </div><!--./row-->
    </div><!--./container-->
</header>
<div class="header_menu">
    <div class="container">
        <div class="row">
            <nav class="navbar">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-3">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

                <div class="collapse navbar-collapse" id="navbar-collapse-3">
                    <ul class="nav navbar-nav">
                        <?php
                        foreach ($main_menus as $menu_key => $menu_value) {
                            $submenus = false;
                            $cls_menu_dropdown = "";
                            $menu_selected = "";
                            if ($menu_value['page_slug'] == $active_menu) {
                                $menu_selected = "active";
                            }
                            if (!empty($menu_value['submenus'])) {
                                $submenus = true;
                                $cls_menu_dropdown = "dropdown";
                            }
                            if ($menu_value['menu'] == $active_menu) {
                                $menu_selected = "active";
                            }
                            ?>

                            <li class="<?php echo $menu_selected . " " . $cls_menu_dropdown; ?>" >
                                <?php
                                if (!$submenus) {
                                    $top_new_tab = '';
                                    $url = '#';
                                    if ($menu_value['open_new_tab']) {
                                        $top_new_tab = "target='_blank'";
                                    }
                                    if ($menu_value['ext_url']) {
                                        $url = $menu_value['ext_url_link'];
                                    } else {
                                        $url = site_url($menu_value['page_url']);
                                    }
                                    ?>

                                    <a href="<?php echo $url; ?>" <?php echo $top_new_tab; ?>><?php echo $menu_value['menu']; ?></a>

                                    <?php
                                } else {
                                    $child_new_tab = '';
                                    $url = '#';
                                    ?>
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $menu_value['menu']; ?> <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <?php
                                        foreach ($menu_value['submenus'] as $submenu_key => $submenu_value) {
                                            if ($submenu_value['open_new_tab']) {
                                                $child_new_tab = "target='_blank'";
                                            }
                                            if ($submenu_value['ext_url']) {
                                                $url = $submenu_value['ext_url_link'];
                                            } else {
                                                $url = site_url($submenu_value['page_url']);
                                            }
                                            ?>
                                            <li><a href="<?php echo $url; ?>" <?php echo $child_new_tab; ?> ><?php echo $submenu_value['menu'] ?></a></li>
                                            <?php
                                        }
                                        ?>

                                    </ul>

                                    <?php
                                }
                                ?>


                            </li>
                            <?php
                        }
                        ?>


                    </ul>
                </div><!-- /.navbar-collapse -->
            </nav><!-- /.navbar -->
        </div>
    </div>   
</div> 