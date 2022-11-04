<!-- Maintenance Package Section -->
<section class="package-section py-40 py-md-60 py-xl-100 bg-dark">
    <div class="container">
        <?php
        if (!empty($args)) :
            $title = isset($args['s5_sm_maintain_package_title']) ? $args['s5_sm_maintain_package_title'] : '';
            $packageDesc = isset($args['s5_sm_maintain_package_cta']) ? $args['s5_sm_maintain_package_cta'] : '';
            $packageTable = isset($args['s5_sm_maintain_package_table']) ? $args['s5_sm_maintain_package_table'] : array();

            if (!empty($title)) : ?>
                <?php if (!empty($title)) : ?>
                    <h2 class="section-heading text-white" data-aos="fade-up">
                        <?php echo $title; ?>
                    </h2>
                <?php endif; ?>
            <?php endif; ?>

            

            <?php if (!empty($packageTable)) : ?>
                <div class="package-row">
                    <?php
                    $package_titles = array_column($packageTable, 's5_sm_maintain_package_title');
                    $s5_sm_column_one = array_column($packageTable, 's5_sm_column_one');
                    $s5_sm_column_two = array_column($packageTable, 's5_sm_column_two');
                    $s5_sm_column_three = array_column($packageTable, 's5_sm_column_three');
                    $final_data = array();
                    if(!empty($s5_sm_column_one)) 
                    {
                        $final_data[] = $s5_sm_column_one;
                    }
                    if(!empty($s5_sm_column_two)) 
                    {
                        $final_data[] = $s5_sm_column_two;
                    }
                    if(!empty($s5_sm_column_three)) 
                    {
                        $final_data[] = $s5_sm_column_three;
                    }
                    
                    if(!empty($final_data))
                    {
                        echo '<div class="packages-mobile d-block d-md-none">';
                        foreach ($final_data as $key => $final_cols) :
                            if(!empty($final_cols))
                            {
                                $first_col = isset($final_cols[0]) ? $final_cols[0] : '';
                                if(!empty($first_col))
                                {
                                    $sec_label = '';
                                    $label = isset($first_col['s5_sm_package_column_one_text']) ? $first_col['s5_sm_package_column_one_text'] : '';
                                    $label_2 = isset($first_col['s5_sm_package_column_two_text']) ? $first_col['s5_sm_package_column_two_text'] : '';
                                    $label_3 = isset($first_col['s5_sm_package_column_three_text']) ? $first_col['s5_sm_package_column_three_text'] : '';
                                    if(!empty($label))
                                    {
                                        $sec_label = $label;
                                    }
                                    elseif(!empty($label_2))
                                    {
                                        $sec_label = $label_2;
                                    }
                                    elseif(!empty($label_3))
                                    {
                                        $sec_label = $label_3;

                                    }
                                }
                                #remvoe first
                                unset($final_cols[0]);
                                echo "<ul class='p-4' data-aos='fade-up'>";
                               if(!empty($sec_label))
                               {
                                    echo '<li class="text-white font-20 font-weight-bold mb-3">'.$sec_label.'</li>';
                               }
                                foreach ($final_cols as $key => $final_col) :
                                    $package_title = isset($package_titles[$key]) ? $package_titles[$key] : '';
                                    $type_one = isset($final_col['s5_sm_package_column_one_type']) ? $final_col['s5_sm_package_column_one_type'] : '';
                                    $column_data = '<span class="dashed"></span>';
                                    $column_class = 'dashed';
                                    if(!empty($type_one))
                                    {
                                        if($type_one == 'checkbox')
                                        {
                                            $one_checkbox = isset($final_col['s5_sm_package_column_one_checkbox']) ? $final_col['s5_sm_package_column_one_checkbox'] : '';
                                            $column_data = !empty($one_checkbox) ? '' : '' ;
                                            $column_class = !empty($one_checkbox) ? 'checked' : 'dashed' ;
                                        }
                                        else if($type_one == 'text')
                                        {
                                            $one_text = isset($final_col['s5_sm_package_column_one_text']) ? $final_col['s5_sm_package_column_one_text'] : '';
                                            $column_data = !empty($one_text) ?  $one_text : '' ;
                                            $column_class = !empty($one_text) ? 'checked' : 'dashed' ;
                                        }
                                    }

                                    $type_two = isset($final_col['s5_sm_package_column_two_type']) ? $final_col['s5_sm_package_column_two_type'] : '';
                                    if(!empty($type_two))
                                    {
                                        if($type_two == 'checkbox')
                                        {
                                            $two_checkbox = isset($final_col['s5_sm_package_column_two_checkbox']) ? $final_col['s5_sm_package_column_two_checkbox'] : '';
                                            $column_data = !empty($two_checkbox) ? '' : '' ;
                                            $column_class = !empty($two_checkbox) ? 'checked' : 'dashed' ;
                                        }
                                        else if($type_two == 'text')
                                        {
                                            $two_text = isset($final_col['s5_sm_package_column_two_text']) ? $final_col['s5_sm_package_column_two_text'] : '';
                                            $column_data = !empty($two_text) ? $two_text : '' ;
                                            $column_class = !empty($two_text) ? 'checked' : 'dashed' ;
                                        }
                                    }

                                    $type_three = isset($final_col['s5_sm_package_column_three_type']) ? $final_col['s5_sm_package_column_three_type'] : '';
                                    if(!empty($type_three))
                                    {
                                        if($type_three == 'checkbox')
                                        {
                                            $three_checkbox = isset($final_col['s5_sm_package_column_three_checkbox']) ? $final_col['s5_sm_package_column_three_checkbox'] : '';
                                            $column_data = !empty($three_checkbox) ? '' : '' ;
                                            $column_class = !empty($three_checkbox) ? 'checked' : 'dashed' ;
                                        }
                                        else if($type_three == 'text')
                                        {
                                            $three_text = isset($final_col['s5_sm_package_column_three_text']) ? $final_col['s5_sm_package_column_three_text'] : '';
                                            $column_data = !empty($three_text) ?  $three_text : '' ;
                                            $column_class = !empty($three_text) ? 'checked' : 'dashed' ;
                                        }
                                    }
                                    echo '<li class="text-white font-16 '.$column_class.'">'.$column_data.' '.$package_title.'</li>';

                                endforeach;
                                echo "</ul>";
                            }
                        endforeach;
                        echo '</div>';
                    }
                    echo '<div class="packages-desktop d-none d-md-block" data-aos="fade-up">';
                    foreach ($packageTable as $key => $package_table_data) :
                        $titles = isset($package_table_data['s5_sm_maintain_package_title']) ? $package_table_data['s5_sm_maintain_package_title'] : '';
                        $column_one = isset($package_table_data['s5_sm_column_one']) ? $package_table_data['s5_sm_column_one'] : '';
                        $column_two = isset($package_table_data['s5_sm_column_two']) ? $package_table_data['s5_sm_column_two'] : '';
                        $column_three = isset($package_table_data['s5_sm_column_three']) ? $package_table_data['s5_sm_column_three'] : ''; ?>
                        <?php if (!empty($titles) || !empty($column_one) || !empty($column_two) | !empty($column_three)) : ?>
                            <div class="package-cols d-flex justify-content-between">
                                <?php if (!empty($titles)) : ?>
                                    <div class="py-4 text-white"><?php echo $titles; ?></div>
                                <?php endif; ?>
    
                                <?php if (!empty($column_one)) : ?>
                                    <?php 
                                         $type_one = isset($column_one['s5_sm_package_column_one_type']) ? $column_one['s5_sm_package_column_one_type'] : '';
                                         $column_one_data = '<span class="dashed"><span></span></span>';
                                         if(!empty($type_one))
                                         {
                                            if($type_one == 'checkbox')
                                            {
                                                $one_checkbox = isset($column_one['s5_sm_package_column_one_checkbox']) ? $column_one['s5_sm_package_column_one_checkbox'] : '';
                                                $column_one_data = !empty($one_checkbox) ? '<span class="checked"></span>' : '<span class="dashed"><span></span></span>' ;
                                            }
                                            else if($type_one == 'text')
                                            {
                                                $one_text = isset($column_one['s5_sm_package_column_one_text']) ? $column_one['s5_sm_package_column_one_text'] : '';
                                                $column_one_data = !empty($one_text) ? $one_text : '<span class="dashed"><span></span></span>' ;
                                            }
                                         }
                                    ?>
                                    <div class="text-center text-white py-4"><?php echo $column_one_data; ?></div>
                                <?php endif; ?>

                                <?php if (!empty($column_two)) : ?>
                                    <?php 
                                         $type_two = isset($column_two['s5_sm_package_column_two_type']) ? $column_two['s5_sm_package_column_two_type'] : '';
                                         $column_two_data = '<span class="dashed"><span></span></span>';
                                         if(!empty($type_two))
                                         {
                                            if($type_two == 'checkbox')
                                            {
                                                $two_checkbox = isset($column_two['s5_sm_package_column_two_checkbox']) ? $column_two['s5_sm_package_column_two_checkbox'] : '';
                                                $column_two_data = !empty($two_checkbox) ? '<span class="checked"></span>' : '<span class="dashed"><span></span></span>' ;
                                            }
                                            else if($type_two == 'text')
                                            {
                                                $two_text = isset($column_two['s5_sm_package_column_two_text']) ? $column_two['s5_sm_package_column_two_text'] : '';
                                                $column_two_data = !empty($two_text) ? $two_text : '<span class="dashed"><span></span></span>' ;
                                            }
                                         }
                                    ?>
                                    <div class="text-center text-white py-4"><?php echo $column_two_data; ?></div>
                                <?php endif; ?>

                                <?php if (!empty($column_three)) : ?>
                                    <?php 
                                         $type_three = isset($column_three['s5_sm_package_column_three_type']) ? $column_three['s5_sm_package_column_three_type'] : '';
                                         $column_three_data = '<span class="dashed"><span></span></span>';
                                         if(!empty($type_three))
                                         {
                                            if($type_three == 'checkbox')
                                            {
                                                $three_checkbox = isset($column_three['s5_sm_package_column_three_checkbox']) ? $column_three['s5_sm_package_column_three_checkbox'] : '';
                                                $column_three_data = !empty($three_checkbox) ? '<span class="checked"></span>' : '<span class="dashed"><span></span></span>' ;
                                            }
                                            else if($type_three == 'text')
                                            {
                                                $three_text = isset($column_three['s5_sm_package_column_three_text']) ? $column_three['s5_sm_package_column_three_text'] : '';
                                                $column_three_data = !empty($three_text) ? $three_text : '<span class="dashed"><span></span></span>' ;
                                            }
                                         }
                                    ?>
                                    <div class="text-center text-white py-4"><?php echo $column_three_data; ?></div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <?php echo '</div>'; ?>
                </div>
                <?php
                if (!empty($packageDesc)) :
                    $package_link = isset($packageDesc['url']) ? $packageDesc['url'] : '';
                    $package_title = isset($packageDesc['title']) ? $packageDesc['title'] : '';
                    $package_target = !empty($packageDesc['target']) ? 'target="_blank"' : '';
                    $package_link = filter_var($package_link, FILTER_SANITIZE_URL);
                    if (filter_var($package_link, FILTER_VALIDATE_URL) !== false) 
                    {
                        $url = esc_url($package_link);
                    }
                    else
                    {
                        $url = '#knowmore';
                        $package_target = '';
                    }
                    if (!empty($url) && !empty($package_title)) {   ?>
                        <div class="more-about-package text-center mt-4 mt-md-5 pt-2 pt-md-0" data-aos="fade-up">
                            <a class="btn" href="<?php echo $url; ?>" <?php echo $package_target; ?> title="<?php echo $package_title; ?>">
                                <span class="text-primary"><?php echo $package_title; ?></span>
                            </a>
                        </div>
                <?php }
                endif; ?>
        <?php
            endif;
        endif;
        ?>

    </div>
</section>
