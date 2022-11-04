<?php
get_header();
?>
<?php $careerOptions = get_field('career_options');
if (!empty($careerOptions)) :
?>
    <section>
        <div class="container">
            <?php
            $pos_title = get_the_title();
            $yearsOfExperience = isset($careerOptions['required_years_of_exp']) ? $careerOptions['required_years_of_exp'] : '';
            $jobLocation = isset($careerOptions['location']) ? $careerOptions['location'] : '';
            ?>
            <div class="career-page-banner text-md-center">
                <div class="d-md-flex justify-content-center">
                    <?php if (!empty($jobLocation)) : ?>
                        <p class="career-experience mb-2 mb-md-0 font-md-20 text-body"><?php echo $yearsOfExperience; ?></p>
                        <p class="career-job-location mb-0 ml-md-5 font-md-20 text-body">
                            <?php echo $jobLocation; ?>
                        </p>
                    <?php endif; ?>
                </div>
                <h1 class="mt-3 mt-md-3"><?php echo $pos_title; ?></h1>
                <div class="mt-3 pt-3 mt-md-5 pt-md-5">
                    <?php
                    $ctaButtonLinkText =  get_field('cta_button');
                    if (!empty($ctaButtonLinkText)) : ?>
                        <a href="#applynowform" class="btn font-14 font-md-18">
                            <span> <?php echo $ctaButtonLinkText; ?></span>
                        </a>

                    <?php
                    endif; ?>
                </div>
            </div>
        </div>
    </section>
    <section class="career-detail-desc bg-light pt-4 pb-5 ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <?php
                    $jobDescription = wp_kses_post(get_field('job_description'));
                    ?>
                    <?php if (!empty($jobDescription)) : ?>
                        <?php echo $jobDescription; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <?php 
    $schema_options = get_field('schema_options', 'option'); 
    $logo_url = $telephone_number = $telephone_number_2 =  $sameAs ='';
    if(!empty($schema_options))
    {
        $schema_site_logo = isset($schema_options['schema_site_logo']) ? $schema_options['schema_site_logo'] : array();
        if(!empty($schema_site_logo))
        {
            $logo_url = isset($schema_site_logo['url']) ? $schema_site_logo['url'] : '';
        }
        $elephone_number = isset($schema_options['schema_telephone_number']) ? $schema_options['schema_telephone_number'] : '';
        $telephone_number_2 = isset($schema_options['schema_telephone_number_2']) ? $schema_options['schema_telephone_number_2'] : '';
        $schema_social_media_links = isset($schema_options['schema_social_media_links']) ? $schema_options['schema_social_media_links'] : array();
        if(!empty($schema_social_media_links))
        {
            $schema_social_media_link = array_column($schema_social_media_links, 'schema_social_media_link');
            $sameAs = '"' . implode('","',$schema_social_media_link) . '"';
        }
    }
    
    $MinSalary = $MaxSalary  = $job_valid_through ='';
    $job_show_salary = false;
    $job_availablity = 'full-time';
    $job_detail = get_field('job_detail' , get_the_ID());
    if(!empty( $job_detail))
    {
        $job_show_salary = isset($job_detail['job_show_salary']) ? $job_detail['job_show_salary'] : false;
        $job_availablity = isset($job_detail['job_availablity']) ? $job_detail['job_availablity'] : 'full-time';
        $MinSalary = isset($job_detail['job_min_salary']) ? $job_detail['job_min_salary'] : '';
        $MaxSalary = isset($job_detail['job_max_salary']) ? $job_detail['job_max_salary'] : '';
        $job_valid_through = isset($job_detail['job_valid_through']) ? $job_detail['job_valid_through'] : '';
    }
    
    if(!empty($MinSalary) ){
        $MinSalary = str_replace(',', '', $MinSalary);
    }else{
        $MinSalary = '' ;
    }

    if(!empty($MaxSalary) ){
        $MaxSalary = str_replace(',', '', $MaxSalary);
    }else{
        $MaxSalary = '' ;
	}
    ?>
        <script type="application/ld+json"> 
        {
            "@context" : "https://schema.org/",
            "@type" : "JobPosting",
            "datePosted" : "<?php echo get_the_date("Y-m-d"); ?>",
            "validThrough" : "<?php echo $job_valid_through; ?>",
            "title" : "<?php echo __(the_title())?>",
            "description" : "<?php echo get_post_meta(get_the_ID(), '_yoast_wpseo_metadesc', true);  ?>",
            "employmentType" : "<?php echo $job_availablity; ?>",
            "applicantLocationRequirements": {
						"@type": "Country",
						"name": "IN"
					},
            "hiringOrganization" : 
            {
                "@type" : "Organization",
                "name" : "Aureate Labs",
                "sameAs" : "<?php echo get_site_url(); ?>",
                "logo" : "<?php echo $logo_url; ?>/wp-content/uploads/Aureate-Labs-Logo.svg"
            },
            "jobLocation": 
            {
                "@type": "Place",
                "address": 
                {
                    "@type": "PostalAddress",
                    "streetAddress": "B-206, International Commerce Center, Ring Road,",
                    "addressLocality": "Surat",
                    "addressRegion": "GJ",
                    "postalCode": "395002",
                    "addressCountry": "IN"
                }
            }
            <?php 
            if($job_show_salary) :
            ?>
                ,"baseSalary": {
                    "@type": "MonetaryAmount",
                    "currency": "INR",
                    "value": {
                        "@type": "QuantitativeValue",
                        "minValue": "<?php echo $MinSalary; ?>",
                        "maxValue": "<?php echo $MaxSalary; ?>",
                        "unitText": "MONTH"
                    }
                }
            <?php endif; ?>
        }
        </script>		
<?php
endif;
?>

<!-- Apply for this Position -->
<section class="py-40 py-md-60 py-xl-100" id="applynowform">
    <?php $applySubTitle = wp_kses_post(get_field('apply_position_sub_title', 'option')); ?>
    <?php $applyTitle = wp_kses_post(get_field('apply_position_title', 'option')); ?>
    <?php $applyDescription = wp_kses_post(get_field('apply_position_description', 'option')); ?>
    <?php $applyEmailLabel = wp_kses_post(get_field('apply_position_email_lable', 'option')); ?>
    <?php $applyEmailAddress = wp_kses_post(get_field('apply_position_email_address', 'option')); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <span class="section-sub-heading"><?php echo $applySubTitle; ?></span>
                <h2 class="section-heading"><?php echo $applyTitle; ?></h2>
                <p class="text-body mb-4"><?php echo $applyDescription; ?></p>
                <?php 
                if(!empty($applyEmailAddress)) :
                    //$encoded_EmailAddress = al_encode_email_address( $applyEmailAddress );
					 $encoded_EmailAddress = al_eae_encode_str( $applyEmailAddress );
					 $encoded_mailto_EmailAddress = al_eae_encode_str('mailto:'.$applyEmailAddress ); 
                ?>
                <div class="mb-3 mb-md-0 pb-4 pb-md-0">
                    <span class="text-body">Email:</span> 
                    <a href="<?php echo $encoded_mailto_EmailAddress; ?>">
                        <?php echo $encoded_EmailAddress; ?>
                    </a>
                </div>
                <?php endif; ?>
            </div>
            <div class="col-md-6">
                <div class="career-postion-form pl-xl-5">
                    <div class="contact-form px-md-3 py-md-4 p-lg-4">
                        <div class="px-md-1 p-lg-3">
                            <?php $contact_form = get_field('job_apply_form', 'option'); ?>
                            <?php if (!empty($contact_form)) : ?>
                                <?php
                                $title = get_the_title($contact_form);
                                echo do_shortcode('[contact-form-7 id="' . $contact_form . '" title="' . $title . '"]');
                                ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
$alljobs_link = $alljobs_title = '';
$view_all_jobs_section = get_field('view_all_job_positon', 'option');
if (!empty($view_all_jobs_section)) {
    $view_all_jobs = isset($view_all_jobs_section['view_all_jobs']) ? $view_all_jobs_section['view_all_jobs'] : '';
    if (!empty($view_all_jobs)) {
        $alljobs_link = isset($view_all_jobs['url']) ? $view_all_jobs['url'] : '';
        $alljobs_title = isset($view_all_jobs['title']) ? $view_all_jobs['title'] : '';
        $alljobs_target = !empty($view_all_jobs['target']) ? 'target="_blank"' : '';
    }
}
$next_post = get_adjacent_post(false, '', false);
$previous_post = get_adjacent_post(false, '', true);
?>
<div class="bg-light py-4 py-md-5">
    <div class="container py-md-2">
        <div class="row">
            <div class="col-4 col-md-4 text-left">
                <?php
                if (!empty($next_post)) {
                    $next_post_url = get_the_permalink($next_post);
                    $next_post_title = get_the_title($next_post);
                ?>
                    <a href="<?php echo $next_post_url; ?>">
                        <span class="d-block pb-3 line-height-0">
                            <img src="<?php echo get_template_directory_uri() . '/assets/images/short-left-arrow.svg'; ?>" alt="Previous Jobs" title="Previous Jobs" class="vuestorefront-previous-arrow">
                        </span>
                        <span class="font-12 font-md-20 d-none d-md-block">
                            <?php echo $next_post_title; ?>
                        </span>
                        <span class="font-12 font-md-20 d-block d-md-none">
                            Previous
                        </span>
                    </a>
                <?php
                }
                ?>
            </div>
            <div class="col-4 col-md-4 text-center">
                <?php
                if (!empty($alljobs_link) && !empty($alljobs_title)) {   ?>
                    <a href="<?php echo esc_url($alljobs_link); ?>" <?php echo $alljobs_target; ?>>

                        <span class="d-block pb-3 line-height-0">
                            <img src="<?php echo get_template_directory_uri() . '/assets/images/four-square.svg'; ?>" alt="<?php echo $alljobs_title; ?>" title="<?php echo $alljobs_title; ?>" class="vuestorefront-view-all">
                        </span>
                        <span class="font-12 font-md-20 d-none d-md-block">
                            <?php echo $alljobs_title; ?>
                        </span>
                        <span class="font-12 font-md-20 d-block d-md-none">
                            <?php echo $alljobs_title; ?>
                        </span>
                    </a>
                <?php
                }
                ?>
            </div>
            <div class="col-4 col-md-4 text-right">
                <?php
                if (!empty($previous_post)) {
                    $previous_post_url = get_the_permalink($previous_post);
                    $previous_post_title = get_the_title($previous_post);
                ?>
                    <a href="<?php echo $previous_post_url; ?>">
                        <span class="d-block pb-3 line-height-0">
                            <img src="<?php echo get_template_directory_uri() . '/assets/images/short-right-arrow.svg'; ?>" alt="Next Jobs" title="Next Jobs" class="vuestorefront-next-arrow">
                        </span>
                        <span class="font-12 font-md-20 d-none d-md-block">
                            <?php echo $previous_post_title; ?>
                        </span>
                        <span class="font-12 font-md-20 d-block d-md-none">
                            Next
                        </span>
                    </a>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
<!-- Thank You Popup -->
<?php get_template_part("/template-parts/thankyou-popup"); ?>

<script>
    // Smooth target js    
    document.querySelectorAll('div.container a.services-link').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).parentElement.scrollIntoView({
                behavior: 'smooth',
                inline: 'start'
            });
        });
    });
</script>

<?php get_footer(); ?>