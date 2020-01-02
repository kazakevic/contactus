# kazakevic-contact-us

## Simple Laravel contact us form 📧

![IMAGE ALT TEXT HERE](https://raw.githubusercontent.com/kazakevic/contactus/master/depot/ss.png)

 
 #### Installation:
 * composer require kazakevic/contact-us
 * php artisan vendor:publish --tag=contact-us
 * add component to the your app.js 
```
import contactUs from "./components/kazakevic/contactus/contactUs.vue";
Vue.component('contact-us', contactUs);
```
* Run build `npm run dev or npm run prod`

* add Vue component where you need form
```
<contact-us></contact-us>
```
* Set email where you want to receive mails from form in:
``` MAIL_FROM_ADDRESS='info@test.lt' ```

You can override route ``contact-us`` if want to customize logic
