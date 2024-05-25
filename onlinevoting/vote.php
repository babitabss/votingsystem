<?php
include('connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['candidate_id'])) {
    if (!isset($_SESSION['voted'])) {
        $candidate_id = $_POST['candidate_id'];

        $stmt = $conn->prepare("UPDATE candidates SET votes = votes + 1 WHERE id = ?");
        $stmt->bind_param("i", $candidate_id);

        if ($stmt->execute()) {
            $_SESSION['voted'] = true;
            echo "success";
        } else {
            echo "error";
        }

        $stmt->close();
    } else {
        echo "already_voted";
    }
    $conn->close();
}
?>
