<?php
//print_r("Hello");
if ($page_form) {
    if (!empty($form)) {
        //build start form

        if (validation_errors() != false) {
?>
            <div class="col-md-12 alert alert-danger">
                <?php echo validation_errors(); ?>
            </div>
        <?php
        }
        if ($this->session->flashdata('msg')) {
        ?>
            <div class='alert alert-success'>
                <?php echo $this->session->flashdata('msg'); ?>

            </div>
    <?php
        }
        $form_content = $this->form_builder->open_form(array('action' => '', 'id' => 'open'));
        $defaults_object_or_array_from_db = NULL;
        $form_content .= "<input type='hidden' value='$form_name' name='form_name'/>";
        $form_content .= $this->form_builder->build_form_horizontal($form, $defaults_object_or_array_from_db);
        $form_content .= $this->form_builder->close_form();
        //build end form
        $replace_frm = '[form-builder:' . $form_name . ']';
        $replace_to = $form_content;
        echo '<section class="inner-header divider parallax layer-overlay overlay-white-8" data-bg-img="' . $page['feature_image'] . '">
                <div class="container pt-60 pb-60">
                    <!-- Section Content -->
                    <div class="section-content">
                        <div class="row">
                        <div class="col-md-12 text-center">
                            <h2 class="title">' . $page['slug'] . '</h2>
                            <ol class="breadcrumb text-center text-black mt-10">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">' . $page['slug'] . '</a></li>
                            <li class="active text-theme-colored">' . $page['slug'] . '</li>
                            </ol>
                        </div>
                        </div>
                    </div>
                </div>
             </section>';
        echo $description = str_replace($replace_frm, $replace_to, $page['description']);
    }
} else {
    $fimg = $page['feature_image'];
    ?>

    <div class="main-content">
        <!--Start breadcrumb area-->
        <section class="inner-header divider parallax layer-overlay overlay-white-8" data-bg-img="<?php echo $page['feature_image'] ?>">
            <div class="container pt-60 pb-60">
                <!-- Section Content -->
                <div class="section-content">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h2 class="title"><?php echo $page['title'] ?></h2>
                            <ol class="breadcrumb text-center text-black mt-10">
                                <li><a href="#">Home</a></li>
                                <li class="active text-theme-colored"><?php echo $page['title'] ?></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End breadcrumb area-->
        <div class="container">
            <?php echo $page['description']; ?>
        </div>
    </div>
<?php
}
?>
<!-- <h2 class="courses-head text-center"><?php echo ucfirst($page_content_type); ?></h2> -->
<input type="hidden" name="page_content_type" id="page_content_type" value="<?php echo $page_content_type; ?>">
<div class="post-list" id="postList">
    <?php
    if (!empty($page['category_content'])) {
    ?>
        <?php
        foreach ($page['category_content'] as $page_content_key => $page_content_value) {
        ?>


            <?php
            if ($page_content_key == "events") {

                $numOfCols = 1;
                $rowCount = 0;
                $bootstrapColWidth = 12 / $numOfCols;
            ?>
                <div class="row">
                    <?php
                    if (!empty($page['category_content'][$page_content_key])) {
                        foreach ($page['category_content'][$page_content_key] as $key => $value) {
                    ?>
                            <?php
                            if ($value['feature_image'] == "") {
                                $feature_image = base_url('uploads/gallery/gallery_default.png');
                            } else {
                                $feature_image = $value['feature_image'];
                            }
                            ?>
                            <div class="col-md-<?php echo $bootstrapColWidth; ?> col-sm-<?php echo $bootstrapColWidth; ?>">
                                <div class="latestevent">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="eventsdate"><?php echo date('d', strtotime($value['event_start'])); ?> <span><?php echo date('M', strtotime($value['event_start'])); ?></span></div>
                                        </div>
                                        <div class="col-md-7">
                                            <h4><?php echo $value['title']; ?></h4>
                                            <p><?php echo strip_tags(substr($value['description'], 0, 85)); ?></p>
                                            <a class="view-all-btn" href="<?php echo site_url($value['url']); ?>"><?php echo $this->lang->line('view') . " " . $this->lang->line('details') ?></a>
                                        </div>
                                        <div class="col-md-3">
                                            <img class="img-responsive" src="<?php echo $feature_image; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>


                    <?php
                            $rowCount++;
                            if ($rowCount % $numOfCols == 0)
                                echo '</div><div class="row">';
                        }
                    }
                    ?>
                </div>

                <?php
            } elseif ($page_content_key == "notice") {
                if (!empty($page['category_content'][$page_content_key])) {
                    foreach ($page['category_content'][$page_content_key] as $key => $value) {
                ?>
                        <div class="alert-message alert-message-default">
                            <h4><a href="<?php echo site_url($value['url']); ?>"><?php echo $value['title']; ?></a></h4>
                            <p><?php echo substr($value['description'], 0, 85) . ".."; ?></p>
                        </div>

                <?php
                    }
                }
            } elseif ($page_content_key == "gallery") {
                $numOfCols = 3;
                $rowCount = 0;
                $bootstrapColWidth = 12 / $numOfCols;
                ?>
                <div class="row">
                    <?php
                    foreach ($page['category_content'][$page_content_key] as $key => $value) {
                    ?>
                        <div class="col-md-<?php echo $bootstrapColWidth; ?> col-sm-<?php echo $bootstrapColWidth; ?>">
                            <div class="eventbox">
                                <a href="<?php echo site_url($value['url']); ?>">
                                    <?php
                                    if ($value['feature_image'] == "") {
                                        $feature_image = base_url('uploads/gallery/gallery_default.png');
                                    } else {
                                        $feature_image = $value['feature_image'];
                                    }
                                    ?>
                                    <img src="<?php echo $feature_image; ?>" alt="" title="">
                                    <div class="around20">
                                        <h3><?php echo $value['title']; ?></h3>

                                        <?php
                                        echo substr(strip_tags(html_entity_decode($value['description'])), 0, 50);
                                        ?>
                                    </div>
                                    <!--./around20-->
                                </a>
                            </div>
                            <!--./eventbox-->
                        </div>
                    <?php
                        $rowCount++;
                        if ($rowCount % $numOfCols == 0)
                            echo '</div><div class="row">';
                    }
                    ?>
                </div>

    <?php
            } else {
            }
        }
        echo $this->ajax_pagination->create_links(); //pagination link
    }
    ?>
</div>

<!-- Contact Form Validation-->
<script>
    $("#contact_form").validate({
        submitHandler: function(form) {
            var form_btn = $(form).find('button[type="submit"]');
            var form_result_div = '#form-result';
            $(form_result_div).remove();
            form_btn.before('<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>');
            var form_btn_old_msg = form_btn.html();
            form_btn.html(form_btn.prop('disabled', true).data("loading-text"));
            $(form).ajaxSubmit({
                dataType: 'json',
                success: function(data) {
                    if (data.status === 'true') {
                        $(form).find('.form-control').val('');
                    }
                    form_btn.prop('disabled', false).html(form_btn_old_msg);
                    $(form_result_div).html(data.message).fadeIn('slow');
                    setTimeout(function() {
                        $(form_result_div).fadeOut('slow')
                    }, 6000);
                }
            });
        }
    });
</script>

<script>
    function searchFilter(page_num) {
        page_num = page_num ? page_num : 0;
        var page_content_type = $('#page_content_type').val();

        $.ajax({
            type: 'POST',
            url: '<?php echo base_url(); ?>frontend/welcome/ajaxPaginationData/' + page_num,
            data: 'page=' + page_num + '&page_content_type=' + page_content_type,
            beforeSend: function() {
                $('.loading').show();
            },
            success: function(html) {
                $('#postList').html(html);
                $('.loading').fadeOut("slow");
            }
        });
    }
</script>