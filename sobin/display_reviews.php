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

// SQL query to retrieve reviews
$sql = "SELECT * FROM reviews ORDER BY created_at DESC";
$result = $conn->query($sql);

if (!$result) {
    die("Error in SQL query: " . $conn->error);
}

?>

<h2>Previous Reviews</h2>

<?php
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<p><strong>" . $row["username"] . ":</strong><br>" . $row["review_text"] . "<br><em>Posted on " . $row["created_at"] . "</em></p>";
    }
} else {
    echo "No reviews yet.";
}
?>

<?php
// Close the database connection
$conn->close();
?>
