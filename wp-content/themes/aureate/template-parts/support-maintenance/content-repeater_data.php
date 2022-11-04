<?php
if (!empty($args)) :
    $background_color = isset($args['s24_sm_select_background_color']) ? $args['s24_sm_select_background_color'] : '';
    $title = isset($args['s24_sm_title']) ? $args['s24_sm_title'] : '';
    $Desc = isset($args['s23_sm_description']) ? $args['s23_sm_description'] : '';
    $s24_sm_repeater = isset($args['s24_sm_repeater']) ? $args['s24_sm_repeater'] : array();

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
    <!-- Content-repeater_data Section -->
    <section class="content_repeater_data <?php echo $backColor; ?>">
        <div class="container">
            <?php
            if (!empty($title) || !empty($Desc)) : ?>
                <?php if (!empty($title)) : ?>
                    <h2 class="section-heading">
                        <?php echo $title; ?>
                    </h2>
                <?php endif; ?>

                <?php if (!empty($Desc)) : ?>
                    <div>
                        <?php echo $Desc; ?>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
                
            <?php if (!empty($s24_sm_repeater)) : ?>
                    <?php
                    $count = 1;
                    foreach ($s24_sm_repeater as $key => $sm_repeater) :
                        $titles = isset($sm_repeater['s24_sm__title']) ? $sm_repeater['s24_sm__title'] : '';
                        $desc = isset($sm_repeater['s24_sm_description']) ? $sm_repeater['s24_sm_description'] : ''; 
                        $s24_sm_image = isset($sm_repeater['s24_sm_image']) ? $sm_repeater['s24_sm_image'] : ''; 
                        $s24_sm_cta_link = isset($sm_repeater['s24_sm_cta_link']) ? $sm_repeater['s24_sm_cta_link'] : ''; 
                        ?>
                        <div class="row pt-40 pb-40 pt-md-100 pb-md-100 m-0 align-items-center">
                            <?php if (!empty($titles) || !empty($desc)  || !empty($s24_sm_cta_link)) : ?>
                                <div class="col-md-6 pl-0 pr-0 pl-md-0 pr-md-20" data-aos="fade-up">
                                    <div class="content_repeater_data-col">
                                        <?php if (!empty($titles)) : ?>
                                            <h2 class="section-heading">
                                                <?php echo $titles; ?>
                                            </h2>
                                        <?php endif; ?>
                                        <?php if (!empty($desc)) : ?>
                                            <p class="pb-24 link-description">
                                                <?php echo $desc; ?>
                                            </p>
                                        <?php endif; ?>
                                        <?php if (!empty($s24_sm_cta_link)) : ?>
                                            <?php
                                            $cat_link = isset($s24_sm_cta_link['url']) ? $s24_sm_cta_link['url'] : '';
                                            $cta_title = isset($s24_sm_cta_link['title']) ? $s24_sm_cta_link['title'] : '';
                                            $target = !empty($s24_sm_cta_link['target']) ? 'target="_blank"' : '';
                                            $cat_link = filter_var($cat_link, FILTER_SANITIZE_URL);
                                            if (filter_var($cat_link, FILTER_VALIDATE_URL) !== false) 
                                            {
                                                $url = esc_url($cat_link);
                                            }
                                            else
                                            {
                                                $url = '#knowmore';
                                                $target = '';
                                            }
                                            if (!empty($url) && !empty($cta_title)) : ?>
                                                <p class="font-14 text-body">
                                                <a class="arrow-btn" href="<?php echo $url; ?>" <?php echo $target; ?> title="<?php echo $cta_title; ?>">
                                                    <span>
                                                        <?php echo $cta_title; ?>
                                                    </span>
                                                </a>
                                                </p>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($s24_sm_image)) : ?>
                                <div class="col-md-6  p-0 text-right" data-aos="fade-up">
                                    <?php
                                    $url = isset($s24_sm_image['url']) ? $s24_sm_image['url'] : '';
                                    if(!empty($url))
                                    {
                                        $title = isset($s24_sm_image['title']) ? $s24_sm_image['title'] : '';
                                        $alt = isset($s24_sm_image['alt']) ? $s24_sm_image['alt'] : '';
                                        $width = isset($s24_sm_image['width']) ? $s24_sm_image['width'] : '';
                                        $height = isset($s24_sm_image['alt']) ? $s24_sm_image['alt'] : '';

                                        //$img_id  = isset($s24_sm_image['id']) ? $s24_sm_image['id'] : '';  
                                        //$srcset = wp_get_attachment_image_srcset($img_id );
                                        ?>
                                        <img src="<?php echo $url; ?>" srcset="<?php //echo $srcset; ?>" title="<?php echo $name; ?>" loading="lazy" alt="<?php echo $name; ?>" />
                                        <?php
                                    }
                                    ?>
                                </div>
                            <?php endif; ?>
                        <?php $count++; ?>
                        </div>
                    <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>