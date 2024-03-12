<?php
if (!empty($_POST)) {
    $captcha = google_recaptcha_validation('SampleCaptchaForm', $_POST);
    if ($captcha) {
        //Form submission logic goes here
        echo 'Captcha success</br>';
        print_r($_POST);
    } else {
        //do something as failing action here
        echo 'Captcha faild';
    }
}
    
