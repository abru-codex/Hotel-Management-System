<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "hotel_db";
$dumpFilePath = "database/hotel_db.sql";

// Create a connection
$conn = new mysqli($servername, $username, $password);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create the database (if not exists)
$sqlCreateDatabase = "CREATE DATABASE IF NOT EXISTS $database";
if ($conn->query($sqlCreateDatabase) === TRUE) {
    echo "Database created successfully\n";
} else {
    echo "Error creating database: " . $conn->error;
    $conn->close();
    exit();
}

// Select the database
$conn->select_db($database);

// Read the SQL dump content from the file
$sqlDump = file_get_contents($dumpFilePath);

// Execute the SQL queries
if ($conn->multi_query($sqlDump)) {
    echo "SQL queries executed successfully\n";
} else {
    echo "Error executing SQL queries: " . $conn->error;
}

// Close the connection
$conn->close();

?>
