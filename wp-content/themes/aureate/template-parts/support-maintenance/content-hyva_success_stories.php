<?php
if (!empty($args)) :
    $background_color = isset($args['s26_sm_select_background_color']) ? $args['s26_sm_select_background_color'] : '';
    $title = isset($args['s26_title']) ? $args['s26_title'] : '';
    $Desc = isset($args['s26_description']) ? $args['s26_description'] : '';
    $case_studies = isset($args['s26_casestudies']) ? $args['s26_casestudies'] : array();

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
    <section class="hyva-success-stories py-40 py-md-60 py-xl-100 <?php echo $backColor; ?>">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <?php
                    if (!empty($subTitle) || !empty($title) || !empty($Desc)) { ?>
                        <?php if (!empty($subTitle)) { ?>
                            <span class="section-sub-heading" data-aos="fade-up">
                                <?php echo $subTitle; ?>
                            </span>
                        <?php } ?>

                        <?php if (!empty($title)) { ?>
                            <h2 class="section-heading" data-aos="fade-up">
                                <?php echo $title; ?>
                            </h2>
                        <?php } ?>

                        <?php if (!empty($Desc)) { ?>
                            <div class="section-desc pb-20 pb-md-40 link-description" data-aos="fade-up">
                                <?php echo $Desc; ?>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
                <div class="col-md-6 hyva-success-stories-right-col success-story-section">
                    <?php
                    if (!empty($case_studies)) {
                        get_template_part('template-parts/content', 'casestudy', $case_studies);
                    }
                    ?>
                </div>
            </div>

        </div>
    </section>
<?php endif; ?>