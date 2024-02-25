<?php

namespace core;

class View
{
    public static function view($view,$params=[])
    {
        extract($params);
        require "app/views/$view.php";
    }

    public static function viewError($view,$params=[])
    {
        extract($params);
        require view_path()."errors/$view.php";
    }

    public static function getBaseContent()
    {
        ob_start();
        require view_path().'layouts/main.php';
        return ob_get_clean();
    }

    public static function getViewContent($view,$isError=false,$params=[])
    {
        $path=$isError?view_path().'errors/':view_path();
        if(str_contains($view,'.'))
        {
            $views=explode('.',$view);
            foreach ($views as $view)
            {
                if(is_dir($path.$view))
                {
                    $path=$path.$view.'/';
                }
                $view=$path.end($views).'.php';
            }
        }else
        {
            $view=$path.$view.'.php';
        }
        foreach ($params as $key=>$value)
        {
            $$key=$value;
        }
        if($isError)
        {
            include $view;
        }else
        {
            ob_start();
            include $view;
            return ob_get_clean();
        }
    }

}