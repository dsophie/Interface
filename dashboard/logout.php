<?php
$nameUser = $_SESSION['name'];
/* Delete session */
session_destroy();

header ("Location: ../index.php?logout=1");

?>