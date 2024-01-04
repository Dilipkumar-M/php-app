<?php
$servername = "db";
$username = "testuser";
$password = "testpassword";
$dbname = "testdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";
$conn->query($sql);

// Example CRUD operations
// Insert data
$sql = "INSERT INTO users (firstname, lastname, email) VALUES ('John', 'Doe', 'john@example.com')";
$conn->query($sql);

// Read data
$sql = "SELECT id, firstname, lastname, email FROM users";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . " - Name: " . $row["firstname"] . " " . $row["lastname"] . " - Email: " . $row["email"] . "<br>";
    }
} else {
    echo "0 results";
}

// Update data
$sql = "UPDATE users SET email='updated@example.com' WHERE id=1";
$conn->query($sql);

// Delete data
$sql = "DELETE FROM users WHERE id=1";
$conn->query($sql);

$conn->close();
?>
