<?php
if (!empty($args)) :
    $labels = isset($args['features_label']) ? $args['features_label'] : '';
    $featuersImage = isset($args['features_image']) ? $args['features_image'] : '';
    $size = 'full';
    $placeHolderImage = wp_get_attachment_image(get_field('theme_placeholder_image', 'option'), array(100, 100));
    $theme_features_list = isset($args['theme_features_list']) ? $args['theme_features_list'] : array();
?>
     <!-- content_theme_features_list-->
     <section class="py-40 py-md-60 py-xl-100 content_theme_features_list bg-dark">
        <div class="container">
            <?php
            if (!empty($labels) || !empty($featuersImage)) : ?>
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <?php if (!empty($labels)) : ?>
                            <h2 class="section-heading text-white mb-0 pb-24 pb-md-40" data-aos="fade-up">
                                <?php echo $labels; ?>
                            </h2>
                        <?php endif; ?>
                        <ul class="checklist pb-25 pb-md-0">
                            <?php
                            foreach ($theme_features_list as $key => $theme_features_list_data) :
                                $theme_features_datalist = $theme_features_list_data['theme_features_datalist'] ? $theme_features_list_data['theme_features_datalist'] : '';
                                if (!empty($theme_features_datalist)) : ?>
                                    <li data-aos="fade-up" class="font-md-20 font-14 text-white">
                                        <?php echo $theme_features_datalist; ?>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="col-md-7 text-md-right">
                        <?php if (!empty($featuersImage)) : ?>
                        <div class="pb-16 pb-md-24">
                            <?php echo wp_get_attachment_image($featuersImage, $size); ?>
                        </div>
                        <?php else : ?>
                            <span><?php echo $placeHolderImage; ?></span>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>