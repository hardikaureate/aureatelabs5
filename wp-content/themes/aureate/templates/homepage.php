<?php

/**
 * The Custom template for Frontpage
 *
 * Template Name: Homepage
 * 
 * @package Aureatelabs
 * @subpackage Aureatelabs
 * @since 1.0
 * @version 1.0
 */

get_header();
?>

<!-- Hero Banner section -->
<section class="home-hero-banner bg-light">
    <div class="home-hero-video">
        <?php
        $banner_video = get_field('banner_video');
        $hero_section_poster = get_field('hero_section_poster');
        if (!empty($banner_video)) {
            $video  = isset($banner_video['url']) ? $banner_video['url'] : '';
            $mime_type  = isset($banner_video['mime_type']) ? $banner_video['mime_type'] : '';
            if (!empty($video)) {
                $video_thumbnail = isset($hero_section_poster) ? $hero_section_poster : array();
                $poster_img = '';
                if (!empty($video_thumbnail)) {
                    $img_src  = isset($video_thumbnail['url']) ? $video_thumbnail['url'] : '';
                    if (!empty($img_src)) {
                        $poster_img = 'poster="' . esc_url($img_src) . '"';
                    }
                }
        ?>
                <video class="w-100 h-100" id="videoelement" loop playsinline="true" webkit-playsinline="true" <?php echo $poster_img; ?>>
                    <source src="<?php echo esc_url($video); ?>" type="<?php echo $mime_type; ?>">
                </video>
        <?php
            }
        }
        ?>
    </div>
    <div class="home-hero-content">
        <div class="container">
            <div class="px-4 px-md-0">
                <div class="row row-10">
                    <h1 class="col-md-11 mb-4 mb-md-5 pb-1 pb-md-2 text-white">
                        <span class="d-md-flex align-items-center text-white">
                            <?php echo wp_kses_post(get_field('s1_title')); ?>
                            <span class="scrolling-words-box">
                                <span class="scrolling-words-box-wrap text-secondary">
                                    <?php if (have_rows('s1_slider')) : ?>
                                        <?php while (have_rows('s1_slider')) : ?>
                                            <?php the_row(); ?>
                                            <span class="d-flex align-items-center">
                                                <?php echo wp_kses_post(get_sub_field('s1_slide_text')); ?>
                                            </span>

                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                </span>
                            </span>
                        </span>
                        <?php echo wp_kses_post(get_field('s1_title_second_part')); ?>
                    </h1>
                    <div class="col-md-8 col-xl-7 pr-md-5 pt-xl-1 font-14 font-md-24 text-white mb-5 mb-md-4"><?php echo wp_kses_post(get_field('s1_description')); ?></div>
                </div>
            </div>
        </div>
    </div>
    <div class="home-hero-rotate">
        <?php
        $rotationLink = get_field('s1_cta_link');
        if (!empty($rotationLink)) :
            $CTA_link = isset($rotationLink['url']) ? $rotationLink['url'] : '';
            $CTA_title = isset($rotationLink['title']) ? $rotationLink['title'] : '';
            $CTA_target = !empty($rotationLink['target']) ? 'target="_blank"' : '';
            if (!empty($CTA_link) && !empty($CTA_title)) {   ?>
                <a class="d-flex align-items-center justify-content-center" aria-label="Our Work" href="<?php echo esc_url($CTA_link); ?>" <?php echo $CTA_target; ?>>
                    <?php echo get_field('s1_our_work_svg_code'); ?>
                </a>
        <?php }
        endif; ?>
    </div>
</section>

<!-- S2 The future for commerce -->
<section class="pt-40 py-md-60 py-xl-100">
    <div class="container">
        <div class="row align-items-md-center">
            <div class="col-md-6 pr-md-5">
                <div class="pr-xl-4">
                    <div data-aos="fade-up">
                        <span class="section-sub-heading"><?php echo wp_kses_post(get_field('s2_sub_title')); ?></span>
                        <h2 class="section-heading"><?php echo wp_kses_post(get_field('s2_title')); ?></h2>
                    </div>
                    <div data-aos="fade-up"><?php echo wp_kses_post(get_field('s2_description')); ?></div>
                </div>
            </div>
            <div class="col-md-6 text-center text-md-right" data-aos="fade-right">
                <?php $rightImage = get_field('s2_right_image'); ?>
                <?php $webpImage = get_field('s2_right_image_webp'); ?>
                <?php
                if (!empty($webpImage) && !empty($rightImage)) {
                    $url = isset($webpImage['url']) ? $webpImage['url'] : '';
                    $mime_type = isset($webpImage['mime_type']) ? $webpImage['mime_type'] : '';

                    $rightImage_url = isset($rightImage['url']) ? $rightImage['url'] : '';
                    $rightImage_mime_type = isset($rightImage['mime_type']) ? $rightImage['mime_type'] : '';
                    $rightImage_title = isset($rightImage['title']) ? $rightImage['title'] : '';
                    $rightImage_alt = isset($rightImage['alt']) ? $rightImage['alt'] : '';
                    $rightImage_width = isset($rightImage['width']) ? $rightImage['width'] : '';
                    $rightImage_height = isset($rightImage['height']) ? $rightImage['height'] : '';

                    if (!empty($url) && !empty($rightImage_url)) { ?>
                        <picture>
                            <source srcset="<?php echo $url; ?>" type="<?php echo $mime_type; ?>">
                            <source srcset="<?php echo $rightImage_url; ?>" type="<?php echo $rightImage_mime_type; ?>">
                            <img src="<?php echo $rightImage_url; ?>" loading="lazy" width="<?php echo $rightImage_width; ?>" height="<?php echo $rightImage_height; ?>" alt="<?php echo $rightImage_alt; ?>" title="<?php echo $rightImage_title; ?>">
                        </picture>
                <?php
                    }
                }
                ?>
            </div>

        </div>
    </div>
</section>

<!-- S3 Crafting success stories across the globe -->
<section class="success-story-section bg-light py-40 py-md-60 py-xl-100 ">
    <div class="container">
        <div data-aos="fade-up">
            <span class="section-sub-heading"><?php echo wp_kses_post(get_field('s3_sub_title')); ?></span>
            <h2 class="section-heading"><?php echo wp_kses_post(get_field('s3_title')); ?></h2>
        </div>
        <div data-aos="fade-up">
            <div class="row">
                <div class="col-md-9 col-xl-8 mb-4 pb-2 pb-md-0 mb-md-5"><?php echo wp_kses_post(get_field('s3_description')); ?></div>
            </div>
        </div>
        <?php
        $case_studies = get_field('s3_casestudies');
        if (!empty($case_studies)) {
            get_template_part('template-parts/content', 'casestudy', $case_studies);
        }
        ?>
    </div>
</section>

<!-- S4 Platform agnostic -->
<section class="py-40 py-md-60 py-xl-100">
    <div class="container">
        <div data-aos="fade-up">
            <span class="section-sub-heading"><?php echo wp_kses_post(get_field('s4_sub_title')); ?></span>
            <h2 class="section-heading"><?php echo wp_kses_post(get_field('s4_title')); ?></h2>
        </div>
        <div class="row mb-4 pb-2 pb-md-0 mb-md-5" data-aos="fade-up">
            <div class="col-md-9 col-xl-8 pr-xl-4">
                <?php echo wp_kses_post(get_field('s4_description')); ?>
            </div>
        </div>
        <h3 class="font-16 font-md-24 font-weight-normal text-primary mb-4 pb-md-1"><?php echo wp_kses_post(get_field('s4_ecommerce_platforms_title_text')); ?></h3>
        <div class="square-platform-row row mb-2 mb-md-0 pb-4 pb-md-5">
            <?php if (have_rows('s4_ecommerce_platforms')) : ?>
                <?php
                $durationSpeed = 300;
                while (have_rows('s4_ecommerce_platforms')) :
                    $durationSpeed = $durationSpeed + 200;
                ?>
                    <?php the_row(); ?>
                    <div class="col-md-4" data-aos="fade-right" data-aos-duration="<?php echo $durationSpeed ?>" data-aos-delay="<?php echo $durationSpeed ?>">
                        <?php $eCommercePlatformsTitle = wp_kses_post(get_sub_field('s4_ecommerceplatform_title')); ?>
                        <?php $eCommercePlatformsDescription = wp_kses_post(get_sub_field('s4_ecommerceplatform_description')); ?>
                        <?php $eCommercePlatformsLogo = wp_get_attachment_image(get_sub_field('s4_logo'), 'full'); ?>
                        <?php $eCommercePlatformsLogoLinks = get_sub_field('s4_link'); ?>
                        <div class="square-platform-box d-block bg-white p-4 h-100">
                            <div class="square-platform-box-wrap pl-md-1 pr-md-2 pt-2 py-md-3">
                                <div class="clear">
                                    <div class="home-platform-logo mb-4"><?php echo $eCommercePlatformsLogo ?></div>
                                    <p class="font-12 font-md-14 text-body"><?php echo $eCommercePlatformsDescription; ?></p>
                                </div>
                                <?php
                                $case_study =  get_sub_field('s4_link');
                                if (!empty($case_study)) :
                                    $cs_link = isset($case_study['url']) ? $case_study['url'] : '';
                                    $cs_title = isset($case_study['title']) ? $case_study['title'] : '';
                                    $cs_target = !empty($case_study['target']) ? 'target="_blank"' : '';
                                    if (!empty($cs_link) && !empty($cs_title)) {   ?>
                                        <a class="square-platform-arrow mt-4" href="<?php echo esc_url($cs_link); ?>" aria-label="Read More" <?php echo $cs_target; ?>></a>
                                <?php
                                    }
                                endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
        <h3 class="font-16 font-md-24 font-weight-normal text-primary mb-4 pb-md-1"><?php echo wp_kses_post(get_field('s4_frontend_technologies_title_text')); ?></h3>
        <div class="square-platform-row row">
            <?php if (have_rows('s4_frontend_technologies')) : ?>
                <?php
                $durationSpeed = 300;
                while (have_rows('s4_frontend_technologies')) :
                    $durationSpeed = $durationSpeed + 200;
                ?>
                    <?php the_row(); ?>
                    <div class="col-md-4" data-aos="fade-right" data-aos-duration="<?php echo $durationSpeed ?>" data-aos-delay="<?php echo $durationSpeed ?>">
                        <?php $frontendTechnologyLogoLink =  get_sub_field('s4_frontendtechnologies_link'); ?>
                        <div class="square-platform-box d-block bg-white p-4 h-100">
                            <div class="square-platform-box-wrap pl-md-1 pr-md-2 pt-2 py-md-3">
                                <div class="clear">
                                    <div class="home-platform-logo mb-4"><?php echo wp_get_attachment_image(get_sub_field('s4_frontendtechnologies_logo'), 'full'); ?></div>
                                    <p class="font-12 font-md-14 text-body"><?php echo wp_kses_post(get_sub_field('s4_frontendtechnologies_description')); ?></p>
                                </div>
                                <?php
                                $case_study =  get_sub_field('s4_frontendtechnologies_link');
                                if (!empty($case_study)) :

                                    $cs_link = isset($case_study['url']) ? $case_study['url'] : '';
                                    $cs_title = isset($case_study['title']) ? $case_study['title'] : '';
                                    $cs_target = !empty($case_study['target']) ? 'target="_blank"' : '';
                                    if (!empty($cs_link) && !empty($cs_title)) {   ?>
                                        <a class="square-platform-arrow mt-4" href="<?php echo esc_url($cs_link); ?>" aria-label="Read More" <?php echo $cs_target; ?>></a>
                                <?php
                                    }
                                endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- S5 To live and grow -->
<section class="bg-dark py-40 py-md-60 py-xl-100">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 pr-xl-5 pb-3 pb-lg-0">
                <div class="pr-xl-4">
                    <div data-aos="fade-right">
                        <span class="section-sub-heading"><?php echo wp_kses_post(get_field('s5_subtitle')); ?></span>
                        <h2 class="section-heading text-white"><?php echo wp_kses_post(get_field('s5_title')); ?></h2>
                    </div>
                    <div data-aos="fade-right">
                        <div class="text-A1A1A1 mb-4 pb-xl-3"><?php echo wp_kses_post(get_field('s5_description')); ?></div>
                        <?php
                        $core_service =  get_field('s5_our_core_services_link');
                        if (!empty($core_service)) :
                            $core_service_link = isset($core_service['url']) ? $core_service['url'] : '';
                            $core_service_title = isset($core_service['title']) ? $core_service['title'] : '';
                            $core_service_target = !empty($core_service['target']) ? 'target="_blank"' : '';
                            if (!empty($core_service_link) && !empty($core_service_title)) {   ?>
                                <a class="arrow-white-btn" href="<?php echo esc_url($core_service_link); ?>" <?php echo $core_service_target; ?>>
                                    <span><?php echo $core_service_title; ?></span>
                                </a>
                        <?php
                            }
                        endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 pl-xl-0">
                <div class="row row-md-10">
                    <?php if (have_rows('s5_services')) : ?>
                        <?php
                        $durationSpeed = 200;
                        while (have_rows('s5_services')) :
                            $dir_path = get_template_directory();
                            $dir_url = get_template_directory_uri();
                            $durationSpeed = $durationSpeed + 200;
                        ?>
                            <?php the_row(); ?>
                            <div class="col-md-4 mt-4 mt-md-0 mb-md-3 pb-md-1" data-aos="fade-up" data-aos-duration="<?php echo $durationSpeed ?>">
                                <div class="home-service-box text-md-center h-md-100 pt-md-3 pb-md-4 px-md-1   align-items-center d-flex d-md-inline-block w-100">
                                    <div class="home-service-icon mb-1 mr-3 mx-md-auto mb-md-2 pb-md-1 mt-md-1">
                                        <?php
                                        $title = get_sub_field('s5_services_title');

                                        $s5_service_icon = get_sub_field('s5_service_icon');
                                        $listofServiceTitle = get_sub_field('s5_services_title');
                                        if (!empty($s5_service_icon)) {
                                            $svg_path = $dir_path . '/assets/icons/' . $s5_service_icon . '.svg';
                                            if (file_exists($svg_path)) {
                                                $svg = $dir_url . '/assets/icons/' . $s5_service_icon . '.svg';
                                                if (!empty($svg)) {
                                        ?>
                                                    <div class="home-service-icon-inner d-block mx-auto">
                                                        <div class="home-service-icon-default">
                                                            <img src="<?php echo $svg; ?>" alt="<?php echo strip_tags($title); ?>" title="<?php echo strip_tags($title); ?>" />
                                                        </div>
                                                    </div>
                                        <?php
                                                }
                                            }
                                        }
                                        ?>
                                    </div>
                                    <p class="font-14 font-md-18"><?php echo wp_kses_post($title); ?></p>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>


<?php $background_color = get_field('bl_select_background_color');
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

<section class="bl-brand-logo-section py-40 py-md-60 py-xl-100 <?php echo $backColor; ?>">
    <div class="container">
        <div class="row align-items-center">
            <div class="bl-brand-logo-content col-md-12" data-aos="fade-right">
                <span class="section-sub-heading"><?php echo wp_kses_post(get_field('bl_sub_title')); ?></span>
                <h2 class="section-heading text-primary"><?php echo wp_kses_post(get_field('bl_title')); ?></h2>
                <div class="text-A1A1A1 pb-35 pb-md-80"><?php echo wp_kses_post(get_field('bl_description')); ?></div>
            </div>
            <div class="logos-wrapper">
                <?php if (have_rows('bl_brand_logo')) : ?>
                    <?php while (have_rows('bl_brand_logo')) : ?>
                        <?php the_row(); ?>
                            <?php $brandImg = wp_get_attachment_image(get_sub_field('bl_brand_logo_slider'), 'full'); ?>
                            <div class="bl-brand-logo"><?php echo $brandImg; ?></div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- S6 Some of interesting things -->
<?php get_template_part("/template-parts/interesting-things-blog"); ?>
<script>
    let vh = window.innerHeight * 0.01;
    document.documentElement.style.setProperty('--vh', `${vh}px`);
</script>

<?php get_footer(); ?>