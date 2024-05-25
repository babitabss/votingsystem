<?php
include('connect.php');

// Check if admin is logged in, if not redirect to login page
if (!isset($_SESSION['admin_logged_in']) || !$_SESSION['admin_logged_in']) {
    header("location: adminlogin.php");
    exit;
}



// Fetch CR candidates
$sql_cr = "SELECT id, first_name, last_name, email, phone, votes FROM candidates WHERE election_type = 'CR'";
$result_cr = $conn->query($sql_cr);

// Fetch President candidates
$sql_president = "SELECT id, first_name, last_name, email, phone, votes FROM candidates WHERE election_type = 'President'";
$result_president = $conn->query($sql_president);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
</head>
<body>
    <h2>Admin Panel</h2>
    <a href="logout.php">Logout</a>

    <h3>CR Election Candidates</h3>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            
            <th>Votes</th>
        </tr>
        <?php
        if ($result_cr->num_rows > 0) {
            while($row = $result_cr->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row['id']."</td>";
                echo "<td>".$row['first_name']." ".$row['last_name']."</td>";
                echo "<td>".$row['email']."</td>";
                echo "<td>".$row['phone']."</td>";
                
                echo "<td>".$row['votes']."</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No CR candidates found</td></tr>";
        }
        ?>
    </table>

    <h3>President Election Candidates</h3>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            
            <th>Votes</th>
        </tr>
        <?php
        if ($result_president->num_rows > 0) {
            while($row = $result_president->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row['id']."</td>";
                echo "<td>".$row['first_name']." ".$row['last_name']."</td>";
                echo "<td>".$row['email']."</td>";
                echo "<td>".$row['phone']."</td>";
                
                echo "<td>".$row['votes']."</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No President candidates found</td></tr>";
        }
        ?>
    </table>
</body>
</html>
