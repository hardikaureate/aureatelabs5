<?php
if (!empty($args)) :
    $title = isset($args['about_theme_title']) ? $args['about_theme_title'] : '';
    $Desc = isset($args['about_theme_content']) ? $args['about_theme_content'] : '';
    $about_theme_timeline = isset($args['about_theme_timeline']) ? $args['about_theme_timeline'] : array();
?>
    <!-- About the theme -->
    <section class="py-40 py-md-60 py-xl-100 about-the-theme">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-7 about-the-theme-left">
                    <div class="about-the-theme-text">
                        <?php
                            if (!empty($title) || !empty($Desc)) : ?>
                                <?php if (!empty($title)) : ?>
                                    <h2 class="section-heading" data-aos="fade-up">
                                        <?php echo $title; ?>
                                    </h2>
                                <?php endif; ?>
                                <?php if (!empty($Desc)) : ?>
                                    <div data-aos="fade-up" class="font-14 font-md-20 link-description">
                                        <?php echo $Desc; ?>
                                    </div>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-5 about-the-theme-right pt-md-0 pt-25">
                    <?php
                        if (!empty($about_theme_timeline)) {
                            $timeline_label = isset($about_theme_timeline['timeline_label']) ? $about_theme_timeline['timeline_label'] : '';
                            $timeline_text = isset($about_theme_timeline['timeline_text']) ? $about_theme_timeline['timeline_text'] : '';
                            $cost_label = isset($about_theme_timeline['cost_label']) ? $about_theme_timeline['cost_label'] : '';
                            $cost_text = isset($about_theme_timeline['cost_text']) ? $about_theme_timeline['cost_text'] : '';
                            $ideal_data_label = isset($about_theme_timeline['ideal_data_label']) ? $about_theme_timeline['ideal_data_label'] : '';
                            $ideal_data = isset($about_theme_timeline['ideal_data']) ? $about_theme_timeline['ideal_data'] : array();
                        ?>
                        <div class="about-the-theme-box" data-aos="fade-up">
                            <div class="justify-content-between d-flex about-the-theme-title pt-24 pb-24 pr-24 pl-24 pt-md-40 pb-md-40 pr-md-40 pl-md-40">
                                <label class="text-A1A1A1 font-14 font-md-20">
                                    <?php if (!empty($timeline_label)) : ?>
                                        <?php echo $timeline_label; ?>
                                    <?php endif; ?>
                                    <?php if (!empty($timeline_text)) : ?>
                                        <b class="d-block font-heading font-weight-medium text-primary"><?php echo $timeline_text; ?></b>
                                    <?php endif; ?>
                                </label>
                                <label class="text-A1A1A1 font-14 font-md-20">
                                    <?php if (!empty($cost_label)) : ?>
                                        <?php echo $cost_label; ?>
                                    <?php endif; ?>
                                    <?php if (!empty($cost_text)) : ?>
                                        <b class="d-block font-heading font-weight-medium text-primary"><?php echo $cost_text; ?></b>
                                    <?php endif; ?>
                                </label>
                            </div>
                            <div class="pt-24 pb-24 pr-24 pl-24 pt-md-40 pb-md-40 pr-md-40 pl-md-40">
                                <?php if (!empty($ideal_data_label)) : ?>
                                    <h3 data-aos="fade-up" class="font-weight-medium text-primary pb-24"><?php echo $ideal_data_label; ?></h3>
                                <?php endif; ?>
                                <ul class="checklist">
                                    <?php
                                        }
                                        ?>
                                        <?php
                                        foreach ($ideal_data as $key => $ideal_data_list) {
                                            $idealDataList = $ideal_data_list['ideal_list'] ? $ideal_data_list['ideal_list'] : '';
                                            if (!empty($idealDataList)) {
                                        ?>
                                                <li data-aos="fade-up" class="font-20">
                                                    <?php echo $idealDataList; ?>
                                                </li>
                                        <?php
                                            }
                                        } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>