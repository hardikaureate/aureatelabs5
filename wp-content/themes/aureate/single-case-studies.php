<?php
get_header();


$cs_sub_heading = get_field('cs_sub_heading');
$cs_heading_title = get_field('cs_heading_title');
$cs_heading_cta = get_field('cs_heading_cta');
if(!empty($cs_sub_heading ) || !empty($cs_heading_title ) || !empty($cs_heading_cta ))
{
    ?>
    <!-- Banner section -->
    <section class="pt-5 pt-lg-60 pt-lg-100">
        <div class="container pt-5 pb-5 mb-md-4">
            <div class="case-study-detail-banner pt-2 pt-lg-0 px-4 px-md-0 mb-lg-2">
                <?php
                    if(!empty($cs_sub_heading))
                    {   ?>
                        <p class="mb-0 font-md-30"><?php echo $cs_sub_heading; ?></p>
                        <?php
                    }
                    
                    if(!empty($cs_heading_title))
                    {   ?>
                        <h1 class="mb-0"><?php echo $cs_heading_title; ?></h1>
                        <?php
                    }

                    if(!empty($cs_heading_cta))
                    {   $cs_link = isset($cs_heading_cta['url']) ? $cs_heading_cta['url'] : '';
                        $cs_title = isset($cs_heading_cta['title']) ? $cs_heading_cta['title'] : '';
                        $cs_target = !empty($cs_heading_cta['target']) ? 'target="_blank"' : '';
                        if (!empty($cs_link) && !empty($cs_title)) {   ?>
                            <a class="arrow-btn arrow-btn-45 mt-4 mt-lg-5" href="<?php echo esc_url($cs_link); ?>" <?php echo $cs_target; ?>><span><?php echo esc_html($cs_title) ?></span></a>
                            <?php
                        }
                    }
                ?>
            </div>
        </div>
    </section>
    <?php
}
$sec_id = '';
$cs_heading_cta = get_field('cs_heading_cta', get_the_ID());
if(!empty($cs_heading_cta))
{   
        $cs_link = isset($cs_heading_cta['url']) ? $cs_heading_cta['url'] : '';
        $url= explode('#', $cs_link);
        if(!empty($url))
        {
        $url_id = $url[1];
        if(!empty($url_id))
        {
            $sec_id = 'id="'.$url_id.'"';
        }
    }
    
}

if( have_rows('case_study_sections') ){
    echo '<div '. $sec_id.'>';
    while ( have_rows('case_study_sections') ) : the_row();

        if( get_row_layout() == 's1_banner_section' )
        {
            $s1_banner_data = get_sub_field('s1_banner_data');

            if(!empty($s1_banner_data))
            {
                get_template_part( 'template-parts/content', 'cs_banner_section', $s1_banner_data );
            }
        
        }
        elseif( get_row_layout() == 's2_study_details' )
        {
            $study_details = get_sub_field('study_details');
            if(!empty($study_details))
            {
                get_template_part( 'template-parts/content', 'cs_study_details', $study_details );
            }
            
        }
        elseif( get_row_layout() == 's3_study_about' )
        {
            $study_about = get_sub_field('study_about');
            if(!empty($study_about))
            {
                get_template_part( 'template-parts/content', 'cs_study_about', $study_about );
            } 
        }
        elseif( get_row_layout() == 's4_study_challenges' )
        {
            $study_challenges = get_sub_field('study_challenges');
            if(!empty($study_challenges))
            {
                get_template_part( 'template-parts/content', 'cs_study_challenges', $study_challenges );
            } 
        }
        elseif( get_row_layout() == 's4_study_solution' )
        {
            $study_solution = get_sub_field('study_solution');
            if(!empty($study_solution))
            {
                get_template_part( 'template-parts/content', 'cs_study_solution', $study_solution );
            } 
        }
        elseif( get_row_layout() == 's5_study_screenshot_with_description' )
        {
            $study_ss_desc = get_sub_field('study_ss_desc');
            if(!empty($study_ss_desc))
            {
                get_template_part( 'template-parts/content', 'cs_study_screenshot', $study_ss_desc );
            } 
        }
        elseif( get_row_layout() == 's6_study_screenshots' )
        {
            $cs_study_screenshots = get_sub_field('cs_study_screenshots');
            if(!empty($cs_study_screenshots))
            {
                get_template_part( 'template-parts/content', 'cs_study_screenshot', $cs_study_screenshots );
            } 
        }
        elseif( get_row_layout() == 's7_study_testimonial' )
        {
            $study_testimonial = get_sub_field('study_testimonial');
            if(!empty($study_testimonial))
            {
                get_template_part( 'template-parts/content', 'cs_study_testimonial', $study_testimonial );
            } 
        }
        elseif( get_row_layout() == 's9_result_that_we_delivered' )
        {
            $study_result_delivered = get_sub_field('study_result_delivered');
            if(!empty($study_result_delivered))
            {
                get_template_part( 'template-parts/content', 'cs_result_that_we_delivered', $study_result_delivered );
            } 
        }
    endwhile;
    echo '</div>';
}

$cs_link = $cs_title = $cs_mobile_title = '';
$view_case_study_section = get_field('view_case_study_section', 'option');
if (!empty($view_case_study_section)) 
{
    $view_case_study = isset($view_case_study_section['view_case_study']) ? $view_case_study_section['view_case_study'] : '';
    $view_case_study_text_for_mobile = isset($view_case_study_section['view_case_study_text_for_mobile']) ? $view_case_study_section['view_case_study_text_for_mobile'] : '';
    if (!empty($view_case_study)) 
    {
        $cs_link = isset($view_case_study['url']) ? $view_case_study['url'] : '';
        $cs_title = isset($view_case_study['title']) ? $view_case_study['title'] : '';
        $cs_target = !empty($view_case_study['target']) ? 'target="_blank"' : '';
        $cs_mobile_title = $cs_title;
                  
    }
    if (!empty($view_case_study_text_for_mobile)) 
    {
        $cs_mobile_title = $view_case_study_text_for_mobile; 
    }
}

$next_post = get_adjacent_post(false, '', false);
$previous_post = get_adjacent_post(false, '', true);
?>
<div class="bg-light py-4 py-md-5">
    <div class="container py-md-2">
        <div class="row">
            <div class="col-4 col-md-4 text-left">
                <?php
                if(!empty($next_post))
                {
                    $next_post_url = get_the_permalink($next_post);
                    $next_post_title = get_the_title($next_post);
                    ?>
                        <span class="d-block pb-3 line-height-0">
                            <a class="d-inline-block" href="<?php echo $next_post_url; ?>">
                                <img src="<?php echo get_template_directory_uri() . '/assets/images/short-left-arrow.svg'; ?>" alt="Previous Case Study" title="Previous Case Study" class="vuestorefront-previous-arrow">
                            </a>
                        </span>
                        <span class="font-12 font-md-20 d-none d-md-block">
                            <a class="d-inline-block" href="<?php echo $next_post_url; ?>">
                                <?php echo $next_post_title; ?>
                            </a>
                        </span>
                        <span class="font-12 font-md-20 d-block d-md-none">
                            <a class="d-inline-block" href="<?php echo $next_post_url; ?>">
                                Previous
                            </a>
                        </span>
                    <?php
                }
                ?>
            </div>
            
            <div class="col-4 col-md-4 text-center">
                <?php
                if (!empty($cs_link) && !empty($cs_title)) 
                {   ?>
                    
            
                        <span class="d-block pb-3 line-height-0">
                            <a class="d-inline-block" href="<?php echo esc_url($cs_link); ?>" <?php echo $cs_target; ?>>
                                <img src="<?php echo get_template_directory_uri() . '/assets/images/four-square.svg'; ?>" alt="<?php echo $cs_title; ?>"  title="<?php echo $cs_title; ?>" class="vuestorefront-view-all">
                            </a>
                        </span>
                        <span class="font-12 font-md-20 d-none d-md-block">
                            <a class="d-inline-block" href="<?php echo esc_url($cs_link); ?>" <?php echo $cs_target; ?>>
                                <?php echo $cs_title; ?>
                            </a>
                        </span>
                        <span class="font-12 font-md-20 d-block d-md-none">
                            <a class="d-inline-block" href="<?php echo esc_url($cs_link); ?>" <?php echo $cs_target; ?>>
                                <?php echo $cs_mobile_title; ?>
                            </a>
                        </span>
                    <?php
                    }
                    ?>
                </div>
                
            <div class="col-4 col-md-4 text-right">
                <?php
                if(!empty($previous_post))
                {
                    $previous_post_url = get_the_permalink($previous_post);
                    $previous_post_title = get_the_title($previous_post);
                    ?>
                   
                        <span class="d-block pb-3 line-height-0">
                            <a class="d-inline-block" href="<?php echo $previous_post_url; ?>">
                                <img src="<?php echo get_template_directory_uri() . '/assets/images/short-right-arrow.svg'; ?>" alt="Next Case Study" title="Next Case Study" class="vuestorefront-next-arrow" />
                            </a>
                        </span>
                        <span class="font-12 font-md-20 d-none d-md-block">
                            <a class="d-inline-block" href="<?php echo $previous_post_url; ?>">    
                                <?php echo $previous_post_title; ?>
                            </a>
                        </span>
                        <span class="font-12 font-md-20 d-block d-md-none">
                            <a class="d-inline-block" href="<?php echo $previous_post_url; ?>">Next</a>
                        </span>
                    
                    <?php
                    }
                ?>
            </div>
        </div>
    </div>
</div>
<?php
get_footer(); ?>