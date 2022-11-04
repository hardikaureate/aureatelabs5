<?php
if (!empty($args)) :

    $title_with_number = isset($args['s21_title_with_number']) ? $args['s21_title_with_number'] : '';
    $background_color = isset($args['s21_select_background_color']) ? $args['s21_select_background_color'] : '';
    $title = isset($args['s21_title']) ? $args['s21_title'] : '';
    $Desc = isset($args['s21_Description']) ? $args['s21_Description'] : '';
    $hiring_process = isset($args['s21_hiring_process']) ? $args['s21_hiring_process'] : array();
    $CTA_link = isset($args['s21_hiring_process_cta']) ? $args['s21_hiring_process_cta'] : '';

    $backColor = 'bg-white';
    if (!empty($background_color)) {
        if ($background_color == 'light') {
            $backColor = "bg-light";
        } elseif ($background_color == 'dark') {
            $backColor = "bg-dark";
        } else {
            $backColor = "bg-white";
        }
    } ?>

    <!-- Hire Our Magento Web Development Company Section -->
    <section class="hire-magento-company-section py-40 py-md-60 py-xl-100 <?php echo $backColor; ?>">
        <div class="container">
            <?php
            if (!empty($subTDescitle) || !empty($title) || !empty($Desc)) : ?>
                <?php if (!empty($title)) : ?>
                    <h2 class="section-heading text-white">
                        <?php echo $title; ?>
                    </h2>
                <?php endif; ?>

                <?php if (!empty($Desc)) : ?>
                    <p class="section-description link-description">
                        <?php echo $Desc; ?>
                    </p>
                <?php endif; ?>
            <?php endif; ?>
            <?php if (!empty($hiring_process)) : ?>
                <div class="row pt-2 pt-md-3">
                    <?php
                    $count = 1;
                    $dir_path = get_template_directory();
                    $dir_url = get_template_directory_uri();
                    $iconPlaceHolderImage = wp_get_attachment_image(get_field('theme_placeholder_image', 'option'), array(62, 62));
                    foreach ($hiring_process as $key => $hiring_process_list) :
                        $size = 'full';

                        $iconImage = isset($hiring_process_list['s21_hiring_process_icon']) ? $hiring_process_list['s21_hiring_process_icon'] : '';
                        $titles = isset($hiring_process_list['s21_hiring_process_title']) ? $hiring_process_list['s21_hiring_process_title'] : '';
                        $desc = isset($hiring_process_list['s21_hiring_process_description']) ? $hiring_process_list['s21_hiring_process_description'] : ''; ?>

                        <div class="col-md-3" data-aos="fade-up">
                            <?php if (!empty($iconImage) || !empty($titles) || !empty($desc)) : ?>
                                <div class="single-hire-block">
                                    <?php
                                    if (!empty($iconImage)) {
                                        $svg_path = $dir_path . '/assets/icons/' . $iconImage . '.svg';
                                        if (file_exists($svg_path)) {
                                            $svg = $dir_url . '/assets/icons/' . $iconImage . '.svg';
                                            if (!empty($svg)) {   ?>
                                                <div class="pb-12 pb-md-24">
                                                    <img src="<?php echo $svg; ?>" title="<?php echo $titles; ?>" alt="<?php echo $titles; ?>" width="60" height="60" loading="lazy"/>
                                                </div>
                                            <?php
                                            }
                                        } else {   ?> 
                                            <div class="pb-12 pb-md-24">
                                                <?php echo $iconPlaceHolderImage; ?>
                                            </div>
                                        <?php
                                        }
                                    } else {   ?>
                                        <div class="pb-12 pb-md-24">
                                            <?php echo $iconPlaceHolderImage; ?>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    <?php if (!empty($titles)) : ?>
                                        <h3 class="d-flex pb-30 pt-md-24 pt-12 font-16 pb-md-12 font-md-18 text-white font-weight-normal">
                                            <?php if ($title_with_number) { ?>
                                                <span class="pr-2">
                                                    <?php echo str_pad($count, 2, '0', STR_PAD_LEFT) . '.'; 
                                                    ?>
                                                    <?php //echo $count . '.'; ?>
                                                </span>
                                            <?php } ?>
                                            <span class="">
                                                <?php echo $titles; ?>
                                            </span>
                                        </h3>
                                    <?php endif; ?>

                                    <?php if (!empty($desc)) : ?>
                                        <p class="single-hire-desc font-14 text-white link-description">
                                            <?php //echo $desc;
                                            echo al_encode_emails( $desc ); 
                                             ?>
                                        </p>
                                    <?php endif; ?>
                                </div>
                            <?php $count++;
                            endif; ?>
                        </div>

                    <?php endforeach; ?>
                <?php endif; ?>
                </div>
                <?php
                if (!empty($CTA_link)) {
                    $best_package_link = isset($CTA_link['url']) ? $CTA_link['url'] : '';
                    $hire_package_title = isset($CTA_link['title']) ? $CTA_link['title'] : '';
                    $hire_package_target = !empty($CTA_link['target']) ? 'target="_blank"' : '';

                    $best_package_link = filter_var($best_package_link, FILTER_SANITIZE_URL);
                    if (filter_var($best_package_link, FILTER_VALIDATE_URL) !== false) 
                    {
                        $url = esc_url($best_package_link);
                    }
                    else
                    {
                        $url = '#knowmore';
                        $hire_package_target = '';
                    }

                    if (!empty($url) && !empty($hire_package_title)) {   ?>
                        <div class="text-center pt-25 pt-md-40">
                            <a class="arrow-btn" href="<?php echo $url; ?>" <?php echo $hire_package_target; ?> title="<?php echo $hire_package_title; ?>">
                                <span><?php echo $hire_package_title; ?></span>
                            </a>
                        </div>
                    <?php } ?>
                <?php } ?>

        </div>
    </section>
<?php endif; ?>