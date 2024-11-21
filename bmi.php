<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="robots" content="noindex, nofollow" />
<title>BMI Task</title>
<style type="text/css">
body {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	background-color: bisque;
}
.center {
	text-align:center;
}
body,td,th {
	color: brown; 
}
.larger {
	font-size:larger;
	text-align:right;
}
table {
	margin-left:auto;
	margin-right:auto;
}
.fixed {
	font-family: Courier, monospace;
	white-space: pre;
	background-color:cornsilk;
}
</style>
</head>
<body>
<h3 class="center">COA123 - Web Programming</h3>
<h2 class="center">Individual Coursework - Olympic Cyclists</h2>
<h1 class="center">Task 1 - BMI (bmi.php)-Output</h1>
<table>
  <tr>
  <td>
<div class="fixed">~  __0
 _-\<,_
(*)/ (*)
</div>
  </td>
  </tr>
  </table>
  <br />
  
<?php
// Set connection variables
if(isset($_GET['min_weight'])){
    $server = "localhost";
    $username = "root";
    $password = "";
   
    // Create a database connection
    $con = mysqli_connect($server, $username, $password);
   
    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }

$min_weight = $_GET['min_weight'];
$max_weight = $_GET['max_weight'];
$min_height = $_GET['min_height'];
$max_height = $_GET['max_height'];

// Validate input values
if ($min_weight % 5 != 0 || $max_weight % 5 != 0 || $min_height % 5 != 0 || $max_height % 5 != 0) {
    echo "<p>Invalid input values. Weight and height must be multiples of 5.</p>";
    exit();
}

// Generate the BMI table
echo "<table border='1'>";
echo "<tr><th>Height <br>→
↓<br>Weight</th>";
for ($h = $min_height; $h <= $max_height; $h += 5) {
    echo "<th>$h</th>";
}
echo "</tr>";

for ($w = $min_weight; $w <= $max_weight; $w += 5) {
    echo "<tr><th>$w</th>";
    for ($h = $min_height; $h <= $max_height; $h += 5) {
        $height_m = $h / 100.0;
        $bmi = number_format($w / ($height_m * $height_m), 3);
        echo "<td>$bmi</td>";
    }
    echo "</tr>";
}
echo "</table>";
}

?>

