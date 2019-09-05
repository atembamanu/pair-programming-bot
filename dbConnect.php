<?php
$servername = "localhost:3306";
$username = "root";
$password = "Atemba254!";
$dbname = "moringa_pair_programming";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>