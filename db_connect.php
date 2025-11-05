<?php
$servername = "localhost"; // Database host (usually 'localhost' for local development)
$username = "root"; // Database username
$password = ""; // Database password (empty for default local setups like XAMPP/MAMP)
$dbname = "purrfect"; // Name of the database to connect to

$conn = new mysqli($servername, $username, $password, $dbname); // Create a new MySQLi connection using the provided credentials

if ($conn->connect_error) { // Check if the connection failed
    die("Connection failed: " . $conn->connect_error); // Stop execution and display the connection error
}
?>
<?php // End of PHP block
