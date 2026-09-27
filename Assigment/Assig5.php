<?php

$number = 12345;
$reverse = 0;

while ($number > 0) {
    $digit = $number % 10;
    $reverse = ($reverse * 10) + $digit;
    $number = intdiv($number, 10);
}

echo "Reverse number: " . $reverse;

?>