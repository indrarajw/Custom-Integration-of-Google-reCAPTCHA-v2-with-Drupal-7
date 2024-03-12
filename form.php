<?php
$reCAPTCHA_site_key =  variable_get('reCAPTCHA_site_key', '');
?>
<html>

<head>
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'> </script>
  <script src='https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js'> </script>
  <script src='https://www.google.com/recaptcha/api.js'></script>
</head>

<body>
  <form id='captcha_form' name='captcha_form' method='POST' action='form/submit-form'>
    <inputname='first_name' id='first_name' type='text'>
      <label for='first_name'>First Name *</label>
      <input id='last_name' type='text' name='last_name'>
      <label for='last_name'>Last Name *</label>
      <div class='g-recaptcha' data-sitekey='<?php echo $reCAPTCHA_site_key; ?>'></div>
      <br />
      <span class='recaptcha-message'></span>
      <button id='captcha_submit' type='submit' value='Submit' name='submit'>Submit</button>
  </form>
</body>
<script>
  $('#captcha_submit').validate({
    rules: {
      first_name: 'required',
      last_name: 'required'
    },
    messages: {
      first_name: 'Please enter the first name',
      last_name: 'Please enter the last name'
    },
    submitHandler: function(form) {
      if (grecaptcha.getResponse() == '') {
        $('.g-recaptcha').css('border', 'solid 1px red');
        $('.recaptcha-message').html('Please verify captcha');
        setTimeout(function() {
          $('.g-recaptcha').css('border', 'none');
          $('.recaptcha-message').html('');
        }, 5000);
        return false;
      }
      return true;
    }
  });
</script>

</html>