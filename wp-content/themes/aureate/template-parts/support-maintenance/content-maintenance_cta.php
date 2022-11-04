<?php
if (!empty($args)) :
    $title = isset($args['s7_sm_title']) ? $args['s7_sm_title'] : '';
    $Desc = isset($args['s7_sm_description']) ? $args['s7_sm_description'] : '';
    $CTALink = isset($args['s7_sm_link']) ? $args['s7_sm_link'] : '';

    if (!empty($subTitle) || !empty($title) || !empty($CTALink)) : ?>
   
    <!--  Get Experience Of the App!t -->

        <div class="container py-md-80 app-section">
            <div class="row m-0 bg-dark py-40 pl-25 pr-25 py-md-80 px-lg-100">
                <div class="col-md-6 p-0">
                    <?php if (!empty($title)) : ?>
                        <h2 class="section-heading text-white" data-aos="fade-up">
                            <?php echo $title; ?>
                        </h2>
                    <?php endif; ?>

                    <?php if (!empty($Desc)) : ?>
                        <p class="link-description app-desc text-A1A1A1 pb-30 pb-md-0" data-aos="fade-up">
                            <?php echo $Desc; ?>
                        </p>
                    <?php endif; ?>
                </div>
                <div class="col-md-6 p-0 align-content-center align-items-center justify-content-end d-flex">
                    <?php
                    if (!empty($CTALink)) :
                        $cta_link = isset($CTALink['url']) ? $CTALink['url'] : '';
                        $cta_title = isset($CTALink['title']) ? $CTALink['title'] : '';
                        $cta_target = !empty($CTALink['target']) ? 'target="_blank"' : '';

                        $cta_link = filter_var($cta_link, FILTER_SANITIZE_URL);
                        if (filter_var($cta_link, FILTER_VALIDATE_URL) !== false) 
                        {
                            $url = esc_url($cta_link);
                        }
                        else
                        {
                            $url = '#knowmore';
                            $cta_target = '';
                        }

                        if (!empty($url) && !empty($cta_title)) {   ?>
                            <a data-aos="fade-up" class="btn btn-dark-hover font-weight-medium uppercase" href="<?php echo $url; ?>" 
                            <?php echo $cta_target; ?> title="<?php echo $cta_title; ?>">
                                <span><?php echo $cta_title; ?></span>
                            </a>
                    <?php }
                    endif; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php endif; ?>