<?php
require_once "testPHPDataObject.php";
require_once "bootstrap.php";

// https://www.w3schools.com/html/tryit.asp?filename=tryhtml_table_intro
$stmt = $pdo->query("SELECT Exercise_id, Exercise, RepTime, name,
      Times, PMusclelocation1, PMusclelocation2, PMusclelocation3, PMusclelocation4, PMusclelocation5,
      PMusclelocation6, PMusclelocation7, PMusclelocation8, SMusclelocation1, SMusclelocation2, SMusclelocation3,
      SMusclelocation4,SMusclelocation5
      FROM Exercises2
      ORDER BY Exercise_id
  ");
//TODO: change delts to shoulders
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

if(true) {
    echo ('<h3 align="center">Cardio</h3>');
    echo '<table border="1">' . "\n";
    echo ('<tr>');
    echo ('<th>Exercise</th>');
    echo ('<th>Reps</th>');
    echo ('<th>Rounds</th>');
    echo ('<th>Duration</th>');
    echo ('<th colspan="7">main muscles used</th>');
    echo ('<th colspan="3">secondary muscles used</th>');
    echo ('</tr>');
    for($i = 0; $i <= 6; $i++) {
        echo ("<tr><td>");
        echo ($rows[$i]['Exercise']);
        echo ("</td><td>");
        echo ($rows[$i]['RepTime']);
        echo ("</td><td>");
        echo ($rows[$i]['name']);
        echo ("</td><td>");
        echo ($rows[$i]['Times']);
        echo ("</td><td>");
        echo ($rows[$i]['PMusclelocation1']);
        echo ("</td><td>");
        echo ($rows[$i]['PMusclelocation2']);
        echo ("</td><td>");
        echo ($rows[$i]['PMusclelocation3']);
        echo ("</td><td>");
        echo ($rows[$i]['PMusclelocation4']);
        echo ("</td><td>");
        echo ($rows[$i]['PMusclelocation5']);
        echo ("</td><td>");
        echo ($rows[$i]['PMusclelocation6']);
        echo ("</td><td>");
        echo ($rows[$i]['PMusclelocation7']);
        echo ("</td><td>");
        echo ($rows[$i]['SMusclelocation1']);
        echo ("</td><td>");
        echo ($rows[$i]['SMusclelocation2']);
        echo ("</td><td>");
        echo ($rows[$i]['SMusclelocation3']);
    }
    echo ("</td></tr>\n");
    echo "</table>\n";
    echo "</br>";
    echo "</br>";
}

if(true) {
    echo ('<h3 align="center">Weights</h3>');
    echo '<table border="1">' . "\n";
    echo ('<tr>');
    echo ('<th>Exercise</th>');
    echo ('<th>Reps</th>');
    echo ('<th>Rounds</th>');
    echo ('<th>Duration</th>');
    echo ('<th colspan="2">main muscles used</th>');
    echo ('<th colspan="3">secondary muscles used</th>');
    echo ('</tr>');
    for($i = 7; $i <= 11; $i++) {
        echo ("<tr><td>");
        echo ($rows[$i]['Exercise']);
        echo ("</td><td>");
        echo ($rows[$i]['RepTime']);
        echo ("</td><td>");
        echo ($rows[$i]['name']);
        echo ("</td><td>");
        echo ($rows[$i]['Times']);
        echo ("</td><td>");
        echo ($rows[$i]['PMusclelocation1']);
        echo ("</td><td>");
        echo ($rows[$i]['PMusclelocation2']);
        echo ("</td><td>");
        echo ($rows[$i]['SMusclelocation1']);
        echo ("</td><td>");
        echo ($rows[$i]['SMusclelocation2']);
        echo ("</td><td>");
        echo ($rows[$i]['SMusclelocation3']);
    }
    echo ("</td></tr>\n");
    echo "</table>\n";
    echo "</br>";
    echo "</br>";
}

if(true) {
    echo ('<h3 align="center">Resistance bands</h3>');
    echo '<table border="1">' . "\n";
    echo ('<tr>');
    echo ('<th>Exercise</th>');
    echo ('<th>Reps</th>');
    echo ('<th>Rounds</th>');
    echo ('<th>Duration</th>');
    echo ('<th colspan="2">main muscles used</th>');
    echo ('<th colspan="3">secondary muscles used</th>');
    echo ('</tr>');
    for($i = 12; $i <= 17; $i++) {
        echo ("<tr><td>");
        echo ($rows[$i]['Exercise']);
        echo ("</td><td>");
        echo ($rows[$i]['RepTime']);
        echo ("</td><td>");
        echo ($rows[$i]['name']);
        echo ("</td><td>");
        echo ($rows[$i]['Times']);
        echo ("</td><td>");
        echo ($rows[$i]['PMusclelocation1']);
        echo ("</td><td>");
        echo ($rows[$i]['PMusclelocation2']);
        echo ("</td><td>");
        echo ($rows[$i]['SMusclelocation1']);
        echo ("</td><td>");
        echo ($rows[$i]['SMusclelocation2']);
        echo ("</td><td>");
        echo ($rows[$i]['SMusclelocation3']);
    }
    echo ("</td></tr>\n");
    echo "</table>\n";
    echo "</br>";
    echo "</br>";
}

if(true) {
    echo ('<h3 align="center">Body weight</h3>');
    echo '<table border="1">' . "\n";
    echo ('<tr>');
    echo ('<th>Exercise</th>');
    echo ('<th>Reps</th>');
    echo ('<th>Rounds</th>');
    echo ('<th>Duration</th>');
    echo ('<th colspan="5">main muscles used</th>');
    echo ('<th colspan="4">secondary muscles used</th>');
    echo ('</tr>');
    for($i = 18; $i <= 27; $i++) {
        echo ("<tr><td>");
        echo ($rows[$i]['Exercise']);
        echo ("</td><td>");
        echo ($rows[$i]['RepTime']);
        echo ("</td><td>");
        echo ($rows[$i]['name']);
        echo ("</td><td>");
        echo ($rows[$i]['Times']);
        echo ("</td><td>");
        echo ($rows[$i]['PMusclelocation1']);
        echo ("</td><td>");
        echo ($rows[$i]['PMusclelocation2']);
        echo ("</td><td>");
        echo ($rows[$i]['PMusclelocation3']);
        echo ("</td><td>");
        echo ($rows[$i]['PMusclelocation4']);
        echo ("</td><td>");
        echo ($rows[$i]['PMusclelocation5']);
        echo ("</td><td>");
        echo ($rows[$i]['SMusclelocation1']);
        echo ("</td><td>");
        echo ($rows[$i]['SMusclelocation2']);
        echo ("</td><td>");
        echo ($rows[$i]['SMusclelocation3']);
        echo ("</td><td>");
        echo ($rows[$i]['SMusclelocation4']);
    }
    echo ("</td></tr>\n");
    echo "</table>\n";
    echo "</br>";
    echo "</br>";
}
