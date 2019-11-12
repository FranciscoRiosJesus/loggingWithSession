<?php 
    include("database.php");

    if(isset($_SESSION['user'])) {
        session_unset();
    }

    header("Location: logging.php");

?>