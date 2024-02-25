<?php

namespace app\controllers;

use core\App;
use core\View;

class ArticleController
{
    public function create()
    {
        view('articles/create');
    }
    public function store()
    {
        App::get('database')->insert('articles',
        [
            'name'=>$_POST['name'],
            'body'=>$_POST['body']
        ]);
        header('refresh:1;/articles/create');
    }
    public function index()
    {
        $articles=App::get('database')->selectAll('articles');

        view('articles/index',compact('articles'));
    }
    public function show()
    {
        $articles=App::get('database')->select('articles',$_GET['id']);
        view('articles/show',compact('articles'));
    }
    public function edit()
    {
        $articles=App::get('database')->select('articles',$_GET['id']);
        view('articles/edit',compact('articles'));
    }
    public function update()
    {
        App::get('database')->update('articles','name=?,body=?','id=?',[
            $_POST['name'],
            $_POST['body'],
            $_POST['id']


        ]);
        header('location:/articles');

    }

    public function delete()
    {
        App::get('database')->delete('articles',$_GET['id']);
        header('location:/articles');

    }


}