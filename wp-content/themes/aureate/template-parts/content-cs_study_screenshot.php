<?php

if(!empty ($args))
{
    $study_screenshots_and_desc = isset($args['study_screenshots_and_desc']) ? $args['study_screenshots_and_desc'] : array();
    if(!empty($study_screenshots_and_desc))
    {   ?>
        <!-- S6 Study Screenshot with description -->
         <div class="pt-20 pb-40 pt-md-20 pb-md-60 pt-lg-60 pb-lg-100 cs-ss-desc-section bg-light">
            <div class="container">
                <div class="row">
                    <?php
                    foreach ($study_screenshots_and_desc as $key => $screenshots_and_desc) 
                    {
                        
                        $study_ss_desc_video = isset($screenshots_and_desc['study_ss_desc_video']) ? $screenshots_and_desc['study_ss_desc_video'] : array();
                        $heading = isset($screenshots_and_desc['study_ss_desc_heading']) ? $screenshots_and_desc['study_ss_desc_heading'] : '';
                        $desc_content = isset($screenshots_and_desc['study_ss_desc_content']) ? $screenshots_and_desc['study_ss_desc_content'] : '';


                        if(!empty($study_ss_desc_video))
                        {
                            $solution_video  = isset($study_ss_desc_video['url']) ? $study_ss_desc_video['url'] : '';
                            $mime_type  = isset($study_ss_desc_video['mime_type']) ? $study_ss_desc_video['mime_type'] : '';
                            if(!empty($solution_video))
                            {   
                                $study_video_thumbnail = isset($screenshots_and_desc['study_ss_desc_screenshot']) ? $screenshots_and_desc['study_ss_desc_screenshot'] : array();
                                $poster_img = '';
                                if(!empty($study_video_thumbnail))
                                {
                                    $img_src  = isset($study_video_thumbnail['url']) ? $study_video_thumbnail['url'] : '';
                                    if(!empty($img_src))
                                    {
                                        $poster_img = 'poster="'.esc_url($img_src).'"';
                                    }
                                }
                                ?>
                                <div class="col-md-6 cs-screenshot-item">
                                    <video class="w-100" autoplay muted id="cs-solution-video" playsinline="" <?php echo $poster_img; ?> data-aos="fade-up">
                                        <source src="<?php echo esc_url($solution_video); ?>" type="<?php echo $mime_type; ?>">
                                    </video>
                                    <?php
                                    if(!empty($heading))
                                    {
                                        ?>
                                        <p class="mt-3 pt-md-3 mb-2 font-16 font-md-24 text-primary "><?php echo $heading; ?></p>
                                        <?php  
                                    }
                                    if(!empty($desc_content))
                                    {   ?>
                                        <div class="csd-solution-content-wrap">
                                            <?php echo $desc_content; ?>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <?php
                            }
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php
    }
    $study_screenshots = isset($args['study_screenshots']) ? $args['study_screenshots'] : array();
    $ss_background_color = isset($args['study_ss_background_color']) ? $args['study_ss_background_color'] : array();
    if(!empty($study_screenshots))
    {   
        $bg_color = '';
        if(!empty($ss_background_color))
        {
            $bg_color = 'style="background-color:'.$ss_background_color.';"';
        }
        ?>
        
         <div class="pb-xl-100" >
            <div class="container tri-grip-block text-center py-md-5" <?php echo $bg_color; ?>  data-aos="fade-up">
                <div class="py-3">
                    <?php
                    foreach ($study_screenshots as $key => $study_screenshot) 
                    {
                        $study_screenshot_webp = isset($study_screenshot['study_screenshot_webp']) ? $study_screenshot['study_screenshot_webp'] : array();
                        $screenshot = isset($study_screenshot['study_screenshot']) ? $study_screenshot['study_screenshot'] : array();
                        if(!empty($study_screenshot_webp) && !empty($screenshot))
                        {
                            $url = isset($study_screenshot_webp['url']) ? $study_screenshot_webp['url'] : '';
                            $mime_type = isset($study_screenshot_webp['mime_type']) ? $study_screenshot_webp['mime_type'] : '';
                            $screenshot_title = isset($study_screenshot_webp['title']) ? $study_screenshot_webp['title'] : '';
                            $screenshot_alt = isset($study_screenshot_webp['alt']) ? $study_screenshot_webp['alt'] : '';
                            $screenshot_width = isset($study_screenshot_webp['width']) ? $study_screenshot_webp['width'] : '';
                            $screenshot_height = isset($study_screenshot_webp['height']) ? $study_screenshot_webp['height'] : '';

                            $screenshot_url = isset($screenshot['url']) ? $screenshot['url'] : '';
                            $screenshot_mime_type = isset($screenshot['mime_type']) ? $screenshot['mime_type'] : '';
                            

                            if (!empty($url) && !empty($screenshot_url)) 
                            { ?>
                                <picture>
                                    <source srcset="<?php echo $url; ?>" type="<?php echo $mime_type; ?>">
                                    <source srcset="<?php echo $screenshot_url; ?>" type="<?php echo $screenshot_mime_type; ?>">
                                    <img src="<?php echo $screenshot_url; ?>" loading="lazy" width="<?php echo $screenshot_width; ?>" height="<?php echo $screenshot_height; ?>" alt="<?php echo $screenshot_alt; ?>" title="<?php echo $screenshot_title; ?>">
                                </picture>
                                <?php
                            } 
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php
    }
}