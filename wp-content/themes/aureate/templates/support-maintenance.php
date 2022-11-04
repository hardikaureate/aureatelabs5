<?php

/**
 * The Custom template for Support Maintenance Page
 *
 * Template Name: Support Maintenance
 *
 * @package Aureatelabs
 * @subpackage Aureatelabs
 * @since 1.0
 * @version 1.0
 */
get_header();
?>

<!-- Banner section -->
<?php $sectionLayout = get_field('sm_hero_section_layout'); ?>
<?php $mainbannerImage = get_field('sm_banner_image'); ?>
<?php $show_logo = get_field('sm_hero_section_show_logo'); ?>
<?php $heroBannerTagLine = wp_kses_post(get_field('sm_hero_section_tagline')); ?>
<?php $heroBannerTitle = wp_kses_post(get_field('sm_hero_section_title')); ?>
<?php $heroBannerDesc = wp_kses_post(get_field('sm_hero_section_description')); ?>

<?php if (!empty($mainbannerImage) || !empty($heroBannerTagLine) || !empty($heroBannerTitle) || !empty($sectionLayout)) {
    if (!empty($sectionLayout)) {
        $column = ($sectionLayout == 'support-hero-split') ? 'col-md-6' : 'col-md-8';
    }
    $after_title = false;
    if (!empty($show_logo)) {
        $after_title = ($show_logo == 'after-title') ? true : false;
    }

    if (wp_is_mobile()) {
        $sm_banner_image_mobile = get_field('sm_banner_image_mobile');
        if (!empty($sm_banner_image_mobile)) {
            $mainbannerImage = $sm_banner_image_mobile;
        }
    }
?>
    <?php if (!empty($mainbannerImage)) : ?>
        <section class="page-banner <?php echo $sectionLayout; ?>" style="background-image: url(<?php echo $mainbannerImage; ?>);">
            <div class="container">
                <div class="px-4 px-md-0">
                    <div class="row">
                        <div class="<?php echo $column; ?>">
                            <?php if ($heroBannerTagLine) : ?>
                                <div>
                                    <?php echo $heroBannerTagLine; ?>
                                </div>
                            <?php endif; ?>
                            <?php if ($heroBannerTitle) : ?>
                                <h1 class="hero-banner-title mb-4 mb-md-5 pb-1 pb-md-2 text-white ">
                                    <?php echo $heroBannerTitle; ?>
                                </h1>
                            <?php endif; ?>
                            <?php if ($after_title) : ?>
                                <div class="logo-row d-flex align-items-center">
                                    <?php if (have_rows('sm_combine_logo_')) : ?>
                                        <?php while (have_rows('sm_combine_logo_')) : ?>
                                            <?php the_row(); ?>
                                            <?php $platform_logo =  wp_get_attachment_image(get_sub_field('hero_sm_combine_logos_'), 'full'); ?>
                                            <?php if ($platform_logo) : ?>
                                                <div class="logo-col">
                                                    <?php echo $platform_logo; ?>
                                                </div>
                                            <?php endif; ?>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                            <?php if ($heroBannerDesc) : ?>
                                <div class="hero-banner-desc text-white link-description">
                                    <?php echo $heroBannerDesc; ?>
                                </div>
                            <?php endif; ?>
                            <?php if (!$after_title) : ?>
                                <div class="logo-row d-flex align-items-center">
                                    <?php if (have_rows('sm_combine_logo_')) : ?>
                                        <?php while (have_rows('sm_combine_logo_')) : ?>
                                            <?php the_row(); ?>
                                            <div class="logo-col">
                                                <?php $platform_logo =  wp_get_attachment_image(get_sub_field('hero_sm_combine_logos_'), 'full'); ?>
                                                <?php if ($platform_logo) : ?>
                                                    <?php echo $platform_logo; ?>
                                                <?php endif; ?>
                                            </div>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <?php if ($sectionLayout == 'support-hero-split') : ?>
                            <div class="pt-24 pt-md-0 banner-right col-md-6 text-white flex-wrap align-content-center ml-auto align-items-center d-flex justify-content-between">
                                <?php if (have_rows('sm_hero_section_counter')) : ?>
                                    <?php while (have_rows('sm_hero_section_counter')) : ?>
                                        <?php the_row(); ?>
                                        <div class="sm_hero_counter_col">
                                            <?php $counterDigit = wp_kses_post(get_sub_field('sm_hero_counter_digits')); ?>
                                            <?php $counterText = wp_kses_post(get_sub_field('sm_hero_counter_text')); ?>
                                            <?php if ($counterDigit) : ?>
                                                <div class="font-16 font-md-70 pb-2 sm_hero_counter_title font-heading">
                                                    <?php echo $counterDigit; ?>
                                                </div>
                                            <?php endif; ?>
                                            <?php if ($counterText) : ?>
                                                <div class="m_hero_counter_text text-mercury">
                                                    <?php echo $counterText; ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
<?php } ?>



<section>
    <div>
        <?php
        $heroCTALink =  get_field('sm_hero_section_cta_link');
        if (!empty($heroCTALink)) :
            $CTA_link = isset($heroCTALink['url']) ? $heroCTALink['url'] : '';
            $CTA_title = isset($heroCTALink['title']) ? $heroCTALink['title'] : '';
            $CTA_target = !empty($heroCTALink['target']) ? 'target="_blank"' : '';
            if (!empty($CTA_link) && !empty($CTA_title)) {   ?>
                <a href="<?php echo esc_url($CTA_link); ?>" <?php echo $CTA_target; ?>>
                    <span><?php echo $CTA_title; ?></span>
                </a>
        <?php }
        endif; ?>
    </div>
</section>



<?php
if (have_rows('support_and_maintenance_section')) :

    while (have_rows('support_and_maintenance_section')) : the_row();

        if (get_row_layout() == 'website_maintenance_services') :
            $section_data = array();
            $section_data['s1_sm_select_background_color'] = get_sub_field('s1_sm_select_background_color');
            $section_data['s1_sm_layout'] = get_sub_field('s1_sm_layout_opt');
            $section_data['s1_sm_sub_title'] = get_sub_field('s1_sm_sub_title');
            $section_data['s1_sm_title'] = get_sub_field('s1_sm_title');
            $section_data['s1_sm_description'] = get_sub_field('s1_sm_description');
            $section_data['s1_sm_maintenance_services_list'] = get_sub_field('s1_sm_maintenance_services_list');
            $section_data['s1_sm_cta_link'] = get_sub_field('s1_sm_cta_link');

            if (!empty($section_data)) :
                get_template_part('template-parts/support-maintenance/content', 'website_maintenance_services', $section_data);
            endif;

        elseif (get_row_layout() == 'why_choose_us_slider') :
            $slider_data = array();
            $slider_data['s2_sm_select_background_color'] = get_sub_field('s2_sm_select_background_color');
            $slider_data['s2_sm_why_choose_sub_title'] = get_sub_field('s2_sm_why_choose_sub_title');
            $slider_data['s2_sm_why_choose_title'] = get_sub_field('s2_sm_why_choose_title');
            $slider_data['s2_sm_why_choose_description'] = get_sub_field('s2_sm_why_choose_description');
            $slider_data['s2_sm_why_choose_us_slider'] = get_sub_field('s2_sm_why_choose_us_slider');
            if (!empty($slider_data)) :
                get_template_part('template-parts/support-maintenance/content', 'why_choose_us_slider', $slider_data);
            endif;

        elseif (get_row_layout() == 'hire_maintenance_expert') :
            $expert_data = array();
            $expert_data['s3_sm_add_custom_class'] = get_sub_field('s3_sm_add_custom_class');
            $expert_data['s3_sm_background_color'] = get_sub_field('s3_sm_background_color');
            $expert_data['s3_sm_hire_expert_sub_title'] = get_sub_field('s3_sm_hire_expert_sub_title');
            $expert_data['s3_sm_hire_expert_title'] = get_sub_field('s3_sm_hire_expert_title');
            $expert_data['s3_sm_hire_expert_agenda'] = get_sub_field('s3_sm_hire_expert_agenda');
            $expert_data['s3_sm_hire_expert_description'] = get_sub_field('s3_sm_hire_expert_description');
            $expert_data['s3_sm_hire_expert_cta_link'] = get_sub_field('s3_sm_hire_expert_cta_link');
            $expert_data['s3_sm_hire_expert_list_of_agenda'] = get_sub_field('s3_sm_hire_expert_list_of_agenda');
            $expert_data['s3_sm_listing_without_number'] = get_sub_field('s3_sm_listing_without_number');
            if (!empty($expert_data)) :
                get_template_part('template-parts/support-maintenance/content', 'hire_maintenance_expert', $expert_data);
            endif;

        elseif (get_row_layout() == 's4_sm_industries_served') :
            $industry_data = array();
            $industry_data['s4_sm_select_background_color'] = get_sub_field('s4_sm_select_background_color');
            $industry_data['s4_sm_title'] = get_sub_field('s4_sm_title');
            $industry_data['s4_sm_description'] = get_sub_field('s4_sm_description');
            $industry_data['s4_sm_served_list'] = get_sub_field('s4_sm_served_list');

            if (!empty($industry_data)) :
                get_template_part('template-parts/support-maintenance/content', 'industries_served', $industry_data);
            endif;

        elseif (get_row_layout() == 's5_sm_maintenance_package') :
            $package_data = array();
            $package_data['s5_sm_maintain_package_title'] = get_sub_field('s5_sm_maintain_package_title');
            $package_data['s5_sm_maintain_package_cta'] = get_sub_field('s5_sm_maintain_package_cta');
            $package_data['s5_sm_maintain_package_table'] = get_sub_field('s5_sm_maintain_package_table');

            if (!empty($package_data)) :
                get_template_part('template-parts/support-maintenance/content', 'maintenance_package', $package_data);
            endif;

        elseif (get_row_layout() == 's6_sm_emergency_support_services') :
            $emergency_data = array();
            $emergency_data['s6_sm_select_background_color'] = get_sub_field('s6_sm_select_background_color');
            $emergency_data['s6_sm_add_custom_class'] = get_sub_field('s6_sm_add_custom_class');
            $emergency_data['s6_sm_emergency_support_title'] = get_sub_field('s6_sm_emergency_support_title');
            $emergency_data['s6_sm_emergency_support_description'] = get_sub_field('s6_sm_emergency_support_description');
            $emergency_data['s6_sm_emergency_support'] = get_sub_field('s6_sm_emergency_support');

            if (!empty($emergency_data)) :
                get_template_part('template-parts/support-maintenance/content', 'emergency_support_services', $emergency_data);
            endif;

        elseif (get_row_layout() == 's27_web_app_packages') :
            $web_app_packages = array();
            $web_app_packages['s27_sm_select_background_color'] = get_sub_field('s27_sm_select_background_color');
            $web_app_packages['s27_sm_add_custom_class'] = get_sub_field('s27_sm_add_custom_class');
            $web_app_packages['s27_sm_emergency_support_title'] = get_sub_field('s27_sm_emergency_support_title');
            $web_app_packages['s27_sm_emergency_support_description'] = get_sub_field('s27_sm_emergency_support_description');
            $web_app_packages['s27_packages_support'] = get_sub_field('s27_packages_support');

            if (!empty($web_app_packages)) :
                get_template_part('template-parts/support-maintenance/content', 'web_app_packages', $web_app_packages);
            endif;

        elseif (get_row_layout() == 's7_sm_maintenance_cta') :
            $maintenanceCTA_data = array();
            $maintenanceCTA_data['s7_sm_title'] = get_sub_field('s7_sm_title');
            $maintenanceCTA_data['s7_sm_description'] = get_sub_field('s7_sm_description');
            $maintenanceCTA_data['s7_sm_link'] = get_sub_field('s7_sm_link');

            if (!empty($maintenanceCTA_data)) :
                get_template_part('template-parts/support-maintenance/content', 'maintenance_cta', $maintenanceCTA_data);
            endif;

        elseif (get_row_layout() == 's8_sm_common_image_section') :
            $imageContentSection = array();
            $imageContentSection['s8_sm_select_background_color'] = get_sub_field('s8_sm_select_background_color');
            $imageContentSection['s8_sm_add_custom_class'] = get_sub_field('s8_sm_add_custom_class');
            $imageContentSection['s8_sm_title'] = get_sub_field('s8_sm_title');
            $imageContentSection['s8_sm_description'] = get_sub_field('s8_sm_description');
            $imageContentSection['s8_sm_image'] = get_sub_field('s8_sm_image');
            $imageContentSection['s8_sm_video_poster_image'] = get_sub_field('s8_sm_video_poster_image');
            $imageContentSection['s8_sm_video_upload'] = get_sub_field('s8_sm_video_upload');
            $imageContentSection['s8_sm_platform_image_'] = get_sub_field('s8_sm_platform_image_');
            $imageContentSection['s8_sm_cta_link'] = get_sub_field('s8_sm_cta_link');

            if (!empty($imageContentSection)) :
                get_template_part('template-parts/support-maintenance/content', 'common_image_section', $imageContentSection);
            endif;

        elseif (get_row_layout() == 's9_sm_faqs_section') :
            $faqs_data = array();
            $faqs_data['s9_sm_select_background_color'] = get_sub_field('s9_sm_select_background_color');
            $faqs_data['s9_sm_sub_title'] = get_sub_field('s9_sm_sub_title');
            $faqs_data['s9_sm_title'] = get_sub_field('s9_sm_title');
            $faqs_data['s9_sm_description'] = get_sub_field('s9_sm_description');
            $faqs_data['s9_sm_faqs_list'] = get_sub_field('s9_sm_faqs_list');
            if (!empty($faqs_data)) :
                get_template_part('template-parts/support-maintenance/content', 'faqs_section', $faqs_data);
            endif;

        elseif (get_row_layout() == 's10_sm_contact_form_section') :
            $serviceForm_data = array();
            $serviceForm_data['s10_sm_select_background_color'] = get_sub_field('s10_sm_select_background_color');
            $serviceForm_data['s10_sm_sub_title'] = get_sub_field('s10_sm_sub_title');
            $serviceForm_data['s10_sm_title'] = get_sub_field('s10_sm_title');
            $serviceForm_data['s10_sm_description'] = get_sub_field('s10_sm_description');
            $serviceForm_data['s10_sm_expert_connect_form'] = get_sub_field('s10_sm_expert_connect_form');
            if (!empty($serviceForm_data)) :
                get_template_part('template-parts/support-maintenance/content', 'contact_form_section', $serviceForm_data);
            endif;

        elseif (get_row_layout() == 's11_sm_white_hero_section') :
            $whiteHeroSection_data = array();

            $whiteHeroSection_data['s11_sm_title'] = get_sub_field('s11_sm_title');
            $whiteHeroSection_data['s11_sm_hiring_senior'] = get_sub_field('s11_sm_hiring_senior');
            if (!empty($whiteHeroSection_data)) :
                get_template_part('template-parts/support-maintenance/content', 'white_hero_section', $whiteHeroSection_data);
            endif;

        elseif (get_row_layout() == 's13_sm_testimonials') :
            $testimonials_data1 = get_sub_field('s13_sm_testimonial_data');
            if (!empty($testimonials_data1)) :
                get_template_part('template-parts/support-maintenance/content', 'testimonials', $testimonials_data1);
            endif;

        elseif (get_row_layout() == 's14_sm_benefits_of_shopify_pwa') :
            $shopifyPWA_data = array();
            $shopifyPWA_data['s14_sm_select_background_color'] = get_sub_field('s14_sm_select_background_color');
            $shopifyPWA_data['s14_sm_title'] = get_sub_field('s14_sm_title');
            $shopifyPWA_data['s14_sm_description'] = get_sub_field('s14_sm_description');
            $shopifyPWA_data['s14_sm_benefits_list'] = get_sub_field('s14_sm_benefits_list');
            $shopifyPWA_data['14_sm_image'] = get_sub_field('14_sm_image');
            if (!empty($shopifyPWA_data)) :
                get_template_part('template-parts/support-maintenance/content', 'benefits_shopify_pwa', $shopifyPWA_data);
            endif;

        elseif (get_row_layout() == 's14_sm_video_section') :
            $videoSection_data = array();
            $videoSection_data['s14_sm_title'] = get_sub_field('s14_sm_title');
            $videoSection_data['s14_sm_description'] = get_sub_field('s14_sm_description');
            $videoSection_data['s14_sm_video_title'] = get_sub_field('s14_sm_video_title');
            $videoSection_data['s14_sm_video_file_path'] = get_sub_field('s14_sm_video_file_path');
            $videoSection_data['s14_sm_backend_image'] = get_sub_field('s14_sm_backend_image');
            $videoSection_data['s14_sm_api_text'] = get_sub_field('s14_sm_api_text');
            $videoSection_data['s14_sm_frontend_image'] = get_sub_field('s14_sm_frontend_image');
            if (!empty($videoSection_data)) :
                get_template_part('template-parts/support-maintenance/content', 'video_section', $videoSection_data);
            endif;

        elseif (get_row_layout() == 's15_sm_engagement_model') :
            $engagement_model = get_sub_field('s15_sm_category_content_group');
            if (!empty($engagement_model)) :
                get_template_part('template-parts/support-maintenance/content', 'engagement_model', $engagement_model);
            endif;

        elseif (get_row_layout() == 's16_sm_aureate_counter') :
            $CounterAndSkillset_data = array();
            $CounterAndSkillset_data['s16_sm_title'] = get_sub_field('s16_sm_title');
            $CounterAndSkillset_data['s16_sm_counter_digits'] = get_sub_field('s16_sm_counter_digits');
            $CounterAndSkillset_data['s16_sm_technical_skill_title'] = get_sub_field('s16_sm_technical_skill_title');
            $CounterAndSkillset_data['s16_sm_technical_skill'] = get_sub_field('s16_sm_technical_skill');
            if (!empty($CounterAndSkillset_data)) :
                get_template_part('template-parts/support-maintenance/content', 'al_counter_and_skillset', $CounterAndSkillset_data);
            endif;

        elseif (get_row_layout() == 's17_sm_magento_development_service') :
            $MagentoService_data = array();
            $MagentoService_data['s17_sm_title'] = get_sub_field('s17_sm_title');
            $MagentoService_data['s17_sm_description'] = get_sub_field('s17_sm_description');
            $MagentoService_data['s17_sm_image'] = get_sub_field('s17_sm_image');
            $MagentoService_data['s17_sm_service_list'] = get_sub_field('s17_sm_service_list');
            if (!empty($MagentoService_data)) :
                get_template_part('template-parts/support-maintenance/content', 'magento_dev_company', $MagentoService_data);
            endif;

        elseif (get_row_layout() == 's18_sm_magento_speed_optimization_result') :
            $optimization_data = array();
            $optimization_data['s18_sm_title'] = get_sub_field('s18_sm_title');
            $optimization_data['s18_sm_optimized_result'] = get_sub_field('s18_sm_optimized_result');
            if (!empty($optimization_data)) :
                get_template_part('template-parts/support-maintenance/content', 'magento_speed_optimization_result', $optimization_data);
            endif;

        elseif (get_row_layout() == 's19_sm_shogun_packages') :
            $shogun_package_data = array();
            $shogun_package_data['s19_sm_select_background_color'] = get_sub_field('s19_sm_select_background_color');
            $shogun_package_data['s19_sm_shogun_packages_list'] = get_sub_field('s19_sm_shogun_packages_list');
            if (!empty($shogun_package_data)) :
                get_template_part('template-parts/support-maintenance/content', 'shogun_packages_list', $shogun_package_data);
            endif;

        elseif (get_row_layout() == 's21_hire_our_magento_web_development_company') :
            $hireMagento_data = array();
            $hireMagento_data['s21_title_with_number'] = get_sub_field('s21_title_with_number');
            $hireMagento_data['s21_select_background_color'] = get_sub_field('s21_select_background_color');
            $hireMagento_data['s21_title'] = get_sub_field('s21_title');
            $hireMagento_data['s21_Description'] = get_sub_field('s21_Description');
            $hireMagento_data['s21_hiring_process'] = get_sub_field('s21_hiring_process');
            $hireMagento_data['s21_hiring_process_cta'] = get_sub_field('s21_hiring_process_cta');
            if (!empty($hireMagento_data)) :
                get_template_part('template-parts/support-maintenance/content', 'hire_magento_web_dev', $hireMagento_data);
            endif;

        elseif (get_row_layout() == 's22_features_list_dark_bg') :
            $featuresList_data = array();
            $featuresList_data['s22_sm_description'] = get_sub_field('s22_sm_description');
            $featuresList_data['s22_select_background_color'] = get_sub_field('s22_select_background_color');
            $featuresList_data['s22_sm_title'] = get_sub_field('s22_sm_title');
            $featuresList_data['featureslist_data'] = get_sub_field('featureslist_data');
            if (!empty($featuresList_data)) :
                get_template_part('template-parts/support-maintenance/content', 'dark_bg_features_list', $featuresList_data);
            endif;

        elseif (get_row_layout() == 's23_sm_section_with_two_columns') :
            $process_step_with_number = get_sub_field('s23_sm_process_step_with_number');
            if (!empty($process_step_with_number)) :
                get_template_part('template-parts/support-maintenance/content', 'section_with_two_columns', $process_step_with_number);
            endif;

        elseif (get_row_layout() == '24_sm_repeater_common_image_section') :
            $repeater_data = get_sub_field('s24_sm_repeater_data');
            if (!empty($repeater_data)) :
                get_template_part('template-parts/support-maintenance/content', 'repeater_data', $repeater_data);
            endif;

        elseif (get_row_layout() == 's25_what_is_a_magento_web_development_company') :
            $mag_web_dev = get_sub_field('s25_magento_web_dev_data');
            if (!empty($mag_web_dev)) :
                get_template_part('template-parts/support-maintenance/content', 'what_is_a_magento_web_development_company', $mag_web_dev);
            endif;

        elseif (get_row_layout() == 's26_hyva_success_stories') :
            $hyva_success_stories = get_sub_field('s26_hyva_casestudy_data');
            if (!empty($hyva_success_stories)) :
                get_template_part('template-parts/support-maintenance/content', 'hyva_success_stories', $hyva_success_stories);
            endif;

        endif;
    endwhile;
endif;
?>

<?php get_footer(); ?>