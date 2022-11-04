<?php
if(!empty ($args)) 
{
    $image_webp = isset($args['s1_cs_select_image_webp']) ? $args['s1_cs_select_image_webp'] : array();
    $image = isset($args['s1_cs_select_image']) ? $args['s1_cs_select_image'] : array();
    $s1_cs_bg_color = isset($args['s1_cs_bg_color']) ? $args['s1_cs_bg_color'] : '';
    if(!empty($image_webp) || !empty($image) || !empty($s1_cs_bg_color)) 
    {
        $bg_color = $sec_id = '';
        if(!empty($s1_cs_bg_color))
        {
            $bg_color = 'style="background-color:'.$s1_cs_bg_color.';"';
        }

        $url = isset($image_webp['url']) ? $image_webp['url'] : '';
        $mime_type = isset($image_webp['mime_type']) ? $image_webp['mime_type'] : '';
        $image_title = isset($image_webp['title']) ? $image_webp['title'] : '';
        $image_alt = isset($image_webp['alt']) ? $image_webp['alt'] : '';
        $image_width = isset($image_webp['width']) ? $image_webp['width'] : '';
        $image_height = isset($image_webp['height']) ? $image_webp['height'] : '';
      
        $image_url = isset($image['url']) ? $image['url'] : '';
        $image_mime_type = isset($image['mime_type']) ? $image['mime_type'] : '';

        if (!empty($url) && !empty($image_url)) 
        { ?>
                <!-- S1 Banner Section -->
                <div class="py-4 py-lg-120" <?php echo $bg_color; ?>>
                    <div class="container container-fluid line-height-0">
                        <picture>
                            <source srcset="<?php echo $url; ?>" type="<?php echo $mime_type; ?>">
                            <source srcset="<?php echo $image_url; ?>" type="<?php echo $image_mime_type; ?>">
                            <img src="<?php echo $image_url; ?>" loading="lazy" width="<?php echo $image_width; ?>" height="<?php echo $image_height; ?>" alt="<?php echo $image_alt; ?>" title="<?php echo $image_title; ?>">
                        </picture>
                    </div>
                </div>
            <?php
        }            
    }
}