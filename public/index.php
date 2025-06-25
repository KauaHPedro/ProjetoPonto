<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once(dirname(__FILE__, 2) . '/src/config/config.php');

$query = "SELECT * FROM users";
$users = Database::getResultFromQuery($query);

foreach ($users as $user) {
    echo $user['name'] . '<br>';
}

//$delete = "DELETE FROM users WHERE id IN (:id, :id2, :id3)";
//$params = [
//    ':id' => 6,
//    ':id2' => 11,
//    ':id3' => 12
//];
//
//$rows = Database::executeNonQuery($delete, $params);
//
//if ($rows > 0) {
//    echo "Success";
//    echo "<br>";
//    echo "Rows affected: " . $rows . "<br>";
//} else {
//    echo "Error";
//}