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

$day = $_POST['day'];
$month = $_POST['month'];
$year = $_POST['year'];
$datebirth = $day.'/'.$month.'/'.$year;
$telephone = $_POST['telephone'];
$country = $_POST['country'];
$city = $_POST['city'];
$postcode = $_POST['postcode'];
$address = $_POST['address'];

$_SESSION['datebirth'] = $datebirth;
$_SESSION['telephone'] = $telephone;
$_SESSION['country'] = $country;
$_SESSION['city'] = $city;
$_SESSION['postcode'] = $postcode;
$_SESSION['address'] = $address;

header("Location:../register3.php"); //redirect user to next page
?>