<?php
namespace app\controllers;


class homeController
{
    public function index()
    {
        view('index',['name'=>'mohamed']);
    }

}