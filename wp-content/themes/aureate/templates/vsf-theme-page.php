<?php

/**
 * The Custom template for Thy Fashion Page
 *
 * Template Name: Thy Fashion - VSF
 *
 * @package Aureatelabs
 * @subpackage Aureatelabs
 * @since 1.0
 * @version 1.0
 */
get_header();
?>

<?php $hero_section_vsf_title = get_field('hero_section_vsf_title'); ?>
<?php $hero_section_vsf_image = wp_get_attachment_image(get_field('hero_section_vsf_image'), 'full') ?>
<section class="page_banner text-center bg-light">
    <div class="container">
        <h1 data-aos="fade-up" class="font-weight-normal primary-color pb-24 pb-md-40">
            <?php echo $hero_section_vsf_title; ?>
        </h1>
        <?php
        $hero_vsf_cta_button = get_field('hero_section_vsf_cta_button');
        if (!empty($hero_vsf_cta_button)) :
            $CTA_link = isset($hero_vsf_cta_button['url']) ? $hero_vsf_cta_button['url'] : '';
            $CTA_title = isset($hero_vsf_cta_button['title']) ? $hero_vsf_cta_button['title'] : '';
            $CTA_target = !empty($hero_vsf_cta_button['target']) ? 'target="_blank"' : '';
            if (!empty($CTA_link) && !empty($CTA_title)) {   ?>
                <a data-aos="fade-up" class="btn font-weight-medium uppercase" href="<?php echo esc_url($CTA_link); ?>" <?php echo $CTA_target; ?>>
                <?php echo $CTA_title; ?>
                </a>
        <?php }
        endif; ?>
        <div class="page-banner-img pt-30 pt-md-60 line-height-0" data-aos="fade-up">
            <?php echo $hero_section_vsf_image; ?>
        </div>
    </div>
</section>

<?php
if (have_rows('vsf_details_content')) :

    while (have_rows('vsf_details_content')) : the_row();

        if (get_row_layout() == 'about_theme') :
            $about_theme_group = get_sub_field('about_theme_group');
            if (!empty($about_theme_group)) :
                get_template_part('template-parts/vsf-theme/content', 'about_the_fashion_theme', $about_theme_group);
            endif;

        elseif (get_row_layout() == 'features_list') :
            $theme_features_list = get_sub_field('all_features_group');
            if (!empty($theme_features_list)) :
                get_template_part('template-parts/vsf-theme/content', 'theme_features_list', $theme_features_list);
            endif;

        elseif (get_row_layout() == 'more_powerful_features') :
            $powerful_features_list = get_sub_field('more_powerful_features_list');
            if (!empty($powerful_features_list)) :
                get_template_part('template-parts/vsf-theme/content', 'powerful_features_list', $powerful_features_list);
            endif;

        elseif (get_row_layout() == 'vsf_theme_services') :
            $vsf_theme_services_list = get_sub_field('vsf_theme_services_list');
            if (!empty($vsf_theme_services_list)) :
                get_template_part('template-parts/vsf-theme/content', 'vsf_theme_services_list', $vsf_theme_services_list);
            endif;

        elseif (get_row_layout() == 'vsf_contact_us') :
            $vsf_cf_form = get_sub_field('vsf_contact_us_form');
            if (!empty($vsf_cf_form)) :
                get_template_part('template-parts/vsf-theme/content', 'vsf_cf_form', $vsf_cf_form);
            endif;

        endif;
    endwhile;
endif;
?>
<?php get_footer(); ?>