<?php

/**
 * Kinyarwanda Default Language Bootstrap
 * 
 * This file ensures Kinyarwanda (rw) is set as the default language
 * for the entire application on each request.
 * 
 * Include this in your bootstrap process or middleware.
 */

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

// Set Kinyarwanda as default application locale
if (!App::getLocale()) {
    App::setLocale('rw');
}

// Initialize session locale to Kinyarwanda if not already set
if (!Session::has('locale')) {
    Session::put('locale', 'rw');
}
