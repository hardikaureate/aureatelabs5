<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package aureate
 */
get_header();
?>

<section class="pt-40 pt-xl-100 error-404 d-flex">
    <div class="container pt-5 mt-2 mt-md-4">
        <?php $notFoundsubTitle = wp_kses_post(get_field('404_sub_title', 'option')); ?>
        <?php $notFoundTitle = wp_kses_post(get_field('404_title', 'option')); ?>
        <?php $notFoundDescription = wp_kses_post(get_field('404_description', 'option')); ?>
        <?php $notFoundTopServiceText = wp_kses_post(get_field('404_top_service_text', 'option')); ?>
        <?php $notFoundImage = wp_get_attachment_image(get_field('404_page_image', 'option'), 'full', false, ["class" => "w-100 d-none d-md-block mt-auto"]); ?>
        <?php $notFoundMobileImage = wp_get_attachment_image(get_field('404_page_mobile_image', 'option'), 'full', false, ["class" => "w-100 d-md-none mt-auto"]); ?>

        <div class="row align-items-center">
            <div class="col-md-6 pr-xl-5 mb-4 mb-md-0 pb-3 pb-md-0">
                <span data-aos="fade-up" data-aos-delay="200" class="section-sub-heading"><?php echo $notFoundsubTitle; ?></span>
                <h1 data-aos="fade-up" data-aos-delay="300" class="section-heading"><?php echo $notFoundTitle; ?></h1>
                <div data-aos="fade-up" data-aos-delay="500">
                    <div class="mr-xl-4 mb-4 pb-2">
                        <p class="mr-xl-5 pr-xl-5"><?php echo $notFoundDescription; ?></p>
                    </div>
                    <?php
                    $notfound_url =  get_field('404_back_to_home_link_url', 'option');
                    if (!empty($notfound_url)) :
                        $notfound_link = isset($notfound_url['url']) ? $notfound_url['url'] : '';
                        $notfound_title = isset($notfound_url['title']) ? $notfound_url['title'] : '';
                        $notfound_target = !empty($notfound_url['target']) ? 'target="_blank"' : '';
                        if (!empty($notfound_link) && !empty($notfound_title)) {   ?>
                            <a class="arrow-btn" href="<?php echo esc_url($notfound_link); ?>" <?php echo $notfound_target; ?>><span><?php echo $notfound_title; ?></span></a>
                    <?php
                        }
                    endif;
                    ?>
                </div>
            </div>
            <div class="col-md-6 mt-md-4 pt-md-1" data-aos="fade-up" data-aos-delay="600" data-aos-duration="800">
                <h2 class="text-primary mb-3 mb-md-4 pb-md-1 font-weight-medium font-16 font-md-20"><?php echo $notFoundTopServiceText; ?></h2>
                <div class="row">
                    <?php if (have_rows('404_top_service_link', 'option')) : ?>
                        <?php while (have_rows('404_top_service_link', 'option')) : ?>
                            <?php the_row(); ?>
                            <?php
                            $notfound_url =  get_sub_field('404_top_service_link_text_url_new', 'option');
                            if (!empty($notfound_url)) :
                                $notfound_link = isset($notfound_url['url']) ? $notfound_url['url'] : '';
                                $notfound_title = isset($notfound_url['title']) ? $notfound_url['title'] : '';
                                $notfound_target = !empty($notfound_url['target']) ? 'target="_blank"' : '';
                            ?>
                                <div class="col-lg-6">
                                    <?php
                                    if (!empty($notfound_link) && !empty($notfound_title)) {   ?>
                                        <a class="text-decoration-underline text-hover-secondary d-inline-block mb-2 pb-1 pb-md-0 mb-md-4" href="<?php echo esc_url($notfound_link); ?>" <?php echo $notfound_target; ?>>
                                            <h3 class="font-weight-normal font-18"><?php echo $notfound_title; ?></h3>
                                        </a>
                                <?php
                                    }
                                endif;
                                ?>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- ipad to desktop -->
    <?php echo $notFoundImage; ?>
    <!-- Mobile image  -->
    <?php echo $notFoundMobileImage; ?>
</section><!-- .error-404 -->

<?php get_footer(); ?>