# kazakevic-contact-us

## Simple Laravel contact us form 📧

![IMAGE ALT TEXT HERE](https://raw.githubusercontent.com/kazakevic/contact-us/master/depot/ss.png)

 
 #### Installation:
 * composer require kazakevic/contact-us
 * php artisan vendor:publish --tag=public --force
 * php artisan vendor:publish --tag=contact-us
 * add to you app styles and scripts:
 ``` 
    <script src="{{ asset('js/contactUs.js') }}" defer></script>
    <link href="{{ asset('css/contactUs.css') }}" rel="stylesheet">
 ```
* add Vue component where you need form
```
<contact-us></contact-us>
```
* Set email where you want to receive mails from form in:
``` MAIL_FROM_ADDRESS='info@test.lt' ```

You can override route ``contact-us`` if want to customize logic
