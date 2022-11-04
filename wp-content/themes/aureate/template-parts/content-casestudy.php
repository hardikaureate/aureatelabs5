<?php
if (!empty($args)) {   ?>
    <div class="row success-story-box-row">
        <?php
        foreach ($args as $key => $case_study) {
            if (get_post_status($case_study) != 'publish') {
                continue;
            }
            $cs_heading_title = get_field('cs_heading_title', $case_study);
            $grid_category = get_field('grid_category', $case_study);
            $case_study_work = get_field('case_study_work', $case_study);
            $grid_business_type = get_field('grid_business_type', $case_study);
            $grid_location = get_field('grid_location', $case_study);
            $grid_logo = get_field('grid_logo', $case_study);
            $grid_cta_text = get_field('grid_cta_text', $case_study);
            $link = get_the_permalink($case_study);
            $title = get_the_title($case_study);

            if (!empty($cs_heading_title) || !empty($grid_category) || !empty($case_study_work) || !empty($grid_business_type) || !empty($grid_location) || !empty($grid_logo)) {
        ?>
                <div class="col-md-6 mb-md-4 pb-3" data-aos="fade-up">
                    <?php
                    if (!empty($link)) { ?>
                            <a href="<?php echo esc_url($link); ?>" class="success-link">
                                <div class="success-story-box bg-white p-4 h-100 arrow-btn-hover">
                                    <div class="d-flex  align-items-start flex-column justify-content-between p-lg-3 h-100">
                                            <div class="clear">
                                                <?php
                                                if (!empty($grid_logo) && is_array($grid_logo)) {

                                                    //$img_id  = isset($grid_logo['id']) ? $grid_logo['id'] : '';  
                                                    //$srcset = wp_get_attachment_image_srcset($img_id );
                                                    $img_src  = isset($grid_logo['url']) ? $grid_logo['url'] : '';
                                                    if (!empty($img_src)) {
                                                        $width  = isset($grid_logo['width']) ? $grid_logo['width'] : '';
                                                        $height  = isset($grid_logo['height']) ? $grid_logo['height'] : '';

                                                        $width =  !empty($width) ? 'width="' . $width . '"' : '';
                                                        $height =  !empty($height) ? 'height="' . $height . '"' : '';

                                                ?>
                                                        <div class="success-story-logo d-flex mb-3 mb-md-4 pb-2">
                                                            <img src="<?php echo esc_url($img_src); ?>" srcset="<?php //echo esc_attr( $srcset ); 
                                                                                                                ?>" <?php echo $width; ?> <?php echo $height; ?> alt="<?php echo $grid_logo['alt']; ?>" title="<?php echo $grid_logo['title']; ?>">
                                                        </div>
                                                    <?php
                                                    }
                                                }
                                                if (!empty($grid_business_type)) {  ?>
                                                    <span class="success-story-badge"><?php echo wp_kses_post($grid_business_type); ?></span>
                                                <?php
                                                }
                                                if (!empty($cs_heading_title)) {   ?>
                                                    <h3 class="font-weight-normal text-primary d-inline-block font-14 font-md-24 pb-20 pb-md-24 mb-0 mr-xl-3"><?php echo wp_kses_post($cs_heading_title); ?></h3>
                                                <?php
                                                }
                                                if (!empty($case_study_work)) {  ?>
                                                    <p class="success-story-sector success-story-setting font-12 font-md-20 mb-2 mb-md-4"><?php echo wp_kses_post($case_study_work); ?></p>
                                                <?php
                                                }
                                                if (!empty($grid_category)) {  ?>
                                                    <p class="success-story-sector font-12 font-md-20 mb-2 mb-md-4"><?php echo wp_kses_post($grid_category); ?></p>
                                                <?php
                                                }
                                                if (!empty($grid_location)) {   ?>
                                                    <p class="success-story-country font-12 font-md-20 mb-4 pb-1"><?php echo wp_kses_post($grid_location); ?></p>

                                                <?php
                                                }
                                                ?>
                                            </div>
                                        <?php
                                        if ($link) {
                                            $linl_text = !empty($grid_cta_text) ? $grid_cta_text : 'View Case Study';
                                            //$linl_text = is_front_page() ? $title :  $linl_text;    
                                        ?>
                                        <div class="arrow-btn">
                                            <span><?php echo esc_html($linl_text) ?></span>
                                        </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </a>
                        
                    <?php } ?>
                </div>
        <?php
            }
        } ?>
    </div>
<?php
}
