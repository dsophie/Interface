<?php
session_start();

ini_set('display_errors', 1);

$user = 'root';
$password = 'root';
$db = 'volunteer';
$host = 'localhost';
$port = 3306;

$con = mysqli_init();
$success = mysqli_real_connect(
    $con, 
    $host, 
    $user, 
    $password, 
    $db,
    $port
);

$firstname = $_POST['fname'];
$lastname = $_POST['lname'];
$email = $_POST['email'];
$password = $_POST['password'];

$_SESSION['firstname'] = $firstname;
$_SESSION['lastname'] = $lastname;
$_SESSION['email'] = $email;
$_SESSION['password'] = $password;


header("Location:../register2.php"); //redirect user to next page
?>