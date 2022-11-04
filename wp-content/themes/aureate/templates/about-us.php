<?php

/**
 * The Custom template for About Page
 *
 * Template Name: About
 *
 * @package Aureatelabs
 * @subpackage Aureatelabs
 * @since 1.0
 * @version 1.0
 */
get_header();
?>

<!-- Banner section-->
<?php $HeroBanner =  get_field('s1_banner_image'); ?>
<?php $heroBannerHeadingTitle = wp_kses_post(get_field('s1_hero_section_title')); ?>
<?php $heroBannerDescription = wp_kses_post(get_field('s1_hero_section_description')); ?>
<section class="page-banner" style="background-image: url(<?php echo $HeroBanner; ?>);">
    <div class="container">
        <div class="px-4 px-md-0">
            <h1 class="mb-4 mb-md-5 pb-1 pb-md-1 text-white">
                <?php echo $heroBannerHeadingTitle; ?>
            </h1>
            <div class="row">
                <p class="col-md-8 font-14 font-md-24 mb-0 text-white"><?php echo $heroBannerDescription; ?></p>
            </div>
        </div>
    </div>
</section>

<!-- What makes us different?-->
<?php $subTitle = wp_kses_post(get_field('s2_sub_title')); ?>
<?php $title = wp_kses_post(get_field('s2_title')); ?>
<section class="py-40 py-md-60 py-xl-100 what_makes_different">
    <div class="container">
        <?php if (!empty($subTitle) || !empty($title)) {  ?>
            <?php if (!empty($subTitle)) { ?>
                <span class="section-sub-heading" data-aos="fade-up">
                    <?php echo $subTitle; ?>
                </span>
            <?php } ?>
            <?php if (!empty($title)) { ?>
                <h2 class="section-heading aos-init aos-animate pb-8 m-0 pb-md-50" data-aos="fade-up">
                    <?php echo $title; ?>
                </h2>
            <?php } ?>
        <?php } ?>
        <div class="row">
            <?php if (have_rows('s2_goals')) : ?>
                <?php while (have_rows('s2_goals')) : ?>
                    <?php the_row(); ?>
                    <?php $goalTitle = wp_kses_post(get_sub_field('s2_goals_title')); ?>
                    <?php $goalDesc = wp_kses_post(get_sub_field('s2_goals_content')); ?>
                    <?php if (!empty($goalTitle) || !empty($goalDesc)) {  ?>
                        <div class="pt-24 pt-md-0 col-md-4 what_makes_different-col aos-init aos-animate" data-aos="fade-up">
                            <div class="what_makes_different_box pt-24 pb-24 pl-24 pr-24 pt-md-40 pb-md-40 pl-md-30 pr-md-30 h-100">
                                <?php if (!empty($goalTitle)) { ?>
                                    <h3 class="font-16 pb-12 font-md-18 font-weight-medium text-primary m-0">
                                        <?php echo $goalTitle; ?>
                                    </h3>
                                <?php } ?>
                                <?php if (!empty($goalDesc)) { ?>
                                    <p class="font-14">
                                        <?php echo $goalDesc; ?>
                                    </p>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>
<!-- Our stats say that! -->
<?php $ourSubTitle = wp_kses_post(get_field('s3_sub_title')); ?>
<?php $ourTitle = wp_kses_post(get_field('s3_title')); ?>
<?php $ourDescription = wp_kses_post(get_field('s3_description')); ?>

<section class="py-40 py-md-60 py-xl-100 bg-dark our-stats">
    <div class="container">
        <?php if (!empty($ourSubTitle) || !empty($ourTitle) || !empty($ourDescription)) {  ?>
            <div class="row">
                <div class="col-md-8">
                    <?php if (!empty($ourSubTitle)) { ?>
                        <span class="section-sub-heading aos-init aos-animate" data-aos="fade-up">
                            <?php echo $ourSubTitle; ?>
                        </span>
                    <?php } ?>
                    <?php if (!empty($ourTitle)) { ?>
                        <h2 class="section-heading text-white" data-aos="fade-up">
                            <?php echo $ourTitle; ?>
                        </h2>
                    <?php } ?>
                    <?php if (!empty($ourDescription)) { ?>
                        <p class="text-A1A1A1 pr-3 aos-init aos-animate" data-aos="fade-up">
                            <?php echo $ourDescription; ?>
                        </p>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
        <div class="row mt-4 mt-md-5 our-stats-counter">
            <?php if (have_rows('s3_counter_data')) : ?>
                <?php while (have_rows('s3_counter_data')) : ?>
                    <div class="col-6 col-md-3 column-border" data-aos="fade-up">
                        <div class="column-border-inner py-3 py-md-3">
                            <?php the_row(); ?>
                            <?php $counterDigit = wp_kses_post(get_sub_field('s3_counter_digit')); ?>
                            <?php $counterText = wp_kses_post(get_sub_field('s3_counter_text')); ?>
                            <?php if (!empty($counterDigit) || !empty($counterText)) {  ?>
                                <?php if (!empty($counterDigit)) { ?>
                                    <span class="d-block font-40 font-md-70 text-white font-heading mb-2 mb-md-0 aos-init aos-animate">
                                        <?php echo $counterDigit; ?>
                                    </span>
                                <?php } ?>
                                <?php if (!empty($counterText)) { ?>
                                    <p class="d-block text-A1A1A1 font-12 font-md-20 aos-init aos-animate">
                                        <?php echo $counterText; ?>
                                    </p>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>


<!-- Our Trusted Partner -->
<?php $partnerTitle = wp_kses_post(get_field('s4_title')); ?>

<section class="py-40 py-md-60 py-xl-100 our-trusted-partner bg-light">
    <div class="container">
        <?php if (!empty($partnerTitle)) {  ?>
            <?php if (!empty($partnerTitle)) { ?>
                <h2 class="section-heading text-center pb-24 m-0 pb-md-50" data-aos="fade-up">
                    <?php echo $partnerTitle; ?>
                </h2>
            <?php } ?>
        <?php } ?>
        <div class="align-items-center row m-0" data-aos="fade-up">
            <?php if (have_rows('s4_partners_images')) : ?>
                <?php while (have_rows('s4_partners_images')) : ?>
                    <?php the_row(); ?>
                    <?php $partnersLogo = wp_get_attachment_image(get_sub_field('s4_trusted_partners_logo'), 'full'); ?>
                    <?php if (!empty($partnersLogo)) {  ?>
                        <div class="col-6 col-md-4 p-0">
                            <div class="our-trusted-partner-logo d-flex justify-content-center align-items-center ">
                                <?php if (!empty($partnersLogo)) { ?>
                                    <?php echo $partnersLogo; ?>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>


<!-- The future for commerce -->
<?php $futureSubTitle = wp_kses_post(get_field('s5_sub_title')); ?>
<?php $futureTitle = wp_kses_post(get_field('s5_title')); ?>
<?php $futureDescription = wp_kses_post(get_field('s5_description')); ?>
<?php $futureImage = wp_get_attachment_image(get_field('s5_image'), 'full'); ?>

<section class="pt-40 pb-40 py-md-60 py-xl-100 the-future-commerce">
    <div class="container">
        <?php if (!empty($futureSubTitle) || !empty($futureTitle) || !empty($futureDescription) || !empty($futureImage)) {  ?>
            <div class="row align-items-md-center">
                <div class="col-md-6 pr-md-5">
                    <div class="pr-xl-4">
                        <div data-aos="fade-up" class="aos-init aos-animate">
                            <?php if (!empty($futureSubTitle)) { ?>
                                <span class="section-sub-heading"><?php echo $futureSubTitle; ?></span>
                            <?php } ?>
                            <?php if (!empty($futureTitle)) { ?>
                                <h2 class="section-heading">
                                    <?php echo $futureTitle; ?>
                                </h2>
                            <?php } ?>
                            <?php if (!empty($futureDescription)) { ?>
                                <?php echo $futureDescription; ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 text-center text-md-right aos-init aos-animate pt-md-0 pt-30" data-aos="fade-up">
                    <?php if (!empty($futureImage)) { ?>
                        <?php echo $futureImage; ?>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
    </div>
</section>

<!-- Clients on VSF so far -->
<?php $clientSubTitle = wp_kses_post(get_field('s6_sub_title')); ?>
<?php $clientTitle = wp_kses_post(get_field('s6_title')); ?>
<?php $clientDescription = wp_kses_post(get_field('s6_description')); ?>

<section class="bl-brand-logo-section pt-40 pb-40 py-md-60 py-xl-100 bg-light">
    <div class="container">
        <?php if (!empty($clientSubTitle) || !empty($clientTitle) || !empty($clientDescription)) {  ?>
            <div class="row align-items-md-center">
                <div class="bl-brand-logo-content col-md-12" data-aos="fade-right">
                    <?php if (!empty($clientSubTitle)) { ?>
                        <span class="section-sub-heading">
                            <?php echo $clientSubTitle; ?>
                        </span>
                    <?php } ?>
                    <?php if (!empty($clientTitle)) { ?>
                        <h2 class="section-heading">
                            <?php echo $clientTitle; ?>
                        </h2>
                    <?php } ?>
                    <?php if (!empty($clientDescription)) { ?>
                        <div class="text-A1A1A1 pb-35 pb-md-80">
                            <?php echo $clientDescription; ?>
                        <?php } ?>
                        </div>
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
        <?php } ?>
    </div>
</section>


<!-- Key Leadership -->
<?php $empSubTitle = wp_kses_post(get_field('s7_sub_title')); ?>
<?php $empTitle = wp_kses_post(get_field('s7_title')); ?>
<?php $empDescription = wp_kses_post(get_field('s7_description')); ?>
<?php $empImage = wp_get_attachment_image(get_field('s7_employee_image'), 'full'); ?>

<section class="pt-40 pb-40 py-md-60 py-xl-100 key-leadership">
    <div class="container">
        <?php if (!empty($empSubTitle) || !empty($empTitle) || !empty($empDescription) || !empty($empImage)) {  ?>
            <div class="row align-items-md-center">
                <div class="col-md-5">
                    <div class="key-leadership-left">
                        <?php if (!empty($empSubTitle)) { ?>
                            <span data-aos="fade-up" class="section-sub-heading"><?php echo $empSubTitle; ?></span>
                        <?php } ?>
                        <?php if (!empty($empTitle)) { ?>
                            <h2 data-aos="fade-up" class="section-heading">
                                <?php echo $empTitle; ?>
                            </h2>
                        <?php } ?>
                        <p data-aos="fade-up">
                            <?php if (!empty($empDescription)) { ?>
                                <?php echo $empDescription; ?>
                            <?php } ?>
                        </p>
                    </div>
                </div>
                <div class="col-md-7 text-md-right pt-md-0 pt-30" data-aos="fade-up">
                    <?php if (!empty($empImage)) { ?>
                        <?php echo $empImage; ?>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
    </div>
</section>


<!-- Life at Aureate -->
<?php $ALSubTitle = wp_kses_post(get_field('s8_sub_title')); ?>
<?php $ALTitle = wp_kses_post(get_field('s8_title')); ?>
<?php $ALDescription = wp_kses_post(get_field('s8_description')); ?>

<section class="pt-40 pb-40 py-md-60 py-xl-100 life-at-aureate bg-light">
    <div class="container">
        <?php if (!empty($ALSubTitle) || !empty($ALTitle) || !empty($ALDescription)) {  ?>
            <div class="row align-items-md-center pb-md-0 pb-25">
                <div class="col-md-8 pr-md-5 pb-md-50">
                    <div class="pr-xl-4">
                        <div data-aos="fade-up" class="aos-init aos-animate">
                            <?php if (!empty($ALSubTitle)) { ?>
                                <span class="section-sub-heading" data-aos="fade-up">
                                    <?php echo $ALSubTitle; ?>
                                </span>
                            <?php } ?>
                            <?php if (!empty($ALTitle)) { ?>
                                <h2 class="section-heading" data-aos="fade-up">
                                    <?php echo $ALTitle; ?>
                                </h2>
                            <?php } ?>
                            <?php if (!empty($ALDescription)) { ?>
                                <?php echo $ALDescription; ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
            </div>
    </div>
    <div class="life-at-aureate-row slider">
        <div class="life-at-aureate-gallery d-flex mt-md-3">
            <?php if (have_rows('s8_aureate_image')) : ?>
                <?php while (have_rows('s8_aureate_image')) : ?>
                    <?php the_row(); ?>
                    <?php $sliderImage = wp_get_attachment_image(get_sub_field('s8_aureate_image_images'), 'full'); ?>
                    <?php if (!empty($sliderImage)) {  ?>
                        <div class="life-at-aureate-gallery-column">
                            <div class="life-at-aureate-gallery-image">
                                <?php if (!empty($sliderImage)) { ?>
                                    <?php echo $sliderImage; ?>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Listen to Expert -->
<?php $expertSubTitle = wp_kses_post(get_field('s9_sub_title')); ?>
<?php $expertTitle = wp_kses_post(get_field('s9_title')); ?>
<?php $expertDescription = wp_kses_post(get_field('s9_description')); ?>


<section class="pt-40 pb-40 py-md-60 py-xl-100 life-at-aureate">
    <div class="container">
        <?php if (!empty($expertSubTitle) || !empty($expertTitle) || !empty($expertDescription)) {  ?>
            <div class="row align-items-md-center">
                <div class="col-md-8 pr-md-5 pb-md-50">
                    <div class="pr-xl-4">
                        <?php if (!empty($expertSubTitle)) { ?>
                            <span class="section-sub-heading" data-aos="fade-up">
                                <?php echo $expertSubTitle; ?>
                            </span>
                        <?php } ?>
                        <?php if (!empty($expertTitle)) { ?>
                            <h2 class="section-heading" data-aos="fade-up">
                                <?php echo $expertTitle; ?>
                            </h2>
                        <?php } ?>
                        <p data-aos="fade-up">
                            <?php if (!empty($expertDescription)) { ?>
                                <?php echo $expertDescription; ?>
                            <?php } ?>
                        </p>
                        <?php
                        $aboutCTA = get_field('s9_cta_link');
                        if (!empty($aboutCTA)) :
                            $CTA_link = isset($aboutCTA['url']) ? $aboutCTA['url'] : '';
                            $CTA_title = isset($aboutCTA['title']) ? $aboutCTA['title'] : '';
                            $CTA_target = !empty($aboutCTA['target']) ? 'target="_blank"' : '';
                            if (!empty($CTA_link) && !empty($CTA_title)) {   ?>
                                <a data-aos="fade-up" class="arrow-btn" aria-label="cta" href="<?php echo esc_url($CTA_link); ?>" <?php echo $CTA_target; ?>>
                                    <span><?php echo $CTA_title; ?></span>
                                </a>
                        <?php }
                        endif; ?>
                    </div>
                </div>
            </div>
        <?php } ?>
        <div class="row align-items-md-center pt-md-0 pt-8">
            <?php if (have_rows('s9_video_section')) : ?>
                <?php while (have_rows('s9_video_section')) : ?>
                    <?php the_row(); ?>
                    <?php
                    $s9_video_yt = get_sub_field('s9_video_yt');
                    $s9_video_title = get_sub_field('s9_video_title');
                    if (!empty($s9_video_yt)) {
                    ?>
                        <div class="col-md-6 pt-md-0 pt-24" data-aos="fade-up">
                            <iframe width="600" height="337" src="<?php echo $s9_video_yt; ?>" title="<?php echo $s9_video_title; ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                            </iframe>
                        </div>
                    <?php
                    }
                    ?>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>