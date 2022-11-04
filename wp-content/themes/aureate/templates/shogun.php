<?php

/**
 * The Custom template for Shogun Page
 *
 * Template Name: Shogun
 *
 * @package Aureatelabs
 * @subpackage Aureatelabs
 * @since 1.0
 * @version 1.0
 */
get_header();
?>

<?php $shogunHeroBanner =  get_field('ps_banner_image'); ?>

<section class="page-banner" style="background-image: url(<?php echo $shogunHeroBanner; ?>);">
    <div class="container">
        <div class="banner-text px-4 px-md-0">
            <?php $heroBannerTitle = wp_kses_post(get_field('ps_title')); ?>
            <?php $heroBannerDescription = wp_kses_post(get_field('ps_content')); ?>
            <h1 class="text-white mb-3 mb-md-5"><?php echo $heroBannerTitle; ?></h1>
            <p class="font-14 font-md-24 text-white">
                <?php echo $heroBannerDescription; ?>
            </p>
        </div>
    </div>
</section>

<!-- Shopify Stores need Shogun -->
<?php $subTitle = get_field('s2_sub_title'); ?>
<?php $Title = wp_kses_post(get_field('s2_title')); ?>
<?php $Description = wp_kses_post(get_field('s2_content')); ?>
<?php $allServices = get_field('s2_all_services'); ?>

<section class="shopify-stores-need-shogun py-40 py-md-60 py-xl-100">
    <div class="container">
        <div class="top-text pb-24 pb-md-50">
            <span class="section-sub-heading" data-aos="fade-up">
                <?php echo $subTitle; ?>
            </span>
            <h2 class="section-heading" data-aos="fade-up">
                <?php echo $Title; ?>
            </h2>
            <p data-aos="fade-up"><?php echo $Description; ?></p>
        </div>
        <?php if (have_rows('s2_all_services')) : ?>
            <div class="row shopify-stores-row">
                <?php while (have_rows('s2_all_services')) : ?>
                    <?php the_row(); ?>
                    <?php $techLogo = wp_get_attachment_image(wp_kses_post(get_sub_field('s2_tech_logo')), 'full'); ?>
                    <?php $serviceListContent = wp_kses_post(get_sub_field('s2_service_List')); ?>
                    <div class="col-md-6" data-aos="fade-up">
                        <div class="shopify-stores-box">
                            <div class="shopify-stores-logo pt-16 pb-16 pl-24 pr-24  pt-md-30 pb-md-30 pl-md-40 pr-md-40">
                                <?php echo $techLogo; ?>
                            </div>
                            <div class="shopify-stores-text pt-24 pb-24 pl-24 pr-24 pt-md-40 pl-md-40 pb-md-40 pr-md-40">
                                <?php echo $serviceListContent; ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- How Shopify Frontend works? -->
<?php $subTitleShopify = get_field('s3_sub_title'); ?>
<?php $TitleShopify = wp_kses_post(get_field('s3_title')); ?>
<?php $DescriptionShopify = wp_kses_post(get_field('s3_description')); ?>
<?php $storeImage = get_field('s3_shogun_store_image'); ?>
<?php $workList = get_field('s3_work_list'); ?>

<section class="shopify-stores-need-shogun shopify-works py-40 py-md-60 py-xl-100 bg-dark">
    <div class="container">
        <div class="top-text pb-24 pb-md-50">
            <span class="section-sub-heading" data-aos="fade-up">
                <?php echo $subTitleShopify; ?>
            </span>
            <h2 class="section-heading" data-aos="fade-up">
                <?php echo $TitleShopify; ?>
            </h2>
            <p data-aos="fade-up"><?php echo $DescriptionShopify; ?></p>
        </div>
        <div class="row pb-10">
            <?php if (have_rows('s3_shogun_store_image')) : ?>
                <?php while (have_rows('s3_shogun_store_image')) : ?>
                    <?php the_row(); ?>
                    <?php $backendImage = wp_get_attachment_image(get_sub_field('s3_backend_image'), 'full'); ?>
                    <div class="col-md-6 pb-30" data-aos="fade-up">
                        <?php echo $backendImage; ?>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
        <?php if (have_rows('s3_work_list')) :
            $dir_path = get_template_directory();
            $dir_url = get_template_directory_uri();
            $iconPlaceHolderImage = wp_get_attachment_image(get_field('theme_placeholder_image', 'option'), array(100, 70));
            ?>
            <div class="row how-shopify-works">
                <?php while (have_rows('s3_work_list')) : ?>
                    <?php the_row(); ?>
                    <?php $s3_icon = get_sub_field('s3_icon'); ?>
                    <?php $workListTitle = wp_kses_post(get_sub_field('s3_work_list_title')); ?>
                    <?php $workListContent = wp_kses_post(get_sub_field('s3_work_list_description')); ?>
                    <div class="col-md-4 pb-24 pb-md-0" data-aos="fade-up">
                        <div class="how-shopify-works-box pt-24 pb-24 pl-24 pr-24 pt-md-30 pr-md-30 pb-md-30 pl-md-30">
                           <?php
                            if(!empty($s3_icon)) 
                            {
                                $svg_path = $dir_path.'/assets/icons/'.$s3_icon.'.svg';
                                if ( file_exists( $svg_path ) ) 
                                {
                                    $svg = $dir_url.'/assets/icons/'.$s3_icon.'.svg';
                                    if(!empty($svg))
                                    {   ?>
                                            <img src="<?php echo $svg; ?>" title="<?php echo $workListTitle; ?>" alt="<?php echo $workListTitle; ?>"/>     
                                        <?php
                                    }
                                }
                                else
                                {   
                                    echo $iconPlaceHolderImage;
                                }
                            } 
                            ?>
                            <h3 class="font-18 pt-18 pt-md-30 font-weight-medium text-white pb-8 pb-md-12"><?php echo $workListTitle; ?></h3>
                            <p class="font-14"><?php echo $workListContent; ?></p>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- One headline will go hear -->
<?php $subTitleHear = get_field('s4_sub_title'); ?>
<?php $TitleHear = wp_kses_post(get_field('s4_title')); ?>
<?php $DescriptionHear = wp_kses_post(get_field('s4_description')); ?>
<?php $HearLink = get_field('s4_cta_link'); ?>
<?php $HearImages = wp_get_attachment_image(get_field('s4_image'), 'full'); ?>

<section class="one-headline-will-go py-40 py-md-60 py-xl-100">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="one-headline-will-go-text">
                    <span class="section-sub-heading" data-aos="fade-up">
                        <?php echo $subTitleHear; ?>
                    </span>
                    <h2 class="section-heading" data-aos="fade-up">
                        <?php echo $TitleHear; ?>
                    </h2>
                    <p data-aos="fade-up">
                        <?php echo $DescriptionHear; ?>
                    </p>
                    <?php
                    $ServiceLink =  get_field('s4_cta_link');
                    if (!empty($ServiceLink)) :
                        $our_Service_link = isset($ServiceLink['url']) ? $ServiceLink['url'] : '';
                        $our_Service_title = isset($ServiceLink['title']) ? $ServiceLink['title'] : '';
                        $our_Service_target = !empty($ServiceLink['target']) ? 'target="_blank"' : '';
                        if (!empty($our_Service_link) && !empty($our_Service_title)) {   ?>
                            <a class="arrow-btn" href="<?php echo esc_url($our_Service_link); ?>" <?php echo $our_Service_target; ?>>
                                <span><?php echo $our_Service_title; ?></span>
                            </a>
                    <?php
                        }
                    endif;
                    ?>
                </div>
            </div>
            <div class="col-md-6 pt-30 pt-md-0" data-aos="fade-up">
                <?php echo $HearImages; ?>
            </div>
        </div>
    </div>
</section>

<!-- What makes Aureate an obvious choice? -->
<?php $subTitleAL = get_field('s5_title'); ?>
<section class="what-makes-choice py-40 py-md-60 py-xl-100 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-5" data-aos="fade-up">
                <h2 class="section-heading mb-0 pb-30 aos-init aos-animate"><?php echo $subTitleAL; ?></h2>
            </div>
            <?php if (have_rows('s5_al_choice_list')) : ?>
                <div class="col-md-7">
                    <ul>
                        <?php while (have_rows('s5_al_choice_list')) : ?>
                            <?php the_row(); ?>
                            <li data-aos="fade-up">
                                <?php $ALTitle = wp_kses_post(get_sub_field('s5_al_choice_list_title')); ?>
                                <?php $ALContent = wp_kses_post(get_sub_field('s5_al_choice_list_description')); ?>
                                <h3 class="font-16 font-md-20 font-weight-medium pb-8 pb-md-16 text-primary"><?php echo $ALTitle; ?></h3>
                                <p><?php echo $ALContent; ?></p>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Our Services -->
<?php $subTitleService = get_field('s6_sub_title'); ?>
<?php $TitleService = wp_kses_post(get_field('s6_title')); ?>
<?php $DescriptionService = wp_kses_post(get_field('s6_description')); ?>

<section class="py-40 py-md-60 py-xl-100 our-services">
    <div class="container">
        <div class="row align-items-md-center">
            <div class="col-md-6 mb-4 mb-md-0 pb-2 pb-md-0">
                <div data-aos="fade-up" class="aos-init aos-animate">
                    <span class="section-sub-heading">
                        <?php echo $subTitleService; ?>
                    </span>
                    <h2 class="section-heading">
                        <?php echo $TitleService; ?>
                    </h2>
                    <p><?php echo $DescriptionService; ?></p>
                </div>
            </div>
            <div class="col-md-6">
                <?php
                $ServiceLink =  get_field('s6_page_link');
                if (!empty($ServiceLink)) :
                    $our_Service_link = isset($ServiceLink['url']) ? $ServiceLink['url'] : '';
                    $our_Service_title = isset($ServiceLink['title']) ? $ServiceLink['title'] : '';
                    $our_Service_target = !empty($ServiceLink['target']) ? 'target="_blank"' : '';
                    if (!empty($our_Service_link) && !empty($our_Service_title)) {   ?>
                    <div class="our-services-link aos-init aos-animate">
                        <h3 data-aos="fade-up">
                            <a class="font-14 font-md-18 py-3 py-md-4 d-block font-weight-normal text-primary text-hover-secondary text-decoration-underline" href="<?php echo esc_url($our_Service_link); ?>" <?php echo $our_Service_target; ?>>
                               <?php echo $our_Service_title; ?>
                            </a>
                        </h3>
                    </div>
                <?php
                }
                endif;
                ?>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>