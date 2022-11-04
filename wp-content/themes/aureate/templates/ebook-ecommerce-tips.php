<?php

/**
 * The Custom template for eBook - eCommerce Tips Page
 *
 * Template Name: eBook - eCommerce Tips
 *
 * @package Aureatelabs
 * @subpackage Aureatelabs
 * @since 1.0
 * @version 1.0
 */
get_header();
?>
<?php
if (function_exists('wpcf7_enqueue_scripts')) {
    wpcf7_enqueue_scripts();
}
if (function_exists('wpcf7_enqueue_styles')) {
    wpcf7_enqueue_styles();
}
?>
<?php $heroBannerImage =  get_field('s1_banner_image');?>
<?php $heroBannerSubTitle = wp_kses_post(get_field('s1_sub_title')); ?>
<?php $heroBannerTitle = wp_kses_post(get_field('s1_title')); ?>
<?php $heroBannerDescription = wp_kses_post(get_field('s1_description')); ?>
<section class="ebook-banner pt-5" style="background-image: url(<?php echo $heroBannerImage ?>);">
    <div class="ebook-mobile-banner d-md-none">
        <img src="<?php echo $heroBannerImage ?>" alt="ebook">
    </div>
    <div class="container pt-xl-2">
        <div class="row">
            <div class="col-lg-6 pr-xl-5 pt-5 pt-xl-100 mt-1 mt-md-4 mb-5 mb-md-0">
                <div class="px-3 px-md-0 mr-xl-4 mt-lg-5">
                    <span class="section-sub-heading"><?php echo $heroBannerSubTitle; ?></span>
                    <h1 class="section-heading text-white"><?php echo $heroBannerTitle; ?></h1>
                    <p class="text-A1A1A1"><?php echo $heroBannerDescription; ?></p>
                </div>
            </div>
            <?php $contact_form = get_field('ebook_contact_form'); ?>
            <?php if (!empty($contact_form)) : ?>
                <div class="col-lg-6">
                    <div class="e-book-form bg-white px-3 py-4 p-lg-4">
                        <div class="px-1 p-lg-3">
                            <?php
                            $title = get_the_title($contact_form);
                            echo do_shortcode('[contact-form-7 id="' . $contact_form . '" title="' . $title . '"]');
                            ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<section class="py-40 py-lg-60 py-xl-100">
    <div class="container mt-4 mt-md-5 mt-lg-0 pt-md-5">
        <div class="row mt-lg-5 mt-xl-0">
            <div class="col-md-6 pr-xl-5 mb-4 mb-md-0 pb-2 pb-md-0">
                <?php $driveGrowthSubTitle = wp_kses_post(get_field('s2_sub_title')); ?>
                <?php $driveGrowthTitle = wp_kses_post(get_field('s2_title')); ?>
                <?php $driveGrowthDescription = wp_kses_post(get_field('s2_description')); ?>
                <?php $driveGrowthTopCommerce = wp_kses_post(get_field('s2_ebook_top_ecommerce_trends_of_2019')); ?>
                <div class="pr-xl-4">
                    <span data-aos="fade-up" class="section-sub-heading"><?php echo $driveGrowthSubTitle; ?></span>
                    <h2 data-aos="fade-up" data-aos-delay="300" class="section-heading"><?php echo $driveGrowthTitle; ?></h2>
                    <p data-aos="fade-up" data-aos-delay="400"><?php echo $driveGrowthDescription; ?></p>
                </div>
            </div>
            <div class="col-md-6" data-aos="fade-up" data-aos-delay="400">
                <?php echo $driveGrowthTopCommerce; ?>
            </div>
        </div>
    </div>
</section>

<?php get_template_part("/template-parts/thankyou-popup"); ?>

<?php get_footer(); ?>
