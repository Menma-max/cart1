<?php

session_start(); //starts the session

session_unset(); // remove all session variables

session_destroy(); //destroy the session

header("refresh:0.05;Login&Register.php"); //it decribes that page will be refreshed in 0.05 seconds and it will redirect to Login_Page

?>