Overview
This project involves creating a dynamic website to explore and analyze data related to track and road cycling at the London Olympics. The project consists of four tasks, with the first three focused on PHP scripts interacting with a MySQL database, and the fourth task allowing for an interactive and dynamic comparison of countries based on various cycling-related metrics.


 
Requirements: The table increments weight and height in steps of 5.
Task 2: Cyclist List (15%)
Description: A PHP script (athletes.php) accepts a country code (country_id) and partial name (part_name), and outputs a table of cyclists from that country whose name contains the partial input.
Input: country_id, part_name.
Output: A table with cyclist names and the number of events they participated in.
Task 3: Cyclist Details (12%)
Description: A PHP script (details.php) outputs a JSON structure containing cyclist details, including their names and countries, for those born within a given date range.
Input: date_1, date_2 (date range).
Output: A JSON data structure containing cyclist names, countries, and sorted by date of birth (descending).
Task 4: Country Comparison (65%)
Description: A PHP script (compare.php) allows the user to input two countries (using their ISO codes) and outputs a comparison of the countries in terms of Olympic medals, cyclist lists, and other statistics.
Features:
Outputs medal counts (gold, silver, bronze, total).
Displays a list of cyclists from each country.
Allows the user to rank countries based on various criteria (e.g., gold medals, number of cyclists, average cyclist age).
Implements interactivity with AJAX or Fetch API for ranking updates.
Database Details
The provided MySQL database (coa123cdb) contains the following tables:

country:
iso_id (ISO country code)
gdp (Gross Domestic Product)
population (Population)
country_name (Country name)
Medal counts: gold, silver, bronze, total
cyclist:
cyclist_id (Cyclist ID)
iso_id (Country code)
name (Cyclist's name)
height (Height in cm)
weight (Weight in kg)
dob (Date of Birth)
sport (Cycling event type)
event:
record_id (Event record ID)
cyclist_id (ID of the cyclist)
event_name (Event name)
Submission Instructions
File Structure:

Place all PHP files (bmi.php, athletes.php, details.php, compare.php) and the given HTML files (bmi.html, athletes.html, details.html) at the root level of your coursework folder.
Do not create subfolders. Ensure all files are directly under the coursework folder.
Naming Convention:

Ensure your folder is named according to your student ID (e.g., f031234olympics).
Submit all files under this folder on sci-project.lboro.ac.uk.
Marking Criteria
Correct Results: Ensuring queries and data outputs are correct.
Attention to Detail: Validating user inputs, ensuring edge cases are handled properly.
Interface Design: Clear, informative, and easy-to-use UI, especially for Task 4.
Task 4 Creativity: Demonstrate effective interactivity (AJAX/Fetch API) and engaging UI.
Further Resources
Database Access: Access the MySQL database at sci-mysql server using the provided credentials.
Libraries Allowed: jQuery, Chart.js, Bootstrap.
