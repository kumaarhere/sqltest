<?php
 $first_name = $_POST['firstname'];
 $last_name = $_POST['lastname'];
 $email = $_POST['email'];
 $password = $_POST['password'];
 $gender = $_POST['gender'];


//connecting to the database..
 $conn = mysqli_connect('localhost','root','phpmyAdmin password here','form');
 if ($conn->connect_error){
    die("Error connecting to the database: " . $conn->connect_error);
 }else{
   $stmt=$conn->prepare("insert into `users` (`firstname`, `lastname`, `email`, `password`, `gender`) values(?,?,?,?,?)");
   $stmt->bind_param('sssss',$first_name,$last_name,$email,$password,$gender);
   //sssss means here that variables are considered to be "string"....s-string,i-integer.
   $stmt->execute();
   echo "Registration was successfull.";
   
   $stmt->close();
   $conn->disconnect();
 }
?>
