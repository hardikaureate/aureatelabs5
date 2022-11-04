<?php

/**
 * The Custom template for Shopify Page
 *
 * Template Name: Shopify
 *
 * @package Aureatelabs
 * @subpackage Aureatelabs
 * @since 1.0
 * @version 1.0
 */
get_header();
?>

<!-- S1 Shopify Banner section-->
<?php $heroBannerImage = get_field('s1_hero_banner'); ?>
<?php $heroBannerHeadingTitleOne = wp_kses_post(get_field('s1_heading_line_1')); ?>
<?php $heroBannerHeadingTitleThree = wp_kses_post(get_field('s1_heading_line_3')); ?>
<?php $heroBannerDescription = wp_kses_post(get_field('s1_hero_section_description')); ?>
<section class="page-banner" style="background-image: url(<?php echo $heroBannerImage ?>);">
    <div class="container">
        <div class="px-4 px-md-0">
            <h1 class="mb-4 mb-md-5 pb-1 pb-md-2 text-white">
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

<!-- S2 Shopify Partner section-->
<?php $heroBannerSubSectionDescription = wp_kses_post(get_field('s2_hero_sub_section_description')); ?>
<?php $heroBannerSubSectionImage = get_field('s2_hero_sub_section_logo'); ?>
<div class="py-40 py-md-60 py-xl-100">
    <div class="container text-center">
        <div class="row justify-content-center mb-4 pb-2 pb-md-0 mb-md-5">
            <div class="col-md-9 font-32">
                <div class="font-18 font-md-24 font-xl-32 px-md-2 text-primary" data-aos="fade-up">
                    <?php echo $heroBannerSubSectionDescription; ?>
                </div>
            </div>
        </div>
        <img src="<?php echo $heroBannerSubSectionImage['url']; ?>" alt="<?php echo $heroBannerSubSectionImage['alt']; ?>" title="<?php echo $heroBannerSubSectionImage['title']; ?>" class="shopify-page-shopify-logo" data-aos="fade-up" data-aos-delay="50">
    </div>
</div>

<!-- S3  Fast go-to Market Section-->
<?php $newStoreSubTitle = wp_kses_post(get_field('s3_new_store_subtitle')); ?>
<?php $newStoreTitle = wp_kses_post(get_field('s3_new_store_title')); ?>
<?php $newStoreDescription = wp_kses_post(get_field('s3_new_store_description')); ?>
<section class="py-5 bg-light">
    <div class="container">
        <div class="row align-items-md-center">
            <div class="col-md-6 pr-md-5">
                <div class="pr-xl-4" data-aos="fade-up">
                    <span class="section-sub-heading"><?php echo $newStoreSubTitle; ?></span>
                    <h2 class="section-heading"><?php echo $newStoreTitle; ?></h2>
                    <div class="pb-3 pb-md-0 mb-3 mb-md-5"><?php echo $newStoreDescription; ?></div>
                    <?php
                    $newStoreURL =  get_field('s3_new_store_link_url');
                    if (!empty($newStoreURL)) :
                        $newStorelink = isset($newStoreURL['url']) ? $newStoreURL['url'] : '';
                        $newStoretitle = isset($newStoreURL['title']) ? $newStoreURL['title'] : '';
                        $newStoretarget = !empty($newStoreURL['target']) ? 'target="_blank"' : '';
                        if (!empty($newStorelink) && !empty($newStoretitle)) { ?>
                            <a class="arrow-btn" href="<?php echo esc_url($newStorelink); ?>" title="<?php echo $newStoretitle; ?>" <?php echo $newStoretarget; ?>>
                                <span> <?php echo $newStoretitle; ?></span>
                            </a>
                    <?php
                        }
                    endif;
                    ?>

<?php
                $blog_url =  get_field('s2_view_all_blog_link');
                if (!empty($blog_url)) :
                    $all_blog_link = isset($blog_url['url']) ? $blog_url['url'] : '';
                    $all_blog_title = isset($blog_url['title']) ? $blog_url['title'] : '';
                    $all_blog_target = !empty($blog_url['target']) ? 'target="_blank"' : '';
                    if (!empty($all_blog_link) && !empty($all_blog_title)) {   ?>
                        <a class="arrow-btn" href="<?php echo esc_url($all_blog_link); ?>" <?php echo $all_blog_target; ?>>
                            <span><?php echo $all_blog_title; ?></span>
                        </a>
                <?php
                    }
                endif;
                ?>
                </div>
            </div>
            <div class="col-md-6 text-center text-md-right" data-aos="fade-right">
                <?php $newStoreImage =  get_field('s3_new_store_image'); ?>
                <?php $webpImage =  get_field('s3_new_store_webp_image'); ?>
                <?php
                if (!empty($webpImage) && !empty($newStoreImage)) {
                    $url = isset($webpImage['url']) ? $webpImage['url'] : '';
                    $mime_type = isset($webpImage['mime_type']) ? $webpImage['mime_type'] : '';

                    $newStoreImage_url = isset($newStoreImage['url']) ? $newStoreImage['url'] : '';
                    $newStoreImage_mime_type = isset($newStoreImage['mime_type']) ? $newStoreImage['mime_type'] : '';
                    $newStoreImage_title = isset($newStoreImage['title']) ? $newStoreImage['title'] : '';
                    $newStoreImage_alt = isset($newStoreImage['alt']) ? $newStoreImage['alt'] : '';
                    $newStoreImage_width = isset($newStoreImage['width']) ? $newStoreImage['width'] : '';
                    $newStoreImage_height = isset($newStoreImage['height']) ? $newStoreImage['height'] : '';

                    if (!empty($url) && !empty($newStoreImage_url)) { ?>
                        <picture>
                            <source srcset="<?php echo $url; ?>" type="<?php echo $mime_type; ?>">
                            <source srcset="<?php echo $newStoreImage_url; ?>" type="<?php echo $newStoreImage_mime_type; ?>">
                            <img class="w-100" src="<?php echo $newStoreImage_url; ?>" loading="lazy" width="<?php echo $newStoreImage_width; ?>" height="<?php echo $newStoreImage_height; ?>" alt="<?php echo $newStoreImage_alt; ?>" title="<?php echo $newStoreImage_title; ?>" />
                        </picture>
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
</section>

<!-- S4 Boost Conversation -->
<?php $sellMoreSubTitle = wp_kses_post(get_field('s4_sell_more_on_shopify_sub_title')); ?>
<?php $sellMoreTitle = wp_kses_post(get_field('s4_sell_more_on_shopify_title')); ?>
<?php $sellMoreDescription = wp_kses_post(get_field('s4_sell_more_on_shopify_description')); ?>
<?php $sellMoreDesignTitle = wp_kses_post(get_field('s4_sell_more_on_shopify_design_title')); ?>
<?php $sellMoreDesignDescription = wp_kses_post(get_field('s4_sell_more_on_shopify_design_description')); ?>
<section class="py-40 py-md-60 py-xl-100">
    <div class="container">
        <div class="row align-items-md-center">
            <div class="col-md-12" data-aos="fade-up">
                <span class="section-sub-heading"><?php echo $sellMoreSubTitle; ?></span>
                <h2 class="section-heading"><?php echo $sellMoreTitle; ?></h2>
                <div class="row">
                    <div class="col-md-8 pb-2 pb-md-0 mb-3 mb-md-5 pr-md-4">
                        <?php echo $sellMoreDescription; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5 mb-4 mb-md-0" data-aos="fade-up">
                <div class="shopify-design-and-development p-4 ">
                    <div class="p-md-3">
                        <p class="font-weight-medium text-primary mb-2 pb-md-1"><?php echo $sellMoreDesignTitle; ?></p>
                        <div class="font-14 text-body mb-4 pb-md-2">
                            <?php echo $sellMoreDesignDescription; ?>
                        </div>
                        <?php
                        if (!empty(get_field('s4_sell_more_on_shopify_link'))) :
                            $sellMoreURL =  get_field('s4_sell_more_on_shopify_link');
                            $sellMoreLink = isset($sellMoreURL['url']) ? $sellMoreURL['url'] : '';
                            $sellMoreTarget = !empty($sellMoreURL['target']) ? 'target="_blank"' : '';
                            if (!empty($sellMoreLink)) { ?>
                                <a class="shopify-platform-arrow d-inline-block pb-2 pb-md-0 mb-4 mb-md-5" href="<?php echo esc_url($sellMoreLink); ?>" <?php echo $sellMoreTarget; ?>></a>
                        <?php
                            }
                        endif;
                        ?>
                        <div>
                            <?php $sellMoreImage =  get_field('s4_sell_more_on_shopify_product_image'); ?>
                            <?php $webpSellMoreImage =  get_field('s4_sell_more_on_shopify_product_image_webp'); ?>
                            <?php
                            if (!empty($webpSellMoreImage) && !empty($sellMoreImage)) {
                                $url = isset($webpSellMoreImage['url']) ? $webpSellMoreImage['url'] : '';
                                $mime_type = isset($webpSellMoreImage['mime_type']) ? $webpSellMoreImage['mime_type'] : '';

                                $sellMoreImage_url = isset($sellMoreImage['url']) ? $sellMoreImage['url'] : '';
                                $sellMoreImage_mime_type = isset($sellMoreImage['mime_type']) ? $sellMoreImage['mime_type'] : '';
                                $sellMoreImage_title = isset($sellMoreImage['title']) ? $sellMoreImage['title'] : '';
                                $sellMoreImage_alt = isset($sellMoreImage['alt']) ? $sellMoreImage['alt'] : '';
                                $sellMoreImage_width = isset($sellMoreImage['width']) ? $sellMoreImage['width'] : '';
                                $sellMoreImage_height = isset($sellMoreImage['height']) ? $sellMoreImage['height'] : '';

                                if (!empty($url) && !empty($sellMoreImage_url)) { ?>
                                    <picture>
                                        <source srcset="<?php echo $url; ?>" type="<?php echo $mime_type; ?>">
                                        <source srcset="<?php echo $sellMoreImage_url; ?>" type="<?php echo $sellMoreImage_mime_type; ?>">
                                        <img src="<?php echo $sellMoreImage_url; ?>" loading="lazy" width="<?php echo $sellMoreImage_width; ?>" height="<?php echo $sellMoreImage_height; ?>" alt="<?php echo $sellMoreImage_alt; ?>" title="<?php echo $sellMoreImage_title; ?>">
                                    </picture>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7 mt-2 mt-md-0" data-aos="fade-up">
                <div class="row sell-more-left-blocks-row">
                    <?php if (have_rows('s4_sell_more_on_shopify_design_&_development_section')) : ?>
                        <?php 
                        $dir_path = get_template_directory();
                        $dir_url = get_template_directory_uri();
                        $iconPlaceHolderImage = wp_get_attachment_image(get_field('theme_placeholder_image', 'option'), array(100, 70));
                        ?>
                        <?php while (have_rows('s4_sell_more_on_shopify_design_&_development_section')) : ?>
                            <div class="sell-more-left-blocks col-md-6 mb-0 mb-md-4">
                                <div class="mb-0 mb-md-4">
                                    <?php the_row(); ?>
                                   
                                    <?php $ServiceIcon = get_sub_field('s4_sell_more_on_shopify_boost_icon'); ?>
                                    <?php $sellMoreBoostTitle = wp_kses_post(get_sub_field('s4_sell_more_on_shopify_boost_title')); ?>
                                    <?php $sellMoreBoostDescription = wp_kses_post(get_sub_field('s4_sell_more_on_shopify_boost_description')); ?>

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
                                                <p class="mb-4 pb-0 pb-md-2 d-inline-flex sell-more-left-blocks-img">
                                                    <img src="<?php echo $svg; ?>" title="<?php echo $sellMoreBoostTitle; ?>" alt="<?php echo $sellMoreBoostTitle; ?>"/>
                                                    </p>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                            <p class="mb-4 pb-0 pb-md-2 d-inline-flex sell-more-left-blocks-img">
                                                <?php
                                                echo $iconPlaceHolderImage;
                                                ?>
                                            </p>
                                            <?php
                                        }
                                    } 
                                    ?>
                                    <p class="font-16 font-md-18 font-weight-medium mb-2 pb-1 pb-md-1 text-primary"><?php echo $sellMoreBoostTitle; ?></p>
                                    <p class="font-14 mb-4 pr-0 pr-md-1"><?php echo $sellMoreBoostDescription; ?></p>
                                    <?php
                                    if (!empty(get_sub_field('s4_sell_more_on_shopify_boost_link'))) :
                                        $sellMoreBoostURL =  get_sub_field('s4_sell_more_on_shopify_boost_link');
                                        $sellMoreBoostLink = isset($sellMoreBoostURL['url']) ? $sellMoreBoostURL['url'] : '';
                                        $sellMoreBoostTarget = !empty($sellMoreBoostURL['target']) ? 'target="_blank"' : '';
                                        if (!empty($sellMoreBoostLink)) { ?>
                                            <a class="shopify-platform-arrow mt-2 mt-md-3 d-inline-block" href="<?php echo esc_url($sellMoreBoostLink); ?>" <?php echo $sellMoreBoostTarget; ?>></a>
                                    <?php
                                        }
                                    endif;
                                    ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- S5 Our Partner -->
<?php $partnersSubTitle = wp_kses_post(get_field('s5_sub_title')); ?>
<?php $partnersTitle = wp_kses_post(get_field('s5_title')); ?>
<?php $partnersDescription = wp_kses_post(get_field('s5_description')); ?>
<section class="bg-dark py-40 py-md-60 py-xl-100">
    <div class="container">
        <div class="row align-items-md-center">
            <div class="col-md-12" data-aos="fade-up">
                <span class="section-sub-heading"><?php echo $partnersSubTitle; ?></span>
                <h2 class="section-heading text-white"><?php echo $partnersTitle; ?></h2>
                <div class="row">
                    <div class="col-md-8 pb-2 pb-md-0 pr-md-4 mb-3 mb-md-4 text-A1A1A1">
                        <div class="pr-md-1">
                            <?php echo $partnersDescription; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="shopify-partner-row row flex-wrap align-items-center row-10 " data-aos="fade-up">
            <?php if (have_rows('s5_partners_logo')) :  ?>
                <?php
                while (have_rows('s5_partners_logo')) :
                    the_row();
                ?>
                    <div class="shopify-partner-col" data-aos="fade-up">
                        <div class="d-flex align-items-center justify-content-center text-center bg-white h-100 px-2">
                            <?php $partnersImage =  wp_get_attachment_image(get_sub_field('s5_partners_logo_image'), 'full'); ?>
                            <?php echo $partnersImage; ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- S6 Upward to the North section -->
<?php $caseStudySubTitle = wp_kses_post(get_field('s6_sub_title')); ?>
<?php $caseStudyTitle = wp_kses_post(get_field('s6_title')); ?>
<?php $caseStudyDescription = wp_kses_post(get_field('s6_description')); ?>
<section class="success-story-section py-40 py-md-60 py-xl-100">
    <div class="container">
        <div data-aos="fade-up">
            <span class="section-sub-heading"><?php echo $caseStudySubTitle; ?></span>
            <h2 class="section-heading"><?php echo $caseStudyTitle; ?></h2>
        </div>
        <div data-aos="fade-up">
            <div class="row">
                <div class="col-md-9 col-xl-8 mb-4 pb-2 pb-md-0 mb-md-5"><?php echo $caseStudyDescription; ?></div>
            </div>
        </div>
        <?php
        $case_studies = get_field('s6_casestudies');
        if(!empty($case_studies ))
        {
            get_template_part( 'template-parts/content', 'casestudy', $case_studies );
        }
        ?>
    </div>
</section>

<!-- S7 You’re in good hands  -->
<?php  $whyAureateSubTitle = wp_kses_post(get_field('s7_sub_title')); ?>
<?php  $whyAureateTitle = wp_kses_post(get_field('s7_title')); ?>
<?php  $whyAureateDescription = wp_kses_post(get_field('s7_descriptions')); ?>

<section class="bg-light py-40 py-md-60 py-xl-100">
    <div class="container">
        <div class="row">
            <div class="col-md-8 pr-md-4" data-aos="fade-up">
                <span class="section-sub-heading"><?php echo $whyAureateSubTitle; ?></span>
                <h2 data-aos-delay="300" class="section-heading"><?php echo $whyAureateTitle; ?></h2>
                <div data-aos-delay="400"><?php echo $whyAureateDescription; ?></div>
            </div>
        </div>
        <?php 
        $s7_testimonials = get_field('s7_all_testimonials');
        if(!empty($s7_testimonials))
        {   ?>
            <div class="pt-4 mt-2 pt-md-5 mt-md-0">
                <?php 
                    get_template_part( 'template-parts/content', 'testimonials', $s7_testimonials );
                ?>
            </div>
            <?php
        }
        ?>
    </div>
</section>

<!-- S8 Resource Section CSS -->
<?php $serviceSubTitle = wp_kses_post(get_field('s8_sub_title')); ?>
<?php $serviceTitle = wp_kses_post(get_field('s8_title')); ?>
<?php $serviceDescription = wp_kses_post(get_field('s8_description')); ?>

<section class="py-40 py-md-60 py-xl-100">
    <div class="container">
        <div class="row align-items-md-center">
            <div class="col-md-6 mb-4 mb-md-0 pb-2 pb-md-0">
                <div data-aos="fade-up">
                    <span class="section-sub-heading"><?php echo $serviceSubTitle; ?></span>
                    <h2 class="section-heading"><?php echo $serviceTitle; ?></h2>
                    <div class="mb-0 mb-md-5 pr-xl-5"><?php echo $serviceDescription; ?></div>
                </div>
            </div>
            <div class="col-md-6">
                <?php if (have_rows('s8_services_list')) :
                    $durationSpeed = 300;
                    while (have_rows('s8_services_list')) :
                        the_row();
                        $durationSpeed = $durationSpeed + 200;
                        $serviceListTitle = wp_kses_post(get_sub_field('s8_services_list_title'));
                ?>
                        <div class="shopify-resource-service py-3 py-md-4 ml-xl-5" data-aos="fade-up" data-aos-duration="<?php echo $durationSpeed; ?>" data-aos-delay="<?php echo $durationSpeed; ?>">
                            <h3>
                                <?php
                                $serviceListLink =  get_sub_field('s8_services_list_link');
                                if (!empty($serviceListLink)) :
                                    $serviceListLink_link = isset($serviceListLink['url']) ? $serviceListLink['url'] : '';
                                    $serviceListLink_title = isset($serviceListLink['title']) ? $serviceListLink['title'] : '';
                                    $serviceListLink_target = !empty($serviceListLink['target']) ? 'target="_blank"' : '';
                                    if (!empty($serviceListLink_link) && !empty($serviceListLink_title)) {   ?>
                                        <a class="font-14 font-md-18 font-weight-normal text-primary text-hover-secondary text-decoration-underline" href="<?php echo esc_url($serviceListLink_link); ?>" <?php echo $serviceListLink_target; ?>>
                                            <span> <?php echo $serviceListLink_title; ?></span>
                                        </a>
                                <?php
                                    }
                                endif;
                                ?>

                            </h3>
                        </div>
                    <?php endwhile ?>
                <?php else : ?>
                    <!-- Content If No Posts -->
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>