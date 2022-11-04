<?php
if (!empty($args)) :
    $background_color = isset($args['s6_sm_select_background_color']) ? $args['s6_sm_select_background_color'] : '';
    $add_custom_class = isset($args['s6_sm_add_custom_class']) ? $args['s6_sm_add_custom_class'] : '';
    $title = isset($args['s6_sm_emergency_support_title']) ? $args['s6_sm_emergency_support_title'] : '';
    $Desc = isset($args['s6_sm_emergency_support_description']) ? $args['s6_sm_emergency_support_description'] : '';
    $emergency_service = isset($args['s6_sm_emergency_support']) ? $args['s6_sm_emergency_support'] : array();

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
    <!-- content_emergency_support_services -->
    <section class="content_emergency_support_services pt-40 pb-15 pt-md-100 pb-md-60 <?php echo $backColor; ?> <?php echo $add_custom_class; ?>">
        <div class="container">
            <?php
            if (!empty($title) || !empty($Desc)) : ?>
                <?php if (!empty($title)) : ?>
                    <h2 data-aos="fade-up" class="section-heading">
                        <?php echo $title; ?>
                    </h2>
                <?php endif; ?>
                <?php if (!empty($Desc)) : ?>
                    <p class="section-description link-description" data-aos="fade-up">
                        <?php echo $Desc; ?>
                    </p>
                <?php endif; ?>
            <?php endif; ?>

            <?php if (!empty($emergency_service)) : ?>
                    <?php
                    foreach ($emergency_service as $key => $emergency_support_service_list) :
                        $size = 'full';
                        $mainImage = isset($emergency_support_service_list['s6_sm_emergency_support_image']) ? $emergency_support_service_list['s6_sm_emergency_support_image'] : '';
                        $titles = isset($emergency_support_service_list['s6_sm_emergency_support_title']) ? $emergency_support_service_list['s6_sm_emergency_support_title'] : '';
                        $desc = isset($emergency_support_service_list['s6_sm_emergency_support_description']) ? $emergency_support_service_list['s6_sm_emergency_support_description'] : '';
                        
                        $placeHolderImage = wp_get_attachment_image(get_field('theme_placeholder_image', 'option'), array(50, 50)); ?>
                        <div class="row py-md-20 align-items-center">
                            <?php if (!empty($mainImage) || !empty($titles) || !empty($desc) || !empty($tagLine)) : ?>
                                <div class="col-md-6" data-aos="fade-up">
                                    <?php if (!empty($titles)) : ?>
                                        <h3  class="text-primary pb-8 pb-md-16 font-weight-normal font-16 font-md-20"><?php echo $titles; ?></h3>
                                    <?php endif; ?>
                                    <?php if (!empty($desc)) : ?>
                                        <div class="link-description">
                                            <?php echo $desc; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-6 pb-25 pb-md-0" data-aos="fade-up">
                                    <?php if (!empty($mainImage)) : ?>
                                        <?php echo wp_get_attachment_image($mainImage, $size); ?>
                                    <?php else : ?>
                                        <?php echo $placeHolderImage; ?>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>