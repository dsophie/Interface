<?php 
include ("dashboard/getinfo.php");
?>

<!-- Header structure to be included in every page of the website -->
<header id="dashboard_header">

    <div id="dash_logo">
        <img src="../pictures/logow.png"  alt="logo" id="logo" /> 

    </div>


<nav id='menu'>
    <div class="menu_elements">
        <ul class="ulnav">
            <li id="name_user"> <?php echo $_SESSION['firstName'].' '.$_SESSION['lastName']; ?>  </li>
            <li> XP points: <?php echo $_SESSION['points']; ?> </li>
            <li>   Level: <?php echo $_SESSION['level']; ?> </li>
            <li>  Badges earned: <?php
                //Retrieve in database table the number of badges the user won
                $sql1 = "SELECT * FROM alert WHERE idUser = '$_SESSION[id]'";
                $req1 = mysqli_query($con, $sql1) or die('Error '.mysqli_error());
                $badge = $req1->fetch_array(MYSQLI_NUM);
                
                $i = 1;
                $count = 0;
                for ($i = 1; $i < 10; $i++)    
                {
                    if ($badge[$i] == 1)
                    {
                        $count = $count + 1;
                    }
                }
                
                echo $count;
                
                ?></li>
            <li>  | </li>
            <li> <a href="parameters.php"> Profile </a></li>
            <li> <a href="parameters.php#favorites"> Favorites </a></li>
            <li> <a href="parameters.php#badges"> Badges </a></li>
            <li> <a href="dashboard/logout.php"> Logout </a></li> 
        </ul>  
    </div>       
</nav>

    <div id="headerdash"> 
        <h1 class="title_header"> Hello  <?php echo $_SESSION['firstName']; ?> !</h1>

        <?php

        if ($_SESSION['motivation'] == "social")
        { ?>
        <h2 class="title_header"> Sign up to volunteer today and tomorrow ... <br /> be an active member of your community, make new friends and help others!</h2>
        <?php
        }
        if ($_SESSION['motivation'] == "selfd")
        { ?>
        <h2 class="title_header"> Sign up to volunteer today and tomorrow ... <br /> take part in amazing new experiences, discover new activities and sectors and help others! </h2>
        <?php
        }

        ?>

    </div>

</header>