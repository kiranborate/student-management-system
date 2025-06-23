<?php
   
    include "db.php";
    if  ($_SERVER["REQUEST_METHOD"]=="POST"){
        $name =$conn->real_escape_string($_POST['name']);
        $email =$conn->real_escape_string($_POST['email']);
        $password =password_hash($_POST['password'],PASSWORD_DEFAULT);
        
        $check =$conn->query("SELECT * FROM users WHERE email");
        if($check->num_rows > 0){
            echo"email already exixts";
        }else{
            $sql = "INSERT INTO  users (name,email,password)VALUES ('$name','$email','$password')";
            if($conn->query ($sql)){
                echo"signup sucessfull";
            } else{
                die("error".$conn->error);

            }
        }
    }
?>