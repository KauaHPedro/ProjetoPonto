<?php
session_start();
checkSession();
loadTemplateView("daily_records", $params = ["user" => "Kauã"]);
