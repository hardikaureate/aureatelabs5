<section class="hire-developers-section py-40 py-md-60 py-xl-100 ">
    <div class="container">
        <?php
        if (!empty($args)) :
            $size = 'full';
            $titles = isset($args['s11_sm_title']) ? $args['s11_sm_title'] : '';
            $HeroSecData = isset($args['s11_sm_hiring_senior']) ? $args['s11_sm_hiring_senior'] : array();
            $placeHolderImage = wp_get_attachment_image(get_field('theme_placeholder_image', 'option'), array(62, 62));
            $dir_path = get_template_directory();
            $dir_url = get_template_directory_uri();
            $iconPlaceHolderImage = wp_get_attachment_image(get_field('theme_placeholder_image', 'option'), array(100, 70));
        ?>

            <?php if (!empty($titles)) { ?>
                <h1 class="text-center"><?php echo $titles; ?></h1>
            <?php } ?>

            <div class="row">
                <?php
                foreach ($HeroSecData as $key => $HeroSecDataa) :
                    $iconImage = isset($HeroSecDataa['s11_sm_hiring_senior_icon']) ? $HeroSecDataa['s11_sm_hiring_senior_icon'] : '';
                    $titles = isset($HeroSecDataa['s11_sm_hiring_senior_title']) ? $HeroSecDataa['s11_sm_hiring_senior_title'] : '';
                    $desc = isset($HeroSecDataa['s11_sm_hiring_senior_content']) ? $HeroSecDataa['s11_sm_hiring_senior_content'] : '';
                    $mainImage = isset($HeroSecDataa['s11_sm_hiring_senior_image']) ? $HeroSecDataa['s11_sm_hiring_senior_image'] : ''; ?>
                    <div class="col-md-6 hire-developers-col-main">
                        <div class="hire-developers-col h-100">
                            <?php if (!empty($iconImage) || !empty($titles)) : ?>
                                <div class="hire-developers-upper px-4 px-md-40 py-3 py-md-20 d-flex align-items-center">
                                    <?php
                                    if (!empty($iconImage)) {
                                        $svg_path = $dir_path . '/assets/icons/' . $iconImage . '.svg';
                                        if (file_exists($svg_path)) {
                                            $svg = $dir_url . '/assets/icons/' . $iconImage . '.svg';
                                            if (!empty($svg)) {   ?>
                                                <img src="<?php echo $svg; ?>" title="<?php echo $titles; ?>" alt="<?php echo $titles; ?>" />
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
                                    <?php if (!empty($titles)) : ?>
                                        <span class="pl-20 font-16 font-md-20 font-weight-medium text-primary">
                                            <?php echo $titles; ?>
                                        </span>
                                    <?php endif; ?>
                                </div>

                                <?php if (!empty($iconImage) || !empty($desc)) : ?>
                                    <div class="hire-developers-lower pl-24 pr-24 pt-32 pb-32 p-md-40">
                                        <div class="hire-developers-lower-img">
                                            <?php if (!empty($mainImage)) : ?>
                                                <?php echo wp_get_attachment_image($mainImage, $size); ?>
                                            <?php else : ?>
                                                <?php echo $placeHolderImage; ?>
                                            <?php endif; ?>
                                        </div>
                                        <?php if (!empty($desc)) : ?>
                                            <div class="link-description pt-32">
                                                <?php echo $desc; ?>
                                            </div>
                                        <?php endif; ?>
                                        
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php
        endif;
        ?>
    </div>
</section>
