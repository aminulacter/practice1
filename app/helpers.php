<?php

    
function numberToText($num)
{
    $numText = ["one" , "two", "three", "four", "five", "six", "seven", "eight", "nine", "ten", "eleven", "twelve", "thirteen","fourteen", "fifteen"];
    return $numText[$num - 1];
}
