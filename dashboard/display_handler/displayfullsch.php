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


//Retrieve idSchedule of user
$sql = "SELECT idSchedule FROM Schedule WHERE idUser ='$_SESSION[id]'";
$req = mysqli_query($con, $sql) or die('Error '.mysqli_error());
$row = $req->fetch_array(MYSQLI_NUM);
$idSchedule = $row[0];

//Retrieve all Slots in user's schedule
$sql1 = "SELECT idSlot FROM contains WHERE idSchedule = '$idSchedule' ORDER BY idContains";
$req1 = mysqli_query($con, $sql1) or die('Error '.mysqli_error());

while ($row1 = $req1->fetch_array(MYSQLI_NUM))
{
    //Retrieve information from Slot
    $sql2 = "SELECT idOffer, idOrganisation, date, hour, numberHours FROM Slot WHERE idSlot = '$row1[0]'";
    $req2 = mysqli_query($con, $sql2) or die('Error '.mysqli_error($con));
    $result = $req2->fetch_array(MYSQLI_NUM);

    //Retrieve name of offer and organisation
    $sql3 = "SELECT nameOffer FROM Offer WHERE idOffer = '$result[0]'";
    $req3 = mysqli_query($con, $sql3) or die('Error '.mysqli_error());
    $offer = $req3->fetch_array(MYSQLI_NUM);

    $sql4 = "SELECT nameOrganisation FROM Organisation WHERE idOrganisation = '$result[1]'";
    $req4 = mysqli_query($con, $sql4) or die('Error '.mysqli_error());
    $org = $req4->fetch_array(MYSQLI_NUM);

    //Prints out
    echo '<p>';
    echo '<em> ID : '.$row1[0].' -> '.$result[2].' - '.$result[3].' for '.$result[4].'hours : '.$offer[0].' @'.$org[0].'</em>'; 
    echo '</p>'; 
}
?>

<!-- Form to update slot -->
<div class="param_forms">
    <h2 class="subtitle_dash"> Update slot, please complete all fields:</h2>
    <form method="get" action="dashboard/parameters_handler/updateslot.php">
        <label class="label_sch"> Enter the ID of the slot you want to update  </label> 
        <input type="text" name="idSlot" /> <br />
        <label class="label_sch"> Enter new date (Day Month Year) </label>
        <input type="text" name="day" /> 
        <input type="text" name="month" /> 
        <input type="text" name="year" /> <br />
        <label class="label_sch"> Enter new start hour </label>
        <select name="hour">
            <option> Select hour </option>
            <option> 01:00 </option>
            <option> 02:00 </option>
            <option> 03:00 </option>
            <option> 04:00 </option>
            <option> 05:00 </option>
            <option> 06:00 </option>
            <option> 07:00 </option>
            <option> 08:00 </option>
            <option> 09:00 </option>
            <option> 10:00 </option>
            <option> 11:00 </option>
            <option> 12:00 </option>
            <option> 13:00 </option>
            <option> 14:00 </option>
            <option> 15:00 </option>
            <option> 16:00 </option>
            <option> 17:00 </option>
            <option> 18:00 </option>
            <option> 19:00 </option>
            <option> 20:00 </option>
            <option> 21:00 </option>
            <option> 22:00 </option>
            <option> 23:00 </option>
            <option> 24:00 </option>
        </select> <br/>
        <label class="label_sch"> Enter new duration </label> 
        <select name="number"> 
            <option> 1 </option>
            <option> 2 </option>
            <option> 3 </option>
            <option> 4 </option>
            <option> 5 </option>
            <option> 6 </option>
            <option> 7 </option>
            <option> 8 </option>
            <option> 9 </option>
            <option> 10 </option>
            <option> 11 </option>
            <option> 12 </option>
            <option> 13 </option>
            <option> 14 </option> 
        </select>

        <br />                
        <input type="submit" class="submit_dash_main" value="UPDATE SLOT" />
    </form>

    <br />

    <h2 class="subtitle_dash"> Delete slot: </h2>
<!-- Form to delete slot -->
    <form method="get" action="dashboard/parameters_handler/deleteslot.php"> 
        <label class="label_sch"> Enter the ID of the slot you want to delete</label>
        <input type="text" name="idSlot" />    <br />                
        <input type="submit" class="submit_dash_main" value="DELETE SLOT" />
    </form> 

</div>

<?php
?>