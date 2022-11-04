<?php

/**
 * The Custom template for Contact Page
 *
 * Template Name: Contact Us
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
<?php $heroBannerSubTitle = wp_kses_post(get_field('s1_sub_title')); ?>
<?php $heroBannerTitle = wp_kses_post(get_field('s1_title')); ?>
<?php $heroBannerReviewTitle = wp_kses_post(get_field('s1_review_title')); ?>
<?php $heroBannerReviewImage = get_field('s1_clutch_review_image'); ?>
<?php $heroBannerContactTitle = wp_kses_post(get_field('s1_contact_title')); ?>
<?php $heroBannerPhoneImage = wp_get_attachment_image(get_field('s1_phone_icon'), 'full'); ?>
<?php $heroBannerPhoneNumber = wp_kses_post(get_field('s1_phone_number')); ?>
<?php $heroBannerEmailImage = wp_get_attachment_image(get_field('s1_email_icon'), 'full'); ?>
<?php $heroBannerEmailAddress = wp_kses_post(get_field('s1_email_address')); ?>

<section class="contact-page-banner" style="background-image: url(<?php echo $heroBannerImage ?>);background-repeat: no-repeat;background-size: cover">
    <div class="contact-mobile-banner d-lg-none">
        <img src="<?php echo $heroBannerImage ?>" alt="Banner Image" title="Banner Image">
    </div>
    <div class="container">
        <div class="row">
            <div class="contact-banner-left-block col-lg-6 pr-xl-5 pt-5 pt-md-60 mt-0 mb-5 mb-md-0 ">
                <div class="px-3 px-md-0 pr-xl-4 mt-md-0">
                    <h1 class="section-sub-heading"><?php echo $heroBannerSubTitle; ?></h1>
                    <div class="row mb-3 mb-md-4 pb-2 pb-md-2">
                        <div class="col-md-9">
                            <span class="section-heading text-white"><?php echo $heroBannerTitle; ?></span>
                        </div>
                    </div>
                    <ul class="checklist mb-4 mb-md-5 pb-2 pb-md-0 text-white">
                        <?php if (have_rows('s1_description')) : ?>
                            <?php while (have_rows('s1_description')) : ?>
                                <?php the_row(); ?>
                                <?php $discussPoint = wp_kses_post(get_sub_field('s1_discuss_point')); ?>
                                <li><?php echo $discussPoint; ?></li>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </ul>
                    <p class="text-white font-14 font-md-16 pb-1 pb-md-0 mb-2 mb-md-3"><?php echo $heroBannerReviewTitle; ?></p>
                    <?php
                    $heroBannerClutchImageLinkURL =  get_field('s1_clutch_review_image_link');
                    if (!empty($heroBannerClutchImageLinkURL)) :
                        $location_link = isset($heroBannerClutchImageLinkURL['url']) ? $heroBannerClutchImageLinkURL['url'] : '';
                        $location_target = !empty($heroBannerClutchImageLinkURL['target']) ? 'target="_blank"' : '';
                        if (!empty($location_link)) {   ?>
                            <a class="contact-banner-clutch-img d-inline-block pb-4" href="<?php echo esc_url($location_link); ?>" <?php echo $location_target; ?>>
                                <img class="mb-0 mb-md-3" src="<?php echo $heroBannerReviewImage['url']; ?>" width="<?php echo $heroBannerReviewImage['width']; ?>" height="<?php echo $heroBannerReviewImage['height']; ?>" alt="<?php echo $heroBannerReviewImage['alt']; ?>" title="<?php echo $heroBannerReviewImage['title']; ?>">
                            </a>

                    <?php
                        }
                    endif;
                    ?>
                    <p class="text-white font-14 font-md-16 mb-3"><?php echo $heroBannerContactTitle; ?></p>
                    <div class="d-block d-md-flex">
                        <div class="mr-0 pr-0 mb-3 mb-md-0 mr-md-4 pr-md-2">
                            <a class="call-icon text-white" href="tel:<?php echo str_replace(' ', '', $heroBannerPhoneNumber); ?>"><?php echo $heroBannerPhoneNumber; ?></a>
                        </div>
                        <?php 
                        if(!empty($heroBannerEmailAddress)) : 
                            //$encoded_heroBannerEmailAddress = al_encode_email_address( $heroBannerEmailAddress );
                            $encoded_EmailAddress = al_eae_encode_str( $heroBannerEmailAddress );
                            $encoded_mailto_EmailAddress = al_eae_encode_str('mailto:'.$heroBannerEmailAddress );
                        ?>
                        
                        <div class="">
                            <a class="mail-icon text-white" href="<?php echo $encoded_mailto_EmailAddress; ?>"><?php echo $encoded_EmailAddress; ?></a>
                        </div>
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
    <?php $clientSubTitle = wp_kses_post(get_field('s2_sub_title')); ?>
    <?php $clientTitle = wp_kses_post(get_field('s2_title')); ?>
    <?php $clientDescription = wp_kses_post(get_field('s2_description')); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 pr-md-5">
                <span data-aos="fade-up" class="section-sub-heading"><?php echo $clientSubTitle; ?></span>
                <h2 data-aos="fade-up" data-aos-delay="300" class="section-heading"><?php echo $clientTitle; ?></h2>
                <p data-aos="fade-up" data-aos-delay="400"><?php echo $clientDescription; ?></p>
            </div>
        </div>
        <?php
        $s2_testimonials = get_field('s2_testimonials');
        if (!empty($s2_testimonials)) {   ?>
            <div class="pt-4 mt-2 pb-40 pt-md-5 pb-md-60 mt-md-0 pb-xl-100">
                <?php
                get_template_part('template-parts/content', 'testimonials', $s2_testimonials);
                ?>
            </div>
        <?php
        }
        ?>
    </div>
</section>


<!-- our-presense section -->
<?php 
$our_presence_details = get_field('our_presence_details'); 
if(!empty($our_presence_details))
{
    $sub_heading = isset($our_presence_details['sub_heading']) ? $our_presence_details['sub_heading'] : '';
    $heading = isset($our_presence_details['heading']) ? $our_presence_details['heading'] : '';
    $content = isset($our_presence_details['content']) ? $our_presence_details['content'] : '';
    $locations = isset($our_presence_details['locations']) ? $our_presence_details['locations'] : '';
    if(!empty($sub_heading) || !empty($heading) || !empty($content) || !empty($locations))
    {   ?>
        <!-- What our client says  -->
        <section class="our-presense-section py-40 py-md-60 py-xl-100">
             <div class="container">
                <div class="row">
                    <?php 
                    if(!empty($sub_heading) || !empty($heading) || !empty($content))
                    {  ?>
                        <div class="col-lg-5 mb-4 pb-2 mb-lg-0 pb-lg-0">
                            <?php 
                            if(!empty($sub_heading))
                            {   ?>
                                <div class="section-sub-heading" data-aos="fade-up" data-aos-delay="400" data-aos-duration="400">
                                    <?php echo $sub_heading; ?>
                                </div>
                                <?php
                            }
                            if(!empty($heading))
                            {   ?>
                                <div class="section-heading" data-aos="fade-up" data-aos-delay="400" data-aos-duration="400">
                                    <?php echo $heading; ?>
                                </div>
                                <?php
                            }
                            if(!empty($content))
                            {
                                ?>
                                <div class="section-content pr-lg-5" data-aos="fade-up" data-aos-delay="400" data-aos-duration="400">
                                    <?php echo $content; ?>
                                </div>
                                <?php
                            } ?>
                        </div>
                         <?php
                    } 
                    if(!empty($locations))
                    {  ?>
                        <div class="col-lg-7">
                            <div class="row our-presence-blocks">
                            <?php 
                            foreach ($locations as $key => $location) 
                            {
                                $image = isset($location['image']) ? $location['image'] : '';
                                $address = isset($location['address']) ? $location['address'] : '';
                                $direction_link = isset($location['direction_link']) ? $location['direction_link'] : '';
                                if(!empty($image) || !empty($address) || !empty($direction_link))
                                {
                                    $place_attach_id = get_field('theme_placeholder_image', 'option');
                                    ?>
                                    <div class="col-md-6 our-presence-block" data-aos="fade-up" data-aos-delay="400" data-aos-duration="400" >
                                        <div class="our-presence-block-inner h-100 bg-white">
                                            <div class="img">
                                                <?php 
                                                if(!empty($image))
                                                {
                                                    echo wp_get_attachment_image( $image, 'full' );
                                                }
                                                else if(!empty($place_attach_id))
                                                {
                                                    echo wp_get_attachment_image( $place_attach_id, 'full' );
                                                }
                                                ?>
                                            </div>
                                            <!-- <div class="our-presence-content"> -->
                                                <?php
                                                if(!empty($address))
                                                {   ?>
                                                    <p><?php echo $address; ?></p>
                                                    <?php
                                                } 
                                                if (!empty($direction_link))
                                                {
                                                    $location_link = isset($direction_link['url']) ? $direction_link['url'] : '';
                                                    $location_title = isset($direction_link['title']) ? $direction_link['title'] : '';
                                                    $location_target = !empty($direction_link['target']) ? 'target="_blank"' : '';
                                                    if (!empty($location_link) && !empty($location_title)) 
                                                    {   ?>
                                                    <div class="btn-get-direction">
                                                        <a class="arrow-btn get-direction-btn" href="<?php echo esc_url($location_link); ?>" <?php echo $location_target; ?>>
                                                            <span>
                                                                <?php echo $location_title; ?>
                                                            </span>
                                                        </a>
                                                    </div>
                                                        <?php
                                                    }
                                                } ?>
                                            <!-- </div> -->
                                        </div>
                                    </div>
                                    <?php
                                } 
                            }
                            ?>
                            </div>
                        </div>
                        <?php 
                    } ?>
        </section>
        <?php
    }
}


?>
<?php get_template_part("/template-parts/interesting-things-blog"); ?>

<!-- Thank You Popup -->
<?php get_template_part("/template-parts/thankyou-popup"); ?>

<?php get_footer(); ?>