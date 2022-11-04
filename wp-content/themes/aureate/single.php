<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package aureate
 */

get_header();
?>


<main id="primary" class="site-main">
	<section class="blog-detail-wrap">
		<?php
		while (have_posts()) :
			the_post();
		?>
			<div class="container">
				<?php
				get_template_part('template-parts/content', get_post_type());
				?>
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
			$next_post = get_adjacent_post(false, '', false);
			$previous_post = get_adjacent_post(false, '', true);
			?>
			<div class="bg-light py-4 py-md-5 mt-5">
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
										<?php echo $next_post_title; ?>
									</a>
								</span>
								<span class="font-12 font-md-20 d-block d-md-none">
									<a href="<?php echo $next_post_url; ?>">
										Previous
									</a>
								</span>

							<?php
							}
							?>
						</div>

						<div class="col-4 col-md-4 text-center">
							<?php
							if (!empty($cs_link) && !empty($cs_title)) {   ?>
								<span class="d-block pb-3 line-height-0">
									<a href="<?php echo esc_url($cs_link); ?>" <?php echo $cs_target; ?>>
										<img src="<?php echo get_template_directory_uri() . '/assets/images/four-square.svg'; ?>" alt="<?php echo $cs_title; ?>" class="vuestorefront-view-all">
									</a>
								</span>
								<span class="font-12 font-md-20 d-none d-md-block">
									<a href="<?php echo esc_url($cs_link); ?>" <?php echo $cs_target; ?>>
										<?php echo $cs_title; ?>
									</a>
								</span>
								<span class="font-12 font-md-20 d-block d-md-none">
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
										<?php echo $previous_post_title; ?>
									</a>
								</span>
								<span class="font-12 font-md-20 d-block d-md-none">
									<a href="<?php echo $previous_post_url; ?>">
										Next
									</a>
								</span>
							<?php
							}
							?>
						</div>
					</div>
				</div>
			</div>


			<?php
			// If comments are open or we have at least one comment, load up the comment template.
			if (comments_open() || get_comments_number()) :
				comments_template();
			endif;
			?>
		<?php

		endwhile; // End of the loop.
		?>
	</section>

	<?php $args = array('posts_per_page' => 3, 'post__not_in'   => array(get_the_ID()), 'no_found_rows'  => true, 'orderby' => 'rand');
	$cats = wp_get_post_terms(get_the_ID(), 'category');
	$cats_ids = array();
	foreach ($cats as $wpex_related_cat) {
		$cats_ids[] = $wpex_related_cat->term_id;
	}
	if (!empty($cats_ids)) {
		$args['category__in'] = $cats_ids;
	}
	$wpex_query = new wp_query($args);
	if ($wpex_query->posts) :
	?>
		<section class="related-blog-wrap pt-40 pb-3 pt-md-60 pt-xl-100">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<span class="section-sub-heading">You May also like</span>
						<h2 class="section-heading">Related Blog</h2>
					</div>
					<div class="col-md-12">
						<div class="row row-lg-25">
							<?php
							// Query posts

							$placeHolderImage = wp_get_attachment_image(get_field('theme_placeholder_image', 'option'), 'full');
							// Loop through posts
							foreach ($wpex_query->posts as $post) : setup_postdata($post); ?>
								<div class="col-md-6 col-lg-4">
									<div class="resource-block mb-4 mb-md-5">
										<a class="resource-image mb-3" href="<?php the_permalink(); ?>">
											<?php if (get_the_post_thumbnail(get_the_ID())) : ?>
												<?php the_post_thumbnail('medium_large'); ?>
											<?php else : ?>
												<?php echo $placeHolderImage; ?>
											<?php endif; ?>
										</a>
										<div class="clear">
											<?php global $post;
											if (is_single() && isset($post->post_author)) { ?>
												<div class="d-flex align-items-center mb-2 font-12 font-md-16">
													<p class="resource-date text-A1A1A1 mb-0"><?php the_date('M jS, Y'); ?></p>
													<p class="text-A1A1A1 mb-0"><?php echo reading_time() . ' to read'; ?></p>
												</div>
											<?php } ?>
											<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
										</div>
									</div>
								</div>
							<?php endforeach; ?>
							<?php wp_reset_postdata(); ?>
						</div>
					</div>
				</div>
			</div>
		</section>
	<?php
	endif;
	?>

	<div class="grow-business-section py-40 py-lg-80 bg-mercury">
		<div class="grow-business-inner text-center">
			<?php
			$blog_subscriber = get_field('blog_subscriber', 'option');
			if (!empty($blog_subscriber)) {
				$blog_title = isset($blog_subscriber['blog_title']) ? $blog_subscriber['blog_title'] : '';
				$blog_content = isset($blog_subscriber['blog_content']) ? $blog_subscriber['blog_content'] : '';
				$blog_subscriber_form = isset($blog_subscriber['blog_subscriber_form']) ? $blog_subscriber['blog_subscriber_form'] : '';

				if (!empty($blog_title)) { ?>
					<h2 class="grow-business-title">
						<?php echo do_shortcode($blog_title); ?>
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
</main><!-- #main -->
<!-- Thank You Popup -->
<?php get_template_part("/template-parts/thankyou-popup"); ?>
<?php
//get_sidebar();
get_footer();
