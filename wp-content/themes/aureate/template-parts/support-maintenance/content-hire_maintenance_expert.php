<!-- Hire Maintenance Expert -->
<?php
if (!empty($args)) :

    $addCustomClass = isset($args['s3_sm_add_custom_class']) ? $args['s3_sm_add_custom_class'] : '';
    $background_color = isset($args['s3_sm_background_color']) ? $args['s3_sm_background_color'] : '';
    $subTitle = isset($args['s3_sm_hire_expert_sub_title']) ? $args['s3_sm_hire_expert_sub_title'] : '';
    $title = isset($args['s3_sm_hire_expert_title']) ? $args['s3_sm_hire_expert_title'] : '';
    $description = isset($args['s3_sm_hire_expert_description']) ? $args['s3_sm_hire_expert_description'] : '';
    $cat_link = isset($args['s3_sm_hire_expert_cta_link']) ? $args['s3_sm_hire_expert_cta_link'] : '';
    $expertAgenda = isset($args['s3_sm_hire_expert_agenda']) ? $args['s3_sm_hire_expert_agenda'] : array();
    $listingOnly = isset($args['s3_sm_hire_expert_list_of_agenda']) ? $args['s3_sm_hire_expert_list_of_agenda'] : array();
    $listingWithoutNum = isset($args['s3_sm_listing_without_number']) ? $args['s3_sm_listing_without_number'] : array();

    $backColor = 'bg-white';
    if (!empty($background_color)) {
        if ($background_color == 'light') {
            $backColor = "bg-light";
        } elseif ($background_color == 'dark') {
            $backColor = "bg-dark";
        } else {
            $backColor = "bg-white";
        }
    } ?>

    <section class="py-40 py-md-60 py-xl-100 hire-section <?php echo $backColor; ?> <?php if(!empty($addCustomClass)) { echo $addCustomClass; }?>">
        <div class="container">
            <div class="row">
                <?php
                if (!empty($subTitle) || !empty($title) | !empty($description)) : ?>
                    <div class="col-md-5">
                            <?php if (!empty($subTitle)) : ?>
                                <span class="section-sub-heading" data-aos="fade-up">
                                    <?php echo $subTitle; ?>
                                </span>
                            <?php endif; ?>

                            <?php if (!empty($title)) : ?>
                                <h2 class="section-heading mb-0 pb-30" data-aos="fade-up">
                                    <?php echo $title; ?>
                                </h2>
                            <?php endif; ?>

                            <?php if (!empty($description)) : ?>
                                <div class="section-description pb-md-20 link-description" data-aos="fade-up">
                                    <?php echo $description; ?>
                                </div>
                            <?php endif; ?>

                            <?php
                            if (!empty($cat_link)) :
                                $hire_package_link = isset($cat_link['url']) ? $cat_link['url'] : '';
                                $hire_package_title = isset($cat_link['title']) ? $cat_link['title'] : '';
                                $hire_package_target = !empty($cat_link['target']) ? 'target="_blank"' : '';

                                $hire_package_link = filter_var($hire_package_link, FILTER_SANITIZE_URL);
                                if (filter_var($hire_package_link, FILTER_VALIDATE_URL) !== false) 
                                {
                                    $url = esc_url($hire_package_link);
                                }
                                else
                                {
                                    $url = '#knowmore';
                                    $hire_package_target = '';
                                }

                                if (!empty($url) && !empty($hire_package_title)) {   ?>
                                    
                                    <a class="arrow-btn" data-aos="fade-up" href="<?php echo $url; ?>" <?php echo $hire_package_target; ?> title="<?php echo $hire_package_title; ?>">
                                        <span><?php echo $hire_package_title; ?></span>
                                    </a>
                            <?php }
                            endif; ?>
                    </div>
                <?php endif; ?>
                <div class="col-md-7 pt-40 pt-md-0">
                    <?php if (!empty($expertAgenda)) : ?>
                        <ul class="ul-digits mt-2 mt-md-0">
                            <?php
                            $count = 1;
                            foreach ($expertAgenda as $key => $agenda_list) :
                                $titles = isset($agenda_list['s3_sm_hire_expert_agenda_title']) ? $agenda_list['s3_sm_hire_expert_agenda_title'] : '';
                                $desc = isset($agenda_list['s3_sm_hire_expert_agenda_content']) ? $agenda_list['s3_sm_hire_expert_agenda_content'] : ''; ?>

                                <?php if (!empty($titles) || !empty($desc)) : ?>
                                    <li data-aos="fade-up">
                                        <span class="list-counter font-16 font-md-20">
                                            <?php
                                            echo str_pad($count, 2, '0', STR_PAD_LEFT) . '.';
                                            ?>
                                        </span>
                                        <?php if (!empty($titles)) : ?>
                                            <h3 class="font-md-20 mb-2 mb-md-3 font-16 font-md-20"><?php echo $titles; ?></h3>
                                        <?php endif; ?>

                                        <?php if (!empty($desc)) : ?>
                                            <div class="hire-right-description link-description">
                                                <?php //echo $desc; 
                                                echo al_encode_emails( $desc ); ?>
                                            </div>
                                        <?php endif; ?>
                                    </li>
                                <?php
                                    $count++;
                                endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                    <?php if (!empty($listingOnly)) : ?>
                        <ul class="checklist">
                            <?php
                            foreach ($listingOnly as $key => $agenda_list) :
                                $allPoints = isset($agenda_list['s3_sm_list_of_advantage']) ? $agenda_list['s3_sm_list_of_advantage'] : ''; ?>

                                <?php if (!empty($allPoints)) : ?>
                                    <?php if (!empty($allPoints)) : ?>
                                        <li class="mb-3 mb-md-4" data-aos="fade-up"><?php echo $allPoints; ?></li>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                    <?php if (!empty($listingWithoutNum)) : ?>
                        <ul class="listing-withoutnum">
                                <?php
                                foreach ($listingWithoutNum as $key => $notAnumber) :
                                    $titles = isset($notAnumber['s3_sm_listing_without_number_title']) ? $notAnumber['s3_sm_listing_without_number_title'] : '';
                                    $desc = isset($notAnumber['s3_sm_listing_without_number_content']) ? $notAnumber['s3_sm_listing_without_number_content'] : ''; ?>

                                    <?php if (!empty($titles) || !empty($desc)) : ?>
                                        <li class="pb-30" data-aos="fade-up">
                                            <?php if (!empty($titles)) : ?>
                                                <h3 class="pb-16 font-16 font-md-20 font-weight-medium"><?php echo $titles; ?></h3>
                                            <?php endif; ?>
                                            <?php if (!empty($desc)) : ?>
                                                <div class="link-description">
                                                    <?php echo $desc; ?>
                                                </div>
                                            <?php endif; ?>
                                        </li>
                                    <?php
                                    endif; ?>
                                <?php endforeach; ?>
                            </ul>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>