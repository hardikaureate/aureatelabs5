<?php

/**
 * The Custom template for Career Page
 *
 * Template Name: Career
 *
 * @package Aureatelabs
 * @subpackage Aureatelabs
 * @since 1.0
 * @version 1.0
 */
get_header();
?>
<?php $heroSectionTitle = wp_kses_post(get_field('s1_title')); ?>
<?php $heroSectionPositionLink = get_field('s1_jump_to_position_link'); ?>

<!-- Banner section-->
<section class="pt-40 pt-md-60 pt-xl-100">
    <div class="container text-center mt-5 pt-2 pt-md-0 mb-4 pb-md-3">        
        <h1 class="mb-3 mb-md-4 pb-xl-1"><?php echo $heroSectionTitle; ?></h1>
        <?php
        $heroSectionPositionLink =  get_field('s1_jump_to_position_link');
        if (!empty($heroSectionPositionLink)) :
            $heroSection_link = isset($heroSectionPositionLink['url']) ? $heroSectionPositionLink['url'] : '';
            $heroSection_title = isset($heroSectionPositionLink['title']) ? $heroSectionPositionLink['title'] : '';
            $heroSection_target = !empty($heroSectionPositionLink['target']) ? 'target="_blank"' : '';
            if (!empty($heroSection_link) && !empty($heroSection_title)) {   ?>
                <a class="arrow-btn" href="<?php echo esc_url($heroSection_link); ?>" <?php echo $heroSection_target; ?>>
                    <span> <?php echo $heroSection_title; ?></span>
                </a>
        <?php }
        endif; ?>

    </div>

    <?php if (have_rows('s1_activity_slider')) : ?>
        <div class="career-gallery-container pt-4 mb-5 slider">
            <div class="career-gallery-row d-flex mt-md-3">
                <?php while (have_rows('s1_activity_slider')) : ?>
                    <?php 
                    the_row(); 
                    $study_screenshot_webp = get_sub_field('s1_slider_image_webp');
                    $screenshot = get_sub_field('s1_slider_image');
                    if(!empty($study_screenshot_webp) && !empty( $screenshot))
                    {   
                        $url = isset($study_screenshot_webp['url']) ? $study_screenshot_webp['url'] : '';
                        $mime_type = isset($study_screenshot_webp['mime_type']) ? $study_screenshot_webp['mime_type'] : '';
                        $screenshot_title = isset($study_screenshot_webp['title']) ? $study_screenshot_webp['title'] : '';
                        $screenshot_alt = isset($study_screenshot_webp['alt']) ? $study_screenshot_webp['alt'] : '';
                        $screenshot_width = isset($study_screenshot_webp['width']) ? $study_screenshot_webp['width'] : '';
                        $screenshot_height = isset($study_screenshot_webp['height']) ? $study_screenshot_webp['height'] : '';

                        $screenshot_url = isset($screenshot['url']) ? $screenshot['url'] : '';
                        $screenshot_mime_type = isset($screenshot['mime_type']) ? $screenshot['mime_type'] : '';
                        
                        if (!empty($url) && !empty($screenshot_url)) 
                        { ?>
                            <div class="career-gallery-column">
                                <div class="career-gallery-image">
                                    <picture>
                                        <source srcset="<?php echo $url; ?>" type="<?php echo $mime_type; ?>" title="<?php echo $screenshot_title; ?>">
                                        <source srcset="<?php echo $screenshot_url; ?>" type="<?php echo $screenshot_mime_type; ?>" title="<?php echo $screenshot_title; ?>">
                                        <img src="<?php echo $screenshot_url; ?>" width="<?php echo $screenshot_width; ?>" height="<?php echo $screenshot_height; ?>" alt="<?php echo $screenshot_alt; ?>" title="<?php echo $screenshot_title; ?>">
                                    </picture>
                                    </div>
                                </div>
                            <?php
                        }      
                    }
                endwhile; ?>
            </div>
        </div>
    <?php endif; ?>
</section>

<!-- Brand Image Slider -->
<section class="bl-brand-logo-section bg-light py-40 py-md-60 py-xl-100">
    <?php $brandImageSubTitle = wp_kses_post(get_field('s2_sub_title')); ?>
    <?php $brandImageTitle = wp_kses_post(get_field('s2_title')); ?>
    <?php $brandImageDesc = wp_kses_post(get_field('s2_description')); ?>

    <div class="container">
        <div class="row align-items-center">
            <div class="bl-brand-logo-content col-md-12" data-aos="fade-right">
                <span class="section-sub-heading"><?php echo $brandImageSubTitle; ?></span>
                <h2 class="section-heading"><?php echo $brandImageTitle; ?></h2>
                <div class="text-A1A1A1 pb-35 pb-md-80"><?php echo $brandImageDesc; ?></div>
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
    </div>


</section>

<!-- Perks & Benefits -->
<section class="py-40 py-md-60 py-xl-100">
    <?php $perksSubTitle = wp_kses_post(get_field('s3_sub_title')); ?>
    <?php $perksTitle = wp_kses_post(get_field('s3_title')); ?>
    <?php $perksDesc = wp_kses_post(get_field('s3_description')); ?>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <span class="section-sub-heading" data-aos="fade-up"><?php echo $perksSubTitle; ?></span>
                <h2 class="section-heading" data-aos="fade-up" data-aos-delay="300"><?php echo $perksTitle; ?></h2>
            </div>
            <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="pl-xl-5 ml-xl-4">
                    <div class="pl-md-3 ml-lg-4"><?php echo $perksDesc; ?></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Our Stats -->
<section class="bg-light py-40 py-md-60 py-xl-100">
    <div class="container">
        <?php $ourStatsSubTitle = wp_kses_post(get_field('s4_sub_title')); ?>
        <?php $ourStatsTitle = wp_kses_post(get_field('s4_title')); ?>
        <?php $ourStatsDesc = wp_kses_post(get_field('s4_description')); ?>

        <div class="row">
            <div class="col-md-10 col-lg-9 col-xl-8 pr-xl-5">
                <div data-aos="fade-up">
                    <span class="section-sub-heading"><?php echo $ourStatsSubTitle; ?></span>
                    <h2 class="section-heading"><?php echo $ourStatsTitle; ?></h2>
                    <div class="font-md-20 mb-4 mb-md-5"><?php echo $ourStatsDesc; ?></div>
                </div>

                    <?php if (have_rows('s4_stats_counter')) : ?>
                        <div class="row career-stats-row">
                            <?php while (have_rows('s4_stats_counter')) : ?>
                                <?php the_row(); ?>
                                <?php $ourStatsDigits = get_sub_field('s4_counter_digits'); ?>
                                <?php $ourStatsTagLine = wp_kses_post(get_sub_field('s4_counter_tagline')); ?>
                                <div class="col-6 col-md-4 career-stats-column" data-aos="fade-up">
                                    <div class="career-stats">
                                        <p class="font-heading text-primary font-40 font-xl-70 mb-0"><?php echo $ourStatsDigits; ?></p>
                                        <p><?php echo $ourStatsTagLine; ?></p>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                
            </div>
        </div>
    </div>
</section>
<?php
$sec_id = '';
if (!empty($heroSectionPositionLink))
{
    $heroSection_link = isset($heroSectionPositionLink['url']) ? $heroSectionPositionLink['url'] : '';
    if(!empty($heroSection_link))
    {
        $exploded_url = explode( "#", $heroSection_link ); 
        $has_id = $exploded_url[1]; 
        if(!empty($has_id))
        {
            $sec_id = 'id="'.$has_id.'"';
        }
    }
}
?>
<!-- Positions -->
<section class="bg-dark py-40 py-md-60 py-xl-100" <?php echo $sec_id; ?>>
    <div class="container">
        <?php $positionsSubTitle = wp_kses_post(get_field('s5_sub_title')); ?>
        <?php $positionsTitle = wp_kses_post(get_field('s5_title')); ?>
        <?php $positionsDesc = wp_kses_post(get_field('s5_description')); ?>

        <div class="row" data-aos="fade-up">
            <div class="col-md-10 col-lg-8">
                <span class="section-sub-heading"><?php echo $positionsSubTitle; ?></span>
                <h2 class="section-heading text-white"><?php echo $positionsTitle; ?></h2>
                <div class="text-white mb-4 mb-md-5 pb-1 pb-md-4"><?php echo $positionsDesc; ?></div>
            </div>
        </div>

        <div class="row career-position-category-row pb-2 pb-md-5 mb-3 mb-md-0">
            <?php
            echo '<span class="career-position-category-btn active" onClick="HideShowhandleClick(\'all\');" id="cat_all">All Roles</span>';
              
            $terms = get_terms('roles', array('hide_empty' => true, 'order' => 'asc', 'parent' => 0));
            if ($terms) {
                foreach ($terms as $key => $term) {
                    echo '<span class="career-position-category-btn" onClick="HideShowhandleClick(\''.$term->slug.'\');" id="cat_' . $term->slug . '">' . $term->name . '</span>';
                }
            }
            ?>
        </div>

        <?php 
        $args = array(
            'post_type' => 'career-at-aureate',
            'order' => 'DESC',
            'orderby' => 'publish_date',
            'fields' => 'ids',
            'post_status' => 'publish',
            'posts_per_page' => -1,

        );
        $career_positions = new WP_Query($args);
        $s5_career_position =   $career_positions->posts; 
        wp_reset_postdata();
        if ( $s5_career_position) :
        ?>
            <div class="clear career-position-list-cat-wrap all">
                <?php
                $i=1;
                foreach ($s5_career_position as $key => $career_position) {
                    $pos_title = get_the_title($career_position);
                    $pos_link = get_the_permalink($career_position);
                    $career_options = get_field('career_options', $career_position);
                    if ( get_post_status ( $career_position ) === 'publish' ) {
                            ?>
                        <div class="career-position-list d-flex flex-wrap align-items-center" data-aos="fade-up">
                            <p class="career-position-number font-24 text-body mb-0 d-none d-lg-inline-block"><?php echo str_pad( $i++, 2, '0', STR_PAD_LEFT ) . '.';?></p>
                            <p class="career-position-desc font-18 font-md-24 text-white mb-2 mb-lg-0"><a class="text-white" href="<?php echo $pos_link;?>"><?php echo $pos_title; ?></a></p>
                            <?php
                            $learnMoreLink =  'Learn More';
                            $yearsOfExperience = $jobLocation = '';
                            if (!empty($career_options)) :
                                $yearsOfExperience = isset($career_options['required_years_of_exp']) ? $career_options['required_years_of_exp'] : '';
                                $jobLocation = isset($career_options['location']) ? $career_options['location'] : '';
                                $learnMoreLink = isset($career_options['learn_more_text']) ? $career_options['learn_more_text'] : '';
                                $learnMoreLink = !empty($learnMoreLink) ? $learnMoreLink : 'Learn More';
                                ?>
                             <?php endif;?>
                                <p class="career-position-year d-flex align-items-center font-md-20 text-A1A1A1 mb-0 pr-2">
                                    <?php if(!empty($yearsOfExperience)): ?>
                                    <img class="mr-2 mr-md-3" src="<?php echo get_template_directory_uri(); ?>/assets/images/career-position-work-icon.svg" width="20" height="20" alt="Work Icon" title="Work Icon" />
                                    <?php echo $yearsOfExperience; ?>
                                    <?php endif;?>

                                </p>
                                <p class="career-position-location d-flex align-items-center font-md-19 text-A1A1A1 mb-0">
                                <?php if(!empty($jobLocation)): ?>
                                    <img class="mr-2 mr-md-3" src="<?php echo get_template_directory_uri(); ?>/assets/images/career-position-location-icon.svg" width="18" height="21" alt="Career Icon" title="Career Icon" />
                                    <?php echo $jobLocation; ?></p>
                                    <?php endif;?>
                           
                            <div class="career-position-btn d-none d-lg-inline-block">
                                <a rel="nofollow" class="arrow-white-btn" href="<?php echo $pos_link; ?>" title="<?php echo $pos_title; ?>">
                                <span><?php echo $learnMoreLink; ?></span>
                                </a>
                            </div>
                        </div>
                <?php  }
                    } ?>
            </div>
        <?php 
        if ($terms) 
        {
            foreach ($terms as $key => $term) {
                $catid = $term->term_id;
                $catslug = $term->slug;
                $args = array(
                    'post_type' => 'career-at-aureate',
                    'post__in' => $s5_career_position,
                    'orderby' => 'post__in',
                    'posts_per_page' => -1,
                    'tax_query' =>array(
                        array(
                            'taxonomy'  => 'roles',
                            'field'     => 'term_id',
                            'terms'     => $catid
                        )
                    )
                );
                $loop = new WP_Query($args);
                if ($loop->have_posts()) :
                    ?>
                    <div class="clear career-position-list-cat-wrap <?php echo  $catslug; ?>">
                    <?php
                    $i = 1;
                    while ($loop->have_posts()) :
                        $loop->the_post();
                        $career_position = get_the_ID();
                        $pos_title = get_the_title($career_position);
                        $pos_link = get_the_permalink($career_position);
                        $career_options = get_field('career_options', $career_position);
                        if ( get_post_status ( $career_position ) === 'publish' ) {
                            ?>
                            <div class="career-position-list d-flex flex-wrap align-items-center" data-aos="fade-up">
                                <p class="career-position-number font-24 text-body mb-0 d-none d-lg-inline-block"><?php echo str_pad( $i++, 2, '0', STR_PAD_LEFT );?></p>
                                <p class="career-position-desc font-18 font-md-24 text-white mb-2 mb-lg-0"><a class="text-white" href="<?php echo $pos_link;?>"><?php echo $pos_title; ?></a></p>
                                <?php
                                $learnMoreLink =  'Learn More';
                                $yearsOfExperience = $jobLocation = '';
                                if (!empty($career_options)) :
                                    $yearsOfExperience = isset($career_options['required_years_of_exp']) ? $career_options['required_years_of_exp'] : '';
                                    $jobLocation = isset($career_options['location']) ? $career_options['location'] : '';
                                    $learnMoreLink = isset($career_options['learn_more_text']) ? $career_options['learn_more_text'] : '';
                                    $learnMoreLink = !empty($learnMoreLink) ? $learnMoreLink : 'Learn More';
                                    ?>
                                <?php endif;?>
                                    <p class="career-position-year d-flex align-items-center font-md-20 text-A1A1A1 mb-0 pr-2">
                                        <?php if(!empty($yearsOfExperience)): ?>
                                        <img class="mr-2 mr-md-3" src="<?php echo get_template_directory_uri(); ?>/assets/images/career-position-work-icon.svg" width="20" height="20" alt="Work Icon" title="Work Icon" />
                                        <?php echo $yearsOfExperience; ?>
                                        <?php endif;?>

                                    </p>
                                    <p class="career-position-location d-flex align-items-center font-md-19 text-A1A1A1 mb-0">
                                    <?php if(!empty($jobLocation)): ?>
                                        <img class="mr-2 mr-md-3" src="<?php echo get_template_directory_uri(); ?>/assets/images/career-position-location-icon.svg" width="18" height="21" alt="Career Icon"  title="Career Icon" />
                                        <?php echo $jobLocation; ?></p>
                                        <?php endif;?>
                            
                                <div class="career-position-btn d-none d-lg-inline-block">
                                    <a rel="nofollow" class="arrow-white-btn" href="<?php echo $pos_link; ?>" title="<?php echo $pos_title; ?>">
                                    <span><?php echo $learnMoreLink; ?></span>
                                    </a>
                                </div>
                            </div>
                            <?php
                    
                        }
                        endwhile;
                         ?>
                            </div>
                            <?php
                endif;
                wp_reset_postdata();
            }
        }
                    
    endif; ?>
    </div>
</section>

<!-- Process that we follow -->
<section class="py-40 py-md-60 py-xl-100">
    <div class="container">
        <div class="row">

            <div class="col-md-6 pr-xl-5 mb-4 mb-md-0 pb-2 pb-md-0" data-aos="fade-up" data-aos-once="true" >
                <?php $processSubTitle = wp_kses_post(get_field('s6_sub_title')); ?>
                <?php $processTitle = wp_kses_post(get_field('s6_title')); ?>
                <?php $processDesc = wp_kses_post(get_field('s6_description')); ?>

                <span class="section-sub-heading"><?php echo $processSubTitle; ?></span>
                <h2 class="section-heading"><?php echo $processTitle; ?></h2>
                <div class="pr-xl-4 mr-xl-3"><?php echo $processDesc; ?></div>
            </div>

            <?php if (have_rows('s6_interview_process')) : ?>
                <div class="col-md-6">
                <?php $i = 1; while (have_rows('s6_interview_process')) : ?>
                    <?php the_row(); ?>
                    <?php $processTagLine = wp_kses_post(get_sub_field('s6_process_title')); ?>
                    <?php $processDescription = wp_kses_post(get_sub_field('s6_process_description')); ?>
                    <div class="career-process-list py-3 py-md-4" data-aos="fade-up" data-aos-once="true" >
                        <div class="d-flex mb-2 mb-md-3">
                            <p class="career-process-number font-16 font-md-20 mb-0"><?php echo str_pad( $i, 2, '0', STR_PAD_LEFT );?></p>
                            <p class="career-process-title font-16 font-md-20 text-primary mb-0"><?php echo $processTagLine; ?></p>
                        </div>
                        <?php $i++; ?>
                        <div class="career-process-desc"><?php echo $processDescription; ?></div>
                    </div>
                <?php endwhile; ?>
                </div>
            <?php endif; ?>

        </div>
    </div>
</section>

<!-- Our People and Our Pride -->
<section class="bg-light py-40 py-md-60 py-xl-100">
    <div class="container">
        
        <div class="row">
            <div class="col-md-10 col-lg-9 col-xl-8">
                <?php $testimonialSubTitle = wp_kses_post(get_field('s7_sub_title')); ?>
                <?php $testimonialTitle = wp_kses_post(get_field('s7_title')); ?>
                <?php $testimonialDescription = wp_kses_post(get_field('s7_description')); ?>

                <span class="section-sub-heading"><?php echo $testimonialSubTitle; ?></span>
                <h2 class="section-heading"><?php echo $testimonialTitle; ?></h2>
                <div class="mb-5 pr-xl-4"><?php echo $testimonialDescription; ?></div>
            </div>
        </div>
        <?php
        $s7_testimonials = get_field('s7_select_testimonials');
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

<!-- Partnerships & Recognitions -->
<section class="py-40 py-md-60 py-xl-100">
    <div class="container">

        <div class="row">
            <div class="col-md-10 col-lg-8 col-lg-7" data-aos="fade-up">
                <?php $partnershipSubTitle = wp_kses_post(get_field('s8_sub_title')); ?>
                <?php $partnershipTitle = wp_kses_post(get_field('s8_title')); ?>
                <?php $partnershipDescription = wp_kses_post(get_field('s8_description')); ?>


                <span class="section-sub-heading"><?php echo $partnershipSubTitle; ?></span>
                <h2 class="section-heading"><?php echo $partnershipTitle; ?></h2>
                <div class="mb-5 pr-xl-4"><?php echo $partnershipDescription; ?></div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3 mb-md-0" data-aos="fade-up">
                <?php $partnershipCertifiedLogo = wp_get_attachment_image(get_field('s8_certified_logo'), 'full'); ?>
                <?php echo $partnershipCertifiedLogo; ?>
            </div>
            <div class="col-md-6" data-aos="fade-up">
                <?php $partnershipPartnerLogoImage = wp_get_attachment_image(get_field('s8_partner_image'), 'full'); ?>
                <?php echo $partnershipPartnerLogoImage; ?>
            </div>
        </div>

    </div>
</section>

<script>

    function HideShowhandleClick(id) {
        console.log(id);
        document.querySelectorAll('.career-position-category-row .career-position-category-btn').forEach(ele => {
            ele.classList.remove('active');
        });
        document.querySelectorAll('.career-position-list-cat-wrap').forEach(ele => {
            ele.style.display = 'none';
        });

        document.querySelectorAll('.'+id+' .career-position-list').forEach(ele => {
            ele.classList.add('aos-animate');
        })

        document.getElementById("cat_" + id).classList.add("active");
        document.getElementsByClassName(id)[0].style.display = 'block';
    }

    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
</script>
<?php get_footer(); ?>