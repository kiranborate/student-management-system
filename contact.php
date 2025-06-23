<?php
include "db.php";
 
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $name =$conn->real_escape_string($_POST['name']);
    $email =$conn->real_escape_string($_POST['email']);
    $massage =$conn->real_escape_string($_POST['massage']);
    
    $sql="INSERT INTO massages(name,email,massage)VALUES('$name','$email','$massage')";
    if($conn->query($sql)){
        echo"massage sent successfully";
    } else{
        echo"error".$conn->error;
    }
}
?>