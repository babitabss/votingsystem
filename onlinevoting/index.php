<?php
session_start();

if(!isset($_SESSION['username'])){
    header("location: home.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Voting System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Online Voting System</h1>
        <a href="logout.php" class="btn btn-primary">logOut</a>
        <br>
        <h2>Ongoing Elections: </h2>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                    <h5 class="card-title">CR Election</h5>
                    <p class="card-text">CR election of 2022 Batch for 2023</p>
                    <a href="crelection.php" class="btn btn-primary">Vote</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                    <h5 class="card-title">President Election</h5>
                    <p class="card-text">President of IT Club 2023</p>
                    <a href="presidentelection.php" class="btn btn-primary">Vote</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

</body>
</html>