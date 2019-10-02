<?php

use App\Models\Currency;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\File;


if (!function_exists('currency')) {

    function currency($key = null)
    {
        $currencyFromCookie = Cookie::get('currency');
        $currency = Currency::query()->select([$currencyFromCookie, $currencyFromCookie . '_symbol'])->first()->toArray();
        if ($key)
            return round($key / $currency[$currencyFromCookie], 2) . "{$currency[$currencyFromCookie . '_symbol']}";
        else
            return 0;
    }
}

if (!function_exists('set_active')) {

    function set_active($name, $name2 = null, $name3 = null, $name4 = null)
    {
        if (
            (\Request::route()->getName() == $name) ||
            (\Request::route()->getName() == $name2) ||
            (\Request::route()->getName() == $name3) ||
            (\Request::route()->getName() == $name4)) {
            return 'active';
        }
    }

}

if (!function_exists('imageConvert')) {

    function imageConvert($url, $fileName, $extension)
    {
        if ($extension == 'png') {
            $im = imagecreatefrompng($url . $fileName);
            imagewebp($im, $url . $fileName . '.webp', 30);
            File::delete($url . $fileName);

        } else {
            $im = imagecreatefromjpeg($url . $fileName);
            imagewebp($im, $url . $fileName . '.webp', 30);
            File::delete($url . $fileName);
        }
    }

}

