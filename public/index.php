<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once(dirname(__FILE__, 2) . '/src/config/config.php');
require_once(dirname(__FILE__, 2) . '/src/models/User.php');

//$user = new User(["name" => "Kauã", "idade" => 19]);
//
//$result = User::getResultFromSelect([], "name, email, is_admin");
//print_r($result);

