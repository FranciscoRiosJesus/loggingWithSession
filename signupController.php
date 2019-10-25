<?php

include('database.php');

if(isset($_POST['signup'])) {
  
  $name = $_POST['name'];
  $last_name = $_POST['lastname'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  
  $query = "";
  $result = mysqli_query($connection, $query);

  
  if ( $result->fetch_assoc() == NULL ) {
    $_SESSION['message'] = 'error - user no created';
    $_SESSION['message_type'] = 'danger';
    header("Location: signup.php");
  } else {
    $_SESSION['message'] = 'user created';
    $_SESSION['message_type'] = 'success';
    header("Location: index.php");
  }
}

?>