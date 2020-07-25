<?php
session_start();
require_once "Database.php";

$_SESSION['failure3'] = "Looks like you didn't save any exercises.";
$_SESSION['failure4'] = "Go back home and try again.";
$_SESSION['success2'] = "Success!";
$_SESSION['success3'] = "Your workout plan is below. Take a snapshot and enjoy!";
?>
<html>
<head>
  <meta charset="utf-8">
<title>sFITNESS</title>
<meta name="author" content="">
<meta name="description" content="">
<meta name="viewport" content="height=device-height, initial-scale=.5">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<?php
require_once "linksAndScripts.php";
?>
</head>
<body>
  <!-- Navigation Bar -->
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="navbar-header">
      <a href="index.php">
        <img src="template/css/images/2020-05-16 11.03.03 1.jpg" width="40" height="40" class="d-inline-block align-top" alt="">
      </a>
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#resNav">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <div class="collapse navbar-collapse" id="resNav">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php">Home</a></li>
      </ul>
    </div>
  </nav>
  <!-- End of Navigation Bar -->
<div class="container">
</br>
<!-- assert faluire if input is incorrect or does not satisfy requirements -->
  <?php
if(!$_POST) {
    echo '<p class="show_failure" style="color:red;font-size:20px">' . $_SESSION['failure3'] . "</p>\n";
    unset($_SESSION['failure2']);
    echo '<p class="show_failure" style="color:red;font-size:20px">' . $_SESSION['failure4'] . "</p>\n";
    unset($_SESSION['failure2']);
} else {
    echo '<p class="show_failure" style="color:blue;font-size:20px">' . $_SESSION['success2'] . "</p>\n";
    unset($_SESSION['success2']);
    echo '<p class="show_failure" style="color:blue;font-size:20px">' . $_SESSION['success3'] . "</p>\n";
    unset($_SESSION['success3']);
}
?>
 <h2 class="edit_h2">Your Summary</h2>
<p class="show_info2"> <strong>Exercise <?= isset($_SESSION['days']) ? $_SESSION['days'] : 0; ?> days
   out of the week.</strong>
</p>
  <p class="show_info2">
  <strong>EAT <?= isset($_SESSION['calories_consume']) ? floor($_SESSION['calories_consume']) : 0 ?> CALORIES EACH DAY</strong>!
</p>
<p class="show_info2">
<strong> GET <?= isset($_SESSION['Protien']) ? floor($_SESSION['Protien']) : 0 ?> grams of protein
   <?= isset($_SESSION['fats']) ? floor($_SESSION['fats']) : 0 ?> grams of fat</strong> and<strong> <?= isset($_SESSION['carbs']) ? floor($_SESSION['carbs']) : 0 ?> grams of carb each day</strong>!
 </p>
 <p class="show_info3">
   <strong>DISCLAIMER:</strong> Every body is unique and the protein-fat-carb distribution can be altered, it is only a guide.
</p>

<!-- <pre class="pre_view check post response">
<?php
foreach($_POST as $workoutlistDBrow) {
    print_r($workoutlistDBrow);
    echo ('</br>');
}
?>
</pre> -->
<h2 class="edit_h2">Exercises To Do <?= isset($_SESSION['days']) ? $_SESSION['days'] : 0; ?> Times A Week</h2>
  <?php
if(!$_POST) {
    echo ('<h2 class="edit_h2">No exercises chosen!</h2>');
} else {
    echo ('<div class="row fullcard">');
    foreach($workoutlist_array as $workoutlistDBrow) {

        if(in_array($workoutlistDBrow['Exercise'], $_POST)) {
            echo ('<div class="col-sm-6 col-xs-6">');
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . $workoutlistDBrow['Exercise'] . '</h5><p class="card_info">';
            if($workoutlistDBrow['RepTime']) {
                echo ('Reps: ' . $workoutlistDBrow['RepTime'] . '</br>');
            }
            echo 'Rounds: ' . $workoutlistDBrow['name'] . '</br>Duration: ' . $workoutlistDBrow['Times'] . '</p></br>
                    </div>
                </div>';
        }
    }
    echo ("</div>");
    echo ("</br>");
}

?>
</div>
</body>
