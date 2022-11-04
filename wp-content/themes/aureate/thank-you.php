<?php
get_header();
global $wp_query;
$query_vars = $wp_query->query_vars;
?>

<section class="pt-40 pt-xl-100 thankyou-page">
	<div class="thankyou-page-inner">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-12 text-center">
					<div class="thankyou_SVG">
						<svg width="100" height="100" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M50 0L55.1616 4.18987L61.126 1.2536L65.2259 6.48698L71.6942 4.95156L74.5267 10.966L81.1745 10.9084L82.5976 17.4024L89.0916 18.8255L89.034 25.4733L95.0484 28.3058L93.513 34.7741L98.7464 38.874L95.8101 44.8384L100 50L95.8101 55.1616L98.7464 61.126L93.513 65.2259L95.0484 71.6942L89.034 74.5267L89.0916 81.1745L82.5976 82.5976L81.1745 89.0916L74.5267 89.034L71.6942 95.0484L65.2259 93.513L61.126 98.7464L55.1616 95.8101L50 100L44.8384 95.8101L38.874 98.7464L34.7741 93.513L28.3058 95.0484L25.4733 89.034L18.8255 89.0916L17.4024 82.5976L10.9084 81.1745L10.966 74.5267L4.95156 71.6942L6.48698 65.2259L1.2536 61.126L4.18987 55.1616L0 50L4.18987 44.8384L1.2536 38.874L6.48698 34.7741L4.95156 28.3058L10.966 25.4733L10.9084 18.8255L17.4024 17.4024L18.8255 10.9084L25.4733 10.966L28.3058 4.95156L34.7741 6.48698L38.874 1.2536L44.8384 4.18987L50 0Z" fill="#E7B900" />
							<path d="M30.832 49.1667L44.1654 62.5L69.1654 37.5" stroke="white" stroke-width="8" />
						</svg>
					</div>
					<?php
                $thank_you_data = get_field('thank_you_data', 'option');
                if (!empty($thank_you_data)) {
                    $title =  isset($thank_you_data['thanks_title']) ? $thank_you_data['thanks_title'] : '';
                    $commonContent =  isset($thank_you_data['content_for_common']) ? $thank_you_data['content_for_common'] : '';
                    $content_for_ebook =  isset($thank_you_data['content_for_ebook']) ? $thank_you_data['content_for_ebook'] : '';
                    $careerContent =  isset($thank_you_data['content_for_career']) ? $thank_you_data['content_for_career'] : '';
                ?>

                    <?php if (!empty($title)) { ?>
                        <h2><?php echo $title; ?></h2>
                    <?php } ?>

                    <?php
                    if ($query_vars['post_type'] == 'career-at-aureate') {
                        if (!empty($careerContent)) { ?>
                            <p><?php echo $careerContent; ?></p>
                        <?php } ?>
                    <?php } elseif (is_page('ecommerce-tips')) { ?>
                        <?php if (!empty($content_for_ebook)) { ?>
                            <p><?php echo $content_for_ebook; ?></p>
                        <?php } ?>
                    <?php } else { ?>
                        <?php if (!empty($commonContent)) { ?>
                            <p><?php echo $commonContent; ?></p>
                        <?php } ?>
                    <?php } ?>
                <?php } ?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>