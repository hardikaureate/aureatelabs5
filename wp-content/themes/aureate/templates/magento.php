<?php

/**
 * The Custom template for Magento Page
 *
 * Template Name: Magento
 *
 * @package Aureatelabs
 * @subpackage Aureatelabs
 * @since 1.0
 * @version 1.0
 */
get_header();
?>

<!-- Banner section-->
<?php $magentoHeroBanner =  get_field('s1_hero_banner'); ?>
<?php $heroBannerHeadingTitleOne = wp_kses_post(get_field('s1_heading_line_1')); ?>
<?php $heroBannerHeadingTitleThree = wp_kses_post(get_field('s1_heading_line_3')); ?>
<?php $heroBannerDescription = wp_kses_post(get_field('s1_description')); ?>
<section class="page-banner" style="background-image: url(<?php echo $magentoHeroBanner; ?>);">
    <div class="container">
        <div class="px-4 px-md-0">
            <h1 class="mb-4 mb-md-5 pb-1 pb-md-1 text-white">
                <span class="d-md-flex align-items-center text-white">
                    <?php echo $heroBannerHeadingTitleOne; ?>
                    <span class="banner-scrolling-words-box">
                        <span class="banner-scrolling-words-box-wrap text-secondary">
                            <?php if (have_rows('s1_heading_line_2')) : ?>
                                <?php while (have_rows('s1_heading_line_2')) : ?>
                                    <?php the_row(); ?>
                                    <span class="d-flex align-items-center">
                                        <?php echo wp_kses_post(get_sub_field('s1_slider_text')); ?>
                                    </span>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </span>
                    </span>
                </span>
                <?php echo $heroBannerHeadingTitleThree; ?>
            </h1>
            <div class="row">
                <p class="col-md-8 font-14 font-md-24 mb-0 text-white"><?php echo $heroBannerDescription; ?></p>
            </div>
        </div>
    </div>
</section>

<!-- Our Stats -->
<?php $ourStatsSubTitle = wp_kses_post(get_field('s2_sub_title')); ?>
<?php $ourStatsTitle = wp_kses_post(get_field('s2_title')); ?>
<?php $ourStatsDescription = wp_kses_post(get_field('s2_description')); ?>

<section class="py-40 py-md-60 py-xl-100">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mb-4 mb-md-0">
                <span class="section-sub-heading"><?php echo $ourStatsSubTitle; ?></span>
                <h2 class="section-heading"><?php echo $ourStatsTitle; ?></h2>
                <div class="mb-4 pb-md-3 mr-xl-2 pr-xl-5">
                    <?php echo $ourStatsDescription; ?>
                </div>
                <?php if (have_rows('s2_counter')) : ?>
                    <div class="row magento-stats-row">
                        <?php while (have_rows('s2_counter')) : ?>
                            <?php the_row(); ?>
                            <div class="col-6 col-md-5 magento-stats-column">
                                <div class="magento-stats">
                                    <p class="font-heading text-primary font-40 font-xl-70 mb-1"><?php echo wp_kses_post(get_sub_field('s2_counter_digit')); ?>
                                    </p>
                                    <p class="fon-12 font-md-18"><?php echo wp_kses_post(get_sub_field('s2_counter_text')); ?>
                                    </p>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="col-md-6 pl-xl-0" data-aos="fade-left">
                <?php $magentoCommunityLogo = wp_get_attachment_image(get_field('s2_certificate_image'), 'full'); ?>
                <?php echo $magentoCommunityLogo; ?>
            </div>

        </div>
    </div>
</section>

<!-- Magento Express Launch -->
<?php $manageStoreSubTitle = wp_kses_post(get_field('s3_sub_title')); ?>
<?php $manageStoreTitle = wp_kses_post(get_field('s3_title')); ?>
<?php $manageStoreDescription = wp_kses_post(get_field('s3_description')); ?>
<section class="py-40 py-md-60 py-xl-100 bg-light express-launch-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mb-4 mb-md-0 pb-2 pb-md-0 pr-xl-5" data-aos="fade-up">
                <span class="section-sub-heading"><?php echo $manageStoreSubTitle; ?></span>
                <h2 class="section-heading"><?php echo $manageStoreTitle; ?></h2>
                <div class="mb-4 pb-md-3 pr-xl-4"><?php echo $manageStoreDescription; ?></div>
                <?php
                $manageStoreLink =  get_field('s3_link_url');
                if (!empty($manageStoreLink)) :
                    $managestore_link = isset($manageStoreLink['url']) ? $manageStoreLink['url'] : '';
                    $managestore_title = isset($manageStoreLink['title']) ? $manageStoreLink['title'] : '';
                    $managestore_target = !empty($manageStoreLink['target']) ? 'target="_blank"' : '';
                    if (!empty($managestore_link) && !empty($managestore_title)) {   ?>
                        <a class="arrow-btn" href="<?php echo esc_url($managestore_link); ?>" title="<?php echo $managestore_title; ?>" <?php echo $managestore_target; ?>>
                            <span> <?php echo $managestore_title; ?></span>
                        </a>
                <?php }
                endif; ?>
            </div>
            <div class="col-md-6 pl-xl-0 express-launch-image-section" data-aos="fade-right">
                <?php $managentoStoreImage =  get_field('s3_store_image'); ?>
                <?php $managentoStoreWebpImage =  get_field('s3_store_webp_image'); ?>
                <?php
                if (!empty($managentoStoreWebpImage) && !empty($managentoStoreImage)) {
                    $url = isset($managentoStoreWebpImage['url']) ? $managentoStoreWebpImage['url'] : '';
                    $mime_type = isset($managentoStoreWebpImage['mime_type']) ? $managentoStoreWebpImage['mime_type'] : '';

                    $managentoStoreImage_url = isset($managentoStoreImage['url']) ? $managentoStoreImage['url'] : '';
                    $managentoStoreImage_mime_type = isset($managentoStoreImage['mime_type']) ? $managentoStoreImage['mime_type'] : '';
                    $managentoStoreImage_title = isset($managentoStoreImage['title']) ? $managentoStoreImage['title'] : '';
                    $managentoStoreImage_alt = isset($managentoStoreImage['alt']) ? $managentoStoreImage['alt'] : '';
                    $managentoStoreImage_width = isset($managentoStoreImage['width']) ? $managentoStoreImage['width'] : '';
                    $managentoStoreImage_height = isset($managentoStoreImage['height']) ? $managentoStoreImage['height'] : '';

                    if (!empty($url) && !empty($managentoStoreImage_url)) { ?>
                        <picture>
                            <source srcset="<?php echo $url; ?>" type="<?php echo $mime_type; ?>">
                            <source srcset="<?php echo $managentoStoreImage_url; ?>" type="<?php echo $managentoStoreImage_mime_type; ?>">
                            <img src="<?php echo $managentoStoreImage_url; ?>" loading="lazy" width="<?php echo $managentoStoreImage_width; ?>" height="<?php echo $managentoStoreImage_height; ?>" alt="<?php echo $managentoStoreImage_alt; ?>" title="<?php echo $managentoStoreImage_title; ?>" />
                        </picture>
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
</section>

<!-- Explore Growth -->
<section class="py-40 py-md-60 py-xl-100">
    <div class="container">
        <?php $growthSubTitle = wp_kses_post(get_field('s4_sub_title')); ?>
        <?php $growthTitle = wp_kses_post(get_field('s4_title')); ?>
        <?php $growthDescription = wp_kses_post(get_field('s4_description')); ?>
        <div data-aos="fade-up">
            <span class="section-sub-heading"><?php echo $growthSubTitle; ?></span>
            <h2 class="section-heading"><?php echo $growthTitle; ?></h2>
            <div class="row">
                <div class="col-md-9 col-xl-8 mb-md-2"><?php echo $growthDescription; ?></div>
            </div>
        </div>
        <?php if (have_rows('s4_magento_power_list')) : ?>
            <div class="square-platform-row row"> 
                <?php
                $durationSpeed = 300;
                $dir_path = get_template_directory();
                $dir_url = get_template_directory_uri();
                $iconPlaceHolderImage = wp_get_attachment_image(get_field('theme_placeholder_image', 'option'), array(100, 70));
                while (have_rows('s4_magento_power_list')) :
                    $durationSpeed = $durationSpeed + 100;
                    ?>
                    <?php the_row(); ?>
                    <?php $ServiceIcon = get_sub_field('s4_magento_power_list_icon'); ?> 
                    <?php $magentoPowerTitle = wp_kses_post(get_sub_field('s4_magento_power_list_title')); ?>
                    <?php $magentoPowerDescription = wp_kses_post(get_sub_field('s4_magento_power_list_description')); ?>
                    <?php $magentoPowerLink = get_sub_field('s4_magento_power_list_link_url'); ?>
                    <div class="col-md-4 mt-4 pt-md-3" data-aos="fade-right" data-aos-duration="<?php echo $durationSpeed ?>" data-aos-delay="<?php echo $durationSpeed ?>">
                        <div class="square-platform-box p-4 h-100">
                            <div class="square-platform-box-wrap p-md-1">
                                <div class="clear">
                                    <?php
                                    if(!empty($ServiceIcon))
                                    {
                                        $svg_path = $dir_path.'/assets/icons/'.$ServiceIcon.'.svg';
                                        if ( file_exists( $svg_path ) ) 
                                        {
                                            $svg = $dir_url.'/assets/icons/'.$ServiceIcon.'.svg';
                                            if(!empty($svg))
                                            {
                                                ?>
                                                <div class="square-platform-box-icon  mb-3 mb-md-4 pb-md-2 line-height-0">
                                                    <img src="<?php echo $svg; ?>" title="<?php echo $magentoPowerTitle; ?>" alt="<?php echo $magentoPowerTitle; ?>"/>
                                                </div>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            echo $iconPlaceHolderImage;
                                        } 
                                    }
                                    else
                                    {
                                        echo $iconPlaceHolderImage;
                                    }
                                    ?>
                                    <h3 class="font-16 font-md-18 font-weight-medium text-primary mb-2 pb-md-1"><?php echo $magentoPowerTitle; ?></h3>
                                    <div class="font-12 font-md-14 text-body"><?php echo $magentoPowerDescription; ?></div>
                                </div>
                                <?php
                                $magentoPowerLink =  get_sub_field('s4_magento_power_list_link_url');
                                if (!empty($magentoPowerLink)) :
                                    $magentoPower_link = isset($magentoPowerLink['url']) ? $magentoPowerLink['url'] : '';
                                    $magentoPower_title = isset($magentoPowerLink['title']) ? $magentoPowerLink['title'] : '';
                                    $magentoPower_target = !empty($magentoPowerLink['target']) ? 'target="_blank"' : '';
                                    if (!empty($magentoPower_link) && !empty($magentoPower_title)) {   ?>
                                        <a class="square-platform-arrow mt-4 pt-3" href="<?php echo esc_url($magentoPower_link); ?>" aria-label="Read More" <?php echo $magentoPower_target; ?> title="<?php echo $magentoPower_title; ?>">
                                        </a>
                                <?php }
                                endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- Hyva Theme -->
<section class="py-40 py-md-60 py-xl-100 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mb-4 mb-md-0 pb-2 pb-md-0 pr-xl-5" data-aos="fade-up">
                <?php $HyvaSubTitle = wp_kses_post(get_field('s5_sub_title')); ?>
                <?php $HyvaTitle = wp_kses_post(get_field('s5_title')); ?>
                <?php $HyvaDescription = wp_kses_post(get_field('s5_description')); ?>
                <span class="section-sub-heading"><?php echo $HyvaSubTitle; ?></span>
                <h2 class="section-heading mr-xl-5 pr-xl-2"><?php echo $HyvaTitle; ?></h2>
                <div class="mb-4 mb-md-5 pr-xl-4 mr-xl-1"><?php echo $HyvaDescription; ?></div>
                <?php
                $hyvaLink = get_field('s5_link_text_and_url');
                if (!empty($hyvaLink)) :
                    $hyva_link = isset($hyvaLink['url']) ? $hyvaLink['url'] : '';
                    $hyva_title = isset($hyvaLink['title']) ? $hyvaLink['title'] : '';
                    $hyva_target = !empty($hyvaLink['target']) ? 'target="_blank"' : '';
                    if (!empty($hyva_link) && !empty($hyva_title)) {   ?>
                        <a class="arrow-btn" href="<?php echo esc_url($hyva_link); ?>" title="<?php echo $hyva_title; ?>" <?php echo $hyva_target; ?>>
                            <span> <?php echo $hyva_title; ?></span>
                        </a>
                <?php
                    }
                endif;
                ?>
            </div>
            <div class="col-md-6" data-aos="fade-left">
                <?php $hyvaWebpImage =  get_field('s5_webp_image'); ?>
                <?php $hyvaImage =  get_field('s5_image'); ?>
                <?php
                if (!empty($hyvaWebpImage) && !empty($hyvaImage)) {
                    $url = isset($hyvaWebpImage['url']) ? $hyvaWebpImage['url'] : '';
                    $mime_type = isset($hyvaWebpImage['mime_type']) ? $hyvaWebpImage['mime_type'] : '';

                    $hyvaImage_url = isset($hyvaImage['url']) ? $hyvaImage['url'] : '';
                    $hyvaImage_mime_type = isset($hyvaImage['mime_type']) ? $hyvaImage['mime_type'] : '';
                    $hyvaImage_title = isset($hyvaImage['title']) ? $hyvaImage['title'] : '';
                    $hyvaImage_alt = isset($hyvaImage['alt']) ? $hyvaImage['alt'] : '';
                    $hyvaImage_width = isset($hyvaImage['width']) ? $hyvaImage['width'] : '';
                    $hyvaImage_height = isset($hyvaImage['height']) ? $hyvaImage['height'] : '';
                    if (!empty($url) && !empty($hyvaImage_url)) { ?>
                        <picture>
                            <source srcset="<?php echo $url; ?>" type="<?php echo $mime_type; ?>">
                            <source srcset="<?php echo $hyvaImage_url; ?>" type="<?php echo $hyvaImage_mime_type; ?>">
                            <img src="<?php echo $hyvaImage_url; ?>" loading="lazy" width="<?php echo $hyvaImage_width; ?>" height="<?php echo $hyvaImage_height; ?>" alt="<?php echo $hyvaImage_alt; ?>" title="<?php echo $hyvaImage_title; ?>" />
                        </picture>
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
</section>

<!-- Ongoing Care & SUpport -->
<section class="py-40 py-md-60 py-xl-100">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mb-4 mb-md-0 pb-3 pb-md-0 pr-xl-5" data-aos="fade-up">
                <?php $supportSubTitle = wp_kses_post(get_field('s6_sub_title')); ?>
                <?php $supportTitle = wp_kses_post(get_field('s6_title')); ?>
                <?php $supportDescription = wp_kses_post(get_field('s6_description')); ?>
                <span class="section-sub-heading"><?php echo $supportSubTitle; ?></span>
                <h2 class="section-heading"><?php echo $supportTitle; ?></h2>
                <div class="mb-4 mb-md-5 pr-xl-4"><?php echo $supportDescription; ?></div>
                <?php
                $supportLink = get_field('s6_link_text_and_url');
                if (!empty($supportLink)) :
                    $support_link = isset($supportLink['url']) ? $supportLink['url'] : '';
                    $support_title = isset($supportLink['title']) ? $supportLink['title'] : '';
                    $support_target = !empty($supportLink['target']) ? 'target="_blank"' : '';
                    if (!empty($support_link) && !empty($support_title)) {   ?>
                        <a class="arrow-btn" href="<?php echo esc_url($support_link); ?>" title="<?php echo $support_title; ?>" <?php echo $support_target; ?>>
                            <span class="d-inline-block"> <?php echo $support_title; ?></span>
                        </a>
                <?php
                    }
                endif;
                ?>
            </div>
            <div class="col-md-6">
                <?php
                if (have_rows('s6_accordion_list')) :
                    while (have_rows('s6_accordion_list')) : the_row();
                        $header = get_sub_field('s6_accordion_title');
                        $content = get_sub_field('s6_accordion_content');
                ?>
                        <div class="accordion-wrap" data-aos="fade-up">
                            <span class="accordion-link font-14 font-md-20 text-primary"><?php echo $header; ?></span>
                            <div class="accordion-content">
                                <?php echo $content; ?>
                            </div>
                        </div>
                <?php
                    endwhile;
                else :
                    echo '';
                endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- We connect what you need -->
<section class="py-40 py-md-60 py-xl-100 bg-dark">
    <div class="container">
        <?php $weConnectSubTitle = wp_kses_post(get_field('s7_sub_title')); ?>
        <?php $weConnectTitle = wp_kses_post(get_field('s7_title')); ?>
        <?php $weConnectDescription = wp_kses_post(get_field('s7_description')); ?>
        <div data-aos="fade-up">
            <span class="section-sub-heading"><?php echo $weConnectSubTitle; ?></span>
            <h2 class="section-heading text-white"><?php echo $weConnectTitle; ?></h2>
            <div class="row">
                <div class="text-A1A1A1 pb-xl-4 mb-4 mb-md-5 col-md-9 col-xl-8 pr-xl-5"><?php echo $weConnectDescription; ?></div>
            </div>
        </div>

        <div class="clear">
            <?php if (have_rows('s7_logo_and_title')) : ?>
                <?php while (have_rows('s7_logo_and_title')) : ?>
                    <div class="magento-partner-row py-24">
                        <div class="row align-items-center">
                            <?php the_row(); ?>
                            <?php $weConnectLogoTitle =  get_sub_field('s7_we_connect_title'); ?>
                            <div class="col-md-4" data-aos="fade-right">
                                <p class="font-16 font-md-22 text-white mb-2 mb-md-0"><?php echo $weConnectLogoTitle; ?></p>
                            </div>
                            <?php if (have_rows('s7_logo')) : ?>
                                <div class="col-md-8 d-flex flex-wrap" data-aos="fade-left">
                                    <?php while (have_rows('s7_logo')) : ?>
                                        <?php the_row(); ?>
                                        <?php $weConnectLogoCompanyLogo =  wp_get_attachment_image(get_sub_field('s7_we_connect_logo_image'), 'full'); ?>
                                        <?php if (get_sub_field('s7_we_connect_logo_image')) : ?>
                                            <div class="magento-partner-logo"><?php echo $weConnectLogoCompanyLogo; ?></div>
                                        <?php endif; ?>
                                    <?php endwhile; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>

    </div>
</section>

<!-- Crafting success stories across the globe -->
<section class="success-story-section py-40 py-md-60 py-xl-100">
    <div class="container">
        <?php $craftingStoriesSubTitle = wp_kses_post(get_field('s8_sub_title')); ?>
        <?php $craftingStoriesTitle = wp_kses_post(get_field('s8_title')); ?>
        <?php $craftingStoriesDescription = wp_kses_post(get_field('s8_description')); ?>
        <div data-aos="fade-up">
            <span class="section-sub-heading"><?php echo $craftingStoriesSubTitle; ?></span>
            <h2 class="section-heading"><?php echo $craftingStoriesTitle; ?></h2>
        </div>
        <div class="row" data-aos="fade-up">
            <div class="col-md-9 col-xl-8 mb-4 pb-2 pb-md-0 mb-md-5">
                <?php echo $craftingStoriesDescription; ?>
            </div>
        </div>
        <?php
        $case_studies = get_field('s8_casestudies');
        if(!empty($case_studies ))
        {
            get_template_part( 'template-parts/content', 'casestudy', $case_studies );
        }
        ?>
    </div>
</section>

<!-- Why Aureate is a right match for Magento? -->
<section class="py-40 py-md-60 py-xl-100 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-8 pr-md-4" data-aos="fade-up">
                <?php $whyAureateSubTitle = wp_kses_post(get_field('s9_sub_title')); ?>
                <?php $whyAureateTitle = wp_kses_post(get_field('s9_title')); ?>
                <?php $whyAureateDescription = wp_kses_post(get_field('s9_description')); ?>
                <span class="section-sub-heading"><?php echo $whyAureateSubTitle; ?></span>
                <h2 class="section-heading"><?php echo $whyAureateTitle; ?></h2>
                <div class=""><?php echo $whyAureateDescription; ?></div>
            </div>
        </div>
        <div class="pt-4 mt-2 pt-md-5 mt-md-0">
        <?php
        $testimonials = get_field('s9_testimonials');
        if(!empty($testimonials ))
        {
            get_template_part( 'template-parts/content', 'testimonials', $testimonials );
        }
        ?> 
        </div>
    </div>
</section>

<!-- Our Services -->
<section class="py-40 py-md-60 py-xl-100">
    <div class="container">
        <?php $ourServicesSubTitle = wp_kses_post(get_field('s10_sub_title')); ?>
        <?php $ourServicesTitle = wp_kses_post(get_field('s10_title')); ?>
        <?php $ourServicesDescription = wp_kses_post(get_field('s10_description')); ?>
        <div data-aos="fade-up">
            <span class="section-sub-heading"><?php echo $ourServicesSubTitle; ?></span>
            <h2 class="section-heading"><?php echo $ourServicesTitle; ?></h2>
            <div class="row">
                <div class="col-md-9 col-xl-8 pr-xl-5 mb-3 pb-1">
                    <?php echo $ourServicesDescription; ?>
                </div>
            </div>
        </div>

        <?php if (have_rows('s10_all_services')) : ?>
            <div class="row">
                <?php while (have_rows('s10_all_services')) : ?>
                    
                        <?php the_row(); ?>
                        <?php
                        $ourServicesListWithLink = get_sub_field('s10_service_list');
                        if (!empty($ourServicesListWithLink)) :
                            $ourServices_link = isset($ourServicesListWithLink['url']) ? $ourServicesListWithLink['url'] : '';
                            $ourServices_title = isset($ourServicesListWithLink['title']) ? $ourServicesListWithLink['title'] : '';
                            $ourServices_target = !empty($ourServicesListWithLink['target']) ? 'target="_blank"' : '';
                            if (!empty($ourServices_link) && !empty($ourServices_title)) {   ?>
                            <div class="col-md-4 magento-service-link-column" data-aos="fade-up">
                                <div class="magento-service-link-wrap">
                                    <a class="magento-service-link" href="<?php echo esc_url($ourServices_link); ?>" title="<?php echo $ourServices_title; ?>" <?php echo $ourServices_target; ?>>
                                        <?php echo $ourServices_title; ?>
                                    </a>
                                </div>
                            </div>
                        <?php
                            }
                        endif;
                        ?>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>

    </div>
</section>

<script>
    const accordionBtns = document.querySelectorAll(".accordion-link");

    accordionBtns.forEach((accordion) => {
        accordion.onclick = function() {
            this.classList.toggle("is-open");

            let content = this.nextElementSibling;
            console.log(content);

            if (content.style.maxHeight) {
                content.style.maxHeight = null;
            } else {
                content.style.maxHeight = content.scrollHeight + "px";
                console.log(content.style.maxHeight);
            }
        };
    });
</script>
<?php get_footer(); ?>