<?php

namespace core;

class Route
{
    public Request $request;
    public static $routes=[
        'get'=>[],
        'post'=>[]
    ];
    public function __construct()
    {
        $this->request=new Request();
    }

    public static function get($url,$controller)
    {
        static::$routes['get'][$url]=$controller;
    }
    public static function post($url,$controller)
    {
        static::$routes['post'][$url]=$controller;
    }

    public static function load($file)
    {
        $router=new static();
        include $file;
        return $router;
    }

    public function direct()
    {
        $url=$this->request::url();
        $request_type=$this->request::method();
        $action=self::$routes[$request_type][$url]??false;
        if(!array_key_exists($url,self::$routes[$request_type]))
        {
            View::viewError('404');
        }
        if(is_callable($action))
        {
            call_user_func_array($action,[]);
        }
        if(is_array($action))
        {
            call_user_func_array([new $action[0],$action[1]],[]);
        }
        if(is_string($action))
        {
            $action=explode('@',$action);
            $controller='app\controllers\\'.$action[0];
            $controller=new $controller;
            call_user_func_array([$controller,$action[1]],[]);
        }

    }


}