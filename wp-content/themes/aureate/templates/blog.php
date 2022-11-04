<?php

/**
 * The Custom template for Blog Page
 *
 * Template Name: Blog
 *
 * @package Aureatelabs
 * @subpackage Aureatelabs
 * @since 1.0
 * @version 1.0
 */
get_header();
?>

<!-- Banner section -->
<section class="pt-5 pt-lg-100">
    <div class="container pt-4 pt-lg-4">
        <?php $blog_title = get_field('blog_title'); ?>
        <?php $blog_content = get_field('blog_content'); ?>
        <?php $contact_form = get_field('blog_subscriber_form'); ?>
            <div class="row justify-content-center pt-4 pt-lg-1">
                <div class="col-md-8 col-xl-6 px-4 text-center">
                <?php if (!empty($blog_title)) : ?>
                <h1 class="mb-3"><?php echo $blog_title;?></h1>
                <?php endif; ?>
                <?php if (!empty($blog_content)) : ?>
                <p class="pb-3 mb-1 font-14 font-md-24 font-weight-normal"><?php echo $blog_content;?></p>
                <?php endif; ?>
                <?php if (!empty($contact_form)) : ?>
                    <?php
                    $title = get_the_title($contact_form);
                    echo do_shortcode('[contact-form-7 id="' . $contact_form . '" title="' . $title . '"]');
                    ?>
                     <div class="recaptcha font-12 font-md-16">
                        * This site is protected by reCAPTCHA and the Google <a href="https://policies.google.com/privacy" target="_blank">Privacy Policy</a> and <a href="https://policies.google.com/terms" target="_blank">Terms of Service</a> apply.
                    </div>
                     <?php endif; ?>
                </div>
            </div>
       
    </div>
</section>

<!-- Featured Blog -->
<?php
$post_object_blog = get_field('post_object');
if(!empty($post_object_blog)) :
    $object = get_post($post_object_blog);
    if(!empty($object)) :
        $attach_id = get_post_thumbnail_id($object->ID);
        $thumbnail_src = '';
        if($attach_id) :
            $thumbnail_src = wp_get_attachment_image_src($attach_id, 'medium-large');
        endif;
        $title = $object->post_title;
        $date = $object->post_date;
        $postExcerpt = get_the_excerpt($object->ID); // $object->post_excerpt;
        $post_date = get_the_date('M jS, Y');
        $postlink = get_the_permalink($object->ID)
        ?>
        <?php $featuredBlogTitle = wp_kses_post(get_field('featured_blog_title')); ?>
        <?php $placeHolderImage = wp_get_attachment_image(get_field('theme_placeholder_image', 'option'), array(600,386)); ?>
        <section class="pb-4 pt-4 pt-md-5 mt-4 mt-lg-0 py-lg-80 py-xl-100">
            <div class="container pb-3 pt-0 pt-md-2 pt-lg-0">
                <div class="row blog-feature-row">
                    <div class="col-md-6 mb-3 mb-md-0 px-0 px-md-4">
                        <a href="<?php echo $postlink; ?>" class="d-flex blog-featured-image">
                            <?php if ($thumbnail_src) : ?>
                                <img src="<?php echo $thumbnail_src[0]; ?>" alt="image" class="w-100 h-100 object-fit-cover">
                            <?php else : ?>
                                <?php echo $placeHolderImage; ?>
                            <?php endif; ?>
                        </a>
                    </div>
                    <div class="col-md-6 blog-feature-col d-flex">
                        <div>
                            <div class="d-flex align-items-center mb-2 mb-md-3">
                                <p class="font-12 font-lg-18 font-xl-22 text-secondary mb-0"><?php echo $featuredBlogTitle; ?></p>
                                <span class="mx-2 mx-lg-4 d-inline-flex">
                                    <span class="blog-feature-dot mx-2"></span>
                                </span>
                                <p class="font-12 font-lg-18 font-xl-20 text-primary mb-0"><?php echo $post_date; ?></p>
                                <span class="mx-2 mx-lg-4 d-inline-flex">
                                    <span class="blog-feature-dot mx-2"></span>
                                </span>
                                <p class="font-12 font-lg-18 font-xl-20 text-primary mb-0"><?php echo get_reading_time_of_post($object->ID) . ' to read'; ?></p>
                            </div>
                            <div class="row align-items-center mb-3 mb-md-4">
                                <div class="col-md-11">
                                    <h2 class="font-16 font-md-24 font-lg-32">
                                        <a href="<?php echo $postlink; ?>">
                                            <?php echo $title; ?>
                                        </a>
                                    </h2>
                                </div>
                            </div>
                            <p class="mb-4 pb-md-3 font-md-20">
                                <?php echo $postExcerpt; ?>
                            </p>
                        </div>
                        
                        <a class="arrow-btn" href="<?php echo $postlink; ?>">
                            <span>Read the article</span>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <?php
    endif;
endif;
?>
<!-- Border -->
<div class="container px-0 px-md-3">
    <div class="px-0 px-md-1">
        <hr>
    </div>
</div>

<?php
$blog_options = get_field('blog_options', 'options');
$blog_post_per_page = 6;
if (!empty($blog_options)) {
    $blog_post_per_page = isset($blog_options['blog_post_per_page']) ? $blog_options['blog_post_per_page'] : 6;
}
?>
<!-- Latest Articles -->
<section class="py-5 my-xl-4">
    <div class="container pt-md-2">
        <div class="row mb-4 mb-md-5 pb-2 pb-md-0">
            <div class="col-md-12">
                <h2 class="section-heading">Latest articles</h2>
            </div>
            <div class="col-md-12 px-0 px-md-3">
                <div class="blog-catgeory-wrap">
                    <?php
                    echo '<a class="blog-catgeory-btn active" href="' . get_the_permalink() . '" data-blog_cat="0" id="cat_0">All</a>';
                    if (!empty($blog_options)) {
                        $selected_terms = isset($blog_options['selected_featured_categories']) ? $blog_options['selected_featured_categories'] : array();
                        if (!empty($selected_terms)) {
                            $terms = get_terms('category', array('include' => $selected_terms, 'hide_empty' => 0, 'orderby' => 'include', 'parent' => 0));
                            if ($terms) {
                                foreach ($terms as $key => $term) {
                                    echo '<a href="' . esc_url(get_term_link($term)) . '" class="blog-catgeory-btn" data-blog_cat="' . $term->term_id . '" id="cat_' . $term->term_id . '">' . $term->name . '</a>';
                                }
                            }
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <!-- Result-->
        <div id="ajax-post-data" class="row row-xl-25">
                <?php
                echo al_latest_posts(6,1);
                ?>

        </div>

        <!--Loader -->
        <div class="d-flex">
            <div class="blog-loader mt-3 mt-md-4"></div>
        </div>
    </div>
</section>

<?php get_template_part("/template-parts/thankyou-popup"); ?>

<?php get_footer(); ?>