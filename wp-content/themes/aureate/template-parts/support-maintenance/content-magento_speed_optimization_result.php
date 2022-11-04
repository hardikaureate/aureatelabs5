<?php
if (!empty($args)) :
    $title = isset($args['s18_sm_title']) ? $args['s18_sm_title'] : '';
    $optimized_result = isset($args['s18_sm_optimized_result']) ? $args['s18_sm_optimized_result'] : array();
?>
    <!-- content-magento_speed_optimization_result -->
    <section class="pt-40 pb-30 py-md-50 py-xl-90 magento_speed_optimization_result bg-light">
        <div class="container">
            <?php if (!empty($title)) : ?>
                <h2 data-aos="fade-up" class="section-heading m-0 pb-20 pb-md-50" data-aos="fade-up">
                    <?php echo $title; ?>
                </h2>
            <?php endif; ?>
            <?php if (!empty($optimized_result)) : ?>
                <div class="row">
                    <?php
                    foreach ($optimized_result as $key => $optimized_result_image) :
                        $size = 'full';
                        $image = isset($optimized_result_image['s18_sm_optimized_result_image']) ? $optimized_result_image['s18_sm_optimized_result_image'] : '';
                        $placeHolderImage = wp_get_attachment_image(get_field('theme_placeholder_image', 'option'), array(100, 100)); ?>
                        <div class="col-md-6 pt-12 pb-12" data-aos="fade-up">
                            <?php if (!empty($image)) : ?>
                                <?php if (!empty($image)) : ?>
                                    <?php echo wp_get_attachment_image($image, $size); ?>
                                <?php else : ?>
                                    <?php echo $placeHolderImage; ?>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>