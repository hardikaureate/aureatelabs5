<?php
if(!empty ($args))
{
    $cs_websites = isset($args['cs_websites']) ? $args['cs_websites'] : array();
    $cs_founded_in = isset($args['cs_founded_in']) ? $args['cs_founded_in'] : array();
    $cs_industry = isset($args['cs_industry']) ? $args['cs_industry'] : array();
    $cs_location = isset($args['cs_location']) ? $args['cs_location'] : array();
    $cs_platform = isset($args['cs_platform']) ? $args['cs_platform'] : array();
    if(!empty($cs_websites) || !empty($cs_founded_in) || !empty($cs_industry) || !empty($cs_location) || !empty($cs_platform))
    {
        
        ?>
         <!-- S2 Study Details -->
        <div class="py-2 py-lg-5">
            <div class="container">
            <div class="row">
            <?php
            if(!empty($cs_websites) )
            {
                $cs_website_lablel = isset($cs_websites['cs_website_lablel']) ? $cs_websites['cs_website_lablel'] : '';
                $cs_website_link = isset($cs_websites['cs_website_link']) ? $cs_websites['cs_website_link'] : array();
                if(!empty($cs_website_lablel) || !empty($cs_website_link) )
                {   ?>
                        <div class="col-6 csd-study-label-column" >
                            <div class="csd-study-label-column-inner" data-aos="fade-up">
                            <?php
                            if(!empty($cs_website_lablel) )
                            {
                                ?>
                                <p class="csd-study-label text-body font-md-20 mb-0"><?php echo $cs_website_lablel; ?></p>
                                <?php

                            }
                            if(!empty($cs_website_link) )
                            {
                                $cs_link = isset($cs_website_link['url']) ? $cs_website_link['url'] : '';
                                $cs_title = isset($cs_website_link['title']) ? $cs_website_link['title'] : '';
                                $cs_target = !empty($cs_website_link['target']) ? 'target="_blank"' : '';
                                if (!empty($cs_link) && !empty($cs_title)) {   ?>
                                    <a class="text-primary font-md-20 text-decoration-underline" href="<?php echo esc_url($cs_link); ?>" <?php echo $cs_target; ?>><?php echo esc_html($cs_title) ?></a>
                                    <?php
                                }
                            }
                                ?>
                            </div>
                        </div>
                        <?php
                }
            }
            
            if(!empty($cs_founded_in) )
            {
                $cs_founded_in_lablel = isset($cs_founded_in['cs_founded_in_lablel']) ? $cs_founded_in['cs_founded_in_lablel'] : '';
                $cs_founded_in_year = isset($cs_founded_in['cs_founded_in_year']) ? $cs_founded_in['cs_founded_in_year'] : '';
                if(!empty($cs_founded_in_lablel) || !empty($cs_founded_in_year) )
                {   ?>
                        <div class="col-6 csd-study-label-column">
                            <div class="csd-study-label-column-inner" data-aos="fade-up">
                            <?php
                            if(!empty($cs_founded_in_lablel) )
                            {
                                ?>
                                <p class="csd-study-label text-body font-md-20 mb-0"><?php echo $cs_founded_in_lablel; ?></p>
                                <?php

                            }
                            if(!empty($cs_founded_in_year) )
                            {
                                ?>
                                <p class="text-primary font-md-20"><?php echo $cs_founded_in_year; ?></p>
                                <?php
                               
                            }
                                ?>
                            </div>
                        </div>
                        <?php
                }
            }

            if(!empty($cs_industry) )
            {
                $cs_industry_lablel = isset($cs_industry['cs_industry_lablel']) ? $cs_industry['cs_industry_lablel'] : '';
                $cs_industry_text = isset($cs_industry['cs_industry_text']) ? $cs_industry['cs_industry_text'] : '';
                if(!empty($cs_industry_lablel) || !empty($cs_industry_text) )
                {   ?>
                        <div class="col-6 csd-study-label-column">
                            <div class="csd-study-label-column-inner" data-aos="fade-up">
                            <?php
                            if(!empty($cs_industry_lablel) )
                            {
                                ?>
                                <p class="csd-study-label text-body font-md-20 mb-0"><?php echo $cs_industry_lablel; ?></p>
                                <?php

                            }
                            if(!empty($cs_industry_text) )
                            {
                                ?>
                                <p class="text-primary font-md-20"><?php echo $cs_industry_text; ?></p>
                                <?php
                               
                            }
                                ?>
                            </div>
                        </div>
                        <?php
                }
            }

            if(!empty($cs_location) )
            {
                $cs_location_lablel = isset($cs_location['cs_location_lablel']) ? $cs_location['cs_location_lablel'] : '';
                $cs_location_text = isset($cs_location['cs_location_text']) ? $cs_location['cs_location_text'] : '';
                if(!empty($cs_location_lablel) || !empty($cs_location_text) )
                {   ?>
                        <div class="col-6 csd-study-label-column">
                            <div class="csd-study-label-column-inner" data-aos="fade-up">
                            <?php
                            if(!empty($cs_location_lablel) )
                            {
                                ?>
                                <p class="csd-study-label text-body font-md-20 mb-0"><?php echo $cs_location_lablel; ?></p>
                                <?php

                            }
                            if(!empty($cs_location_text) )
                            {
                                ?>
                                <p class="text-primary font-md-20"><?php echo $cs_location_text; ?></p>
                                <?php
                               
                            }
                                ?>
                            </div>
                        </div>
                        <?php
                }
            }
            if(!empty($cs_platform) )
            {
                $cs_platform_lablel = isset($cs_platform['cs_platform_lablel']) ? $cs_platform['cs_platform_lablel'] : '';
                $cs_platforms_logos = isset($cs_platform['cs_platforms_logos']) ? $cs_platform['cs_platforms_logos'] : '';
                if(!empty($cs_platform_lablel) || !empty($cs_platforms_logos) )
                {   ?>
                        <div class="col-6 csd-study-label-column">
                            <div class="csd-study-label-column-inner" data-aos="fade-up">
                            <?php
                            if(!empty($cs_platform_lablel) )
                            {
                                ?>
                                <p class="csd-study-label text-body font-md-20 mb-2"><?php echo $cs_platform_lablel; ?></p>
                                <?php

                            }
                            if(!empty($cs_platforms_logos) )
                            {
                                foreach ($cs_platforms_logos as $key => $cs_platforms_logo) 
                                {
                                    $platforms_logo = isset($cs_platforms_logo['cs_platforms_logo']) ?  $cs_platforms_logo['cs_platforms_logo'] : array();
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
                                            <img src="<?php echo $url; ?>" title="<?php echo $title; ?>" alt="<?php echo $alt; ?>" class="cs-platform-logo"/>
                                            <?php
                                        }

                                    }
                                }                               
                            }
                            ?>
                            </div>
                        </div>
                        <?php
                }
            }
            ?>
            </div>
            </div>
        </div>
        <div><hr></div>
        <?php
    }
}