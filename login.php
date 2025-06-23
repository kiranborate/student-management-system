<?php
include "db.php";
session_start();

if($_SERVER["REQUEST_METHOD"=="POST"]){
    $email= $conn->real_escape_string($_POST['email']);
    $password =$_POST['password'];

    $query ="SELECT * FROM users WHERE email='$email'";
    $result=$conn->query($query);

    if($result->num_rows ==1){
        $row =$result->fetch_assoc();

        if(password_verify($password,$row['password'])){
            $_SESSION['users']=$row['name'];
                echo"login successfull";
        } else{
               echo"invalid password";
        }
    }else{
        echo"no user found with this email";
    }
}
?>