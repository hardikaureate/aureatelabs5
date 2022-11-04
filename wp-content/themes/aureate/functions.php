<?php

/**
 * aureate functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package aureate
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function aureate_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on aureate, use a find and replace
		* to change 'aureate' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('aureate', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support('title-tag');

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'aureate'),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'aureate_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
			'header-text' => array('site-title', 'site-description'),
		)
	);

	# add capabality to subscriber
	//$role_object = get_role('subscriber');
	//$role_object->add_cap('edit_posts');
}
add_action('after_setup_theme', 'aureate_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function aureate_content_width()
{
	$GLOBALS['content_width'] = apply_filters('aureate_content_width', 640);
}
add_action('after_setup_theme', 'aureate_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function aureate_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'aureate'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'aureate'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'aureate_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function aureate_scripts()
{
	wp_enqueue_style('aureate-style', get_template_directory_uri() . '/assets/css/style.css', '6.0.3');

	//wp_enqueue_script( 'aureate-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'aureate_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

/** 
 * <!---------- Aureate theme Customization starts ---------->
 * 
 * Code to remove the loading of wp-includes/js/wp-emoji-release.min.js?ver=6.0
 */
remove_action('wp_head', 'print_emoji_detection_script', 7);

/**
 * Code to remove the loading of /wp-includes/css/dist/block-library/style.min.css?ver=6.0 & to remove the recaptcha css and js
 */
add_action('wp_enqueue_scripts', function () {
	wp_dequeue_style('wp-block-library');
	wp_dequeue_script('google-recaptcha');
	//add_filter('wpcf7_load_js', '__return_false');
	//add_filter('wpcf7_load_css', '__return_false');
	wp_dequeue_style('contact-form-7');
	remove_action('wp_enqueue_scripts', 'wpcf7_recaptcha_enqueue_scripts', 20);
	wp_dequeue_script('gtm4wp-contact-form-7-tracker');
	wp_dequeue_script('utm_contact_form7_scripts');



	/* Code to remove the loading of Request URL: wp-includes/js/dist/vendor/regenerator-runtime.min.js?ver=0.13.9
	* The regenerator-runtime script handle has been added to WordPress Core, and has been added as a dependency to 
	* wp-polyfill is responsible for ensuring all newer features function in the older browsers supported by WordPress	*
	*/
	//wp_deregister_script( 'regenerator-runtime' );
	//wp_deregister_script( 'wp-polyfill' );

});

/**
 * Below code will load the css files depending upon the page/posts called.
 */
add_action('wp_enqueue_scripts', 'wpdocs_aureate_theme_name_scripts');
function wpdocs_aureate_theme_name_scripts()
{
	if (is_front_page()) {
		wp_enqueue_style('homepage', get_template_directory_uri() . '/assets/css/homepage.css'); //For homepage
	} else if (is_page('blog')) {
		wp_enqueue_style('bloglistingpage', get_template_directory_uri() . '/assets/css/blog-listing.css'); //For Blog Listing page
	} else if (is_category() || is_tag()) {
		wp_enqueue_style('bloglistingpage', get_template_directory_uri() . '/assets/css/blog-listing.css'); //For category blog Listing page
	} else if (is_singular('career-at-aureate')) {
		wp_enqueue_style('career-details', get_template_directory_uri() . '/assets/css/career-details.css'); // For careers detail page
	} else if (is_singular('case-studies')) {
		wp_enqueue_style('case-studies-detail', get_template_directory_uri() . '/assets/css/case-studies-detail.css'); // For Case Study detail page
	} else if (is_singular('guides')) {
		wp_enqueue_style('guides-detail', get_template_directory_uri() . '/assets/css/guides-detail.css'); // For Case Study detail page
	} else if (is_single()) {
		wp_enqueue_style('blogdetailpage', get_template_directory_uri() . '/assets/css/blog-detail.css'); // For Blog detail page
	} else {
		/* $current_page = sanitize_post($GLOBALS['wp_the_query']->get_queried_object()); // For any other page 
		$slug = $current_page->post_name;
		wp_enqueue_style($slug, get_template_directory_uri() . '/assets/css/' . $slug . '.css'); */
	}
	$slugname = basename(get_page_template(), ".php");
	if (!empty($slugname)) {
		$css_slug_abs_path = get_template_directory() . '/assets/css/' . $slugname . '.css';
		if (file_exists($css_slug_abs_path)) {
			$css_slug_path = get_template_directory_uri() . '/assets/css/' . $slugname . '.css';
			wp_enqueue_style($slugname, $css_slug_path);
		}
	}
	wp_enqueue_script('aos-js', get_template_directory_uri() . '/assets/js/aos.js', array(), '', true); //For AOS animation
	wp_enqueue_script('custom-js', get_template_directory_uri() . '/assets/js/custom.js', array(), '6.0.3', true); //For custom js

	$get_permalink = get_the_permalink();
	global $wp_query;
	$query_vars = $wp_query->query_vars;
	$is_thank_you_page = 'no';
	
	if(isset($query_vars['thank-you']))
	{
		$is_thank_you_page = 'yes';
	}

	if (!is_page('blog') && !is_singular('post') && !is_singular('guides')) 
	{
		$get_permalink_ty = $get_permalink.'thank-you';
	}	
	else
	{
		$get_permalink_ty = '';
	}
		wp_localize_script( 'custom-js', 'frontend_ajax_object',
			array( 
				'thank_you_page' => $get_permalink_ty,
				'is_thank_you_page' => $is_thank_you_page,
				'get_permalink' => $get_permalink,
			)
		);
	

	if (is_page('blog') || is_category() || is_tag()) {
		$blog_post_per_page = 6;
		if (!empty($blog_options)) {
			$blog_post_per_page = isset($blog_options['blog_post_per_page']) ? $blog_options['blog_post_per_page'] : 6;
		}
		$tagid = $catid = '';
		$tag_slug = get_query_var('tag');
		if (!empty($tag_slug)) {
			$tag = get_term_by('slug', $tag_slug, 'post_tag');
			$tagid = $tag->term_id;
		}
		$cat_id = get_query_var('cat');
		if (!empty($cat_id)) {
			$catid = $cat_id;
		}
		wp_enqueue_script('posts-js', get_template_directory_uri() . '/assets/js/posts.js', array(), '', true); //For custom js
		wp_localize_script(
			'posts-js',
			'frontend_ajax_object',
			array(
				'ajaxurl' => admin_url('admin-ajax.php'),
				'ppp' => $blog_post_per_page,
				'tagid' => $tagid,
				'catid' => $catid,
			)
		);
	}
}
/**
 * Below code to allow SVG uplaod files from backend
 */
add_filter('wp_check_filetype_and_ext', function ($data, $file, $filename, $mimes) {
	global $wp_version;
	if ($wp_version !== '4.7.1') {
		return $data;
	}

	$filetype = wp_check_filetype($filename, $mimes);

	return [
		'ext'             => $filetype['ext'],
		'type'            => $filetype['type'],
		'proper_filename' => $data['proper_filename']
	];
}, 10, 4);

function cc_mime_types($mimes)
{
	//$mimes['ico'] = 'image/x-icon';
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

function fix_svg()
{
	echo '<style type="text/css">
		  .attachment-266x266, .thumbnail img {
			   width: 100% !important;
			   height: auto !important;
		  }
		  </style>';
}
add_action('admin_head', 'fix_svg');

function nd_dosth_theme_setup()
{
	// Register Navigation Menus
	register_nav_menus(array(
		'footer'   => 'Display this menu in Footer',
		'social-links'   => 'Social Media - Display this menu in Footer',
		'header-right-menu'   => 'Resource and Contact display on header',
	));
}
add_action('after_setup_theme', 'nd_dosth_theme_setup');

add_action('acf/init', 'my_acf_op_init');
function my_acf_op_init()
{

	// Check function exists.
	if (function_exists('acf_add_options_page')) {

		// Add parent.
		$parent = acf_add_options_page(array(
			'page_title'  => __('Theme General Settings'),
			'menu_title'  => __('Theme Settings'),
			'redirect'    => false,
			'capability' => 'manage_options',
		));
	}
}

function remove_editor()
{
	remove_post_type_support('page', 'editor');
}
add_action('admin_init', 'remove_editor');

//remove admin bar from frontend
add_filter('show_admin_bar', '__return_false');

function reading_time()
{
	global $post;
	$content = get_post_field('post_content', $post->ID);
	$word_count = str_word_count(strip_tags($content));
	$readingtime = ceil($word_count / 200);
	$timer = " min";
	$totalreadingtime = $readingtime . $timer;
	return $totalreadingtime;
}

function get_reading_time_of_post($post_id)
{
	$totalreadingtime = '';
	if (!empty($post_id)) {
		$content = get_post_field('post_content', $post_id);
		$word_count = str_word_count(strip_tags($content));
		$readingtime = ceil($word_count / 200);
		$timer = " min";
		$totalreadingtime = $readingtime . $timer;
	}
	return $totalreadingtime;
}

/* Load More post button */
function more_post_ajax()
{
	$load_more = false;
	$ppp = (isset($_POST["ppp"])) ? $_POST["ppp"] : 5;
	$page = (isset($_POST['pageNumber'])) ? $_POST['pageNumber'] : 1;
	$catid = $_REQUEST['catid'];
	$tagid = $_REQUEST['tagid'];
	//ob_start();
	$args = array(
		//'suppress_filters' => true,
		'post_type' => 'post',
		'order' => 'DESC',
		'orderby' => 'publish_date',
		'posts_per_page' => $ppp,
		'post_status' => array('publish'),
		'paged' => $page
	);
	if (!empty($catid)) {
		$args['tax_query'] = array(
			array(
				'taxonomy'  => 'category',
				'field'     => 'term_id',
				'terms'     => $catid
			)
		);
	}
	if (!empty($tagid)) {
		$args['tag_id'] = $tagid;
	}
	$loop = new WP_Query($args);
	$found_posts =  $loop->found_posts;
	$post_count =  $loop->post_count;
	if (!empty($found_posts)) {
		$load_more = true;
	}
	if ($found_posts == $post_count) {
		$load_more = false;
	} else if ($post_count < $ppp) {
		$load_more = false;
	}
	$html = $blog_place_img = $blog_img = '';
	$place_attach_id = get_field('theme_placeholder_image', 'option');
	if (!empty($place_attach_id)) {
		$blog_place = wp_get_attachment_image_src($place_attach_id, 'full');
		if ($blog_place) {
			$blog_place_img = $blog_place[0];
		}
	}
	if ($loop->have_posts()) :
		while ($loop->have_posts()) :
			$loop->the_post();
			$blog_img = '';
			$srcset = '';
			if (has_post_thumbnail(get_the_ID())) {
				$attch_id = get_post_thumbnail_id(get_the_ID());
				$url = wp_get_attachment_image_src($attch_id, 'full');
				$srcset = wp_get_attachment_image_srcset($attch_id);
				if ($url) {
					$blog_img = $url[0];
				}
			}
			if (empty($blog_img)) {
				$blog_img = $blog_place_img;
			}

			$html .= '<div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-duration="500">';
			$html .= '<div class="blog-list-block mb-4 mb-md-5">';
			$html .= '<a class="blog-list-image mb-2 mb-md-3" href="' . get_the_permalink() . '">';
			if ($blog_img) {
				$html .= '<img src="' . $blog_img . '"  srcset="' . $srcset . '"  title="' . get_the_title() . '" alt="' . get_the_title() . '"/>';
			}
			$html .= '</a>';
			$html .= '<div class="d-flex align-items-center mb-2 font-12 font-md-16">';
			$html .= '<p class="blog-list-date text-A1A1A1 mb-0">';
			$html .= get_the_date('M jS, Y');
			$html .= '</p>';
			$html .= '<p class="text-A1A1A1 mb-0">';
			$html .= reading_time() . ' to read';
			$html .= '</p>';
			$html .= '</div>';
			$html .= '<a href="' . get_the_permalink() . '">';
			$html .= get_the_title();
			$html .= '</a>';
			$html .= '</div>';
			$html .= '</div>';

		endwhile;
	endif;
	wp_reset_postdata();
	//$html = ob_get_contents();
	//ob_end_clean();
	$return = array(
		'html'  => $html,
		'load_more' => $load_more,
		'post_count' => $post_count,
		'found_posts' => $found_posts
	);
	echo json_encode($return);
	die();
}
add_action('wp_ajax_nopriv_more_post_ajax', 'more_post_ajax');
add_action('wp_ajax_more_post_ajax', 'more_post_ajax');

function al_latest_posts($ppp = 6, $page = 1, $catid = 0, $tagid = 0)
{
	$args = array(
		'post_type' => 'post',
		'order' => 'DESC',
		'orderby' => 'publish_date',
		'posts_per_page' => $ppp,
		'post_status' => array('publish'),
		'paged' => $page
	);
	if (!empty($catid)) {
		$args['tax_query'] = array(
			array(
				'taxonomy'  => 'category',
				'field'     => 'term_id',
				'terms'     => $catid
			)
		);
	}
	if (!empty($tagid)) {
		$args['tag_id'] = $tagid;
	}
	$loop = new WP_Query($args);

	$html = $blog_place_img = $blog_img = '';
	$place_attach_id = get_field('theme_placeholder_image', 'option');
	if (!empty($place_attach_id)) {
		$blog_place = wp_get_attachment_image_src($place_attach_id, 'full');
		if ($blog_place) {
			$blog_place_img = $blog_place[0];
		}
	}
	if ($loop->have_posts()) :
		while ($loop->have_posts()) :
			$loop->the_post();
			$blog_img = '';
			$srcset = '';
			if (has_post_thumbnail(get_the_ID())) {
				$attch_id = get_post_thumbnail_id(get_the_ID());
				$url = wp_get_attachment_image_src($attch_id, 'full');
				$srcset = wp_get_attachment_image_srcset($attch_id);
				if ($url) {
					$blog_img = $url[0];
				}
			}
			if (empty($blog_img)) {
				$blog_img = $blog_place_img;
			}

			$html .= '<div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-duration="500">';
			$html .= '<div class="blog-list-block mb-4 mb-md-5">';
			$html .= '<a class="blog-list-image mb-2 mb-md-3" href="' . get_the_permalink() . '">';
			if ($blog_img) {
				$html .= '<img src="' . $blog_img . '" srcset="' . $srcset . '"  title="' . get_the_title() . '" alt="' . get_the_title() . '"/>';
			}
			$html .= '</a>';
			$html .= '<div class="d-flex align-items-center mb-2 font-12 font-md-16">';
			$html .= '<p class="blog-list-date text-A1A1A1 mb-0">';
			$html .= get_the_date('M jS, Y');
			$html .= '</p>';
			$html .= '<p class="text-A1A1A1 mb-0">';
			$html .= reading_time() . ' to read';
			$html .= '</p>';
			$html .= '</div>';
			$html .= '<a href="' . get_the_permalink() . '">';
			$html .= get_the_title();
			$html .= '</a>';
			$html .= '</div>';
			$html .= '</div>';

		endwhile;
	else :

		$html .= '<div class="col-12">';
		$html .= '<div class="text-center font-24 text-primary">';
		$html .=  'No blog found!';
		$html .= '</div>';
		$html .= '</div>';

	endif;
	wp_reset_postdata();

	return $html;
}
// CF7 JS & CSS Load on particular page
add_filter('wpcf7_load_js', '__return_false');
add_filter('wpcf7_load_css', '__return_false');
// function pine_scripts()
// {
// 	wp_dequeue_script('google-recaptcha');
// }
function pine_scriptss()
{
	global $post;
	if (is_page('contact-us') || $post->ID == 8633 || is_page('blog') || is_singular('career-at-aureate') || is_page('shopify-maintenance-services') || is_page('magento-web-development-company') || is_page('magento-2-performance-optimization') || is_page('hyva-theme-development') || is_page('shopify-maintenance-services') || is_page('migrate-to-magento-2') || is_page('vsf-thy-fashion-theme') || is_page('hire-magento-developer') || is_page('hire-shopify-developer') || is_page('hire-vue-storefront-developer') || is_page('progressive-web-apps-for-shopify') || is_page('shogun-frontend-development-services') || is_page('magento-maintenance-services') || is_page('progressive-web-apps-for-magento-2') || is_singular('guides') || is_singular('post')) {
		if (function_exists('wpcf7_enqueue_scripts')) {
			wpcf7_enqueue_scripts();
			wp_enqueue_script('google-recaptcha');
			wp_enqueue_style('wp-block-library');
			wp_enqueue_style('google-recaptcha');
			wp_enqueue_style('contact-form-7');
			add_action('wp_enqueue_scripts', 'wpcf7_recaptcha_enqueue_scripts', 20);
			wp_enqueue_script('gtm4wp-contact-form-7-tracker');
			wp_enqueue_script('utm_contact_form7_scripts');
		}

		if (is_page('blog') || is_singular('post') || is_singular('guides')) 
		{
			wp_enqueue_script('popup', get_template_directory_uri() . '/assets/js/custom-popup.js');
		}
	}

	# remove code snippet script for other pages
	if (!is_singular('post') && !is_singular('guides')) {
		wp_dequeue_style('code-snippet-dm-main-min');
		wp_dequeue_script('code-snippet-dm-dm-clipboard');
		wp_dequeue_script('code-snippet-dm-dm-prism');
		wp_dequeue_script('code-snippet-dm-dm-manually-start-prism');
		wp_dequeue_script('code-snippet-dm');
		wp_dequeue_script('ht_toc-script-js');
		wp_dequeue_style('ht_toc-style-css');
	}
}
add_action('wp_enqueue_scripts', 'pine_scriptss');


// Hero Background Header Condition Code
add_filter('body_class', 'al_body_class');
function al_body_class($classes)
{
	if ($package_colour = get_field('background_header', get_the_ID())) {

		if (!empty($package_colour)) {
			$classes[] = $package_colour;
		}
	}
	$al_top_bar = get_field('al_top_bar', 'option');
	if (!empty($al_top_bar)) {
		$show =  isset($al_top_bar['show']) ? $al_top_bar['show'] : '';
		$content =  isset($al_top_bar['content']) ? $al_top_bar['content'] : '';
		if ($show) {
			if (!empty($content)) {
				$classes[] = 'header-topbar';
			}
		}
	}
	if (is_404()) {
		$classes[] = 'white-header';
	}
	if (is_category()) {
		$classes[] = 'white-header';
	}
	if (is_tag()) {
		$classes[] = 'white-header';
	}
	if (is_singular('case-studies')) {
		$classes[] = 'white-header';
	}
	if (is_singular('post')) {
		$classes[] = 'white-header';
	}
	if (is_search()) {
		$classes[] = 'white-header';
	}
	if (is_singular('guides')) {
		$classes[] = 'white-header';
	}

	$cookie_name = "hyva-theme-development-ref";
	if (((isset($_COOKIE[$cookie_name]) && !empty($_COOKIE[$cookie_name]) && $_COOKIE[$cookie_name] == 'MM22NYC') || (isset($_GET['ref']) && !empty($_GET['ref']) && $_GET['ref'] == 'MM22NYC')) && is_page('hyva-theme-development')) {
		$classes[] = 'header-topbar';
	}

	global $wp_query;
	$query_vars = $wp_query->query_vars;

	if(isset($query_vars['thank-you']))
	{
		$classes[] = 'white-header';
	}

	return $classes;
}

// Remove revision data for Pages only
add_action('admin_init', 'aureatelabs_disable_revisions');
function aureatelabs_disable_revisions()
{
	remove_post_type_support('page', 'revisions');
}

remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('wp_enqueue_scripts', 'wp_enqueue_global_styles');
remove_action('wp_body_open', 'wp_global_styles_render_svg_filters');

function disable_emojis_tinymce($plugins)
{
	if (is_array($plugins)) {
		return array_diff($plugins, array('wpemoji'));
	} else {
		return array();
	}
}

function disable_emojis_remove_dns_prefetch($urls, $relation_type)
{
	if ('dns-prefetch' == $relation_type) {
		/** This filter is documented in wp-includes/formatting.php */
		$emoji_svg_url = apply_filters('emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/');

		$urls = array_diff($urls, array($emoji_svg_url));
	}

	return $urls;
}

# Get aria-label for wp defualt logo
function theme_get_custom_logo()
{
	if (has_custom_logo()) {
		$logovar = get_theme_mod('custom_logo');
		$image_data =  get_post($logovar);
		$image_title = $image_data->post_title;
		$site_title = get_bloginfo('name');
		$logo = wp_get_attachment_image_src(get_theme_mod('custom_logo'), 'full');
		echo '<a class="custom-logo-link" href="' . get_site_url() . '" aria-label="' . get_bloginfo('name') . '" title="' . get_bloginfo('name') . '">';
		echo '<img class="custom-logo" src="' . esc_url($logo[0]) . '" width="' . $logo[1] . '" height="' . $logo[2] . '" title="' . get_bloginfo('name') . '" alt="' . get_bloginfo('name') . '">';
		echo "</a>";
	} else {
		echo '<h1>';
		echo '<a href="' . get_site_url() . '">' . get_bloginfo('name') . '</a>';
		echo '</h1>';
	}
}


# Change wp-admin logo
add_action('login_enqueue_scripts', 'aurtl_admin_logo_callback');
function aurtl_admin_logo_callback()
{
	# get saved data
	$wp_admin_options = get_field('wp_admin_options', 'option');
	$img_width = 250;
	$img_height = 50;
	if (!empty($wp_admin_options)) {
		$wp_admin_login_logo = isset($wp_admin_options['wp_admin_login_logo']) ? $wp_admin_options['wp_admin_login_logo'] : array();
		if (!empty($wp_admin_login_logo)) {
			$img_data_url = isset($wp_admin_login_logo['url']) ? $wp_admin_login_logo['url'] : '';
			if (isset($img_data_url)) {	?>
				<style type="text/css">
					body.login div#login h1 a {
						background-image: url(<?php echo esc_url($img_data_url); ?>);
						width: <?php echo esc_attr($img_width); ?>px !important;
						height: <?php echo esc_attr($img_height); ?>px !important;
						background-size: 100% !important;
						margin: 0 auto !important;
					}
				</style>
	<?php
			}
		}
	}
}
# Change wp-admin logo link
add_action('login_headerurl', 'aurtl_login_headerurl_callback');
function aurtl_login_headerurl_callback()
{
	return home_url();
}

//add_filter('acf/fields/post_object/query/name=s5_career_position', 'my_acf_fields_post_object_query', 10, 3);
// function my_acf_fields_post_object_query($args, $field, $post_id)
// {
// 	$post_id = 235;
// 	$args['post_parent'] = $post_id;
// 	$args['post_status'] = 'publish';
// 	return $args;
// }


# CPT
add_action('init', 'aureate_create_post_types');
function aureate_create_post_types()
{

	#testimonials
	$testimonial_labels = array(
		'name'               => _x('Testimonials', 'Testimonials name', 'aureate'),
		'singular_name'      => _x('Testimonial', 'Testimonials name', 'aureate'),
		'menu_name'          => _x('Testimonials', 'admin menu', 'aureate'),
		'name_admin_bar'     => _x('Testimonials', 'add new on admin bar', 'aureate'),
		'add_new'            => _x('Add New', 'Testimonials', 'aureate'),
		'add_new_item'       => __('Add New Testimonial', 'aureate'),
		'new_item'           => __('New Testimonial', 'aureate'),
		'edit_item'          => __('Edit Testimonial', 'aureate'),
		'view_item'          => __('View Testimonial', 'aureate'),
		'all_items'          => __('All Testimonials', 'aureate'),
		'search_items'       => __('Search Testimonials', 'aureate'),
		'parent_item_colon'  => __('Parent Testimonials:', 'aureate'),
		'not_found'          => __('No Testimonials found.', 'aureate'),
		'not_found_in_trash' => __('No Testimonials found in Trash.', 'aureate')
	);

	$testimonial_args = array(
		'labels'             => $testimonial_labels,
		'description'        => __('Description.', 'aureate'),
		'public'             => false,
		'show_in_nav_menus' => false,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => false, //array( 'slug' => 'testimonials' ),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array('title'),
		'menu_icon'          => 'dashicons-testimonial'
	);
	register_post_type('testimonials', $testimonial_args);

	$type_labels_arg = array(
		'name'               => 'Types',
		'singular_name'      => 'Type',
		'search_items'       => 'Search Types',
		'all_items'          => 'All Types',
		'parent_item'        => 'Parent Type',
		'parent_item_colon'  => 'Parent Type:',
		'update_item'        => 'Update Type',
		'edit_item'          => 'Edit Type',
		'add_new_item'       => 'Add New Type',
		'new_item_name'      => 'New Type Name',
		'menu_name'          => 'Types'
	);
	$type_args = array(
		'labels'            => $type_labels_arg,
		'hierarchical'      => true,
		'show_ui'           => true,
		'how_in_nav_menus'  => true,
		'public'            => false,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array('slug' => 'types'),
	);
	register_taxonomy('types', 'testimonials', $type_args);

	# careers CPT
	$career_labels = array(
		'name'               => _x('Careers', 'Career name', 'aureate'),
		'singular_name'      => _x('Careers', 'Career name', 'aureate'),
		'menu_name'          => _x('Careers', 'admin menu', 'aureate'),
		'name_admin_bar'     => _x('Careers', 'add new on admin bar', 'aureate'),
		'add_new'            => _x('Add New', 'Careers', 'aureate'),
		'add_new_item'       => __('Add New Careers', 'aureate'),
		'new_item'           => __('New Careers', 'aureate'),
		'edit_item'          => __('Edit Careers', 'aureate'),
		'view_item'          => __('View Careers', 'aureate'),
		'all_items'          => __('All Careers', 'aureate'),
		'search_items'       => __('Search Careers', 'aureate'),
		'parent_item_colon'  => __('Parent Careers:', 'aureate'),
		'not_found'          => __('No Careers found.', 'aureate'),
		'not_found_in_trash' => __('No Careers found in Trash.', 'aureate')
	);
	$career_args = array(
		'labels'             => $career_labels,
		'description'        => __('Description.', 'aureate'),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array('slug' => 'career-at-aureate', 'with_front' => false),
		/*'with_front' 		 => false,*/
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array('title'),
		'menu_icon'          => 'dashicons-groups'
	);
	register_post_type('career-at-aureate', $career_args);

	$roles_labels_arg = array(
		'name'               => 'Roles',
		'singular_name'      => 'Role',
		'search_items'       => 'Search Roles',
		'all_items'          => 'All Roles',
		'parent_item'        => 'Parent Role',
		'parent_item_colon'  => 'Parent Role:',
		'update_item'        => 'Update Role',
		'edit_item'          => 'Edit Role',
		'add_new_item'       => 'Add New Role',
		'new_item_name'      => 'New Role Name',
		'menu_name'          => 'Roles'
	);
	$roles_args = array(
		'labels'            => $roles_labels_arg,
		'hierarchical'      => true,
		'show_ui'           => true,
		'how_in_nav_menus'  => true,
		'public'            => false,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array('slug' => 'roles'),
	);
	register_taxonomy('roles', 'career-at-aureate', $roles_args);

	# Case study CPT
	$casestudy_labels = array(
		'name'               => _x('Case Studies', 'Case Study name', 'aureate'),
		'singular_name'      => _x('Case Studies', 'Case Study name', 'aureate'),
		'menu_name'          => _x('Case Studies', 'admin menu', 'aureate'),
		'name_admin_bar'     => _x('Case Studies', 'add new on admin bar', 'aureate'),
		'add_new'            => _x('Add New', 'Case Studies', 'aureate'),
		'add_new_item'       => __('Add New Case Studies', 'aureate'),
		'new_item'           => __('New Case Studies', 'aureate'),
		'edit_item'          => __('Edit Case Studies', 'aureate'),
		'view_item'          => __('View Case Studies', 'aureate'),
		'all_items'          => __('All Case Studies', 'aureate'),
		'search_items'       => __('Search Case Studies', 'aureate'),
		'parent_item_colon'  => __('Parent Case Studies:', 'aureate'),
		'not_found'          => __('No Case Studies found.', 'aureate'),
		'not_found_in_trash' => __('No Case Studies found in Trash.', 'aureate')
	);
	$casestudy_args = array(
		'labels'             => $casestudy_labels,
		'description'        => __('Description.', 'aureate'),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array('slug' => 'case-studies', 'with_front' => false),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array('title'),
		'menu_icon'          => 'dashicons-portfolio'
	);
	register_post_type('case-studies', $casestudy_args);

	#Guides
	$guide_labels = array(
		'name'               => _x('Guides', 'Guides name', 'aureate'),
		'singular_name'      => _x('Guide', 'Guides name', 'aureate'),
		'menu_name'          => _x('Guides', 'admin menu', 'aureate'),
		'name_admin_bar'     => _x('Guides', 'add new on admin bar', 'aureate'),
		'add_new'            => _x('Add New', 'Guides', 'aureate'),
		'add_new_item'       => __('Add New Guide', 'aureate'),
		'new_item'           => __('New Guide', 'aureate'),
		'edit_item'          => __('Edit Guide', 'aureate'),
		'view_item'          => __('View Guide', 'aureate'),
		'all_items'          => __('All Guides', 'aureate'),
		'search_items'       => __('Search Guides', 'aureate'),
		'parent_item_colon'  => __('Parent Guides:', 'aureate'),
		'not_found'          => __('No Guides found.', 'aureate'),
		'not_found_in_trash' => __('No Guides found in Trash.', 'aureate')
	);

	$guide_args = array(
		'labels'             => $guide_labels,
		'description'        => __('Description.', 'aureate'),
		'public'             => true,
		'show_in_nav_menus' => false,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'show_in_rest'       => true, // To use Gutenberg editor.
		'query_var'          => true,
		//'rewrite'            => array('slug' => 'guides/%guide_cat%', 'with_front' => false),
		'rewrite'            => array('slug' => 'guide', 'with_front' => false),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => true,
		'menu_position'      => null,
		'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'page-attributes'),
		'menu_icon'          => 'dashicons-media-document'
	);
	register_post_type('guides', $guide_args);

	/* $guide_type_labels_arg = array(
		'name'               => 'Topics',
		'singular_name'      => 'Topic',
		'search_items'       => 'Search Topics',
		'all_items'          => 'All Topics',
		'parent_item'        => 'Parent Topic',
		'parent_item_colon'  => 'Parent Topic:',
		'update_item'        => 'Update Topic',
		'edit_item'          => 'Edit Topic',
		'add_new_item'       => 'Add New Topic',
		'new_item_name'      => 'New Topic Name',
		'menu_name'          => 'Topic'
	);
	$guide_type_args = array(
		'labels'            => $guide_type_labels_arg,
		'hierarchical'      => true,
		'show_ui'           => true,
		'how_in_nav_menus'  => true,
		'public'            => false,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array('slug' => 'topic'),
	);
	register_taxonomy('topic', 'guides', $guide_type_args); */
}

# hide view link from row action
add_filter('post_row_actions', 'al_remove_row_actions', 10, 1);
function al_remove_row_actions($actions)
{
	if (get_post_type() === 'testimonials') {
		unset($actions['view']);
	}
	return $actions;
}

# template redirect
add_action('template_redirect', 'al_page_template_redirect');
function al_page_template_redirect()
{
	if (is_page('platforms') || is_page('ebook') || is_page('events')) {
		wp_redirect(home_url());
		exit();
	}
	
	global $wp_query;
	$query_vars = $wp_query->query_vars;
	$is_thank_you_page = 'no';
	if(isset($query_vars['thank-you']))
	{
		if (!is_page('blog') && !is_singular('post') && !is_singular('guides')) 
		{
			$get_permalink = get_the_permalink();
			$is_thank_you_page = 'yes';
			$cookie_name = "first_time";
			if(isset($_COOKIE[$cookie_name]) && !empty($_COOKIE[$cookie_name]) && $_COOKIE[$cookie_name] == 'no')
			{
				
				wp_redirect($get_permalink);
				exit();
			}
			else if(!isset($_COOKIE[$cookie_name]))
			{
				wp_redirect($get_permalink);
				exit();
			}
		}
	}
}

# comment fields change
add_filter('comment_form_fields', 'al_move_comment_field_to_bottom', 10, 1);
function al_move_comment_field_to_bottom($fields)
{
	$comment_field = $fields['comment'];
	unset($fields['comment']);
	$fields['comment'] = $comment_field;
	$fields['author'] = '<p class="comment-form-author col-md-12"><label for="author">Full Name <span class="required">*</span></label><input type="text" id="author" name="author" require="required" placeholder=""></p>';
	$fields['email'] = '<p class="comment-form-email col-md-6"><label for="email">Email <span class="required" aria-hidden="true">*</span></label> <input id="email" name="email" type="email" value="" size="30" maxlength="100" required=""></p>';
	$fields['url'] = '<p class="comment-form-url col-md-6"><label for="url">Website (Optional) </label><input type="url" id="url" name="url" placeholder=""></p>';
	unset($fields['cookies']);
	return $fields;
}

# add row before fields
function al_comment_form_before_fields()
{
	echo '<div class="row">';
}
add_action('comment_form_before_fields', 'al_comment_form_before_fields');

# close row before fields
function al_comment_form_after_fields()
{
	echo '</div>';
}
add_action('comment_form_after_fields', 'al_comment_form_after_fields');

# change comment forms
add_filter('comment_form_defaults', 'al_change_comment_form_submit_label');
function al_change_comment_form_submit_label($arg)
{

	$arg['label_submit'] = 'Leave Comment';
	$arg['title_reply'] = '';
	$arg['logged_in_as'] = '';
	$arg['comment_notes_before'] = '';
	$arg['comment_notes_after'] = '<p class="recaptcha"> * This site is protected by reCAPTCHA and the Google <a href="https://policies.google.com/privacy" target="_blank">Privacy Policy</a> and <a href="https://policies.google.com/terms" target="_blank">Terms of Service</a> apply.</p>';
	return $arg;
}


// add_action( "comment_form_comments_closed", 'al_on_comment_form_comments_closed_event');
// function al_on_comment_form_comments_closed_event(){
// 	echo '<p class="text-body mb-4">Comments are closed.</p>';
// }

# change comment date format
//add_filter( 'get_comment_date', 'al_comment_date_format' );    
function al_comment_date_format($date, $format, $comment)
{
	if (!is_admin()) {
		$date = date("F d, Y", $comment->comment_ID);
	}
	return $date;
}

# remove comment time
add_filter('get_comment_time', 'al_comment_time_format');
function al_comment_time_format($date)
{
	if (!is_admin()) {
		return;
	} else {
		return $date;
	}
}

# remove [..] from excerpt
add_filter('excerpt_more', 'al_excerpt_more');
function al_excerpt_more($more)
{
	return '...';
}

# excerpt length
add_filter('excerpt_length', 'al_custom_excerpt_length', 999);
function al_custom_excerpt_length($length)
{
	return 30;
}

# comment html callback
function al_comment_callback($comment, $args, $depth)
{
	if ('div' === $args['style']) {
		$tag       = 'div';
		$add_below = 'comment';
	} else {
		$tag       = 'li';
		$add_below = 'div-comment';
	}
	?>
	<<?php echo $tag ?> <?php comment_class(empty($args['has_children']) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
		<?php if ('div' != $args['style']) : ?>
			<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
			<?php endif; ?>
			<div class="comment-author-details ">
				<div class="d-flex mb-3">
					<?php if ($args['avatar_size'] != 0) echo get_avatar($comment, $args['avatar_size']); ?>
					<div class="comment-meta commentmetadata">
						<?php printf(__('<span class="comment-authorname text-primary font-weight-medium">%s</span>'),  get_comment_author()); ?>

						<a class="comment-date d-block font-12 font-md-16 font-weight-normal text-A1A1A1" href="<?php echo htmlspecialchars(get_comment_link($comment->comment_ID)); ?>">
							<?php
							printf(__('%1$s  %2$s'), get_comment_date('F d, Y', $comment->comment_ID),  get_comment_time()); ?>
						</a>
						<?php edit_comment_link(__('(Edit)'), '<span class="font-10 font-md-12">  ', '</span>'); ?>
						<?php if ($comment->comment_approved == '0') : ?>
							<em class="font-14 text-secondary text-red"><?php _e('Your comment is awaiting moderation.'); ?></em>
						<?php endif; ?>
					</div>
				</div>
				<div class="comment-author-content ">
					<?php comment_text(); ?>
					<?php comment_reply_link(array_merge($args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
				</div>
			</div>
			<?php if ('div' != $args['style']) : ?>
			</div>
		<?php endif; ?>
	<?php
}

# Add class to reply link
function al_add_class_reply($link, $args, $comment, $post)
{
	return str_replace('comment-reply-link', 'comment-reply-link text-mine-shaft', $link);
}
add_filter('comment_reply_link', 'al_add_class_reply', 420, 4);

function al_add_page_slug_body_class($classes)
{
	global $post;
	if (isset($post)) {
		$classes[] = $post->post_name . '-page';
	}
	return $classes;
}
add_filter('body_class', 'al_add_page_slug_body_class');

// modify the path to the icons directory
add_filter('acf_icon_path_suffix', 'acf_icon_path_suffix');
function acf_icon_path_suffix($path_suffix)
{
	return 'assets/icons/';
}

add_filter('wpcf7_form_elements', function ($form) {
	$get_name = get_the_title(get_the_ID());
	$form = str_replace('getpagetitle', $get_name, $form);
	return $form;
});

# Disable XML-RPC 
add_filter('xmlrpc_enabled', '__return_false');

/**
 * Remove & Disable XML-RPC Pingback
 * Unset XML-RPC Methods.
 * https://wordpress.org/plugins/disable-xml-rpc-pingback/#developers
 **/
add_filter('xmlrpc_methods', 'sar_block_xmlrpc_attacks');
function sar_block_xmlrpc_attacks($methods)
{
	unset($methods['pingback.ping']);
	unset($methods['pingback.extensions.getPingbacks']);
	return $methods;
}
if (version_compare(get_bloginfo('version'), '4.4', '>=')) {
	add_action('wp', 'sar_remove_x_pingback_header_44', 9999);
	function sar_remove_x_pingback_header_44()
	{
		header_remove('X-Pingback');
	}
} elseif (version_compare(get_bloginfo('version'), '4.4', '<')) {
	add_filter('wp_headers', 'sar_remove_x_pingback_header');
	function sar_remove_x_pingback_header($headers)
	{
		unset($headers['X-Pingback']);
		return $headers;
	}
}

#disable search functionality from site
// function al_filter_query( $query, $error = true ) {
// 	if ( is_search() ) {
// 		$query->is_search = false;
// 		$query->query_vars['s'] = false;
// 		$query->query['s'] = false;
// 		// to error
// 		if ( $error == true )
// 			$query->is_404 = true;
// 	}
// }
// add_action( 'parse_query', 'al_filter_query' );
add_filter('get_search_form', 'al_search_form');
function al_search_form($html)
{
	$html = '';
	return $html;
}

# add title attribute
add_filter('wp_get_attachment_image_attributes', 'al_add_image_attributes', 10, 3);
function al_add_image_attributes($attr, $attachment, $size)
{
	if (!isset($attr['title'])) {
		$attr['title'] = $attachment->post_title;
	}
	return $attr;
}

# encode email address
function al_eae_encode_str($string, $hex = false)
{
	$chars = str_split($string);
	$seed = mt_rand(0, (int) abs(crc32($string) / strlen($string)));
	foreach ($chars as $key => $char) {
		$ord = ord($char);

		if ($ord < 128) { // ignore non-ascii chars
			$r = ($seed * (1 + $key)) % 100; // pseudo "random function"

			if ($r > 75 && $char !== '@' && $char !== '.'); // plain character (not encoded), except @-signs and dots
			else if ($hex && $r < 25) $chars[$key] = '%' . bin2hex($char); // hex
			else if ($r < 45) $chars[$key] = '&#x' . dechex($ord) . ';'; // hexadecimal
			else $chars[$key] = "&#{$ord};"; // decimal (ascii)
		}
	}
	return implode('', $chars);
}

function al_encode_emails($string)
{
	$regexp = '{
            (?:mailto:)?
            (?:
                [-!#$%&*+/=?^_`.{|}~\w\x80-\xFF]+
            |
                ".*?"
            )
            \@
            (?:
                [-a-z0-9\x80-\xFF]+(\.[-a-z0-9\x80-\xFF]+)*\.[a-z]+
            |
                \[[\d.a-fA-F:]+\]
            )
        }xi';

	$method = 'al_eae_encode_str';

	$callback = function ($matches) use ($method) {
		return $method($matches[0]);
	};

	return preg_replace_callback($regexp, $callback, $string);
}

# redirect to post page without die
class al_Handle_Comment_Duplicate
{
	private $comment_post_id;

	public function __construct()
	{
		add_filter('preprocess_comment', [$this, 'al_capture_post_id'], 10, 1);

		add_action('comment_flood_trigger', [$this, 'al_handle_redirect'], 0, 0);
		add_action('comment_duplicate_trigger', [$this, 'al_handle_redirect'], 0, 0);
	}

	public function al_capture_post_id($comment)
	{
		$this->comment_post_id = isset($comment['comment_post_ID']) ? $comment['comment_post_ID'] : 0;
		return $comment;
	}

	public function al_handle_redirect()
	{
		if (!empty($this->comment_post_id)) {
			wp_safe_redirect(get_permalink(get_post($this->comment_post_id)) . '?al_duplicate_comment=yes#duplicate-msg');
			die();
		}
	}
}
new al_Handle_Comment_Duplicate();

# allow duplicate comment
//add_filter('duplicate_comment_id', '__return_false');

function al_after_comment_listing_callback($post_id)
{
	if (isset($_GET['al_duplicate_comment']) && !empty($_GET['al_duplicate_comment'])) {
		if ($_GET['al_duplicate_comment'] == 'yes') {
			echo '<div id="duplicate-msg" class="text-center mt-4">';
			echo '<span class="text-red font-md-24 text-primary">Duplicate comment detected; it looks as though you’ve already said that!</span>';
			echo '</div>';
		}
	}
}
add_action('al_after_comment_listing', 'al_after_comment_listing_callback');

# remove yoast seo plugin schema
add_filter('wpseo_json_ld_output', '__return_false');

function al_custom_canonical($url)
{
	global $post;
	if ($post->post_name == 'blog') {
		return site_url($post->post_name . '/');
	} elseif (is_category()) {
		global $wp;
		$current_url =  home_url($wp->request);
		if (strpos($current_url, '/page') !== false) {
			$pos = strpos($current_url, '/page');
			$finalurl = substr($current_url, 0, $pos);
			return  $finalurl . "/";
		} else {
			return $current_url . "/";
		}
	} else {
		return $url;
	}
}
//add_filter('wpseo_canonical', 'al_custom_canonical');

add_filter('the_content', 'al_remove_empty_p', 20, 1);
function al_remove_empty_p($content)
{
	$content = force_balance_tags($content);
	return preg_replace('#<p>\s*+(<br\s*/*>)?\s*</p>#i', '', $content);
}

# start with function
function startsWith($string, $startString)
{
	$len = strlen($startString);
	return (substr($string, 0, $len) === $startString);
}

# disable feed

function itsme_disable_feed()
{
	wp_die(__('No feed available, please visit the <a href="' . esc_url(home_url('/')) . '">homepage</a>!'));
}

add_action('do_feed', 'itsme_disable_feed', 1);
add_action('do_feed_rdf', 'itsme_disable_feed', 1);
add_action('do_feed_rss', 'itsme_disable_feed', 1);
add_action('do_feed_rss2', 'itsme_disable_feed', 1);
add_action('do_feed_atom', 'itsme_disable_feed', 1);
add_action('do_feed_rss2_comments', 'itsme_disable_feed', 1);
add_action('do_feed_atom_comments', 'itsme_disable_feed', 1);

remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'feed_links', 2);


add_action('wpcf7_before_send_mail', 'al_wpcf7_add_text_to_mail_body');

function al_wpcf7_add_text_to_mail_body($contact_form)
{
	//$form_id = $contact_form->posted_data['_wpcf7'];
	$submission = WPCF7_Submission::get_instance();
	if ($submission) {
		$mail = $contact_form->prop('mail');
		if (isset($_COOKIE['last_visited_pages']) && !empty($_COOKIE['last_visited_pages'])) {
			if (strpos($mail['body'], '[VISITED_Details]') !== false) {
				$visited_list = json_encode($_COOKIE['last_visited_pages']);
				$cookie_visited_list = $_COOKIE['last_visited_pages'];
				$visited_list = stripslashes($cookie_visited_list);
				$visited_list_array = json_decode($visited_list, true);
				if (!empty($visited_list_array)) {
					$html = '';
					$html .= '<ul>';
					foreach ($visited_list_array as $key => $visited) {
						$html .= '<li>';
						$html .= $visited;
						$html .= '</li>';
					}
					$html .= '</li>';
				}
				$finalstring = "Last Visited Pages: " . $html;
				$mail['body'] = str_replace("[VISITED_Details]", $finalstring, $mail['body']);
			}
		}
		$contact_form->set_properties(array('mail' => $mail));
	}
}

/*Caching code for JS and CSS file*/
function vc_remove_wp_ver_css_js($src)
{
	if (strpos($src, 'ver=')) {
		$path = parse_url($src, PHP_URL_PATH);
		$slug_abs_path = $_SERVER['DOCUMENT_ROOT'] . $path;
		if (file_exists($slug_abs_path)) {
			$filetime = filemtime($slug_abs_path);
			$src = remove_query_arg('ver', $src);
			$src = add_query_arg(array('ver' => $filetime), $src);
		}
	}
	return $src;
}
add_filter('style_loader_src', 'vc_remove_wp_ver_css_js', 9999);
add_filter('script_loader_src', 'vc_remove_wp_ver_css_js', 9999);

# set cookies for ref
# Commented because not worked on production due wpengine cookie blocked
#add_action('template_redirect', 'aureate_page_ref_callback');
function aureate_page_ref_callback()
{
	if (is_page('hyva-theme-development')) {
		if (isset($_GET['ref']) && !empty($_GET['ref']) && $_GET['ref'] == 'MM22NYC') {
			$cookie_name = "hyva-theme-development-ref";
			$cookie_value = "MM22NYC";
			$expire = strtotime('2022-10-05 23:59:59');
			if (!isset($_COOKIE[$cookie_name])) {
				setcookie($cookie_name, $cookie_value, $expire);
			}
		}
	}
}

add_filter('wpseo_opengraph_image', 'al_change_image');
function al_change_image($image)
{

	$post_id = get_the_ID();
	$blog_og_image = get_field('blog_og_image', get_the_ID());
	if (!empty($blog_og_image)) {
		$url = isset($blog_og_image['url']) ? $blog_og_image['url'] : '';
		if (!empty($url)) {
			$image = $url;
		}
	}
	return $image;
}

function al_remove_quick_edit($actions, $post)
{
	if ($post->post_type == 'guides') {
		unset($actions['inline hide-if-no-js']);
	}
	return $actions;
}
add_filter('post_row_actions', 'al_remove_quick_edit', 10, 2);

function al_random_number_shortcode()
{
	$min = 2000;
	$max = 5000;
	$random = rand($min, $max);
	return number_format($random);
}
add_shortcode('rand_number', 'al_random_number_shortcode');

// added Guides Permalinks
/* function al_wpa_course_post_link( $post_link, $id = 0 ){
    $post = get_post($id);  
    if ( is_object( $post ) ){
        $terms = wp_get_object_terms( $post->ID, 'topic' );
        if( $terms ){
            return str_replace( '%guide_cat%' , $terms[0]->slug , $post_link );
        }
    }
    return $post_link;  
}
add_filter( 'post_type_link', 'al_wpa_course_post_link', 1, 3 );

function archive_rewrite_rules() {
    add_rewrite_rule(
        '^guides/(.*)/(.*)/?$',
        'index.php?post_type=guides&name=$matches[2]',
        'top'
    );
}

add_action( 'init', 'archive_rewrite_rules' ); */

# Remove update options for WordPress and Plugins
add_action('init', 'disable_update_for_live_and_staging');
function disable_update_for_live_and_staging()
{
	if (site_url() == 'https://aureatelabsstg.wpengine.com' || site_url() == 'https://aureatelabs.com') {
		# hide plugin update
		add_filter('site_transient_update_plugins', '__return_false');

		# remove wordpress core update notification
		add_filter('pre_option_update_core', '__return_null');
		remove_action('wp_version_check', 'wp_version_check');
		remove_action('admin_init', '_maybe_update_core');
		wp_clear_scheduled_hook('wp_version_check');
	}
}

add_action('init', 'add_account_edit_rule');
function add_account_edit_rule()
{
	add_rewrite_endpoint('thank-you', EP_PERMALINK | EP_PAGES | EP_ALL);
}

add_filter('query_vars', 'add_account_edit_var');
function add_account_edit_var($vars)
{
	$vars[] = 'thank-you';
	return $vars;
}

 add_action( 'template_include', function( $template ) {
	global $wp_query;
	$query_vars = $wp_query->query_vars;

	if(!isset($query_vars['thank-you']))
	{
        return $template;
    }

    return get_template_directory() . '/thank-you.php';
} ); 
