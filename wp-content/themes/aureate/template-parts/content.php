<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package aureate
 */

?>
<div class="row justify-content-center">
   
    <div class="blog-banner col-md-8">
        <?php 
            $post_tags = get_the_tags();
            if ( ! empty( $post_tags ) ) {
                echo '<div class="blog-tags"><ul class="d-flex flex-wrap mb-1 mb-md-0">';
                foreach( $post_tags as $post_tag ) {

                    $tag_name = startsWith($post_tag->name,'#') ? $post_tag->name : '#'.$post_tag->name;
                    echo '<li class="bg-mercury font-12 font-md-16 py-2 px-2 px-md-3 mr-2 mr-md-3 mb-3"><a class="px-1 px-md-0" href="' . get_tag_link( $post_tag ) . '">'.$tag_name . '</a></li>';
                }
                echo '</ul></div>';
            }
        ?>
        <?php
        if ( is_singular() ) :
            the_title( '<h1 class="entry-title mb-4 pb-md-3">', '</h1>' );
        else :
            the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
        endif;
    
        if ( 'post' === get_post_type() || get_post_type() == 'guides' ) :
            ?>
            <div class="blog-post-by pb-2 pb-md-0 mb-4 mb-md-5 font-12 font-md-20">
               <span class="mr-2 mr-md-4 pr-2 pr-md-4"> <?php aureate_posted_by(); ?> </span>
               <span class="mr-2 mr-md-4 pr-2 pr-md-4"> <?php the_date( 'M jS, Y' ); ?> </span>
               <span> <?php echo reading_time() .' to read'; ?> </span>
            </div>
        <?php endif; ?>
    </div>
    
    <div class="blog-featured-image col-md-12 mb-4 pb-0 pb-md-3">
        <?php $placeHolderImage = wp_get_attachment_image(get_field('theme_placeholder_image', 'option'), 'full');?>
        <?php if ( get_the_post_thumbnail( get_the_ID() ) ) : ?>
            <?php
            $feature_image_webp = get_field('feature_image_webp',get_the_ID());
            if(!empty($feature_image_webp))
            {
                $url = isset($feature_image_webp['url']) ? $feature_image_webp['url'] : '';
                $mime_type = isset($feature_image_webp['mime_type']) ? $feature_image_webp['mime_type'] : '';

                $attachment_id= get_post_thumbnail_id();
                $attachment_metadata = wp_get_attachment_metadata( $attachment_id );
                $img_width = isset($attachment_metadata['width']) ? $imattachment_metadatag['width'] : '';
                $img_height = isset($attachment_metadata['height']) ? $attachment_metadata['height'] : '';

                $image_alt = get_post_meta($attachment_id, '_wp_attachment_image_alt', TRUE);
                $image_title = get_the_title($attachment_id);
                $img_title = !empty($image_title) ? $image_title : get_the_title();
                $img_alt = !empty($image_alt) ? $image_alt : get_the_title();
               
                $feature_img_url = wp_get_attachment_image_src( $attachment_id,'full'); 
                $feature_img_url = isset($feature_img_url[0]) ? $feature_img_url[0] : '';

                $img_alt = !empty($image_alt) ? $image_alt : get_the_title();
                $type = get_post_mime_type($attachment_id);
                $feature_img_mime_type =  !empty($type) ? $type : '';

                if (!empty($url) && !empty($feature_img_url)) 
                { ?>
                    <picture>
                        <source srcset="<?php echo $url; ?>" type="<?php echo $mime_type; ?>">
                        <source srcset="<?php echo $feature_img_url; ?>" type="<?php echo $feature_img_mime_type; ?>">
                        <img src="<?php echo $feature_img_url; ?>" loading="lazy" width="<?php echo $img_width; ?>" height="<?php echo $img_height; ?>" alt="<?php echo $img_alt; ?>" title="<?php echo $img_title; ?>">
                    </picture>
                    <?php
                } 
                else
                {
                    the_post_thumbnail('full');
                }
            }
            else
            {
                the_post_thumbnail('full');
            } ?>
        <?php else : ?>
            <?php echo $placeHolderImage;?>
        <?php endif; ?>
    </div>
    
    <div class="blog-content col-md-8">
        <?php
            the_content();
        ?>
    </div><!-- .entry-content -->
</div>
<?php
$post_id = get_the_ID();
$author_id = get_post_field ('post_author', $post_id);
$display_name = get_the_author_meta( 'display_name' , $author_id ); 
?>
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "BlogPosting",
    "mainEntityOfPage": {
        "@type": "WebPage",
        "@id": "<?php echo get_the_permalink();?>"
    },
    "headline": "<?php echo $post->post_title;?>",
    "image": [
        "<?php echo get_the_post_thumbnail_url(); ?>"
    ],
    "datePublished": "<?php echo get_the_time('Y-m-d')?>",
    "dateModified": "2019-02-07T08:00:00+08:00",
    "author": {
        "@type": "person",
        "name": "<?php echo $display_name;?>"
    },
    "publisher": {
        "@type": "Organization",
        "name": "Aureate Labs",
        "logo": {
            "@type": "ImageObject",
            "url": "<?php echo get_site_url() ?>/wp-content/uploads/aureate-logo.png"
        }
    },
    "description": "<?php echo get_post_meta(get_the_ID(), '_yoast_wpseo_metadesc', true);  ?>"
}
</script>
<script>
   
    const containers = document.querySelectorAll(".blog-content ul");
    containers.forEach(container => {
        const li = container.querySelectorAll('li');
        const li_lenght = li.length;
        if(li_lenght<=1){
            container.classList.add("single-li");
        }
    });

</script>