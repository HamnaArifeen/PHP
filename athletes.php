<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="robots" content="noindex, nofollow" />
<title>Athletes Task</title>
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
  align:left;
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

<h1 class="center">Task 2 - Athletes (athletes.php)-output</h1>
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

$conn = mysqli_connect($servername, $username, $password, $dbname);
// Retrieve the input values from the GET request
$country_id = $_GET['country_id'];
$part_name = $_GET['part_name'];

//--------------------------case of input string

  //  $sql="INSERT INTO `$dbname`.`cyclist_event` ( `name`, `country_id`, `event_date`) VALUES ( '$part_name', '$country_id', current_timestamp()); ";
  //  if($conn->query($sql) == true){
  //   //echo "Successfully inserted";
  //     }
  //   else{
  //   echo "ERROR:$sql <br> $conn->error";
  // }
  


// Construct the SQL query
$sql = "SELECT name, COUNT(*) AS events_attended FROM cyclist_event
WHERE country_id = '$country_id' AND name LIKE '$part_name'
GROUP BY name;";


// Execute the query
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
// Construct the HTML table
$table_html = "<table>
                <tr>
                  <th>   Name   </th>
                  <th>  Events Attended  </th>
                </tr>";

while($row = mysqli_fetch_assoc($result)) {
  $name = $row['name'];
  $events_attended = $row['events_attended'];

  $table_html .= "<tr><td>$name</td><td>$events_attended</td></tr>";
}

$table_html .= "</table>";
} else {
  // If there are no results, display an error message
  echo "No results found.";
}
// Close the database connection
mysqli_close($conn);

// Echo the HTML table
echo $table_html;
?>
