<?php 
    /* si no tiene una user_session, ir a log in */ 

    include('database.php');

    if (isset($_SESSION['user'])) {
      if ( $_SESSION['user'] == 'root@root.inspt' ) {
        header("Location: rootProducts.php");
      } else {
        header("Location: userProducts.php");
      }
    } else {
      header("Location: logging.php");
    }
?>
