<?php
if (!empty($args)) :
    $title = isset($args['vsf_cf_form_title']) ? $args['vsf_cf_form_title'] : '';
    $contact_form = isset($args['vsf_cf_contact_form']) ? $args['vsf_cf_contact_form'] : array();
?>
    <section class="support-maintanance-contact-form-section py-40 py-md-60 py-xl-100">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="pr-lg-5 mr-lg-5" data-aos="fade-up">
                        <?php if (!empty($title)) : ?>
                            <h2 class="section-heading">
                                <?php echo $title; ?>
                            </h2>
                        <?php endif; ?>
                    </div>
                </div>
                <?php if (!empty($contact_form)) : ?>
                    <div class="col-md-6">
                        <div class="contact-form-right pl-lg-5 mt-4 mt-md-0" data-aos="fade-up">
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
<?php endif; ?>