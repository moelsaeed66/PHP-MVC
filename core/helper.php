<?php

use core\View;

if(!function_exists('directory_separator'))
{
    function directory_separator()
    {
        return DIRECTORY_SEPARATOR;
    }
}
if(!function_exists('base_path'))
{
    function base_path()
    {
        return dirname(__DIR__).directory_separator();
    }
}
if(!function_exists('view_path'))
{
    function view_path()
    {
        return base_path().'app'.directory_separator().'views'.directory_separator();
    }
}
if(!function_exists('view'))
{
    function view($view,$params=[])
    {
        View::view($view,$params);
    }
}
