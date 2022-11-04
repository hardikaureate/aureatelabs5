<?php
if (!empty($args)) 
{
    $study_layout = isset($args['study_layout']) ? $args['study_layout'] : '';
    $heading = isset($args['heading']) ? $args['heading'] : '';
    $sub_heading = isset($args['sub_heading']) ? $args['sub_heading'] : '';
    $content = isset($args['content']) ? $args['content'] : '';
    $percentage_and_label = isset($args['study_percentage_and_label']) ? $args['study_percentage_and_label'] : array();
    $col_3 = '';
    $m_class= 'mt-4 mt-md-5';
    if (!empty($study_layout) || !empty($heading) || !empty($sub_heading) || !empty($content) || !empty($percentage_and_label)) 
    {
        if(!empty($study_layout))
        {
            $col_3 = ($study_layout == 'cs-result-split') ? 'col-md-4' : 'col-md-8';
        }   ?>
        <!--  S10 Result that we delivered -->
        <section class="py-40 py-md-60 py-xl-100 bg-dark <?php echo $study_layout; ?>">
            <div class="container">
                <div class="row">
                    <?php
                    if (!empty($heading) || !empty($sub_heading)) 
                    {   ?>
                        <div class="<?php echo $col_3; ?>">
                            <div class="pr-md-4">
                                <?php
                                if (!empty($heading)) 
                                {   ?>
                                    <span class="section-sub-heading" data-aos="fade-up"><?php echo $heading; ?></span>
                                    <?php
                                }
                                if (!empty($sub_heading)) 
                                {   ?>
                                    <h2 class="section-heading text-white" data-aos="fade-up"><?php echo $sub_heading; ?></h2>    
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                        <?php
                    }
                   
                    if (!empty($content)) 
                    {   ?>
                        <div class="col-md-8">                           
                            <div class="text-A1A1A1 pr-3" data-aos="fade-up">
                                <?php echo $content; ?>
                            </div>
                        </div>
                    <?php
                    }else{
                        $m_class="";
                    }
                    ?>
                </div>
                <?php
                    if (!empty($percentage_and_label)) 
                    {   ?>
                        
                            <?php
                            if (!empty($percentage_and_label)) 
                            {   ?>
                                <div class="row <?php echo $m_class; ?>">
                                    <?php
                                    foreach ($percentage_and_label as $key => $percentage_label) 
                                    {
                                        $percentage = isset($percentage_label['percentage']) ? $percentage_label['percentage'] : '';
                                        $label = isset($percentage_label['label']) ? $percentage_label['label'] : '';
                                        if (!empty($label) || !empty($percentage)) 
                                        {   ?>
                                            <div class="col-6 col-md-3 column-border">
                                                <div class="column-border-inner py-3 py-md-3" >
                                                    <?php
                                                    if (!empty($percentage))
                                                    {   ?>
                                                        <span class="d-block font-40 font-md-70 text-white font-heading mb-2 mb-md-0" data-aos="fade-up"><?php echo $percentage; ?></span>
                                                        <?php
                                                    }
                                                    if (!empty($label)) 
                                                    {   ?>
                                                        <span class="d-block text-A1A1A1 font-12 font-md-20" data-aos="fade-up"><?php echo $label; ?></span>
                                                        <?php
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>
                                <?php
                            }
                            ?>
                        
                    <?php
                    }
                    ?>
            </div>
        </section>
        <?php
    }
}
