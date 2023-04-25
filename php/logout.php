<?php 
    session_start();
    if(isset($_SESSION['unique_id'])){
        include "db.php";
        $logout_id = mysqli_real_escape_string($conn, $_GET['logout_id']);
        if(isset($logout_id)){
                session_unset();
                session_destroy();
                header("location: ../login.php");
        }
        else{
            header("location: ../about.html");
        }
    }   
    else{
        header("location: ../login.php");
    }

?>