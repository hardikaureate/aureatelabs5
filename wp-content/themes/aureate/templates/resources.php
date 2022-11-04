<?php

/**
 * The Custom template for Resources Page
 *
 * Template Name: Resources
 *
 * @package Aureatelabs
 * @subpackage Aureatelabs
 * @since 1.0
 * @version 1.0
 */
get_header();
?>
<!-- Banner section-->
<?php $resourceHeroBanner =  get_field('s1_banner_image'); ?>
<section class="page-banner" style="background-image: url(<?php echo $resourceHeroBanner ?>);">
    <div class="container">
        <div class="px-4 px-md-0">
            <?php $heroBannerTitle = wp_kses_post(get_field('s1_title_text')); ?>
            <?php $heroBannerDescription = wp_kses_post(get_field('s1_description_text')); ?>
            <h1 class="text-white mb-3 mb-md-5"><?php echo $heroBannerTitle; ?></h1>
            <p class="col-md-8 font-14 font-md-24 mb-2 pl-0 pr-0 pr-md-3 mb-4 mb-md-5 text-A1A1A1"><?php echo $heroBannerDescription; ?></p>
            <div class="page-banner-links">
                <?php if (have_rows('s1_blog_links')) : ?>
                    <?php while (have_rows('s1_blog_links')) : ?>
                        <?php the_row(); ?>
                        <?php $heroSectionCTATitle = wp_kses_post(get_sub_field('s1_resource_blog_title_text')); ?>
                        <?php $heroSectionCTALink = get_sub_field('s1_resource_blog_link_text'); ?>
                        <?php if ($heroSectionCTALink) : ?>
                            <div class="page-banner-link d-inline-block mr-3 mr-xl-5">
                                <a href="<?php echo esc_url($heroSectionCTALink); ?>" title="<?php echo $heroSectionCTATitle; ?>" class="arrow-white-btn arrow-white-btn-45 mr-4 mr-xl-5">
                                    <span><?php echo $heroSectionCTATitle; ?></span>
                                </a>
                            </div>
                        <?php endif; ?>
                    <?php endwhile ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- Blog List Section -->
<?php $blogID = wp_kses_post(get_field('s2_blog_id')); ?>
<section class="pt-40 py-md-60 py-xl-100" id='<?php echo $blogID; ?>'>
    <div class="container">
        <div class="mb-4 mb-md-5 pb-2 pb-md-0">
            <?php $ourPeopleSubTitle = wp_kses_post(get_field('s2_sub_title')); ?>
            <?php $ourPeopleTitle = wp_kses_post(get_field('s2_title')); ?>
            <?php $ourPeopleDescription = wp_kses_post(get_field('s2_description')); ?>
            <?php $placeHolderImage = wp_get_attachment_image(get_field('theme_placeholder_image', 'option'), 'full'); ?>
            <span class="section-sub-heading" data-aos="fade-up"><?php echo $ourPeopleSubTitle; ?></span>
            <h2 class="section-heading" data-aos="fade-up" data-aos-delay="100"><?php echo $ourPeopleTitle; ?></h2>
            <div data-aos="fade-up" data-aos-delay="150">
                <p class="col-md-8 font-14 font-md-18 mb-2 pb-4 pl-0 pr-0 pr-md-3"><?php echo $ourPeopleDescription; ?></p>
                <?php
                $blog_url =  get_field('s2_view_all_blog_link');
                if (!empty($blog_url)) :
                    $all_blog_link = isset($blog_url['url']) ? $blog_url['url'] : '';
                    $all_blog_title = isset($blog_url['title']) ? $blog_url['title'] : '';
                    $all_blog_target = !empty($blog_url['target']) ? 'target="_blank"' : '';
                    if (!empty($all_blog_link) && !empty($all_blog_title)) {   ?>
                        <a class="arrow-btn" href="<?php echo esc_url($all_blog_link); ?>" <?php echo $all_blog_target; ?>>
                            <span><?php echo $all_blog_title; ?></span>
                        </a>
                <?php
                    }
                endif;
                ?>
            </div>
        </div>

        <div class="row row-lg-25">
            <?php $wpb_all_query = new WP_Query(array('post_type' => 'post', 'post_status' => 'publish', 'posts_per_page' => 12, 'order' => 'DESC', 'orderby' => 'post_date')); ?>
            <?php if ($wpb_all_query->have_posts()) : ?>
                <?php
                $durationSpeed = 300;
                while ($wpb_all_query->have_posts()) : $wpb_all_query->the_post();
                    $durationSpeed = $durationSpeed + 150;
                ?>
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-duration="500">
                        <div class="resource-block mb-5">
                            <a href="<?php the_permalink(); ?>" class="resource-image mb-3">
                                <?php if (get_the_post_thumbnail(get_the_ID())) : ?>
                                    <?php the_post_thumbnail('medium_large'); ?>
                                <?php else : ?>
                                    <?php echo $placeHolderImage; ?>
                                <?php endif; ?>
                            </a>
                            <div class="clear">
                                <div class="d-flex align-items-center mb-2 font-12 font-md-16">
                                    <p class="resource-date text-A1A1A1 mb-0"><?php echo get_the_date('M jS, Y', get_the_ID()); ?></p>
                                    <p class="text-A1A1A1 mb-0"><?php echo reading_time() . ' to read'; ?></p>
                                </div>
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Guides & Informative Pages -->
<?php $guidesID = wp_kses_post(get_field('s4_guides_id_link')); ?>
<?php $stepsSubTitle = wp_kses_post(get_field('s4_sub_title')); ?>
<?php $stepsTitle = wp_kses_post(get_field('s4_title')); ?>
<?php $stepsDescription = wp_kses_post(get_field('s4_description')); ?>


<section class="guide-information-section bg-dark py-40 py-md-60 py-xl-100" id='<?php echo $guidesID; ?>'>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="">
                    <span class="section-sub-heading" data-aos="fade-up"><?php echo $stepsSubTitle; ?></span>
                    <h2 class="section-heading text-white" data-aos="fade-up" data-aos-delay="300"><?php echo $stepsTitle; ?></h2>
                    <p class="text-white" data-aos="fade-up" data-aos-delay="400"><?php echo $stepsDescription; ?></p>
                </div>
            </div>
            <?php
            $post_object_blogs = get_field('select_chapter');
            if (isset($post_object_blogs[0]) && !empty($post_object_blogs[0])) :
                $objects = get_post($post_object_blogs[0]);
                if (!empty($objects)) : ?>
                    <div class="col-md-6" data-aos="fade-left" data-aos-delay="500">
                        <div class="guide-information-blocks">
                            <h3 class="guide-information-blocks-title"><?php echo $objects->post_title; ?></h3>
                            <?php if (!empty($objects->post_content)) : ?>
                                <div class="guide-information-blocks-content">
                                    <?php echo wp_trim_words($objects->post_content, 30, '...'); ?>
                                </div>
                            <?php endif; ?>
                            <a class="arrow-btn" href="<?php echo get_the_permalink($objects->ID); ?>">
                                <span class="text-primary">Know More</span>
                            </a>
                        </div>
                    </div>
                <?php endif; ?>
            <?php else : ?>
                <div class="col-md-6" data-aos="fade-left" data-aos-delay="500">
                    <div class="trend-block d-block d-md-flex bg-white border-radius-10">
                        <h3 class="font-16 font-md-24 font-weight-normal text-primary mb-2 mb-md-3">
                            Currently, Guides not Available...!!
                        </h3>

                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Our Incredible eBook Section -->
<?php $ebookID = wp_kses_post(get_field('s2_our_incredible_ebook_id')); ?>
<?php $ebookSubTitle = wp_kses_post(get_field('s3_sub_title')); ?>
<?php $ebookTitle = wp_kses_post(get_field('s3_title')); ?>
<?php $ebookDescription = wp_kses_post(get_field('s3_description')); ?>
<?php $ebookImage =  wp_get_attachment_image(get_field('s3_our_incredible_ebook_book_image'), 'full'); ?>
<?php $ebookEcomTitle = wp_kses_post(get_field('s3_our_incredible_ebook_book_title')); ?>
<?php $ebookEcomDescription = wp_kses_post(get_field('s3_our_incredible_ebook_book_description')); ?>

<section class="bg-light py-40 py-md-60 py-xl-100 " id='<?php echo $ebookID; ?>'>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-6">
                <div class="mb-4 mb-lg-0 mr-5 pr-2">
                    <span class="section-sub-heading" data-aos="fade-up"><?php echo $ebookSubTitle; ?></span>
                    <h2 class="section-heading" data-aos="fade-up" data-aos-delay="300"><?php echo $ebookTitle; ?></h2>
                    <p data-aos="fade-up" data-aos-delay="400"><?php echo $ebookDescription; ?></p>
                </div>
            </div>
            <div class="col-md-12 col-lg-6" data-aos="fade-left" data-aos-delay="500">
                <div class="trend-block d-block d-md-flex bg-white border-radius-10">
                    <div class="trend-block-left mb-2 pb-2">
                        <?php echo $ebookImage; ?>
                    </div>
                    <div class="trend-block-right pl-0 pl-md-3">
                        <h3 class="font-16 font-md-24 font-weight-normal text-primary mb-2 mb-md-3"><?php echo $ebookEcomTitle; ?></h3>
                        <p class="mb-4 pb-0 pb-md-3 font-12 font-md-14 "><?php echo $ebookEcomDescription; ?></p>
                        <?php
                        $ebookEcomURL =  get_field('s3_our_incredible_ebook_book_link_url');
                        if (!empty($ebookEcomURL)) :
                            $all_blog_link = isset($ebookEcomURL['url']) ? $ebookEcomURL['url'] : '';
                            $all_blog_title = isset($ebookEcomURL['title']) ? $ebookEcomURL['title'] : '';
                            $all_blog_target = !empty($ebookEcomURL['target']) ? 'target="_blank"' : '';
                            if (!empty($all_blog_link)) { ?>
                                <a class="arrow-btn arrow-btn-down" href="<?php echo esc_url($all_blog_link); ?>" <?php echo $all_blog_target; ?>>
                                    <span> <?php echo wp_kses_post($all_blog_title); ?></span>
                                </a>
                        <?php
                            }
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
</script>
<?php get_footer(); ?>