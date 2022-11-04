<?php
if(!empty ($args))
{
    $label = isset($args['study_testimonial_label']) ? $args['study_testimonial_label'] : '';
    $testimonial = isset($args['testimonial']) ? $args['testimonial'] : array();
    if(!empty($label) || !empty($testimonial))
    {   ?>
        <!-- S8 Study Testimonial  -->
        <section class="py-40 py-md-60 py-lg-100">
            <div class="container">
                <div class="row">
                    <?php
                    if(!empty($label) )
                    {   ?>
                        <div class="col-md-4">
                            <h2 class="section-heading" data-aos="fade-up"><?php echo $label; ?></h2>
                        </div>
                        <?php
                    }
                    if(!empty($testimonial) )
                    { 
                        $testimonial_details = get_field('testimonial_details',$testimonial);
                        if(!empty($testimonial_details))
                        {
                            $name= get_the_title($testimonial);
                            $testimonial = isset($testimonial_details['testimonial']) ? $testimonial_details['testimonial'] : '';
                            $designation = isset($testimonial_details['designation']) ? $testimonial_details['designation'] : '';
                            $rating = isset($testimonial_details['rating']) ? $testimonial_details['rating'] : '';
                            $photo = isset($testimonial_details['photo']) ? $testimonial_details['photo'] : array();
                            ?>
                            <div class="col-md-8">
                                <div class="casestudy-testimonial-row testimonial-row mt-3 mt-md-0 " data-aos="fade-up">
                                        <?php
                                        if(!empty($testimonial) || !empty($designation) || !empty($rating) || !empty($photo))
                                        {
                                            if(!empty($testimonial) || !empty($rating)  )
                                            {   ?>
                                                <div class="testimonial-block p-4 mb-4">
                                                    <div class="px-md-3 py-md-2">
                                                        <?php
                                                        if(!empty($testimonial))
                                                        { 
                                                            echo '<p class="text-primary">'.$testimonial.'</p>'; 
                                                        }
                                                        if(!empty($rating))
                                                        { 
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
                                                                <img src="<?php echo $url; ?>" title="star" alt="star" class="star"/>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                                <?php
                                            }
            
                                            if(!empty($name) || !empty($photo) || !empty($designation))
                                            { 
                                                $url = isset($photo['url']) ? $photo['url'] : '';
                                                    ?>
                                                     <div class="testimomial-user d-flex align-items-center pl-2 pl-md-3 ml-1">

                                                   
                                                <?php 
                                                if(!empty($url))
                                                {
                                                    $title = isset($photo['title']) ? $photo['title'] : '';
                                                    $alt = isset($photo['alt']) ? $photo['alt'] : '';
                                                    $width = isset($photo['width']) ? $photo['width'] : '';
                                                    $height = isset($photo['alt']) ? $photo['alt'] : '';
                                                    ?>
                                                    <img src="<?php echo $url; ?>" title="<?php echo $name; ?>" alt="<?php echo $name; ?>" class="mr-2 mr-md-3"/>
                                                    <?php
                                                }
                                                echo '<p class="font-14 font-md-17 text-mine-shaft"> <b>'.$name.'</b>';
                                                if(!empty($designation))
                                                {
                                                    echo '<span class="d-block font-12 font-md-14 font-weight-normal text-body">'.$designation.'</span>';
                                                } 
                                                echo '</p>';
                                                ?>
                                                </div>
                                                <?php
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
        </section>
        <?php
    }
}