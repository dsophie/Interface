<?php

$sql = "SELECT idSchedule FROM Profile WHERE idUser = '$_SESSION[id]'";
$req = mysqli_query($con, $sql) or die('Error '.mysqli_error($con));
$sch = $req->fetch_array(MYSQLI_NUM);
$idSchedule = $sch[0];

$sql1 = "SELECT idSlot FROM contains WHERE idSchedule = '$idSchedule'";
$req1 = mysqli_query($con, $sql1) or die('Error '.mysqli_error($con));


while($slots = $req1->fetch_array(MYSQLI_NUM))
{
    $sql2 = "SELECT date, idOffer FROM Slot WHERE idSlot = '$slots[0]'";
    $req2 = mysqli_query($con, $sql2) or die('Error '.mysqli_error());
    $date = $req2->fetch_array(MYSQLI_NUM);

    //date format in database dd/mm/yyyy        
    $day = substr($date[0], 0, 2);
    $month = substr($date[0], 3, 2);
    $year = substr($date[0], 6, 4);

    //get current day, month and year
    $currentday = date('d');
    $currentmonth =date('m');
    $currentyear = date('Y');

    if ($year == $currentyear && $month == $currentmonth && $currentday < $day)
    {
        echo '<div class="dashboard_div" id="reminder">';
        $sql3 = "SELECT nameOffer FROM Offer WHERE idOffer = '$date[1]'";
        $req3 = mysqli_query($con, $sql3) or die('Error '.mysqli_error());
        $off = $req3->fetch_array(MYSQLI_NUM);
        
        echo 'You have an upcoming volunteering activity scheduled: '.$off[0].' on the '.$date[0];
            
        echo '</div>';
        break; //stop at one reminder
    }

}
?>