<?php
if (!empty($args)) :
    $title = isset($args['more_powerful_features_title']) ? $args['more_powerful_features_title'] : '';
    $theme_features_list = isset($args['powerful_features_list']) ? $args['powerful_features_list'] : array();
?>
     <!-- Content_powerful_features_list -->
     <section class="py-40  py-xl-100 content_powerful_features_list">
        <div class="container">
            <?php if (!empty($title)) : ?>
                <h2 class="section-heading m-0 pb-10" data-aos="fade-up">
                    <?php echo $title; ?>
                </h2>
            <?php endif; ?>
            <div class="row">
                <?php
                $dir_path = get_template_directory();
                $dir_url = get_template_directory_uri();
                $iconPlaceHolderImage = wp_get_attachment_image(get_field('theme_placeholder_image', 'option'), array(100, 70));
                foreach ($theme_features_list as $key => $features_list) :
                    $ServiceIcon = $features_list['powerful_features_list_icon'] ? $features_list['powerful_features_list_icon'] : '';
                    $listTitle = $features_list['powerful_features_listtitle'] ? $features_list['powerful_features_listtitle'] : '';
                    $size = 'full';
                    $placeHolderImage = wp_get_attachment_image(get_field('theme_placeholder_image', 'option'), array(100, 100)); ?>
                        <div class="col-md-4 pt-16 pt-md-40 ">
                            <div class="content_powerful_list_box pl-24 pr-24 pt-24 pb-24 pl-24 pr-md-30 pt-md-30 pb-md-30">
                                <?php
                                if(!empty($ServiceIcon))
                                {
                                    $svg_path = $dir_path.'/assets/icons/'.$ServiceIcon.'.svg';
                                    if ( file_exists( $svg_path ) ) 
                                    {
                                        $svg = $dir_url.'/assets/icons/'.$ServiceIcon.'.svg';
                                        if(!empty($svg))
                                        {   ?>
                                            <img src="<?php echo $svg; ?>" title="<?php echo $sellMoreBoostTitle; ?>" alt="<?php echo $sellMoreBoostTitle; ?>"/>                                               
                                            <?php
                                        }
                                    }
                                    else
                                    {   
                                        echo $iconPlaceHolderImage;
                                    }
                                }
                                else
                                {   
                                    echo $iconPlaceHolderImage;
                                } 
                                ?>
                                
                                <?php if (!empty($listTitle)) : ?>
                                    <p class="pt-16 font-16 font-md-18  pt-md-27 font-weight-medium text-primary" data-aos="fade-up">
                                        <?php echo $listTitle; ?>
                                    </p>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>