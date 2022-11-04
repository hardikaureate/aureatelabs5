<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package aureate
 */

get_header();
?>
<section class="search-section py-100">
    <div class="container">
		<?php if ( have_posts() ) : ?>
            <h1 class="page-title mb-2">
                <?php
                    printf( esc_html__( 'Search Results for: %s', 'aureate' ), '<span>' . get_search_query() . '</span>' );
                ?>
            </h1>
			<div class="row row-lg-25 pt-24">
                <?php
                    while ( have_posts() ) :
                        the_post();
                        get_template_part( 'template-parts/content', 'search' );
                    endwhile;
                ?>
			</div>
			<div class="search-post-navigation pt-24">	
                <?php
                    the_posts_navigation();
                ?>
			</div>	
			<?php
		    else :
			?>
			<div class="noting-found-wrap pt-40">
                <?php
				    get_template_part( 'template-parts/content', 'none' );
				?>
			</div>	
			<?php
		endif;
		?>
	</div>
</section>
<?php
get_footer();
