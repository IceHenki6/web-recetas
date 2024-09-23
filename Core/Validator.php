<?php

namespace Core;

class Validator
{
    public static function string ($value, $min=1, $max=INF)
    {
        $value = trim($value);
        return strlen($value) >= $min && strlen($value) <= $max;
    }

    public static function email ($value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    public static function tags($value, $max)
    {
        return count($value) <= $max;
    }

    public static function image($img)
    {
        return isset($img) && $img['error'] === 0 && getimagesize($img['tmp_name']);
    }

    public static function imageSize($img)
    {
        return $img['size'] < 2000000;
    }

    public static function imageType($img)
    {
        $fileExt = explode('.', $img['name']);
        $fileExt = strtolower(end($fileExt));

        $allowed_types = array('jpg', 'jpeg', 'png');

        return in_array($fileExt, $allowed_types);
    }
}