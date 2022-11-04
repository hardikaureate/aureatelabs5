<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package aureate
 */
?>
<!-- #footer -->
<footer class="site-footer">
    <?php $footer_cta_section = get_field('footer_cta_section', 'option'); ?>
    <?php
    global $wp_query;
    $query_vars = $wp_query->query_vars;
    if (!isset($query_vars['thank-you'])) {
        if (!empty($footer_cta_section)) : ?>
            <?php
            $footer_cta_title = isset($footer_cta_section['footer_cta_title']) ? $footer_cta_section['footer_cta_title'] : '';
            $footer_cta_link = isset($footer_cta_section['footer_cta_link']) ? $footer_cta_section['footer_cta_link'] : '';
            if (!empty($footer_cta_title) || !empty($footer_cta_link)) :
            ?>
                <div class="footer-top-section py-40 py-lg-60 py-xl-100">
                    <div class="container">
                        <div class="footer-top-inner">
                            <?php if (!empty($footer_cta_title)) : ?>
                                <h2><?php echo $footer_cta_title; ?></h2>
                            <?php endif; ?>

                            <?php if (!empty($footer_cta_link)) :
                                $cat_link = isset($footer_cta_link['url']) ? $footer_cta_link['url'] : '';
                                $cta_title = isset($footer_cta_link['title']) ? $footer_cta_link['title'] : '';
                                $target = !empty($footer_cta_link['target']) ? 'target="_blank"' : '';
                                if (!empty($cat_link) && !empty($cta_title)) :
                            ?>
                                    <div class="start-round">
                                        <a rel="nofollow" href="<?php echo $cat_link; ?>" <?php echo $target; ?> title="<?php echo $cta_title; ?>"><?php echo $cta_title; ?></a>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
    <?php
            endif;
        endif;
    } ?>

    <div class="footer-center-section">
        <div class="container">
            <div class="footer-center-inner">
                <div class="footer-logo">
                    <?php $headerBlackLogo = get_field('header_black_logo', 'option'); ?>
                    <a href="<?php echo site_url(); ?>/">
                        <img src="<?php echo $headerBlackLogo['url'] ?>" width="162" height="24" alt="<?php echo $headerBlackLogo['alt'] ?>" title="<?php echo $headerBlackLogo['title'] ?>" />
                    </a>
                </div>
                <?php wp_nav_menu(array('theme_location' => 'footer', 'container_class' => 'footer-menus')); ?>
                <div class="footer-review">
                    <?php $footerClutchIcon = wp_get_attachment_image(get_field('footer_clutch_logo_image', 'option'), 'full'); ?>
                    <?php $footerClutchLink = wp_kses_post(get_field('footer_clutch_logo_link', 'option')); ?>
                    <a href="<?php echo $footerClutchLink; ?>" target="_blank">
                        <?php echo $footerClutchIcon; ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom-section">
        <div class="container">
            <div class="footer-bottom-inner">
                <div class="copyright-text">
                    <p>&copy; <?php echo date('Y'); ?> Aureate Labs, All rights reserved.</p>
                </div>
                <div class="footer-review">
                    <a href="<?php echo $footerClutchLink; ?>" target="_blank">
                        <?php echo $footerClutchIcon; ?>
                    </a>
                </div>
                <div class="social-media">
                    <?php if (have_rows('footer_social_media', 'option')) : ?>
                        <?php while (have_rows('footer_social_media', 'option')) : ?>
                            <?php the_row(); ?>
                            <?php $footerSocialIcon = get_sub_field('footer_social_media', 'option'); ?>
                            <?php
                            $footerSocialLink = get_sub_field('social_media_link_and_title', 'option');
                            if (!empty($footerSocialIcon) && !empty($footerSocialLink)) :
                                $social_link = isset($footerSocialLink['url']) ? $footerSocialLink['url'] : '';
                                $social_title = isset($footerSocialLink['title']) ? $footerSocialLink['title'] : '';
                                $social_target = !empty($footerSocialLink['target']) ? 'target="_blank"' : '';
                                if (!empty($social_link) && !empty($social_title)) {   ?>
                                    <a title="<?php echo wp_kses_post($social_title); ?>" class="<?php echo $footerSocialIcon ?>" href="<?php echo esc_url($social_link); ?>" <?php echo $social_target; ?>>
                                    </a>
                            <?php }
                            endif; ?>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</footer><!-- #footer -->
</div><!-- #page -->
<?php $schema_options = get_field('schema_options', 'option');
$logo_url = $telephone_number = $telephone_number_2 =  $sameAs = '';
if (!empty($schema_options)) {
    $schema_site_logo = isset($schema_options['schema_site_logo']) ? $schema_options['schema_site_logo'] : array();
    if (!empty($schema_site_logo)) {
        $logo_url = isset($schema_site_logo['url']) ? $schema_site_logo['url'] : '';
    }
    $elephone_number = isset($schema_options['schema_telephone_number']) ? $schema_options['schema_telephone_number'] : '';
    $telephone_number_2 = isset($schema_options['schema_telephone_number_2']) ? $schema_options['schema_telephone_number_2'] : '';
    $schema_social_media_links = isset($schema_options['schema_social_media_links']) ? $schema_options['schema_social_media_links'] : array();
    if (!empty($schema_social_media_links)) {
        $schema_social_media_link = array_column($schema_social_media_links, 'schema_social_media_link');
        $sameAs = '"' . implode('","', $schema_social_media_link) . '"';
    }
}
?>
<script type="application/ld+json" defer>
    {
        "@context": "http://schema.org",
        "@type": "Organization",
        "name": "Aureate Labs",
        "url": "<?php echo get_site_url(); ?>",
        "logo": "<?php echo $logo_url; ?>",
        "contactPoint": [{
                "@type": "ContactPoint",
                "telephone": "<?php echo $elephone_number; ?>",
                "contactType": "customer service",
                "areaServed": "India"
            },
            {
                "@type": "ContactPoint",
                "telephone": "<?php echo $telephone_number_2; ?>",
                "contactType": "customer service"
            }
        ],
        "sameAs": [
            <?php echo $sameAs; ?>
        ]
    }
</script>
<?php wp_footer(); ?>
</body>

</html>