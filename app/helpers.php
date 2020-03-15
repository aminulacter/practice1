<?php

    
function numberToText($num)
{
    $numText = ["one" , "two", "three", "four", "five", "six", "seven", "eight", "nine", "ten", "eleven", "twelve", "thirteen","fourteen", "fifteen"];
    return $numText[$num - 1];
}

function licenseType($license)
{
    $licensetype = [
        "regularlicense" => "Regular License",
         "extendlicense" => "Extended License",
         "SingleSiteLicense" => "Single Site License",
         "2SiteLicense" => "2 Site License",
         "MultipleLicense" => "Multiple License"];
    return $licensetype[$license] ?? $license;
}
