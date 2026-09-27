<?php

$a = 8;
$b = 12;

if ($a > $b) {
    $lcm = $a;
} else {
    $lcm = $b;
}

while (true) {
    if ($lcm % $a == 0 && $lcm % $b == 0) {
        break;
    }

    $lcm++;
}

echo "LCM of $a and $b is: " . $lcm;

?>