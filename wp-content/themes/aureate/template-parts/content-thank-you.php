<?php

/**
 * The Custom template for Thank You Page
 *
 * Template Name: Thank You
 *
 * @package Aureatelabs
 * @subpackage Aureatelabs
 * @since 1.0
 * @version 1.0
 */
get_header();
?>

<section class="py-40 py-lg-60 py-xl-100">
    <div class="container text-center mt-xl-5">
        <?php $ThankYouPageImage = wp_get_attachment_image(get_field('TY_thank_you_image'), 'full'); ?>
        <?php $ThankYouPageTitle = wp_kses_post(get_field('TY_title')); ?>
        <?php $ThankYouPageDescription = wp_kses_post(get_field('TY_description')); ?>
        <div class="mb-4"><?php echo $ThankYouPageImage; ?></div>
        <h2 class="font-heading text-primary font-40 font-weight-normal mb-2"><?php echo $ThankYouPageTitle; ?></h2>
        <div class="row justify-content-center">
            <div class="col-md-5">
                <p><?php echo $ThankYouPageDescription; ?></p>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>