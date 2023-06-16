<?php

use Illuminate\Support\Facades\Auth;

if (!function_exists('auth_check')) {
    function auth_check()
    {
        if (!Auth::check()) {
            toastr()->info(__('frontend.you_must_be_logged_in'));
            return redirect()->route('login');
        }
    }
}