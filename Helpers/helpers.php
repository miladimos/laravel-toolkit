<?php

use Illuminate\Support\Str;

if(!function_exists("convertToEastern")) {
    function convertToEastern($string)
    {
        $eastern = ["۱", "۲", "۳", "۴", "۵", "۶", "۷", "۸", "۹", "۰"];
        $western = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '0'];
        return str_replace($western, $eastern, $string);
    }
}

if(!function_exists("convertToWestern")) {
    function convertToWestern($string)
    {
        $eastern = ["۱", "۲", "۳", "۴", "۵", "۶", "۷", "۸", "۹", "۰"];
        $western = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '0'];
        return str_replace($eastern,$western,  $string);
    }
}

if(!function_exists("createOPTCode")) {
    function createOPTCode()
    {
        return random_int(100000,999999);
    }
}

if(!function_exists("createEmailToken")) {
    function createEmailToken()
    {
        return Str::random(60);
    }
}

if(!function_exists('is_user_online')) {
    function is_user_online($user_id) {
        if(cache()->has('user-is-online-'.$user_id))
            return true;
        else
            return false;
    }
}

if(!function_exists('user')) {
    function user($guard = 'web') {
        return auth($guard)->user();
    }
}

if(!function_exists('id')) {
    function id($guard = 'web') {
        return auth($guard)->id();
    }
}

if(!function_exists('username')) {
    function username($guard = 'web') {
        return auth($guard)->user()->username;
    }
}

if(!function_exists('generateToken')) {
    function generateToken()
    {
        // This is set in the .env file
        $key = config('app.key');

        // Illuminate\Support\Str;
        if (Str::startsWith($key, 'base64:')) {
            $key = base64_decode(substr($key, 7));
        }
        return hash_hmac('sha256', Str::random(40), $key);
    }
}

if(!function_exists('decodeBase64File')) {
    function decodeBase64File( $encodedFile ) {
        // اینجا اطلاعات اضافی رو پاک میکنم تا کد اصلی رو بگیرم
        $file = str_replace(' ', '+', $encodedFile );
        $file = substr( $file, strpos( $file,';base64,' ) + 8 );
        $decodedFile = base64_decode($file);

        // با کمک توابع پی اچ پی، مشخصات فایل رو بررسی می کنم
        $fileMimeType = finfo_buffer( finfo_open() , $decodedFile , FILEINFO_MIME_TYPE );
        $fileExt = substr($fileMimeType, strpos($fileMimeType,'/')+1);

        return [
            'file' => $decodedFile, // فایل آماده برای ذخیره سازی در دیسک
            'mime'  => $fileMimeType, // نوع فایل
            'ext'   => $fileExt, // اکستنشن فایل
            'size'  => (int)strlen( $decodedFile ) // حجم فایل با واحد بایت
        ];
    }
}


