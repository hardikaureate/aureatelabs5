<?php
get_header();
$cat_id = get_query_var('cat');
?>

<!-- Banner section -->
<section class="pt-5 pt-lg-100">
    <div class="container pt-4 pt-lg-4">
        <div class="row justify-content-center pt-4 pt-lg-1">
            <div class="col-md-8 col-xl-7 px-4 text-center">
            <?php echo '<h1 class="mb-3">'.get_cat_name( $cat_id ).'</h1>';?>
            </div>
        </div>
    </div>
</section>
<?php
$blog_options = get_field('blog_options','options');

$blog_post_per_page = 6;
if(!empty($blog_options))
{       
    $blog_post_per_page = isset($blog_options['blog_post_per_page']) ? $blog_options['blog_post_per_page'] :6;
}
?>
<!-- Category Articles -->
<section class="py-5 my-xl-4">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-12">
                <h2 class="section-heading">Latest articles</h2>
            </div>
            <div class="col-md-12">
                <div class="blog-catgeory-wrap">
                    <?php
                    echo '<a class="blog-catgeory-btn" href="'.home_url().'/blog/" data-blog_cat="0" id="cat_0">All</a>';
                    if(!empty($blog_options))
                    {       
                            $selected_terms = isset($blog_options['selected_featured_categories']) ? $blog_options['selected_featured_categories'] : array();
                            if(!empty($selected_terms))
                            {
                                $terms = get_terms('category', array('include'=>$selected_terms,'hide_empty' => 0, 'orderby' => 'include', 'parent' => 0));
                                if ($terms)
                                {
                                    foreach ($terms as $key => $term) 
                                    {
                                        $active_class = '';
                                        if($cat_id == $term->term_id)
                                        {
                                            $active_class = 'active';
                                        }
                                        echo '<a href="'.esc_url(get_term_link($term)).'" class="blog-catgeory-btn '.$active_class.'" data-blog_cat="'.$term->term_id.'" id="cat_'.$term->term_id.'">' . $term->name . '</a>';
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
            echo al_latest_posts(6,1,$cat_id);
        ?>
        </div>
        
        <!--Loader -->
        <div class="d-flex"><div class="blog-loader mt-3 mt-md-4"></div></div>

    </div>
</section>

<?php get_footer(); ?>