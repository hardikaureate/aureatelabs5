<?php

/**
 * The Custom template for Events
 *
 * Template Name: Events
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
<!-- Contact Banner section  -->

<?php $heroBannerImage = get_field('s1_banner_image'); ?>
<?php $subTitle = wp_kses_post(get_field('s1_sub_title')); ?>
<?php $title = wp_kses_post(get_field('s1_title')); ?>
<?php $date = wp_kses_post(get_field('s1_date')); ?>
<?php $location = wp_kses_post(get_field('s1_location')); ?>
<?php $image1 = wp_get_attachment_image(get_field('s1_image_1'), 'full'); ?>
<?php $image2 = wp_get_attachment_image(get_field('s1_image_2'), 'full'); ?>


<section class="contact-page-banner" style="background-image: url(<?php echo $heroBannerImage ?>);background-repeat: no-repeat;background-size: cover">
    <div class="contact-mobile-banner d-lg-none">
        <img src="<?php echo $heroBannerImage ?>" alt="Banner Image" title="Banner Image">
    </div>
    <div class="container">
        <div class="row">
            <div class="contact-banner-left-block col-lg-6 pr-xl-5 pt-5 pt-md-60 mt-0 mb-5 mb-md-0 ">
                <div class="left-block px-3 px-md-0">
                    <h1 class="section-sub-heading"><?php echo $subTitle; ?></h1>
                    <div class="section-heading text-white"><?php echo $title; ?></div>
                    <div class="d-md-flex meet-magento-date-venue">
                        <div class="meet-magento-date d-flex align-items-center pr-md-5 mb-3 mb-md-0">
                            <img src="<?php echo get_template_directory_uri().'/assets/icons/calendar.svg'; ?>" alt="User Experience (UX) Design">
                            <span class="pl-20 text-white font-md-20"><?php echo $date; ?></span> 
                        </div>
                        <div class="meet-magento-venue d-flex align-items-center">
                            <img src="<?php echo get_template_directory_uri().'/assets/icons/location.svg'; ?>" alt="User Experience (UX) Design">
                            <span class="pl-20 text-white font-md-20"><?php echo $location; ?></span>
                        </div>
                    </div>
                    <div class="home-platform-logo">
                        <?php echo $image1; ?>
                        <?php echo $image2; ?>
                    </div>
                    <div class="counter row">
                        <?php if (have_rows('s1_counter')) : ?>
                            <?php while (have_rows('s1_counter')) : ?>
                                <?php the_row(); ?>
                                <?php $counterDigit = wp_kses_post(get_sub_field('s1_counter_digit')); ?>
                                <?php $counterText = wp_kses_post(get_sub_field('s1_counter_text')); ?>
                                <div class="col-4">
                                    <span class="counter-digit d-block text-secondary font-heading mb-2"><?php echo $counterDigit; ?></span>
                                    <span class="d-block text-white"><?php echo $counterText; ?></span>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php $contact_form = get_field('s1_contact_form_7'); ?>
            <?php if (!empty($contact_form)) : ?>
                <div class="col-lg-6">
                    <div class="contact-form bg-white px-3 py-4 p-lg-4">
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

<!-- What our client says  -->
<section class="good-hands-section">
    <?php $eventSubTitle = wp_kses_post(get_field('s2_sub_title')); ?>
    <?php $eventTitle = wp_kses_post(get_field('s2_title')); ?>
    <?php $eventDescription = wp_kses_post(get_field('s2_description')); ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div data-aos="fade-up">
                    <span class="section-sub-heading"><?php echo $eventSubTitle; ?></span>
                    <h2 class="section-heading"><?php echo $eventTitle; ?></h2>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="pb-3 mb-4 pb-md-5 "data-aos="fade-up">
                    <?php echo $eventDescription; ?>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- Thank You Popup -->
<?php get_template_part("/template-parts/thankyou-popup"); ?>

<?php get_footer(); ?>