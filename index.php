<?php

use core\Request;
use core\Route;
require 'core/helper.php';
require 'vendor/autoload.php';
require 'core/bootstrap.php';


//dump(view_path());



Route::load('app/routes.php')->direct(Request::url(),Request::method());

