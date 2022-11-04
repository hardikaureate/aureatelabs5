<!-- // FAQs Section -->
<?php
if (!empty($args)) :
    $background_color = isset($args['s9_sm_select_background_color']) ? $args['s9_sm_select_background_color'] : '';
    $subTitle = isset($args['s9_sm_sub_title']) ? $args['s9_sm_sub_title'] : '';
    $title = isset($args['s9_sm_title']) ? $args['s9_sm_title'] : '';
    $Desc = isset($args['s9_sm_description']) ? $args['s9_sm_description'] : '';
    $faqs_data = isset($args['s9_sm_faqs_list']) ? $args['s9_sm_faqs_list'] : array();

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


    <section class="support-maintanance-faq-section py-40 py-md-60 py-xl-100 <?php echo $backColor; ?>">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <?php
                    if (!empty($subTitle) || !empty($title) || !empty($Desc)) : ?>
                        <?php if (!empty($subTitle)) : ?>
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
                            <div class="link-description">
                                <?php echo $Desc; ?>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
                <?php if (!empty($faqs_data)) : ?>
                    <div class="col-md-7">
                        <div class="faq-right pl-md-5 mt-4 mt-md-0 pt-2 pt-md-0">
                            <?php
                            foreach ($faqs_data as $key => $faqsQuesAnsList) :
                                $size = 'full';
                                $titles = isset($faqsQuesAnsList['s9_sm_faqs_list_title']) ? $faqsQuesAnsList['s9_sm_faqs_list_title'] : '';
                                $desc = isset($faqsQuesAnsList['s9_sm_faqs_list_content']) ? $faqsQuesAnsList['s9_sm_faqs_list_content'] : ''; ?>
                                <?php if (!empty($titles) || !empty($desc)) : ?>
                                    <div class="accordion-wrap" data-aos="fade-up">
                                        <div class="accordion-link font-14 font-md-20 text-primary">
                                            <?php if (!empty($titles)) : ?>
                                                <h3 class="accordion font-14 font-md-20 font-weight-normal"><?php echo $titles; ?></h3>
                                            <?php endif; ?>
                                        </div>
                                        <div class="accordion-content font-14 font-md-16">
                                            <?php if (!empty($desc)) : ?>
                                                <div class="faqs-data link-description">

                                                    <?php //echo $desc; 
                                                    echo al_encode_emails( $desc );
                                                    ?>
                                                    
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                            <?php endif;
                            endforeach;
                            ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<script>
    const accordionBtns = document.querySelectorAll(".accordion-link");
    accordionBtns.forEach((accordion) => {
        accordion.onclick = function() {
            this.classList.toggle("is-open");

            let content = this.nextElementSibling;
            console.log(content);

            if (content.style.maxHeight) {
                content.style.maxHeight = null;
            } else {
                content.style.maxHeight = content.scrollHeight + "px";
                console.log(content.style.maxHeight);
            }
        };
    });
</script>