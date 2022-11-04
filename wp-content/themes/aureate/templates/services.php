<?php

/**
 * The Custom template for Service Page
 *
 * Template Name: Services
 *
 * @package Aureatelabs
 * @subpackage Aureatelabs
 * @since 1.0
 * @version 1.0
 */
get_header();

$mainbannerImage = wp_get_attachment_image(get_field('s1_banner_image'), 'full'); 
$heroBannerTitle = wp_kses_post(get_field('s1_title')); 
$heroBannerDescription = wp_kses_post(get_field('s1_decription')); 

if(!empty($mainbannerImage) || !empty($heroBannerTitle) || !empty($heroBannerDescription) || have_rows('s2_services') )
{  ?>
    <!-- Banner section -->
    <section class="py-40 py-md-60 pt-xl-100 pb-xl-80">
        <div class="container pt-5 mt-2 mt-md-4">
            <?php
            if(!empty($mainbannerImage) || !empty($heroBannerTitle) || !empty($heroBannerDescription))
            {   ?>
                <div class="row">
                    <div class="col-md-10">
                        <?php
                        if(!empty($mainbannerImage))
                        {
                            echo $mainbannerImage; 
                        }
                        if(!empty($heroBannerTitle))
                        {   ?>
                            <h1 class="mb-4 pb-2"><?php echo $heroBannerTitle; ?></h1>
                            <?php
                        } 
                        if(!empty($heroBannerDescription))
                        {   ?>
                            <div class="row">
                                <div class="col-md-10 pb-4 pb-lg-5 pb-xl-80 pr-xl-5">
                                    <div class="pr-md-2">
                                        <?php echo $heroBannerDescription; ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <?php
            }
            if (have_rows('s2_services')) :
                $dir_path = get_template_directory();
                $dir_url = get_template_directory_uri();
            ?>
                <div class="row row-xl-25">
                    <?php 
                        $id_c = 1; ?>
                        <?php while (have_rows('s2_services')) : ?>
                            <?php the_row(); ?>
                            <?php $listofServiceIcon = get_sub_field('s1_service_icon'); ?>
                            <?php $listofServiceTitle = wp_kses_post(get_sub_field('s2_sub_title')); ?>
                            <?php if ($listofServiceTitle) : ?>
                                <div class="col-md-6 col-xl-4">
                                    <a href="<?php echo '#section'.$id_c?>" class="services-link d-flex align-items-center" title="<?php echo $listofServiceTitle; ?>">
                                        <?php
                                        if(!empty($listofServiceIcon))
                                        {
                                            $svg_path = $dir_path.'/assets/icons/'.$listofServiceIcon.'.svg';
                                            if ( file_exists( $svg_path ) ) 
                                            {
                                                $svg = $dir_url.'/assets/icons/'.$listofServiceIcon.'.svg';
                                                if(!empty($svg))
                                                {
                                                    ?>
                                                        <div class="services-link-icon d-none d-md-inline-block">
                                                        <img src="<?php echo $svg; ?>" title="<?php echo $listofServiceTitle; ?>" alt="<?php echo $listofServiceTitle; ?>" height="30" width="30"/>
                                                    </div>
                                                    <?php
                                                }
                                            } 
                                        }
                                        ?>
                                        <h2 class="font-14 font-md-18 font-weight-normal"><?php echo $listofServiceTitle; ?></h2>
                                    </a>
                                </div>
                            <?php $id_c++; endif; ?>
                        <?php endwhile ?>              
                </div>
            <?php endif; ?>
        </div>
    </section>
    <?php
}

if (have_rows('s2_services')) :
    ?>
    <!-- Service Features List -->
    <section class="bg-dark py-xl-3">
        <div class="container my-xl-1">
            <?php
            $id_cs = 1; 
            while (have_rows('s2_services')) : 
                the_row();
                $serviceListSubTitle = wp_kses_post(get_sub_field('s2_sub_title')); 
                $serviceListTitle = wp_kses_post(get_sub_field('s2_title')); 
                $serviceListDescription = wp_kses_post(get_sub_field('s2_description'));
                if(!empty($serviceListSubTitle) || !empty($serviceListTitle) || !empty($serviceListDescription) )
                {   ?>
                    <div id="section<?php echo $id_cs; ?>" class="services-row py-40 py-lg-60 py-xl-80">
                        <div class="row">
                            <?php
                            if(!empty($serviceListSubTitle) || !empty($serviceListTitle))
                            {   ?>
                                <div class="col-md-6 pr-xl-5">
                                    <div class="mr-xl-5 pr-xl-5">
                                        <?php
                                        if(!empty($serviceListSubTitle))
                                        {   ?>
                                            <h2 data-aos="fade-up" class="section-sub-heading"><?php echo $serviceListSubTitle; ?></h2>
                                            <?php
                                        }
                                        if(!empty($serviceListTitle))
                                        {   ?>
                                            <p data-aos="fade-up" data-aos-delay="300" class="section-heading text-white mb-3"><?php echo $serviceListTitle; ?></p>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <?php
                            }

                            if(!empty($serviceListDescription))
                            {   ?>
                                <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
                                    <div class="services-bullet-list text-white"><?php echo $serviceListDescription; ?></div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                    <?php 
                    $id_cs++;
                }
            endwhile; ?>
        </div>
    </section>
    <!-- Service List -->
    <?php 
endif; ?>

<?php get_template_part("/template-parts/interesting-things-blog"); ?>

<!-- <script>
    // Smooth target js    
    document.querySelectorAll('div.container a.services-link').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            var hash_val = this.getAttribute('href');
             document.querySelector(hash_val).scrollIntoView({
                 behavior: 'smooth',
                 inline: 'start'
             });
        });
    });
</script> -->

<?php get_footer(); ?>