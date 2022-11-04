<?php
if (!empty($args)) :
    $background_color = isset($args['s13_bg_color']) ? $args['s13_bg_color'] : '';
    $testimonial_sub_title = isset($args['s13_sm_sub_title']) ? $args['s13_sm_sub_title'] : '';
    $testimonial_title = isset($args['s13_sm_title']) ? $args['s13_sm_title'] : '';
    $testimonials = isset($args['s13_sm_testimonials_list']) ? $args['s13_sm_testimonials_list'] : array();
    $caseStudies = isset($args['s13_sm_casestudies_list']) ? $args['s13_sm_casestudies_list'] : array();
    $testimonial_partner_logo = isset($args['s13_sm_testimonial_data_logo']) ? $args['s13_sm_testimonial_data_logo'] : '';
    $select_type = isset($args['select_type']) ? $args['select_type'] : '';

    $backColor = 'bg-white';
    if (!empty($background_color)) {
        if ($background_color == 'light') {
            $backColor = "bg-light";
        } elseif ($background_color == 'dark') {
            $backColor = "bg-dark";
        } else {
            $backColor = "bg-white";
        }
    }

    if (!empty($backColor) || !empty($testimonial_sub_title) || !empty($testimonial_title) || !empty($testimonial) || !empty($testimonial_partner_logo)) :   ?>
        <!-- S8 Study Testimonial  -->
        <section class="testimonials-dark <?php echo $backColor; ?>">
           <?php if(($select_type == 'testimonials')) : ?>
                <div class="container py-40 py-md-60 py-xl-100">
                <?php
                if (!empty($testimonial_sub_title)) :   ?>
                    <span data-aos="fade-up" class="section-sub-heading text-white"><?php echo $testimonial_sub_title; ?></span>
                <?php
                endif;
                
                if (!empty($testimonial_title)) :   ?>
                    <h2 class="section-heading"><?php echo $testimonial_title; ?></h2>
                <?php
                endif;  
                ?>
                <div class="row d-flex flex-wrap testimonials-row-parent">
                    <?php
                    if (!empty($select_type == 'testimonials')) :
                        if (!empty($testimonials)) :
                            get_template_part('template-parts/content', 'testimonials', $testimonials);
                        endif;
                    endif;
                    ?>
                    <?php
                    if (!empty($testimonial_partner_logo)) :
                        $size = 'full';
                        $placeHolderImage = wp_get_attachment_image(get_field('theme_placeholder_image', 'option'), array(62, 62));
                    ?>
                        <div class="testimonials-img  pt-30 py-md-0 col-md-6" data-aos="fade-up">
                            <?php echo wp_get_attachment_image($testimonial_partner_logo, $size); ?>
                        </div>
                    <?php else : ?>
                        <span><?php echo $placeHolderImage; ?></span>
                    <?php endif; ?>
                </div>
            </div>
            <?php endif; ?>
            <?php if(($select_type == 'casestudies')) : ?>
            <div class="success-story-section">
                <div class="container pt-md-100 py-40 pb-md-60">
                <?php
                
                    if (!empty($testimonial_title)) :   ?>
                        <h2 data-aos="fade-up" class="section-heading mb-0 pb-30 pb-md-50"><?php echo $testimonial_title; ?></h2>
                    <?php
                    endif;
                
                ?>    
                    <?php
                        if (!empty($select_type == 'casestudies')) :
                            if (!empty($caseStudies)) :
                                get_template_part('template-parts/content', 'casestudy', $caseStudies);
                            endif;
                        endif;
                        /*if (!empty($testimonials)) {
                                foreach ($testimonials as $key => $testimonial) {
                                    $testimonial_details = get_field('testimonial_details', $testimonial);
                                    if (!empty($testimonial_details)) {
                                        $name = get_the_title($testimonial);
                                        $testimonial = isset($testimonial_details['testimonial']) ? $testimonial_details['testimonial'] : '';
                                        $designation = isset($testimonial_details['designation']) ? $testimonial_details['designation'] : '';
                                        $rating = isset($testimonial_details['rating']) ? $testimonial_details['rating'] : '';
                                        $photo = isset($testimonial_details['photo']) ? $testimonial_details['photo'] : array();
                                ?>
                                        <div>
                                            <div>
                                                <?php
                                                if (!empty($testimonial) || !empty($designation) || !empty($rating) || !empty($photo)) {
                                                    if (!empty($testimonial) || !empty($rating)) {   ?>
                                                        <div>
                                                            <div>
                                                                <?php
                                                                if (!empty($testimonial)) {
                                                                    echo '<p class="text-primary">' . $testimonial . '</p>';
                                                                }
                                                                if (!empty($rating)) {
                                                                    for ($i = 1; $i <= 5; $i++) {
                                                                        if ($i <= $rating) {
                                                                            $url = get_template_directory_uri() . '/assets/images/single-star.svg';
                                                                        } else {
                                                                            $url = get_template_directory_uri() . '/assets/images/single-star-empty.svg';
                                                                        }
                                                                ?>
                                                                        <img src="<?php echo $url; ?>" title="star" alt="star" class="star" />
                                                                <?php
                                                                    }
                                                                }
                                                                ?>
                                                            </div>
                                                        </div>
                                                    <?php
                                                    }

                                                    if (!empty($name) || !empty($photo) || !empty($designation)) {
                                                        $url = isset($photo['url']) ? $photo['url'] : '';
                                                    ?>
                                                        <div class="testimomial-user d-flex align-items-center pl-2 pl-md-3 ml-1">


                                                            <?php
                                                            if (!empty($url)) {
                                                                $title = isset($photo['title']) ? $photo['title'] : '';
                                                                $alt = isset($photo['alt']) ? $photo['alt'] : '';
                                                                $width = isset($photo['width']) ? $photo['width'] : '';
                                                                $height = isset($photo['alt']) ? $photo['alt'] : '';
                                                            ?>
                                                                <img src="<?php echo $url; ?>" title="<?php echo $name; ?>" alt="<?php echo $name; ?>" class="mr-2 mr-md-3" />
                                                            <?php
                                                            }
                                                            echo '<p class="font-14 font-md-17 text-mine-shaft"> <b>' . $name . '</b>';
                                                            if (!empty($designation)) {
                                                                echo '<span class="d-block font-12 font-md-14 font-weight-normal text-body">' . $designation . '</span>';
                                                            }
                                                            echo '</p>';
                                                            ?>
                                                        </div>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </div>
                                <?php
                                    }
                                }
                            }*/
                    ?>
                </div>
                </div>
                <?php endif; ?>
        </section>
<?php
    endif;
endif;
