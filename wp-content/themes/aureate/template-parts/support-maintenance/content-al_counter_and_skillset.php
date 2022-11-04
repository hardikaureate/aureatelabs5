<?php
if (!empty($args)) :
    $title = isset($args['s16_sm_title']) ? $args['s16_sm_title'] : '';
    $counter_digits = isset($args['s16_sm_counter_digits']) ? $args['s16_sm_counter_digits'] : array();
    $skillTitle = isset($args['s16_sm_technical_skill_title']) ? $args['s16_sm_technical_skill_title'] : '';
    $technical_skill = isset($args['s16_sm_technical_skill']) ? $args['s16_sm_technical_skill'] : array();
?>
    <section class="counter-section py-40 py-md-60 py-xl-100 bg-dark">
        <div class="container">
            <?php
            if (!empty($title)) : ?>
                <?php if (!empty($title)) : ?>
                    <h2 class="section-heading text-white text-md-center" data-aos="fade-up">
                        <?php echo $title; ?>
                    </h2>
                <?php endif; ?>
            <?php endif; ?>


            <?php if (!empty($counter_digits)) : ?>
                <div class="row justify-content-md-center <?php echo $servicesLayout; ?>" data-aos="fade-up">
                    <?php
                    foreach ($counter_digits as $key => $counter_digits_list) :
                        $counter_no = isset($counter_digits_list['s16_sm_counter_title']) ? $counter_digits_list['s16_sm_counter_title'] : '';
                        $counter_text = isset($counter_digits_list['s16_sm_counter_content']) ? $counter_digits_list['s16_sm_counter_content'] : '';
                    ?>
                        <?php if (!empty($counter_no) || !empty($counter_text)) : ?>
                            <div class="col-6 col-md-3 column-border">
                                <div class="column-border-inner py-3 py-md-3">
                                    <?php if (!empty($counter_no)) : ?>
                                        <span class="d-block font-40 font-lg-50 font-xl-70 text-white font-heading mb-2 mb-md-0">
                                            <?php echo $counter_no; ?>
                                        </span>
                                    <?php endif; ?>

                                    <?php if (!empty($counter_text)) : ?>
                                        <span class="d-block text-A1A1A1 font-12 font-md-20">
                                            <?php echo $counter_text; ?>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
    <section class="skillset-section py-40 py-md-60 py-xl-100 bg-light">
        <div class="container">
            <?php
            if (!empty($skillTitle)) : ?>
                <?php if (!empty($skillTitle)) : ?>
                    <h2 class="section-heading" data-aos="fade-up">
                        <?php echo $skillTitle; ?>
                    </h2>
                <?php endif; ?>
            <?php endif; ?>

            <?php if (!empty($technical_skill)) : ?>
                <div class="skillset-table" data-aos="fade-up">
                    <table class="<?php echo $servicesLayout; ?>" >
                        <?php
                        foreach ($technical_skill as $key => $technical_skill_list) :
                            $skillTitle = isset($technical_skill_list['s16_sm_technical_skill_title']) ? $technical_skill_list['s16_sm_technical_skill_title'] : '';
                            $skillList = isset($technical_skill_list['s16_sm_technical_skill_list']) ? $technical_skill_list['s16_sm_technical_skill_list'] : array();
                        ?>  
                            <tr>
                                <?php if (!empty($skillTitle)) : ?>
                                    <th>
                                        <h3>
                                            <?php echo $skillTitle; ?>
                                        </h3>
                                    </th>
                                <?php endif; ?>
                                <?php if (!empty($skillList)) : ?>
                                    <td>
                                        <?php
                                        foreach ($skillList as $key => $skillLists) :
                                            $skillLists = isset($skillLists['s16_sm_technical_list_of_skill']) ? $skillLists['s16_sm_technical_list_of_skill'] : '';
                                        ?>
                                            <?php if (!empty($skillLists)) : ?>                                    
                                                <?php if (!empty($skillLists)) : ?>
                                                    <span>
                                                        <?php echo $skillLists; ?>
                                                    </span>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </td>
                                <?php endif; ?>
                            </tr>
                        <?php endforeach; ?>
                    </table>

                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>