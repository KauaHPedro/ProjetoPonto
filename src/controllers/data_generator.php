<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

loadModel("WorkingHours");
database::executeNonQuery("DELETE FROM working_hours");

function getDayTemplateByOdds($regularRate, $extraRate, $lazyRate) {

    $regularDayTemplate = [
        "time1" => '08:00:00',
        "time2" => '12:00:00',
        "time3" => '13:00:00',
        "time4" => '17:00:00',
        "worked_time" => DAILY_TIME
    ];

    $extraHourDayTemplate = [
        "time1" => '08:00:00',
        "time2" => '12:00:00',
        "time3" => '13:00:00',
        "time4" => '18:00:00',
        "worked_time" => DAILY_TIME + 3600
    ];

    $lazyDayTemplate = [
        "time1" => '08:30:00',
        "time2" => '12:00:00',
        "time3" => '13:00:00',
        "time4" => '17:00:00',
        "worked_time" => DAILY_TIME - 1800
    ];

    $value = rand(0, 100);

    if ($value <= $regularRate) {
        return $regularDayTemplate;
    } else if ($value <= $regularRate + $extraRate) {
        return $extraHourDayTemplate;
    } else {
        return $lazyDayTemplate;
    }

}

function populateWorkingHours($userId, $initialDate, $regularRate, $extraRate, $lazyRate) {
    $currentDate = $initialDate;
    $today = new DateTime();
    $columns = ["user_id" => $userId, "work_date" => $currentDate];

    while(IsBefore($currentDate, $today)) {
        if(!isWeekend($currentDate)) {
            $template = getDayTemplateByOdds($regularRate, $extraRate, $lazyRate);
            $columns = array_merge($columns, $template);
            $workingHours = new WorkingHours($columns);
            $workingHours->save();
        }
        $currentDate = getNextDay($currentDate)->format('Y-m-d');
        $columns["work_date"] = $currentDate;
    }
}

populateWorkingHours(1, date("Y-m-1"), 70, 20, 10);

echo "Deu certo!";