<!-- admin_auth.php -->
<?php
session_start();

// Simulate authentication
$username = "admin";
$password = "admin123";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_username = $_POST['username'];
    $input_password = $_POST['password'];

    if ($input_username === $username && $input_password === $password) {
        $_SESSION['admin_logged_in'] = true;
        header("location: adminpanel.php");
        exit;
    } else {
        echo "Invalid username or password";
    }
}
?>

<!-- logout.php -->
<?php
session_start();
session_unset();
session_destroy();
header("location: adminlogin.php");
exit;
?>
