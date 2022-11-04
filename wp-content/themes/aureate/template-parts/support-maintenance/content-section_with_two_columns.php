<?php
if (!empty($args)) :
    $title = isset($args['s23_sm_title']) ? $args['s23_sm_title'] : '';
    $background_color = isset($args['s23_select_background_color']) ? $args['s23_select_background_color'] : '';
    $Desc = isset($args['s23_sm_description']) ? $args['s23_sm_description'] : '';
    $process_steps = isset($args['s23_sm_process_steps']) ? $args['s23_sm_process_steps'] : array();

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
    <!-- Steps Section -->
    <section class="step-section py-40 py-md-60 py-xl-100 <?php echo $backColor; ?>">
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
                
            <?php if (!empty($process_steps)) : ?>
                <div class="row step-section-row">
                    <?php
                    $count = 1;
                    foreach ($process_steps as $key => $process_step) :
                        $titles = isset($process_step['s23_sm_process_steps_title']) ? $process_step['s23_sm_process_steps_title'] : '';
                        $desc = isset($process_step['s23_sm_process_steps_content']) ? $process_step['s23_sm_process_steps_content'] : ''; ?>
                        <div class="col-md-6 step-section-col" data-aos="fade-up">
                            <div class="step-section-inner-col h-100">
                                <?php if (!empty($titles) || !empty($desc)) : ?>
                                        <span class="list-counter font-16 font-md-20">
                                            <?php
                                                echo str_pad($count, 2, '0', STR_PAD_LEFT) . '.';
                                            ?>
                                        </span>
                                        <?php if (!empty($titles)) : ?>
                                            <h3 class="mb-2 pb-md-1 font-16 font-md-20">
                                                <?php echo $titles; ?>
                                            </h3>
                                        <?php endif; ?>

                                        <?php if (!empty($desc)) : ?>
                                            <div class="desciption font-14 font-md-16 link-description">
                                                <?php echo $desc; ?>
                                            </div>
                                        <?php endif; ?>
                                    <?php $count++; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>