<?php

ini_set('display_errors', 1); //display textual error messages

//Mysql connection to database
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

//Creation of variables with values the input from the form
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];

//Creatio of SQL query that create a new instance of Contact with the values from the input
$sql = "INSERT INTO Contact(name, email, telephone, message) VALUES('$name', '$email', '$phone', '$message')";

//Launch of query, if error during the process, send out an error messsage
$req = mysqli_query($con, $sql) or die ('Error '.mysqli_error($con));

//Close the SQL connection
mysqli_close($con);

//Redirect visitor to contact us copy page where there is a success message
header("Location:../contact_us.php?success=1");

?>