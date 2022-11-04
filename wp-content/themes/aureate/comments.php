<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package aureate
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area ">
	
	<?php
	if ( comments_open() ) :
		?>
		<div class="comments-form-wrap py-40 py-md-60 py-xl-100">
			<div class="container">
					<div class="row">
						<?php $post_a_comment_section = get_field('post_a_comment_section', 'option'); ?>
						<?php
						if(!empty($post_a_comment_section))
						{	
							$title  = isset($post_a_comment_section['title']) ? $post_a_comment_section['title'] : '';
							$sub_title  = isset($post_a_comment_section['sub_title']) ? $post_a_comment_section['sub_title'] : '';
							$content  = isset($post_a_comment_section['content']) ? $post_a_comment_section['content'] : '';
							$email  = isset($post_a_comment_section['email']) ? $post_a_comment_section['email'] : '';
							if (!empty($title) || !empty($sub_title) || !empty($content) || !empty($email)) 
							{
								?>
								<div class="col-md-6">
									<?php
									if (!empty($title)) 
									{	?>
										<span class="section-sub-heading"><?php echo $title; ?></span>
										<?php
									}
									if (!empty($sub_title)) 
									{	?>
										<h2 class="section-heading"><?php echo $sub_title; ?></h2>
										<?php
									}
									if (!empty($content)) 
									{	?>
										<p class="text-body mb-4"><?php echo $content; ?></p>
										<?php
									}
									if (!empty($email)) 
									{
										$encoded_EmailAddress = al_eae_encode_str( $email );
										$encoded_mailto_EmailAddress = al_eae_encode_str('mailto:'.$email );  
										?>
										<div class="mb-3 mb-md-0 pb-4 pb-md-0">
											<span class="text-body">Email:</span> 
											<a href="<?php echo $encoded_mailto_EmailAddress; ?>"><?php echo $encoded_EmailAddress; ?></a> 
										</div>
										<?php
									}
									?>
								</div>
								<?php
							}
						}
						?>
						<div class="col-md-6">
								<?php
								comment_form();
								?>
						</div>
					</div>
			</div>
		</div>
		<?php
	endif;
	?>
	<?php

	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
		<div class="comments-listing-wrap bg-light py-40 py-md-60 py-xl-100">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<span class="section-sub-heading">Thank you for your feedback</span>
						<h2 class="section-heading">
							<?php
							$aureate_comment_count = get_comments_number();
								printf( 
									/* translators: 1: comment count number, 2: title. */
									esc_html( _nx( 'Comments (%1$s)', 'Comments (%1$s)', $aureate_comment_count, '', 'aureate' ) ),
									number_format_i18n( $aureate_comment_count ), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
									''
								);
							?>
						</h2><!-- .comments-title -->

						<?php the_comments_navigation(); ?>

						<ol class="comment-list">
							<?php
							wp_list_comments(
								array(
									'style'      => 'ol',
									'short_ping' => true,
									'callback' => 'al_comment_callback'
								)
							);
							?>
						</ol><!-- .comment-list -->

						<?php
						the_comments_navigation();

						do_action('al_after_comment_listing',get_the_ID());

						// If comments are closed and there are comments, let's leave a little note, shall we?
						if ( ! comments_open() ) :
							?>
							<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'aureate' ); ?></p>
							<?php
						endif;
						?>
					</div>
				</div>
			</div>
		</div>
		<?php
	endif; // Check for have_comments().
	?>
</div><!-- #comments -->
