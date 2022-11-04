<?php
if (!empty($args)) :
    $services_datalist = isset($args['services_datalist']) ? $args['services_datalist'] : array();
?>
    <!-- content_vsf_theme_services_list -->
    <section class="py-40  py-xl-100 content_powerful_features_list  bg-light">
        <div class="container">
            <div class="row">
            <?php
            $dir_path = get_template_directory();
            $dir_url = get_template_directory_uri();
            $iconPlaceHolderImage = wp_get_attachment_image(get_field('theme_placeholder_image', 'option'), array(100, 70));
            foreach ($services_datalist as $key => $allServices) :
                $ServiceIcon = $allServices['services_datalist_icon'] ? $allServices['services_datalist_icon'] : '';
                $serviceList = $allServices['services_datalist_title'] ? $allServices['services_datalist_title'] : '';
                $contentList = $allServices['services_content_list'] ? $allServices['services_content_list'] : '';
                $size = 'full';
                $placeHolderImage = wp_get_attachment_image(get_field('theme_placeholder_image', 'option'), array(100, 100)); ?>
                
                    <div class="col-md-6">
                        <div class="powerful_features_list_box aos-init aos-animate" data-aos="fade-up">
                            <div class="align-items-center d-flex powerful_features_list_title pt-16 pb-16 pr-24 pl-24 pt-md-20 pb-md-20 pr-md-40 pl-md-40">
                                <?php
                                    if(!empty($ServiceIcon))
                                    {
                                        $svg_path = $dir_path.'/assets/icons/'.$ServiceIcon.'.svg';
                                        if ( file_exists( $svg_path ) ) 
                                        {
                                            $svg = $dir_url.'/assets/icons/'.$ServiceIcon.'.svg';
                                            if(!empty($svg))
                                            {   ?>
                                                <img src="<?php echo $svg; ?>" title="<?php echo $serviceList; ?>" alt="<?php echo $serviceList; ?>"/>                                               
                                                <?php
                                            }
                                        }
                                        else
                                        {   ?>
                                            <?php   echo $iconPlaceHolderImage; ?>
                                            <?php
                                        }
                                    } 
                                ?>
                                <?php if (!empty($serviceList)) : ?>
                                    <p class="font-weight-medium font-md-18 font-16 text-primary pl-16">
                                        <?php echo $serviceList; ?>
                                    </p>
                                <?php endif; ?>

                            </div>
                            <div class="pt-24 pb-24 pr-24 pl-24 pt-md-40 pb-md-40 pr-md-40 pl-md-40">
                                    <?php if (!empty($contentList)) : ?>
                                        <?php echo $contentList; ?>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>