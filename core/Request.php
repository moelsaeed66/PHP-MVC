<?php

namespace core;

class Request
{
    public static function method()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public static function url()
    {
        $url=parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
        return trim($url,'/');

    }
}