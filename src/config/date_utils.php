<?php

function getDateAsDateTime($date) {
    return is_string($date) ? new DateTime($date) : $date;
}

function isWeekend($date) {
    $inputDate = getDateAsDateTime($date);
    return $inputDate->format('N') >= 6;
}

function isBefore($date, $date2) {
    $inputDate = getDateAsDateTime($date);
    $inputDate2 = getDateAsDateTime($date2);

    return $inputDate <= $inputDate2;

}

function getNextDay($date) {
    $inputDate = getDateAsDateTime($date);
    $inputDate->modify('+1 day');
    return $inputDate;
}
