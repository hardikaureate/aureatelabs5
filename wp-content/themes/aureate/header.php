<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package aureate
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="/favicon.ico" sizes="any">
	<link rel="icon" href="/icon.svg" type="image/svg+xml">
	<link rel="apple-touch-icon" href="/apple-touch-icon.png"><!-- 180×180 -->
	<link rel="manifest" href="/manifest.webmanifest" crossorigin="use-credentials">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

	<?php $headerBlackLogo = get_field('header_black_logo', 'option'); ?>
	<?php
	if (is_front_page()) {
		$v_poster = get_field('hero_section_poster');
		if (!empty($v_poster)) {
			if (!empty($video_thumbnail)) {
				$img_src  = isset($video_thumbnail['url']) ? $video_thumbnail['url'] : '';
				if (!empty($img_src)) {
					?>
					<link rel="preload" href="<?php echo $img_src; ?>" as="image">
					<?php
				}
			}
		}
	}
	if (!empty($headerBlackLogo)) {
		$logo_url = isset($headerBlackLogo['url']) ? $headerBlackLogo['url'] : '';
		if (!empty($logo_url)) {	?>
			<link rel="preload" href="<?php echo $logo_url; ?>" as="image">
	<?php
		}
	}
	?>
	<style>
		.home video::-webkit-media-controls-panel {
			display: none !important;
			-webkit-appearance: none;
		}
		.home video::-webkit-media-controls-play-button {
			display: none !important;
			-webkit-appearance: none;
		}
		.home video::-webkit-media-controls-start-playback-button {
			display: none !important;
			-webkit-appearance: none;
		}
		.home video::-webkit-media-controls {
			display:none !important;
			-webkit-appearance: none;
		} 
	</style>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">

		<!--  #header -->
		<header id="masthead" class="site-header">
			<?php 
			$cookie_name = "hyva-theme-development-ref";
			if(((isset($_COOKIE[$cookie_name]) && !empty($_COOKIE[$cookie_name]) && $_COOKIE[$cookie_name] == 'MM22NYC') || (isset($_GET['ref']) && !empty($_GET['ref']) && $_GET['ref'] == 'MM22NYC')) && is_page('hyva-theme-development')) 
			{	?>
				<div class="site-topbar text-center bg-dark py-2">
					<?php echo 'Create a blazing fast website with Hyvä theme @ ZERO license cost, offer valid till Oct 05, 2022'; ?>
				</div>
				<?php
			}
			else
			{
				$al_top_bar = get_field('al_top_bar', 'option');
				if(!empty($al_top_bar))
				{
					$show =  isset($al_top_bar['show']) ? $al_top_bar['show'] :'';
					$content =  isset($al_top_bar['content']) ? $al_top_bar['content'] :'';
					if($show)
					{
						if(!empty($content))
						{
							?>
							<div class="site-topbar text-center bg-dark py-2">
								<?php echo $content; ?>
							</div>
							<?php

						}
					}
				}
			}
			 ?>
			<div class="site-header-inner">
				<div class="site-branding">
					<?php theme_get_custom_logo(); ?>

					<a href="<?php echo site_url(); ?>/" aria-label="<?php echo $headerBlackLogo['title'] ?>" class="custom-logo-link custom-logo-link--black" title="<?php echo $headerBlackLogo['title'] ?>">
						<img src="<?php echo $headerBlackLogo['url']; ?>" width="162" height="24" title="<?php echo $headerBlackLogo['title'] ?>" alt="<?php echo $headerBlackLogo['alt'] ?>">
					</a>
				</div><!-- .site-branding -->
				<nav id="site-navigation" class="main-navigation">
					<?php wp_nav_menu(array('theme_location' => 'menu-1', 'menu_id' => 'primary-menu')); ?>
					<?php $headerMobileEmailText = wp_kses_post(get_field('header_mobile_email_text', 'option')); ?>
					<?php $headerMobileEmailAddress = wp_kses_post(get_field('header_mobile_email_address', 'option')); ?>
					<?php 
					if(!empty($headerMobileEmailAddress)): 
					 //$encoded_EmailAddress = al_encode_email_address( $headerMobileEmailAddress );
					 $encoded_EmailAddress = al_eae_encode_str( $headerMobileEmailAddress );
					 $encoded_mailto_EmailAddress = al_eae_encode_str('mailto:'.$headerMobileEmailAddress ); 
					?>
					<div class="get_in_touch">
						<p><?php echo $headerMobileEmailText; ?></p>
						<a href="<?php echo $encoded_mailto_EmailAddress; ?>" title="<?php echo $headerMobileEmailText; ?>">
							<?php echo $encoded_EmailAddress; ?>
						</a>
					</div>
					<?php endif; ?>

				</nav><!-- #site-navigation -->
				<div class="right-navigation">
					<?php wp_nav_menu(array('theme_location' => 'header-right-menu', 'container_class' => 'header-menu-class-al')); ?>
					<div class="humgurger" data-menu="12">
						<div class="icon"></div>
					</div>
				</div>
			</div>
		</header><!-- #masthead -->
		<?php 
		if(is_singular('post')){
			?>
				<div class="progress-container" id="progress-container">
						<div class="progress-bar" id="progressBar"></div>
				</div>
				<script>
						const elementHeight = document.getElementById("masthead").offsetHeight;
						console.log('elementHeight :> ' + elementHeight);
						document.getElementById("progress-container").style.top = elementHeight+'px';

				</script>
			<?php
		}
		?>
		<!--  #header -->

		
