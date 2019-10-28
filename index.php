<?php 
    /* si no tiene una user_session, ir a log in */ 
    if (isset($_SESSION['user'])) {
      if ( $_SESSION['user'] == 'root' ) {
        header("Location: rootProducts.php");
      } else {
        header("Location: userProducts.php");
      }
    } else {
      header("Location: logging.php");
    }
?>
