<?php
require_once('dbConnect.php');

if (isset($_POST['email'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $passion = mysqli_real_escape_string($conn, $_POST['passion']);
    $class = mysqli_real_escape_string($conn, $_POST['uclass']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $user_check_query = "SELECT * FROM webappUsers WHERE email='$email' LIMIT 1";
    $result = mysqli_query($conn, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    
    if ($user) {
      if ($user['email'] === $email) {
        echo '1';
      }
    }else{
            $passwordd = md5($password);
    
            $query = "INSERT INTO webappUsers (name, email, passion, webappUser_class, profileimage_url, password) 
                    VALUES('$name', '$email', '$passion', '$class', '', '$passwordd')";

            if ($conn->query($query) === TRUE) {
                echo '2';
            } else {
                echo '3';
            }
    }
}

  