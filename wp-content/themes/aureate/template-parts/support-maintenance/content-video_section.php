<?php
if (!empty($args)) :
    $title = isset($args['s14_sm_title']) ? $args['s14_sm_title'] : '';
    $Desc = isset($args['s14_sm_description']) ? $args['s14_sm_description'] : '';
    $video_title = isset($args['s14_sm_video_title']) ? $args['s14_sm_video_title'] : '';
    $banner_video = isset($args['s14_sm_video_file_path']) ? $args['s14_sm_video_file_path'] : '';
    $backendImage = isset($args['s14_sm_backend_image']) ? $args['s14_sm_backend_image'] : '';

    $size = 'full';
    $placeHolderImage = wp_get_attachment_image(get_field('theme_placeholder_image', 'option'), array(62, 62));


    if (!empty($title) || !empty($Desc) || !empty($videoPoster) || !empty($banner_video) || !empty($backendImage) || !empty($APIText) || !empty($FrontendImage)) : ?>
        <section class="video-section py-40 py-md-100 bg-light">
            <div class="container">
                <div class="row d-flex flex-wrap">
                    <div class="col-md-8 pb-md-40">
                        <?php if (!empty($title)) : ?>
                            <h2 class="section-heading" data-aos="fade-up">
                                <?php echo $title; ?>
                            </h2>
                        <?php endif; ?>

                        <?php if (!empty($Desc)) : ?>
                            <p data-aos="fade-up" class="link-description pb-30 pb-md-0">
                                <?php echo $Desc; ?>
                            </p>
                        <?php endif; ?>
                    </div>
                    <?php
                        if (!empty($banner_video)) {
                            ?>
                            <div class="col-md-6" data-aos="fade-up">
                                
                                        <iframe width="600" height="346" src="<?php echo $banner_video;?>" title="<?php echo $video_title;?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                                        </iframe>      
                                
                            </div>
                            <?php
                        }
                        ?>
                    <div class="pt-30 pt-md-0 col-md-6 align-content-center ml-auto align-items-center d-flex justify-content-end" data-aos="fade-up">
                        <?php if (!empty($backendImage)) : ?>
                            <span><?php echo wp_get_attachment_image($backendImage, $size); ?></span>
                        <?php else : ?>
                            <span><?php echo $placeHolderImage; ?></span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
        <?php endif; ?>
<?php endif; ?>