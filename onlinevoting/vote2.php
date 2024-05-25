<?php
include('connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['candidate_id'])) {
    if (!$_SESSION['voted_president']) {
        $candidate_id = $_POST['candidate_id'];

        $stmt = $conn->prepare("UPDATE candidates SET votes = votes + 1 WHERE id = ?");
        $stmt->bind_param("i", $candidate_id);

        if ($stmt->execute()) {
            $_SESSION['voted_president'] = true;
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error']);
        }

        $stmt->close();
    } else {
        echo json_encode(['status' => 'already_voted']);
    }
    $conn->close();
}
?>
