<?php

use Illuminate\Support\Facades\Route;

Route::post('contact-us', 'Kazakevic\\ContactUs\\Http\\Controllers\\ContactUsController@send');
