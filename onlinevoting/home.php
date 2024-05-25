<?php
include('connect.php');



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT id, password FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $username;
            header("location: index.php");
        } else {
            echo "Invalid password";
        }
    } else {
        echo "No user found with that username";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    <h2>Login Form</h2>
    <form method="post" action="" class="form">
        Username: <input type="text" name="username" class="form-control" required><br>
        Password: <input type="password" name="password" class="form-control" required><br>
        <input type="submit" value="Login">
    </form>
    <div>
        Don't have a account, <a href="signup.php">Register here</a>
        <br>OR
        <br>
        Are you a Candidate, <a href="candidateregister.php">Register here</a>
    </div>
    </div>
    

</body>
</html>
