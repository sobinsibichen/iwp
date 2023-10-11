<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$database = "iwp_contact";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from the form
$username = $_POST['username'];
$review = $_POST['review'];

// SQL query to insert the review into the database
$sql = "INSERT INTO reviews (username, review_text) VALUES ('$username', '$review')";

if ($conn->query($sql) === TRUE) {
    echo "Review submitted successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
