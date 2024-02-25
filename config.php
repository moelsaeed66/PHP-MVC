<?php



return[
  'database'=>[
      'connection'=>'mysql:host=localhost',
      'dbname'=>'test',
      'username'=>'root',
      'password'=>'',
      'options'=>
      [
          PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION
      ]
  ]
];


