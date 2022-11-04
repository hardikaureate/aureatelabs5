<?php
if (!empty($args)) :
    $background_color = isset($args['s8_sm_select_background_color']) ? $args['s8_sm_select_background_color'] : '';
    $custom_class = isset($args['s8_sm_add_custom_class']) ? $args['s8_sm_add_custom_class'] : '';
    $title = isset($args['s8_sm_title']) ? $args['s8_sm_title'] : '';
    $Desc = isset($args['s8_sm_description']) ? $args['s8_sm_description'] : '';
    $mainImage = isset($args['s8_sm_image']) ? $args['s8_sm_image'] : '';
    $posterImage = isset($args['s8_sm_video_poster_image']) ? $args['s8_sm_video_poster_image'] : '';
    $posterVideo = isset($args['s8_sm_video_upload']) ? $args['s8_sm_video_upload'] : '';
    $platformImage = isset($args['s8_sm_platform_image']) ? $args['s8_sm_platform_image'] : '';
    $s8_sm_cta_link = isset($args['s8_sm_cta_link']) ? $args['s8_sm_cta_link'] : '';
    $placeHolderImage = wp_get_attachment_image(get_field('theme_placeholder_image', 'option'), array(62, 62));
    $size = 'full';

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
?>

    <!-- content-common_image_section -->
    <section class="new-images-with-text py-40 py-md-60 py-xl-100 align-items-center <?php echo $backColor; ?> <?php echo $custom_class; ?>">
        <div class="container">
            <div class="row align-items-center">
                <?php if (!empty($mainImage) || !empty($title) || !empty($Desc) || !empty($platformImage)) : ?>
                    <div class="col-md-6" data-aos="fade-up">
                        <?php if (!empty($title)) : ?>
                            <h2 class="section-heading">
                                <?php echo $title; ?>
                            </h2>
                        <?php endif; ?>
                        <?php if (!empty($Desc)) : ?>
                            <div class="mb-4 pb-md-3 left-content-desc link-description">
                                <?php echo $Desc; ?>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($s8_sm_cta_link)) : ?>
                            <?php
                            $CTA_link = isset($s8_sm_cta_link['url']) ? $s8_sm_cta_link['url'] : '';
                            $CTA_title = isset($s8_sm_cta_link['title']) ? $s8_sm_cta_link['title'] : '';
                            $CTA_target = !empty($s8_sm_cta_link['target']) ? 'target="_blank"' : '';
                            if (!empty($CTA_link) && !empty($CTA_title)) {   ?>
                                <div class="left-content-cta">
                                    <a class="arrow-btn" href="<?php echo esc_url($CTA_link); ?>" <?php echo $CTA_target; ?>>
                                        <span><?php echo $CTA_title; ?></span>
                                    </a>
                                </div>
                            <?php
                            }
                            ?>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-6 text-center text-md-right mt-4 pt-2 mt-md-0 pt-md-0" data-aos="fade-up">
                        <?php if (!empty($mainImage)) : ?>
                            <div class="new-images-with-text-image">
                                <?php echo wp_get_attachment_image($mainImage, $size); ?>
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($posterImage) || !empty($posterVideo)) : ?>
                            <?php
                            if (!empty($posterVideo)) {
                                $video  = isset($posterVideo['url']) ? $posterVideo['url'] : '';
                                $mime_type  = isset($posterVideo['mime_type']) ? $posterVideo['mime_type'] : '';
                                if (!empty($video)) {
                                    $video_thumbnail = isset($posterImage) ? $posterImage : array();
                                    $poster_img = '';
                                    if (!empty($video_thumbnail)) {
                                        $img_src  = isset($video_thumbnail['url']) ? $video_thumbnail['url'] : '';
                                        if (!empty($img_src)) {
                                            $poster_img = 'poster="' . esc_url($img_src) . '"';
                                        }
                                    }
                            ?>
                                    <video class="w-100 h-100" autoplay loop="loop" muted <?php echo $poster_img; ?> preload="none">
                                        <source src="<?php echo esc_url($video); ?>" type="<?php echo $mime_type; ?>">
                                    </video>
                            <?php
                                }
                            }
                            ?>
                        <?php endif; ?>

                        <div class="platform-image">
                            <?php if (!empty($platformImage)) : ?>
                                <?php echo wp_get_attachment_image($platformImage, $size); ?>
                            <?php endif; ?>

                            <?php if (have_rows('s8_sm_platform_image_')) : ?>
                                <div class="logo-row d-flex align-items-center">
                                    <?php while (have_rows('s8_sm_platform_image_')) : ?>
                                        <?php the_row(); ?>
                                        <?php $platform_logo =  wp_get_attachment_image(get_sub_field('s8_sm_combine_logos_image_'), 'full'); ?>
                                        <?php if ($platform_logo) : ?>
                                            <div class="logo-col">
                                                <?php echo $platform_logo; ?>
                                            </div>
                                        <?php endif; ?>
                                    <?php endwhile; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>