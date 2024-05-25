
<?php
session_start();

$servername = "localhost";
$username = "root"; // your database username
$password = ""; // your database password
$dbname = "newvotingsystem";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize session variables for voting if not already set
if (!isset($_SESSION['voted_cr'])) {
    $_SESSION['voted_cr'] = false;
}
if (!isset($_SESSION['voted_president'])) {
    $_SESSION['voted_president'] = false;
}
?>

