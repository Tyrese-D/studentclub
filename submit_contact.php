<?php

$host     = "localhost";
$dbname   = "your_database_name";
$username = "your_db_username";
$password = "your_db_password";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$email = $_POST['email'];
$ruid = $_POST['ruid'];
$message = $_POST['message'];

$sql = "INSERT INTO messages (name, email, ruid, message)
        VALUES ('$name', '$email', '$ruid', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "Message submitted successfully!";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>



