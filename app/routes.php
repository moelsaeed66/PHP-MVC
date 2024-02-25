<?php

use app\controllers\ArticleController;

$router::get('home',function ()
{
    echo 'hello';
});

$router::get('index','homeController@index');



//$router->get("articles/create","ArticleController@create");
$router->get("articles/create",[ArticleController::class,'create']);


$router->post("articles/store","ArticleController@store");

$router->get("articles","ArticleController@index");

$router->get("article","ArticleController@show");

$router->get("articles/edit","ArticleController@edit");
$router->post("articles/update","ArticleController@update");

$router->get("articles/delete","ArticleController@delete");

