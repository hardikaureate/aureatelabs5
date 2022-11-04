<?php
if (!empty($args)) :
    $title = isset($args['s15_sm_title']) ? $args['s15_sm_title'] : '';
    $categoryContent = isset($args['s15_sm_category_content_group_listing']) ? $args['s15_sm_category_content_group_listing'] : array();
    $CTALink = isset($args['s15_sm_cta_link']) ? $args['s15_sm_cta_link'] : '';
?>

    <section class="storefont-expert-section py-40 py-md-60 py-xl-100 bg-white">
        <div class="container">
            <?php if (!empty($title)) : ?>
                <h2 class="section-heading text-dark" data-aos="fade-up"> 
                    <?php echo $title; ?>
                </h2>
            <?php endif; ?>

            <?php if (!empty($categoryContent)) :
                $dir_path = get_template_directory();
                $dir_url = get_template_directory_uri();
                $iconPlaceHolderImage = wp_get_attachment_image(get_field('theme_placeholder_image', 'option'), array(100, 70));
            ?>
                <?php if (!empty($categoryContent)) : ?>
                    <div class="row">
                        <?php
                        foreach ($categoryContent as $key => $categoryContent_data) :
                            $iconImage = isset($categoryContent_data['s15_sm_hiring_category_icon_image']) ? $categoryContent_data['s15_sm_hiring_category_icon_image'] : '';
                            $hiring_title = isset($categoryContent_data['s15_sm_hiring_category_hiring_title']) ? $categoryContent_data['s15_sm_hiring_category_hiring_title'] : '';
                            $category_data = isset($categoryContent_data['s15_sm_category_data']) ? $categoryContent_data['s15_sm_category_data'] : array();
                            $size = 'full';
                            $placeHolderImage = wp_get_attachment_image(get_field('theme_placeholder_image', 'option'), array(62, 62));
                        ?>
                            <div class="col-md-6 storefont-expert-col-main">
                                <div class="storefont-expert-col h-100" data-aos="fade-up">
                                    <?php if (!empty($iconImage) || !empty($hiring_title)) : ?>
                                        <div class="storefont-expert-upper px-4 px-md-40 py-3 py-md-20 d-flex align-items-center bg-light">
                                            <?php
                                            if (!empty($iconImage)) {
                                                $svg_path = $dir_path . '/assets/icons/' . $iconImage . '.svg';
                                                if (file_exists($svg_path)) {
                                                    $svg = $dir_url . '/assets/icons/' . $iconImage . '.svg';
                                                    if (!empty($svg)) {   ?>
                                                            <img src="<?php echo $svg; ?>" title="<?php echo $hiring_title; ?>" alt="<?php echo $hiring_title; ?>" />
                                                    <?php
                                                    }
                                                } else {   ?>
                                                        <?php echo $iconPlaceHolderImage; ?>
                                                <?php
                                                }
                                            } else {   ?>
                                                    <?php echo $iconPlaceHolderImage; ?>
                                            <?php
                                            }
                                            ?>
                                            <?php if (!empty($hiring_title)) : ?>
                                                <span class="pl-20 font-16 font-md-20 font-weight-bold text-primary">
                                                    <?php echo $hiring_title; ?>
                                                </span>
                                            <?php endif; ?>
                                        </div>
        
                                        <?php if (!empty($category_data)) : ?>
                                            <div class="storefont-expert-lower">
                                                <?php
                                                foreach ($category_data as $key => $category_datalist) :
                                                    $cat_content_title = isset($category_datalist['s15_sm_category_content_group_title']) ? $category_datalist['s15_sm_category_content_group_title'] : '';
                                                    $cat_content_desc = isset($category_datalist['s15_sm_category_content_group_content']) ? $category_datalist['s15_sm_category_content_group_content'] : '';
                                                    $cat_content_image = isset($category_datalist['s15_sm_technology_image']) ? $category_datalist['s15_sm_technology_image'] : array();
                                                ?>
                                                    <?php if (!empty($cat_content_title) || !empty($cat_content_desc)) : ?>
                                                        <div class="storefont-expert-lower-row d-flex align-items-center">
                                                                <?php if (!empty($cat_content_title)) : ?>
                                                                    <div class="storefont-expert-lower-label font-weight-medium text-primary">
                                                                        <?php echo $cat_content_title; ?>
                                                                </div>
                                                                <?php endif; ?>
        
                                                                <?php if (!empty($cat_content_desc)) : ?>
                                                                    <div class="link-description storefont-expert-lower-data  ml-40">
                                                                        <?php echo $cat_content_desc; ?>
                                                                    </div>
                                                                <?php endif; ?>
        
                                                                <?php if (!empty($cat_content_image)) : ?>
                                                                    <div class="storefont-expert-lower-data ml-40">
                                                                        <?php
                                                                        foreach ($cat_content_image as $key => $cat_content_imagelist) :
                                                                            $techno_image = isset($cat_content_imagelist['s15_sm_technology_image_image']) ? $cat_content_imagelist['s15_sm_technology_image_image'] : '';
                                                                            $size = 'full';
                                                                            $placeHolderImage = wp_get_attachment_image(get_field('theme_placeholder_image', 'option'), array(50, 50));
                                                                        ?>
                                                                            <?php if (!empty($techno_image)) : ?>
                                                                                <?php if (!empty($techno_image)) : ?>
                                                                                    <span class="mr-20">
                                                                                        <?php echo wp_get_attachment_image($techno_image, $size); ?>
                                                                                    </span>
                                                                                <?php else : ?>
                                                                                    <?php echo $placeHolderImage; ?>
                                                                                <?php endif; ?>
                                                                            <?php endif; ?>
                                                                        <?php endforeach; ?>
                                                                    </div>
                                                                <?php endif; ?>
                                                            </div>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            <?php endif; ?>

            <?php
            if (!empty($CTALink)) :
                $engage_link = isset($CTALink['url']) ? $CTALink['url'] : '';
                $engage_title = isset($CTALink['title']) ? $CTALink['title'] : '';
                $engage_target = !empty($CTALink['target']) ? 'target="_blank"' : '';

                $engage_link = filter_var($engage_link, FILTER_SANITIZE_URL);
                if (filter_var($engage_link, FILTER_VALIDATE_URL) !== false) 
                {
                    $url = esc_url($engage_link);
                }
                else
                {
                    $url = '#knowmore';
                    $engage_target = '';
                }
                if (!empty($url)) :   ?>
                    <div class="text-center mt-4 mt-md-5">
                        <a class="arrow-btn" href="<?php echo $url; ?>" <?php echo $engage_target; ?> title="<?php echo $engage_title; ?>">
                            <span><?php echo $engage_title; ?></span>
                        </a>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>
