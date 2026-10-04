<?php

// ================= QUESTION 1 =================

echo "<h2>Question 1</h2>";

$arr = [5, -7, 12, 10, -7, 11, -6, 12, 1, -7, 2, 9];

echo "Array: ";
print_r($arr);

$total = 0;
$even = 0;
$odd = 0;

foreach ($arr as $value) {
    $total += $value;

    if ($value % 2 == 0) {
        $even += $value;
    } else {
        $odd += $value;
    }
}

$min = min($arr);
$max = max($arr);

echo "<br>Total: $total";
echo "<br>Even Total: $even";
echo "<br>Odd Total: $odd";

echo "<br>Minimum: $min";
echo "<br>Minimum Positions: ";

foreach ($arr as $i => $value) {
    if ($value == $min) {
        echo ($i + 1) . " ";
    }
}

echo "<br>Maximum: $max";
echo "<br>Maximum Positions: ";

foreach ($arr as $i => $value) {
    if ($value == $max) {
        echo ($i + 1) . " ";
    }
}


// ================= QUESTION 2 =================

echo "<h2>Question 2</h2>";

$colors = [
    "Light" => [
        "Red" => "Light Red",
        "Green" => "Light Green",
        "Blue" => "Light Blue"
    ],
    "Normal" => [
        "Red" => "Normal Red",
        "Green" => "Normal Green",
        "Blue" => "Normal Blue"
    ],
    "Dark" => [
        "Red" => "Dark Red",
        "Green" => "Dark Green",
        "Blue" => "Dark Blue"
    ]
];

echo "<table border='1' cellpadding='5'>";

echo "<tr><th></th><th>Red</th><th>Green</th><th>Blue</th></tr>";

foreach ($colors as $row => $columns) {
    echo "<tr><th>$row</th>";

    foreach ($columns as $value) {
        echo "<td>$value</td>";
    }

    echo "</tr>";
}

echo "</table>";


// ================= QUESTION 3 =================

echo "<h2>Question 3</h2>";

$arr2 = [
    [2, -6, 8],
    [-6, 1, 6],
    [7, 8, -6]
];

$total = 0;
$even = 0;
$odd = 0;

$columnTotal = [0, 0, 0];
$diagonal1 = 0;
$diagonal2 = 0;

$min = $arr2[0][0];
$max = $arr2[0][0];

foreach ($arr2 as $i => $row) {

    $rowTotal = 0;

    foreach ($row as $j => $value) {

        echo $value . " ";

        $total += $value;
        $rowTotal += $value;
        $columnTotal[$j] += $value;

        if ($value % 2 == 0) {
            $even += $value;
        } else {
            $odd += $value;
        }

        if ($i == $j) {
            $diagonal1 += $value;
        }

        if ($i + $j == 2) {
            $diagonal2 += $value;
        }

        if ($value < $min) {
            $min = $value;
        }

        if ($value > $max) {
            $max = $value;
        }
    }

    echo " | Row Total: $rowTotal<br>";
}

echo "<br>Even Total: $even";
echo "<br>Odd Total: $odd";

echo "<br>Column Totals: ";
print_r($columnTotal);

echo "<br>Diagonal 1: $diagonal1";
echo "<br>Diagonal 2: $diagonal2";

echo "<br>Total of All Elements: $total";

echo "<br>Minimum: $min";
echo "<br>Minimum Positions: ";

foreach ($arr2 as $i => $row) {
    foreach ($row as $j => $value) {
        if ($value == $min) {
            echo "(" . ($i + 1) . "," . ($j + 1) . ") ";
        }
    }
}

echo "<br>Maximum: $max";
echo "<br>Maximum Positions: ";

foreach ($arr2 as $i => $row) {
    foreach ($row as $j => $value) {
        if ($value == $max) {
            echo "(" . ($i + 1) . "," . ($j + 1) . ") ";
        }
    }
}


// ================= QUESTION 4 =================

echo "<h2>Question 4</h2>";

$students = [
    "CA221" => [
        "Name" => "Mohamed Ahmed Ali",
        "Phone" => "0648440403",
        "Address" => "Laba Dhagax, Wardhiigley"
    ],

    "CA223" => [
        "Name" => "Ahmed Abdi Jama",
        "Phone" => "0647223201",
        "Address" => "Taleex, Hodan"
    ],

    "CA221-2" => [
        "Name" => "Amina Nur Adan",
        "Phone" => "0646990276",
        "Address" => "Macmacaanka, Dharkeynley"
    ]
];

echo "<table border='1' cellpadding='5'>";

echo "<tr>
<th>ID</th>
<th>Name</th>
<th>Phone</th>
<th>Address</th>
</tr>";

foreach ($students as $id => $student) {

    echo "<tr>";

    echo "<td>$id</td>";
    echo "<td>{$student['Name']}</td>";
    echo "<td>{$student['Phone']}</td>";
    echo "<td>{$student['Address']}</td>";

    echo "</tr>";
}

echo "</table>";


// ================= QUESTION 5 =================

echo "<h2>Question 5</h2>";

$transcript = [
    "Semester 1" => [
        ["subject1", 9, 26, 10, 40, 85, "Pass"],
        ["subject2", 9, 26, 10, 40, 85, "Pass"],
        ["subject3", 9, 26, 10, 40, 85, "Pass"]
    ],

    "Semester 2" => [
        ["subject1", 9, 26, 10, 0, 45, "Fail"],
        ["subject2", 9, 26, 10, 40, 85, "Pass"],
        ["subject3", 9, 26, 10, 40, 85, "Pass"]
    ]
];

echo "<table border='1' cellpadding='5'>";

echo "<tr>
<th>Semester</th>
<th>Course</th>
<th>CW1</th>
<th>MidTerm</th>
<th>CW2</th>
<th>Final</th>
<th>Total</th>
<th>Status</th>
</tr>";

foreach ($transcript as $semester => $courses) {

    foreach ($courses as $course) {

        echo "<tr>";

        echo "<td>$semester</td>";
        echo "<td>$course[0]</td>";
        echo "<td>$course[1]</td>";
        echo "<td>$course[2]</td>";
        echo "<td>$course[3]</td>";
        echo "<td>$course[4]</td>";
        echo "<td>$course[5]</td>";
        echo "<td>$course[6]</td>";

        echo "</tr>";
    }
}

echo "</table>";

?>