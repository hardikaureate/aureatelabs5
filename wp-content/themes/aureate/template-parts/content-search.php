<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package aureate
 */

?> 

<?php $placeHolderImage = wp_get_attachment_image(get_field('theme_placeholder_image', 'option'), 'full'); ?>
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