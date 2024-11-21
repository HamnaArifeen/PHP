
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

// Get the ranking criterion from the AJAX request
$criterion = $_GET['criterion'];

// Query the database to fetch the ranking data for all countries
$sql = "SELECT iso_id, country_name, gold_medals, cyclists, avg_age
        FROM countries
        ORDER BY $criterion DESC";

$result = $conn->query($sql);

// Prepare the HTML content for the ranking results
$html = '<table>
            <tr>
                <th>Rank</th>
                <th>ISO ID</th>
                <th>Country Name</th>
                <th>Gold Medals</th>
                <th>Number of Cyclists</th>
                <th>Average Age (London 2012)</th>
            </tr>';

if ($result->num_rows > 0) {
    $rank = 1;
    while ($row = $result->fetch_assoc()) {
        $isoID = $row['iso_id'];
        $countryName = $row['country_name'];
        $goldMedals = $row['gold_medals'];
        $cyclists = $row['cyclists'];
        $avgAge = $row['avg_age'];

        $html .= "<tr>
                    <td>$rank</td>
                    <td>$isoID</td>
                    <td>$countryName</td>
                    <td>$goldMedals</td>
                    <td>$cyclists</td>
                    <td>$avgAge</td>
                </tr>";

        $rank++;
    }
} else {
    $html .= "<tr><td colspan='6'>No ranking data available.</td></tr>";
}

$html .= '</table>';

// Close the database connection
$conn->close();

// Prepare the JSON response
$response = array('html' => $html);
echo json_encode($response);
?>
