<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ERROR);


require_once(dirname(__FILE__, 2) . '/src/config/config.php');
require_once(CONTROLLER_PATH . '/login.php');