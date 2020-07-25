<?php
require_once "testPHPDataObject.php";
require_once "bootstrap.php";
// TODO: Fix rounds
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

echo '<table border="1">' . "\n";
echo ('<tr>');
echo ('<th>Exercise</th>');
echo ('<th>Reps</th>');
echo ('<th>Rounds</th>');
echo ('<th>Duration</th>');
echo ('<th colspan="7">main muscles used</th>');
echo ('<th colspan="4">secondary muscles used</th>');
echo ('</tr>');
foreach($rows as $row) {
    echo ("<tr><td>");
    echo ($row['Exercise']);
    echo ("</td><td>");
    echo ($row['RepTime']);
    echo ("</td><td>");
    echo ($row['name']);
    echo ("</td><td>");
    echo ($row['Times']);
    echo ("</td><td>");
    echo ($row['PMusclelocation1']);
    echo ("</td><td>");
    echo ($row['PMusclelocation2']);
    echo ("</td><td>");
    echo ($row['PMusclelocation3']);
    echo ("</td><td>");
    echo ($row['PMusclelocation4']);
    echo ("</td><td>");
    echo ($row['PMusclelocation5']);
    echo ("</td><td>");
    echo ($row['PMusclelocation6']);
    echo ("</td><td>");
    echo ($row['PMusclelocation7']);
    echo ("</td><td>");
    echo ($row['SMusclelocation1']);
    echo ("</td><td>");
    echo ($row['SMusclelocation2']);
    echo ("</td><td>");
    echo ($row['SMusclelocation3']);
    echo ("</td><td>");
    echo ($row['SMusclelocation4']);
    echo ("</td></tr>\n");
}
echo "</table>\n";
