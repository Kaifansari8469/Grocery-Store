<?php
session_start();
echo "Hello". $_SESSION['firstname'];
if(!isset($_SESSION['userid']))
{
    header("location:user-login.php");
}
echo "<a href=logout.php>Logout</a>";
?>