<?php
function debug_array($arr)
{
    echo "<pre>";
    print_r($arr);
    echo "</pre>";
}

// function clear xss
function clear_xss($var)
{
    return trim(htmlspecialchars($var));
}

// function for clear array value
function clear_xss_array($arrs)
{
    $assAR = [];
    foreach ($arrs as $arr) {
        $assAR[] = trim(htmlspecialchars($arr));
    }
}
