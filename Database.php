<?php
$workoutlistdb = new PDO('mysql:host=;port=;dbname=', '', '');

$workoutlistdb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$FoodandNutritiondb = new PDO('mysql:host=;port=;dbname=', '', '');

$FoodandNutritiondb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// load the SQL array
$workoutlist_query = $workoutlistdb->query("SELECT Exercise_id, Exercise, RepTime, name,
      Times, PMusclelocation1, PMusclelocation2, PMusclelocation3, PMusclelocation4, PMusclelocation5,
      PMusclelocation6, PMusclelocation7, PMusclelocation8, SMusclelocation1, SMusclelocation2, SMusclelocation3,
      SMusclelocation4,SMusclelocation5
      FROM Exercises2
      ORDER BY Exercise_id
  ");

$workoutlist_array = $workoutlist_query->fetchAll(PDO::FETCH_ASSOC);


// load the SQL array
$FoodandNutrition_query = $FoodandNutritiondb->query("SELECT Foodname, servingsize, calories, TotalFat, TotalCarbs, Protein FROM NutritionFacts");
// Array from the food list database
$FoodandNutrition_array = $FoodandNutrition_query->fetchAll(PDO::FETCH_ASSOC);
