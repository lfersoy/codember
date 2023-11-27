<?php

function getSpecificInvalidKey($invalidKeysUrl, $number) {
  $invalidKeys = file($invalidKeysUrl, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
  $filteredArray = array_filter($invalidKeys, function($key) {
    list($counters, $word, $string) = explode(" ", $key);
    list($least, $most) = explode("-", $counters);
    $word = substr($word, 0, -1);
    $letterCount = substr_count($string, $word);
    return !($letterCount >= $least && $letterCount <= $most);
  });
  $filteredArray = array_values($filteredArray);
  return isset($filteredArray[--$number]) ? explode(" ", $filteredArray[$number])[2] : "It doesn't exist.";
}

$url = "https://codember.dev/data/encryption_policies.txt";
$number = 42;
echo getSpecificInvalidKey($url, $number);