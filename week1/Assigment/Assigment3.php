
<?php

echo "<h1>Assignment Practice Code</h1>";

$countries = [
    "Somalia" => "Mogadishu",
    "Kenya" => "Nairobi",
    "Spain" => "Madrid",
    "Turkey" => "Ankara"
];


// Print country name and capital
echo "<h2>Countries and Capitals</h2>";

foreach ($countries as $country => $capital) {
    echo "Country: " . $country . "<br>";
    echo "Capital: " . $capital . "<br><br>";
}


// Function Example
function getCapital($countryName)
{
    global $countries;

    if (isset($countries[$countryName])) {
        return $countries[$countryName];
    }

    return "Capital not found";
}

echo "<h3>Function Example</h3>";
echo "Capital of Somalia: " . getCapital("Somalia") . "<br>";
echo "Capital of Kenya: " . getCapital("Kenya") . "<br>";


// Student Transcript
$students = [
    "Semester 1" => [
        "student" => "Abdi",
        "course" => "PHP",
        "mark" => 65
    ],

    "Semester 2" => [
        "student" => "Abdi",
        "course" => "PHP",
        "mark" => 55
    ],

    "Semester 3" => [
        "student" => "sagal",
        "course" => "PHP",
        "mark" => 45
    ],

    "Semester 4" => [
        "student" => "aisha",
        "course" => "PHP",
        "mark" => 75
    ]
];


// Display Transcript
echo "<h2>Student Transcript</h2>";

echo "<table border='1' cellpadding='10' cellspacing='0'>";

echo "<tr>
        <th>Semester</th>
        <th>Student</th>
        <th>Course</th>
        <th>Mark</th>
      </tr>";

foreach ($students as $semester => $student) {

    $mark = $student["mark"];

    if ($mark >= 50 && $mark <= 60) {
        $color = "background-color: yellow;";
    }
    elseif ($mark < 50) {
        $color = "background-color: red; color: white;";
    }
    else {
        $color = "";
    }

    echo "<tr style='$color'>
            <td>$semester</td>
            <td>{$student["student"]}</td>
            <td>{$student["course"]}</td>
            <td>$mark</td>
          </tr>";
}

echo "</table>";

?>
