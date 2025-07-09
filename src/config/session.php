<?php
function checkSession() {
    if(!isset($_SESSION["user"])) {
        header("Location: login.php");
        exit();
    }
}
