<?php
if (!empty($args)) :
    $background_color = isset($args['s22_select_background_color']) ? $args['s22_select_background_color'] : '';
    $title = isset($args['s22_sm_title']) ? $args['s22_sm_title'] : '';
    $s22_sm_description = isset($args['s22_sm_description']) ? $args['s22_sm_description'] : '';
    
    $featureslist_data = isset($args['featureslist_data']) ? $args['featureslist_data'] : array();
    $size = 'full';
    $placeHolderImage = wp_get_attachment_image(get_field('theme_placeholder_image', 'option'), array(100, 100));

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
?>
    <!-- dark-bg-features-list -->
    <section class="dark-bg-features-list pt-40 pt-md-100 pb-25 pb-md-60 <?php echo $backColor; ?>">
        <div class="container">
            <?php
            if (!empty($title)) : ?>
                <h2 class="section-heading" data-aos="fade-up">
                    <?php echo $title; ?>
                </h2>
            <?php endif; ?>
            <?php
            if (!empty($s22_sm_description)) : ?>
                <p class="section-description" data-aos="fade-up">
                    <?php echo $s22_sm_description; ?>
                </p>
            <?php endif; ?>
            <?php if (!empty($featureslist_data)) : ?>
                <?php
                $name_with_number = isset($featureslist_data['s22_sm_name_with_number']) ? $featureslist_data['s22_sm_name_with_number'] : array();
                $featureslist = isset($featureslist_data['s22_sm_featureslist']) ? $featureslist_data['s22_sm_featureslist'] : array();
                ?>
                <?php if (!empty($featureslist)) : ?>
                    <div class="row">
                        <?php
                        $count = 1;
                        $dir_path = get_template_directory();
                        $dir_url = get_template_directory_uri();
                        $iconPlaceHolderImage = wp_get_attachment_image(get_field('theme_placeholder_image', 'option'), array(100, 100));
                        foreach ($featureslist as $key => $featureslist_data) :
                            $iconImage = isset($featureslist_data['s22_sm_features_list_icon']) ? $featureslist_data['s22_sm_features_list_icon'] : '';
                            $titles = isset($featureslist_data['s22_sm_featureslist_name']) ? $featureslist_data['s22_sm_featureslist_name'] : '';
                            $desc = isset($featureslist_data['s22_sm_featureslist_description']) ? $featureslist_data['s22_sm_featureslist_description'] : '';
                            $size = 'full';
                        ?>

                            <div class="col-md-4" data-aos="fade-up">
                                <?php if (!empty($iconImage) || !empty($titles) || !empty($desc)) : ?>
                                    <?php
                                    if(!empty($iconImage))
                                    {
                                        $svg_path = $dir_path.'/assets/icons/'.$iconImage.'.svg';
                                        if ( file_exists( $svg_path ) ) 
                                        {
                                            $svg = $dir_url.'/assets/icons/'.$iconImage.'.svg';
                                            if(!empty($svg))
                                            {   ?>
                                                 <div class="pb-16 pb-md-24">
                                                    <img src="<?php echo $svg; ?>" title="<?php echo $titles; ?>" alt="<?php echo $titles; ?>"/>   
                                                </div>                                            
                                                <?php
                                            }
                                        }
                                        else
                                        {   ?>
                                             <div class="pb-16 pb-md-24">
                                            <?php echo $iconPlaceHolderImage; ?>
                                            </div>   
                                            <?php
                                        }
                                    } 
                                    else
                                    {   ?>
                                            <div class="pb-16 pb-md-24">
                                        <?php echo $iconPlaceHolderImage; ?>
                                        </div>   
                                        <?php
                                    }
                                    ?>
                                    <?php if (!empty($titles)) : ?>

                                        <h3 class="pb-8 pt-md-24 pt-16 font-16 pb-md-12 font-md-18 text-primary font-weight-medium">
                                            <?php if (!empty($name_with_number)) : ?>
                                                <span class="list-counter font-16 font-md-20">
                                                    <?php
                                                    echo str_pad($count, 2, '0', STR_PAD_LEFT . '.');
                                                    ?>.
                                                </span>
                                            <?php endif; ?>
                                            <?php echo $titles; ?>
                                        </h3>
                                    <?php endif; ?>
                                    <?php if (!empty($desc)) : ?>
                                        <p class="font-14 link-description">
                                            <?php echo $desc; ?>
                                        </p>
                                    <?php endif; ?>
                                <?php endif;

                                $count++; ?>
                            </div>
                        <?php endforeach; ?>

                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>