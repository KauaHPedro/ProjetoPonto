<?php
session_start();
checkSession();

$date = (new DateTime())->getTimestamp();
$today = strftime("%d de %B de %Y", $date);

loadTemplateView("daily_records", $params = ["user" => "Kauã", "today" => $today]);
