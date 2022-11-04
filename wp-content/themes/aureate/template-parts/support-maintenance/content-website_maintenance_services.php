<?php
if (!empty($args)) :
    $background_color = isset($args['s1_sm_select_background_color']) ? $args['s1_sm_select_background_color'] : '';
    $servicesLayout = isset($args['s1_sm_layout']) ? $args['s1_sm_layout'] : '';
    $subTitle = isset($args['s1_sm_sub_title']) ? $args['s1_sm_sub_title'] : '';
    $title = isset($args['s1_sm_title']) ? $args['s1_sm_title'] : '';
    $Desc = isset($args['s1_sm_description']) ? $args['s1_sm_description'] : '';
    $maintenance_services_list = isset($args['s1_sm_maintenance_services_list']) ? $args['s1_sm_maintenance_services_list'] : array();

    $backColor = 'bg-white';
    if (!empty($background_color)) {
        if ($background_color == 'light') {
            $backColor = "bg-light";
        } elseif ($background_color == 'dark') {
            $backColor = "bg-dark";
        } else {
            $backColor = "bg-white";
        }
    }

    $col_3 = 'col-md-6';
    if (!empty($servicesLayout)) {
        if ($servicesLayout == 'servicethree') {
            $col_3 = "col-md-4";
        } elseif ($servicesLayout == 'servicefour') {
            $col_3 = "col-md-3";
        } else {
            $col_3 = "col-md-6";
        }
    } ?>
    <!-- Shopify Support Services Section -->
    <section class="shopify-support-section py-40 py-md-60 py-xl-100 <?php echo $backColor; ?>">
        <div class="container">
            <?php
            if (!empty($subTitle) || !empty($title) || !empty($Desc)) : ?>
                <?php if (!empty($subTitle)) ?>
                <span class="section-sub-heading" data-aos="fade-up">
                    <?php echo $subTitle; ?>
                </span>
            <?php endif; ?>

            <?php if (!empty($title)) : ?>
                <h2 class="section-heading" data-aos="fade-up">
                    <?php echo $title; ?>
                </h2>
            <?php endif; ?>

            <?php if (!empty($Desc)) : ?>
                <div class="desc link-description" data-aos="fade-up">
                    <?php echo $Desc; ?>
                </div>
            <?php endif; ?>
        <?php endif; ?>
        <?php if (!empty($maintenance_services_list) || !empty($servicesLayout)) :
            $dir_path = get_template_directory();
            $dir_url = get_template_directory_uri();
            $iconPlaceHolderImage = wp_get_attachment_image(get_field('theme_placeholder_image', 'option'), array(100, 70));
        ?>
            <div class="square-platform-row row shopify-support-serice-row <?php echo $servicesLayout; ?>">
                <?php
                foreach ($maintenance_services_list as $key => $web_service_list) :
                    $size = 'full';
                    $iconImage = isset($web_service_list['s1_sm_web_main_icon']) ? $web_service_list['s1_sm_web_main_icon'] : '';
                    $titles = isset($web_service_list['s1_sm_web_main_title']) ? $web_service_list['s1_sm_web_main_title'] : '';
                    $desc = isset($web_service_list['s1_sm_web_main_description']) ? $web_service_list['s1_sm_web_main_description'] : '';
                    $tagLine = isset($web_service_list['s1_sm_web_main_tagline']) ? $web_service_list['s1_sm_web_main_tagline'] : '';
                    $placeHolderImage = wp_get_attachment_image(get_field('theme_placeholder_image', 'option'), array(62, 62)); ?>
                    <div class="<?php echo $col_3; ?> shopify-support-service-col" data-aos="fade-right">
                        <div class="square-platform-box p-4 h-100">
                            <div class="square-platform-box-wrap p-md-1">
                                <?php if (!empty($iconImage) || !empty($titles) || !empty($desc) || !empty($tagLine)) : ?>
                                    <div class="clear">
                                        <?php
                                        if (!empty($iconImage)) {
                                            $svg_path = $dir_path . '/assets/icons/' . $iconImage . '.svg';
                                            if (file_exists($svg_path)) {
                                                $svg = $dir_url . '/assets/icons/' . $iconImage . '.svg';
                                                if (!empty($svg)) {   ?>
                                                    <div class="square-platform-box-icon  mb-3 mb-md-4 pb-md-2 line-height-0">
                                                        <img src="<?php echo $svg; ?>" title="<?php echo $titles; ?>" alt="<?php echo $titles; ?>" width="64" height="64" loading="lazy"/>
                                                    </div>
                                                <?php
                                                }
                                            } else {   ?>
                                                <div class="square-platform-box-icon  mb-3 mb-md-4 pb-md-2 line-height-0">
                                                    <?php echo $iconPlaceHolderImage; ?>
                                                </div>
                                            <?php
                                            }
                                        } else {   ?>
                                            <div class="square-platform-box-icon  mb-3 mb-md-4 pb-md-2 line-height-0">
                                                <?php echo $iconPlaceHolderImage; ?>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                        <?php if (!empty($titles)) : ?>
                                            <h3 class="font-16 font-md-18 font-weight-medium text-primary mb-2 pb-md-1">
                                                <?php echo $titles; ?>
                                            </h3>
                                        <?php endif; ?>

                                        <?php if (!empty($desc)) : ?>
                                            <p class="link-description font-14 text-body">
                                                <?php echo $desc; ?>
                                            </p>
                                        <?php endif; ?>
                                    </div>
                                    <?php if (!empty($tagLine)) : ?>
                                        <div class="square-platform-arrow d-flex align-items-center mt-4 pt-0 pt-md-3">
                                            <span class="font-md-14 font-weight-medium text-primary pl-1 d-inline-block"><?php echo $tagLine; ?></span>
                                        </div>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>