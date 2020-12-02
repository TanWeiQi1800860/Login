<?php session_start(); /* Starts the session */

if(!isset($_SESSION["admin"])){
	header("location:login.php");
	exit;
}
?>
<div class ="displayDiv">
        <?php

                echo "<h2>Your Password:</h2>";
                echo $Password;
        ?>
</div>
<a href="logout.php">Click here</a> to Logout.