<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include('config.php');

    $rating = isset($_POST['rating']) ? intval($_POST['rating']) : 0;

    if ($rating < 1 || $rating > 5) {
        echo "Invalid rating value";
        exit();
    }

    $sql = "INSERT INTO rating (rating_value) VALUES (?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("i", $rating);
        if ($stmt->execute()) {
            echo "Rating recorded successfully";
        } else {
            echo "Error recording rating: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request method";
}
?>
