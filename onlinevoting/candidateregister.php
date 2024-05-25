<?php
include('connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    
    $election_type = $_POST['election_type'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO candidates (first_name, last_name, email, phone, election_type) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $first_name, $last_name, $email, $phone, $election_type);

    if ($stmt->execute()) {
        echo "New candidate registered successfully for the $election_type election";
        header("location: home.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Candidate Registration</title>
</head>
<body>
    <h2>Candidate Registration Form</h2>
    <form method="post" action="">
        First Name: <input type="text" name="first_name" required><br>
        Last Name: <input type="text" name="last_name" required><br>
        Email: <input type="email" name="email" required><br>
        Phone: <input type="text" name="phone"><br>
        
        Election Type:
        <select name="election_type" required>
            <option value="CR">CR</option>
            <option value="President">President</option>
        </select><br>
        <input type="submit" value="Register">
    </form>
    <p>Candidates Must register as voter to vote</p>
</body>
</html>
