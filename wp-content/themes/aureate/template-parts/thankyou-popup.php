<!-- Thank You Popup -->
<div class="thank-you-popup px-4">
    <div class="thank-you-popup-inner bg-white py-40 py-lg-60 rounded-8">
        <span class="close-popup">
            <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M17.3077 0L18.75 1.44231L10.8161 9.375L18.75 17.3077L17.3077 18.75L9.375 10.8161L1.44231 18.75L0 17.3077L7.93393 9.375L0 1.44231L1.44231 0L9.375 7.93393L17.3077 0Z" fill="#212B35"/>
            </svg>
        </span>
        <div class="container text-center">
            <?php $ThankYouPageImage = wp_get_attachment_image(get_field('TY_thank_you_image', 'option'), 'full'); ?>
            <?php $ThankYouPageTitle = wp_kses_post(get_field('TY_title', 'option')); ?>
            <?php $ThankYouPageDescription = wp_kses_post(get_field('TY_description', 'option')); ?>
            <div class="mb-4"><?php echo $ThankYouPageImage; ?></div>
            <h2 class="font-heading text-primary font-30 font-md-40 font-weight-normal mb-2"><?php echo $ThankYouPageTitle; ?></h2>
            <div class="row justify-content-center">
                <div class="col-md-9">
                    <p><?php echo $ThankYouPageDescription; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const closePopup = document.querySelector('.close-popup');
    const thankYouPopup = document.querySelector('.thank-you-popup');
    closePopup.addEventListener('click', (event) => {
        if(thankYouPopup.classList.contains("active")){
            thankYouPopup.classList.remove("active");
            document.querySelector('body').classList.remove('popup-active');
		} 
    });
</script>