<?php

use Core\Response;

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

function isUrl($value)
{
    return $_SERVER['REQUEST_URI'] === $value;
}

function abort($code = 404)
{
    http_response_code($code);

    require base_path("views/{$code}.php");

    die();
}

function authorize($condition, $status = Response::FORBIDDEN)
{
    if (!$condition) {
        abort($status);
    }
}

function base_path($path)
{
    return BASE_PATH . $path;
}

function view($path, $attributes = [])
{
    extract($attributes);
    require base_path('/views/' . $path);
}

function redirect($path)
{
    header("location: {$path}");
}

function getAllowedTags()
{
    $tags = ['p','b','b', 'strong', 'i', 'em', 'u', 'ul', 'ol', 'li', 'a', 
            'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'br', 'blockquote', 'pre', 'table', 'tr', 'td', 'th'];
    return $tags;
}
