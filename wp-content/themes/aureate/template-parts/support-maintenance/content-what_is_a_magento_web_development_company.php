<?php
if (!empty($args)) :
    $title = isset($args['s25_magento_title']) ? $args['s25_magento_title'] : '';
    $image = isset($args['s25_magento_image']) ? $args['s25_magento_image'] : '';
    $content = isset($args['s25_magento_content']) ? $args['s25_magento_content'] : '';
    $size = 'full';
    $iconImage = isset($hiring_process_list['s21_hiring_process_image']) ? $hiring_process_list['s21_hiring_process_image'] : '';
    $placeHolderImage = wp_get_attachment_image(get_field('theme_placeholder_image', 'option'), array(100, 100));
?>
    <section class="what-web-dev-section py-40 py-md-60 py-xl-100 bg-light">
        <div class="container">
            <div class="row">
                <?php
                if (!empty($title) || !empty($image) || !empty($content)) : ?>
                    <div class="col-md-6">
                        <?php if (!empty($title)) : ?>
                            <h2 class="section-heading" data-aos="fade-up"> 
                                <?php echo $title; ?>
                            </h2>
                        <?php endif; ?>
        
                        <?php if (!empty($image)) : ?>
                            <div class="d-none d-md-block what-web-dev-image" data-aos="fade-up">
                                <?php echo wp_get_attachment_image($image, $size); ?>
                            </div>
                        <?php else : ?>
                            <div class="d-none d-md-block what-web-dev-image" data-aos="fade-up">
                                <?php echo $placeHolderImage; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-6">
                        <?php if (!empty($content)) : ?>
                            <div class="link-description" data-aos="fade-up">
                                <?php echo $content; ?>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($image)) : ?>
                            <div class="d-block d-md-none what-web-dev-image" data-aos="fade-up">
                                <?php echo wp_get_attachment_image($image, $size); ?>
                            </div>
                        <?php else : ?>
                            <div class="d-block d-md-none what-web-dev-image" data-aos="fade-up">
                                <?php echo $placeHolderImage; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>