<?php
get_header();
?>
<section class="blog-detail-wrap">
    <div class="blog-detail-inner">
        <div class="guide-side-panel">
            <div class="guide-title">
                <?php
                $category = get_the_terms(get_the_ID(), 'topic');
                $firstCategory = $category[0]->name;
                $firstCategorySlug = $category[0]->slug;
                echo $firstCategory;
                ?>
                <span class="right-arrow">
                    <svg width="10" height="18" viewBox="0 0 10 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 1L9 9L1 17" stroke="#212B35" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </span>
            </div>
            
            <?php
            $args = array(
                'post_type' => 'guides', 'posts_per_page' => -1,  'no_found_rows'  => true,
                'tax_query' => array(
                    array(
                        'taxonomy'  => 'topic',
                        'field'     => 'slug',
                        'terms'     => $firstCategorySlug,
                    )
                )
            );

            $wpex_query = new WP_Query($args);
            //echo '<pre>';print_r($wpex_query);echo '</pre>';
            if ($wpex_query->posts) :

                //echo $firstCategory;
            ?>            
                <div class="guide-menus">
                    <?php
                    foreach ($wpex_query->posts as $post) : setup_postdata($post);
                        global $wp_query;
                        $post_id = $wp_query->get_queried_object_id();
                        $classname = ($post_id == $post->ID) ? 'active-post' : '';

                    ?>
                        <div class="guide-menu-single <?php echo $classname;?>">
                            <?php global $post; ?>
                            <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </div>
                    <?php endforeach; ?>
                    <?php wp_reset_postdata(); ?>

                </div>  
                <div class="mobile-guide-menu">
                    <div class="mobile-guide-menu-inner">
                        <span class="open guide-toggle-menu-bottom">
                            <svg width="18" height="26" viewBox="0 0 18 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0 0H18V26L9 20L0 26V0Z" fill="white"/>
                                <path d="M9.5 4L10.9593 8.49139H15.6819L11.8613 11.2672L13.3206 15.7586L9.5 12.9828L5.6794 15.7586L7.13874 11.2672L3.31813 8.49139H8.04066L9.5 4Z" fill="#212B35"/>
                            </svg>
                            <span>Menu</span>
                        </span>
                        <span class="close guide-toggle-menu-bottom">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 1L17 17" stroke="white" stroke-width="1.5" stroke-linecap="round"/>
                                <path d="M17 1L1 17" stroke="white" stroke-width="1.5" stroke-linecap="round"/>
                            </svg>
                            <span>Close</span>
                        </span>
                    </div>
                </div>
            <?php
            endif;
            ?>

        </div>
        <div class="guide-content-panel">
            <div class="guide-content-panel-inner">
                <div class="guide-content-top">
                <?php
                while (have_posts()) :
                    the_post();
                ?>

                    <?php
                    $post_type = get_post_type();
                    echo '<ul id="breadcrumbs">';
                    echo '<li>'.$post_type.'</li>';
                    echo '<li class="separator"> - </li><li>';
                    echo '<li>';
                    echo $firstCategory;
                    if (is_single()) {
                        echo '</li><li class="separator"> - </li><li>';
                        the_title();
                        echo '</li>';
                    }
                    echo '</ul>';
                    ?>
                    <div class="container">
                        <?php
                        get_template_part('template-parts/content', get_post_type());
                        ?>
                    </div>
                </div>
                    <?php

                    $cs_link = $cs_title = $vb_mobile_title = '';
                    $view_blog_section = get_field('view_blog_section', 'option');
                    if (!empty($view_blog_section)) {
                        $view_blog = isset($view_blog_section['view_blog']) ? $view_blog_section['view_blog'] : '';
                        $view_blog_text_for_mobile = isset($view_blog_section['view_blog_text_for_mobile']) ? $view_blog_section['view_blog_text_for_mobile'] : '';
                        if (!empty($view_blog)) {
                            $cs_link = isset($view_blog['url']) ? $view_blog['url'] : '';
                            $cs_title = isset($view_blog['title']) ? $view_blog['title'] : '';
                            $cs_target = !empty($view_blog['target']) ? 'target="_blank"' : '';
                            $vb_mobile_title = $cs_title;
                        }
                        if (!empty($view_blog_text_for_mobile)) {
                            $vb_mobile_title = $view_blog_text_for_mobile;
                        }
                    }
                    $next_post = get_adjacent_post(true, '', false, 'topic');
                    $previous_post = get_adjacent_post(true, '', true, 'topic');
                    ?>
                    <div class="next-prev-section bg-light py-4 py-md-5 mt-5">
                        <div class="container py-md-2">
                            <div class="row">
                                <div class="col-4 col-md-4 text-left">
                                    <?php
                                    if (!empty($next_post)) {
                                        $next_post_url = get_the_permalink($next_post);
                                        $next_post_title = get_the_title($next_post);
                                    ?>
                                        <span class="d-block pb-3 line-height-0">
                                            <a href="<?php echo $next_post_url; ?>">
                                                <img src="<?php echo get_template_directory_uri() . '/assets/images/short-left-arrow.svg'; ?>" alt="Previous Case Study" class="vuestorefront-previous-arrow">
                                            </a>
                                        </span>
                                        <span class="font-12 font-md-20 d-none d-md-block">
                                            <a href="<?php echo $next_post_url; ?>">
                                                <p>Previous Chapter</p>
                                            </a>
                                        </span>
                                        <span class="font-12 font-md-20 d-block d-md-none">
                                            <a href="<?php echo $next_post_url; ?>">
                                                <p>Previous Chapter</p>
                                            </a>
                                        </span>

                                    <?php
                                    }
                                    ?>
                                </div>

                                <div class="col-4 col-md-4 text-center">
                                    <?php
                                    if (!empty($cs_link) && !empty($cs_title)) {   ?>
                                        <span class="font-12 font-md-20 d-none">
                                            <a href="<?php echo esc_url($cs_link); ?>" <?php echo $cs_target; ?>>
                                                <?php echo $vb_mobile_title; ?>
                                            </a>
                                        </span>
                                    <?php
                                    }
                                    ?>
                                </div>

                                <div class="col-4 col-md-4 text-right">
                                    <?php
                                    if (!empty($previous_post)) {
                                        $previous_post_url = get_the_permalink($previous_post);
                                        $previous_post_title = get_the_title($previous_post);
                                    ?>
                                        <span class="d-block pb-3 line-height-0">
                                            <a href="<?php echo $previous_post_url; ?>">
                                                <img src="<?php echo get_template_directory_uri() . '/assets/images/short-right-arrow.svg'; ?>" alt="Next Case Study" class="vuestorefront-next-arrow">
                                            </a>
                                        </span>
                                        <span class="font-12 font-md-20 d-none d-md-block">
                                            <a href="<?php echo $previous_post_url; ?>">
                                                <p>Next Chapter</p>
                                            </a>
                                        </span>
                                        <span class="font-12 font-md-20 d-block d-md-none">
                                            <a href="<?php echo $previous_post_url; ?>">
                                                <p>Next Chapter</p>
                                            </a>
                                        </span>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grow-business-section py-80 bg-mercury">
                        <div class="grow-business-inner">
                            <?php
                            $blog_subscriber = get_field('blog_subscriber', 'option');
                            if (!empty($blog_subscriber)) {
                                $blog_title = isset($blog_subscriber['blog_title']) ? $blog_subscriber['blog_title'] : '';
                                $blog_content = isset($blog_subscriber['blog_content']) ? $blog_subscriber['blog_content'] : '';
                                $blog_subscriber_form = isset($blog_subscriber['blog_subscriber_form']) ? $blog_subscriber['blog_subscriber_form'] : '';

                                if (!empty($blog_title)) { ?>
                                <h2 class="grow-business-title">
                                    <?php  echo do_shortcode($blog_title); ?>                                
                                </h2>
                                    
                                <?php } ?>

                                <?php if (!empty($blog_subscriber_form)) {
                                    $title = get_the_title($blog_subscriber_form);
                                    echo do_shortcode('[contact-form-7 id="' . $blog_subscriber_form . '" title="' . $title . '"]');
                                } ?>

                                <div class="recaptcha font-12 font-md-16">
                                    <?php
                                    if (!empty($blog_content)) { ?>
                                        <?php echo $blog_content; ?>
                                    <?php  }
                                    ?>
                                </div>
                            <? } ?>
                        </div>
                    </div>

                <?php
                endwhile; // End of the loop.
                ?>
            </div>
        </div>
    </div>
    
</section>
<?php
get_footer(); ?>