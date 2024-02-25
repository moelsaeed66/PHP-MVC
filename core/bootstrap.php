<?php

use core\App;
use core\database\Connection;
use core\database\QueryBuilder;



App::bind('config',require 'config.php');

App::bind('database', new QueryBuilder(
    Connection::make(App::get('config')['database'])
));



