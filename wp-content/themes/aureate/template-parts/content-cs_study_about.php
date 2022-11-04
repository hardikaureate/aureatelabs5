<?php
if(!empty ($args))
{
    $study_about_heading = isset($args['study_about_heading']) ? $args['study_about_heading'] : '';
    $study_about_content = isset($args['study_about_content']) ? $args['study_about_content'] : '';
    if(!empty($study_about_heading) || !empty($study_about_content))
    {   ?>
        <section class="py-40 py-md-60 py-xl-100">
            <div class="container">
                <div class="row">
                    <?php
                    if(!empty($study_about_heading) )
                    {   ?>
                        <div class="col-md-4">
                            <h2 class="section-heading" data-aos="fade-up"><?php echo $study_about_heading; ?></h2>
                        </div>
                        <?php
                    }
                    if(!empty($study_about_content) )
                    {   ?>
                        <div class="col-md-8">
                            <div class="font-md-20 text-body pl-xl-3" data-aos="fade-up"><?php echo $study_about_content; ?></div>
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