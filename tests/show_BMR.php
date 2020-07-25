<?php
session_start();
require_once "pdo.php";

$stmt = $pdo->query("SELECT Exercise_id, Exercise, RepTime, name,
      Times, PMusclelocation1, PMusclelocation2, PMusclelocation3, PMusclelocation4, PMusclelocation5,
      PMusclelocation6, PMusclelocation7, PMusclelocation8, SMusclelocation1, SMusclelocation2, SMusclelocation3,
      SMusclelocation4,SMusclelocation5
      FROM Exercises2
      ORDER BY Exercise_id
  ");
//TODO: change delts to shoulders
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

$i = 0;
$z = 1;
if(isset($_POST['poundsorkilos']) && isset($_POST['meterfeet']) && isset($_POST['centimetersinches']) && isset($_POST['days']) && isset($_POST['duration']) && isset($_POST['age']) && isset($_POST['muscle']) && isset($_POST['weight2']) && (isset($_POST['preference1']) || isset($_POST['preference2']) || isset($_POST['preference3']) || isset($_POST['preference4']))) {
    if(!isset($_POST['sex'])) {
        $_SESSION['failure1'] = "Please choose a sex";
        $i++;
    }
    if(!isset($_POST['preference1']) && !isset($_POST['preference2']) && !isset($_POST['preference3']) && !isset($_POST['preference4'])) {
        $_SESSION['failure5'] = "Please check at least one box";
        $i++;
    }
    if(!isset($_POST['muscle'])) {
        $_SESSION['failure2'] = "Please choose if you would like to loose, gain, or maintain muscle";
        $i++;
    }
    if(!isset($_POST['weight2'])) {
        $_SESSION['failure3'] = "Please choose if you would like to loose, gain, or maintain weight";
        $i++;
    }
    if($i != 0) {
        header("Location: add.php");
        return;
    }


    if(!is_numeric($_POST['poundsorkilos']) || !is_numeric($_POST['meterfeet']) || !is_numeric($_POST['centimetersinches']) || !is_numeric($_POST['duration'])) {
        $_SESSION['failure'] = "All inputs must be numbers";
        header("Location: add.php");
        return;

    }
    if(!ctype_digit(strval($_POST['days'])) || !ctype_digit(strval($_POST['days']))) {
        $_SESSION['failure'] = "please enter a whole number";
        header("Location: add.php");
        return;
    }

    if($_POST['muscle'] == 1) {
        $z = 62.5 * 4 + 250;
    } elseif($_POST['days'] == 2 || $_POST['days'] == 3) {
        $z = 62.5 * 8 + 250;
    } elseif($_POST['days'] == 4 || $_POST['days'] == 5) {
        $z = 62.5 * 16 + 250;
    } elseif($_POST['days'] == 6 || $_POST['days'] == 7) {
        $z = 62.5 * 32 + 250;
    } else {
        $_SESSION['failure'] = "days must between 1 and 7";
        header("Location: add.php");
        return;
    }

    if($_POST['muscle'] == 1 && $_POST['weight2'] == 1) {
        $protien  = .4 / 4;
        $fats     = .4 / 9;
        $carbs    = .2 / 4;
        $calories = 500;
    } elseif($_POST['muscle'] == 1 && $_POST['weight2'] == 2) {
        $protien  = .4 / 4;
        $fats     = .4 / 9;
        $carbs    = .2 / 4;
        $calories = 0;
    } elseif($_POST['muscle'] == 2 && $_POST['weight2'] == 1) {
        $protien  = .3 / 4;
        $fats     = .35 / 9;
        $carbs    = .35;
        $calories = 500;
    } elseif($_POST['muscle'] == 2 && $_POST['weight2'] == 2) {
        $protien  = .3 / 4;
        $fats     = .2 / 9;
        $carbs    = .5 / 4;
        $calories = 0;
    } elseif($_POST['muscle'] == 3 && $_POST['weight2'] == 1) {
        $protien  = .3 / 4;
        $fats     = .35 / 9;
        $carbs    = .35 / 4;
        $calories = 0;
    } elseif($_POST['muscle'] == 3 && $_POST['weight2'] == 2) {
        $protien  = .3 / 4;
        $fats     = .35 / 9;
        $carbs    = .35 / 4;
        $calories = 0;
    } elseif($_POST['muscle'] == 3 && $_POST['weight2'] == 3) {
        $protien  = .3 / 4;
        $fats     = .35 / 9;
        $carbs    = .35 / 4;
        $calories = -500;
    } else {
        $_SESSION['failure'] = "Note that you can't gain muscle and loose weight or loose muscle and loose weight";
        header("Location: add.php");
        return;
    }

    if($_POST['chooselbkg'] == 'lb') {
        $_SESSION['poundsorkilos']    = $_POST['poundsorkilos'];
        $_SESSION['usepoundsorkilos'] = $_POST['poundsorkilos'] / 2.205;

    } else {
        $_SESSION['poundsorkilos']    = $_POST['poundsorkilos'];
        $_SESSION['usepoundsorkilos'] = $_POST['poundsorkilos'] * 1;

    }

    if($_POST['chooseftm'] == 'ft' && $_POST['chooseincm'] == 'in') {

        $_SESSION['meterfeet']            = $_POST['meterfeet'];
        $_SESSION['centimetersinches']    = $_POST['centimetersinches'];
        $_SESSION['usemeterfeet']         = $_POST['meterfeet'] * 30.48;
        $_SESSION['usecentimetersinches'] = $_POST['centimetersinches'] * 2.54;

        $_SESSION['BMR']     = -5 * $_POST['age'] + 10 * $_SESSION['usepoundsorkilos'] + 6.25 * ($_SESSION['usemeterfeet'] + $_SESSION['usecentimetersinches']) + $_POST['sex'];
        $_SESSION['TEF']     = .1 * $_SESSION['BMR'];
        $_SESSION['TDEE']    = $_SESSION['BMR'] + $_SESSION['TEF'] + 325 + $z;
        $_SESSION['Protien'] = ($_SESSION['TDEE'] + $calories) * $protien;
        $_SESSION['fats']    = ($_SESSION['TDEE'] + $calories) * $fats;
        $_SESSION['carbs']   = ($_SESSION['TDEE'] + $calories) * $carbs;

        $_SESSION['preference1'] = $_POST['preference1'] * 1;
        $_SESSION['preference2'] = $_POST['preference2'] * 1;
        $_SESSION['preference3'] = $_POST['preference3'] * 1;
        $_SESSION['preference4'] = $_POST['preference4'] * 1;

        $_SESSION['success'] = "Record added";
        header("Location: add.php");
        return;

    } elseif($_POST['chooseftm'] == 'm' && $_POST['chooseincm'] == 'cm') {
        // $failure = "Make is required";
        $_SESSION['meterfeet']            = $_POST['meterfeet'] * 1;
        $_SESSION['centimetersinches']    = $_POST['centimetersinches'] * 1;
        $_SESSION['usemeterfeet']         = $_POST['meterfeet'] * 1;
        $_SESSION['usecentimetersinches'] = $_POST['centimetersinches'] * 1;

        $_SESSION['BMR']     = -5 * $_POST['age'] + 10 * $_SESSION['usepoundsorkilos'] + 6.25 * ($_SESSION['usemeterfeet'] + $_SESSION['usecentimetersinches']) + $_POST['sex'];
        $_SESSION['TEF']     = .1 * $_SESSION['BMR'];
        $_SESSION['TDEE']    = $_SESSION['BMR'] + $_SESSION['TEF'] + 325 + $z;
        $_SESSION['Protien'] = ($_SESSION['TDEE'] + $calories) * $protien;
        $_SESSION['fats']    = ($_SESSION['TDEE'] + $calories) * $fats;
        $_SESSION['carbs']   = ($_SESSION['TDEE'] + $calories) * $carbs;

        $_SESSION['preference1'] = $_POST['preference1'] * 1;
        $_SESSION['preference2'] = $_POST['preference2'] * 1;
        $_SESSION['preference3'] = $_POST['preference3'] * 1;
        $_SESSION['preference4'] = $_POST['preference4'] * 1;

        $_SESSION['success'] = "Record added";
        header("Location: add.php");
        return;
    } elseif($_POST['chooseftm'] == 'm' && $_POST['chooseincm'] == 'in') {
        $_SESSION['meterfeet']            = $_POST['meterfeet'] * 1;
        $_SESSION['usemeterfeet']         = $_POST['meterfeet'] * 1;
        $_SESSION['centimetersinches']    = $_POST['centimetersinches'];
        $_SESSION['usecentimetersinches'] = $_POST['centimetersinches'] * 2.54;

        $_SESSION['BMR']     = -5 * $_POST['age'] + 10 * $_SESSION['usepoundsorkilos'] + 6.25 * ($_SESSION['usemeterfeet'] + $_SESSION['usecentimetersinches']) + $_POST['sex'];
        $_SESSION['TEF']     = .1 * $_SESSION['BMR'];
        $_SESSION['TDEE']    = $_SESSION['BMR'] + $_SESSION['TEF'] + 325 + $z;
        $_SESSION['Protien'] = ($_SESSION['TDEE'] + $calories) * $protien;
        $_SESSION['fats']    = ($_SESSION['TDEE'] + $calories) * $fats;
        $_SESSION['carbs']   = ($_SESSION['TDEE'] + $calories) * $carbs;

        $_SESSION['preference1'] = $_POST['preference1'] * 1;
        $_SESSION['preference2'] = $_POST['preference2'] * 1;
        $_SESSION['preference3'] = $_POST['preference3'] * 1;
        $_SESSION['preference4'] = $_POST['preference4'] * 1;

        $_SESSION['success'] = "Record added";
        header("Location: add.php");
        return;

    } elseif($_POST['chooseftm'] == 'ft' && $_POST['chooseincm'] == 'cm') {
        $_SESSION['meterfeet']            = $_POST['meterfeet'] * 1;
        $_SESSION['usemeterfeet']         = $_POST['meterfeet'] * 30.48;
        $_SESSION['centimetersinches']    = $_POST['centimetersinches'];
        $_SESSION['usecentimetersinches'] = $_POST['centimetersinches'] * 1;

        $_SESSION['BMR']     = -5 * $_POST['age'] + 10 * $_SESSION['usepoundsorkilos'] + 6.25 * ($_SESSION['usemeterfeet'] + $_SESSION['usecentimetersinches']) + $_POST['sex'];
        $_SESSION['TEF']     = .1 * $_SESSION['BMR'];
        $_SESSION['TDEE']    = $_SESSION['BMR'] + $_SESSION['TEF'] + 325 + $z;
        $_SESSION['Protien'] = ($_SESSION['TDEE'] + $calories) * $protien;
        $_SESSION['fats']    = ($_SESSION['TDEE'] + $calories) * $fats;
        $_SESSION['carbs']   = ($_SESSION['TDEE'] + $calories) * $carbs;

        $_SESSION['preference1'] = $_POST['preference1'] * 1;
        $_SESSION['preference2'] = $_POST['preference2'] * 1;
        $_SESSION['preference3'] = $_POST['preference3'] * 1;
        $_SESSION['preference4'] = $_POST['preference4'] * 1;

        $_SESSION['success'] = "Record added";
        header("Location: add.php");
        return;

    } else {
        // Redirect the browser to add.php
        // $success = "Record inserted";
        $_SESSION['failure'] = "Please choose ft/in or m/cm";
        header("Location: add.php");
        return;
    }

}


$stmt2 = $pdo2->query("SELECT Foodname, servingsize, calories, TotalFat, TotalCarbs, Protein FROM NutritionFacts");
$rows2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);

echo "<pre>\n";
print_r($rows);
print_r($rows2);
echo "</pre>\n";
