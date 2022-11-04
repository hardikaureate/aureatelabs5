<?php
if (!empty($args)) :
    $background_color = isset($args['s4_sm_select_background_color']) ? $args['s4_sm_select_background_color'] : '';
    $title = isset($args['s4_sm_title']) ? $args['s4_sm_title'] : '';
    $Desc = isset($args['s4_sm_description']) ? $args['s4_sm_description'] : '';
    $served_list = isset($args['s4_sm_served_list']) ? $args['s4_sm_served_list'] : array();

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
    <!-- Industries served -->
    <section class="industry-we-served-section <?php echo $backColor; ?>">
        <div class="container">
            <?php
            if (!empty($title) || !empty($Desc)) : ?>
                <div class="row">
                    <div class="col-md-8">
                        <?php if (!empty($title)) : ?>
                            <h2 class="section-heading" data-aos="fade-up">
                                <?php echo $title; ?>
                            </h2>
                        <?php endif; ?>

                        <?php if (!empty($Desc)) : ?>
                            <div class="link-description" data-aos="fade-up">
                                <?php echo $Desc; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

            <?php endif; ?>

            <?php if (!empty($served_list)) : ?>
                <div class="pt-5">
                    <?php
                    $dir_path = get_template_directory();
                    $dir_url = get_template_directory_uri();
                    $imagePlaceHolderImage = wp_get_attachment_image(get_field('theme_placeholder_image', 'option'), array(600, 398));
                    $iconPlaceHolderImage = wp_get_attachment_image(get_field('theme_placeholder_image', 'option'), array(300, 300));
                    ?>
                    <div class="industry-we-served-design" data-aos="fade-up">
                        <div class="industry-we-served-inner">
                            <div class="row"><?php
                                foreach ($served_list as $key => $industry_served) :
                                    $size = 'full';
                                    $iconImage = isset($industry_served['s4_sm_served_list_icon']) ? $industry_served['s4_sm_served_list_icon'] : '';
                                    $mainImage = isset($industry_served['s4_sm_served_list_image']) ? $industry_served['s4_sm_served_list_image'] : '';
                                    $titles = isset($industry_served['s4_sm_served_list_title']) ? $industry_served['s4_sm_served_list_title'] : '';
                                    $desc = isset($industry_served['s4_sm_served_list_content']) ? $industry_served['s4_sm_served_list_content'] : '';

                                    ?>
                                    <?php if (!empty($iconImage) || !empty($mainImage) || !empty($titles) || !empty($desc)) : ?>
                                    <div class="col-md-6">
                                        <div class="industry-single">
                                            <div class="industry-image-upper">
                                                <?php if (!empty($mainImage)) : ?>
                                                    <?php echo wp_get_attachment_image($mainImage, $size); ?>
                                                <?php else : ?>
                                                    <?php echo $imagePlaceHolderImage; ?>
                                                <?php endif; ?>
                                            </div>
                                            <div class="industry-content-down">
                                            <?php
                                                if (!empty($titles)) : ?>
                                                <h3 class="font-16 font-md-18 text-primary font-weight-medium m-0 pb-8 pb-md-12"><?php echo $titles; ?></h3>
                                            <?php endif; ?>

                                            <?php if (!empty($desc)) : ?>
                                                <p class="industry-desc font-14"><?php echo $desc; ?></p>
                                            <?php endif; ?>

                                            <?php if (isset($tagLine)) : ?>
                                                <span><?php echo $tagLine; ?></span>
                                            <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

        </div>
    </section>
<?php endif; ?>