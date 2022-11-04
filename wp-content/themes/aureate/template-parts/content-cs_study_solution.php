<?php
if(!empty ($args))
{
    $study_solution_heading = isset($args['study_solution_heading']) ? $args['study_solution_heading'] : '';
    $study_solution_content = isset($args['study_solution_content']) ? $args['study_solution_content'] : '';
    $study_solution_video_data = isset($args['study_solution_video_data']) ? $args['study_solution_video_data'] : array();
    $study_solution_platforms = isset($args['study_solution_platforms']) ? $args['study_solution_platforms'] : array();
    if(!empty($study_solution_heading) || !empty($study_solution_content) || !empty($study_solution_video_data) || !empty($study_solution_platforms))
    {   ?>
        <!-- S5 Study Solution -->
        <section class="py-40 py-md-60 py-lg-100">
            <div class="container">
                <div class="row">
                    <?php
                    if(!empty($study_solution_heading) )
                    {   ?>
                        <div class="col-md-4" >
                            <h2 class="section-heading" data-aos="fade-up"><?php echo $study_solution_heading; ?></h2>
                        </div>
                        <?php      
                    }
                
                    if(!empty($study_solution_content) || !empty($study_solution_video_data) || !empty($study_solution_platforms))
                    {   ?>
                        <div class="col-md-8">
                            <?php
                            if(!empty($study_solution_content))
                            {   ?>
                                    <div class="csd-solution-content" data-aos="fade-up">
                                        <?php echo $study_solution_content; ?>
                                    </div>
                                    <?php
                            }
                        
                            if(!empty($study_solution_video_data) )
                            {
                                
                                    $study_solution_video = isset($study_solution_video_data['study_solution_video']) ? $study_solution_video_data['study_solution_video'] : array();
                                    
                                    if(!empty($study_solution_video))
                                    {
                                        $solution_video  = isset($study_solution_video['url']) ? $study_solution_video['url'] : '';
                                        $mime_type  = isset($study_solution_video['mime_type']) ? $study_solution_video['mime_type'] : '';
                                        if(!empty($solution_video))
                                        {   
                                            $study_video_thumbnail = isset($study_solution_video_data['study_solution_video_thumbnail']) ? $study_solution_video_data['study_solution_video_thumbnail'] : array();
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
                                            <div class="csd-label-video-wrap mt-4 pt-md-3" data-aos="fade-up">
                                                <video class="w-100 h-100"  id="cs-solution-video" playsinline="" <?php echo $poster_img; ?>>
                                                    <source src="<?php echo esc_url($solution_video); ?>" type="<?php echo $mime_type; ?>">
                                                </video>
                                                <img id="cs-play-video" src="<?php echo get_template_directory_uri() . '/assets/images/ply-icon.svg'; ?>" alt="Play Video" title="Play Video" class="play-icon">
                                            </div>
                                            <?php
                                        }
                                    }
                                
                            }

                            if(!empty($study_solution_platforms) )
                            {
                                $platform_label  = isset($study_solution_platforms['study_solution_platform_label']) ? $study_solution_platforms['study_solution_platform_label'] : '';
                                $platform_logos  = isset($study_solution_platforms['study_solution_platform_logos']) ? $study_solution_platforms['study_solution_platform_logos'] : array();
                                if(!empty($platform_label) || !empty($platform_logos))
                                {   ?>
                                    <div class="">
                                        <?php
                                        if(!empty($platform_label) )
                                        {   ?>
                                            <p class="mb-2 mb-md-4 text-primary d-block font-16 font-md-20 font-weight-bold"><?php echo $platform_label; ?></p>
                                            <?php      
                                        }
                                        ?>
                                        <div class="csd-label-platforms-logo-wrap" data-aos="fade-up">
                                            <?php
                                                foreach ($platform_logos as $key => $cs_platforms_logo) 
                                                {
                                                    $platforms_logo = isset($cs_platforms_logo['study_solution_platform_logo']) ?  $cs_platforms_logo['study_solution_platform_logo'] : array();
                                                    if(!empty($platforms_logo))
                                                    {
                                                        $url = isset($platforms_logo['url']) ? $platforms_logo['url'] : '';
                                                        if(!empty($url))
                                                        {
                                                            $title = isset($platforms_logo['title']) ? $platforms_logo['title'] : '';
                                                            $alt = isset($platforms_logo['alt']) ? $platforms_logo['alt'] : '';
                                                            $width = isset($platforms_logo['width']) ? $platforms_logo['width'] : '';
                                                            $height = isset($platforms_logo['alt']) ? $platforms_logo['alt'] : '';
                                                            ?>
                                                            <div class="csd-label-platforms-logo-single">
                                                                <img src="<?php echo $url; ?>" title="<?php echo $title; ?>" alt="<?php echo $alt; ?>" class="platform-logo"/>
                                                            </div>
                                                            <?php
                                                        }
                                                    }
                                                }
                                            ?>
                                        </div>
                                        <?php
                                        ?>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </section>
        <?php
    }
}