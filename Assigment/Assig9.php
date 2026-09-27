<?php

$number = 17;
$isPrime = true;

if ($number <= 1) {
    $isPrime = false;
} else {

    for ($i = 2; $i < $number; $i++) {

        if ($number % $i == 0) {
            $isPrime = false;
            break;
        }
    }
}

if ($isPrime) {
    echo $number . " is a prime number.";
} else {
    echo $number . " is a non-prime number.";
}

?>