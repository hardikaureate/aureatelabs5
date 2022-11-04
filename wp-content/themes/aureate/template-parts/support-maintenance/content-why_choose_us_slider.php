<?php
if (!empty($args)) :
    $background_color = isset($args['s2_sm_select_background_color']) ? $args['s2_sm_select_background_color'] : '';
    $subTitle = isset($args['s2_sm_why_choose_sub_title']) ? $args['s2_sm_why_choose_sub_title'] : '';
    $title = isset($args['s2_sm_why_choose_title']) ? $args['s2_sm_why_choose_title'] : '';
    $Desc = isset($args['s2_sm_why_choose_description']) ? $args['s2_sm_why_choose_description'] : '';
    $chooseSlider = isset($args['s2_sm_why_choose_us_slider']) ? $args['s2_sm_why_choose_us_slider'] : array();

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
    <!-- Why Choose Us Section -->
    <section class="py-40 py-md-60 py-xl-100 why-chooseus-section <?php echo $backColor; ?>">
        <div class="container">

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
                    <div class="link-description pb-20 pb-md-40" data-aos="fade-up">
                        <?php echo $Desc; ?>
                    </div>
                <?php } ?>
            <?php } ?>
            <?php if (!empty($chooseSlider)) { ?>
                <div class="why-choose-us-row square-platform-row row flex-md-wrap carousel-slider-wrapper">
                    <div class="slider-scroller-wrap">
                        <div class="slider-scroller" id="gallery">
                            <!-- mask -->
                            <div class="slider-scroller-inner" id="wrapper">
                                <?php
                                 $dir_path = get_template_directory();
                                 $dir_url = get_template_directory_uri();
                                 $iconPlaceHolderImage = wp_get_attachment_image(get_field('theme_placeholder_image', 'option'), array(100, 70));
                                foreach ($chooseSlider as $key => $sliderData) {
                                    $size = 'full';
                                    $iconImage = isset($sliderData['s2_sm_why_choose_icon']) ? $sliderData['s2_sm_why_choose_icon'] : '';
                                    $titles = isset($sliderData['s2_sm_why_choose_title']) ? $sliderData['s2_sm_why_choose_title'] : '';
                                    $desc = isset($sliderData['s2_sm_why_choose_slider_content']) ? $sliderData['s2_sm_why_choose_slider_content'] : '';

                                    $placeHolderImage = wp_get_attachment_image(get_field('theme_placeholder_image', 'option'), array(62, 62)); ?>
                                    <div class="col-md-4 slider-col item" data-aos="fade-up">
                                        <div class="square-platform-box p-4 h-100 bg-white">
                                            <div class="square-platform-box-wrap p-md-1">
                                                <div class="clear">
                                                    <?php if (!empty($iconImage) || !empty($titles) || !empty($desc) || !empty($tagLine)) { ?>
                                                        <?php
                                                        if(!empty($iconImage))
                                                        {
                                                            $svg_path = $dir_path.'/assets/icons/'.$iconImage.'.svg';
                                                            if ( file_exists( $svg_path ) ) 
                                                            {
                                                                $svg = $dir_url.'/assets/icons/'.$iconImage.'.svg';
                                                                if(!empty($svg))
                                                                {   ?>
                                                                    <div class="square-platform-box-icon mb-3 mb-md-4 pb-md-2 line-height-0 text-left">
                                                                        <img src="<?php echo $svg; ?>" title="<?php echo $titles; ?>" alt="<?php echo $titles; ?>" width="60" height="60" loading="lazy"/>   
                                                                    </div>                                            
                                                                    <?php
                                                                }
                                                            }
                                                            else
                                                            {   ?>
                                                                <div class="square-platform-box-icon mb-3 mb-md-4 pb-md-2 line-height-0 text-left">
                                                                <?php echo $iconPlaceHolderImage; ?>
                                                                </div>   
                                                                <?php
                                                            }
                                                        }
                                                        else
                                                        {   ?>
                                                            <div class="square-platform-box-icon mb-3 mb-md-4 pb-md-2 line-height-0 text-left">
                                                            <?php echo $iconPlaceHolderImage; ?>
                                                            </div>   
                                                            <?php
                                                        } 
                                                        ?>
                                                        <?php if (!empty($titles)) { ?>
                                                            <h3 class="font-16 font-md-18 font-weight-medium text-primary mb-2 pb-md-1 text-left">
                                                                <?php echo $titles; ?>
                                                            </h3>
                                                        <?php } ?>
    
                                                        <?php if (!empty($desc)) { ?>
                                                            <p class="link-description font-14 text-body text-left">
                                                                <?php echo $desc; ?>
                                                            </p>
                                                        <?php } ?>
    
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slider-nav-btn-wrap text-center mt-4 pt-3 d-flex justify-content-center">
                    <button class="prev mr-2 d-flex justify-content-center align-items-center prev" type="button" id="prev" aria-label="Previous" disabled>
                        <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7 13L1 7L7 1" stroke="#C4C4C4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                    <button class="next ml-2 next" type="button" id="next" aria-label="Next">
                        <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 13L7 7L1 1" stroke="#C4C4C4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>
            <?php } ?>

        </div>
    </section>
<?php endif; ?>

<script>
    window.addEventListener('DOMContentLoaded', (event) => {
var items = document.querySelectorAll("#gallery .slider-scroller-inner .item"),
    len = items.length;
 
    if (len > 3) {

        let box = document.querySelector('.slider-col');
        let width = box.offsetWidth;
        //console.log(width);
    //Select the buttons 
    const prev = document.querySelector('.prev');
    const next = document.querySelector('.next');

    //Set counter for setting distance for cards to move on each click
    let count = 0;

    //Set tracker to keep track of where the controls and cards are in relation to the card container
    let tracker = 0;

    //Action for Next button
    function moveCardsLeft() {
        //'Count' controls the distnace for each card push and can be adjusted by changing the integer subtracted from the variable below.
        //The tracker keeps track of the index while the next and prev buttons are being clicked.
        count = count - width;
        tracker++;
        //console.log("tracker:"+tracker);
        //console.log("tracker:"+(len-1));
        //Disables buttons after cards reach a specified distance. Number of clicks can be adjusted by changing the integers in the if statements. ie. changing the '0' to '-1' allows the user to click back one additional time before disabling the 'prev' button.
        if (tracker === 0) {
            prev.setAttribute('disabled', '');
        } else {
            prev.removeAttribute('disabled');
        }
        if (tracker === (len-3)) {
            next.setAttribute('disabled', '');
        } else {
            next.removeAttribute('disabled');
        }

        //Pushes cards based on 'count'. 
        const cards = document.querySelectorAll('.slider-col');
        cards.forEach(function (el, i, arr) {
            el.style.transform = `translateX(${count}px)`;
        });
    }

    //Action for Prev button
    function moveCardsRight() {
        count = count + width;
        tracker --;
        if (tracker <= 0) {
            prev.setAttribute('disabled', '');
        } else {
            prev.removeAttribute('disabled');
        }
        if (tracker === (len-3)) {
            next.setAttribute('disabled', '');
        } else {
            next.removeAttribute('disabled');
        }
        const cards = document.querySelectorAll('.slider-col');
        cards.forEach(function (el, i, arr) {
            el.style.transform = `translateX(${count}px)`;
        });
    }

    //Event listeners to slide the cards.
    prev.addEventListener('click', () => {
        moveCardsRight();
    });

    next.addEventListener('click', () => {
        moveCardsLeft();
    });

} else {
        document.getElementsByClassName('slider-nav-btn-wrap')[0].style.display = 'none';
    }
});
   
</script>