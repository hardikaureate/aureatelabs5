<?php
if (!empty($args)) :
    $background_color = isset($args['s14_sm_select_background_color']) ? $args['s14_sm_select_background_color'] : '';
    $title = isset($args['s14_sm_title']) ? $args['s14_sm_title'] : '';
    $Desc = isset($args['s14_sm_description']) ? $args['s14_sm_description'] : '';
    $benefits_list = isset($args['s14_sm_benefits_list']) ? $args['s14_sm_benefits_list'] : array();
    $pwaImage = isset($args['14_sm_image']) ? $args['14_sm_image'] : '';
    $size = 'full';
    $placeHolderImage = wp_get_attachment_image(get_field('theme_placeholder_image', 'option'), array(62, 62));

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
    <!-- content-benefits_shopify_pwa -->
    <section class="content-benefits_shopify_pwa py-40 py-md-60 py-xl-100 <?php echo $backColor; ?>">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <?php
                    if (!empty($title) || !empty($Desc)) : ?>
                        <?php if (!empty($title)) : ?>
                            <h2 class="section-heading" data-aos="fade-up">
                                <?php echo $title; ?>
                            </h2>
                        <?php endif; ?>
                        <?php if (!empty($Desc)) : ?>
                            <p class="link-description" data-aos="fade-up"><?php echo $Desc; ?></p>
                        <?php endif; ?>
                    <?php endif; ?>
                    <ul class="ul-digits mt-2 mt-md-0 pt-md-20">
                        <?php if (!empty($benefits_list)) : ?>
                                <?php
                                $count = 1;
                                foreach ($benefits_list as $key => $web_service_list) :
                                    $titles = isset($web_service_list['s14_sm_benefits_list_title']) ? $web_service_list['s14_sm_benefits_list_title'] : '';
                                    $desc = isset($web_service_list['s14_sm_benefits_list_description']) ? $web_service_list['s14_sm_benefits_list_description'] : ''; ?>
                                        <?php if (!empty($titles) || !empty($desc)) : ?>
                                            <?php if (!empty($desc)) : ?>
                                                <li data-aos="fade-up">
                                                    <span class="list-counter font-16 font-md-20">
                                                        <?php
                                                            echo str_pad($count, 2, '0', STR_PAD_LEFT) . '.';
                                                        ?>
                                                    </span>
                                                    <?php if (!empty($titles)) : ?>
                                                        <h3 class="font-16 font-md-20 font-weight-medium text-primary mb-2 pb-md-1">
                                                            <?php echo $titles; ?>
                                                        </h3>
                                                    <?php endif; ?>
                                                    <div class="hire-right-description link-description">
                                                        <p> <?php echo $desc; ?></p>
                                                    </div>
                                                </li>
                                            <?php endif; ?>
                                            <?php $count++; ?>
                                        <?php endif; ?>
                                <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="col-md-5 line-height-0 text-right pt-30 pt-md-0" data-aos="fade-up">
                    <?php if (!empty($pwaImage)) : ?>
                        <?php echo wp_get_attachment_image($pwaImage, $size); ?>
                    <?php else : ?>
                        <span><?php echo $placeHolderImage; ?></span>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>