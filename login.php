<?php
require_once('dbConnect.php');
session_start();

$user_email = mysqli_real_escape_string($conn, $_POST['login_email']);
$user_password = mysqli_real_escape_string($conn, $_POST['login_password']);
$passwordd = md5($user_password);

$user_data = "SELECT * FROM webappUsers WHERE 
email= '$user_email' AND 
password = '$passwordd' ";

$result = $conn->query($user_data);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        
         $_SESSION['id'] = $row["webappUser_id"];
        echo 0;
    }
    }else{
        echo 1;
        
    }
    $conn->close();
    ?>