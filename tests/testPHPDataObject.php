<?php
//test accessing to listofexercises databases
$pdo = new PDO('mysql:host=localhost;port=8889;dbname=workoutlist', 'workitworkit', '1234567890123456789123456789');
//show error if failure
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
