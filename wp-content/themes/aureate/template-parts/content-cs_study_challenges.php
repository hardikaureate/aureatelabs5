<?php
if(!empty ($args))
{
    $study_challenges_heading = isset($args['study_challenges_heading']) ? $args['study_challenges_heading'] : '';
    $study_challenges_content = isset($args['study_challenges_content']) ? $args['study_challenges_content'] : '';
    $study_listing_with_number = isset($args['study_listing_with_number']) ? $args['study_listing_with_number'] : array();
    $study_listing_points = isset($args['study_listing_points']) ? $args['study_listing_points'] : array();
    if(!empty($study_challenges_heading) || !empty($study_challenges_content) || !empty($study_listing_with_number) || !empty($study_listing_points))
    {   ?>
        <!--  S4 Study Challenges -->
        <section class="bg-dark py-40 py-lg-60 py-xl-100">
            <div class="container">
                <div class="row">
                <?php
                if(!empty($study_challenges_heading) )
                {   ?>
                    <div class="col-md-4">
                        <h2 class="section-heading text-white" data-aos="fade-up"><?php echo $study_challenges_heading; ?>
                        </h2>
                    </div>
                    <?php      
                }
            
                if(!empty($study_challenges_content) || !empty($study_listing_with_number) || !empty($study_listing_points))
                {   ?>
                    <div class="col-md-8">
                        <?php
                        if(!empty($study_challenges_content))
                        {   ?>
                                <div class="csd-challenges-content-wrap text-white" data-aos="fade-up">
                                    <?php echo $study_challenges_content; ?>
                                </div>
                                <?php
                        }
                    
                        if(!empty($study_listing_with_number) )
                        {   ?>
                                <ul class="csd-challenges-content-ul pl-md-3 pr-md-1 " data-aos="fade-up">
                                    <?php
                                    $count = 1;
                                    foreach ($study_listing_with_number as $key => $study_listing) 
                                    {
                                        $label = isset($study_listing['label']) ? $study_listing['label'] : '';
                                        $content = isset($study_listing['content']) ? $study_listing['content'] : '';
                                        if(!empty($label) || !empty($content) )
                                        {   ?>
                                            <li>
                                                <span class="text-A1A1A1 font-16 font-md-20">
                                                    <?php
                                                        echo str_pad( $count, 2, '0', STR_PAD_LEFT );
                                                    ?>
                                                </span>
                                                <?php
                                                if(!empty($label) )
                                                {
                                                    ?>
                                                    <p class="text-white font-md-20 mb-2 mb-md-3 font-16 font-md-20">
                                                        <?php echo $label; ?>
                                                    </p>
                                                    <?php

                                                }
                                                if(!empty($content) )
                                                {
                                                    ?>
                                                    <p class="text-A1A1A1"><?php echo $content; ?></p>
                                                    <?php
                                                
                                                }
                                                ?>
                                            </li>
                                            <?php
                                            $count++;
                                        }
                                    }
                                    ?>
                                </ul>
                            <?php
                        }

                        if(!empty($study_listing_points) )
                        {   ?>
                            <div class="csd-label-points-wrap  mt-3" data-aos="fade-up">
                                <ul class="checklist text-white">
                                    <?php
                                    foreach ($study_listing_points as $key => $study_listing_point) 
                                    {
                                        $point = isset($study_listing_point['point']) ? $study_listing_point['point'] : '';
                                        if(!empty($point))
                                        {   ?>
                                            <li class="mb-3"><?php echo $point; ?></li>
                                            <?php
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>
                            <?php
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