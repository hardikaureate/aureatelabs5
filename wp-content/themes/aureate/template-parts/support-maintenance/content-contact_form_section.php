<?php
if (!empty($args)) :
    $background_color = isset($args['s10_sm_select_background_color']) ? $args['s10_sm_select_background_color'] : '';
    $subTitle = isset($args['s10_sm_sub_title']) ? $args['s10_sm_sub_title'] : '';
    $title = isset($args['s10_sm_title']) ? $args['s10_sm_title'] : '';
    $Desc = isset($args['s10_sm_description']) ? $args['s10_sm_description'] : '';
    $contact_form = isset($args['s10_sm_expert_connect_form']) ? $args['s10_sm_expert_connect_form'] : '';

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

    <section class="support-maintanance-contact-form-section py-40 py-md-60 py-xl-100 <?php echo $backColor; ?>" id="knowmore">
        <div class="container">
            <div class="row">
                <?php if (!empty($subTitle) || !empty($title) || !empty($Desc)) : ?>
                    <div class="col-md-6">
                        <div class="pr-lg-5 mr-lg-5">
                            <div data-aos="fade-up">
                                <?php if (!empty($subTitle)) ?>
                                <span class="section-sub-heading">
                                    <?php echo $subTitle; ?>
                                </span>
                            <?php endif; ?>

                            <?php if (!empty($title)) : ?>
                                <h2 class="section-heading">
                                    <?php echo $title; ?>
                                </h2>
                            <?php endif; ?>

                            <?php if (!empty($Desc)) : ?>
                                <div class="link-description section-desc">
                                    <?php echo $Desc; ?>
                                </div>
                            <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if (!empty($contact_form)) : ?>
                    <div class="col-md-6">
                        <div class="contact-form-right pl-xl-5 mt-4 mt-md-0" data-aos="fade-up">
                            <div class="contact-form bg-white px-3 py-3 p-lg-4">
                                <div class="p-1 p-lg-3">
                                    <?php
                                    $title = get_the_title($contact_form);
                                    echo do_shortcode('[contact-form-7 id="' . $contact_form . '" title="' . $title . '"]');
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Thank You Popup -->
    <?php get_template_part("/template-parts/thankyou-popup"); ?>