<?php

echo "Prime numbers from 10 to 50:<br>";

for ($number = 10; $number <= 50; $number++) {

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
        echo $number . " ";
    }
}

?>