<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Country Comparison</title>
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script>
    $(document).ready(function() {
      // Handle form submission
      $('#compare-form').submit(function(event) {
        event.preventDefault(); // Prevent default form submission
        var iso1 = $('#iso1').val();
        var iso2 = $('#iso2').val();

        // Make AJAX request to fetch comparison data
        $.ajax({
          url: 'compare_data.php',
          type: 'GET',
          data: { iso1: iso1, iso2: iso2 },
          dataType: 'json',
          success: function(response) {
            // Display comparison results
            $('#result').html(response.html);
          },
          error: function() {
            $('#result').html('An error occurred while fetching data.');
          }
        });
      });

      // Handle ranking criterion selection
      $('#ranking-criteria').change(function() {
        var criterion = $(this).val();

        // Make AJAX request to fetch ranking data
        $.ajax({
          url: 'ranking_data.php',
          type: 'GET',
          data: { criterion: criterion },
          dataType: 'json',
          success: function(response) {
            // Display ranking results
            $('#ranking').html(response.html);
          },
          error: function() {
            $('#ranking').html('An error occurred while fetching ranking data.');
          }
        });
      });
    });
  </script>
</head>
<body>
<h3 class="center">COA123 - Web Programming</h3>
<h2 class="center">Individual Coursework - Olympic Cyclists</h2>

<h1 class="center">Task 4 -  (compare.php)</h1>
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
  <h1>Country Comparison</h1>
  <form id="compare-form">
    <label for="iso1">Country 1 (ISO ID):</label>
    <input type="text" id="iso1" name="iso1" required>
    <label for="iso2">Country 2 (ISO ID):</label>
    <input type="text" id="iso2" name="iso2" required>
    <button type="submit">Compare</button>
  </form>

  <h2>Comparison Results:</h2>
  <div id="result"></div>

  <h2>Ranking Criterion:</h2>
  <select id="ranking-criteria">
    <option value="gold">Gold Medals</option>
    <option value="cyclists">Number of Cyclists</option>
    <option value="avg_age">Average Age of Cyclists (London 2012)</option>
  </select>

  <h2>Ranking:</h2>
  <div id="ranking"></div>

  <!-- Placeholder for additional interactive elements -->
</body>
</html>
