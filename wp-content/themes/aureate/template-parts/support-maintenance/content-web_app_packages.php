<?php
if (!empty($args)) :
    $background_color = isset($args['s27_sm_select_background_color']) ? $args['s27_sm_select_background_color'] : '';
    $add_custom_class = isset($args['s27_sm_add_custom_class']) ? $args['s27_sm_add_custom_class'] : '';
    $title = isset($args['s27_sm_emergency_support_title']) ? $args['s27_sm_emergency_support_title'] : '';
    $Desc = isset($args['s27_sm_emergency_support_description']) ? $args['s27_sm_emergency_support_description'] : '';
    $s27_packages_support = isset($args['s27_packages_support']) ? $args['s27_packages_support'] : array();

    $backColor = 'bg-white';
    if (!empty($background_color)) {
        if ($background_color == 'light') {
            $backColor = "bg-light";
        } elseif ($background_color == 'dark') {
            $backColor = "bg-dark";
        } else {
            $backColor = "bg-white";
        }
    }
?>
    <!-- content_emergency_support_services -->
    <section class="packages-tabs py-40 py-md-60 py-xl-100 <?php echo $backColor; ?> <?php echo $add_custom_class; ?>">
        <div class="container">
            <?php
            if (!empty($title) || !empty($Desc)) : ?>
                <?php if (!empty($title)) : ?>
                    <h2 class="section-heading">
                        <?php echo $title; ?>
                    </h2>
                <?php endif; ?>
                <?php if (!empty($Desc)) : ?>
                    <p class="section-description link-description">
                        <?php echo $Desc; ?>
                    </p>
                <?php endif; ?>
            <?php endif; ?>

            <?php if (!empty($s27_packages_support)) : ?>
                <?php
                 $tab_count = 1;
                 ?>
                  <div class="row product-service-tab-wrap">
                    <ul class="col-12 wap-tab-name-wrap">
                        <?php
                        foreach ($s27_packages_support as $key => $package_service_list) :
                            $active = $tab_count == 1 ? 'active' : '';
                            $titles = isset($package_service_list['s27_sm_emergency_support_title']) ? $package_service_list['s27_sm_emergency_support_title'] : '';
                            $tab_count_val = 'tab_'.$tab_count;
                            ?>
                           
                            <?php echo '<li class="tab-name wap-tab-btn text-center '.$active.'" onClick="tab_HideShowhandleClick(\'' . $tab_count_val . '\');" id="cat_' . $tab_count_val . '"> <span>'. $titles . '</span></li>'; ?>
                            
                            <?php
                            $tab_count++;
                        endforeach;
                       ?>
                    </ul>
                  </div>
                  <?php
                $tab_sec_count = 1;
                foreach ($s27_packages_support as $key => $package_service_list) :

                    $titles = isset($package_service_list['s27_sm_emergency_support_title']) ? $package_service_list['s27_sm_emergency_support_title'] : '';
                    $desc = isset($package_service_list['s27_sm_emergency_support_description']) ? $package_service_list['s27_sm_emergency_support_description'] : '';
                    $allsteps = isset($package_service_list['s27_steps']) ? $package_service_list['s27_steps'] : '';
                    $tab_sec_count_val = 'tab_'.$tab_sec_count;
                    $style = $tab_sec_count == 1 ? '' : 'style="display:none;"'; 
                ?>
                   
                    <div class="wap-tab-content-wrap <?php echo  $tab_sec_count_val; ?>" <?php echo $style; ?>>
                        <div class="row">
                            <?php if (!empty($desc)) : ?>
                                <div class="col-lg-6 web-app-package-sec">
                                    <?php if (!empty($desc)) : ?>
                                        <div class="link-description">
                                            <?php echo $desc; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-lg-6 web-app-package-sec">
                                    <div class="web-app-package-sec-inner">
                                        <ul>
                                            <?php
                                            $count = 1;
                                            foreach ($allsteps as $key => $steps_list) {
                                                ?>
                                                <li>
                                                <?php
                                                $s27_step = isset($steps_list['s27_step']) ? $steps_list['s27_step'] : ''; ?>
                                                <span class="stepcount">
                                                    <?php 
                                                        echo 'Step #' . $count ;
                                                    ?>
                                                </span>
                                                
                                                <?php if (!empty($s27_step)) : ?>
                                                    <span class="step-texts text-primary font-16">
                                                        <span class="stepcount-dot">
                                                            <span class="stepcount-dot-main"></span>
                                                            <span class="stepcount-dot-inner"></span>
                                                        </span>
                                                        <span class="step-text-single">
                                                            <?php echo $s27_step; ?>
                                                        </span>
                                                    </span> 
                                                <?php endif; ?>
                                                <?php $count++; ?>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>

                            <?php endif; ?>
                        </div>
                    </div>
                <?php
                    $tab_sec_count++;
                endforeach; ?>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>
<script>

    function tab_HideShowhandleClick(id) {
        console.log(id);
        document.querySelectorAll('.wap-tab-name-wrap .wap-tab-btn').forEach(ele => {
            ele.classList.remove('active');
        });
        document.querySelectorAll('.wap-tab-content-wrap').forEach(ele => {
            ele.style.display = 'none';
        });

        document.querySelectorAll('.'+id+' .web-app-package-sec').forEach(ele => {
            ele.classList.add('aos-animate');
        })

        document.getElementById("cat_" + id).classList.add("active");
        document.getElementsByClassName(id)[0].style.display = 'block';
    }
</script>