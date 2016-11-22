<?php
echo "hi";
session_start();
        session_destroy();
        unset($_SESSION['user_session']);
header("location:login.php");

?>
        