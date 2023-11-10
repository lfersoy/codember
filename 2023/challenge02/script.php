<?php

function decodeMessage($message) {
  
  $numericValue = 0;
  $decodedMessage = "";

  foreach (str_split($message) as $char) {
    switch ($char) {
      case '#': $numericValue++; break;
      case '@': $numericValue--; break;
      case '*': $numericValue *= $numericValue; break;
      case '&': $decodedMessage .= $numericValue; break;
    }
  }

  return $decodedMessage ?? "";
}

$message = "&###@&*&###@@##@##&######@@#####@#@#@#@##@@@@@@@@@@@@@@@*&&@@@@@@@@@####@@@@@@@@@#########&#&##@@##@@##@@##@@##@@##@@##@@##@@##@@##@@##@@##@@##@@##@@##@@&";

echo decodeMessage($message);