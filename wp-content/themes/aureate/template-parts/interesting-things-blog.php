<!-- Some interesting blog section -->
<section class="py-40 py-md-60 py-xl-100">
    <div class="container">
        <div class="row align-items-md-center">
            <div class="col-md-6 mb-4 mb-md-0 pb-2 pb-md-0">
                <?php $blogSubTitle = wp_kses_post(get_field('blog_sub_title', 'option')); ?>
                <?php $blogTitle = wp_kses_post(get_field('blog_title', 'option')); ?>
                <?php $blogDescription = wp_kses_post(get_field('blog_description', 'option')); ?>
                <?php $blogLinkText = wp_kses_post(get_field('blog_link_text', 'option')); ?>
                <div data-aos="fade-up">
                    <span class="section-sub-heading"><?php echo $blogSubTitle; ?></span>
                    <h2 class="section-heading"><?php echo $blogTitle; ?></h2>
                </div>
                <div data-aos="fade-up">
                    <p class="mb-4 mb-md-5 pr-xl-5"><?php echo $blogDescription; ?></p>
                    <?php
                    $blog_url =  get_field('blog_link_url', 'option');
                    if (!empty($blog_url)) :
                        $common_blog_link = isset($blog_url['url']) ? $blog_url['url'] : '';
                        $common_blog_title = isset($blog_url['title']) ? $blog_url['title'] : '';
                        $common_blog_target = !empty($blog_url['target']) ? 'target="_blank"' : '';
                        if (!empty($common_blog_link) && !empty($common_blog_title)) {   ?>
                            <a class="arrow-btn" href="<?php echo esc_url($common_blog_link); ?>" <?php echo $common_blog_target; ?>>
                                <span><?php echo esc_html($common_blog_title) ?></span>
                            </a>
                    <?php
                        }
                    endif;
                    ?>
                </div>
            </div>
            <div class="col-md-6">
                <?php $interesting_blogs = get_field('select_blogs', 'option');
                if ($interesting_blogs) : ?>
                    <?php $args = array('post_type' => 'post', 'post__in' => $interesting_blogs, 'post_status' => 'publish', 'posts_per_page' => 3, 'order' => 'DESC', 'orderby' => 'post_date'); ?>
                    <?php $newposts = new WP_Query($args); ?>
                    <?php if ($newposts->have_posts()) : ?>
                        <?php
                        $durationSpeed = 300;
                        while ($newposts->have_posts()) : $newposts->the_post();
                            $durationSpeed = $durationSpeed + 200;
                        ?>
                            <?php $cats =  get_the_category(get_the_ID()); ?>
                            <div class="home-blog-list py-3 py-md-4 ml-xl-5" data-aos="fade-up" data-aos-duration="<?php echo $durationSpeed ?>">
                                <span class="text-secondary font-12 font-md-14 d-block mb-3">
                                    <?php
                                    $catstr = '';
                                    foreach ($cats as $cat) : ?>
                                        <?php if ($cat->cat_name != 'Uncategorized') : ?>
                                            <?php $catstr .= $cat->name . ", "; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                    <?php echo rtrim($catstr, ', '); ?>
                                </span>
                                <a href="<?php echo get_permalink(); ?>" class="font-16 font-md-20 text-primary"><?php echo the_title(); ?></a>
                            </div>
                        <?php endwhile ?>
                    <?php else : ?>
                        <!-- Content If No Posts -->
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>