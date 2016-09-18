<div id="share">

    <div>
        <?php

        //Display of humility message based on the motivation answered during registration
        if ($_SESSION['motivation'] == "social")
        { ?>
        <p> Want to show the world your community spirit? Help us help others and gain XP by sharing: </p>
        <?php
        }
        if ($_SESSION['motivation'] == "selfd")
        { ?>
        <p> Want to share your new skills and experiences? Help us help others and gain XP by sharing: </p>
        <?php
        }

        ?>

    </div>

  <!-- Social share buttons -->
   <form method="get" action="../dashboard/share_handler.php" target="_blank">
        <input type="submit" name="facebook" id="fb" value=""/>
        <input type="submit" name="twitter" id="twitter" value=""/>
        <input type="submit" name="linkedin" id="linkedin" value="" />       
   </form>

</div>