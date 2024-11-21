<?php
// Connect to your database (adjust the credentials as needed)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the ISO ID values from the AJAX request
$iso1 = $_GET['iso1'];
$iso2 = $_GET['iso2'];

// Query the database to fetch the comparison data for the two countries
$sql = "SELECT country_name, gold_medals, silver_medals, bronze_medals, total_medals, cyclists
        FROM countries
        WHERE iso_id IN ('$iso1', '$iso2')";

$result = $conn->query($sql);
echo $result;
// Prepare the HTML content for the comparison results
$html = '';
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $countryName = $row['country_name'];
        $goldMedals = $row['gold_medals'];
        $silverMedals = $row['silver_medals'];
        $bronzeMedals = $row['bronze_medals'];
        $totalMedals = $row['total_medals'];
        $cyclists = $row['cyclists'];

        $html .= "<h3>$countryName</h3>";
        $html .= "<p>Gold Medals: $goldMedals</p>";
        $html .= "<p>Silver Medals: $silverMedals</p>";
        $html .= "<p>Bronze Medals: $bronzeMedals</p>";
        $html .= "<p>Total Medals: $totalMedals</p>";
        $html .= "<p>Cyclists: $cyclists</p>";
    }
} else {
    $html = "No data found for the provided countries.";
}

// Close the database connection
$conn->close();

// Prepare the JSON response
$response = array('html' => $html);
echo json_encode($response);
?>
