<?php
    include('include/config.php');


    $mov_id=$_GET['PID']; 
    if ($user->delete($mov_id) ){
         
            echo '<script language="javascript">';
            echo 'alert("deleted")';
            echo '</script>'; 

            header("Location:home.php");

    } else {
    echo '<script language="javascript">';
            echo 'alert("Failed")';
            echo '</script>'; 
 } 
 