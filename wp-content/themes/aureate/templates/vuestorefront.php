<?php

/**
 * The Custom template for Vue Storefront Page
 *
 * Template Name: Vue Storefront
 *
 * @package Aureatelabs
 * @subpackage Aureatelabs
 * @since 1.0
 * @version 1.0
 */
get_header();
?>

<!-- S1 Banner section-->
<?php $VSHeroBanner =  get_field('s1_hero_banner'); ?>
<?php $heroBannerHeadingTitleOne = wp_kses_post(get_field('s1_heading_line_1')); ?>
<?php $heroBannerHeadingTitleThree = wp_kses_post(get_field('s1_heading_line_3')); ?>
<?php $heroBannerDescription = wp_kses_post(get_field('s1_description')); ?>
<section class="page-banner" style="background-image: url(<?php echo $VSHeroBanner ?>);">
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

<!-- S2 We are the maker of Vue Storefront Integration -->
<?php $IntegrationSubTitle = wp_kses_post(get_field('s2_sub_title')); ?>
<?php $IntegrationTitle = wp_kses_post(get_field('s2_title')); ?>
<?php $IntegrationDescription = wp_kses_post(get_field('s2_description')); ?>

<section class="pt-40 pb-4 py-md-60 py-xl-100">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 pr-xl-5" data-aos="fade-up">
                <span class="section-sub-heading"> <?php echo $IntegrationSubTitle; ?></span>
                <h2 class="section-heading pr-md-5"><?php echo $IntegrationTitle; ?></h2>
                <div class="pr-xl-2 mr-xl-4">
                    <?php echo $IntegrationDescription; ?>
                </div>
            </div>
            <div class="vuestorefront-giving-img col-md-5 text-center pt-4 pt-md-0 mt-3 mt-md-0" data-aos="fade-up">
                <?php $hyvaWebpImage =  get_field('s2_logo_image'); ?>
                <?php $hyvaImage =  get_field('webp_core_partner_logo'); ?>
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
                            <source srcset="<?php echo $hyvaImage_url; ?>" type="<?php echo $hyvaImage_mime_type; ?>">
                            <source srcset="<?php echo $url; ?>" type="<?php echo $mime_type; ?>">
                            <img src="<?php echo $url; ?>" loading="lazy" width="<?php echo $hyvaImage_width; ?>" height="<?php echo $hyvaImage_height; ?>" alt="<?php echo $hyvaImage_alt; ?>" title="<?php echo $hyvaImage_title; ?>" />
                        </picture>
                <?php
                    }
                }
                ?>
            </div>
            <div class="col-12">
                <div class="row mt-4 pt-md-4" data-aos="fade-up">
                    <?php if (have_rows('s2_counter')) : ?>
                        <?php while (have_rows('s2_counter')) : ?>
                            <?php the_row(); ?>
                            <?php $counterDigit = wp_kses_post(get_sub_field('s2_counter_digit')); ?>
                            <?php $counterTagline = wp_kses_post(get_sub_field('s2_counter_tagline')); ?>

                            <?php if ($counterDigit) : ?>
                                <div class="vuestorefront-giving-count col-6 col-md-3">
                                    <div class="vuestorefront-giving-count-inner py-3 py-md-3">
                                        <p class="font-heading text-primary font-40 font-xl-70 mb-1"><?php echo $counterDigit; ?></p>
                                        <p class="mb-0 font-12 font-lg-18"><?php echo $counterTagline; ?></p>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- S3 Hear from the Co-founder of Vue Storefront -->
<?php $founderSubTitle = wp_kses_post(get_field('s3_sub_title')); ?>
<?php $founderTitle = wp_kses_post(get_field('s3_title')); ?>
<?php $testimonial_id = wp_kses_post(get_field('s3_testimonial')); ?>

<section class="bg-light py-40 py-md-60 py-xl-100">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-md-5" data-aos="fade-up">
                <span class="section-sub-heading"> <?php echo $founderSubTitle; ?></span>
                <h2 class="section-heading pb-2 pb-md-0"><?php echo $founderTitle; ?></h2>
            </div>
            <?php
            if(!empty($testimonial_id))
            {
                $testimonial_details = get_field('testimonial_details',$testimonial_id);
                $name = get_the_title($testimonial_id);
                $testimonial = isset($testimonial_details['testimonial']) ? $testimonial_details['testimonial'] : '';
                $designation = isset($testimonial_details['designation']) ? $testimonial_details['designation'] : '';
                $rating = isset($testimonial_details['rating']) ? $testimonial_details['rating'] : '';
                $photo = isset($testimonial_details['photo']) ? $testimonial_details['photo'] : array();
                if(!empty($testimonial) || !empty($designation) || !empty($rating) || !empty($photo))
                {   ?>
                    <div class="col-md-6 pl-lg-5">
                        <div class="testimonial-row px-0" data-aos="fade-up">
                            <div class="pl-lg-5">
                                <?php 
                                if(!empty($testimonial) || !empty($rating)  )
                                {   ?>
                                    <div class="testimonial-block p-4 mb-4 bg-white">
                                        <div class="px-md-2 py-md-2">
                                            <?php
                                            if(!empty($testimonial))
                                            {   ?> 
                                                <p class="font-14 font-md-18 text-primary mb-3 mb-md-4">
                                                    <?php echo $testimonial; ?>
                                                </p>
                                                <?php
                                            }
                                            if(!empty($rating))
                                            {   ?> 
                                                <div class="testimonial-stars d-flex pl-0 pr-0">
                                                    <?php 
                                                    for($i=1;$i<=5;$i++)
                                                    {
                                                        if($i<=$rating)
                                                        {
                                                            $url = get_template_directory_uri().'/assets/images/single-star.svg';
                                                            
                                                        }
                                                        else
                                                        {
                                                            $url = get_template_directory_uri().'/assets/images/single-star-empty.svg';
                                                        }
                                                        ?>
                                                        <img src="<?php echo $url; ?>" title="star" alt="star" width="22" height="20" />
                                                        <?php
                                                    }
                                                    ?>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <span class="testimonial-triangle">
                                        </span>
                                    </div>
                                    <?php
                                }
                                if(!empty($name) || !empty($photo) || !empty($designation))
                                {   ?>
                                    <div class="testimomial-user d-flex align-items-center pl-2 pl-md-3 ml-1">
                                        <?php
                                        if(!empty($photo))
                                        { 
                                            $url = isset($photo['url']) ? $photo['url'] : '';
                                            if(!empty($url))
                                            {
                                                $title = isset($photo['title']) ? $photo['title'] : '';
                                                $alt = isset($photo['alt']) ? $photo['alt'] : '';
                                                $width = isset($photo['width']) ? $photo['width'] : '';
                                                $height = isset($photo['alt']) ? $photo['alt'] : '';
                                                ?>
                                                <img src="<?php echo $url; ?>" title="<?php echo $name; ?>" alt="<?php echo $name; ?>" class="mr-2 mr-md-3"/>
                                                <?php
                                            }
                                        }
                                        ?>
                                        <p class="font-14 font-md-17 text-primary">
                                            <b><?php echo $name; ?></b>
                                            <?php
                                            if(!empty($designation))
                                            {   ?>
                                                <span class="d-block font-12 font-md-14 font-weight-normal text-body"><?php echo $designation; ?></span>
                                                <?php
                                            }
                                            ?>
                                        </p>
                                    </div>
                                    <?php 
                                } 
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>

</section>

<!-- S4 Crafting success stories across the globe -->
<?php $csStorySubTitle = wp_kses_post(get_field('s4_sub_title')); ?>
<?php $csStoryTitle = wp_kses_post(get_field('s4_title')); ?>
<?php $csStoryDescription = wp_kses_post(get_field('s4_description')); ?>
<section class="success-story-section  py-40 py-md-60 py-xl-100">
    <div class="container">
        <div data-aos="fade-up">
            <span class="section-sub-heading"><?php echo $csStorySubTitle; ?></span>
            <h2 class="section-heading"><?php echo $csStoryTitle; ?></h2>
        </div>
        <div data-aos="fade-up">
            <div class="row">
                <div class="col-md-9 col-xl-8 mb-4 pb-2 pb-md-0 mb-md-5"><?php echo $csStoryDescription; ?></div>
            </div>
        </div>
        <?php
        $case_studies = get_field('s4_casestudies');
        if(!empty($case_studies ))
        {
            get_template_part( 'template-parts/content', 'casestudy', $case_studies );
        }
        ?>
    </div>
</section>

<!-- S5 Brands choose us as their Headless Commerce Partner -->
<?php $landingPageSubTitle = wp_kses_post(get_field('s5_sub_title')); ?>
<?php $landingPageTitle = wp_kses_post(get_field('s5_title')); ?>
<?php $landingPageDescription = wp_kses_post(get_field('s5_description')); ?>
<section class="py-40 py-md-60 py-xl-100 bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-xl-8" data-aos="fade-up">
                <span class="section-sub-heading"><?php echo $landingPageSubTitle; ?></span>
                <h2 class="section-heading text-white pr-xl-5"><?php echo $landingPageTitle; ?></h2>
                <div class="text-A1A1A1">
                    <div class="pr-md-3"><?php echo $landingPageDescription; ?></div>
                </div>
            </div>
        </div>

        <div class="vuestorefront-build-next-row row">
            <?php
            if (have_rows('s5_project_landing_page')) :
                while (have_rows('s5_project_landing_page')) :
                    the_row();
                    $landingPageImage = get_sub_field('s5_project_landing_page_image');
                    $webpLandingPageImage = get_sub_field('s5_webp_image_portfolio');
                    if (!empty($webpLandingPageImage) && !empty($landingPageImage)) {
                        $url = isset($webpLandingPageImage['url']) ? $webpLandingPageImage['url'] : '';
                        $mime_type = isset($webpLandingPageImage['mime_type']) ? $webpLandingPageImage['mime_type'] : '';

                        $landingPageImage_url = isset($landingPageImage['url']) ? $landingPageImage['url'] : '';
                        $landingPageImage_mime_type = isset($landingPageImage['mime_type']) ? $landingPageImage['mime_type'] : '';
                        $landingPageImage_title = isset($landingPageImage['title']) ? $landingPageImage['title'] : '';
                        $landingPageImage_alt = isset($landingPageImage['alt']) ? $landingPageImage['alt'] : '';
                        $landingPageImage_width = isset($landingPageImage['width']) ? $landingPageImage['width'] : '';
                        $landingPageImage_height = isset($landingPageImage['height']) ? $landingPageImage['height'] : '';
                        if (!empty($url) && !empty($landingPageImage_url)) { ?>
                         <div class="col-md-4 mt-4 pt-md-3 line-height-0" data-aos="fade-up">
                            <picture class="d-inline-block">
                                <source srcset="<?php echo $url; ?>" type="<?php echo $mime_type; ?>">
                                <source srcset="<?php echo $landingPageImage_url; ?>" type="<?php echo $landingPageImage_mime_type; ?>">
                                <img src="<?php echo $landingPageImage_url; ?>" loading="lazy" draggable="false" width="<?php echo $landingPageImage_width; ?>" height="<?php echo $landingPageImage_height; ?>" alt="<?php echo $landingPageImage_alt; ?>" title="<?php echo $landingPageImage_title; ?>" />
                            </picture>
                         </div>
                        <?php } ?>
                    <?php } ?>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- S6 Launch Headless Commerce in 8 weeks -->
<section class="py-40 py-md-60 py-xl-100">
    <?php $headlessSubTitle = wp_kses_post(get_field('s6_sub_title')); ?>
    <?php $headlessTitle = wp_kses_post(get_field('s6_title')); ?>
    <?php $VStagline = wp_kses_post(get_field('s6_vs_tagline_text')); ?>
    <?php $VSLogo = wp_get_attachment_image(get_field('s6_vs_logo_image'), 'full'); ?>

    <div class="container">
        <div data-aos="fade-up">
            <span class="section-sub-heading"><?php echo $headlessSubTitle; ?></span>
        </div>
        <div data-aos="fade-up">
            <h2 class="section-heading"><?php echo $headlessTitle; ?></h2>
        </div>
        <div class="row" data-aos="fade-up">
            <?php if (have_rows('s6_packages')) : ?>
                <?php while (have_rows('s6_packages')) : ?>
                    <?php the_row(); ?>
                    <div class="col-md-6 mt-4" data-aos="fade-up">
                        <div class="vuestorefront-accelerator-block d-flex h-100">
                            <?php $packagesLogoImage = wp_get_attachment_image(get_sub_field('s6_packages_brand_logo'), 'full'); ?>
                            <?php $packagesBrandTitle = wp_kses_post(get_sub_field('s6_packages_brand_title')); ?>
                            <?php $packagesBackTechTagline = wp_kses_post(get_sub_field('s6_packages_technology_logo_platform_text')); ?>
                            <?php $packagesBackTechLogo = wp_get_attachment_image(get_sub_field('s6_packages_technology_logo'), 'full'); ?>
                            <?php $packagesDescription = wp_kses_post(get_sub_field('s6_packages_description')); ?>

                            <div class="w-100">
                                <div class="vuestorefront-accelerator-block-heading py-2 py-md-4 px-4">
                                    <div class="d-flex align-items-center px-lg-3 w-100 ">
                                        <?php echo $packagesLogoImage; ?>
                                        <span class="font-16 font-md-20 text-primary ml-2 pl-2"><?php echo $packagesBrandTitle; ?></span>
                                    </div>
                                </div>
                                <div class="clear p-4">
                                    <div class="p-lg-3">
                                        <?php if ($packagesBackTechLogo) : ?>
                                            <div class="vuestorefront-accelerator-block-content-row row align-items-center mb-3 mb-md-4 pb-3 px-md-4">
                                                <div class="vuestorefront-accelerator-block-content-single ">
                                                    <p class="white-space-nowrap font-12 font-md-14 mb-2 text-A1A1A1"><?php echo $packagesBackTechTagline; ?></p>
                                                    <?php echo $packagesBackTechLogo; ?>
                                                </div>
                                                <div class="text-center line-height-0 pl-15 pr-15 pl-lg-50 pr-lg-50">
                                                    <img src="<?php echo get_template_directory_uri() . '/assets/images/vuestorefront-plus-icon.svg'; ?>" alt="Plus" title="Plus" class="plus-icon" width="22" height="22">
                                                </div>
                                                <div class="vuestorefront-accelerator-block-content-single ">
                                                    <p class="white-space-nowrap font-12 font-md-14 mb-2 text-A1A1A1"><?php echo $VStagline; ?></p>
                                                    <?php echo $VSLogo; ?>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <p class="mb-0">
                                            <?php echo $packagesDescription; ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <?php
                            $packagesLink = get_sub_field('s6_packages_link_text_and_url');
                            if (!empty($packagesLink)) :
                                $packages_link = isset($packagesLink['url']) ? $packagesLink['url'] : '';
                                $packages_title = isset($packagesLink['title']) ? $packagesLink['title'] : '';
                                $packages_target = !empty($packagesLink['target']) ? 'target="_blank"' : '';
                                if (!empty($packages_link) && !empty($packages_title)) {   ?>
                                    <div class="px-4 pb-4 w-100">
                                        <div class="px-md-3 pb-md-3">
                                            <a class="arrow-btn" href="<?php echo esc_url($packages_link); ?>" title="<?php echo $packages_title; ?>" <?php echo $packages_target; ?>>
                                                <span> <?php echo $packages_title; ?></span>
                                            </a>
                                        </div>
                                    </div>
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
</section>

<!-- S7 Our Vue Storefront services -->
<section class="vuestorefont-services-section py-40 py-md-60 py-xl-100 bg-light">
    <?php $vsServiceSubTitle = wp_kses_post(get_field('s7_sub_title')); ?>
    <?php $vsServiceTitle = wp_kses_post(get_field('s7_title')); ?>
    <?php $vsServiceDescription = wp_kses_post(get_field('s7_description')); ?>
    <div class="container">
        <div data-aos="fade-up">
            <span class="section-sub-heading"><?php echo $vsServiceSubTitle; ?></span>
        </div>
        <div class="row" data-aos="fade-up">
            <h2 class="section-heading col-md-6"><?php echo $vsServiceTitle; ?></h2>
        </div>
        <div class="row" data-aos="fade-up">
            <div class="col-md-9 col-xl-8">
                <div class="pr-3"><?php echo $vsServiceDescription; ?> </div>
            </div>
        </div>
        <div class="square-platform-row row mt-4 mt-md-2">
            <?php if (have_rows('s7_services_list')) : ?>
                <?php
                $durationSpeed = 300;
                $dir_path = get_template_directory();
                $dir_url = get_template_directory_uri();
                $iconPlaceHolderImage = wp_get_attachment_image(get_field('theme_placeholder_image', 'option'), array(100, 70));
                while (have_rows('s7_services_list')) :
                    $durationSpeed = $durationSpeed + 100;
                ?>
                    <div class="col-md-4 mt-md-4 pt-md-3" data-aos="fade-right" data-aos-duration="<?php echo $durationSpeed ?>" data-aos-delay="<?php echo $durationSpeed ?>">
                        <div class="square-platform-box p-4 h-100 bg-white">
                            <div class="square-platform-box-wrap pl-md-1 pr-md-1 pt-md-2 py-md-2">
                                <?php the_row(); ?>
                                <?php $ServiceIcon = get_sub_field('s7_services_list_icon'); ?>
                                <?php $vsServiceListLogo = wp_get_attachment_image(get_sub_field('s7_services_list_logo'), 'full'); ?>
                                <?php $vsServiceListTitle = wp_kses_post(get_sub_field('s7_services_list_title')); ?>
                                <?php $vsServiceListDesc = wp_kses_post(get_sub_field('s7_services_list_description')); ?>
                                    <div class="clear">
                                        <?php
                                        if(!empty($ServiceIcon)) 
                                        {
                                            $svg_path = $dir_path.'/assets/icons/'.$ServiceIcon.'.svg';
                                            if ( file_exists( $svg_path ) ) 
                                            {
                                                $svg = $dir_url.'/assets/icons/'.$ServiceIcon.'.svg';
                                                if(!empty($svg))
                                                {   ?>
                                                    <div class="square-platform-box-logo square-platform-box-icon mb-3">
                                                        <img src="<?php echo $svg; ?>" title="<?php echo $vsServiceListTitle; ?>" alt="<?php echo $vsServiceListTitle; ?>"/>  
                                                    </div>                                             
                                                    <?php
                                                }
                                            }
                                            else
                                            {   ?>
                                                <div class="square-platform-box-logo square-platform-box-icon mb-3">
                                                    <?php   echo $iconPlaceHolderImage; ?>
                                                </div>
                                                <?php
                                            }
                                        } 
                                        ?>
                                        <p class="text-primary font-16 font-md-18 font-weight-medium mt-3 mb-2 pb-md-1"><?php echo $vsServiceListTitle; ?></p>
                                        <p class="font-14 mb-0"><?php echo $vsServiceListDesc; ?></p>
                                    </div>
                                    <?php
                                    $vsServiceLink = get_sub_field('s7_services_list_link');
                                    if (!empty($vsServiceLink)) :
                                        $vsService_link = isset($vsServiceLink['url']) ? $vsServiceLink['url'] : '';
                                        $vsService_title = isset($vsServiceLink['title']) ? $vsServiceLink['title'] : '';
                                        $vsService_target = !empty($vsServiceLink['target']) ? 'target="_blank"' : '';
                                        if (!empty($vsService_link)) {   ?>
                                            <a class="square-platform-arrow mt-4 pt-3" href="<?php echo esc_url($vsService_link); ?>" title="<?php echo $vsService_title; ?>" <?php echo $vsService_target; ?>>
                                                <span> <?php echo $vsService_title; ?></span>
                                            </a>
                                    <?php
                                        }
                                    endif;
                                    ?>
                               
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- S8 We integrate with -->
<section class="py-40 py-md-60 py-xl-100">
    <?php $weIntegrateSubTitle = wp_kses_post(get_field('s8_sub_title')); ?>
    <?php $weIntegrateTitle = wp_kses_post(get_field('s8_title')); ?>
    <?php $weIntegrateDescription = wp_kses_post(get_field('s8_description')); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mb-4 mb-md-0">
                <div class="pr-md-5" data-aos="fade-up">
                    <span class="section-sub-heading"><?php echo $weIntegrateSubTitle; ?></span>
                    <h2 class="section-heading "><?php echo $weIntegrateTitle; ?></h2>
                    <?php echo $weIntegrateDescription; ?>
                </div>
            </div>
            <div class="col-md-6">
                <?php if (have_rows('s8_technology_logo')) : ?>
                    <div class="row vuestorefront-integrate-row row-10">
                        <?php while (have_rows('s8_technology_logo')) : ?>
                            <div class="vuestorefront-integrate-col" data-aos="fade-up">
                                <div class="vuestorefront-integrate-col-inner d-flex align-items-center justify-content-center text-center bg-white h-100 px-2">
                                    <?php the_row(); ?>
                                    <?php $weIntegrateTechLogo = wp_get_attachment_image(get_sub_field('s8_technology_logo_image'), 'full'); ?>
                                    <?php echo $weIntegrateTechLogo; ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- S9 Our approach -->
<section class="py-40 py-md-60 py-xl-100 bg-dark">
    <?php $ourApprochSubTitle = wp_kses_post(get_field('s9_sub_title')); ?>
    <?php $ourApprochTitle = wp_kses_post(get_field('s9_title')); ?>
    <?php $ourApprochDescription = wp_kses_post(get_field('s9_description')); ?>
    <div class="container">
        <div data-aos="fade-up">
            <span class="section-sub-heading"><?php echo $ourApprochSubTitle; ?></span>
            <h2 class="section-heading text-white"><?php echo $ourApprochTitle; ?></h2>
            <div class="row mb-4 pb-3">
                <div class="col-md-9 col-xl-8 text-A1A1A1">
                    <?php echo $ourApprochDescription; ?>
                </div>
            </div>
        </div>
        <div class="vuestorefront-approach-row row" data-aos="fade-up">
        <?php if (have_rows('s9_apps_section')) : ?>
            <?php
            $dir_path = get_template_directory();
            $dir_url = get_template_directory_uri();
            $iconPlaceHolderImage = wp_get_attachment_image(get_field('theme_placeholder_image', 'option'), array(100, 70));
            ?>
    <?php while (have_rows('s9_apps_section')) : ?>
        <div class="vuestorefront-approach-block text-center">
            <?php the_row(); ?>
            <?php $apps_section_icon = get_sub_field('s9_apps_section_icon'); ?>
            <?php $approchAppsTitle = wp_kses_post(get_sub_field('s9_apps_section_title')); ?>
            <?php $approchAppsTagline = wp_kses_post(get_sub_field('s9_app_section_tagline')); ?>
            <div class="vuestorefront-approach-top mb-4 mb-md-5">
                    <?php
                    if(!empty($apps_section_icon)) 
                    {
                        $svg_path = $dir_path.'/assets/icons/'.$apps_section_icon.'.svg';
                        if ( file_exists( $svg_path ) ) 
                        {
                            $svg = $dir_url.'/assets/icons/'.$apps_section_icon.'.svg';
                            if(!empty($svg))
                            {   ?>
                                <div class="mb-3 line-height-0">
                                    <img src="<?php echo $svg; ?>" title="<?php echo $approchAppsTitle; ?>" alt="<?php echo $approchAppsTitle; ?>"/>  
                                </div>                                             
                                <?php
                            }
                        }
                        else
                        {   ?>
                            <div class="mb-3 line-height-0">
                                <?php   echo $iconPlaceHolderImage; ?>
                            </div>
                            <?php
                        }
                    } 
                    ?>
                <p class="mb-1 text-white font-weight-medium"><?php echo $approchAppsTitle; ?></p>
                <div class="font-10 text-A1A1A1">
                    <?php if ($approchAppsTagline) : ?>
                        <?php echo $approchAppsTagline; ?>
                    <?php endif; ?>
                </div>
            </div>
            <?php $approchAppsScreen = get_sub_field('s9_apps_section_apps_mobile_image'); ?>
            <?php $approchAppsMobileScreen = get_sub_field('s9_apps_section_apps_mobile_device_image'); ?>
            <?php $webpAppsScreen = get_sub_field('s9_webp_apps_image'); ?>
            <?php
            if (!empty($webpAppsScreen) && !empty($approchAppsScreen)) {
                $url = isset($webpAppsScreen['url']) ? $webpAppsScreen['url'] : '';
                $mime_type = isset($webpAppsScreen['mime_type']) ? $webpAppsScreen['mime_type'] : '';

                $approchAppsScreen_url = isset($approchAppsScreen['url']) ? $approchAppsScreen['url'] : '';
                $approchAppsMobileScreen_url = isset($approchAppsMobileScreen['url']) ? $approchAppsMobileScreen['url'] : '';
                $approchAppsMobileScreen_url = !empty($approchAppsMobileScreen_url) ? $approchAppsMobileScreen_url : $approchAppsScreen_url;
                $approchAppsScreen_mime_type = isset($approchAppsScreen['mime_type']) ? $approchAppsScreen['mime_type'] : '';
                $approchAppsMobileScreen_mime_type = isset($approchAppsMobileScreen['mime_type']) ? $approchAppsMobileScreen['mime_type'] : '';
                $approchAppsMobileScreen_mime_type = !empty($approchAppsMobileScreen_mime_type) ? $approchAppsMobileScreen_mime_type : $approchAppsScreen_mime_type;
                $approchAppsScreen_title = isset($approchAppsScreen['title']) ? $approchAppsScreen['title'] : '';
                $approchAppsScreen_alt = isset($approchAppsScreen['alt']) ? $approchAppsScreen['alt'] : '';
                $approchAppsScreen_width = isset($approchAppsScreen['width']) ? $approchAppsScreen['width'] : '';
                $approchAppsScreen_height = isset($approchAppsScreen['height']) ? $approchAppsScreen['height'] : '';
                if (!empty($url) && !empty($approchAppsScreen_url)) { ?>
                    <div class="vuestorefront-approach-image">
                        <picture>
                            <source media="(max-width: 767px)" srcset="<?php echo $approchAppsMobileScreen_url; ?>" type="<?php echo $approchAppsMobileScreen_mime_type; ?>">
                            <source srcset="<?php echo $url; ?>" type="<?php echo $mime_type; ?>">
                            <source srcset="<?php echo $approchAppsScreen_url; ?>" type="<?php echo $approchAppsScreen_mime_type; ?>">
                            <img src="<?php echo $approchAppsScreen_url; ?>" loading="lazy" width="<?php echo $approchAppsScreen_width; ?>" height="<?php echo $approchAppsScreen_height; ?>" alt="<?php echo $approchAppsScreen_alt; ?>" title="<?php echo $approchAppsScreen_title; ?>">
                        </picture>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
    <?php endwhile; ?>
<?php endif; ?>
        </div>

    </div>

</section>

<!-- 10 Why Vue Storefront? -->
<section class="py-40 py-md-60 py-xl-100">
    <?php $faqSubTitle = wp_kses_post(get_field('s10_sub_title')); ?>
    <?php $faqTitle = wp_kses_post(get_field('s10_title')); ?>
    <?php $faqDescription = wp_kses_post(get_field('s10_description')); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="pr-md-5" data-aos="fade-up">
                    <span class="section-sub-heading"><?php echo $faqSubTitle; ?></span>
                    <h2 class="section-heading "><?php echo $faqTitle; ?></h2>
                    <div><?php echo $faqDescription; ?></div>
                </div>
            </div>
            <div class="col-md-6 mt-4">
                <?php
                if (have_rows('s10_faqs_list')) :
                    while (have_rows('s10_faqs_list')) : the_row(); ?>
                        <?php $faqListTitle = wp_kses_post(get_sub_field('s10_faqs_list_faq_title')); ?>
                        <?php $faqListContent = wp_kses_post(get_sub_field('s10_faqs_list_faq_content')); ?>

                        <div class="accordion-wrap" data-aos="fade-up">
                            <span class="accordion-link font-14 font-md-20 text-primary"><?php echo $faqListTitle; ?></span>
                            <div class="accordion-content">
                                <?php echo $faqListContent; ?>
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

<script type='text/javascript'>
    var acc = document.getElementsByClassName("accordion");
    var i;
    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
            this.classList.toggle("active");
            if (panel.style.display === "block") {
                panel.style.display = "none";
            } else {
                panel.style.display = "block";
            }
        });
    }
</script>
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