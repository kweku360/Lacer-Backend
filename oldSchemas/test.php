<?php
/**
 * Created by Kweku kankam.
 * User: apple
 * Date: 8/19/15
 * Time: 1:30 PM
 */
$servername = "localhost";
$username = "root";
$password = "root";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";