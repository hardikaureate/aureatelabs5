<section class="magento-2-service py-40 py-md-60 py-xl-100 bg-light">
    <div class="container">
        <div class="row">
                <?php
                if (!empty($args)) :
                    $title = isset($args['s17_sm_title']) ? $args['s17_sm_title'] : '';
                    $Desc = isset($args['s17_sm_description']) ? $args['s17_sm_description'] : '';
                    $certificateImage = isset($args['s17_sm_image']) ? $args['s17_sm_image'] : '';
                    $magentoServiceList = isset($args['s17_sm_service_list']) ? $args['s17_sm_service_list'] : array();
        
                    $size = 'full';
                    $iconPlaceHolderImage = wp_get_attachment_image(get_field('theme_placeholder_image', 'option'), array(100, 100));
                    $dir_path = get_template_directory();
                    $dir_url = get_template_directory_uri();
                    ?>
                    <div class="col-md-6">
                        <?php
                        if (!empty($title) || !empty($Desc)) : ?>
                            <?php if (!empty($title)) : ?>
                                <h2 class="section-heading" data-aos="fade-up">
                                    <?php echo $title; ?>
                                </h2>
                            <?php endif; ?>
                        
                            <?php if (!empty($Desc)) : ?>
                                <p class="section-description link-description" data-aos="fade-up">
                                    <?php echo $Desc; ?>
                                </p>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php if (!empty($magentoServiceList)) : ?>
                            <ul  data-aos="fade-up">
                                <?php
                                foreach ($magentoServiceList as $key => $magento_service_list) :
                                    $iconImage = isset($magento_service_list['s17_sm_icon']) ? $magento_service_list['s17_sm_icon'] : '';
                                    $titles = isset($magento_service_list['s17_sm_service_list_title']) ? $magento_service_list['s17_sm_service_list_title'] : '';
                                    $desc = isset($magento_service_list['s1_sm_web_main_description']) ? $magento_service_list['s1_sm_web_main_description'] : '';
                                ?>
                                    <?php if (!empty($iconImage) || !empty($titles)) : ?>
                                        <li class="d-flex mb-3 mb-md-4">
                                        <?php
                                        if(!empty($iconImage))
                                        {
                                            $svg_path = $dir_path.'/assets/icons/'.$iconImage.'.svg';
                                            if ( file_exists( $svg_path ) ) 
                                            {
                                                $svg = $dir_url.'/assets/icons/'.$iconImage.'.svg';
                                                if(!empty($svg))
                                                {   ?>
                                                    <div class="list-icon">
                                                        <img src="<?php echo $svg; ?>" title="<?php echo $iconImage; ?>" alt="<?php echo $iconImage; ?>"/>   
                                                    </div>                                            
                                                    <?php
                                                }
                                            }
                                            else
                                            {   ?>
                                                <div class="list-icon">
                                                <?php echo $iconPlaceHolderImage; ?>
                                                </div>   
                                                <?php
                                            }
                                        }
                                        else
                                        {   ?>
                                            <div class="list-icon">
                                            <?php echo $iconPlaceHolderImage; ?>
                                            </div>   
                                            <?php
                                        } 
                                        ?>
                                          
            
                                            <?php if (!empty($titles)) : ?>
                                                <span class="list-title pl-3 text-primary"><?php echo $titles; ?></span>
                                            <?php endif; ?>
                                            
                                        </li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
        
                    <div class="col-md-6">
                        <?php if (!empty($certificateImage)) : ?>
                            <div class="mt-4 mt-md-0"  data-aos="fade-up">
                                <?php echo wp_get_attachment_image($certificateImage, $size); ?>
                            </div>
                        <?php else : ?>
                            <span><?php echo $placeHolderImage; ?></span>
                        <?php endif; ?>
                    </div>
                <?php endif;?>
        </div>
    </div>
</section>