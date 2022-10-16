<?php

if (!function_exists('database_formatted_date')) {
    function database_formatted_date($value = null) {

        return date('Y-m-d', strtotime($value));
    }
}

if (!function_exists('database_formatted_datetime')) {
    function database_formatted_datetime($date = null)
    {
        return $date ? date('Y-m-d H:i:s', strtotime($date)) : date('Y-m-d H:i:s');
    }
}

if (!function_exists('database_formatted_time')) {
    function database_formatted_time($date = null)
    {
        return $date ? date('H:i:s', strtotime($date)) : date('H:i:s');
    }
}


if (!function_exists('user_formatted_datetime')) {
    function user_formatted_datetime($date = null)
    {
        return $date ? date('d M, y  h:i A', strtotime($date)) : date('d M, y  h:i A');
    }
}


if (!function_exists('user_formatted_time')) {
    function user_formatted_time($date = null)
    {
        return $date ? date('h:i A', strtotime($date)) : date('h:i A');
    }
}

if (!function_exists('database_formatted_date')) {
    function database_formatted_date($value = null) {

        return date('Y-m-d', strtotime($value));
    }
}

if (!function_exists('user_formatted_date')) {
    function user_formatted_date($value = null) {

        return date('d-M, Y', strtotime($value));
    }
}

if (!function_exists('datepicker_formatted_date')) {
    function datepicker_formatted_date($value = null) {
        if (!$value) {
            return '';
        }

        return date('d-m-Y', strtotime($value));
    }
}
