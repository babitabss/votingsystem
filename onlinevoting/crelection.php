<?php
include('connect.php');

$sql = "SELECT id, first_name, last_name, email, phone, votes FROM candidates WHERE election_type = 'CR'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>CR Election Candidates</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">CR Election Candidates</h2>
    <div class="row">
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<div class="col-md-4 mb-4">';
                echo '<div class="card">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $row['first_name'] . ' ' . $row['last_name'] . '</h5>';
                echo '<p class="card-text"><strong>Email:</strong> ' . $row['email'] . '</p>';
                echo '<p class="card-text"><strong>Phone:</strong> ' . $row['phone'] . '</p>';
                
                echo '<p class="card-text"><strong>Votes:</strong> <span class="vote-count">' . $row['votes'] . '</span></p>';
                if (!isset($_SESSION['voted'])) {
                    echo '<button class="btn btn-primary vote-btn" data-id="' . $row['id'] . '">Vote</button>';
                } else {
                    echo '<button class="btn btn-secondary" disabled>Vote</button>';
                }
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo '<p>No candidates registered for the CR election.</p>';
        }
        $conn->close();
        ?>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<!-- AJAX voting script -->
<script>
$(document).ready(function() {
    $('.vote-btn').click(function() {
        var candidateId = $(this).data('id');
        var button = $(this);
        $.ajax({
            type: 'POST',
            url: 'vote.php',
            data: { candidate_id: candidateId },
            success: function(response) {
                if (response == 'success') {
                    var voteCountElement = button.siblings('.vote-count');
                    var currentVotes = parseInt(voteCountElement.text());
                    voteCountElement.text(currentVotes + 1);
                    $('.vote-btn').prop('disabled', true).removeClass('btn-primary').addClass('btn-secondary');
                } else if (response == 'already_voted') {
                    alert('You have already voted.');
                } else {
                    alert('Error voting for candidate.');
                }
            }
        });
    });
});
</script>
</body>
</html>
