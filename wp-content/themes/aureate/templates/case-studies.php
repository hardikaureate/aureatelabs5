<?php

/**
 * The Custom template for Blog Page
 *
 * Template Name: Case Studies Landing Page
 *
 * @package Aureatelabs
 * @subpackage Aureatelabs
 * @since 1.0
 * @version 1.0
 */
get_header();
?>

<?php
$work_heading = get_field('work_heading');
if(!empty($work_heading ))
{   ?>
    <!-- Banner section -->
    <section class="pt-40 pt-lg-60 pt-xl-100 pb-3 pb-xl-5 mb-4 text-center">
        <div class="container pt-4 pt-lg-4">
            <div class="row justify-content-center pt-4">
                <div class="col-md-10 col-xl-8">
                    <h1><?php echo $work_heading; ?></h1>
                </div>
            </div>
        </div>
    </section>
    <?php
}

$case_studies = get_field('case_studies');
if(!empty($case_studies ))
{   ?>
    <aside class="case-studies-story">
        <div class="success-story-section  mb-4 pb-3">
            <div class="container">
                <?php
                    get_template_part( 'template-parts/content', 'casestudy', $case_studies );
                ?>
            </div>
        </div>
    </aside>
    <?php
}
?>
<?php get_footer(); ?>