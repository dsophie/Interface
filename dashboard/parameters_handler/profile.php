<script type="text/javascript" src="dashboard/validate_updpass.js"></script>
<?php

ini_set('display_errors', 1); //Display textual information of errors

//Mysql connection setup
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

$sql = "SELECT * FROM User WHERE idUser = '$_SESSION[id]'";
$req = mysqli_query($con, $sql) or die('Error '.mysqli_error($con));
$result = $req->fetch_array(MYSQLI_NUM);

//Prints out user information
echo '<p>';
echo 'Name : '.$result[1].' '.$result[2].'<br />';
echo 'Email address : '.$result[3].'<br />';
echo 'Telephone : 0'.$result[6].'<br />';
?>

<div id="target_pass"> </div>

<h2 class="subtitle_dash"> Change password: </h2>
<div class="param_forms">

<!-- Provides a form for the updating of the password -->
<form method="get" action="dashboard/parameters_handler/updatepass.php"> 
        <input type="hidden" name="idUser" value="<?php echo $result[0]; ?>" />    
        <label class="label_param1"> Please enter current password: </label>
        <input type="password" name="oldpass" /> <br />
        <label class="label_param1"> Please enter new password: </label>
         <input type="password" name="newpass" /> <br />
         <label class="label_param1"> Please confirm new password: </label>
         <input type="password" name="confnewpass" /> <br />
        <input type="submit" class="submit_dash_main" value="CHANGE PASSWORD" />
</form> 
</div>

<?php
?>