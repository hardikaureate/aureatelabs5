<?php
if(!empty ($args))
{   ?>              
    <div class="row testimonial-row">
        <?php
        $durationSpeed = 300;
        foreach ($args as $key => $s2_testimonial) 
        {
            $testimonial_details = get_field('testimonial_details',$s2_testimonial);
                
            $durationSpeed = $durationSpeed + 200;
            if(!empty($testimonial_details))
            {
                $name= get_the_title($s2_testimonial);
                $testimonial = isset($testimonial_details['testimonial']) ? $testimonial_details['testimonial'] : '';
                $designation = isset($testimonial_details['designation']) ? $testimonial_details['designation'] : '';
                $rating = isset($testimonial_details['rating']) ? $testimonial_details['rating'] : '';
                $photo = isset($testimonial_details['photo']) ? $testimonial_details['photo'] : array();
                if(!empty($testimonial) || !empty($designation) || !empty($rating) || !empty($photo))
                {   ?> 
                    <div class="testimonial-col col-md-4 mb-0 mb-md-4" data-aos="fade-up" data-aos-duration="<?php echo $durationSpeed ?>" data-aos-delay="<?php echo $durationSpeed ?>">
                        <?php
                        if(!empty($testimonial) || !empty($rating)  )
                        {   ?>
                            <div class="px-3 py-3 px-md-4 py-md-4 mb-4 testimonial-block">
                                <div class="p-xl-2 link-description">
                                    <?php
                                    if(!empty($testimonial))
                                    {   ?> 
                                            <?php echo $testimonial; ?>
                                        <?php
                                    }
                                    if(!empty($rating))
                                    {   ?> 
                                        <div class="testimonial-stars d-flex pl-0 pr-0 pt-3">
                                            <?php 
                                            for($i=1;$i<=5;$i++)
                                            {
                                                if($i<=$rating)
                                                {
                                                    $url = get_template_directory_uri().'/assets/images/single-star.svg';
                                                    
                                                }
                                                else
                                                {
                                                    $url = get_template_directory_uri().'/assets/images/single-star-empty.svg';
                                                }
                                                ?>
                                                <img src="<?php echo $url; ?>" title="Star" alt="Star" width="22" height="20"/>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <span class="testimonial-triangle">
                                </span>
                            </div>
                            <?php
                        }

                        if(!empty($name) || !empty($photo) || !empty($designation))
                        {   ?>
                            <div class="testimomial-user d-flex align-items-center pl-2 pl-md-3 ml-1">
                                <?php
                                    if(!empty($photo))
                                    { 
                                        $url = isset($photo['url']) ? $photo['url'] : '';
                                        if(!empty($url))
                                        {
                                            $title = isset($photo['title']) ? $photo['title'] : '';
                                            $alt = isset($photo['alt']) ? $photo['alt'] : '';
                                            $width = isset($photo['width']) ? $photo['width'] : '';
                                            $height = isset($photo['alt']) ? $photo['alt'] : '';
                                            ?>
                                            <img src="<?php echo $url; ?>" title="<?php echo $name; ?>" loading="lazy" alt="<?php echo $name; ?>" class="mr-2 mr-md-3"/>
                                            <?php
                                        }
                                    }
                                    ?>
                                <p class="font-14 font-md-17 text-primary"><b><?php echo $name; ?></b>
                                    <?php
                                    if(!empty($designation))
                                    {   ?>
                                        <span class="d-block font-12 font-md-14 font-weight-normal text-body"><?php echo $designation; ?></span>
                                        <?php
                                    }
                                    ?>
                                </p>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <?php 
                }
            }
        } ?>
    </div>
    <?php
    
}