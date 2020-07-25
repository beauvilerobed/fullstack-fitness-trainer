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

echo "<pre>\n";
print_r($rows);
echo "</pre>\n";
