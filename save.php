<?php session_start();?>
 <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kanak";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$name = mysqli_real_escape_string($conn,$_POST['name']);
$email = mysqli_real_escape_string($conn,$_POST['email']);
$salary = mysqli_real_escape_string($conn,$_POST['salary']);
$designation = mysqli_real_escape_string($conn,$_POST['designation']);
$date = mysqli_real_escape_string($conn,$_POST['date']);
$captcha = mysqli_real_escape_string($conn,$_POST['captcha']);
$captcha2 = $_SESSION['captcha'];
if($captcha == $captcha2){
    
$sql = "INSERT INTO users (name, email, salary,designation,date)
VALUES ('$name','$email','$salary','$designation','$date')";
}else{
    header('location:index.php?msg=3');
    die(); exit();
}


if (mysqli_query($conn, $sql)) {
  header('location:index.php?msg=1');
} else {
  
    header('location:index.php?msg=2');
}

mysqli_close($conn);
?> 