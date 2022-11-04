<?php
if (!empty($args)) :
    $background_color = isset($args['s19_sm_select_background_color']) ? $args['s19_sm_select_background_color'] : '';
    $package_lists = isset($args['s19_sm_shogun_packages_list']) ? $args['s19_sm_shogun_packages_list'] : array();
    $placeHolderImage = wp_get_attachment_image(get_field('theme_placeholder_image', 'option'), array(520, 222));
    $size = 'full';
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
     <?php if (!empty($package_lists)) : ?>
        <!-- shogun-package Section -->
        <section class="shogun-package-section py-40 py-md-60 py-xl-100 <?php echo $backColor; ?>">
            <div class="container">
                <div class="row package-section-row">
                    <?php
                    $count = 1;
                    foreach ($package_lists as $key => $package_list) :
                        $mainImage = isset($package_list['s19_sm_image']) ? $package_list['s19_sm_image'] : '';
                        $titles = isset($package_list['s19_sm_title']) ? $package_list['s19_sm_title'] : '';
                        $desc = isset($package_list['s19_sm_description']) ? $package_list['s19_sm_description'] : ''; ?>
                        <div class="col-md-6 package-section-col pb-24 pb-md-0" data-aos="fade-up">
                            <div class="step-section-inner-col h-100  pt-24 pb-24 pl-24 pr-24 py-md-40 px-md-40">
                                <div class="package-image line-height-0">
                                    <?php if (!empty($mainImage)) : ?>
                                        <?php echo wp_get_attachment_image($mainImage, $size); ?>
                                    <?php else : ?>
                                        <?php echo $placeHolderImage; ?>
                                    <?php endif; ?>
                                </div>
                                <?php if (!empty($titles) || !empty($desc)) : ?>
                                        <?php if (!empty($titles)) : ?>
                                            <h3 class="m-0 font-16 font-md-20 pt-24 pt-md-30 pb-16 pb-md-24 text-primary font-weight-medium">
                                                <?php echo $titles; ?>
                                            </h3>
                                        <?php endif; ?>

                                        <?php if (!empty($desc)) : ?>
                                            <div class="desciption font-14 font-md-18 link-description">
                                                <?php echo $desc; ?></span>
                                            </div>
                                        <?php endif; ?>
                                    <?php $count++; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>
<?php endif; ?>