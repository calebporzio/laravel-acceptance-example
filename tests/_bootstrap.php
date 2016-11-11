<?php
// This is global bootstrap for autoloading

require 'bootstrap/autoload.php';  
$app = require 'bootstrap/app.php';
$app->instance('request', new \Illuminate\Http\Request);
$app->make('Illuminate\Contracts\Http\Kernel')->bootstrap();
config(['database.default' => 'mysql_testing']);
