<?php
$students = array(
   "CA221" => array("name" => "mohamed ahmed ali", "phone" => 064880793, "address" => "laba dhagax , wardhiigle"),
   "CA223" => array("name" => "ahmed abdi jana", "phone" => 06173383473, "address" => "Taleex, hodon"),
   "CA222" => array("name" => "mohamed abdi ali", "phone" => 06173383473, "address" => "macmacan, hodon"),
);

echo "<table border='1'>";

echo "<tr>";
echo "<th>classes</th>"; 
foreach ($students ["CA221"] as $k => $v){
    echo "<th>$k</th>";
}

echo "</tr>";

foreach ($students as $i => $s) {
    echo "<tr>";
    echo "<td>$i</td>";
    foreach ($s as $k => $v) {
        echo "<td>$v</td >";
    }
    echo "</tr>";
}

echo "</table>";

?>