<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="robots" content="noindex, nofollow" />
<title>Details Task</title>
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
	text-align:left;
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
<h1 class="center">Task 3 - Details (details.php)-output</h1>
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
// Establish a database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web";

$db_connection = mysqli_connect($servername, $username, $password, $dbname);

// check if the connection was successful
if (!$db_connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// retrieve the input values from the GET request
$date_1 = $_GET["date_1"];
$date_2 = $_GET["date_2"];

// query the database to retrieve the required data
$query = "SELECT cyclists.name, countries.name AS country_name
FROM cyclists
JOIN countries ON cyclists.country_id = countries.id
WHERE cyclists.date_of_birth BETWEEN 'start_date' AND 'end_date'
ORDER BY cyclists.date_of_birth DESC";

$result = mysqli_query($db_connection, $query);

// construct a JSON data structure containing the required data
$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = array(
        "name" => $row["name"],
        "country" => $row["country"],
        "dob" => $row["dob"]
    );
    
}

// encode the data as JSON and return it
header('Content-Type: application/json');
echo json_encode($data);

// close the database connection
mysqli_close($db_connection);
?>
